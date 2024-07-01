<div id="app">
	<section class="section is-title-bar">
		<div class="level">
			<div class="level-left">
				<div class="level-item">
					<ul>
						<li>Admin</li>
						<li>Forms</li>
					</ul>
				</div>
			</div>
			<div class="level-right">
				<div class="level-item">
					<div class="buttons is-right">
						<a href="https://github.com/vikdiesel/admin-one-bulma-dashboard" target="_blank" class="button is-primary">
							<span class="icon"><i class="mdi mdi-github"></i></span>
							<span>GitHub</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="hero is-hero-bar">
		<div class="hero-body">
			<div class="level">
				<div class="level-left">
					<div class="level-item">
						<h1 class="title">
							Forms
						</h1>
					</div>
				</div>
				<div class="level-right" style="display: none;">
					<div class="level-item"></div>
				</div>
			</div>
		</div>
	</section>
	<section class="section is-main-section">
		<div class="card">
			<header class="card-header">
				<p class="card-header-title">
					<span class="icon"><i class="mdi mdi-ballot"></i></span>
					Forms
				</p>
			</header>
			<div class="card-content">
				<form method="get">
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">From</label>
						</div>
						<div class="field-body">
							<div class="field">
								<p class="control is-expanded has-icons-left">
									<input class="input" type="text" placeholder="Name">
									<span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
								</p>
							</div>
							<div class="field">
								<p class="control is-expanded has-icons-left has-icons-right">
									<input class="input is-success" type="email" placeholder="Email" value="@raw( 'alex@smith.com' )">
									<span class="icon is-small is-left"><i class="mdi mdi-mail"></i></span>
									<span class="icon is-small is-right"><i class="mdi mdi-check"></i></span>
								</p>
							</div>
						</div>
					</div>
					<div class="field is-horizontal">
						<div class="field-label"></div>
						<div class="field-body">
							<div class="field is-expanded">
								<div class="field has-addons">
									<p class="control">
										<a class="button is-static">
											+44
										</a>
									</p>
									<p class="control is-expanded">
										<input class="input" type="tel" placeholder="Your phone number">
									</p>
								</div>
								<p class="help">Do not enter the first zero</p>
							</div>
						</div>
					</div>
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">Department</label>
						</div>
						<div class="field-body">
							<div class="field is-narrow">
								<div class="control">
									<div class="select is-fullwidth">
										<select>
											<option>Business development</option>
											<option>Marketing</option>
											<option>Sales</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">Subject</label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="control">
									<input class="input is-danger" type="text" placeholder="e.g. Partnership opportunity">
								</div>
								<p class="help is-danger">
									This field is required
								</p>
							</div>
						</div>
					</div>

					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">Question</label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="control">
									<textarea class="textarea" placeholder="Explain how we can help you"></textarea>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="field is-horizontal">
						<div class="field-label">
							<!-- Left empty for spacing -->
						</div>
						<div class="field-body">
							<div class="field">
								<div class="field is-grouped">
									<div class="control">
										<button type="submit" class="button is-primary">
											<span>Submit</span>
										</button>
									</div>
									<div class="control">
										<button type="button" class="button is-primary is-outlined">
											<span>Reset</span>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="card">
			<header class="card-header">
				<p class="card-header-title">
					<span class="icon"><i class="mdi mdi-ballot-outline default"></i></span>
					Custom elements
				</p>
			</header>
			<div class="card-content">
				<div class="field has-check is-horizontal">
					<div class="field-label"><label class="label">Checkbox</label></div>
					<div class="field-body">
						<div class="field">
							<div class="field is-grouped-multiline is-grouped">
								<div class="control">
									<label class="b-checkbox checkbox"><input type="checkbox" value="lorem">
										<span class="check is-primary"></span>
										<span class="control-label">Lorem</span>
									</label>
								</div>
								<div class="control">
									<label class="b-checkbox checkbox"><input type="checkbox" value="ipsum">
										<span class="check is-primary"></span>
										<span class="control-label">Ipsum</span>
									</label>
								</div>
								<div class="control">
									<label class="b-checkbox checkbox"><input type="checkbox" value="dolore">
										<span class="check is-primary"></span>
										<span class="control-label">Dolore</span>
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="field has-check is-horizontal">
					<div class="field-label"><label class="label">Radio</label></div>
					<div class="field-body">
						<div class="field">
							<div class="field is-grouped-multiline is-grouped">
								<div class="control"><label class="b-radio radio"><input type="radio" name="sample-radio" value="one">
										<span class="check"></span>
										<span class="control-label">One</span>
									</label></div>
								<div class="control"><label class="b-radio radio"><input type="radio" name="sample-radio" value="two">
										<span class="check"></span>
										<span class="control-label">Two</span>
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="field is-horizontal">
					<div class="field-label"><label class="label">Switch</label></div>
					<div class="field-body">
						<div class="field">
							<label class="switch is-rounded"><input type="checkbox" value="false">
								<span class="check"></span>
								<span class="control-label">Default</span>
							</label>
						</div>
					</div>
				</div>
				<hr>
				<div class="field is-horizontal">
					<div class="field-label is-normal"><label class="label">File</label></div>
					<div class="field-body">
						<div class="field">
							<div class="field file">
								<label class="upload control">
									<a class="button is-primary">
										<span class="icon"><i class="mdi mdi-upload"></i></span>
										<span>Pick a file</span>
									</a>
									<input type="file">
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div id="sample-modal" class="modal">
		<div class="modal-background jb-modal-close"></div>
		<div class="modal-card">
			<header class="modal-card-head">
				<p class="modal-card-title">Confirm action</p>
				<button class="delete jb-modal-close" aria-label="close"></button>
			</header>
			<section class="modal-card-body">
				<p>This will permanently delete <b>Some Object</b></p>
				<p>This is sample modal</p>
			</section>
			<footer class="modal-card-foot">
				<button class="button jb-modal-close">Cancel</button>
				<button class="button is-danger jb-modal-close">Delete</button>
			</footer>
		</div>
		<button class="modal-close is-large jb-modal-close" aria-label="close"></button>
	</div>
</div>