<?php

declare(strict_types=1);

namespace Snicco\Component\Psr7ErrorHandler\Tests\DisplayerFilter;

use RuntimeException;
use Nyholm\Psr7\ServerRequest;
use PHPUnit\Framework\TestCase;
use Snicco\Component\Psr7ErrorHandler\DisplayerFilter\Verbosity;
use Snicco\Component\Psr7ErrorHandler\DisplayerFilter\Delegating;
use Snicco\Component\Psr7ErrorHandler\DisplayerFilter\ContentType;
use Snicco\Component\Psr7ErrorHandler\Displayer\ExceptionDisplayer;
use Snicco\Component\Psr7ErrorHandler\Information\ExceptionInformation;

use function array_values;

final class DelegatingTest extends TestCase
{
    
    /** @test */
    public function all_displayers_that_should_display_are_included()
    {
        $filter = new Delegating(
            new Verbosity(true),
            new ContentType()
        );
        
        $displayers = [
            $d1 = new VerbosePlain(),
            $d2 = new NonVerbosePlain(),
            $d3 = new VerboseJson(),
            $d4 = new NonVerboseJson(),
        ];
        
        $e = new RuntimeException();
        $info = new ExceptionInformation(500, 'foo_id', 'foo_title', 'foo_details', $e, $e);
        $request = new ServerRequest('GET', '/foo');
        
        $filtered = $filter->filter(
            $displayers,
            $request->withHeader('Accept', 'text/plain'),
            $info
        );
        
        $this->assertSame([$d1, $d2], array_values($filtered));
        $filtered = $filter->filter(
            $displayers,
            $request->withHeader('Accept', 'application/json'),
            $info
        );
        
        $this->assertSame([$d3, $d4], array_values($filtered));
        
        $filter = new Delegating(
            new Verbosity(false),
            new ContentType()
        );
        
        $filtered = $filter->filter(
            $displayers,
            $request->withHeader('Accept', 'text/plain'),
            $info
        );
        
        $this->assertSame([$d2], array_values($filtered));
    }
    
}

class VerbosePlain implements ExceptionDisplayer
{
    
    public function display(ExceptionInformation $exception_information) :string
    {
        return '';
    }
    
    public function supportedContentType() :string
    {
        return 'text/plain';
    }
    
    public function isVerbose() :bool
    {
        return true;
    }
    
    public function canDisplay(ExceptionInformation $exception_information) :bool
    {
        return true;
    }
    
}

class NonVerbosePlain implements ExceptionDisplayer
{
    
    public function display(ExceptionInformation $exception_information) :string
    {
        return '';
    }
    
    public function supportedContentType() :string
    {
        return 'text/plain';
    }
    
    public function isVerbose() :bool
    {
        return false;
    }
    
    public function canDisplay(ExceptionInformation $exception_information) :bool
    {
        return true;
    }
    
}

class VerboseJson implements ExceptionDisplayer
{
    
    public function display(ExceptionInformation $exception_information) :string
    {
        return '';
    }
    
    public function supportedContentType() :string
    {
        return 'application/json';
    }
    
    public function isVerbose() :bool
    {
        return true;
    }
    
    public function canDisplay(ExceptionInformation $exception_information) :bool
    {
        return true;
    }
    
}

class NonVerboseJson implements ExceptionDisplayer
{
    
    public function display(ExceptionInformation $exception_information) :string
    {
        return '';
    }
    
    public function supportedContentType() :string
    {
        return 'application/json';
    }
    
    public function isVerbose() :bool
    {
        return false;
    }
    
    public function canDisplay(ExceptionInformation $exception_information) :bool
    {
        return true;
    }
    
}