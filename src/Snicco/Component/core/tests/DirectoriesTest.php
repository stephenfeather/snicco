<?php

declare(strict_types=1);

namespace Snicco\Component\Core\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Snicco\Component\Core\Directories;

final class DirectoriesTest extends TestCase
{
    
    private string $valid_base_dir;
    
    protected function setUp() :void
    {
        parent::setUp();
        $this->valid_base_dir = __DIR__.'/fixtures';
    }
    
    /** @test */
    public function test_from_defaults()
    {
        $dirs = Directories::fromDefaults($this->valid_base_dir);
        
        $this->assertInstanceOf(Directories::class, $dirs);
    }
    
    /** @test */
    public function test_exception_if_base_directory_is_not_readable()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('$base_directory [bogus] is not readable.');
        
        $dirs = Directories::fromDefaults('bogus');
    }
    
    /** @test */
    public function test_config_directory()
    {
        $dirs = Directories::fromDefaults($this->valid_base_dir);
        
        $this->assertSame($this->valid_base_dir.'/config', $dirs->configDir());
    }
    
    /** @test */
    public function test_cache_directory()
    {
        $dirs = Directories::fromDefaults($this->valid_base_dir);
        
        $this->assertSame($this->valid_base_dir.'/var/cache', $dirs->cacheDir());
    }
    
    /** @test */
    public function test_log_directory()
    {
        $dirs = Directories::fromDefaults($this->valid_base_dir);
        
        $this->assertSame($this->valid_base_dir.'/var/log', $dirs->logDir());
    }
    
    /** @test */
    public function test_exception_if_config_dir_not_readable()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            sprintf('$config_dir [%s] is not readable', __DIR__.'/config')
        );
        
        $dirs = new Directories(__DIR__, __DIR__.'/config', __DIR__.'/cache', __DIR__.'/log');
    }
    
    /** @test */
    public function test_exception_if_cache_dir_not_readable()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            sprintf('$cache_dir [%s] is not readable', __DIR__.'/cache')
        );
        
        $dirs = new Directories(
            $this->valid_base_dir,
            $this->valid_base_dir.'/config',
            __DIR__.'/cache',
            __DIR__.'/log'
        );
    }
    
    /** @test */
    public function test_exception_if_log_dir_not_readable()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            sprintf('$log_dir [%s] is not readable', __DIR__.'/log')
        );
        
        $dirs = new Directories(
            $this->valid_base_dir,
            $this->valid_base_dir.'/config',
            $this->valid_base_dir.'/var/cache',
            __DIR__.'/log'
        );
    }
    
}