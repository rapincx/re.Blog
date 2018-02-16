<?php

namespace ChaosCompany\AdminBundle\Controller;

use ChaosCompany\AdminBundle\Form\CategoryFormType;
use ChaosCompany\BlogBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{
    public function addAction(Request $request)
    {
        $form = $this->createForm(CategoryFormType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $category = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            $this->addFlash('success', 'Category successfuly created!');

            return $this->redirectToRoute('chaos_company_admin_homepage');
        }

        return $this->render('@ChaosCompanyAdmin/Category/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository(Category::class)->findAll();

        return $this->render('@ChaosCompanyAdmin/Category/list.html.twig', [
            'posts' => $posts
        ]);
    }
}