<?php

namespace BusinessGazeta\AdfoxApi;

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
        $response = $this->client->request(
            $request->getMethod()->value,
            $this->endpointUrl,
            $request->params()
        )->getBody()->getContents();

        return $response;
    }
}
