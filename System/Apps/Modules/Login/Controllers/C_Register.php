<?php
namespace System\Apps\Modules\Login\Controllers;

use System\Core\Load;
use System\Apps\Modules\Login\Models\M_Register;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use System\Libraries\Facades\Session;

class C_Register extends Load
{

	private $M_Register;
	private $Mail;

	public function __construct()
	{
		$this->M_Register = new M_Register;
		$this->Mail = new PHPMailer(true);
	}

	public function register_form()
	{
		// register user view
		Load::template("Login/header");
		Load::view("Login", "registerForm");
		Load::template("Login/footer");

		// unset session
		Session::remove('login-message');
		Session::remove('common-message');
	}

	public function forgot_form()
	{
		// forgot password view
		Load::template("Login/header");
		Load::view("Login", "forgotForm");
		Load::template("Login/footer");

		// unset session
		Session::remove('login-message');
		Session::remove('common-message');
	}

	public function reset_form()
	{
		// if session id has value then go to reset password view
		if ( not_filled(Session::get('session-user-id')) ) {
			redirect('forgot');
		} else {
			Load::template("Login/header");
			Load::view("Login", "resetForm");
			Load::template("Login/footer");
		}

		// unset session
		Session::remove('login-message');
		Session::remove('common-message');
	}

	public function register_insert()
	{
		// defined variables
		$user_complete_name = secure_input(post('user_complete_name'));
		$user_email         = secure_input(post('user_email'));
		$user_name          = secure_input(post('user_name'));
		$user_password      = secure_input(sha1(post('user_password')));
		$user_status        = 'N';
		$user_code          = secure_input(post('user_code'));
		$current_date       = gmdate('Y-m-d H:i:s',time()+60*60*7);

		// if username, user password, & user status is empty or no input, display the message
		if ( not_filled($user_name) || not_filled($user_password) || not_filled($user_status) ) {
			echo "Sorry, I can't, pleaseee. The Variables is not filled";
			exit();
		} else {
			// create array parameters from variables
			$p = [
				":user_code"          => $user_code,
				":user_complete_name" => $user_complete_name,
				":user_email"         => $user_email,
				":user_name"          => $user_name,
				":user_password"      => $user_password,
				":user_status"        => $user_status,
				":create_date"        => $current_date,
				":update_date"        => $current_date,
				":delete_date"        => $current_date,
				":login_date"         => $current_date,
				":logout_date"        => $current_date
			];

			// call the method insert_data
			$this->M_Register->insert_data($p);

			Session::set('common-message', 'register-success');

			// redirect to page url
			redirect();
		}
	}

