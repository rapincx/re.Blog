<?php

namespace ChaosCompany\BlogBundle\Controller;

use ChaosCompany\BlogBundle\Form\LoginForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    public function loginAction(Request $request)
    {
        $authUtils = $this->get('security.authentication_utils');
        // get the login error if there is one
        $error = $authUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authUtils->getLastUsername();

        $form = $this->createForm(LoginForm::class, [
            '_username' => $lastUsername
        ]);

        return $this->render('@ChaosCompanyAdmin/Security/login.html.twig', array(
            'form' => $form->createView(),
            'error'         => $error,
        ));
    }

    public function logoutAction()
    {
        throw new \Exception('this shoold not be each');
    }
}