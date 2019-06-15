<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 15/06/2019
 * Time: 11:31
 */

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;
use App\Entity\CategoryType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CategoryController extends Controller
{
    /**
     * @Route("/category", name="category_index")
     * @Method({"GET"})
     */
    public function index() {
        dump('here');
        die;
        $category= $this->getDoctrine()->getRepository(Category::class)->findAll();

        return $this->render('articles/index.html.twig', array('articles' => $articles));
    }

    /**
     * @Route("/category/new", name="new_category")
     * Method({"GET", "POST"})
     */
    public function new(Request $request) {
        $category = new Category();
        $form = $this->createForm('App\Form\CategoryType', $category);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            return $this->redirectToRoute('category_index');
        }
        return $this->render('category/new.html.twig', array(
            'form' => $form->createView()
        ));

    }


}