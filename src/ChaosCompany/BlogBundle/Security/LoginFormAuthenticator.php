<?php

namespace ChaosCompany\BlogBundle\Security;

use ChaosCompany\BlogBundle\Form\LoginForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;

class LoginFormAuthenticator extends AbstractFormLoginAuthenticator
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var RouterInterface
     */
    private $router;
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(FormFactoryInterface $formFactory, EntityManagerInterface $em, RouterInterface $router, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->formFactory = $formFactory;
        $this->em = $em;
        $this->router = $router;
        $this->passwordEncoder = $passwordEncoder;
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $username = $credentials['_username'];
        
        return $this->em->getRepository('ChaosCompanyBlogBundle:User')
            ->findOneBy(['email' => $username]);
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        $password = $credentials['_password'];
        if($this->passwordEncoder->isPasswordValid($user, $password)){
            return true;
        }

        return false;
    }

    public function getCredentials(Request $request)
    {
        $isLoginSubmit = $request->getPathInfo() === '/login' && $request->isMethod('POST');
        if(!$isLoginSubmit){
            return null;
        }

        $form = $this->formFactory->create(LoginForm::class);
        $form->handleRequest($request);
        $data = $form->getData();
        
        $request->getSession()->set(Security::LAST_USERNAME, $data['_username']);

        return $data;
    }

    protected function getLoginUrl()
    {
        return $this->router->generate('chaos_company_blog_security_login');
    }

    protected function getDefaultSuccessRedirectUrl()
    {
        return $this->router->generate('chaos_company_blog_homepage');
    }
}