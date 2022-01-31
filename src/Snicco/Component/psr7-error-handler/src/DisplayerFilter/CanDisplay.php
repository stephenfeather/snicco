<?php

declare(strict_types=1);

namespace Snicco\Component\Psr7ErrorHandler\DisplayerFilter;

use Psr\Http\Message\RequestInterface;
use Snicco\Component\Psr7ErrorHandler\Displayer\ExceptionDisplayer;
use Snicco\Component\Psr7ErrorHandler\Information\ExceptionInformation;

use function array_filter;

/**
 * @api
 */
final class CanDisplay implements Filter
{
    
    public function filter(array $displayers, RequestInterface $request, ExceptionInformation $info) :array
    {
        return array_filter($displayers, function (ExceptionDisplayer $displayer) use ($info) {
            return $displayer->canDisplay($info);
        });
    }
    
}