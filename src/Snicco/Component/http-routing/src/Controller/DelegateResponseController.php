<?php

declare(strict_types=1);

namespace Snicco\Component\HttpRouting\Controller;

use Snicco\Component\HttpRouting\Http\Response\DelegatedResponse;

/**
 * @interal
 */
final class DelegateResponseController extends Controller
{

    public function __invoke(): DelegatedResponse
    {
        return $this->respond()->delegate(true);
    }

}