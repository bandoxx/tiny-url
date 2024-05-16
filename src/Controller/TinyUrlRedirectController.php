<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/{slug}', methods: 'GET')]
class TinyUrlRedirectController extends AbstractController
{

    public function __invoke(string $slug)
    {

    }

}