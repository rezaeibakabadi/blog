<?php /** @noinspection ALL */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\User;
use validate;


class AuthController extends Controller

{

    public function register()
    {
        return view('auth.register');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::create(request(['name','username', 'email', 'password']));

        auth()->login($user);

        return redirect()->to('/index');
    }


}
