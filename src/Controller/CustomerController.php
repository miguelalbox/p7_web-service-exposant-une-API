<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Repository\CustomerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CustomerController extends AbstractController
{

    #[Route('/api/customers', name: 'customers', methods: ['GET'])]
    public function getAllCustomers(CustomerRepository $customerRepo, SerializerInterface $serializer): JsonResponse
    {
        $user = $this->getUser();
        $customerList = $customerRepo->findBy(['user' => $user]);
        

        $jsonCustomerList = $serializer->serialize($customerList, 'json', ['groups' => 'getCustomers']);
        return new JsonResponse($jsonCustomerList, Response::HTTP_OK, [], true);
    }
    #[Route('/api/customers/{id}', name: 'customer_single', methods: ['GET'])]
    public function getCustomer(Customer $customer, SerializerInterface $serializer): JsonResponse
    {
        $user = $this->getUser();

        //dd($user->getId() == $customer->getUser()->getId());
        if ($user->getId() == $customer->getUser()->getId()){
            $jsonCustomerList = $serializer->serialize($customer, 'json', ['groups' => 'getCustomers']);
            return new JsonResponse($jsonCustomerList, Response::HTTP_OK, [], true);
        }

        return new JsonResponse($serializer->serialize("Ce customer ne vous partiens pas", 'json'), JsonResponse::HTTP_UNAUTHORIZED, [], true);
    }

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

        $jsonCustomerList = $serializer->serialize($customer, 'json', ['groups' => 'getCustomers']);

        $location = $urlGenerator->generate('customer_single', ['id' => $customer->getID()], UrlGeneratorInterface::ABSOLUTE_URL);

        return new JsonResponse($jsonCustomerList, Response::HTTP_CREATED, ["Location" => $location], true);
    }

    #[Route('/api/customers/{id}', name: 'customer_single_edit', methods: ['PUT'])]
    public function editCustomer(Request $request, Customer $currentCustomer, CustomerRepository $customerRepo, EntityManagerInterface $manager, SerializerInterface $serializer, UrlGeneratorInterface $urlGenerator): JsonResponse
    {
        $user = $this->getUser();
        if ($user->getId() != $currentCustomer->getUser()->getId()){
            return new JsonResponse($serializer->serialize("Ce customer ne vous partiens pas", 'json'), JsonResponse::HTTP_UNAUTHORIZED, [], true);

        }

        $customerUpdate = $serializer->deserialize($request->getContent(), Customer::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $currentCustomer]);
        $manager->persist($customerUpdate);
        $manager->flush();

        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
    }

}
