<?php


    declare(strict_types = 1);


    namespace Tests\integration\ServiceProviders;

    use Tests\IntegrationTest;
    use Tests\stubs\Middleware\FooMiddleware;
    use Tests\stubs\Middleware\GlobalMiddleware;
    use Tests\stubs\TestApp;
    use Tests\unit\Routing\Foo;
    use WPEmerge\Contracts\ResponseFactory;
    use WPEmerge\Http\HttpKernel;
    use WPEmerge\Http\HttpResponseFactory;

    class HttpServiceProviderTest extends IntegrationTest
    {


        /** @test */
        public function the_kernel_can_be_resolved_correctly()
        {

            $this->newTestApp();

            $this->assertInstanceOf(HttpKernel::class, TestApp::resolve(HttpKernel::class));


        }

        /** @test */
        public function the_response_factory_can_be_resolved()
        {

            $this->newTestApp();

            $this->assertInstanceOf(HttpResponseFactory::class, TestApp::resolve(ResponseFactory::class));

        }

        /** @test */
        public function middleware_aliases_are_bound()
        {

            $this->newTestApp([
                'middleware' => [
                    'aliases' => [
                        'foo' => Foo::class,
                    ],
                ],
            ]);

            $aliases = TestApp::config('middleware.aliases', []);

            $this->assertArrayHasKey('csrf', $aliases);
            $this->assertArrayHasKey('auth', $aliases);
            $this->assertArrayHasKey('guest', $aliases);
            $this->assertArrayHasKey('can', $aliases);
            $this->assertArrayHasKey('foo', $aliases);

        }

        /** @test */
        public function middleware_groups_are_bound()
        {

            $this->newTestApp([
                'middleware' => [
                    'groups' => [
                        'dashboard' => 'DashBoardMiddleware',
                    ],
                ],
            ]);

            $m_groups = TestApp::config('middleware.groups', []);

            $this->assertArrayHasKey('global', $m_groups);
            $this->assertArrayHasKey('web', $m_groups);
            $this->assertArrayHasKey('admin', $m_groups);
            $this->assertArrayHasKey('ajax', $m_groups);
            $this->assertArrayHasKey('dashboard', $m_groups);

        }

        /** @test */
        public function middleware_priority_is_set()
        {

            $this->newTestApp([
                'middleware' => [
                    'priority' => [
                        FooMiddleware::class,
                    ],
                ],
            ]);

            $priority = TestApp::config('middleware.priority', []);

            $this->assertContains(FooMiddleware::class, $priority);


        }

        /** @test */
        public function no_global_middleware_is_run_by_default () {

            $this->newTestApp();


            $this->assertFalse(TestApp::config('always_run_middleware', ''));


        }

    }
