<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LoginRepository;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public $loginRepo;

    public function __construct(LoginRepository $loginRepo)
    {
        $this->loginRepo = $loginRepo;
    }

    public function loginView()
    {
        return view('pages.login');
    }


    public function customLogin(LoginRequest $request)
    {

        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {

            return redirect()->route('user.userview');
        } else {
            return view('pages.login');
        }
    }

    public function userView()
    {
        return view('pages.adminview');
    }
}
