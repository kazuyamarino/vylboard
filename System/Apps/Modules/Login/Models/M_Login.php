<?php

namespace System\Apps\Modules\Login\Models;

use System\Core\DB;

class M_Login extends DB
{

	public function login_process($param_check_user)
	{
		// query to check the user whose status is Y
		$sel_data_tbl_user = "SELECT
				a.id,
				a.user_complete_name,
				a.user_session,
				a.user_name,
				a.user_code
			FROM users_table a
			WHERE
				a.user_name     = :user_name AND
				a.user_password = :encrypt_user_password AND
				a.user_status   = 'Y'";
		$d = DB::connect()->query($sel_data_tbl_user)->vars($param_check_user)->style(FETCH_ASSOC)->fetch_all();

		return $d;
	}

	public function update_user_process_login($param_user_session)
	{
		// query to update user_session
		$upd_user_session = "UPDATE
				users_table
			SET
				user_session = :user_session,
				create_date  = create_date,
				update_date  = update_date,
				delete_date  = delete_date,
				login_date   = :login_date,
				logout_date  = logout_date
			WHERE
				id = :id";
		DB::connect()->query($upd_user_session)->vars($param_user_session)->bind()->exec();
	}

	public function logout_process($param)
	{
		// query to update user_session = null
		$sql = "UPDATE
				users_table
			SET
				user_session = :user_session,
				create_date  = create_date,
				update_date  = update_date,
				delete_date  = delete_date,
				login_date   = login_date,
				logout_date  = :logout_date
			WHERE
				id = :id";
		DB::connect()->query($sql)->vars($param)->bind()->exec();
	}

	public function login_session($param)
	{
		// query to get first number from user_code, & user_session
		$sql = "SELECT SUBSTR(user_code, 1, 1) as user_code, user_session FROM users_table WHERE user_session = :user_session AND user_code = :user_code";
		$d = DB::connect()->query($sql)->vars($param)->style(FETCH_ASSOC)->fetch();

		return $d;
	}

	public function get_flag_login($p)
	{
		// query to get last flag_login
		$q = "SELECT
				user_status,
				flag_login
			FROM
				users_table
			WHERE
				`user_name` = :user_name";
		$d = DB::connect()->query($q)->vars($p)->style(FETCH_ASSOC)->fetch();

		return $d;
	}

	public function update_flag_login($p)
	{
		// query to update flag_login + 1
		$q = "UPDATE users_table SET
				flag_login  = :flag_login,
				delete_date = :delete_date
			WHERE
				`user_name` = :user_name";
		DB::connect()->query($q)->vars($p)->bind()->exec();
	}

	public function update_flag_login_null($p)
	{
		// query to update flag_login = null
		$q = "UPDATE users_table SET
				flag_login  = :flag_login_null,
				delete_date = :delete_date
			WHERE
				`user_name` = :user_name";
		DB::connect()->query($q)->vars($p)->bind()->exec();
	}

	public function disable_user_stat($p)
	{
		// query to update user_status = N (not active)
		$q = "UPDATE users_table SET
				user_status = :user_status,
				delete_date = :delete_date
			WHERE
				`user_name` = :user_name";
		DB::connect()->query($q)->vars($p)->bind()->exec();
	}
}
