<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Repository\CustomerRepository;
use Doctrine\ORM\EntityManagerInterface;
use JMS\Serializer\SerializationContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use OpenApi\Annotations as OA;

class CustomerController extends AbstractController
{
    /**
     * Cette méthode permet de récupérer l'ensemble des customers by user.
     *
     * @OA\Response(
     *     response=200,
     *     description="Retourne la liste des customers",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref=@Model(type=Customer::class, groups={"getCustomers"}))
     *     )
     * )
     * * @OA\Response(
     *     response=401,
     *     description="Retourne error car le token n'es pas a jour ou vous n'est pas connecté",
     *
     * )
     * @OA\Parameter(
     *     name="page",
     *     in="query",
     *     description="La page que l'on veut récupérer",
     *     @OA\Schema(type="int")
     * )
     *
     * @OA\Parameter(
     *     name="limit",
     *     in="query",
     *     description="Le nombre d'éléments que l'on veut récupérer",
     *     @OA\Schema(type="int")
     * )
     * @OA\Tag(name="Customers")
     *
     * @param CustomerRepository $customerRepo
     * @param SerializerInterface $serializer
     * @param Request $request
     * @return JsonResponse
     */
    #[Route('/api/customers', name: 'customers', methods: ['GET'])]
    public function getAllCustomers(CustomerRepository $customerRepo, SerializerInterface $serializer, Request $request): JsonResponse
    {

        //pagination
        $page = $request->get('page', 1);
        $limit = $request->get('limit', 3);
        $userId = strval($this->getUser()->getId());

        $customerList = $customerRepo->findAllCustomersWithPagination( $page, $limit, $userId);
        
        $context = SerializationContext::create()->setGroups(["getCustomers"]);
        $jsonCustomerList = $serializer->serialize($customerList, 'json', $context);
        return new JsonResponse($jsonCustomerList, Response::HTTP_OK, [], true);
    }

    /**
     * Cette méthode permet de récupérer l'ensemble des customers by user.
     *
     * @OA\Response(
     *     response=200,
     *     description="Retourne le customer selon id",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref=@Model(type=Customer::class, groups={"getCustomers"}))
     *     )
     * )
     * * @OA\Response(
     *     response=401,
     *     description="Retourne error car le customer ne vous partiens pas ou le token n'es pas a jour ou vous n'est pas connecté",
     * )
     * * * @OA\Response(
     *     response=404,
     *     description="Retourne error car le customer n'existe pas",
     * )
     * @OA\Tag(name="Customers")
     *
     * @param Customer $customer
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    #[Route('/api/customers/{id}', name: 'customer_single', methods: ['GET'])]
    public function getCustomer(Customer $customer, SerializerInterface $serializer): JsonResponse
    {
        $user = $this->getUser();

        //dd($user->getId() == $customer->getUser()->getId());
        if ($user->getId() == $customer->getUser()->getId()){
            $context = SerializationContext::create()->setGroups(["getCustomers"]);
            $jsonCustomerList = $serializer->serialize($customer, 'json', $context);
            return new JsonResponse($jsonCustomerList, Response::HTTP_OK, [], true);
        }

        return new JsonResponse($serializer->serialize("Ce customer ne vous partiens pas", 'json'), JsonResponse::HTTP_UNAUTHORIZED, [], true);
    }

    /**
     * Cette méthode permet de récupérer l'ensemble des customers by user.
     *
     * @OA\Response(
     *     response=204,
     *     description="Suprime le customer",
     *
     * )
     * * @OA\Response(
     *     response=401,
     *     description="Retourne error car le customer ne vous partiens pas ou le token n'es pas a jour ou vous n'est pas connecté",
     *
     * )
     * * @OA\Response(
     *    response=404,
     *    description="Retourne error car le customer n'existe pas",
     * )
     * @OA\Tag(name="Customers")
     *
     * @param Customer $customer
     * @param SerializerInterface $serializer
     * @param EntityManagerInterface $manager
     * @return JsonResponse
     */
    #[Route('/api/customers/{id}', name: 'customer_single_delete', methods: ['DELETE'])]
    public function deleteCustomer(Customer $customer, SerializerInterface $serializer, EntityManagerInterface $manager): JsonResponse
    {
        $user = $this->getUser();
        if ($user->getId() == $customer->getUser()->getId()) {
            $manager->remove($customer);
            $manager->flush();

            return new JsonResponse(null, Response::HTTP_NO_CONTENT);
        }
        return new JsonResponse($serializer->serialize("Ce customer ne vous partiens pas", 'json'), JsonResponse::HTTP_UNAUTHORIZED, [], true);

    }

