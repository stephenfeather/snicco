<?php


	declare( strict_types = 1 );


	namespace Tests\unit\Routing;


	use FastRoute\RouteCollector;
    use Mockery;
    use Tests\UnitTest;
    use Tests\traits\SetUpRouter;
    use Tests\stubs\Middleware\BarMiddleware;
	use Tests\stubs\Middleware\FooMiddleware;
	use Tests\stubs\Middleware\GlobalMiddleware;
    use WPEmerge\Facade\WP;
    use WPEmerge\Http\Request;

    use function FastRoute\simpleDispatcher;

    class RouteAttributesTest extends UnitTest {

		use SetUpRouter;

		const controller_namespace = 'Tests\stubs\Controllers\Web';

		protected function beforeTestRun()
        {
            $this->newRouter( $c = $this->createContainer() );
            WP::setFacadeContainer($c);
        }

        protected function beforeTearDown()
        {

            Mockery::close();
            WP::clearResolvedInstances();
            WP::setFacadeContainer(null);

        }




        /**
		 *
		 *
		 *
		 *
		 * BASIC ROUTING
		 *
		 *
		 *
		 *
		 */

		/** @test */
		public function basic_get_routing_works() {

			$this->router->get( '/foo' )->handle( function () {

				return 'foo';

			} );

			$response = $this->router->runRoute( $this->request( 'GET', '/foo' ) );

			$this->assertOutput( 'foo', $response );

			$response = $this->router->runRoute( $this->request( 'HEAD', '/foo' ) );

			$this->assertOutput( 'foo', $response );


		}

		/** @test */
		public function basic_post_routing_works() {

			$this->router->post( '/foo/' )->handle( function () {

				return 'foo';

			} );

			$response = $this->router->runRoute( $this->request( 'post', '/foo' ) );

			$this->assertOutput( 'foo', $response );

		}

		/** @test */
		public function basic_put_routing_works() {

			$this->router->put( '/foo' )->handle( function () {

				return 'foo';

			} );

			$response = $this->router->runRoute( $this->request( 'put', '/foo' ) );

			$this->assertOutput( 'foo', $response );

		}

		/** @test */
		public function basic_patch_routing_works() {

			$this->router->patch( '/foo' )->handle( function () {

				return 'foo';

			} );

			$response = $this->router->runRoute( $this->request( 'patch', '/foo' ) );

			$this->assertOutput( 'foo', $response );

		}

		/** @test */
		public function basic_delete_routing_works() {

			$this->router->delete( '/foo' )->handle( function () {

				return 'foo';

			} );

			$response = $this->router->runRoute( $this->request( 'delete', '/foo' ) );

			$this->assertOutput( 'foo', $response );

		}

		/** @test */
		public function basic_options_routing_works() {

			$this->router->options( '/foo' )->handle( function () {

				return 'foo';

			} );

			$response = $this->router->runRoute( $this->request( 'options', '/foo' ) );

			$this->assertOutput( 'foo', $response );

		}

		/** @test */
		public function a_route_can_match_all_methods() {

			$this->router->any( '/foo', function () {

				return 'foo';

			} );

			$response = $this->router->runRoute( $this->request( 'get', '/foo' ) );
			$this->assertOutput( 'foo', $response );

			$response = $this->router->runRoute( $this->request( 'post', '/foo' ) );
			$this->assertOutput( 'foo', $response );

			$response = $this->router->runRoute( $this->request( 'put', '/foo' ) );
			$this->assertOutput( 'foo', $response );

			$response = $this->router->runRoute( $this->request( 'patch', '/foo' ) );
			$this->assertOutput( 'foo', $response );

			$response = $this->router->runRoute( $this->request( 'delete', '/foo' ) );
			$this->assertOutput( 'foo', $response );

			$response = $this->router->runRoute( $this->request( 'options', '/foo' ) );
			$this->assertOutput( 'foo', $response );

		}

		/** @test */
		public function a_route_can_match_specific_methods() {

			$this->router->match( [ 'GET', 'POST' ], '/foo' )->handle( function () {

				return 'foo';

			} );

			$response = $this->router->runRoute( $this->request( 'get', '/foo' ) );
			$this->assertOutput( 'foo', $response );

			$response = $this->router->runRoute( $this->request( 'post', '/foo' ) );
			$this->assertOutput( 'foo', $response );

			$this->assertNullResponse( $this->router->runRoute( $this->request( 'put', '/foo' ) ) );

		}

		/** @test */
		public function the_route_handler_can_be_defined_in_the_http_verb_method() {

			$this->router->get( 'foo', function () {

				return 'foo';

			} );

			$response = $this->router->runRoute( $this->request( 'GET', '/foo' ) );

			$this->assertOutput( 'foo', $response );

		}

		/** @test */
		public function static_and_dynamic_routes_can_be_added_for_the_same_uri_while_static_routes_take_precedence() {

			$routes = function () {

				$this->router->post( '/foo/bar', function () {

					return 'foo_bar_static';

				} )->where( 'false' );

				$this->router->post( '/foo/baz', function () {

					return 'foo_baz_static';

				} );

				$this->router->post( '/foo/{dynamic}', function () {

					return 'dynamic_route';

				} );

			};

			$this->newRouterWith( $routes );
			$response = $this->router->runRoute( $this->request( 'POST', '/foo/bar' ) );
			$this->assertOutput( 'dynamic_route', $response );

			$this->newRouterWith( $routes );
			$response = $this->router->runRoute( $this->request( 'POST', '/foo/baz' ) );
			$this->assertOutput( 'foo_baz_static', $response );

			$this->newRouterWith( $routes );
			$response = $this->router->runRoute( $this->request( 'POST', '/foo/biz' ) );
			$this->assertOutput( 'dynamic_route', $response );

		}


		/**
		 *
		 *
		 *
		 *
		 *
		 * ROUTE ATTRIBUTES
		 *
		 *
		 *
		 *
		 *
		 */

		/** @test */
		public function all_http_verbs_can_be_defined_after_attributes_and_finalize_the_route() {


			$this->router->namespace( self::controller_namespace )
			             ->get( '/get1', 'RoutingController@foo' );
			$response = $this->router->runRoute( $this->request( 'GET', '/get1' ) );
			$this->assertOutput( 'foo', $response );

			$this->router->namespace( self::controller_namespace )
			             ->post( '/post1', 'RoutingController@foo' );
			$response = $this->router->runRoute( $this->request( 'POST', '/post1' ) );
			$this->assertOutput( 'foo', $response );

			$this->router->namespace( self::controller_namespace )
			             ->put( '/put1', 'RoutingController@foo' );
			$response = $this->router->runRoute( $this->request( 'PUT', '/put1' ) );
			$this->assertOutput( 'foo', $response );

			$this->router->namespace( self::controller_namespace )
			             ->patch( '/patch1', 'RoutingController@foo' );
			$response = $this->router->runRoute( $this->request( 'PATCH', '/patch1' ) );
			$this->assertOutput( 'foo', $response );

			$this->router->namespace( self::controller_namespace )
			             ->options( '/options1', 'RoutingController@foo' );
			$response = $this->router->runRoute( $this->request( 'OPTIONS', '/options1' ) );
			$this->assertOutput( 'foo', $response );

			$this->router->namespace( self::controller_namespace )
			             ->delete( '/delete1', 'RoutingController@foo' );
			$response = $this->router->runRoute( $this->request( 'DELETE', '/delete1' ) );
			$this->assertOutput( 'foo', $response );

			$routes = function () {

				$this->router->namespace( self::controller_namespace )
				             ->match( [ 'GET', 'POST' ], '/match1', 'RoutingController@foo' );


			};
			$this->newRouterWith( $routes );
			$response = $this->router->runRoute( $this->request( 'GET', '/match1' ) );
			$this->assertOutput( 'foo', $response );

			$routes = function () {

				$this->router->namespace( self::controller_namespace )
				             ->match( [ 'GET', 'POST' ], '/match2', 'RoutingController@foo' );

			};
			$this->newRouterWith( $routes );
			$response = $this->router->runRoute( $this->request( 'POST', '/match2' ) );
			$this->assertOutput( 'foo', $response );

			$routes = function () {

				$this->router->namespace( self::controller_namespace )
				             ->match( [ 'GET', 'POST' ], '/match3', 'RoutingController@foo' );

			};
			$this->newRouterWith( $routes );
			$response = $this->router->runRoute( $this->request( 'PUT', '/match3' ) );
			$this->assertNullResponse(  $response );

		}

		/** @test */
		public function a_route_namespace_can_be_set() {

			$this->router
				->get( '/foo' )
				->namespace( self::controller_namespace )
				->handle( 'RoutingController@foo' );

			$response = $this->router->runRoute( $this->request( 'GET', '/foo' ) );

			$this->assertOutput( 'foo', $response );

		}

		/** @test */
		public function a_route_namespace_can_be_set_before_the_http_verb() {

			$this->router
				->namespace( self::controller_namespace )
				->get( '/foo' )
				->handle( 'RoutingController@foo' );

			$response = $this->router->runRoute( $this->request( 'GET', '/foo' ) );

			$this->assertOutput( 'foo', $response );

		}

		/** @test */
		public function middleware_can_be_set() {

			$this->router
				->get( '/foo' )
				->middleware( 'foo' )
				->handle( function ( Request $request ) {

					return $request->body;

				} );

			$this->router->aliasMiddleware( 'foo', FooMiddleware::class );

			$response = $this->router->runRoute( $this->request( 'GET', '/foo' ) );

			$this->assertOutput( 'foo', $response );

		}

		/** @test */
		public function a_route_can_have_multiple_middleware() {

			$this->router
				->get( '/foo' )
				->middleware( [ 'foo', 'bar' ] )
				->handle( function ( Request $request ) {

					return $request->body;

				} );

			$this->router->aliasMiddleware( 'foo', FooMiddleware::class );
			$this->router->aliasMiddleware( 'bar', BarMiddleware::class );

			$response = $this->router->runRoute( $this->request( 'GET', '/foo' ) );

			$this->assertOutput( 'foobar', $response );


		}

		/** @test */
		public function middleware_can_pass_arguments() {

			$this->router
				->get( '/foo' )
				->middleware( [ 'foo:foofoo', 'bar:barbar' ] )
				->handle( function ( Request $request ) {

					return $request->body;

				} );

			$this->router->aliasMiddleware( 'foo', FooMiddleware::class );
			$this->router->aliasMiddleware( 'bar', BarMiddleware::class );

			$response = $this->router->runRoute( $this->request( 'GET', '/foo' ) );

			$this->assertOutput( 'foofoobarbar', $response);

		}

		/** @test */
		public function global_middleware_gets_merged_for_all_routes_if_set() {

			$this->router
				->get( '/foo' )
				->middleware( 'foo' )
				->handle( function ( Request $request ) {

					return $request->body;

				} );

			$this->router->middlewareGroup( 'global', [ GlobalMiddleware::class ] );
			$this->router->aliasMiddleware( 'foo', FooMiddleware::class );

			$response = $this->router->runRoute( $this->request( 'GET', '/foo' ) );
			$this->assertOutput( 'global_foo', $response );

			$this->router
				->post( '/bar' )
				->middleware( 'bar' )
				->handle( function ( Request $request ) {

					return $request->body;

				} );

			$this->router->middlewareGroup( 'global', [ GlobalMiddleware::class ] );
			$this->router->aliasMiddleware( 'bar', BarMiddleware::class );

			$response = $this->router->runRoute( $this->request( 'POST', '/bar' ) );
			$this->assertOutput( 'global_bar', $response );


		}

		/** @test */
		public function middleware_can_be_set_before_the_http_verb() {

			$this->router
				->middleware( 'foo' )
				->get( '/foo' )
				->handle( function ( Request $request ) {

					return $request->body;

				} );

			$this->router->aliasMiddleware( 'foo', FooMiddleware::class );
			$this->router->aliasMiddleware( 'bar', BarMiddleware::class );

			$response = $this->router->runRoute( $this->request( 'GET', '/foo' ) );

			$this->assertOutput( 'foo', $response );

			// As array.
			$this->router
				->middleware( [ 'foo', 'bar' ] )
				->post( '/bar' )
				->handle( function ( Request $request ) {

					return $request->body;

				} );

			$response = $this->router->runRoute( $this->request( 'POST', '/bar' ) );
			$this->assertOutput( 'foobar', $response );

			// With Args
			$this->router
				->middleware( [ 'foo:FOO', 'bar:BAR' ] )
				->put( '/baz' )
				->handle( function ( Request $request ) {

					return $request->body;

				} );

			$response = $this->router->runRoute( $this->request( 'PUT', '/baz' ) );
			$this->assertOutput( 'FOOBAR', $response );


		}




	}
