<?php

declare(strict_types=1);

namespace Snicco\Bridge\SignedUrlMiddleware\Tests;

use Psr\Log\Test\TestLogger;
use Snicco\Component\SignedUrl\Secret;
use Snicco\Component\SignedUrl\UrlSigner;
use Snicco\Component\TestableClock\TestClock;
use Snicco\Component\SignedUrl\Hasher\Sha256Hasher;
use Snicco\Bridge\SignedUrlMiddleware\CollectGarbage;
use Snicco\Component\SignedUrl\Storage\InMemoryStorage;
use Snicco\Component\HttpRouting\Testing\MiddlewareTestCase;

final class CollectGarbageTest extends MiddlewareTestCase
{
    
    /** @test */
    public function test_next_is_called()
    {
        $middleware = new CollectGarbage(0, new InMemoryStorage(), new TestLogger());
        
        $this->runMiddleware($middleware, $this->frontendRequest())->assertNextMiddlewareCalled();
    }
    
    /** @test */
    public function garbage_collection_works()
    {
        $signer = new UrlSigner(
            $storage = new InMemoryStorage($test_clock = new TestClock()),
            new Sha256Hasher(Secret::generate())
        );
        
        $link1 = $signer->sign('/foo', 10);
        $link2 = $signer->sign('/bar', 10);
        $link3 = $signer->sign('/baz', 10);
        
        $this->assertCount(3, $storage->all());
        
        $middleware = new CollectGarbage(100, $storage, new TestLogger());
        
        $test_clock->travelIntoFuture(10);
        $response = $this->runMiddleware($middleware, $this->frontendRequest());
        $response->assertNextMiddlewareCalled();
        
        $this->assertCount(3, $storage->all());
        
        $test_clock->travelIntoFuture(1);
        $response = $this->runMiddleware($middleware, $this->frontendRequest());
        $response->assertNextMiddlewareCalled();
        
        $this->assertCount(0, $storage->all());
    }
    
}