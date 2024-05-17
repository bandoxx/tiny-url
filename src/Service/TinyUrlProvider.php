<?php

namespace App\Service;

use App\Repository\TinyUrlRepository;
use Psr\Cache\CacheItemPoolInterface;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class TinyUrlProvider
{

    public function __construct(
        private readonly TinyUrlRepository $tinyUrlRepository,
        private readonly CacheItemPoolInterface $cacheItemPool
    ) {}

    public function getRedirection(string $slug): string
    {
        $key = sprintf('url.%s', $slug);

        $cache = $this->cacheItemPool->getItem($key);

        if ($cache->isHit()) {
            return $cache->get();
        }

        $tinyUrl = $this->tinyUrlRepository->findOneBy(['slug' => $slug]);

        if (!$tinyUrl) {
            throw new BadRequestException("Redirection is invalid.");
        }

        $cache->set($tinyUrl->getRedirectUrl());
        $cache->expiresAfter(new \DateInterval('P1D'));

        $this->cacheItemPool->save($cache);

        return $tinyUrl->getRedirectUrl();
    }

}