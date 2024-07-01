<!-- call pull alerts from Alerts.php -->
@( pull_alerts() )
<div id="login">

	<div class="login-card">
		<div class="content">
			<div class="notification is-info">
				<button class="delete"></button>
				<span>Username : <strong>vikry</strong><br>Password : <strong>timnas</strong></span>
			</div>
			<form method="POST" action="@( base_url('login') )" data-abide novalidate>
				<div class="field">
					<label class="label">
						<input type="username" name="user_name" id="user_name" title="user_name" placeholder="Username" pattern="^[a-z0-9\._]{3,12}$" value="@( $remember_username )" required autofocus>
						<span class="help is-norma">
							<ul>
								<li>Username must be lowercase</li>
								<li>Can only contain dot (&nbsp;.&nbsp;), &amp; underscore (&nbsp;_&nbsp;)</li>
							</ul>
						</span>
					</label>
				</div>

				<div class="field">
					<label class="label">
						<input type="password" name="user_password" id="user_password" title="user_password" placeholder="Password" pattern="^[a-zA-Z0-9\.]{5,12}$" required>
						<span class="help is-norma">
							<ul>
								<li>Password is required.</li>
								<li>Can only contain dot (&nbsp;.&nbsp;)</li>
							</ul>
						</span>
					</label>
				</div>

				<div class="level options">
					<div class="checkbox level-left">
						<input type="checkbox" name="remember_login" id="remember_login" @( terner( not_filled($remember_login), "" , "checked" ) )>
						<span>Remember me</span>
					</div>
					<div>
						<a class="btn btn-link level-right" href="@( base_url('forgot') )">Forgot Password?</a>
					</div>
				</div>

				<div class="has-text-centered">
					<button type="submit" class="button is-info">Login</button>
				</div>
			</form>
			<br>
			<div class="has-text-centered">
				<a class="btn btn-link" href="@( base_url('register') )">Don't you have an account? Sign up now!</a>
			</div>
		</div>
	</div>

</div>