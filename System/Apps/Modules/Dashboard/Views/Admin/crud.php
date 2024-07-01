<!-- call pull alerts from Alerts.php -->
@( pull_alerts() )

<div class="wrap">
	<div class="content">
		<br>
		<div class="columns">
			<div class="column is-full">
				<div class="card">
					<div class="card-content">
						<div class="content">
							<form id="multidelete-frm" action="@( base_url('dashboard/multidelete') )" method="POST" data-abide novalidate>
								<div class="columns">
									<div class="column is-6">
										<h5>Users Database</h5>
									</div>
									<div class="column is-6">
										<div class="field is-grouped is-pulled-right">
											<div class="control">
												<button id="reset-filter" class="button is-link" type="button">Reset</button>
											</div>
											<div class="control">
												<a href="@( base_url('register') )" target="_blank" class="button is-info" type="reset">Register</a>
											</div>
											<div class="control">
												<button id="multidelete-btn" class="button is-danger" type="button">Delete Selected</button>
											</div>
										</div>
									</div>
								</div>
								<table id="example" class="display responsive" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th class="id">
												<input type="checkbox" id="select-all">
											</th>
											<th class="user_type">User&nbsp;Type</th>
											<th class="user_name">User&nbsp;Name</th>
											<th class="user_status">Status</th>
											<th class="create_date">Create&nbsp;Date</th>
											<th class="update_date">Update&nbsp;Date</th>
											<th class="login_date">Login&nbsp;Date</th>
											<th class="logout_date">Logout&nbsp;Date</th>
											<th class="action">Action</th>
										</tr>
									</thead>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
