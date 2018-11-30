<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

    /**
     * @Route("/", name="accueil")
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
