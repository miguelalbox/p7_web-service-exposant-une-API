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
    #[Route('/api/products', name: 'product')]
    public function getAllProducts(ProductRepository $productRepo, SerializerInterface $serializer): JsonResponse
    {
        $productList = $productRepo->findAll();

        $jsonProductList = $serializer->serialize($productList, 'json');
        return new JsonResponse($jsonProductList, Response::HTTP_OK, [], true);
    }

    #[Route('/api/product/{id}', name: 'product_single')]
    public function getProducts(Product $product, SerializerInterface $serializer): JsonResponse
    {


        $jsonProductList = $serializer->serialize($product, 'json');
        return new JsonResponse($jsonProductList, Response::HTTP_OK, [], true);
    }
}
