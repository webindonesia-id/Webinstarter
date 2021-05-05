<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User;

class UserController extends BaseController
{

	public function __construct()
	{
		$this->user = new User();
	}
	public function index()
	{
		$data['users'] = $this->user->getUserPaginate( 10 );
		$data['pager'] = $this->user->pager;
		$data['validation'] = $this->service::validation();

		if($this->request->getVar('search')) 
		{
			$data['users'] = $this->user->getUserPaginate( 10, $this->request->getVar('search') );
			$data['pager'] = $this->user->pager;
		}
		
		return view('admin/user/index', $data);
	}

	public function store()
	{
		$rules = [
			'user_name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nama harus di isi!',
				],
			],
			'user_email' => [
				'rules'	=> 'required|valid_email',
				'errors' => [
					'required' => 'Email harus di isi!',
					'valid_email' => 'Email tidak valid',
				],
			],
			'password' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Password harus di isi!',
				],
			],
			'password_confirmation' => [
				'rules' => 'required|matches[password]',
				'errors' => [
					'required' => 'Konfirmasi password harus di isi!',
					'matches' => 'Konfirmasi Password tidak sama!',
				],
			],
		];

		if(!$this->validate($rules)) 
		{
			return redirect()->back()->withInput()->with('validation', $this->service::validation());
		}

		$users = [
			'user_name' 		=> $this->request->getPost('user_name'),
			'user_email'	 	=> $this->request->getPost('user_email'),
			'user_password' 	=> password_hash($this->request->getPost('user_password'), PASSWORD_BCRYPT),
			'user_status'		=> $this->request->getPost('user_status') ? $this->request->getPost('user_status') : 0,
		];

		$this->user->insert($users);

		return redirect()->back()->with('success', 'Data berhasil disimpan!');
	}


	public function update()
	{
		$rules = [
			'user_name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nama harus di isi!',
				],
			],
			'user_email' => [
				'rules'	=> 'required|valid_email',
				'errors' => [
					'required' => 'Email harus di isi!',
					'valid_email' => 'Email tidak valid',
				],
			],
			
			'password_confirmation' => [
				'rules' => 'matches[password]',
				'errors' => [
					'required' => 'Konfirmasi password harus di isi!',
					'matches' => 'Konfirmasi Password tidak sama!',
				],
			],
		];

		if(!$this->validate($rules)) 
		{
			return redirect()->back()->withInput()->with('validation', $this->service::validation());
		}

		$user = $this->user->where('user_id', $this->request->getPost('user_id'))->first();

		if($user) {
			$users = [
				'user_name' 		=> $this->request->getPost('user_name'),
				'user_email'	 	=> $this->request->getPost('user_email'),
				'user_status'		=> $this->request->getPost('user_status') ? $this->request->getPost('user_status') : 0,
			];
	
			$this->user->set($users)->where('user_id', $user->user_id)->update();

			if($this->request->getPost('password')) { 
				$this->user->set(['user_password', password_hash($this->request->getPost('password'), PASSWORD_BCRYPT)])->where('user_id', $user->user_id)->update();
			}
			
			return redirect()->back()->with('success', 'Data berhasil disimpan!');
		} else {
			return redirect()->back()->with('error', 'Data tidak valid!');
		}
	}

	public function delete( $id )
	{
		$this->user->where('user_id', $id)->delete();
		return redirect()->back()->with('success', 'Data berhasil dihapus!');
	}
}
