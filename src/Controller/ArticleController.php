<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    protected $articleRepository;
    
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }
    
    #[Route('/article', name: 'article')]
    public function index(): Response
    {
        // $article = new Article;
        // $article->setTitle('New Article');

        // $this->articleRepository->save($article, true);
        
        // return new Response('Article added');

        $article = $this->articleRepository->find(1);

        return $this->render('article/index.html.twig', compact(
            'article'
        ));
    }
}
