<?php


    declare(strict_types = 1);


    namespace Snicco\Auth\Controllers;

    use Snicco\Auth\Contracts\CreatesNewUser;
    use Snicco\Auth\Contracts\DeletesUsers;
    use Snicco\Auth\Events\Registration;
    use Snicco\Auth\Events\UserDeleted;
    use Snicco\Auth\Responses\CreateAccountViewResponse;
    use Snicco\Auth\Responses\RegisteredResponse;
    use Snicco\Auth\Traits\ResolvesUser;
    use Snicco\ExceptionHandling\Exceptions\AuthorizationException;
    use Snicco\Http\Controller;
    use Snicco\Http\Psr7\Request;

    class AccountController extends Controller
    {

        use ResolvesUser;

        /**
         * @var int
         */
        private $lifetime_in_seconds;

        public function __construct($lifetime_in_seconds = 900)
        {

            $this->lifetime_in_seconds = $lifetime_in_seconds;
        }

        public function create(Request $request, CreateAccountViewResponse $view_response)
        {

            return $view_response->setRequest($request)->postTo(
                $this->url->signedRoute('auth.accounts.store', [], $this->lifetime_in_seconds)
            );
        }

        public function store(Request $request, CreatesNewUser $creates_new_user, RegisteredResponse $response)
        {

            $user = $this->getUserById($creates_new_user->create($request));

            Registration::dispatch([$user]);

            return $response->setRequest($request)->setUser($user);

        }

        public function destroy(Request $request, int $user_id, DeletesUsers $deletes_users)
        {

            $allowed_roles = array_merge(['administrator'], $deletes_users->allowedUserRoles());

            if ( ! $this->canUserPerformDelete($allowed_roles, $request->user(), $user_id)) {

                throw new AuthorizationException('You are not allowed to perform this action.');

            }

            UserDeleted::dispatch([$user_id]);

            // Isn't WordPress great?
            if ( ! function_exists('wp_delete_user') ) {
                require ABSPATH.'wp-admin/includes/user.php';
            }

            wp_delete_user($user_id, $deletes_users->reassign($user_id));

            return $request->isExpectingJson()
                ? $this->response_factory->noContent()
                : $deletes_users->response();

        }

        private function canUserPerformDelete(array $allowed_roles, \WP_User $auth_user, int $delete_id) : bool
        {

            $user_to_be_delete = $this->getUserById($delete_id);
            $current_user_is_admin = $this->isAdmin($auth_user);

            // Only whitelisted roles can be deleted. Admins can delete all roles expect other admins/super admins
            if ( ! $current_user_is_admin && ! count(array_intersect($user_to_be_delete->roles, $allowed_roles))) {
                return false;
            }

            // Never allow admin/super admin account deletion
            if ($this->isAdmin($user_to_be_delete) || is_super_admin($delete_id)) {
                return false;
            }

            // Dont allow deletion of accounts that are not the users own account
            if ($auth_user->ID !== $delete_id && ! $current_user_is_admin) {
                return false;
            }

            return true;


        }


    }