<?php

namespace ChaosCompany\BlogBundle\Controller;

use ChaosCompany\BlogBundle\Entity\Post;
use ChaosCompany\BlogBundle\Entity\Tag;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TagController extends Controller
{
    public function getPostsFromTagAction($slug, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var Tag $category */
        $tag = $em->getRepository('ChaosCompanyBlogBundle:Tag')
                  ->findOneBy([
                      'slug' => $slug
                  ]);

        /** @var Post $posts */
        $posts = $tag->getPosts();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $posts,
            $request->query->getInt('page', 1)
        );

        dump($posts);
        dump($tag);

        return $this->render('@ChaosCompanyBlog/Blog/index.html.twig', [
            'posts' => $pagination
        ]);
    }
}