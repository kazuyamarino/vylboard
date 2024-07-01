<?php

namespace System\Apps\Modules\Dashboard\Controllers;

use System\Core\Load;
use System\Libraries\Facades\Session;
use System\Apps\Modules\Login\Controllers\C_Login;
use System\Apps\Modules\Dashboard\Models\M_Dashboard;

class C_Dashboard extends Load
{

	private $C_Login;
	private $M_Dashboard;

	public function __construct()
	{
		$this->C_Login = new C_Login;
		$this->M_Dashboard = new M_Dashboard;
	}

	public function admin_page()
	{
		// load the login session to access the page
		$this->C_Login->login_session();

		// call redirect function
		$this->dashboard_redirect(1);

		// unset session
		Session::remove('login-message');
		Session::remove('common-message');
	}

	public function user1_page()
	{
		// load the login session to access the page
		$this->C_Login->login_session();

		// call redirect function
		$this->dashboard_redirect(2);

		// unset session
		Session::remove('login-message');
		Session::remove('common-message');
	}

	public function user2_page()
	{
		// load the login session to access the page
		$this->C_Login->login_session();

		// call redirect function
		$this->dashboard_redirect(3);

		// unset session
		Session::remove('login-message');
		Session::remove('common-message');
	}

	public function user3_page()
	{
		// load the login session to access the page
		$this->C_Login->login_session();

		// call redirect function
		$this->dashboard_redirect(4);

		// unset session
		Session::remove('login-message');
		Session::remove('common-message');
	}

	public function homepage()
	{
		// load the login session to access the page
		$this->C_Login->login_session();

		Load::template("Dashboard/header");
		Load::view("Dashboard", "Admin/homepage");
		Load::template("Dashboard/footer");

		// unset session
		Session::remove('login-message');
		Session::remove('common-message');
	}

	public function crud_page()
	{
		// load the login session to access the page
		$this->C_Login->login_session();

		$d['mark_submenu'] = 'submenus';

		Load::template("Dashboard/header", $d);
		Load::view("Dashboard", "Admin/crud");
		Load::template("Dashboard/crudFooter");

		// unset session
		Session::remove('login-message');
		Session::remove('common-message');
	}

	public function tables_page()
	{
		// load the login session to access the page
		$this->C_Login->login_session();

		Load::template("Dashboard/header");
		Load::view("Dashboard", "Admin/tables");
		Load::template("Dashboard/homepageFooter");

		// unset session
		Session::remove('login-message');
		Session::remove('common-message');
	}

	public function forms_page()
	{
		// load the login session to access the page
		$this->C_Login->login_session();

		Load::template("Dashboard/header");
		Load::view("Dashboard", "Admin/forms");
		Load::template("Dashboard/footer");

		// unset session
		Session::remove('login-message');
		Session::remove('common-message');
	}

	public function profile_page()
	{
		// load the login session to access the page
		$this->C_Login->login_session();

		Load::template("Dashboard/header");
		Load::view("Dashboard", "Admin/profile");
		Load::template("Dashboard/footer");

		// unset session
		Session::remove('login-message');
		Session::remove('common-message');
	}

	public function dashboard_redirect($flag)
	{
		// If variable flag = 1, then load admin view, else show login denied notif
		if ($flag == 1) {
			if (Session::get('user_code') == 1) {
				Load::template("Dashboard/header");
				Load::view("Dashboard", "Admin/index");
				Load::template("Dashboard/footer");
			} else {
				Session::set('login-message', 'login-denied');
				redirect();
			}
			// If variable flag = 2, then load user1 view, else show login denied notif
		} elseif ($flag == 2) {
			if (Session::get('user_code') == 2) {
				Load::template("Dashboard/header");
				Load::view("Dashboard", "user1Page");
				Load::template("Dashboard/footer");
			} else {
				Session::set('login-message', 'login-denied');
				redirect();
			}
			// If variable flag = 3, then load user2 view, else show login denied notif
		} elseif ($flag == 3) {
			if (Session::get('user_code') == 3) {
				Load::template("Dashboard/header");
				Load::view("Dashboard", "user2Page");
				Load::template("Dashboard/footer");
			} else {
				Session::set('login-message', 'login-denied');
				redirect();
			}
			// If variable flag = 4, then load user3 view, else show login denied notif
		} elseif ($flag == 4) {
			if (Session::get('user_code') == 4) {
				Load::template("Dashboard/header");
				Load::view("Dashboard", "user3Page");
				Load::template("Dashboard/footer");
			} else {
				Session::set('login-message', 'login-denied');
				redirect();
			}
		}
	}

