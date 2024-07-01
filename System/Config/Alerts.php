<?php
/**
 * This method serves to manage NSY framework sweetalert notifications
 * Attention, don't try to change the structure of the code, delete, or change. Because there is some code connected to the NSY system. So, be careful.
 */

function pull_alerts()
{
	// common message
	if (!empty($_SESSION['common-message'])) {
		if ($_SESSION['common-message'] == 'register-success') {
			echo '<script>Swal.fire("Success!", "User data has been sent.", "success");</script>';
		} elseif ($_SESSION['common-message'] == 'delete-success') {
			echo '<script>Swal.fire("Success!", "Data has been deleted!", "success");</script>';
		} elseif ($_SESSION['common-message'] == 'update-success') {
			echo '<script>Swal.fire("Success!", "Data has been updated.", "success");</script>';
		} elseif ($_SESSION['common-message'] == 'must-select') {
			echo '<script>Swal.fire("Warning!", "Data must be selected!", "warning");</script>';
		} elseif ($_SESSION['common-message'] == 'insert-cuti-success') {
			echo '<script>Swal.fire("Success!", "Berhasil Mengajukan Cuti!", "success");</script>';
		} elseif ($_SESSION['common-message'] == 'insert-success') {
			echo '<script>Swal.fire("Success!", "Data Successfully Entered!", "success");</script>';
		}
	}

	// login message
	if (!empty($_SESSION['login-message'])) {
		if ($_SESSION['login-message'] == 'login-success') {
			echo '<script>Swal.fire("Success!", "Successful login", "success");</script>';
		} elseif ($_SESSION['login-message'] == 'login-denied') {
			echo '<script>Swal.fire("Warning!", "Access is denied", "warning");</script>';
		} elseif ($_SESSION['login-message'] == 'session-expired') {
			echo '<script>Swal.fire("Warning!", "Expired session", "warning");</script>';
		} elseif ($_SESSION['login-message'] == 'logout-success') {
			echo '<script>Swal.fire("Success!", "Successful logout", "success");</script>';
		} elseif ($_SESSION['login-message'] == 'login-error') {
			echo '<script>Swal.fire("Error!", "Username or Password is not registered or wrong", "error");</script>';
		} elseif ($_SESSION['login-message'] == 'status-error') {
			echo '<script>Swal.fire("Error!", "Your account is not active or blocked, please contact the Administrator.", "error");</script>';
		} elseif ($_SESSION['login-message'] == 'user-empty') {
			echo '<script>Swal.fire("Error!", "Username or Password must be filled in", "error");</script>';
		} elseif ($_SESSION['login-message'] == 'forgot-error') {
			echo '<script>Swal.fire("Error!", "Username or Email are not registered", "error");</script>';
		} elseif ($_SESSION['login-message'] == 'reset-success') {
			echo '<script>Swal.fire("Success!", "The password was successfully reset", "success");</script>';
		} elseif ($_SESSION['login-message'] == 'reset-error') {
			echo '<script>Swal.fire("Error!", "Incorrect Reset ID!", "error");</script>';
		} elseif ($_SESSION['login-message'] == 'reset-limit') {
			echo '<script>Swal.fire("Incorrect Reset ID!", "You have reached the password reset limit 3 times.", "error");</script>';
		} elseif ($_SESSION['login-message'] == 'login-limit') {
			echo '<script>Swal.fire("Incorrect Login!", "You have reached the login limit 3 times, due to an error entering the password.", "error");</script>';
		} elseif ($_SESSION['login-message'] == 'sending-resetid') {
			echo '<script>Swal.fire({
				position: "top-end",
				type: "success",
				title: "<h5>Reset ID sent to email</h5>",
				showConfirmButton: false,
				timer: 2000
			});</script>';
		} elseif ($_SESSION['login-message'] == 'verification-success') {
			echo '<script>Swal.fire("Success!", "Account successfully verified", "success");</script>';
		} elseif ($_SESSION['login-message'] == 'verification-error') {
			echo '<script>Swal.fire("Error!", "Incorrect ID Verification Code!", "error");</script>';
		}
	}
}
