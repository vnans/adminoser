<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Fuser;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\guessExtension;


/**
 * @Route("/article")
 */
class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="article_index", methods="GET")
     */
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('article/index.html.twig', ['articles' => $articleRepository->findAll()]);
    }
    /**
     * @Route("/index2", name="article_index2", methods="GET")
     */
    public function index2(ArticleRepository $articleRepository): Response
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
              $user = new Fuser();
        //      $user->setIduser($abonnes['id']);
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

        return $this->render('article/index2.html.twig', ['articles' => $articleRepository->findAll()]);
    }

    /**
     * @Route("/new", name="article_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {
          // ajouter d'image
            $file = $article->getImage();
            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();
            // moves the file to the directory where brochures are stored
            $file->move($this->getParameter('images_directory'), $fileName); // stock image dans /public/img

            $article->setImage($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('article_index');
        }

        return $this->render('article/new.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="article_show", methods="GET")
     */
    public function show(Article $article ,ArticleRepository $articleRepository): Response
    {
        return $this->render('article/show.html.twig', [
            'article' => $article,
            'articles' => $articleRepository->findAll()
        ]);
    }

    /**
     * @Route("/{id}/edit", name="article_edit", methods="GET|POST")
     */
    public function edit(Request $request, Article $article): Response
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

          // ajouter d'image
            $file = $article->getImage();
            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();
            // moves the file to the directory where brochures are stored
            $file->move($this->getParameter('images_directory'), $fileName); // stock image dans /public/img


            $article->setImage($fileName);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('article_edit', ['id' => $article->getId()]);
        }

        return $this->render('article/edit.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="article_delete", methods="DELETE")
     */
    public function delete(Request $request, Article $article): Response
    {
        if ($this->isCsrfTokenValid('delete'.$article->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($article);
            $em->flush();
        }

        return $this->redirectToRoute('article_index');
    }
    /**
 * @return string
 */
private function generateUniqueFileName()
{
    // md5() reduces the similarity of the file names generated by
    // uniqid(), which is based on timestamps
    return md5(uniqid());
}
}
