<?php


    declare(strict_types = 1);


    namespace WPEmerge\Controllers;

    use WPEmerge\Contracts\ResponseFactory;
    use WPEmerge\Factories\ConditionFactory;
    use WPEmerge\Factories\RouteActionFactory;
    use WPEmerge\Http\Request;
    use WPEmerge\Routing\Route;
    use WPEmerge\Routing\RouteCollection;

    class FallBackController
    {

        /**
         * @var RouteCollection
         */
        private $routes;

        /**
         * @var ResponseFactory
         */
        private $response;


        /**
         * @var callable
         */
        private $fallback_handler;

        public function __construct(
            RouteCollection $routes,
            ResponseFactory $response
        ) {

            $this->routes = $routes;
            $this->response = $response;

        }

        public function handle(Request $request)
        {

            $possible_routes = collect($this->routes->withWildCardUrl($request->getMethod()));

            /** @var Route $route */
            $route = $possible_routes->first(function (Route $route) use ($request) {

                $route->instantiateConditions();
                return $route->satisfiedBy($request);

            });

            if ( ! $route ) {

                return ($this->fallback_handler)
                    ? call_user_func($this->fallback_handler, $request)
                    : $this->response->null();

            }

            $route->instantiateAction();

            return $route->run($request);

        }

        public function setFallbackHandler(callable $fallback_handler)
        {

            $this->fallback_handler = $fallback_handler;
        }


    }