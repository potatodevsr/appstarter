<?php

namespace App\Controllers;

class Login extends BaseController
{
	public function new()
	{
		return view('Login/new');
		
	}

    public function create()
    {
		$email = $this->request->getPost('email');
		$password = $this->request->getPost('password');


        $auth = new \App\Libraries\Authentication;

        if ($auth ->login($email, $password)){

            return redirect()->to("/appstarter")
            ->with('info', 'Login successful');
        } else {
            return redirect()->to("/appstarter/login")
            ->withInput()
            ->with('warning', 'Invalid login');



        }
    }

    public function delete()
    {
        $auth = new \App\Libraries\Authentication;

        $auth->logout();

        return redirect()->to("/appstarter/login/showLogoutMessage");


    }
    public function showLogoutMessage()
    {
        return redirect()->to("/appstarter")
                         ->with('info', 'Logout successful');

    }



}