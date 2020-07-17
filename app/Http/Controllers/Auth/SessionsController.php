<?php
/**
 * Created by PhpStorm.
 * User: C.Ronaldo.7
 * Date: 4/19/2020
 * Time: 5:17 AM
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class SessionsController extends Controller
{
    public function create2()
    {
        return view('auth.login');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {

       
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth()->attempt(array('email' => $request['email'], 'password' =>($request['password'])),false)) {

            return redirect()->action('PageController@Index');
        }
        return back()->withErrors(array(
            'message' => 'The email or password is incorrect, please try again'
        ));
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->to('/login');
    }

}
