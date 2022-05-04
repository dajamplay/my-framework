<?php

namespace Framework\Http;

class Request
{
    private array $queryParams;
    private mixed $parsedBody;

    public function __construct(array $queryParams = [], array|string $parsedBody = null)
    {
        $this->queryParams = $queryParams;
        $this->parsedBody = $parsedBody;
    }

    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    /**
     * Функция мутатор
     */
    public function withQueryParams(array $query): self
    {
        /**
         * Clone для создания иммутабельных объектов
         * Пораждает новые объекты, вместо изменения старого
         */
        $new = clone $this;
        $new->queryParams = $query;
        return $new;
    }

    public function getParsedBody(): mixed
    {
        return $this->parsedBody;
    }

    public function withParsedBody(mixed $data): self
    {
        $new = clone $this;
        $new->parsedBody = $data;
        return $new;
    }
}