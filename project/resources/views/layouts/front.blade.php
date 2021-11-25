<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    @if(isset($page->meta_tag) && isset($page->meta_description))
        <meta name="keywords" content="{{ $page->meta_tag }}">
        <meta name="description" content="{{ $page->meta_description }}"> 
		<title>{{ $page->title }} - {{ $gs->title}}</title>
		
    @elseif(isset($blog->meta_tag) && isset($blog->meta_description))
        <meta name="keywords" content="{{ $blog->meta_tag }}">
        <meta name="description" content="{{ $blog->meta_description }}"> 
		<title>{{ $blog->title }} - {{ $gs->title}}</title>

    @elseif(isset($ppage->meta_tag) && isset($ppage->meta_description))
        <meta name="keywords" content="{{ $ppage->meta_tag }}">
        <meta name="description" content="{{ $ppage->meta_description }}"> 
		<title>{{ $ppage->title }} - {{ $gs->title}}</title>

    @elseif(\Request::is('contact'))  
    	@if(isset($ps->contact_meta_key) && isset($ps->contact_meta_description))
	        <meta name="keywords" content="{{ $ps->contact_meta_key }}">
	        <meta name="description" content="{{ $ps->contact_meta_description }}"> 
			<title>{{ $langg->lang7 }} - {{$gs->title}}</title>	
		@endif

    @elseif(isset($faqs))  
    	@if(isset($ps->faq_meta_key) && isset($ps->faq_meta_description))
	        <meta name="keywords" content="{{ $ps->faq_meta_key }}">
	        <meta name="description" content="{{ $ps->faq_meta_description }}"> 
			<title>{{ $langg->lang5 }} - {{$gs->title}}</title>	
		@endif

    @elseif(\Request::is('plans'))  
    	@if(isset($gs->plan_meta_key) && isset($gs->plan_meta_description))
	        <meta name="keywords" content="{{ $gs->plan_meta_key }}">
	        <meta name="description" content="{{ $gs->plan_meta_description }}"> 
			<title>{{ $langg->lang58 }} - {{$gs->title}}</title>	
		@endif

    @elseif(\Request::is('teams'))  
    	@if(isset($ps->team_meta_key) && isset($ps->team_meta_description))
	        <meta name="keywords" content="{{ $ps->team_meta_key }}">
	        <meta name="description" content="{{ $ps->team_meta_description }}"> 
			<title>{{ $langg->lang60 }} - {{$gs->title}}</title>	
		@endif


    @elseif(\Request::is('projects'))  
    	@if(isset($ps->project_meta_key) && isset($ps->project_meta_description))
	        <meta name="keywords" content="{{ $ps->project_meta_key }}">
	        <meta name="description" content="{{ $ps->project_meta_description }}"> 
			<title>{{ $langg->lang59 }} - {{$gs->title}}</title>	
		@endif

    @elseif(\Request::is('plan/*'))  
    	@if(isset($product->meta_tag) && isset($product->meta_description))
	        <meta name="keywords" content="{{ $product->meta_tag }}">
	        <meta name="description" content="{{ $product->meta_description }}"> 
			<title>{{ $product->title }} - {{$gs->title}}</title>	
		@endif

    @else
	    <meta name="keywords" content="{{ $seo->meta_keys }}">
	    <meta name="author" content="GeniusOcean">
		<title>{{$gs->title}}</title>	    
    @endif

	<!-- favicon -->
	<link rel="icon"  type="image/x-icon" href="{{asset('assets/images/'.$gs->favicon)}}"/>
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap.min.css') }}">
	<!-- Plugin css -->
	<link rel="stylesheet" href="{{ asset('assets/front/css/plugin.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/front/css/animate.css') }}">
	<!-- stylesheet -->
	<link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/front/css/custom.css') }}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{ asset('assets/front/css/responsive.css') }}">

    <!--Updated CSS-->
  <link rel="stylesheet" href="{{ asset('assets/front/css/styles.php?color='.str_replace('#','',$gs->colors)) }}">
	@yield('styles')

</head>

<body>

@if($gs->is_loader == 1)
	<div class="preloader" id="preloader" style="background: url({{asset('assets/images/'.$gs->loader)}}) no-repeat scroll center center #FFF;"></div>
