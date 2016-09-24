<?php

namespace Tleroch\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    public function authAction(Request $request, $token)
    {
        // TODO: Gestion connection admin

        $date = new \DateTime();

        if($token === sha1($this->getParameter('sel_admin.customer_email').'-'.$date->format('d-m-Y').'-'.$this->getParameter('sel_admin.security_seed')))
        {
            $session = $request->getSession();

            $session->set($this->getParameter('sel_admin.session_name'), $token);

            return $this->redirect($this->generateUrl($this->getParameter('sel_admin.redirect_route')));
        }

        return $this->redirect($request->getBaseUrl());
    }
}
