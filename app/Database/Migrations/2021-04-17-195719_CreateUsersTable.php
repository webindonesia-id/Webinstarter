<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'user_id' => [
				'type'				=> 'int',
				'constraint'		=> 11,
				'auto_increment' 	=> true,	
			],
			'user_name' => [
				'type'				=> 'varchar',
				'constraint'		=> 255,
			],
			'user_email' => [
				'type'				=> 'varchar',
				'constraint'		=> 255,
			],
			'user_account' => [
				'type'				=> 'varchar',
				'constraint'		=> 255,	
			],
			'user_password' => [
				'type'				=> 'varchar',
				'constraint'		=> 255,
			],
			'user_created_at' => [
				'type'				=> 'datetime',
			],
			'user_updated_at' => [
				'type'				=> 'datetime',
			],
			'user_deleted_at' => [
				'type'				=> 'datetime',
			],	
		]);

		$this->forge->addPrimaryKey('user_id');
		$this->forge->createTable('users');
	}

	public function down()
	{
		$this->forge->dropTable("users");
	}
}