@endif

	<!--Main-Menu Area Start-->
	<div class="mainmenu-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">                 
					<nav class="navbar navbar-expand-lg navbar-light">
						<a class="navbar-brand" href="{{ route('front.index') }}">
							<img src="{{ asset('assets/images/'.$gs->logo) }}" alt="">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu" aria-controls="main_menu"
							aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse fixed-height" id="main_menu">
							<ul class="navbar-nav ml-auto">
								@if($gs->is_home == 1)
								<li class="nav-item">
									<a class="nav-link" href="{{ route('front.index') }}">{{ $langg->lang2 }}</a>
								</li>
								@endif
								

								@if($gs->is_services == 1)
								<li class="nav-item dropdown mega-menu">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										{{ $langg->lang57 }}
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									  <div class="container">
										<div class="row">

										@foreach(DB::table('categories')->where('status',1)->get() as $cat)

										  <div class="col-md-4">
											<h4 class="title">{{ $cat->name }}</h4>
											@if(DB::table('services')->where('category_id',$cat->id)->count() > 0)
											<ul class="nav flex-column">
												@foreach(DB::table('services')->where('category_id',$cat->id)->get() as $sdata)
												<li class="nav-item">
												<a class="nav-link" href="{{ route('front.service',$sdata->slug) }}"><i class="fas fa-chevron-right"></i>{{ $sdata->title }}</a>
												</li>

												@endforeach
											  </ul>
											  @endif
										  </div>
										
										@endforeach

										</div>
									  </div>
									</div>
								</li>
								@endif

								@if($gs->is_plans == 1)
								<li class="nav-item">
									<a class="nav-link" href="{{ route('front.plans') }}">{{ $langg->lang58 }}</a>
								</li>
								@endif
								@if($gs->is_projects == 1)
								<li class="nav-item">
									<a class="nav-link" href="{{ route('front.projects') }}">{{ $langg->lang59 }}</a>
								</li>
								@endif
								@if($gs->is_teams == 1)
								<li class="nav-item">
									<a class="nav-link" href="{{ route('front.teams') }}">{{ $langg->lang60 }}</a>
								</li>
								@endif
								@if($gs->is_blog == 1)
								<li class="nav-item">
									<a class="nav-link" href="{{ route('front.blog') }}">{{ $langg->lang4 }}</a>
								</li>
								@endif
								@if($gs->is_faq == 1)
								<li class="nav-item">
									<a class="nav-link" href="{{ route('front.faq') }}">{{ $langg->lang5 }} </a>
								</li>
								@endif
								@if($gs->is_pages == 1)
									@if(DB::table('pages')->count() > 0)
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											{{ $langg->lang6 }}
										</a>
										<ul class="dropdown-menu">
											@foreach(DB::table('pages')->orderBy('id','desc')->get() as $data)
											<li><a class="dropdown-item" href="{{ route('front.page',$data->slug) }}"> <i class="fa fa-angle-double-right"></i>{{ $data->title }}</a></li>
											@endforeach
										</ul>
									</li>
									@endif
								@endif
								@if($gs->is_contact == 1)
								<li class="nav-item">
									<a class="nav-link" href="{{ route('front.contact') }}">{{ $langg->lang7 }}</a>
								</li>
								@endif
								
								<li class="nav-item">
									<a class="nav-link mybtn1" href="javascript;;"  data-toggle="modal" data-target="#user-login">{{ $langg->lang62 }}</a>
								</li>
								
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!--Main-Menu Area Start-->

@yield('content')

<!-- Footer Area Start -->
<footer class="footer" id="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-4">
				<div class="footer-widget about-widget">
					<div class="footer-logo">
						<a href="{{ route('front.index') }}">
							<img src="{{ asset('assets/images/'.$gs->footer_logo) }}" alt="">
						</a>
					</div>
					<div class="text">
						<p>
							{{ $gs->footer }}
						</p>
					</div>
					
				</div>
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="footer-widget address-widget">
					<h4 class="title">
						{{ $langg->lang49 }}
					</h4>
					<ul class="about-info">
						@if(App\Models\Pagesetting::find(1)->street != null)
						<li>
							<p>
									<i class="fas fa-globe"></i>
								{{ App\Models\Pagesetting::find(1)->street }}
							</p>
						</li>
						@endif
						@if(App\Models\Pagesetting::find(1)->phone != null)
						<li>
							<p>
								<a href="tel:{{App\Models\Pagesetting::find(1)->phone}}">
									<i class="fas fa-phone"></i>
									{{ App\Models\Pagesetting::find(1)->phone }}
								</a>
							</p>
						</li>
						@endif
						@if(App\Models\Pagesetting::find(1)->email != null)
						<li>
							<p>
								<i class="far fa-envelope"></i>
								<a href="mailto:{{App\Models\Pagesetting::find(1)->emaill}}">
									{{ App\Models\Pagesetting::find(1)->email }}
								</a>
							</p>
						</li>
						@endif
					</ul>
				</div>
			</div>
			<div class="col-md-6 col-lg-4">
					<div class="footer-widget  footer-newsletter-widget">
						<h4 class="title">
							{{ $langg->lang50 }}
						</h4>
						<div class="newsletter-form-area">
							<form id="subscribeform" action="{{ route('front.subscribe') }}" method="POST">
								{{ csrf_field() }}
								<input type="email" id="subemail" required="" name="email" placeholder="{{ $langg->lang51 }}">
								<button id="sub-btn1" type="submit">
									<i class="far fa-paper-plane"></i>
								</button>
							</form>
						</div>
						<div class="social-links">
							<h4 class="title">
									{{  $langg->lang52 }}:
							</h4>
							<div class="fotter-social-links">
								<ul>
                               	     @if(App\Models\Socialsetting::find(1)->f_status == 1)
                                      <li>
                                        <a href="{{ App\Models\Socialsetting::find(1)->facebook }}" class="facebook" target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                      </li>
                                      @endif

                                      @if(App\Models\Socialsetting::find(1)->g_status == 1)
                                      <li>
                                        <a href="{{ App\Models\Socialsetting::find(1)->gplus }}" class="google-plus" target="_blank">
                                            <i class="fab fa-google-plus-g"></i>
                                        </a>
                                      </li>
                                      @endif

                                      @if(App\Models\Socialsetting::find(1)->t_status == 1)
                                      <li>
                                        <a href="{{ App\Models\Socialsetting::find(1)->twitter }}" class="twitter" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                      </li>
                                      @endif

                                      @if(App\Models\Socialsetting::find(1)->l_status == 1)
                                      <li>
                                        <a href="{{ App\Models\Socialsetting::find(1)->linkedin }}" class="linkedin" target="_blank">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                      </li>
                                      @endif

                                      @if(App\Models\Socialsetting::find(1)->d_status == 1)
                                      <li>
                                        <a href="{{ App\Models\Socialsetting::find(1)->dribble }}" class="dribble" target="_blank">
                                            <i class="fab fa-dribbble"></i>
                                        </a>
                                      </li>
                                      @endif

								</ul>
							</div>
						</div>
				
					</div>
			</div>
		</div>
	</div>
	<div class="copy-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
						<div class="content">
							<div class="content">
								<p>{!! $gs->copyright !!}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- Footer Area End -->



