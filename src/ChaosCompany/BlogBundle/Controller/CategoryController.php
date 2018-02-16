<?php

namespace ChaosCompany\BlogBundle\Controller;

use ChaosCompany\BlogBundle\Entity\Category;
use ChaosCompany\BlogBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{
    public function getPostsFromCategoryAction($slug, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var Category $category */
        $category = $em->getRepository('ChaosCompanyBlogBundle:Category')
            ->findOneBy([
                'slug' => $slug
            ]);

        /** @var Post $posts */
        $posts = $category->getPosts();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $posts,
            $request->query->getInt('page', 1)
        );

        dump($posts);
        dump($category);

        return $this->render('@ChaosCompanyBlog/Blog/index.html.twig', [
            'posts' => $pagination
        ]);
    }

}