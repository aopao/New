<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//生成一个管理员用户
		factory(App\Models\User::class , 1)->states('admin')->create();
		
		//普通用户暂时不用,可不修改,如需修改,要修改 Factory 方法中的 mobile 字段  因为这个字段是唯一
		//factory(App\Models\User::class , 10)->create();
	}
}
