<?php

namespace App\Http\Controllers;


use App\Repositories\Contracts\UserRepositoryInterface;
use App\Http\Requests\Auth\PostLoginRequest;
use App\Http\Requests\Auth\PostRegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    protected $repo;
    
    /**
     * AuthController constructor.
     *
     * @param UserRepositoryInterface $repo
     */
    public function __construct(UserRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
    
    /**
     * Show login form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLoginPage()
    {
        return view('auth.login');
    }
    
    /**
     * Show register form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRegisterPage()
    {
        return view('auth.register');
    }
    
    /**
     * Process Login
     *
     * @param PostLoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(PostLoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        $user        = $this->repo->attempt($credentials);
        
        if (is_null($user)) {
            alert($request, 'The credentials does not matches any user.', 'danger');
            
            return redirect()->route('auth.getLoginPage')->withInput($request->all());
        } else {
            alert($request, 'Welcome back, ' . $user->name);
            
            return redirect()->route('home');
        }
    }
    
    /**
     * Process register
     *
     * @param PostRegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postRegister(PostRegisterRequest $request)
    {
        $credentials = $request->only(['name', 'email', 'password']);
        $this->repo->create($credentials);
        
        alert($request, 'User has been register successfully!');
        
        return redirect()->route('auth.getLoginPage');
    }
    
    /**
     * Logout
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        $request->session()->forget(SS_LOGIN);
        
        return redirect()->route('home');
    }
}
