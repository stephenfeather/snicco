<?php

declare(strict_types=1);

namespace Snicco\Component\HttpRouting\Tests\Routing;

use Snicco\Component\HttpRouting\Tests\HttpRunnerTestCase;
use Snicco\Component\Core\Configuration\WritableConfig;
use Snicco\Component\HttpRouting\Tests\fixtures\Conditions\TrueRouteCondition;
use Snicco\Component\HttpRouting\Tests\fixtures\Conditions\MaybeRouteCondition;
use Snicco\Component\HttpRouting\Tests\fixtures\Conditions\FalseRouteCondition;
use Snicco\Component\HttpRouting\Tests\fixtures\Controller\RoutingTestController;
use Snicco\Component\HttpRouting\Tests\fixtures\Conditions\RouteConditionWithDependency;

class RouteConditionsTest extends HttpRunnerTestCase
{
    
    /** @test */
    public function custom_conditions_can_be_added_as_a_full_namespace()
    {
        $this->routeConfigurator()
             ->get('r1', '/foo', RoutingTestController::class)
             ->condition(MaybeRouteCondition::class, true);
        
        $this->routeConfigurator()
             ->get('r2', '/bar', RoutingTestController::class)
             ->condition(MaybeRouteCondition::class, false);
        
        $request = $this->frontendRequest('/foo');
        $this->runKernel($request)->assertOk()->assertSeeText(RoutingTestController::static);
        
        $request = $this->frontendRequest('/bar');
        $this->runKernel($request)->assertDelegated();
    }
    
    /** @test */
    public function the_route_does_not_match_if_the_path_matches_but_the_condition_does_not()
    {
        $this->routeConfigurator()
             ->get('r1', '/foo/bar', RoutingTestController::class)
             ->condition(MaybeRouteCondition::class, false);
        
        $this->routeConfigurator()
             ->get('r2', '/foo/{param}', [RoutingTestController::class, 'dynamic'])
             ->condition(MaybeRouteCondition::class, true);
        
        $request = $this->frontendRequest('/foo/bar');
        
        // The static route does not match due to the failing condition.
        $this->runKernel($request)->assertSeeText('dynamic:bar');
    }
    
    /** @test */
    public function multiple_conditions_can_be_combined_and_all_conditions_have_to_pass()
    {
        $GLOBALS['test']['maybe_condition_run'] = 0;
        
        $this->routeConfigurator()
             ->post('r1', '/foo', RoutingTestController::class)
             ->condition(MaybeRouteCondition::class, true)
             ->condition(FalseRouteCondition::class);
        
        $this->routeConfigurator()
             ->post('r2', '/bar', RoutingTestController::class)
             ->condition(MaybeRouteCondition::class, true)
             ->condition(TrueRouteCondition::class);
        
        $request = $this->frontendRequest('/foo', [], 'POST');
        $this->runKernel($request)->assertDelegated();
        
        $this->assertSame(1, $GLOBALS['test']['maybe_condition_run']);
        
        $request = $this->frontendRequest('/bar', [], 'POST');
        $this->runKernel($request)->assertOk();
        
        $this->assertSame(2, $GLOBALS['test']['maybe_condition_run']);
    }
    
    /** @test */
    public function a_condition_can_be_negated()
    {
        $config = new WritableConfig();
        $this->container[WritableConfig::class] = $config;
        $config->set('foo', 'FOO_CONFIG');
        
        $this->container->instance(RouteConditionWithDependency::class, function ($pass) {
            return new RouteConditionWithDependency(
                $this->container[WritableConfig::class],
                $pass
            );
        });
        
        $this->routeConfigurator()->get(
            'r1',
            '/foo/{param}',
            [RoutingTestController::class, 'twoParams']
        )->condition(
            RouteConditionWithDependency::class,
            false
        );
        
        $this->routeConfigurator()->get(
            'r2',
            '/bar/{param}',
            [RoutingTestController::class, 'twoParams']
        )
             ->condition
             (
                 '!',
                 RouteConditionWithDependency::class,
                 false
             );
        
        $response = $this->runKernel($this->frontendRequest('/foo/bar'));
        $response->assertDelegated();
        
        $response = $this->runKernel($this->frontendRequest('/bar/baz'));
        $response->assertOk()->assertSeeText('baz:FOO_CONFIG');
    }
    
}