<!-- USER LOGIN MODAL -->
<div class="modal fade" id="user-login" tabindex="-1" role="dialog" aria-labelledby="user-login-Title"
	aria-hidden="true">
	<div class="modal-dialog  modal-dialog-centered modal-lg" style="transition: .5s;" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
					<div class="login-area">
							<div class="header-area">
								<h4 class="title">{{ $langg->lang62 }}</h4>
							</div>
							<div class="login-form signin-form">

								<form id="quoteform" action="{{ route('front.quote.submit') }}"
									method="POST">
									{{ csrf_field() }}
										<div class="row">
											<div class="col-lg-6">
												<div class="form-input">
													<input type="text" class="quote-input" name="name" value=""
														placeholder="{{ $langg->lang63 }}" required="">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-input">
													<input type="email" class="quote-input" name="email" value=""
														placeholder="{{ $langg->lang67 }}" required="">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-12">
												<div class="form-input">
													<input type="text" class="quote-input" name="subject" value=""
														placeholder="{{ $langg->lang64 }}" required="">
												</div>
											</div>
										</div>
								@if($gs->quotes != null)
									<div class="row">
										<div class="col-lg-12">
											<ul class="check-list">
												@foreach (explode(',',$gs->quotes) as $element)
													<li>
														<div class="custom-control custom-checkbox my-1 mr-sm-2">
															<input  name="quotes[]" value="{{ $element }}" type="checkbox" class="custom-control-input quote-input-check" id="c{{ $loop->index }}">
															<label class="custom-control-label" for="c{{ $loop->index }}">{{ $element }}</label>
														</div>
													</li>
												@endforeach
											</ul>
										</div>
									</div>
								@endif	
									<div class="row">
										<div class="col-lg-12 mt-3">
											<div class="form-input">
												<textarea name="details" class="quote-input-text" placeholder="{{ $langg->lang65 }}" required></textarea>
											</div>
										</div>
									</div>
									<button type="submit" class="submit-btn quote-submit-btn">{{ $langg->lang66 }}</button>
								</form>
							</div>
						</div>
			</div>
		</div>
	</div>
</div>
<!-- USER LOGIN MODAL ENDS -->



<!-- Back to Top Start -->
<div class="bottomtotop">
	<i class="fas fa-chevron-right"></i>
</div>
<!-- Back to Top End -->

<script type="text/javascript">
  var mainurl = "{{url('/')}}";
  var gs      = {!! json_encode($gs) !!};
</script>

	<!-- jquery -->
	<script src="{{ asset('assets/front/js/jquery.js') }}"></script>
	<!-- bootstrap -->
	<script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
	<!-- popper -->
	<script src="{{ asset('assets/front/js/popper.min.js') }}"></script>
	<!-- plugin js-->
	<script src="{{ asset('assets/front/js/plugin.js') }}"></script>
	<!-- notify js-->
	<script src="{{ asset('assets/front/js/notify.js') }}"></script>
	<!-- main -->
	<script src="{{ asset('assets/front/js/main.js') }}"></script>
	<!-- custom -->
	<script src="{{ asset('assets/front/js/custom.js') }}"></script>

    {!! $seo->google_analytics !!}

  @if($gs->is_talkto == 1)
    <!--Start of Tawk.to Script-->
      {!! $gs->talkto !!}
    <!--End of Tawk.to Script-->
  @endif

	@yield('scripts')

</body>

</html>
