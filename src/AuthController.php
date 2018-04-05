<?php

namespace Metawesome\Http;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * Class HomeController
 *
 * @package Unimed\Http\Controllers
 */
class AuthController extends Controller
{
    const LOGINURL = 'login.url';

    /**
     * Login form view
     *
     * @param Guard $auth
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Guard $auth)
    {
        if ($auth->check()) {
            return response()->redirectTo('/');
        }

        return view('login');
    }

    /**
     * @param Guard $guard
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Guard $guard)
    {
        if ($guard->check()) {
            $this->removeFromLoginCache($guard->user());
            $guard->logout();
        }

        return response()->redirectTo(config(self::LOGINURL));
    }

    /**
     * Authentication route
     *
     * @param Request $request
     * @param Guard   $auth
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(Request $request, Guard $auth)
    {
        if ($auth->attempt($request->only(['ID', 'CHAVE']), false)) {
            return $this->makeSuccessLoginResponse();
        }

        return $this->makeInvalidLoginResponse();
    }

    /**
     * Invalid login response
     *
     * @param array $userData
     *
     * @return \Illuminate\Http\JsonResponse
     */
    private function makeInvalidLoginResponse()
    {
        return response()->redirectTo(config(self::LOGINURL));
    }

    /**
     * Valid login response
     *
     * @return \Illuminate\Http\JsonResponse
     */
    private function makeSuccessLoginResponse()
    {
        return response()->redirectTo('/');
    }

    /**
     * @param Authenticatable $user
     *
     * @return bool
     */
    private function removeFromLoginCache(Authenticatable $user)
    {
        return app('cache.store')->forget($this->getLoginCacheKey($user));
    }

    /**
     * @param Authenticatable $user
     *
     * @return string
     */
    private function getLoginCacheKey(Authenticatable $user)
    {
        return 'login_' . config('login.seed') . '_' . $user->getAuthIdentifier();
    }
}
