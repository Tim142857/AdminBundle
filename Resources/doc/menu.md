Create admin menu
=================

Step 1: Create sevice class
---------------------------

In your `AdminBundle`, create class:

```php
<?php

namespace AdminBundle\EventListener;

use Tleroch\AdminBundle\Model\Menu;
use Tleroch\AdminBundle\Event\SidebarMenuEvent;
use Symfony\Component\HttpFoundation\Request;

class MenuListener {

    public function onSetupMenu(SidebarMenuEvent $event)
    {
        $request = $event->getRequest();

        foreach ($this->getMenu($request) as $item)
        {
            $event->addItem($item);
        }
    }

    protected function getMenu(Request $request)
    {
        $items = array(
            new Menu('menu-1', 'Section', ''),
            new Menu('sub-menu-1', 'Menu 1', 'route')
        );

        return $items;
    }
}
```

You can configure your menu by creating [Menu](../Model/Menu.php) class.

Step 2: Activate service
------------------------

Enable service in `app/config/services.yml`
```
    app.menu_listener:
        class: AdminBundle\EventListener\MenuListener
        tags:
            - { name: kernel.event_listener, event: admin.sidebar_menu, method: onSetupMenu }
```
