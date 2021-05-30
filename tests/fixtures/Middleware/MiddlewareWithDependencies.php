<?php


	declare( strict_types = 1 );


	namespace Tests\fixtures\Middleware;

	use Tests\fixtures\TestDependencies\Bar;
	use Tests\fixtures\TestDependencies\Foo;
    use WPEmerge\Contracts\Middleware;
    use WPEmerge\Http\Psr7\Request;
    use WPEmerge\Http\Delegate;

    class MiddlewareWithDependencies extends Middleware {

		/** @var Foo */
		private $foo;
		/** @var Bar */
		private $bar;


		public function __construct( Foo $foo, Bar $bar ) {

			$this->foo = $foo;
			$this->bar = $bar;

		}

		public function handle(Request $request, Delegate $next ) {

			$request->body = $this->foo->foo . $this->bar->bar;

			return $next($request);


		}


	}