@extends('layouts.front') 

@section('content')

@if($ps->slider == 1)

@if(count($sliders))

@include('includes.slider-style')

@endif

@endif


	@if($ps->slider == 1)

	<!-- Hero Area Start -->
	<section class="hero-area">
		@if(count($sliders))
			<div class="hero-area-slider">
					@foreach($sliders as $data)
						<div class="intro-content {{$data->position}}" style="background-image: url({{asset('assets/images/sliders/'.$data->photo)}})">
							<div class="container">
								<div class="row">
									<div class="col-lg-12">
										<div class="slider-content">
											<!-- layer 1 -->
											<div class="layer-1">
												<h4 style="font-size: {{$data->subtitle_size}}px; color: {{$data->subtitle_color}}" class="subtitle subtitle{{$data->id}}" data-animation="animated {{$data->subtitle_anime}}">{{$data->subtitle_text}}</h4>
												<h2 style="font-size: {{$data->title_size}}px; color: {{$data->title_color}}" class="title title{{$data->id}}" data-animation="animated {{$data->title_anime}}">{{$data->title_text}}</h2>
											</div>
											<!-- layer 2 -->
											<div class="layer-2">
												<p style="font-size: {{$data->details_size}}px; color: {{$data->details_color}}"  class="text text{{$data->id}}" data-animation="animated {{$data->details_anime}}">{{$data->details_text}}</p>
											</div>
											<!-- layer 3 -->
											<div class="layer-3">
												<a href="{{$data->link}}" target="_blank" class="mybtn1"><span>{{ $langg->lang8 }} <i class="fas fa-chevron-right"></i></span></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					@endforeach
			</div>
		@endif
	</section>
	<!-- Hero Area End -->

	@endif

	@if($ps->service == 1)

	<!-- Features Area Start-->
	<section class="features">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="feature-area">
						<div class="row">
							@foreach(DB::table('services')->where('is_featured',1)->get() as $service)	
							<div class="col-lg-4 col-md-6">
								<a href="{{ route('front.service',$service->slug) }}" target="_blank" class="single-feature">
									<div class="icon">
										<img src="{{ asset('assets/images/services/'.$service->photo) }}" alt="">
									</div>
									<div class="content">
										<h4 class="title">
											{{ $service->title }}
										</h4>
										<p class="text">
											{{ $service->subtitle }}
										</p>
										<span class="link">
											<i class="fas fa-angle-double-right"></i>
										</span>
									</div>
								</a>
							</div>
							@endforeach

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Features Area End-->

	@endif

	@if($ps->featured == 1)

	<!-- About Area Start-->
	<section class="about">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="about-img">
						<img src="{{ asset('assets/images/'.$gs->service_image) }}" alt="">
					</div>
				</div>
				<div class="col-lg-6 d-flex align-self-center">
					<div class="about-content">
							<div class="section-heading">
									<h5 class="sub-title">
											{!! $gs->service_subtitle !!}
									</h5>
									<h2 class="title extra-padding">
										{!! $gs->service_title !!}
									</h2>
								</div>
								<div class="content">
									{!! $gs->service_text !!}
									@if($gs->service_link != null)
									<a href="{{ $gs->service_link }}" class="mybtn1" >{{ $langg->lang9 }}</a>
									@endif
								</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Features Area End-->

	@endif

	@if($ps->small_banner == 1)

	<!-- Statistic Area Start -->
	<section class="statistic" style="background: url({{ asset('assets/images/'.$ps->video_background) }});">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="section-heading color-white text-left">
						<h5 class="sub-title">
							{{ $ps->video_subtitle }}
						</h5>
						<h2 class="title">
							{{ $ps->video_title }}
						</h2>
						<p class="text">
							{{ $ps->video_text }}
						</p>
						@if($ps->video_link != null)
						<a href="javascript:;"  data-toggle="modal" data-target="#user-login" class="mybtn1">
							{{ $langg->lang56 }}
						</a>
						@endif
					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-12">
						<div class="row">
							@foreach($experiences as $data)
							<div class="col-md-6">
								<div class="single-statistic">
									<div class="icon">
										<img src="{{ asset('assets/images/experience/'.$data->photo) }}" alt="">
									</div>
									<p class="text">
										{{ $data->title }}
									</p>
								</div>
							</div>
							@endforeach							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Statistic Area End -->

	@endif

	@if($ps->best == 1)

	<!-- Service Area Start -->
	<section class="service">
		<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-10">
				<div class="section-heading">
					<h5 class="sub-title">
							{{ $ps->service_subtitle }}
					</h5>
					<h2 class="title">
							{{ $ps->service_title }}
					</h2>
					<p class="text">
							{{ $ps->service_text }}  
					</p>
				</div>
			</div>
		</div>
		</div>
		<div class="container">
			<div class="row">
				@foreach($features as $data)
				<div class="col-lg-4 col-md-6">
					<div class="single-service">
						<div class="icon">
							<img src="{{ asset('assets/images/features/'.$data->photo) }}" alt="">
						</div>
						<div class="content">
							<h4 class="title">
								{{ $data->title }}
							</h4>
							<p>
								{!! $data->details !!}
							</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- Service Area End -->

	@endif

	@if($ps->contact_section == 1)

	<!-- Submit Address Area Start -->
