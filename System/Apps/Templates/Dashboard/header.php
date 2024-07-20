<!doctype html>
<html lang="@( LANGUAGE_CODE )" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">

<head>
	<!-- call sweetalert -->
	@( sweetalert_init() )

	<!-- call header assets method -->
	@( header_assets() )
	@( dashboard_header_assets() )
</head>

<body>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->
	<nav id="navbar-main" class="navbar is-fixed-top">
		<div class="navbar-brand">
			<a class="navbar-item is-hidden-desktop jb-aside-mobile-toggle">
				<span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
			</a>
			<div class="navbar-item has-control">
				<div class="control"><input placeholder="Search everywhere..." class="input"></div>
			</div>
		</div>
		<div class="navbar-brand is-right">
			<a class="navbar-item is-hidden-desktop jb-navbar-menu-toggle" data-target="navbar-menu">
				<span class="icon"><i class="mdi mdi-dots-vertical"></i></span>
			</a>
		</div>
		<div class="navbar-menu fadeIn animated faster" id="navbar-menu">
			<div class="navbar-end">
				<div class="navbar-item has-dropdown has-dropdown-with-icons has-divider is-hoverable">
					<a class="navbar-link is-arrowless">
						<span class="icon"><i class="mdi mdi-menu"></i></span>
						<span>Sample Menu</span>
						<span class="icon">
							<i class="mdi mdi-chevron-down"></i>
						</span>
					</a>
					<div class="navbar-dropdown">
						<a href="@( base_url('dashboard/profile') )" class="navbar-item">
							<span class="icon"><i class="mdi mdi-account"></i></span>
							<span>My Profile</span>
						</a>
						<a class="navbar-item">
							<span class="icon"><i class="mdi mdi-settings"></i></span>
							<span>Settings</span>
						</a>
						<a class="navbar-item">
							<span class="icon"><i class="mdi mdi-email"></i></span>
							<span>Messages</span>
						</a>
						<hr class="navbar-divider">
						<a href="@( base_url('logout') )" class="navbar-item">
							<span class="icon"><i class="mdi mdi-logout"></i></span>
							<span>Log Out</span>
						</a>
					</div>
				</div>
				<div class="navbar-item has-dropdown has-dropdown-with-icons has-divider has-user-avatar is-hoverable">
					<a class="navbar-link is-arrowless">
						<div class="is-user-avatar">
							<img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="John Doe">
						</div>
						<div class="is-user-name"><span>John Doe</span></div>
						<span class="icon"><i class="mdi mdi-chevron-down"></i></span>
					</a>
					<div class="navbar-dropdown">
						<a href="@( base_url('dashboard/profile') )" class="navbar-item">
							<span class="icon"><i class="mdi mdi-account"></i></span>
							<span>My Profile</span>
						</a>
						<a class="navbar-item">
							<span class="icon"><i class="mdi mdi-settings"></i></span>
							<span>Settings</span>
						</a>
						<a class="navbar-item">
							<span class="icon"><i class="mdi mdi-email"></i></span>
							<span>Messages</span>
						</a>
						<hr class="navbar-divider">
						<a href="@( base_url('logout') )" class="navbar-item">
							<span class="icon"><i class="mdi mdi-logout"></i></span>
							<span>Log Out</span>
						</a>
					</div>
				</div>
				<a href="https://vylma.nsyframework.com/" target="_blank" title="About" class="navbar-item has-divider is-desktop-icon-only">
					<span class="icon"><i class="mdi mdi-help-circle-outline"></i></span>
					<span>About</span>
				</a>
				<a href="@( base_url('logout') )" title="Log out" class="navbar-item is-desktop-icon-only">
					<span class="icon"><i class="mdi mdi-logout"></i></span>
					<span>Log out</span>
				</a>
			</div>
		</div>
	</nav>
	<aside class="aside is-placed-left is-expanded">
		<div class="aside-tools">
			<div class="aside-tools-label">
				<span><b>Dashboard</b> Admin</span>
			</div>
		</div>
		<div class="menu is-menu-main">
			<p class="menu-label">General</p>
			<ul class="menu-list">
				<li>
					<a href="@( base_url('dashboard') )" class="has-icon @( terner(get_last_uri_segment() == 'dashboard', 'is-active router-link-active', '') )">
						<span class="icon"><i class="mdi mdi-view-dashboard"></i></span>
						<span class="menu-item-label">Dashboard</span>
					</a>
				</li>
			</ul>
			<p class="menu-label">Examples</p>
			<ul class="menu-list">
				<li>
					<a href="@( base_url('dashboard/homepage') )" class="has-icon @( terner(get_last_uri_segment() == 'homepage', 'is-active router-link-active', '') )">
						<span class="icon"><i class="mdi mdi-home-variant"></i></span>
						<span class="menu-item-label">Homepage</span>
					</a>
				</li>
				<li>
					<a href="@( base_url('dashboard/tables') )" class="has-icon @( terner(get_last_uri_segment() == 'tables', 'is-active router-link-active', '') )">
						<span class="icon"><i class="mdi mdi-table"></i></span>
						<span class="menu-item-label">Tables</span>
					</a>
				</li>

				<li>
					<a href="@( base_url('dashboard/forms') )" class="has-icon @( terner(get_last_uri_segment() == 'forms', 'is-active router-link-active', '') )">
						<span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
						<span class="menu-item-label">Forms</span>
					</a>
				</li>
				<li>
					<a href="@( base_url('dashboard/profile') )" class="has-icon @( terner(get_last_uri_segment() == 'profile', 'is-active router-link-active', '') )">
						<span class="icon"><i class="mdi mdi-account-circle"></i></span>
						<span class="menu-item-label">Profile</span>
					</a>
				</li>
				<li>
					<a class="has-icon has-dropdown-icon @( terner($mark_submenu == 'submenus', 'is-active router-link-active', '') )">
						<span class="icon"><i class="mdi mdi-view-list"></i></span>
						<span class="menu-item-label">Submenus</span>
						<div class="dropdown-icon">
							<span class="icon"><i class="mdi mdi-plus"></i></span>
						</div>
					</a>
					<ul>
						<li>
							<a href="@( base_url('dashboard/crud') )" class="@( terner(get_last_uri_segment() == 'crud', 'is-active router-link-active', '') )">
								<span class="menu-item-label">Crud Example</span>
							</a>
						</li>
						<li>
							<a href="#void">
								<span>Sub Menu With Longname</span>
							</a>
						</li>
					</ul>
				</li>
			</ul>
			<p class="menu-label">About</p>
			<ul class="menu-list">
				<li>
					<a href="https://github.com/kazuyamarino" target="_blank" class="has-icon">
						<span class="icon"><i class="mdi mdi-github"></i></span>
						<span class="menu-item-label">GitHub</span>
					</a>
				</li>
				<li>
					<a href="https://vylma.nsyframework.com/" target="_blank" class="has-icon">
						<span class="icon"><i class="mdi mdi-help-circle"></i></span>
						<span class="menu-item-label">About</span>
					</a>
				</li>
			</ul>
		</div>
	</aside>
