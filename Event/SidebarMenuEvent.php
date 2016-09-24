<?php

namespace Tleroch\AdminBundle\Event;

use Tleroch\AdminBundle\Model\Menu;
use Tleroch\AdminBundle\Event\AdminEvent;
use Symfony\Component\HttpFoundation\Request;

class SidebarMenuEvent extends AdminEvent {

    /**
     * @var array
     */
    protected $menuRootItems = array();

    /**
     * @var Request
     */
    protected $request;

    function __construct($request = null) {
        $this->request = $request;
    }

    /**
     * @return Request
     */
    public function getRequest() {
        return $this->request;
    }

    /**
     * @return array
     */
    public function getItems() {
        return $this->menuRootItems;
    }

    /**
     * @param Menu $item
     */
    public function addItem(Menu $item) {
        $this->menuRootItems[$item->getIdentifier()] = $item;
    }

    /**
     * @param $id
     *
     * @return null
     */
    public function getRootItem($id) {
        return isset($this->menuRootItems[$id]) ? $this->menuRootItems[$id] : null;
    }

    /**
     * @return Menu|null
     */
    public function getActive() {

        foreach ($this->getItems() as $item) { /** @var $item Menu */
            if ($item->getIsActive()) {
                return $item;
            }
        }

        return null;
    }

}
