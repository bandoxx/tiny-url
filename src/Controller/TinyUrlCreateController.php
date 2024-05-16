<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/tinyurl', methods: 'POST')]
class TinyUrlCreateController extends AbstractController
{

    public function __invoke()
    {

    }

}