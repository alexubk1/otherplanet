<?php
namespace App\Controller;
use App\Entity\Article;
use App\Entity\Category;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ArticleController extends Controller {

    /**
     * @Route("/", name="homepage")
     * @Method({"GET"})
     */
    public function index() {

        $articles= $this->getDoctrine()->getRepository(Article::class)->findBy(['isPublish'=> true]);

        return $this->render('articles/index.html.twig', array('articles' => $articles));
    }

    /**
     * @Route("/category/{type}", name="category_type")
     * @Method({"GET"})
     */
    public function categoryName($type) {

        if (!empty($type)){
            $category= $this->getDoctrine()->getRepository(Category::class)->findOneByCategoryName($type);
            if(!empty($category)) {
                $articles= $this->getDoctrine()->getRepository(Article::class)->findAllPicturesByCategory($category);
                return $this->render('articles/index.html.twig', array('articles' => $articles));
            }
            else {
                $articles = null;
                return $this->render('articles/index.html.twig', array('articles' => $articles));
            }
        }
        else {
            $articles = null;
            return $this->render('articles/index.html.twig', array('articles' => $articles));
        }



    }
}