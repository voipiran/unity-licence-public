<?php

use App\Webphone;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		/**make webphone seeds */
		Webphone::insert([
			[
				'user'        => 'user3010',
				'auth_user'   => '3010',
				'cid_name'    => '3010',
				'auto_answer' => false,
				'enable'      => true,
			],
			[
				'user'        => 'user1',
				'auth_user'   => '3009',
				'cid_name'    => '3009',
				'auto_answer' => false,
				'enable'      => true,
			],
			[
				'user'        => 'mehdi',
				'auth_user'   => '3003',
				'cid_name'    => '3003',
				'auto_answer' => false,
				'enable'      => true,
			],
			[
				'user'        => 'user2',
				'auth_user'   => '3008',
				'cid_name'    => '3008',
				'auto_answer' => false,
				'enable'      => true,
			],
			[
				'user'        => 'admin',
				'auth_user'   => '3007',
				'cid_name'    => '3007',
				'auto_answer' => false,
				'enable'      => true,
			],
			[
				'user'        => 'meti',
				'auth_user'   => '3004',
				'cid_name'    => '3004',
				'auto_answer' => false,
				'enable'      => true,
			],
		]);
		Model::reguard();
	}
}
