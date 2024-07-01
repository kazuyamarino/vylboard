<!-- call pull alerts from Alerts.php -->
@( pull_alerts() )

<div class="content">
	<br>
	<div class="columns is-centered">
		<div class="column is-1">
			<a class="button is-danger" href="@( base_url() )">Back</a>
		</div>
	</div>
	<div class="columns is-centered">
		<div class="column is-5">
			<h5>Users Registration</h5>
			<form action="@( base_url('register/insert') )" method="POST" data-abide novalidate>
				<div data-abide-error class="notification is-norma is-danger">
					<p>There are some errors in your form.</p>
				</div>

				<div class="field">
					<label class="label">Name&nbsp;<small>(required)</small>
						<input type="text" name="user_complete_name" id="user_complete_name" class="input" placeholder="3 - 40 characters" pattern="^[a-zA-Z0-9\ ]{3,40}$" required>
					</label>
					<p class="help">Enter your name here.</p>
				</div>

				<div class="field">
					<label class="label">Email&nbsp;<small>(required)</small>
						<input type="text" name="user_email" id="user_email" class="input" placeholder="User Email" pattern="email" required>
					</label>
					<p class="help">Enter your email here.</p>
				</div>

				<div class="field">
					<label class="label">Username&nbsp;<small>(required)</small>
						<input type="text" name="user_name" class="input" placeholder="3 - 12 characters" pattern="^[a-z0-9\._]{3,12}$" required>
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
					<label class="label">Password&nbsp;<small>(required)</small>
						<input type="password" name="user_password" id="user_password" class="input" placeholder="5 - 12 characters" pattern="^[a-zA-Z0-9\.]{5,12}$" required>
						<span class="help is-norma">
							<ul>
								<li>Password is required.</li>
								<li>Can only contain dot (&nbsp;.&nbsp;)</li>
							</ul>
						</span>
					</label>
					<p class="help">Enter your password here.</p>
				</div>

				<div class="field">
					<input id="show-password" type="checkbox" onclick="showPassword()"><label for="show-password">&nbsp;Show password</label>
				</div>

				<div class="field">
					<label class="label">Confirm Password&nbsp;<small>(required)</small>
						<input class="input" type="password" placeholder="5 - 12 characters" pattern="^[a-zA-Z0-9\.]{5,12}$" data-equalto="user_password" required>
						<span class="help is-norma">The password did not match</span>
					</label>
					<p class="help">Confirm your password here.</p>
				</div>

				<div class="field">
					<label class="label">Choose User Type<br>
						<div class="select">
							<select name="user_code" required>
								<option value="">-- Choose One --</option>
								<option value="1">Admin</option>
								<option value="2">User 1</option>
								<option value="3">User 2</option>
								<option value="4">User 3</option>
							</select>
						</div>
					</label>
				</div>

				<div class="field">
					<div id="term-cond" class="checkbox-group" data-validator-min="1" required>
						<div class="control">
							<label class="checkbox">
								<input type="checkbox" name="term-cond" value="Agree"><span class="modal-button" data-target="modal-normal">&nbsp;Terms & Conditions</span>
							</label>
						</div>

						<div id="modal-normal" class="modal">
							<div class="modal-background"></div>
							<div class="modal-content">
								<!-- content -->
								<div class="box">
									<h1>Terms &amp; Condition</h1>
									<p class="lead">You and Me... Last Man Standing!</p>
								</div>
								<!-- end content -->
							</div>
							<button class="modal-close is-large" aria-label="close"></button>
						</div>
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
		</div>
	</div>
	<br>
</div>
