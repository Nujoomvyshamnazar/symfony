<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
  /**
     * @Route("/")
     * @Method({"GET"})
     */
   public function index()
   {

    $articles = ['article 1','article 2'];
    // return new Response("<html><body>Hi,How are You</body></html>");
    return $this->render('articles/index.html.twig',['articles' => $articles]);
   }

   /**
      * @Route("/articles")
      * @Method({"GET"})
      */

      public function articles()
      {

       $articles = ['article 1','article 2'];
       // return new Response("<html><body>Hi,How are You</body></html>");
       return $this->render('articles/index.html.twig',['articles' => $articles]);
      }

      /**
         * @Route("/articles/save")
         */

         public function save()
         {
         $entityManager = $this->getDoctrine()->getManager();

         $article= new Article();

         $article->setName('this is title');

         $article->setBody('this is body');

         $entityManager->persist($article);

          $entityManager->flush();

        return new Response('Saved new product with id '.$article->getId());




         }
}
