<?php

namespace System\Apps\Modules\Dashboard\Models;

use System\Core\DB;

class M_Dashboard extends DB
{

	public function get_data_json()
	{
		// query to display the data table in json form
		$q = "SELECT
				id, user_complete_name, user_name, user_password, user_session, user_code, user_status, user_email, reset_id, create_date, update_date, delete_date, login_date, logout_date
			FROM users_table";
		$d = DB::connect()->query($q)->style(FETCH_ASSOC)->vars()->fetch_all();
		$json_data = json_fetch([
			"data" => $d
		]);

		return $json_data;
	}

	public function delete_data($p)
	{
		// query to delete the user data table
		$q = "DELETE FROM users_table WHERE id = :id";
		DB::connect()->query($q)->vars($p)->bind()->exec();
	}

	public function multidelete_data($d)
	{
		// query to delete more than one user data table
		$q = "DELETE FROM users_table WHERE id IN ($d[0])";
		DB::connect()->query($q)->vars($d[1])->bind()->exec();
	}

	public function update_data_password_null($p)
	{
		// query for data updates without a password
		$q = "UPDATE users_table SET
				user_complete_name = :user_complete_name,
				user_name          = :user_name,
				user_password      = user_password,
				user_code          = :user_code,
				user_status        = :user_status,
				user_email         = :user_email,
				create_date        = create_date,
				update_date        = :update_date,
				delete_date        = delete_date,
				login_date         = login_date,
				logout_date        = logout_date
			WHERE
				id = :id";
		DB::connect()->query($q)->vars($p)->bind()->exec();
	}

	public function update_data_password_yes($p)
	{
		// query for data updates with a password
		$q = "UPDATE users_table SET
				user_complete_name = :user_complete_name,
				user_name          = :user_name,
				user_password      = :user_password,
				user_code          = :user_code,
				user_status        = :user_status,
				user_email         = :user_email,
				create_date        = create_date,
				update_date        = :update_date,
				delete_date        = delete_date,
				login_date         = login_date,
				logout_date        = logout_date
			WHERE
				id = :id";
		DB::connect()->query($q)->vars($p)->bind()->exec();
	}

	public function fetch_data_by_id($p)
	{
		// fetch data from the data table for updating purposes
		$q = "SELECT
				id, user_complete_name, user_name, user_password, user_session, user_code, user_status, user_email, reset_id, create_date, update_date, delete_date, login_date, logout_date
			FROM
				users_table
			WHERE
				id = :id";
		$d = DB::connect()
			->query($q)
			->vars($p)
			->style(FETCH_ASSOC)
			->bind(BINDVAL)
			->fetch();

		return $d;
	}
}
