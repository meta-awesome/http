<?php

namespace Metawesome\Http;

use Psr\Http\Message\ResponseInterface;

trait PerformsRequests
{
    /**
     * @param       $path
     * @param array $query
     *
     * @return mixed|ResponseInterface
     */
    protected function get($path, array $query = [])
    {
        return $this->getWebserviceClient()->get($path, $query);
    }

    /**
     * @param       $path
     * @param array $query
     *
     * @return array
     */
    protected function getJson($path, array $query = [])
    {
        $json = json_decode($this->get($path, $query)->getBody());
        return $json->data ?? $json;
    }

    /**
     * @param       $path
     * @param array $payload
     *
     * @return mixed|ResponseInterface
     */
    protected function post($path, array $payload = [])
    {
        return $this->getWebserviceClient()->post($path, $payload);
    }

    /**
     * @param string $type
     * @param string $path
     * @param array  $params
     *
     * @return mixed|ResponseInterface
     */
    protected function request(string $type, string $path, array $params = [])
    {
        return $this->getWebserviceClient()->request($type, $path, $params);
    }

    /**
     * Retrieves the client singleton
     *
     * @return ClientContract
     */
    private function getWebserviceClient() : ClientContract
    {
        return app(ClientContract::class);
    }
}
