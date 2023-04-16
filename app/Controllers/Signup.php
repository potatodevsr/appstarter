<?php

namespace App\Controllers;

class Signup extends BaseController
{
    public function new()
    {
        return view("Signup/new");
    }

    public function create()
    {
        $user = new \App\Entities\User($this->request->getPost());

        $model = new \App\Models\UserModel;

        if ($model->insert($user)) {
            
            return redirect()->to("/appstarter/signup/success");

        } else {
			return redirect()->to("/appstarter/signup/new")
							 ->with('errors', $model->errors())
							 ->with('warning', 'Invalid date')
							 ->withInput();
		}
    }
    public function success()
    {
        return view("Signup/success");
    }

}