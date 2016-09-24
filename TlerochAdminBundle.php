<?php

namespace Tleroch\AdminBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Tleroch\AdminBundle\DependencyInjection\TlerochAdminExtension;

class SELAdminBundle extends Bundle {

    public function getContainerExtension() {
        if (null === $this->extension) {
            $this->extension = new TlerochAdminExtension();
        }

        return $this->extension;
    }

}
