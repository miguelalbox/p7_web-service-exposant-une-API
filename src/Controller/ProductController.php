<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ProductController extends AbstractController
{
    #[Route('/api/products', name: 'product', methods: ['GET'])]
    public function getAllProducts(ProductRepository $productRepo, SerializerInterface $serializer, Request $request): JsonResponse
    {
        //pagination
        $page = $request->get('page', 1);
        $limit = $request->get('limit', 3);

        $productList = $productRepo->findAllWithPagination($page, $limit);

        $jsonProductList = $serializer->serialize($productList, 'json');
        return new JsonResponse($jsonProductList, Response::HTTP_OK, [], true);
    }

    #[Route('/api/products/{id}', name: 'product_single', methods: ['GET'])]
    public function getProduct($id, Product $product, SerializerInterface $serializer): JsonResponse
    {
            $jsonProductList = $serializer->serialize($product, 'json');
            return new JsonResponse($jsonProductList, Response::HTTP_OK, [], true);
    }
}
