@extends('layouts.front')
@section('content')

  <!-- Breadcrumb Area Start -->
  <div class="breadcrumb-area" style="background: url({{ $gs->breadcumb_banner ? asset('assets/images/'.$gs->breadcumb_banner):asset('assets/images/noimage.png') }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="pagetitle">
            {{ $langg->lang45 }}
          </h1>

          <ul class="pages">
                
              <li>
                <a href="{{ route('front.index') }}">
                  {{ $langg->lang2 }}
                </a>
              </li>
              <li>
                <a href="{{ route('payment.return') }}">
                  {{ $langg->lang45 }}
                </a>
              </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb Area End -->


<section class="thankyou">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-11">
          <div class="content">
            <div class="icon">
                <i class="far fa-check-circle"></i>
            </div>
            <h4 class="heading">
                 {{ $gs->order_title }}
            </h4>
            <p class="text">
                {{ $gs->order_text }}
            </p>
            <a href="{{ route('front.index') }}" class="link">{{ $langg->lang46 }}</a>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection