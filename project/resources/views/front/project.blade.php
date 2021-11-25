@extends('layouts.front')
@section('content')


  <!-- Breadcrumb Area Start -->
  <div class="breadcrumb-area" style="background: url({{ $gs->breadcumb_banner ? asset('assets/images/'.$gs->breadcumb_banner):asset('assets/images/noimage.png') }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="pagetitle">
            {{ $ppage->subtitle }}
          </h1>

          <ul class="pages">
                
              <li>
                <a href="{{ route('front.index') }}">
                  {{ $langg->lang2 }}
                </a>
              </li>
              <li>
                <a href="{{ route('front.project',$ppage->slug) }}">
                  {{ $ppage->subtitle }}
                </a>
              </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb Area End -->

<section class="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="about-info">
            <img class="projectimg" src="{{ asset('assets/images/portfolio/'.$ppage->photo1) }}">
            <p>
              {!! $ppage->details !!}
            </p>
          </div>
        </div>
      </div>
    </div>
</section>

@endsection