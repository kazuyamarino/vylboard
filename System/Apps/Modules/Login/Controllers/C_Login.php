<?php
namespace System\Apps\Modules\Login\Controllers;

use System\Core\Load;
use System\Libraries\Facades\Session;
use System\Apps\Modules\Login\Models\M_Login;

class C_Login extends Load
{

	private $M_Login;

	public function __construct()
	{
		$this->M_Login = new M_Login;
	}

	public function login_form()
	{
		// if user id session not filled, then back to login form else call login_redirect.
		if (not_filled(Session::get('user_session')) && not_filled(Session::get('user_code'))) {
			if (is_filled(Session::get('remember_login'))) {
				$param = [
					'remember_login'    => Session::get('remember_login'),
					'remember_username' => Session::get('remember_username')
				];

				Load::template("Login/header");
				Load::view("Login", "loginForm", $param);
				Load::template("Login/footer");
			} else {
				Load::template("Login/header");
				Load::view("Login", "loginForm");
				Load::template("Login/footer");
			}
		} else {
			$this->login_redirect(0);
		}

		// unset session
		Session::remove('common-message');
		Session::remove('login-message');
	}

	public function login_redirect($flag)
	{
		/*
		Login route redirect, depends on the user_code
		 */
		if (is_filled(substr(Session::get('user_code'), 0, 1)) && (Session::get('user_code') == 1)) {
			// if flag has value, then go to redirect page with notif, else go to redirect page without notif
			if (is_filled($flag)) {
				Session::set('login-message', 'login-success');
				redirect("dashboard");
			} else {
				redirect("dashboard");
			}
		} elseif (is_filled(substr(Session::get('user_code'), 0, 1)) && (Session::get('user_code') == 2)) {
			// if flag has value, then go to redirect page with notif, else go to redirect page without notif
			if (is_filled($flag)) {
				Session::set('login-message', 'login-success');
				redirect("dashboard/user1");
			} else {
				redirect("dashboard/user1");
			}
		} elseif (is_filled(substr(Session::get('user_code'), 0, 1)) && (Session::get('user_code') == 3)) {
			// if flag has value, then go to redirect page with notif, else go to redirect page without notif
			if (is_filled($flag)) {
				Session::set('login-message', 'login-success');
				redirect("dashboard/user2");
			} else {
				redirect("dashboard/user2");
			}
		} elseif (is_filled(substr(Session::get('user_code'), 0, 1)) && (Session::get('user_code') == 4)) {
			// if flag has value, then go to redirect page with notif, else go to redirect page without notif
			if (is_filled($flag)) {
				Session::set('login-message', 'login-success');
				redirect("dashboard/user3");
			} else {
				redirect("dashboard/user3");
			}
		}
	}

	public function login_process()
	{
		// define login variables
		$session_id            = session_id();
		$user_name             = secure_input(post('user_name'));
		$remember_login        = secure_input(post('remember_login'));
		$login_date            = gmdate('Y-m-d H:i:s', time() + 60 * 60 * 7);
		$user_password         = secure_input(post('user_password'));
		$encrypt_user_password = secure_input(sha1($user_password));

		// if username or password is empty or no input, then login denied
		if (not_filled($user_name) || not_filled($user_password)) {
			Session::set('login-message', 'login-denied');
			redirect();
		} else {
			// param for update flag_login to null, see update_flag_login_null()
			$p_update_flaglogin_null = [
				':user_name'       => $user_name,
				':flag_login_null' => 0,
				':delete_date'     => $login_date
			];

			// start login process
			$param_check_user = [
				":user_name"             => $user_name,
				":encrypt_user_password" => $encrypt_user_password
			];
			$data_user = $this->M_Login->login_process($param_check_user);

			// if var data_user not filled
			if (not_filled($data_user)) {
				$p_get_flag = [
					':user_name' => $user_name
				];
				$d = $this->M_Login->get_flag_login($p_get_flag);

				// check user_status = N (not active), then show status error
				if ($d['user_status'] == 'N') {
					// status error
					Session::set('login-message', 'status-error');
					redirect();
				} else {
					// if flag_login is still under 2, then update flag_login + 1
					if ($d['flag_login'] < 2) {
						$p_update_flag_login = [
							':user_name'   => $user_name,
							':flag_login'  => $d['flag_login'] + 1,
							':delete_date' => $login_date
						];
						$this->M_Login->update_flag_login($p_update_flag_login);

						// show login error
						Session::set('login-message', 'login-error');
						redirect();
					} else {
						// if the flag_login reaches a value of 3

						// update user_status = N (not active)
						$p_disable_userstat = [
							':user_name'   => $user_name,
							':user_status' => 'N',
							':delete_date' => $login_date
						];
						$this->M_Login->disable_user_stat($p_disable_userstat);

						// update flag_login = null
						$this->M_Login->update_flag_login_null($p_update_flaglogin_null);

						// show login limit
						Session::set('login-message', 'login-limit');
						redirect();
					}
				}
			} else {
				// if var data_user is filled
				// map variables from data_user
				foreach ($data_user as $user) {
					$user_id            = $user['id'];
					$user_code          = $user['user_code'];
					$user_complete_name = $user['user_complete_name'];
					$user_name          = $user['user_name'];
					$user_session       = $session_id;
				}

				// update user_session = session_id()
				$param_user_session = [
					":id" 			 => $user_id,
					":user_session"  => $user_session,
					":login_date"    => $login_date
				];
				$this->M_Login->update_user_process_login($param_user_session);

				// update flag_login = null
				$this->M_Login->update_flag_login_null($p_update_flaglogin_null);

				// call a login process redirect function with an existing variable
				$param_Login_route = [
					'user_id'            => $user_id,
					'user_code'          => $user_code,
					'user_complete_name' => $user_complete_name,
					'user_name'          => $user_name,
					'user_session'       => $user_session
				];
				$this->login_process_redirect($param_Login_route, $remember_login);
			}
		}
	}

