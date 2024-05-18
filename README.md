# TinyURL application

This is portfolio project, that has the idea to be usable in real-world too.

## Stack

- Symfony 6.4 (LTS) / PHP 8.3 - Backend language
- MySQL 8 - Database
- RabbitMQ - Handling queues (TODO)
- Redis 6.2 - Caching mechanism (TODO)
- docker-compose for local development environment

## Setup for local environment

```bash
docker-compose build
docker-compose up -d


php bin/console doctrine:migrations:migrate
```

## Stages
### 1. Stage - MVP [DONE]

Creating first version of TinyURL Service, which has 2 endpoints
- /api/tinyurl [POST] -> Creating tiny url
- /b/[slug] [GET] -> 302 redirecting

### 2. Stage [TODO]

- Add users - secure path for creating TinyURL (Bearer token)
- Caching mechanism for often used TinyURLs

### 3. Stage [TODO]

- Expiration date option for TinyURLs
- Garbage collection for unused/expired TinyURLs

### 4. Stage [TODO]
- Analytics, request tracker