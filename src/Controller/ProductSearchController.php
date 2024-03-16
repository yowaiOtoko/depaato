<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductSearchController extends AbstractController
{
    #[Route('/product/search', name: 'product_search')]
    public function search(Request $request, ProductRepository $productRepo): Response
    {
        $searchTerm = $request->query->get('q');

       $products = $productRepo->search($searchTerm);

        return $this->render('product_search/index.html.twig', [
            'searchTerm' => $searchTerm,
            'products' => $products,
        ]);
    }
}