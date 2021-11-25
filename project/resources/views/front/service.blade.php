@extends('layouts.front')
@section('content')


  <!-- Breadcrumb Area Start -->
  <div class="breadcrumb-area" style="background: url({{ $gs->breadcumb_banner ? asset('assets/images/'.$gs->breadcumb_banner):asset('assets/images/noimage.png') }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="pagetitle">
            {{ $spage->title }}
          </h1>

          <ul class="pages">
                
              <li>
                <a href="{{ route('front.index') }}">
                  {{ $langg->lang2 }}
                </a>
              </li>

              <li>
                <a href="javascript:;">
                {{ $langg->lang57 }}
                </a>
               </li>
    
              <li>
                <a href="{{ route('front.service',$spage->slug) }}">
                  {{ $spage->title }}
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
            <h3 class="font-weight-bold">{{ $spage->subtitle }}</h3>
                
          <div class="about-info">
            <p>
              {!! $spage->details !!}
            </p>
          </div>
        </div>
      </div>
    </div>
</section>

@endsection