<?php

namespace Tleroch\AdminBundle\Model;

class Menu {

    /**
     * @var mixed
     */
    protected $identifier;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var string
     */
    protected $route;

    /**
     * @var array
     */
    protected $routeArgs = array();

    /**
     * @var bool
     */
    protected $isActive = false;

    /**
     * @var array
     */
    protected $children = array();

    /**
     * @var mixed
     */
    protected $icon = false;

    /**
     * @var mixed
     */
    protected $badge = false;

    /**
     * @var Menu
     */
    protected $parent = null;

    function __construct(
    $id, $label, $route, $routeArgs = array(), $icon = false, $badge = false
    ) {
        $this->identifier = $id;
        $this->label = $label;
        $this->route = $route;
        $this->routeArgs = $routeArgs;
        $this->icon = $icon;
        $this->badge = $badge;
    }

    /**
     * @param mixed $identifier
     *
     * @return $this
     */
    public function setIdentifier($identifier) {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdentifier() {
        return $this->identifier;
    }

    /**
     * @param string $label
     *
     * @return $this
     */
    public function setLabel($label) {
        $this->label = $label;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabel() {
        return $this->label;
    }

    /**
     * @param string $route
     *
     * @return $this
     */
    public function setRoute($route) {
        $this->route = $route;

        return $this;
    }

    /**
     * @return string
     */
    public function getRoute() {
        return $this->route;
    }

    /**
     * @param array $routeArgs
     *
     * @return $this
     */
    public function setRouteArgs($routeArgs) {
        $this->routeArgs = $routeArgs;

        return $this;
    }

    /**
     * @return array
     */
    public function getRouteArgs() {
        return $this->routeArgs;
    }

    /**
     * @param boolean $isActive
     *
     * @return $this
     */
    public function setIsActive($isActive) {
        if ($this->hasParent()) {
            $this->getParent()->setIsActive($isActive);
        }

        $this->isActive = $isActive;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getIsActive() {
        return $this->isActive;
    }

    /**
     * @param array $children
     */
    public function setChildren($children) {
        $this->children = $children;
    }

    /**
     * @return array
     */
    public function getChildren() {
        return $this->children;
    }

    /**
     * @param \Tleroch\AdminBundle\Model\Menu $parent
     *
     * @return $this
     */
    public function setParent(Menu $parent = null) {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return \Tleroch\AdminBundle\Model\Menu
     */
    public function getParent() {
        return $this->parent;
    }

    /**
     * @param mixed $badge
     *
     * @return $this
     */
    public function setBadge($badge) {
        $this->badge = $badge;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBadge() {
        return $this->badge;
    }

    /**
     * @param mixed $icon
     *
     * @return $this
     */
    public function setIcon($icon) {
        $this->icon = $icon;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIcon() {
        return $this->icon;
    }

    /**
     * @param Menu $child
     *
     * @return $this
     */
    public function addChild(Menu $child) {
        $child->setParent($this);
        $this->children[] = $child;

        return $this;
    }

    /**
     * @param Menu $child
     *
     * @return $this
     */
    public function removeChild(Menu $child) {
        if (false !== ($key = array_search($child, $this->children))) {
            unset($this->children[$key]);
        }

        return $this;
    }

    /**
     * @return bool
     */
    public function hasParent() {
        return ($this->parent instanceof Menu);
    }

    /**
     * @return bool
     */
    public function hasChildren() {
        return (sizeof($this->children) > 0);
    }

    /**
     * @return Menu|null
     */
    public function getActiveChild() {
        foreach ($this->children as $child) {
            if ($child->getIsActive()) {
                return $child;
            }
        }

        return null;
    }

}
