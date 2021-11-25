@extends('layouts.front')
@section('content')


  <!-- Breadcrumb Area Start -->
  <div class="breadcrumb-area" style="background: url({{ $gs->breadcumb_banner ? asset('assets/images/'.$gs->breadcumb_banner):asset('assets/images/noimage.png') }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="pagetitle">
            {{ $langg->lang58 }}
          </h1>

          <ul class="pages">
                
              <li>
                <a href="{{ route('front.index') }}">
                  {{ $langg->lang2 }}
                </a>
              </li>
              <li>
                <a href="">
                    {{ $langg->lang58 }}
                </a>
              </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb Area End -->

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

@endsection