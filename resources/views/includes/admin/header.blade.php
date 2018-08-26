<nav class="navbar header-navbar pcoded-header">
	<div class="navbar-wrapper">
		<div class="navbar-logo">
			<a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
			<i class="ti-menu"></i>
			</a>
			<div class="mobile-search waves-effect waves-light">
				<div class="header-search">
					<div class="main-search morphsearch-search">
						<div class="input-group">
							<span class="input-group-prepend search-close"><i class="ti-close input-group-text"></i></span>
							<input type="text" class="form-control" placeholder="Enter Keyword">
							<span class="input-group-append search-btn"><i class="ti-search input-group-text"></i></span>
						</div>
					</div>
				</div>
			</div>
			<a href="{{ route('home') }}">
				<img class="img-fluid img-fluid m-l-30" src="{{ asset('img/logo-white.png') }}" width="130" alt="Theme-Logo" />
			</a>
			<a class="mobile-options waves-effect waves-light">
				<i class="ti-more"></i>
			</a>
		</div>
		<div class="navbar-container container-fluid">
			<ul class="nav-left">
				<li>
					<div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
				</li>
				<li>
					<a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
					<i class="ti-fullscreen"></i>
					</a>
				</li>
			</ul>
			<ul class="nav-right">
				{{-- <li class="header-notification">
					<a href="#!" class="waves-effect waves-light">
					<i class="ti-bell"></i>
					<span class="badge bg-c-red"></span>
					</a>
					<ul class="show-notification">
						<li>
							<h6>Notifications</h6>
							<label class="label label-danger">New</label>
						</li>
						<li class="waves-effect waves-light">
							<div class="media">
								<img class="d-flex align-self-center img-radius" src="../files/assets/images/avatar-2.jpg" alt="Generic placeholder image">
								<div class="media-body">
									<h5 class="notification-user">John Doe</h5>
									<p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
									<span class="notification-time">30 minutes ago</span>
								</div>
							</div>
						</li>
						<li class="waves-effect waves-light">
							<div class="media">
								<img class="d-flex align-self-center img-radius" src="../files/assets/images/avatar-4.jpg" alt="Generic placeholder image">
								<div class="media-body">
									<h5 class="notification-user">Joseph William</h5>
									<p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
									<span class="notification-time">30 minutes ago</span>
								</div>
							</div>
						</li>
						<li class="waves-effect waves-light">
							<div class="media">
								<img class="d-flex align-self-center img-radius" src="../files/assets/images/avatar-3.jpg" alt="Generic placeholder image">
								<div class="media-body">
									<h5 class="notification-user">Sara Soudein</h5>
									<p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
									<span class="notification-time">30 minutes ago</span>
								</div>
							</div>
						</li>
					</ul>
				</li> --}}
				<li class="user-profile header-notification">
					<a href="#!" class="waves-effect waves-light">
						<img src="{{ asset('backend/img/user.svg') }}" class="img-radius" alt="User-Profile-Image">
						<span>{{ Auth::user()->name }}</span>
						<i class="ti-angle-down"></i>
					</a>
					<ul class="show-notification profile-notification">
						<li class="waves-effect waves-light">
							<a href="{{ route('auth_profile') }}">
								<i class="ti-user"></i> Profil
							</a>
						</li>
						<li class="waves-effect waves-light">
							<a href="{{ route('auth_change_password') }}">
								<i class="ti-key"></i> Kata Sandi
							</a>
						</li>
						<li class="waves-effect waves-light">
							<a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="ti-layout-sidebar-left"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>