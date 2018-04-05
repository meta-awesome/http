<?php

namespace Metawesome\Http;

use Throwable;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, PerformsRequests;

    public function getResponseData($response, $item = false) {
        try {
            $result = json_decode($response->getBody(), true);

            if (! empty($result['data'])) {
                return $item ? array_get($result['data'], $item) : $result['data'];
            }
        } catch (Throwable $e) {
            // noop
        }

        return [];
    }
}
