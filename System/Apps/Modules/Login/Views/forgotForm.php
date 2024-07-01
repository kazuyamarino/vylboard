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
		<div class="column is-4">
			<h5>Forgot Password</h5>
			<form action="@( base_url('forgot/process') )" method="POST" data-abide novalidate>
				<div data-abide-error class="notification is-norma is-danger">
					<p>There are some errors in your form.</p>
				</div>

				<div class="field">
					<label class="label">Email&nbsp;<small>(required)</small>
						<input type="text" name="user_email" id="user_email" class="input" placeholder="enter email here" pattern="email" required>
					</label>
				</div>
				<p class="help" id="username-help">Enter your email here.</p>

				<div class="field">
					<label class="label">Username&nbsp;<small>(required)</small>
						<input type="text" name="user_name" id="username-help" class="input" placeholder="enter username here" pattern="^[a-z0-9\._]{3,10}$" required>
					</label>
				</div>
				<p class="help" id="username-help">Enter your username here.</p>

				<div class="field is-grouped">
					<div class="control">
						<button class="button is-primary" type="submit">Request</button>
					</div>
					<div class="control">
						<button class="button is-text" type="reset">Reset</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="columns is-centered">
		<div class="column is-2">
			<button class="button is-info modal-button" type="button" data-target="modal-normal">Call Customer Service</button>
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
			</div>
		</div>
	</div>
	<br>
</div>
