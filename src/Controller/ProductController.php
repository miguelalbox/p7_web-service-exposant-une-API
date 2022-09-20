<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;


class ProductController extends AbstractController
{
    #[Route('/api/products', name: 'product', methods: ['GET'])]
    public function getAllProducts(ProductRepository $productRepo, SerializerInterface $serializer): JsonResponse
    {
        $productList = $productRepo->findAll();

        $jsonProductList = $serializer->serialize($productList, 'json');
        return new JsonResponse($jsonProductList, Response::HTTP_OK, [], true);
    }

    #[Route('/api/product/{id}', name: 'product_single', methods: ['GET'])]
    public function getProducts($id, ProductRepository $productRepo, SerializerInterface $serializer): JsonResponse
    {
        $product = $productRepo->find($id);
        if ($product){
            $jsonProductList = $serializer->serialize($product, 'json');
            return new JsonResponse($jsonProductList, Response::HTTP_OK, [], true);
        }

        return new JsonResponse(null, Response::HTTP_NOT_FOUND);


    }
}
