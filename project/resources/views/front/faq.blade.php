@extends('layouts.front')

@section('styles')

  <!-- jQuery Ui Css-->
  <link rel="stylesheet" href="{{asset('assets/front/jquery-ui/jquery-ui.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/front/jquery-ui/jquery-ui.structure.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/front/jquery-ui/jquery-ui.theme.min.css')}}">

@endsection

@section('content')

  <!-- Breadcrumb Area Start -->
  <div class="breadcrumb-area" style="background: url({{ $gs->breadcumb_banner ? asset('assets/images/'.$gs->breadcumb_banner):asset('assets/images/noimage.png') }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="pagetitle">
            {{ $langg->lang5 }}
          </h1>

          <ul class="pages">
                
              <li>
                <a href="{{ route('front.index') }}">
                  {{ $langg->lang2 }}
                </a>
              </li>
              <li>
                <a href="{{ route('front.faq') }}">
                  {{ $langg->lang5 }}
                </a>
              </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb Area End -->


  <!-- faq Area Start -->
  <section class="faq-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <div id="accordion">

            @foreach($faqs as $fq)
            <h3 class="heading">{{ $fq->title }}</h3>
            <div class="content">
                <p>{!! $fq->details !!}</p>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- faq Area End-->

@endsection

@section('scripts')

<script type="text/javascript">
  
  /*-----------------------------
      Accordion Active js
  -----------------------------*/
  $("#accordion, #accordion2").accordion({
    heightStyle: "content",
    collapsible: true,
    icons: {
      "header": "ui-icon-caret-1-e",
      "activeHeader": " ui-icon-caret-1-s"
    }
  });
  
</script>

@endsection