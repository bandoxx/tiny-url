<?php

namespace App\Controller;

use App\Form\TinyUrlType;
use App\Service\SlugKeyGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;
use App\Entity\TinyUrl;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;

#[Route(path: '/api/tinyurl', methods: 'POST')]
class TinyUrlCreateController extends AbstractController
{
    #[OA\RequestBody(attachables: [new Model(type: TinyUrl::class, groups: ['create'])])]
    public function __invoke(Request $request, EntityManagerInterface $entityManager, RouterInterface $router): JsonResponse
    {
        $tinyUrl = new TinyUrl();

        $form = $this->createForm(TinyUrlType::class, $tinyUrl);

        $form->submit(json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR));

        if ($form->isValid()) {
            $tinyUrl->setSlug(SlugKeyGenerator::generate());

            $entityManager->persist($tinyUrl);
            $entityManager->flush();

            $redirectUrl = $router->generate(TinyUrlRedirectController::class, [
                'slug' => $tinyUrl->getSlug()
            ], UrlGeneratorInterface::ABSOLUTE_URL);

            return $this->json($redirectUrl, Response::HTTP_CREATED);
        }

        return $this->json("Request is not valid.", Response::HTTP_BAD_REQUEST);
    }

}