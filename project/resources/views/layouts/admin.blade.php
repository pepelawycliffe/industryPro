<!doctype html>
<html lang="en" dir="ltr">
	
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="author" content="GeniusOcean">
		<!-- Title -->
		<title>{{$gs->title}}</title>
		<!-- favicon -->
		<link rel="icon"  type="image/x-icon" href="{{asset('assets/images/'.$gs->favicon)}}"/>
		<!-- Bootstrap -->
		<link href="{{asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet" />
		<!-- Fontawesome -->
		<link rel="stylesheet" href="{{asset('assets/admin/css/fontawesome.css')}}">
		<!-- icofont -->
		<link rel="stylesheet" href="{{asset('assets/admin/css/icofont.min.css')}}">
		<!-- Sidemenu Css -->
		<link href="{{asset('assets/admin/plugins/fullside-menu/css/dark-side-style.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/admin/plugins/fullside-menu/waves.min.css')}}" rel="stylesheet" />

		<link href="{{asset('assets/admin/css/plugin.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/admin/css/jquery.tagit.css')}}" rel="stylesheet" />		
    	<link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-coloroicker.css') }}">
		<!-- Main Css -->
		<link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/admin/css/custom.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/admin/css/responsive.css')}}" rel="stylesheet" />
		@yield('styles')

	</head>
	<body>
		<div class="page">
			<div class="page-main">
				<!-- Header Menu Area Start -->
				<div class="header">
					<div class="container-fluid">
						<div class="d-flex justify-content-between">
							<div class="menu-toggle-button">
								<a class="nav-link" href="javascript:;" id="sidebarCollapse">
									<div class="my-toggl-icon">
											<span class="bar1"></span>
											<span class="bar2"></span>
											<span class="bar3"></span>
									</div>
								</a>
							</div>

							<div class="right-eliment">
								<ul class="list">


									<li class="bell-area">
										<a id="notf_order" class="dropdown-toggle-1" href="javascript:;">
											<i class="far fa-newspaper"></i>
											<span data-href="{{ route('order-notf-count') }}" id="order-notf-count">{{ App\Models\Notification::countOrder() }}</span>
										</a>
										<div class="dropdown-menu">
											<div class="dropdownmenu-wrapper" data-href="{{ route('order-notf-show') }}" id="order-notf-show">
										</div>
										</div>
									</li>

									<li class="login-profile-area">
										<a class="dropdown-toggle-1" href="javascript:;">
											<div class="user-img">
												<img src="{{ Auth::guard('admin')->user()->photo ? asset('assets/images/admins/'.Auth::guard('admin')->user()->photo ):asset('assets/images/noimage.png') }}" alt="">
											</div>
										</a>
										<div class="dropdown-menu">
											<div class="dropdownmenu-wrapper">
													<ul>
														<h5>Welcome!</h5>
															<li>
																<a href="{{ route('admin.profile') }}"><i class="fas fa-user"></i> Edit Profile</a>
															</li>
															<li>
																<a href="{{ route('admin.password') }}"><i class="fas fa-cog"></i> Change Password</a>
															</li>
															<li>
																<a href="{{ route('admin.logout') }}"><i class="fas fa-power-off"></i> Logout</a>
															</li>
														</ul>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- Header Menu Area End -->
				<div class="wrapper">
					<!-- Side Menu Area Start -->
					<nav id="sidebar" class="nav-sidebar">
						<ul class="list-unstyled components" id="accordion">
							<li>
								<a href="{{ route('admin.dashboard') }}" class="wave-effect active"><i class="fa fa-home mr-2"></i>Dashbord</a>
							</li>
							<li>
								<a href="#order" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false"><i class="fas fa-hand-holding-usd"></i>Orders</a>
								<ul class="collapse list-unstyled" id="order" data-parent="#accordion" >
                                   	<li>
                                    	<a href="{{route('admin-order-index')}}"> All Orders</a>
                                	</li>
                                    <li>
                                        <a href="{{route('admin-order-pending')}}"> Pending Orders</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin-order-processing')}}"> Processing Orders</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin-order-completed')}}"> Completed Orders</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin-order-declined')}}"> Declined Orders</a>
                                    </li>  

								</ul>
							</li>
							<li>
								<a href="#menu2" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="icofont-cart"></i>Pricing Plans
								</a>
								<ul class="collapse list-unstyled" id="menu2" data-parent="#accordion">
									<li>
										<a href="{{ route('admin-prod-create') }}"><span>Add New Plan</span></a>
									</li>
									<li>
										<a href="{{ route('admin-prod-index') }}"><span>All Plans</span></a>
									</li>
									<li>
										<a href="{{ route('admin-prod-info') }}"><span>Informations</span></a>
									</li>
								</ul>
							</li>

							<li>
								<a href="#blog" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fas fa-fw fa-newspaper"></i>Blog
								</a>
								<ul class="collapse list-unstyled" id="blog" data-parent="#accordion">
									<li>
										<a href="{{ route('admin-cblog-index') }}"><span>Categories</span></a>
									</li>
									<li>
										<a href="{{ route('admin-blog-index') }}"><span>Posts</span></a>
									</li>
								</ul>
							</li>
							<li>
								<a href="{{ route('admin-quote-index') }}" class=" wave-effect"><i class="fas fa-question-circle"></i>Quotes</a>
							</li>

							<li>
								<a href="#service" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fas fa-fw fa-envelope-square"></i>Service
								</a>
								<ul class="collapse list-unstyled" id="service" data-parent="#accordion">
									<li>
										<a href="{{ route('admin-cat-index') }}"><span>Categories</span></a>
									</li>
									<li>
										<a href="{{ route('admin-service-index') }}"><span>Services</span></a>
									</li>
								</ul>
							</li>

							@if(Auth::guard('admin')->user()->IsAdmin())

							<li>
								<a href="#general" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fas fa-cogs"></i>General Settings
								</a>
								<ul class="collapse list-unstyled" id="general" data-parent="#accordion">
                                    <li>
                                    	<a href="{{ route('admin-gs-logo') }}"><span>Logo</span></a>
                                    </li>
                                    <li>
                                    	<a href="{{ route('admin-gs-fav') }}"><span>Favicon</span></a>
                                    </li>
                                    <li>
                                    	<a href="{{ route('admin-gs-load') }}"><span>Loader</span></a>
                                    </li>
                                    <li>
                                    	<a href="{{ route('admin-gs-breadcumb') }}"><span>Breadcumb Banner</span></a>
                                    </li>
                                    <li>
                                    <a href="{{ route('admin-gs-contents') }}"><span>Website Contents</span></a>
                                    </li>
                                    <li>
                                    <a href="{{ route('admin-gs-success') }}"><span>Success Messages</span></a>
                                    </li>
                                    <li>
                                    	<a href="{{ route('admin-gs-footer') }}"><span>Footer</span></a>
                                    </li>
                                    <li>
                                    	<a href="{{ route('admin-gs-error') }}"><span>Error Page</span></a>
                                    </li>
								</ul>
							</li>

							@endif


							<li>
								<a href="#homepage" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fas fa-edit"></i>Home Page Settings
								</a>
								<ul class="collapse list-unstyled" id="homepage" data-parent="#accordion">
                                    <li>
                                    	<a href="{{ route('admin-sl-index') }}"><span>Sliders</span></a>
                                    </li>

                                    <li>
                                    	<a href="{{ route('admin-gs-service') }}"><span>Welcome Informations</span></a>
                                    </li>
                                    <li>
                                    	<a href="{{ route('admin-ps-video') }}"><span>Experience Informations</span></a>
                                    </li>
                                    <li>
                                    	<a href="{{ route('admin-experience-index') }}"><span>Experiences</span></a>
                                    </li>
                                    <li>
                                    	<a href="{{ route('admin-feature-index') }}"><span>Feature Section</span></a>
                                    </li>
                                    <li>
                                    	<a href="{{ route('admin-ps-homecontact') }}"><span>Contact Section</span></a>
                                    </li>

                                    <li>
                                    	<a href="{{ route('admin-portfolio-index') }}"><span>Project Section</span></a>
                                    </li>

                                    <li>
                                    	<a href="{{ route('admin-ps-present') }}"><span>Video Presentation Section</span></a>
                                    </li>  

                                    <li>
                                    	<a href="{{ route('admin-member-index') }}"><span>Team Section</span></a>
                                    </li>
                                    <li>
                                    	<a href="{{ route('admin-review-index') }}"><span>Review Section</span></a>
                                    </li>
                                    <li>
                                    	<a href="{{ route('admin-ps-blog') }}"><span>Latest Blog  Section</span></a>
                                    </li>
                                    <li>
                                    	<a href="{{ route('admin-ps-customize') }}"><span>Home Page Customization</span></a>
                                    </li>
								</ul>
							</li>


							@if(Auth::guard('admin')->user()->IsAdmin())

							<li>
								<a href="#menu" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fas fa-file-code"></i>Menu Page Settings
								</a>
								<ul class="collapse list-unstyled" id="menu" data-parent="#accordion">
                                    <li>
                                    	<a href="{{ route('admin-faq-index') }}"><span>FAQ Page</span></a>
                                    </li>
                                    <li>
                                    	<a href="{{ route('admin-ps-contact') }}"><span>Contact Us Page</span></a>
                                    </li>
                                    <li>
                                    	<a href="{{ route('admin-page-index') }}"><span>Other Pages</span></a>
                                    </li>
                                    <li>
                                    	<a href="{{ route('admin-ps-menu-customize') }}"><span>Mange Menu Links</span></a>
                                    </li>
								</ul>
							</li>
							<li>
								<a href="#emails" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fas fa-at"></i>Email Settings
								</a>
								<ul class="collapse list-unstyled" id="emails" data-parent="#accordion">
                                    <li><a href="{{route('admin-mail-config')}}"><span>Email Configurations</span></a></li>  
                                    <li><a href="{{route('admin-group-show')}}"><span>Group Email</span></a></li>  
								</ul>
							</li>

							<li>
								<a href="#payments" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fas fa-file-code"></i>Payment Settings
								</a>
								<ul class="collapse list-unstyled" id="payments" data-parent="#accordion">
                                    <li><a href="{{route('admin-gs-payments')}}"><span>Payment Informations</span></a></li>   
                                    <li><a href="{{route('admin-currency-index')}}"><span>Currencies</span></a></li>  
								</ul>
							</li>
							<li>
								<a href="#socials" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fas fa-paper-plane"></i>Social Settings
								</a>
								<ul class="collapse list-unstyled" id="socials" data-parent="#accordion">
                                        <li><a href="{{route('admin-social-index')}}"><span>Social Links</span></a></li>   
								</ul>
							</li>
							<li>
								<a href="{{ route('admin-lang-index') }}"><i class="fas fa-language"></i>Language Settings</a>
							</li>
							<li>
								<a href="#seoTools" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fas fa-wrench"></i>SEO Tools
								</a>
								<ul class="collapse list-unstyled" id="seoTools" data-parent="#accordion">
                                    <li>
                                    	<a href="{{ route('admin-seotool-analytics') }}"><span>Google Analytics</span></a>
                                    </li
                                    >
                                    <li>
                                    	<a href="{{ route('admin-seotool-keywords') }}"><span>Website Meta Keywords</span></a>
                                    </li>
								</ul>
							</li>
							<li>
								<a href="#sactive" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fas fa-cog"></i>{{ __('System Activation') }}
								</a>
								<ul class="collapse list-unstyled" id="sactive" data-parent="#accordion">
					
									<li><a href="{{route('admin-activation-form')}}"> {{ __('Activation') }}</a></li>
									<li><a href="{{route('admin-generate-backup')}}"> {{ __('Generate Backup') }}</a></li>
								</ul>
							</li>
							@endif

							<li>
								<a href="{{ route('admin-subs-index') }}" class=" wave-effect"><i class="fas fa-users-cog mr-2"></i>Subscribers</a>
							</li>
						</ul>
						
					<p class="version-name"> Version: 1.2</p>
					</nav>
					<!-- Main Content Area Start -->
					
					@yield('content')
					<!-- Main Content Area End -->
					</div>
				</div>
			</div>
			
		<script type="text/javascript">
		  var mainurl = "{{url('/')}}";
		   var admin_loader = {{ $gs->is_admin_loader }};
		</script>

		<!-- Dashboard Core -->
		<script src="{{asset('assets/admin/js/vendors/jquery-1.12.4.min.js')}}"></script>
		<script src="{{asset('assets/admin/js/vendors/bootstrap.min.js')}}"></script>
		<script src="{{asset('assets/admin/js/jqueryui.min.js')}}"></script>
		<!-- Fullside-menu Js-->
		<script src="{{asset('assets/admin/plugins/fullside-menu/jquery.slimscroll.min.js')}}"></script>
		<script src="{{asset('assets/admin/plugins/fullside-menu/waves.min.js')}}"></script>

		<script src="{{asset('assets/admin/js/plugin.js')}}"></script>
		<script src="{{asset('assets/admin/js/Chart.min.js')}}"></script>
		<script src="{{asset('assets/admin/js/tag-it.js')}}"></script>
		<script src="{{asset('assets/admin/js/nicEdit.js')}}"></script>
        <script src="{{asset('assets/admin/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{asset('assets/admin/js/notify.js') }}"></script>

        <script src="{{asset('assets/admin/js/jquery.canvasjs.min.js')}}"></script>
        
		<script src="{{asset('assets/admin/js/load.js')}}"></script>
		<!-- Custom Js-->
		<script src="{{asset('assets/admin/js/custom.js')}}"></script>
		<!-- AJAX Js-->
		<script src="{{asset('assets/admin/js/myscript.js')}}"></script>
		@yield('scripts')

@if($gs->is_admin_loader == 0)
<style>
	div#geniustable_processing {
		display: none !important;
	}
</style>
@endif

	</body>

</html>