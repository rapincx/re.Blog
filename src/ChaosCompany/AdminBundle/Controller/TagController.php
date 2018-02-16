<?php

namespace ChaosCompany\AdminBundle\Controller;


use ChaosCompany\AdminBundle\Form\TagFormType;
use ChaosCompany\BlogBundle\Entity\Tag;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TagController extends Controller
{
    public function addAction(Request $request)
    {
        $form = $this->createForm(TagFormType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $tag = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($tag);
            $em->flush();

            $this->addFlash('success', 'Tag successfuly created!');

            return $this->redirectToRoute('chaos_company_admin_homepage');
        }

        return $this->render('ChaosCompanyAdminBundle:Tag:add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $tags = $em->getRepository(Tag::class)->findAll();

        return $this->render('ChaosCompanyAdminBundle:Category:list.html.twig', [
            'tags' => $tags
        ]);
    }
}