<?php

declare(strict_types=1);

namespace Snicco\Component\HttpRouting\Tests\fixtures;

use Psr\Http\Message\ResponseInterface;
use Snicco\Component\HttpRouting\Http\Psr7\Request;
use Snicco\Component\HttpRouting\Middleware\Middleware;
use Snicco\Component\HttpRouting\Middleware\NextMiddleware;
use Snicco\Component\HttpRouting\Tests\fixtures\TestDependencies\Bar;
use Snicco\Component\HttpRouting\Tests\fixtures\TestDependencies\Foo;

class MiddlewareWithDependencies extends Middleware
{
    public Foo $foo;

    public Bar $bar;

    public function __construct(Foo $foo, Bar $bar)
    {
        $this->foo = $foo;
        $this->bar = $bar;
    }

    public function handle(Request $request, NextMiddleware $next): ResponseInterface
    {
        $response = $next($request);

        $response->getBody()
            ->write(':' . $this->foo->value . $this->bar->value);

        return $response;
    }
}
