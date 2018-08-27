<nav class="pcoded-navbar">
	<div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
	<div class="pcoded-inner-navbar main-menu">
		<div class="">
			<div class="main-menu-header">
				<img class="img-80 img-radius" src="{{ asset('backend/img/user.svg') }}" alt="User-Profile-Image">
				<div class="user-details">
					<span id="more-details">John Doe<i class="fa fa-caret-down"></i></span>
				</div>
			</div>
			<div class="main-menu-content m-t-10">
				<ul>
					<li class="more-details">
						<a href="user-profile.html"><i class="ti-user"></i>View Profile</a>
						<a href="#!"><i class="ti-settings"></i>Settings</a>
						<a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <i class="ti-layout-sidebar-left"></i>Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
					</li>
				</ul>
			</div>
		</div>

		<!-- sidebar menu -->
		<div class="pcoded-navigation-label m-t-15">Navigation</div>
		<ul class="pcoded-item pcoded-left-item">
			<li class="">
				<a href="{{ route('home') }}" class="waves-effect waves-dark">
					<span class="pcoded-micon"><i class="ti-home"></i></span>
					<span class="pcoded-mtext">Dashboard</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>
			<li class="pcoded-hasmenu">
				<a href="javascript:void(0)" class="waves-effect waves-dark">
				<span class="pcoded-micon"><i class="ti-archive"></i><b>D</b></span>
				<span class="pcoded-mtext">Dropdown</span>
				<span class="pcoded-mcaret"></span>
				</a>
				<ul class="pcoded-submenu">
					<li class="">
						<a href="!#" class="waves-effect waves-dark">
						<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
						<span class="pcoded-mtext">Menu 1</span>
						<span class="pcoded-mcaret"></span>
						</a>
					</li>
					<li class="">
						<a href="!#" class="waves-effect waves-dark">
						<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
						<span class="pcoded-mtext">Menu 2</span>
						<span class="pcoded-mcaret"></span>
						</a>
					</li>
				</ul>
			</li>
			<li class="">
				<a href="{{ route('users.index') }}" class="waves-effect waves-dark">
					<span class="pcoded-micon"><i class="ti-user"></i></span>
					<span class="pcoded-mtext">User</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>
			<li class="">
				<a href="{{ route('home') }}" class="waves-effect waves-dark">
					<span class="pcoded-micon"><i class="ti-settings"></i></span>
					<span class="pcoded-mtext">Web Setting</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>
		</ul>
		<!-- end sidebar menu  -->

	</div>
</nav>