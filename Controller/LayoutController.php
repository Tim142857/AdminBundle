<?php

namespace Tleroch\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Tleroch\AdminBundle\Event\SidebarMenuEvent;
use Tleroch\AdminBundle\Event\AdminEvents;

class LayoutController extends Controller {

    private function getDispatcher() {
        return $this->get('event_dispatcher');
    }

    public function menuAction(Request $request) {
        if (!$this->getDispatcher()->hasListeners(AdminEvents::THEME_SIDEBAR_MENU)) {
            return new Response();
        }

        $menus = $this->getDispatcher()->dispatch(AdminEvents::THEME_SIDEBAR_MENU, new SidebarMenuEvent($request));

        return $this->render('SELAdminBundle:Default:menu.html.twig', array(
                    'menus' => $menus->getItems(),
                    'home_link' => $this->getParameter('sel_admin.redirect_route')
        ));
    }

    public function breadcrumbAction(Request $request, $title = '') {
        if (!$this->getDispatcher()->hasListeners(AdminEvents::THEME_BREADCRUMB)) {
            return new Response();
        }

        $active = $this->getDispatcher()->dispatch(AdminEvents::THEME_SIDEBAR_MENU, new SidebarMenuEvent($request))->getActive();

        $list = array();

        if ($active) {
//            $list[] = $active;
            while (null !== ($item = $active->getActiveChild())) {
                $list[] = $item;
                $active = $item;
            }
        }

//        if(empty($list))
//        {
//            return new Response();
//        }

        return $this->render('SELAdminBundle:Default:breadcrumb.html.twig', array(
                    'breadcrumbs' => $list,
                    'title' => $title,
                    'home_link' => $this->getParameter('sel_admin.redirect_route')
        ));
    }

}
