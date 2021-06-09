<?php


    declare(strict_types = 1);


    namespace WPEmerge\Session\Middleware;

    use Carbon\Carbon;
    use Psr\Http\Message\ResponseInterface;
    use WPEmerge\Contracts\Middleware;
    use WPEmerge\Events\IncomingGlobalRequest;
    use WPEmerge\Http\Cookies;
    use WPEmerge\Http\Delegate;
    use WPEmerge\Http\Psr7\Request;
    use WPEmerge\Http\Psr7\Response;
    use WPEmerge\Http\Responses\NullResponse;
    use WPEmerge\Session\Session;


    class StartSessionMiddleware extends Middleware
    {

        /**
         * @var Session
         */
        private $session_store;

        /**
         * @var array|int[]
         */

        /**
         * @var array
         */
        private $config;

        /**
         * @var Cookies
         */
        private $cookies;

        public function __construct(Session $session_store, Cookies $cookies, array $config)
        {

            $this->session_store = $session_store;
            $this->config = $config;
            $this->cookies = $cookies;

        }

        public function handle(Request $request, Delegate $next) : ResponseInterface
        {

            $this->collectGarbage();

            $session = $request->getSession();

            if ( $session === null ) {

                $session = $this->getSession($request);
                $this->startSession($session, $request);

            }

            return $this->handleStatefulRequest($request, $session, $next);


        }

        private function getSession(Request $request) : Session
        {

            $cookies = $request->getCookies();
            $cookie_name = $this->session_store->getName();

            $session_id = $cookies->get($cookie_name, '');

            $this->session_store->setId($session_id);

            return $this->session_store;

        }

        private function addSessionCookie(Session $session)
        {

            $this->cookies->set(
                $this->config['cookie'],
                [
                    'value' => $session->getId(),
                    'path' => $this->config['path'],
                    'samesite' => ucfirst($this->config['same_site']),
                    'expires' => Carbon::now()->addMinutes($this->config['lifetime'])->getTimestamp(),
                    'httponly' => $this->config['http_only'],
                    'secure' => $this->config['secure'],
                    'domain' => $this->config['domain']

                ]
            );
        }

        private function startSession(Session $session_store, Request $request)
        {

            $session_store->start();
            $session_store->getDriver()->setRequest($request);

        }

        private function handleStatefulRequest(Request $request, Session $session, Delegate $next) : ResponseInterface
        {

            $request = $request->withSession($session);

            $response = $next($request);

            $this->addSessionCookie($session);

            $this->saveSession($session, $request, $response);

            return $response;

        }

        private function storePreviousUrl(ResponseInterface $response, Request $request, Session $session)
        {

            if ($response instanceof NullResponse) {

                return;

            }

            if ($request->isGet() && ! $request->isAjax()) {

                $session->setPreviousUrl($request->getFullUrl());

            }


        }

        private function saveSession(Session $session, Request $request, ResponseInterface $response) :void
        {

            if ( ! $this->requestRunsOnInitHook($request) ) {

                $this->storePreviousUrl($response, $request, $session);
                $session->save();
                return;

            }

            // either web-routes, admin-routes, or ajax-routes
            // will run this middleware again. Abort here to not save the session twice and mess
            // up flashed data.
            if ( $response instanceof NullResponse && $request->isRouteable() ) {

                return;

            }

            // Global route. Need to save again if flash.old is present because we might
            // have one global route and another on the next request.
            if ( $session->wasChanged() || $session->has('_flash.old') ) {

                $this->storePreviousUrl($response, $request, $session);
                $session->save();

            }


        }

        private function collectGarbage()
        {
            if ($this->configHitsLottery($this->config['lottery'])) {

                $this->session_store->getDriver()->gc($this->getSessionLifetimeInSeconds());

            }
        }

        private function configHitsLottery(array $lottery) : bool
        {

            return random_int(1, $lottery[1]) <= $lottery[0];
        }

        private function getSessionLifetimeInSeconds()
        {

            return $this->config['lifetime'] * 60;
        }

        private function requestRunsOnInitHook(Request $request) : bool
        {

            return $request->getType() === IncomingGlobalRequest::class;

        }

    }