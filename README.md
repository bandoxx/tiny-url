# TinyURL application

This is portfolio project, that has the idea to be usable in real-world too.

## Stack

- Symfony 6.4 (LTS) / PHP 8.3 - Backend language
- MySQL 8 - Database
- docker-compose for local development environment
- RabbitMQ - Handling queues (TODO)
- Redis 6.2 - Caching mechanism (TODO)

## Setup for local environment

```bash
docker-compose build
docker-compose up -d


php bin/console doctrine:migrations:migrate
```