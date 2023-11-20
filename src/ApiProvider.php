<?php

namespace BusinessGazeta\AdfoxApi;

use BusinessGazeta\AdfoxApi\Enum\HttpMethodEnum;
use BusinessGazeta\AdfoxApi\Request\AdfoxRequestInterface;
use GuzzleHttp\Client;

class ApiProvider
{
    private Client $client;

    private string $endpointUrl;

    private array $headers;

    /**
     * @param string $endpointUrl
     */
    public function __construct(string $endpointUrl, string $token)
    {
        $this->endpointUrl = $endpointUrl;
        $this->headers = [
            'Authorization' => 'OAuth ' . $token
        ];
        $this->client = new Client(
            [
                'headers' => $this->headers
            ]
        );
    }

    public function addHeader(string $key, string $value): self
    {
        $this->headers[$key] = $value;
        return $this;
    }

    final public function execute(
        AdfoxRequestInterface $request
    ) {
        $method =$request->getMethod()->value;
        $params = $method === HttpMethodEnum::GET->value ? $request->params() : ['form_params' => $request->params()['query']];
        $response = $this->client->request(
            $method,
            $this->endpointUrl,
            $params
        )->getBody()->getContents();

        return $response;
    }
}
