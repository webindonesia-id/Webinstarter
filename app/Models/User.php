<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'users';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'object';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['user_name', 'user_email', 'user_account','user_password'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'user_created_at';
	protected $updatedField         = 'user_updated_at';
	protected $deletedField         = 'user_deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	public function authenticate($email = '', $password = '')
	{
		if($email == false) 
		{
			return false;
		}
		
		// ? Check Email Available
		$user = $this->table('users')->where('user_email', $email)->first();
		if($user) 
		{
			if(password_verify($password, $user->user_password)) 
			{
				return $user; 
			} else {
				return false;
			}

		} else {
			return false;
		}
	}


	public function getUserPaginate( $paginate = 10, $search = false )
	{
		if($search) {
			return $this->table( $this->table )
					->like('user_name', $search)
					->orLike('user_email', $search)
					->paginate( $paginate, 'users' );
		} else {
			return $this->table( $this->table )
						->orderBy('user_created_at', 'DESC')
						->paginate( $paginate, 'users' );
		}

	}
}
