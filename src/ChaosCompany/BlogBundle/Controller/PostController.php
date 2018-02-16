<?php

namespace ChaosCompany\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PostController extends Controller
{
    public function getPostAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository("ChaosCompanyBlogBundle:Post")->findOneBy([
            'id' => $id
        ]);

        return $this->render("ChaosCompanyBlogBundle:Post:index.html.twig", [
            'post' => $post
        ]);
    }

    public function getAllPostAction()
    {
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('ChaosCompanyBlogBundle:Post')
            ->findAllPosts();
        dump($posts);die();
    }

    public function viewPostAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('ChaosCompanyBlogBundle:Post')
            ->findOneBySlug($slug);

        return $this->render("@ChaosCompanyBlog/Post/index.html.twig", [
            'post' => $post
        ]);
    }
}