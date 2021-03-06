<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpKernel\Exception\HttpException;

abstract class ApiService
{
    protected string $endpoint;

    protected array $headers = [];

    public function request($method, $path, $data = [])
    {
        $response = $this->getRequest($method, $path, $data);

        if ($response->successful()) {
            return $response->collect('data');
        }

        $this->errorHandler($response);
    }

    private function errorHandler($response)
    {
        $errorMessage = '';
        if (config('app.debug')) {
            $errorMessage .= get_called_class() . ' ==> ';
        }
        $errorMessage .= $response->collect('error')->implode(',');

        throw new HttpException($response->status(), $errorMessage);
    }

    public function getRequest($method, $path, $data = [])
    {
        $default_headers = [
            'Content-Type' => 'application/json',
            'Accept'       => 'application/json'
        ];

        $headers = $default_headers + $this->headers;

        return Http::acceptJson()->withHeaders($headers)->$method("{$this->endpoint}/{$path}", $data);
    }

    public function post($path, $data)
    {
        return $this->request('post', $path, $data);
    }

    public function get($path)
    {
        return $this->request('get', $path);
    }

    public function put($path, $data)
    {
        return $this->request('put', $path, $data);
    }

    public function delete($path)
    {
        return $this->request('delete', $path);
    }
}
