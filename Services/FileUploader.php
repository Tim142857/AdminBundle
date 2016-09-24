<?php

namespace Tleroch\AdminBundle\Services;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\DependencyInjection\ContainerInterface; 
use Symfony\Component\HttpFoundation\File\File;

class FileUploader
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function upload($target, UploadedFile $file)
    {
        $fileName = md5(uniqid()).'.'.$file->getClientOriginalExtension();

        $file->move($this->container->get('kernel')->getRootDir().'/../web/'.$target, $fileName);

        return new File($this->container->get('kernel')->getRootDir().'/../web/'.$target.$fileName);
    }
}