    /**
     * Cette méthode permet de récupérer l'ensemble des customers by user.
     *
     * @OA\Response(
     *     response=201,
     *     description="Le customer a été ajouté",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref=@Model(type=Customer::class, groups={"getCustomers"}))
     *     )
     * )
     * * @OA\Response(
     *     response=401,
     *     description="Retourne error car le token n'es pas a jour ou vous n'est pas connecté",
     *
     * )
     * * @OA\Response(
     *     response=500,
     *     description="Retourne error car les données ne sont pas correct",
     *
     * )
     *
     * @OA\RequestBody(
     *     description="Json payload",
     *     @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="firstname",
     *                  description="Miguel",
     *                  type="string",
     *              ),
     *              @OA\Property(
     *                  property="lastname",
     *                  description="Sevilla",
     *                  type="string",
     *              ),
     *              @OA\Property(
     *                  property="email",
     *                  description="miguel@gmail.com",
     *                  type="string",
     *              ),
     *              @OA\Property(
     *                  property="phone",
     *                  description="0643796236",
     *                  type="string",
     *              ),
     * )
     * )
     *
     * )
     *
     * @OA\Tag(name="Customers")
     *
     * @param ValidatorInterface $validator
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @param SerializerInterface $serializer
     * @param UrlGeneratorInterface $urlGenerator
     * @return JsonResponse
     */
    #[Route('/api/customers', name: 'customer_single_add', methods: ['POST'])]
    public function addCustomer(ValidatorInterface $validator, Request $request, EntityManagerInterface $manager, SerializerInterface $serializer, UrlGeneratorInterface $urlGenerator): JsonResponse
    {

        $customer = $serializer->deserialize($request->getContent(), Customer::class, 'json');
        $customer->setUser($this->getUser());

        //verification d'error
        $errors = $validator->validate($customer);
        if ($errors->count() > 0){
            return new JsonResponse($serializer->serialize($errors, 'json'), JsonResponse::HTTP_BAD_REQUEST, [], true);
        }

        $manager->persist($customer);
        $manager->flush();

        $context = SerializationContext::create()->setGroups(["getCustomers"]);
        $jsonCustomerList = $serializer->serialize($customer, 'json', $context);

        $location = $urlGenerator->generate('customer_single', ['id' => $customer->getID()], UrlGeneratorInterface::ABSOLUTE_URL);

        return new JsonResponse($jsonCustomerList, Response::HTTP_CREATED, ["Location" => $location], true);
    }


    /**
     * Cette méthode permet de récupérer l'ensemble des customers by user.
     *
     * @OA\Response(
     *     response=204,
     *     description="Le customer a été ajouté",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref=@Model(type=Customer::class, groups={"getCustomers"}))
     *     )
     * )
     * * @OA\Response(
     *     response=401,
     *     description="Retourne error car le customer ne vous partiens pas ou le token n'es pas a jour ou vous n'est pas connecté",
     *
     * )
     * * @OA\Response(
     *     response=500,
     *     description="Retourne error car les données ne sont pas correct",
     *
     * )
     *
     * @OA\RequestBody(
     *     description="Json payload",
     *     @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="firstname",
     *                  description="Miguel",
     *                  type="string",
     *              ),
     *              @OA\Property(
     *                  property="lastname",
     *                  description="Sevilla",
     *                  type="string",
     *              ),
     *              @OA\Property(
     *                  property="email",
     *                  description="miguel@gmail.com",
     *                  type="string",
     *              ),
     *              @OA\Property(
     *                  property="phone",
     *                  description="0643796236",
     *                  type="string",
     *              ),
     * )
     * )
     *
     * )
     *
     * @OA\Tag(name="Customers")
     *
     * @param Request $request
     * @param Customer $currentCustomer
     * @param CustomerRepository $customerRepo
     * @param EntityManagerInterface $manager
     * @param SerializerInterface $serializer
     * @param UrlGeneratorInterface $urlGenerator
     * @return JsonResponse
     */
    #[Route('/api/customers/{id}', name: 'customer_single_edit', methods: ['PUT'])]
    public function editCustomer(Request $request, Customer $currentCustomer, CustomerRepository $customerRepo, EntityManagerInterface $manager, SerializerInterface $serializer, UrlGeneratorInterface $urlGenerator): JsonResponse
    {
        $user = $this->getUser();
        if ($user->getId() != $currentCustomer->getUser()->getId()){
            return new JsonResponse($serializer->serialize("Ce customer ne vous partiens pas", 'json'), JsonResponse::HTTP_UNAUTHORIZED, [], true);

        }
        $customerGet = $serializer->deserialize($request->getContent(), Customer::class, 'json');
        $currentCustomer->setPhone($customerGet->getPhone());
        $currentCustomer->setEmail($customerGet->getEmail());
        $currentCustomer->setLastname($customerGet->getLastname());
        $currentCustomer->setFirstname($customerGet->getFirstname());

        $manager->persist($currentCustomer);
        $manager->flush();

        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
    }

}
