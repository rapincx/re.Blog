<?php

namespace ChaosCompany\AdminBundle\Controller;

use ChaosCompany\AdminBundle\Form\PostFormType;
use ChaosCompany\BlogBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{
    public function addAction(Request $request)
    {
        $form = $this->createForm(PostFormType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $post = $form->getData();
            dump($post);
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            $this->addFlash('success', 'Post successfuly created!');

            return $this->redirectToRoute('chaos_company_admin_homepage');
        }

        return $this->render('@ChaosCompanyAdmin/Post/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('ChaosCompanyBlogBundle:Post')
            ->find($id);

        $form = $this->createForm(PostFormType::class, $post);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $post = $form->getData();
            dump($post);
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            $this->addFlash('success', 'Post successfuly updated!');

            return $this->redirectToRoute('chaos_company_admin_list_post');
        }

        return $this->render('@ChaosCompanyAdmin/Post/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository(Post::class)->findAll();

        return $this->render('@ChaosCompanyAdmin/Post/list.html.twig', [
            'posts' => $posts
        ]);
    }
}