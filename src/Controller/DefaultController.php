<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;
use App\Repository\ActualiteRepository;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{

    /**
     * @Route("/", name="defaut")
     */
    public function defaut(ArticleRepository $articleRepository , ActualiteRepository $actualiteRepository ): Response
    {
        // return $this->render('@FOSUser/Security/login.html.twig', array(
        //     'last_username' => null,
        //     'error' => null,
        //     'csrf_token' => null,
        // ) );
        return $this->render('default/defaut.html.twig' ,[
            'actualites' => $actualiteRepository->findAll(),
            'articles' => $articleRepository->findAll()
        ]);
    }
/**
     * @Route("/accueil", name="accueil")
     */
    public function accueil()
    {
        // return $this->render('@FOSUser/Security/login.html.twig', array(
        //     'last_username' => null,
        //     'error' => null,
        //     'csrf_token' => null,
        // ) );
        return $this->render('default/accueil.html.twig');
    }
    /**
     * @Route("/default", name="default")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}
