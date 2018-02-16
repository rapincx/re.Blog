<?php

namespace ChaosCompany\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('ChaosCompanyBlogBundle:Post')
            ->findAllPosts();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $posts,
            $request->query->getInt('page', 1)
        );

        return $this->render('@ChaosCompanyBlog/Blog/index.html.twig', [
            'posts' => $pagination
        ]);
    }
}
