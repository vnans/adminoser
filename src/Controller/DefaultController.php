<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;
use App\Repository\ActualiteRepository;
use App\Repository\VideoRepository;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{

    /**
     * @Route("/", name="defaut")
     */
    public function defaut(VideoRepository $videoRepository, ArticleRepository $articleRepository , ActualiteRepository $actualiteRepository ): Response
    {
        // return $this->render('@FOSUser/Security/login.html.twig', array(
        //     'last_username' => null,
        //     'error' => null,
        //     'csrf_token' => null,
        // ) );
        return $this->render('default/default.html.twig' ,[
            'actualites' => $actualiteRepository->findAll(),
            'articles' => $articleRepository->findAll(),
            'videos'  => $videoRepository->findAll(),
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
      $em = $this->getDoctrine()->getManager();
      // total des Abonnes
      $req = $em->createQuery('SELECT  COUNT(a) FROM App\Entity\User a');
      $res = $req->getResult();
      $totalAbonnes = $res['0']['1'];
      //total des souscriptions
      $req1 = $em->createQuery('SELECT  COUNT(s) FROM App\Entity\Souscription s');
      $res1 = $req1->getResult();
      $totalSouscriptions = $res1['0']['1'];
      //total des admins
      $req2 = $em->createQuery('SELECT  COUNT(f) FROM App\Entity\Fuser f');
      $res2 = $req2->getResult();
      $totalAdmin = $res2['0']['1'];
      //total des post
      $req3 = $em->createQuery('SELECT  COUNT(f) FROM App\Entity\Fuser f');
      $res3 = $req3->getResult();
      $totalPub = $res3['0']['1'];
    //  var_dump($res);
        return $this->render('default/index.html.twig', [
            'totalSouscriptions' => $totalSouscriptions ,
            'totalAbonnes' => $totalAbonnes ,
            'totalAdmin' => $totalAdmin ,
            'totalPub'  => $totalPub ,
        ]);
    }
  
}
