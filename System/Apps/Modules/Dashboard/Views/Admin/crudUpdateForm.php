<!-- call pull alerts from Alerts.php -->
@( pull_alerts() )

<div class="wrap">
	<div class="content">
		<br>
		<div class="columns is-centered">
			<div class="column is-1">
				<a class="button is-success" href="@( base_url('dashboard/crud') )"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
			</div>
		</div>
		<div class="columns is-centered">
			<div class="column is-5">
				<h5>Users Information</h5>
				<form action="@( base_url('dashboard/update/'. $data.id . '') )" method="POST" data-abide novalidate>
					<div data-abide-error class="notification is-norma is-danger">
						<p>There are some errors in your form.</p>
					</div>

					<div class="field">
						<label class="label">Name&nbsp;<small>(required)</small>
							<input type="text" name="user_complete_name" id="user_complete_name" class="input" placeholder="3 - 40 characters" value="@( $data.user_complete_name )" required pattern="^[a-zA-Z0-9\ ]{3,40}$">
						</label>
						<p class="help" id="password-help">Enter your name here.</p>
					</div>

					<div class="field">
						<label class="label">Email&nbsp;<small>(required)</small>
							<input type="text" name="user_email" id="user_email" class="input" placeholder="User Email" value="@( $data.user_email )" required pattern="email">
						</label>
						<p class="help" id="password-help">Enter your email here.</p>
					</div>

					<div class="field">
						<label class="label">Username&nbsp;<small>(required)</small>
							<input type="text" name="user_name" class="input" placeholder="3 - 12 characters" value="@( $data.user_name )" pattern="^[a-z0-9\._]{3,12}$" required>
							<span class="help is-norma">
								<ul>
									<li>Username must be lowercase</li>
									<li>Can only contain dot (&nbsp;.&nbsp;), &amp; underscore (&nbsp;_&nbsp;)</li>
								</ul>
							</span>
						</label>
						<p class="help">Enter your username here.</p>
					</div>

					<div class="field">
						<label class="label">Password
							<input type="password" name="user_password" id="user_password" class="input" placeholder="5 - 12 characters" pattern="^[a-zA-Z0-9\.]{5,12}$">
							<span class="help is-norma">
								<ul>
									<li>Password is required.</li>
									<li>Can only contain dot (&nbsp;.&nbsp;)</li>
								</ul>
							</span>
						</label>
						<p class="help" id="password-help">Enter your password here.</p>
					</div>

					<div class="field">
						<input id="show-password" type="checkbox" onclick="showPassword()"><label for="show-password">&nbsp;Show password</label>
					</div>

					<div class="field">
						<label class="label">Confirm Password
							<input type="password" class="input" placeholder="5 - 12 characters" pattern="^[a-zA-Z0-9\.]{5,12}$" data-equalto="user_password">
							<span class="help is-norma">The password did not match</span>
						</label>
						<p class="help" id="password-help">Confirm your password here.</p>
					</div>

					<div class="field">
						<label class="label">Choose User Type @($data.user_code)<br>
							<div class="select">
								<select name="user_code" required>
									<option value="">-- Choose One --</option>
									<option value="1" @( terner((1 == $data.user_code), 'selected', '') )>Admin</option>
									<option value="2" @( terner((2 == $data.user_code), 'selected', '') )>User 1</option>
									<option value="3" @( terner((3 == $data.user_code), 'selected', '') )>User 2</option>
									<option value="4" @( terner((4 == $data.user_code), 'selected', '') )>User 3</option>
								</select>
							</div>
						</label>
					</div>

					<div class="field">
						<label class="label" for="radio-stat">Status Active&nbsp;<small>(required)</small></label>
						<div id="radio-stat" class="radio-group">
							<div class="control">
								<label class="radio">
									<input type="radio" name="user_status" value="Y" id="act-stat" @( terner(('Y' == $data.user_status), 'checked', '') ) required>&nbsp;Yes
								</label>
								<label class="radio">
									<input type="radio" name="user_status" value="N" id="deact-stat" @( terner(('N' == $data.user_status), 'checked', '') )>&nbsp;No
								</label>
							</div>
							<span class="help">Must select at least one</span>
						</div>
					</div>

					<div class="field is-grouped">
						<div class="control">
							<button class="button is-link" type="submit">Submit</button>
						</div>
						<div class="control">
							<button class="button is-text" type="reset">Reset</button>
						</div>
					</div>
				</form>
				<br>
			</div>
		</div>
	</div>
</div>
