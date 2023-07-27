<?php

namespace App\Controller;

use App\Repository\DishRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/dish', name: 'dish.')]
class DishController extends AbstractController
{
    public function __construct(protected DishRepository $dishRepository)
    {}
    
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $dishes = $this->dishRepository->findAll();
        
        return $this->render('dish/index.html.twig', compact('dishes'));
    }

    #[Route('/create', name: 'create')]
    public function create(Request $request): Response
    {
        $this->dishRepository->save([
            'name' => 'Burger',
            'description' => 'Smash burger'
        ]);

        return new Response('Dish has been created');
    }
}