	public function get_data()
	{
		// load the login session to access the page
		$this->C_Login->login_session();

		// call the method get data
		$d = $this->M_Dashboard->get_data_json();

		// show result
		echo $d;
	}

	public function delete_data($id)
	{
		// load the login session to access the page
		$this->C_Login->login_session();

		// create array parameter from variable
		$p = [
			":id" => $id
		];

		// call the method delete_data
		$this->M_Dashboard->delete_data($p);

		Session::set('common-message', 'delete-success');

		// redirect to page url
		redirect('dashboard/crud');
	}

	public function multidelete_data()
	{
		// load the login session to access the page
		$this->C_Login->login_session();

		// defined variables
		$admin_ids  = post('admin_id');

		// check if variable empty
		if (not_filled($admin_ids)) {
			Session::set('common-message', 'must-select');

			redirect('dashboard/crud');
		} else {
			$d = sequence(':id', $admin_ids);

			// call the method delete_data
			$this->M_Dashboard->multidelete_data($d);

			Session::set('common-message', 'delete-success');

			// redirect to page url
			redirect('dashboard/crud');
		}
	}

	public function fetch_data($id)
	{
		// load the login session to access the page
		$this->C_Login->login_session();

		// create array parameter from variable
		$p = [
			":id" => [$id, PAR_INT]
		];

		// call the method fetch data
		$d['data'] = $this->M_Dashboard->fetch_data_by_id($p);

		// register user update view
		Load::template("Dashboard/header");
		Load::view("Dashboard", "Admin/crudUpdateForm", $d);
		Load::template("Dashboard/footer");

		// unset session
		Session::remove('login-message');
		Session::remove('common-message');
	}

	public function update_data($id)
	{
		// load the login session to access the page
		$this->C_Login->login_session();

		// siapkan variable update query
		$user_complete_name = secure_input(post('user_complete_name'));
		$user_email         = secure_input(post('user_email'));
		$user_name          = secure_input(post('user_name'));
		$user_password      = secure_input(sha1(post('user_password') ?? ''));
		$check_password     = secure_input(post('user_password'));
		$user_status        = secure_input(post('user_status'));
		$user_code          = secure_input(post('user_code'));
		$update_date        = gmdate('Y-m-d H:i:s', time() + 60 * 60 * 7);

		// check if variable empty
		if (not_filled($check_password)) {
			// and then, if variable check password is empty, send paramater update without user password.
			$p_update_data_password_null = [
				':id'                 => $id,
				':user_complete_name' => $user_complete_name,
				':user_email'         => $user_email,
				':user_name'          => $user_name,
				':user_code'          => $user_code,
				':user_status'        => $user_status,
				':update_date'        => $update_date
			];

			// call the method update_data
			$this->M_Dashboard->update_data_password_null($p_update_data_password_null);

			Session::set('common-message', 'update-success');

			// redirect to page url
			redirect('dashboard/crud');
		} else {
			// and then, if variable check password exist, send paramater update with user password.
			$p_update_data_password_yes = [
				':id'                 => $id,
				':user_complete_name' => $user_complete_name,
				':user_email'         => $user_email,
				':user_name'          => $user_name,
				':user_password'      => $user_password,
				':user_code'          => $user_code,
				':user_status'        => $user_status,
				':update_date'        => $update_date
			];

			// call the method update_data
			$this->M_Dashboard->update_data_password_yes($p_update_data_password_yes);

			Session::set('common-message', 'update-success');

			// redirect to page url
			redirect('dashboard/crud');
		}
	}
}
