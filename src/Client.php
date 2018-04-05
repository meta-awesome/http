<?php

namespace Metawesome\Http;

use GuzzleHttp\Client as GuzzleClient;
use Unimed\Contracts\Core\ClientContract;

/**
 * Class Client
 *
 * @package Unimed\Core
 */
class Client implements ClientContract
{
    /**
     * @var GuzzleClient
     */
    protected $guzzleClient;

    /**
     * Client constructor.
     *
     * @param $guzzleClient
     */
    public function __construct(GuzzleClient $guzzleClient)
    {
        $this->guzzleClient = $guzzleClient;
    }

    /**
     * @param string $type
     * @param string $path
     * @param array  $params
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function request(string $type, string $path, array $params = [])
    {
        return $this->guzzleClient->request($type, $path, $params);
    }

    /**
     * @param string $path
     * @param array  $query
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get(string $path, array $query = [])
    {
        return $this->request('GET', $path, ['query' => $query]);
    }

    /**
     * @param string $path
     * @param array  $payload
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function post(string $path, array $payload = [])
    {
        return $this->request('POST', $path, ['form_params' => $payload]);
    }
}
