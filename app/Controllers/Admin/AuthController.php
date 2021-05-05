<?php

namespace App\Controllers\Admin;

use App\Models\User;
use App\Controllers\BaseController;

class AuthController extends BaseController
{
	public function __construct()
	{
		$this->user = new User();
	}

	public function index()
	{
		$data['validation'] = $this->service::validation();
		return view('admin/auth/signin', $data);
	}

	public function auth()
	{
		$rules = [
			'email' 	=> 'required',
			'password' 	=> 'required',
		];

		if(!$this->validate($rules)) 
		{
			return redirect()->back()->withInput()->with('validation', $this->service::validation());
		}

		// ? Check If Authenticated
		$authenticate = $this->user->authenticate($this->request->getPost('email'), $this->request->getPost('password'));
		if($authenticate) 
		{ 
			// ? Prepare User Session
			$userSession = [
				'admin_id' 		=> $authenticate->user_id,
				'admin_email' 	=> $authenticate->user_email,
				'admin_name'	=> $authenticate->user_name,
				'admin_login' 	=> true,
			]; 

			// ? Create User Session
			session()->set($userSession);
			return redirect()->route('dashboard');
		} else {
			session()->setFlashdata('error', 'Email Or Password Is Wrong!');
			return redirect()->route('admin.login');
		}
	}

	public function logout()
	{
		session()->destroy();

		return redirect()->route('index');
	}

}
