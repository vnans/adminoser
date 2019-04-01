<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;
use App\Repository\ActualiteRepository;
use App\Repository\VideoRepository;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Fuser;

class DefaultController extends AbstractController
{

    /**
     * @Route("/", name="defaut")
     */
    public function defaut(VideoRepository $videoRepository, ArticleRepository $articleRepository , ActualiteRepository $actualiteRepository ): Response
    {

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

        /**
        * @Route("/load", name="load")
        */
       public function load(): Response
       {
           $entityManager = $this->getDoctrine()->getManager();
           $REQ = $entityManager->createQuery('SELECT v.valeur FROM App\Entity\Compteur v');
           $lastId = $REQ->getResult() ;


           $req = $entityManager->createQuery('SELECT x.username , x.id FROM App\Entity\User x  WHERE x.id > :id ');
           $req->setParameters(array(

                    'id' => $lastId,
                ));

           $newAbonnes = $req->getResult() ;


           $req2 = $entityManager->createQuery('SELECT count(s.id)  FROM App\Entity\User s WHERE s.id > :id');
           $req2->setParameters(array(

                    'id' => $lastId,
                ));
               $record = $req2->getResult();

               if ($record > 0 ){
           ini_set('max_execution_time',0); //300 seconds = 5 minutes

           foreach ($newAbonnes as $abonnes) {
                  // var_dump($abonnes['username']);
               if (strlen($abonnes['username']) > 7) { // si c'est un  numero de telephone
                   $numero=substr($abonnes['username'],-8) ; //on retire l'indicatif
                   $user = new User();
                   $user->setIduser($abonnes['id']);
                   $user->setUsername($numero);
                   $user->setPassword($numero);
                   $user->setEmail($numero);
                   $user->setEnabled('1');

                   $entityManager->persist($user);
                   $entityManager->flush();
                   // mettre a jour lecompteur
                   $this->em= $entityManager;
                           $qb = $this->em->createQueryBuilder();
                           $req = $qb->update('App\Entity\Compteur', 'c')
                                   ->set('c.valeur', '?1')
                                   ->where('c.id = ?2')
                                   ->setParameter(1, $abonnes['id'])
                                   ->setParameter(2,1)
                                   ->getQuery();
                           $res = $req->execute();
                }
               // mettre a jour les nouveaux users



               }
           }
     }



}
