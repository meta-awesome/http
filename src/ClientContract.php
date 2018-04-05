<?php

namespace Metawesome\Http;

/**
 * Interface ClientContract
 *
 * @package Unimed\Contracts\Core
 */
interface ClientContract
{
    /**
     * @param string $type
     * @param string $path
     * @param array  $params
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function request(string $type, string $path, array $params = []);


    /**
     * @param string $path
     * @param array  $query
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get(string $path, array $query = []);

    /**
     * @param string $path
     * @param array  $payload
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function post(string $path, array $payload = []);
}
