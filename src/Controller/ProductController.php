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
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use OpenApi\Annotations as OA;


class ProductController extends AbstractController
{
    /**
     * Cette méthode permet de récupérer l'ensemble des produits.
     *
     * @OA\Response(
     *     response=200,
     *     description="Retourne la liste des produits",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref=@Model(type=Product::class))
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
     * @OA\Tag(name="Products")
     *
     * @param ProductRepository $productRepo
     * @param SerializerInterface $serializer
     * @param Request $request
     * @return JsonResponse
     */
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


    /**
     * Cette méthode permet de récupérer l'ensemble des customers by user.
     *
     * @OA\Response(
     *     response=200,
     *     description="Retourne le produit selon id",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(ref=@Model(type=Product::class))
     *     )
     * )
     * * @OA\Response(
     *     response=401,
     *     description="Retourne error car le token n'es pas a jour ou vous n'est pas connecté",
     * )
     * * * @OA\Response(
     *     response=404,
     *     description="Retourne error car le produit n'existe pas",
     * )
     * @OA\Tag(name="Products")
     *
     * @param Product $product
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    #[Route('/api/products/{id}', name: 'product_single', methods: ['GET'])]
    public function getProduct($id, Product $product, SerializerInterface $serializer): JsonResponse
    {
            $jsonProductList = $serializer->serialize($product, 'json');
            return new JsonResponse($jsonProductList, Response::HTTP_OK, [], true);
    }
}
