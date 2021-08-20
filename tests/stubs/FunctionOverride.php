<?php

/**
 * Override PHP namespaced functions into the Tests namespace.
 * header() and headers_sent() are from Zend-Diactoros zend-diactoros/test/TestAsset/Functions.php
 * and are Copyright (c) 2015-2016 Zend Technologies USA Inc. (http://www.zend.com) and are
 * licensed under the New BSD License at
 * https://github.com/zendframework/zend-diactoros/blob/master/LICENSE.md.
 */

declare(strict_types=1);

namespace Tests;

use Tests\stubs\HeaderStack;

/**
 * Have headers been sent?
 *
 * @return false
 */
function headers_sent() :bool
{
    return false;
}

/**
 * Emit a header, without creating actual output artifacts
 *
 * @param  string  $string
 * @param  bool  $replace
 * @param  int|null  $statusCode
 */
function header(string $string, bool $replace = true, int $statusCode = null)
{
    HeaderStack::push(
        [
            'header' => $string,
            'replace' => $replace,
            'status_code' => $statusCode,
        ]
    );
}

/**
 * Allows the mocking of invalid HTTP states.
 *
 * @return int
 */
function connection_status() :int
{
    if (isset($GLOBALS['connection_status_return'])) {
        return $GLOBALS['connection_status_return'];
    }
    
    return \connection_status();
}

function headers_list()
{
    
    $headers = [];
    
    foreach (HeaderStack::stack() as $header) {
        
        $headers[] = $header;
        
    }
    
    return $header;
    
    //return [
    //    0 => 'X-Powered-By: PHP/7.4.21',
    //    1 => 'Expires: Wed, 11 Jan 1984 05:00:00 GMT',
    //    2 => 'Cache-Control: no-cache, must-revalidate, max-age=0',
    //    3 => 'X-Frame-Options: SAMEORIGIN',
    //    4 => 'Referrer-Policy: strict-origin-when-cross-origin',
    //];
}