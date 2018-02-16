<?php

namespace ChaosCompany\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@ChaosCompanyAdmin/index.html.twig');
    }
}
