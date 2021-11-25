@extends('layouts.front')
@section('content')


  <!-- Breadcrumb Area Start -->
  <div class="breadcrumb-area" style="background: url({{ $gs->breadcumb_banner ? asset('assets/images/'.$gs->breadcumb_banner):asset('assets/images/noimage.png') }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="pagetitle">
            {{ $langg->lang57 }}
          </h1>

          <ul class="pages">
                
              <li>
                <a href="{{ route('front.index') }}">
                  {{ $langg->lang2 }}
                </a>
              </li>
              <li>
                <a href="">
                  {{ $langg->lang57 }}
                </a>
              </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb Area End -->

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

@endsection