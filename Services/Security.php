<?php

namespace Tleroch\AdminBundle\Services;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Security {
    private $requestStack;

    private $container;

    public function __construct(RequestStack $requestStack, ContainerInterface $container)
    {
        $this->requestStack = $requestStack;
        $this->container = $container;
    }

    public function verify()
    {
        $session = new Session();

        $token = $session->get($this->container->getParameter('sel_admin.session_name'));
        $date = new \DateTime();

        if($token === sha1($this->container->getParameter('sel_admin.customer_email').'-'.$date->format('d-m-Y').'-'.$this->container->getParameter('sel_admin.security_seed')))
        {
            // TODO: Check yesterday?
            return true;
        }

        return false;
    }
}