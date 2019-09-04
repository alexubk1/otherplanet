<?php
namespace App\Controller;
use App\Entity\Album;
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

class AlbumController extends Controller {

    /**
     * @Route("/album", name="album")
     */
    public function index()
    {

        $albums= $this->getDoctrine()->getRepository(Album::class)->findAll();

        foreach ($albums as $album) {
            if ($album->getArticle() !== null) {
                $article = $this->getDoctrine()->getRepository(Article::class)->findByAlbum($album->getId());
                $album->count = count($article);
            }
        }

        return $this->render('album/index.html.twig',[
            "albums" => $albums]);
    }
}