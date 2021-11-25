@extends('layouts.front')
@section('content')


  <!-- Breadcrumb Area Start -->
  <div class="breadcrumb-area" style="background: url({{ $gs->breadcumb_banner ? asset('assets/images/'.$gs->breadcumb_banner):asset('assets/images/noimage.png') }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="pagetitle">
            {{ $langg->lang59 }}
          </h1>

          <ul class="pages">
                
              <li>
                <a href="{{ route('front.index') }}">
                  {{ $langg->lang2 }}
                </a>
              </li>
              <li>
                <a href="">
                  {{ $langg->lang59 }}
                </a>
              </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb Area End -->

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

     @foreach($portfolios->chunk(3) as $datas)

      <div class="row {{ $loop->last ? '' : 'pb-5' }}">
        
          @foreach($datas as $data)
            <div class="col-lg-4">
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
            </div>
          @endforeach
      </div>

      @endforeach

    </div>
  </section>
  <!-- Package Gallery Area End -->

@endsection