<div class="submit-address"  style="background: url({{ asset('assets/images/'.$ps->c_background) }});">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 col-md-7">
					<h4 class="title">
						{{ $ps->c_title }}
					</h4>
				</div>
				<div class="col-lg-5 col-md-5 d-flex align-self-center j-end">
					<a href="{{ route('front.contact') }}" class="mybtn1">{{ $langg->lang54 }}</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Submit Address Area End -->

	@endif

	@if($ps->pricing_plan == 1)

	<!-- Pricing Plan Area Start -->
<section class="pricing">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7 col-md-10">
					<div class="section-heading">
						<h5 class="sub-title">
							{{ $gs->price_subtitle }}
						</h5>
						<h2 class="title">
							{{ $gs->price_title }}
						</h2>
						<p class="text">
							{{ $gs->price_text }}
						</p>
					</div>
				</div>
			</div>

@php 

$is_second = false;

@endphp

@foreach($products->chunk(3) as $chunk)

			<div class="row {{ $is_second ? 'pt-3' : '' }}">

			@foreach($chunk as $prod)

				<div class="col-lg-4">
					<div class="single-plan">
						<div class="header">
							<h4 class="title">
								{{ $prod->title }}
							</h4>
							<p class="sub-title">
								{{ $prod->subtitle }}
							</p>
						</div>
						<div class="price">
							<p class="num">
								{!! $prod->showPrice() !!}
							</p>
							<span class="time">/ {{ $prod->type }}</span>
						</div>
						<div class="content-text">
							{!! $prod->details !!}
						</div>
						<a href="{{ route('front.checkout',$prod->slug) }}" class="mybtn1">
							{{ $langg->lang10 }}
						</a>
					</div>
				</div>

			@endforeach

@php 

$is_second = true;