	public function forgot_process()
	{
		/*
		forgot password process
		 */
		$user_name  = secure_input(post('user_name'));
		$user_email = secure_input(post('user_email'));

		// create array parameter from variable
		$p_forgot_password = [
			":user_name"  => [$user_name, PAR_STR],
			":user_email" => [$user_email, PAR_STR]
		];
		$d_forgot_password = $this->M_Register->forgot_process($p_forgot_password);

		$get_id         = $d_forgot_password['id'];
		$get_name       = $d_forgot_password['user_complete_name'];
		$get_user_email = $d_forgot_password['user_email'];
		$current_date   = gmdate('Y-m-d H:i:s',time()+60*60*7);
		$reset_id       = generate_num(1, 5, 5);
		Session::set('session-user-id', $get_id); // sessiod-id for opening reset form

		$p_update_resetid_null = [
			':id'            => Session::get('session-user-id'),
			':reset_id_null' => null,
			':delete_date'   => $current_date
		];
		$this->M_Register->update_resetid_null($p_update_resetid_null);

		$p_update_flagreset_null = [
			':id'              => Session::get('session-user-id'),
			':flag_reset_null' => 0,
			':delete_date'     => $current_date
		];
		$this->M_Register->update_flag_reset_null($p_update_flagreset_null);

		if ( not_filled($get_id) ) {
			Session::set('login-message', 'forgot-error');
			redirect('forgot');
		} else {
			$p_update_resetid = [
				":reset_id"    => $reset_id,
				":update_date" => $current_date,
				":id"          => $get_id
			];
			$this->M_Register->update_resetid($p_update_resetid);

			/*
			Sending reset_id by email
			 */
			try {
				//Server settings
				$this->Mail->SMTPDebug = 0; // Enable verbose debug output
				$this->Mail->isSMTP(); // Set mailer to use SMTP
				$this->Mail->Host = 'srv31.niagahoster.com'; // Specify main and backup SMTP servers
				$this->Mail->SMTPAuth = true;	// Enable SMTP authentication
				$this->Mail->Username = 'data.admin@targetprima.com'; // SMTP username
				$this->Mail->Password = 'tpl#1234'; // SMTP password
				$this->Mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
				$this->Mail->Port = 465; // TCP port to connect to

				//Recipients
				$this->Mail->setFrom('data.admin@targetprima.com', 'Dash System');
				$this->Mail->addAddress($get_user_email, $get_name); // Add a recipient

				$this->Mail->isHTML(true); // Set email format to HTML
				$this->Mail->Subject = "Dash - Reset ID Number";

				$mailContent = "Your Reset ID Number " . $reset_id;

				$this->Mail->Body = $mailContent;

				$this->Mail->send();
			} catch (Exception $e) {
				echo 'Message could not be sent. Mailer Error: ', $this->Mail->ErrorInfo;
				exit();
			}
		}

		Session::set('login-message', 'sending-resetid');
		redirect('reset');
	}

	public function reset_process()
	{
		/*
		reset password process
		 */
		if ( not_filled(Session::get('session-user-id')) ) {
			redirect('forgot');
		} else {
			$user_password  = strip_tags(sha1(post('user_password')));
			$reset_id  = strip_tags(post('reset_id'));
			$delete_date = gmdate('Y-m-d H:i:s',time()+60*60*7);

			if ( is_filled($reset_id) ) {
				$p_update_resetid_null = [
					':id'            => Session::get('session-user-id'),
					':reset_id_null' => null,
					':delete_date'   => $delete_date
				];

				$p_update_flagreset_null = [
					':id'              => Session::get('session-user-id'),
					':flag_reset_null' => 0,
					':delete_date'     => $delete_date
				];

				$p_check_resetid = [
					':reset_id' => $reset_id
				];
				$d = $this->M_Register->check_resetid($p_check_resetid);

				if ( $d < 1 ) {
					$p_get_flag = [
						':id' => Session::get('session-user-id')
					];
					$flag_reset = $this->M_Register->get_flag_reset($p_get_flag);

					if ( $flag_reset < 2 ) {
						$p_update_flag_reset = [
							':id'          => Session::get('session-user-id'),
							':flag_reset'  => $flag_reset + 1,
							':delete_date' => $delete_date
						];
						$this->M_Register->update_flag_reset($p_update_flag_reset);

						Session::set('login-message', 'reset-error');
						redirect('reset');
					} else {
						$this->M_Register->update_resetid_null($p_update_resetid_null);

						$this->M_Register->update_flag_reset_null($p_update_flagreset_null);

						Session::set('login-message', 'reset-limit');
						Session::remove('session-user-id');
						redirect('forgot');
					}
				} else {
					$p_update_user = [
						':user_password' => $user_password,
						':reset_id'      => $reset_id,
						':delete_date'   => $delete_date
					];
					$this->M_Register->update_password_by_resetid($p_update_user);

					$this->M_Register->update_resetid_null($p_update_resetid_null);

					$this->M_Register->update_flag_reset_null($p_update_flagreset_null);

					Session::set('login-message', 'reset-success');
					Session::remove('session-user-id');
					redirect('forgot');
				}
			} else {
				Session::set('login-message', 'reset-error');
				redirect('reset');
			}
		}
	}

}
