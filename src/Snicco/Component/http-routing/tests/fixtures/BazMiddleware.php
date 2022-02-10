<?php

declare(strict_types=1);

namespace Snicco\Component\HttpRouting\Tests\fixtures;

use Psr\Http\Message\ResponseInterface;
use Snicco\Component\HttpRouting\Middleware;
use Snicco\Component\HttpRouting\Http\Psr7\Request;

class BazMiddleware extends Middleware
{

    private string $baz;

    public function __construct($baz = 'baz_middleware')
    {
        $this->baz = $baz;
    }

    public function handle(Request $request, $next): ResponseInterface
    {
        $response = $next($request);

        $response->getBody()->write(':' . $this->baz);
        return $response;
    }

}