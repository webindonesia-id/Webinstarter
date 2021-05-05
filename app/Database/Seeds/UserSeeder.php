<?php

namespace App\Database\Seeds;

use App\Models\User;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		$users = [
			'user_name' 	=> 'Administrator',
			'user_email' 	=> 'admin@webin.co.id',
			'user_password' => password_hash('admin', PASSWORD_BCRYPT),
		];
			

		$user = new User();
		$user->insert($users);
	}
}
