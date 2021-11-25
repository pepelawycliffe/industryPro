@extends('layouts.front')
@section('content')


  <!-- Breadcrumb Area Start -->
  <div class="breadcrumb-area" style="background: url({{ $gs->breadcumb_banner ? asset('assets/images/'.$gs->breadcumb_banner):asset('assets/images/noimage.png') }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="pagetitle">
            {{ $langg->lang60 }}
          </h1>

          <ul class="pages">
                
              <li>
                <a href="{{ route('front.index') }}">
                  {{ $langg->lang2 }}
                </a>
              </li>
              <li>
                <a href="">
                    {{ $langg->lang60 }}
                </a>
              </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb Area End -->

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

@endsection