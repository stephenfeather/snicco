<?php

declare(strict_types=1);

namespace Snicco\Component\HttpRouting\Routing\UrlMatcher;

use RuntimeException;
use Snicco\Component\HttpRouting\Routing\Route\Route;
use Snicco\Component\StrArr\Str;

use function count;
use function preg_match;
use function preg_quote;
use function preg_replace_callback;
use function rtrim;
use function sprintf;
use function str_repeat;
use function str_replace;
use function strlen;

/**
 * @psalm-immutable
 *
 * @interal
 * @psalm-internal Snicco\Component\HttpRouting
 */
final class FastRouteSyntaxConverter
{

    public function convert(Route $route): string
    {
        $route_url = $route->getPattern();
        $match_only_trailing = false;
        $is_optional = Str::contains($route_url, '?}');

        if (Str::endsWith($route_url, '?}/')) {
            $match_only_trailing = true;
        }

        $url = $this->convertOptionalSegments(
            $route_url,
            $route->getOptionalSegmentNames(),
            $match_only_trailing
        );

        foreach ($route->getRequirements() as $param_name => $pattern) {
            $url = $this->addCustomRegexToSegments($param_name, $pattern, $url);
        }

        if ($match_only_trailing && $is_optional) {
            $url = $this->ensureOptionalRouteCanMatchWithTrailingSlash($url);
        }

        return $url;
    }

    /**
     * This method makes sure that /foo/{bar?}/{baz?} becomes /foo[/{bar}[/{baz}]]
     *
     * @param string[] $optional_segment_names
     */
    private function convertOptionalSegments(
        string $url_pattern,
        array $optional_segment_names,
        bool $match_only_trailing
    ): string {
        if (!count($optional_segment_names)) {
            return $url_pattern;
        }

        foreach ($optional_segment_names as $name) {
            $replace_with = $match_only_trailing ? '/[{' . $name . '}]' : '[/{' . $name . '}]';

            $url_pattern = str_replace('/{' . $name . '?}', $replace_with, $url_pattern);

            $url_pattern = $this->mergeOptionalSegments($url_pattern);
        }

        return $url_pattern;
    }

    private function mergeOptionalSegments(string $url_pattern): string
    {
        preg_match('/(\[(.*?)])/', $url_pattern, $matches);

        if (!isset($matches[0])) {
            // @codeCoverageIgnoreStart
            return $url_pattern;
            // @codeCoverageIgnoreEnd
        }

        $first = $matches[0];

        $before = Str::beforeFirst($url_pattern, $first);
        $after = Str::afterLast($url_pattern, $first);

        return $before . rtrim($first, ']') . rtrim($after, '/') . ']';
    }

    private function addCustomRegexToSegments(string $param_name, string $pattern, string $url): string
    {
        $regex = $this->replaceEscapedForwardSlashes($pattern);

        $pattern = sprintf("/(%s(?=\\}))/", preg_quote($param_name, '/'));

        $url = preg_replace_callback($pattern, function (array $match) use ($regex) {
            if (!isset($match[0])) {
                // @codeCoverageIgnoreStart
                return $regex;
                // @codeCoverageIgnoreEnd
            }
            return $match[0] . ':' . $regex;
        }, $url, 1);

        if (null == $url) {
            // @codeCoverageIgnoreStart
            throw new RuntimeException("preg_replace_callback returned an error for url [$url].");
            // @codeCoverageIgnoreEnd
        }

        return rtrim($url, '/');
    }

    /**
     * @note Fast Route uses unescaped forward slashes and wraps the entire regex in ~ chars.
     */
    private function replaceEscapedForwardSlashes(string $regex): string
    {
        return str_replace('\\/', '/', $regex);
    }

    private function ensureOptionalRouteCanMatchWithTrailingSlash(string $url): string
    {
        $l1 = strlen($url);
        $url = rtrim($url, ']');
        $l2 = strlen($url);
        $url .= '[/]' . str_repeat(']', $l1 - $l2);
        return $url;
    }

}