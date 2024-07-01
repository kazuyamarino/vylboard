<!-- call pull alerts from Alerts.php -->
@( pull_alerts() )

<div class="content">
	<br>
	<div class="columns is-centered">
		<div class="column is-1">
			<a class="button is-danger" href="@( base_url('forgot') )">Back</a>
		</div>
	</div>
	<div class="columns is-centered">
		<div class="column is-4">
			<h5>Reset Password</h5>
			<form action="@( base_url('reset/process') )" method="POST" data-abide novalidate>
				<div data-abide-error class="notification is-norma is-danger">
					<p>There are some errors in your form.</p>
				</div>

				<div class="field">
					<label class="label">Password&nbsp;<small>(required)</small>
						<input type="password" name="user_password" id="user_password" class="input" placeholder="5 - 16 characters" pattern="^[a-zA-Z0-9\.]{5,16}$" required>
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
						<input type="password" class="input" placeholder="5 - 16 characters" pattern="^[a-zA-Z0-9\.]{5,16}$" data-equalto="user_password" required>
						<span class="help is-norma">The password did not match</span>
					</label>
					<p class="help">Confirm your password here.</p>
				</div>

				<div class="field">
					<label class="label">Reset ID&nbsp;<small>(required)</small>
						<input type="text" name="reset_id" id="reset_id" class="input" title="isi angka!" placeholder="3 - 8 characters" pattern="^[0-9]{2,40}$" required>
					</label>
				</div>

				<div class="field is-grouped">
					<div class="control">
						<button class="button is-link" type="submit">Process</button>
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
