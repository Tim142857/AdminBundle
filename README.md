Requirements
============

This bundle require :

* [Assetic](http://symfony.com/doc/current/assetic/asset_management.html)
* [NodeJs](https://nodejs.org/en/download/package-manager/)
* [Less](http://lesscss.org/#using-less)

Installation
============

Step 1: Add repository to composer
----------------------------------

Open composer.json and add this section:

```
"repositories": [
        {
            "type": "vcs",
            "url":  "https://github.com/Tim142857/AdminBundle.git"
        }
    ]
```

You also need to allow unsecure url, add in section config:
```
"secure-http": false
```

Step 2: Download the Bundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```bash
$ composer require Tleroch/adminBundle
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 3: Enable the Bundle
-------------------------

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new SEL\AdminBundle\SELAdminBundle(),
        );

        // ...
    }

    // ...
}
```

Finaly add customer api key in `app/config/config.yml`
```
# Sel Admin
sel_admin:
    security_seed: 
    customer_email: 
    redirect_route: 
```

Step 4: Read documentation
--------------------------

You can now read documentation:

* [Parameters](Resources/doc/parameters.md)
* [Layout](Resources/doc/layout.md)
* [Menu](Resources/doc/menu.md)
* [Security](Resources/doc/security.md)