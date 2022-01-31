<?php

declare(strict_types=1);

namespace Snicco\Component\SignedUrl\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Snicco\Component\SignedUrl\Secret;

final class SecretTest extends TestCase
{
    
    /** @test */
    public function testErrorForWeakStrength()
    {
        $this->expectException(InvalidArgumentException::class);
        
        Secret::generate(15);
    }
    
    /** @test */
    public function testWorksForMinStrength16()
    {
        $secret = Secret::generate(16);
        $this->assertInstanceOf(Secret::class, $secret);
        $this->assertIsString($secret->asString());
    }
    
    /** @test */
    public function testFromStored()
    {
        $secret = Secret::generate();
        
        // store $secret
        $stored = $secret->asString();
        
        $secret_new = Secret::fromHexEncoded($stored);
        $this->assertSame($secret->asString(), $secret_new->asString());
    }
    
    /** @test */
    public function testExceptionIfClearlyBadStringIsPassed()
    {
        $this->expectException(InvalidArgumentException::class);
        $secret_new = Secret::fromHexEncoded('badsecret');
    }
    
    /** @test */
    public function testByteStringStaysSame()
    {
        $secret = Secret::generate();
        
        $bytes = $secret->asBytes();
        
        // store $secret
        $stored = $secret->asString();
        
        $secret_new = Secret::fromHexEncoded($stored);
        $this->assertSame($secret->asString(), $secret_new->asString());
        $this->assertSame($bytes, $secret_new->asBytes());
    }
    
}