@endphp

			</div>

			@endforeach


		</div>

	</section>
	<!-- Pricing Plan Area End -->

	@endif

	@if($ps->top_rated == 1)

	<!-- Package Gallery Area Start -->
	<section class="gallery"> 
			<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-10">
							<div class="section-heading">
								<h5 class="sub-title">
										{{ $ps->portfolio_subtitle }}
								</h5>
								<h2 class="title">
										{{ $ps->portfolio_title }}
								</h2>
								<p class="text">
										{{ $ps->portfolio_text }} 
								</p>
							</div>
						</div>
					</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="gallery-slider">
							@foreach($portfolios as $data)
								<div class="item">
									<a href="{{ route('front.project',$data->slug) }}" class="single-project">
										<div class="img">
												<img src="{{ asset('assets/images/portfolio/'.$data->photo) }}" alt="">
										</div>
										<div class="content">
											<p class="sub-title">
													{{ $data->title }}
											</p>
											<h4 class="title">
													{{ $data->subtitle }}
											</h4>
											<span class="link">
													<i class="fas fa-angle-double-right"></i>
												</span>
										</div>
									</a>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Package Gallery Area End -->

		@endif

	@if($ps->large_banner == 1)

		<!-- Video Area Start -->
		<section class="video-section" style="background: url({{ asset('assets/images/'.$ps->p_background) }});">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-6 align-self-center">
						<div class="section-heading color-white text-left ">
							<h2 class="title">
								{{ $ps->p_subtitle }}
							</h2>
							<p class="text">{{ $ps->p_title }}</p>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="video-box">
							<img src="{{ asset('assets/images/'.$ps->video_image) }}" alt="">
							<div class="play-icon">
								<a href="{{ $ps->p_text }}" class="video-play-btn mfp-iframe">
									<i class="fas fa-play"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Video Area End -->

		@endif

	@if($ps->big == 1)

		<!-- Team Area Start -->
			<section class="team">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-10">
							<div class="section-heading">
								<h5 class="sub-title">
									{{ $ps->team_subtitle }}
								</h5>
								<h2 class="title">
									{{ $ps->team_title }}
								</h2>
								<p class="text">
									{{ $ps->team_text }} 
								</p>
							</div>
						</div>
					</div>
					<div class="row">

				@foreach($members as $data)
				<div class="col-lg-3 col-md-6">
					<div class="single-team">
						<div class="img">
							<img src="{{ asset('assets/images/member/'.$data->photo) }}" alt="">
						</div>
						<div class="content">
							<h4 class="title">
								{{ $data->title }}
							</h4>
							<p class="designation">
								{{ $data->subtitle }}
							</p>
							<ul class="social-links">
								@if($data->facebook != null)
								<li>
									<a href="{{ $data->facebook }}">
										<i class="fab fa-facebook-f"></i>
									</a>
								</li>
								@endif
								@if($data->twitter != null)
								<li>
									<a href="{{ $data->twitter }}">
										<i class="fab fa-twitter"></i>
									</a>
								</li>
								@endif
								@if($data->linkedin != null)
								<li>
									<a href="{{ $data->linkedin }}">
										<i class="fab fa-linkedin-in"></i>
									</a>
								</li>
								@endif
							</ul>
						</div>
					</div>
				</div>
				@endforeach

					</div>
				</div>
			</section>
		<!-- Team Area End -->

		@endif

	@if($ps->hot_sale == 1)

	<!-- Testimonial Area Start -->
	<section class="testimonial" style="background: url({{ asset('assets/images/'.$ps->review_background) }});">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7 col-md-10">
					<div class="section-heading color-white">
						<h5 class="sub-title">
							{{ $ps->review_subtitle }}
						</h5>
						<h2 class="title">
							{{ $ps->review_title }}
						</h2>
						<p class="text">
							{{ $ps->review_text }}
						</p>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="testimonial-slider">

					@foreach($reviews as $review)

					<div class="single-testimonial">
							<div class="review-text">
								<p>{{ $review->details }}</p>
							</div>
							<div class="people">
								<div class="img">
										<img src="{{ asset('assets/images/reviews/'.$review->photo) }}" alt="">
								</div>
								<div class="content">
									<h4 class="title">{{ $review->title }}</h4>
									<p class="designation">{{  $review->subtitle }}</p>
								</div>
							</div>
					</div>

					@endforeach


					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Testimonial Area End -->

	@endif

	@if($ps->review_blog == 1)

	<!-- Blog Area Start -->
	<section class="blog">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7 col-md-10">
					<div class="section-heading">
						<h5 class="sub-title">
							{{ $ps->blog_subtitle }}
						</h5>
						<h2 class="title">
							{{ $ps->blog_title }}
						</h2>
						<p class="text">
							{{ $ps->blog_text }} 
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="blog-slider">

					@foreach($lblogs as $blogg)

					<a href="{{ route('front.blogshow',$blogg->slug) }}" class="single-blog">
						<div class="img">
							<img src="{{ asset('assets/images/blogs/'.$blogg->photo) }}" alt="">
						</div>
						<div class="content">
							<h4 class="title">
								{{ $blogg->title }}
							</h4>
							<ul class="top-meta">
								<li>
									<span>
											<i class="far fa-calendar"></i> {{  date('d M, Y',strtotime($blogg->created_at)) }}
									</span>
								</li>
								<li>
									<span>
											<i class="far fa-eye"></i> {{ $blogg->views }}
									</span>
								</li>
							</ul>
							<div class="text">
								<p>
									{{substr(strip_tags($blogg->details),0,120)}}
								</p>
							</div>
							<span class="link">{{ $langg->lang55 }} <i class="fas fa-chevron-right"></i></span>
						</div>
					</a>

					@endforeach
												
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Blog Area End -->

	@endif

@endsection