<?php


    declare(strict_types = 1);


    namespace BetterWP\Auth\Authenticators;

    use WP_User;
    use BetterWP\Auth\Contracts\Authenticator;
    use BetterWP\Auth\Traits\InteractsWithTwoFactorSecrets;
    use BetterWP\Auth\Responses\SuccessfulLoginResponse;
    use BetterWP\Auth\Contracts\TwoFactorChallengeResponse;
    use BetterWP\Http\Psr7\Request;
    use BetterWP\Http\Psr7\Response;

    class RedirectIf2FaAuthenticable extends Authenticator
    {

        use InteractsWithTwoFactorSecrets;

        /**
         * @var TwoFactorChallengeResponse
         */
        private $challenge_response;

        public function __construct(TwoFactorChallengeResponse $response)
        {

            $this->challenge_response = $response;
        }

        public function attempt(Request $request, $next) : Response
        {

            $response = $next($request);

            if ( ! $response instanceof SuccessfulLoginResponse) {

                return $response;

            }

            if ( ! $this->userHasTwoFactorEnabled($user = $response->authenticatedUser())) {

                return $response;

            }

            $this->challengeUser($request, $user);

            return $this->response_factory->toResponse(
                $this->challenge_response->setRequest($request)->toResponsable()
            );

        }

        private function challengeUser(Request $request, WP_User $user) : void
        {

            $request->session()->put('auth.2fa.challenged_user', $user->ID);
            $request->session()->put('auth.2fa.remember', $request->boolean('remember_me'));

        }

    }