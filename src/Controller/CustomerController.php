<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Repository\CustomerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class CustomerController extends AbstractController
{

    #[Route('/api/customers', name: 'customers', methods: ['GET'])]
    public function getAllCustomers(CustomerRepository $customerRepo, SerializerInterface $serializer): JsonResponse
    {
        $customerList = $customerRepo->findAll();
        

        $jsonProductList = $serializer->serialize($customerList, 'json', ['groups' => 'getCustomers']);
        return new JsonResponse($jsonProductList, Response::HTTP_OK, [], true);
    }
    #[Route('/api/customer/{id}', name: 'customer_single', methods: ['GET'])]
    public function getCustomer(Customer $customer, SerializerInterface $serializer): JsonResponse
    {


        $jsonProductList = $serializer->serialize($customer, 'json', ['groups' => 'getCustomers']);
        return new JsonResponse($jsonProductList, Response::HTTP_OK, [], true);
    }
}
