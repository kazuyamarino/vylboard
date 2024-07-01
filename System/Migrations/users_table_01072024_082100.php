<?php

namespace System\Migrations;

/**
 * The migration class
 */
class users_table_01072024_082100
{

	/**
	 * NSY Migration
	 */

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Mig::connect()->create_table('users_table', [
			Mig::bigint('id', 20)->auto_increment(),
			Mig::varchar('user_complete_name')->null(),
			Mig::varchar('user_name')->null(),
			Mig::varchar('user_password')->null(),
			Mig::varchar('user_session')->null(),
			Mig::varchar('user_code')->null(),
			Mig::varchar('user_status')->null(),
			Mig::varchar('user_email')->null(),
			Mig::int('reset_id')->null(),
			Mig::int('flag_reset')->default(0),
			Mig::int('flag_login')->default(0),
			Mig::datetime('login_date')->null(),
			Mig::datetime('logout_date')->null(),
			Mig::primary('id'),
			Mig::unique(['user_name', 'user_email'])
		])->index('BTREE', 'id');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Mig::connect()->drop_exist_table(['users_table']);
	}
}
