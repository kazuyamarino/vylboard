<?php

namespace System\Apps\Modules\Login\Models;

use System\Core\DB;

class M_Register extends DB
{

	public function insert_data($p)
	{
		// begin for insert data user
		$q = "INSERT INTO users_table(
				user_code,
				user_complete_name,
				user_name,
				user_password,
				user_status,
				user_email,
				create_date,
				update_date,
				delete_date,
				login_date,
				logout_date
			)
			VALUES(
				:user_code,
				:user_complete_name,
				:user_name,
				:user_password,
				:user_status,
				:user_email,
				:create_date,
				:update_date,
				:delete_date,
				:login_date,
				:logout_date
			)";
		DB::connect()->query($q)->vars($p)->bind()->exec();
	}

	public function forgot_process($p_forgot_password)
	{
		// get id & user email
		$q = "SELECT
				id, user_complete_name, user_email
			FROM
				users_table
			WHERE
				user_email = :user_email AND user_name = :user_name";
		$d = DB::connect()
			->query($q)
			->vars($p_forgot_password)
			->style(FETCH_ASSOC)
			->bind(BINDVAL)
			->fetch();

		return $d;
	}

	public function update_resetid($p_update_resetid)
	{
		// update reset id to user
		$q = "UPDATE
				users_table
			SET
				reset_id    = :reset_id,
				update_date = :update_date
			WHERE
				id = :id";
		DB::connect()->query($q)->vars($p_update_resetid)->bind()->exec();
	}

	public function check_resetid($p)
	{
		// query for check reset_id is exist
		$q = "SELECT reset_id FROM users_table WHERE reset_id = :reset_id";
		$d = DB::connect()->query($q)->vars($p)->row_count();

		return $d;
	}

	public function update_password_by_resetid($p)
	{
		// query to update user password if reset_id is correct
		$q = "UPDATE users_table SET
				user_password = :user_password,
				delete_date   = :delete_date
			WHERE
				reset_id = :reset_id";
		DB::connect()->query($q)->vars($p)->bind()->exec();
	}

	public function update_resetid_null($p)
	{
		// query to update reset_id = null
		$q = "UPDATE users_table SET
				reset_id    = :reset_id_null,
				delete_date = :delete_date
			WHERE
				id = :id";
		DB::connect()->query($q)->vars($p)->bind()->exec();
	}

	public function get_flag_reset($p)
	{
		// query to get last flag_reset
		$q = "SELECT
				flag_reset
			FROM
				users_table
			WHERE
				id = :id";
		$d = DB::connect()->query($q)->vars($p)->fetch_column();

		return $d;
	}

	public function update_flag_reset($p)
	{
		// query to update flag_reset
		$q = "UPDATE users_table SET
				flag_reset  = :flag_reset,
				delete_date = :delete_date
			WHERE
				id = :id";
		DB::connect()->query($q)->vars($p)->bind()->exec();
	}

	public function update_flag_reset_null($p)
	{
		// query to update flag_reset = null
		$q = "UPDATE users_table SET
				flag_reset  = :flag_reset_null,
				delete_date = :delete_date
			WHERE
				id = :id";
		DB::connect()->query($q)->vars($p)->bind()->exec();
	}
}
