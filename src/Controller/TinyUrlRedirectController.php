<?php

namespace App\Controller;

use App\Service\TinyUrlProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/b/{slug}', methods: 'GET')]
class TinyUrlRedirectController extends AbstractController
{

    public function __invoke(string $slug, TinyUrlProvider $provider): RedirectResponse
    {
        return $this->redirect($provider->getRedirection($slug));
    }

}