	public function login_process_redirect($param_Login_route, $remember_login)
	{
		if (not_filled($remember_login)) {
			// if remember_login is not checked
			Session::set('user_id', $param_Login_route['user_id']);
			Session::set('user_code', $param_Login_route['user_code']);
			Session::set('user_complete_name', $param_Login_route['user_complete_name']);
			Session::set('user_name', $param_Login_route['user_name']);
			Session::set('user_session', $param_Login_route['user_session']);

			Session::remove("remember_username");
			Session::remove("remember_login");

			$this->login_redirect(1);
		} else {
			// if remember_login is checked
			Session::set('user_id', $param_Login_route['user_id']);
			Session::set('user_code', $param_Login_route['user_code']);
			Session::set('user_complete_name', $param_Login_route['user_complete_name']);
			Session::set('user_name', $param_Login_route['user_name']);
			Session::set('user_session', $param_Login_route['user_session']);

			Session::set('remember_username', $param_Login_route['user_name']);
			Session::set('remember_login', $param_Login_route['user_name']);

			$this->login_redirect(1);
		}
	}

	public function logout_process()
	{
		// the logout process
		$user_id      = Session::get('user_id');
		$user_session = null;
		$logout_date  = gmdate('Y-m-d H:i:s', time() + 60 * 60 * 7);

		$param = [
			":id"           => $user_id,
			":user_session" => $user_session,
			":logout_date"  => $logout_date
		];

		$this->M_Login->logout_process($param);

		Session::remove('user_id');
		Session::remove('user_code');
		Session::remove('user_complete_name');
		Session::remove('user_name');
		Session::remove('user_session');

		Session::set('login-message', 'logout-success');
		redirect();
	}

	public function login_session()
	{
		// login session is a function to ensure the user must log in before entering a page
		$param = [
			":user_code"    => Session::get('user_code'),
			":user_session" => Session::get('user_session')
		];
		$row = $this->M_Login->login_session($param);

		if (is_filled($row)) {
			$login_session = $row['user_session'];
		} else {
			$login_session = "";
		}

		if (not_filled(Session::get('user_session'))) {
			Session::set('login-message', 'login-denied');

			Session::remove('user_id');
			Session::remove('user_code');
			Session::remove('user_complete_name');
			Session::remove('user_name');
			Session::remove('user_session');
			Session::remove('remember_username');
			Session::remove('remember_login');

			redirect();
		} elseif (Session::get('user_session') != $login_session || not_filled($login_session)) {
			Session::set('login-message', 'session-expired');

			Session::remove('user_id');
			Session::remove('user_code');
			Session::remove('user_complete_name');
			Session::remove('user_name');
			Session::remove('user_session');
			Session::remove('remember_username');
			Session::remove('remember_login');

			redirect();
		}
	}

}
