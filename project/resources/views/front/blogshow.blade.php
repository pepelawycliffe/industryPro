@extends('layouts.front')
@section('content')


  <!-- Breadcrumb Area Start -->
  <div class="breadcrumb-area" style="background: url({{ $gs->breadcumb_banner ? asset('assets/images/'.$gs->breadcumb_banner):asset('assets/images/noimage.png') }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="pagetitle">
            {{ $langg->lang21 }}
          </h1>
          <ul class="pages">
            <li>
              <a href="{{ route('front.index') }}">
                {{ $langg->lang2 }}
              </a>
            </li>
            <li class="active">
              <a href="{{ route('front.blogshow',$blog->id) }}">
                  {{ $langg->lang21 }}
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb Area End -->

  <!-- Blog Details Area Start -->
  <section class="blog blog-details">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="blog-box blog-details-box">
            <div class="blog-images">
                <div class="img">
                  <img src="{{ asset('assets/images/blogs/'.$blog->photo) }}" class="img-fluid" alt="">
                </div>
                <div class="date d-flex justify-content-center">
                  <div class="box align-self-center">
                          <p>{{date('d', strtotime($blog->created_at))}}</p>
                          <p>{{date('M', strtotime($blog->created_at))}}</p>
                  </div>
                </div>
            </div>
            <div class="details">

                  <h4 class="blog-title">
                    {{ $blog->title }}
                  </h4>
                <ul class="post-meta">
                  <li>
                    <a href="javascript:;">
                      <i class="fas fa-calendar"></i>
                      {{ date('d M, Y',strtotime($blog->created_at)) }}
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <i class="fas fa-eye"></i>
                      {{ $blog->views }} {{ $langg->lang22 }}
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <i class="fas fa-comments"></i>
                      Source : {{ $blog->source }}
                    </a>
                  </li>
                </ul>

              <div class="content pt-1">

                  <p class="blog-text">
                  {!! $blog->details !!}
                  </p>

                
              </div>
            </div>
                    <div class="social-link a2a_kit a2a_kit_size_32">
                    <ul class="social-links">
                      <li>
                        <a class="facebook a2a_button_facebook" href="">
                          <i class="fab fa-facebook-f"></i>
                        </a>
                      </li>
                        <li>
                            <a class="twitter a2a_button_twitter" href="">
                              <i class="fab fa-twitter"></i>
                            </a>
                          
                        </li>
                        <li>
                            <a class="linkedin a2a_button_linkedin" href="">
                              <i class="fab fa-linkedin-in"></i>
                            </a>

                        </li>
                        <li>
                            <a class="pinterest a2a_button_pinterest" href="">
                              <i class="fab fa-pinterest"></i>
                            </a>

                        </li>

                        <li>
                          
                        <a class="a2a_dd plus" href="https://www.addtoany.com/share">
                            <i class="fas fa-plus"></i>
                          </a>
                        </li>
                      
                    </ul>
                    </div>
                    <script async src="https://static.addtoany.com/menu/page.js"></script>
          </div>

    {{-- DISQUS START --}}   
    @if($gs->is_disqus == 1)
          <div id="comment-area">
            {!! $gs->disqus !!}
          </div>
    @endif
    {{-- DISQUS ENDS --}}

        </div>

        <div class="col-lg-4">
          <div class="blog-aside">

            {{-- Search Section --}}

            <div class="serch-widget">
              <h4 class="title">
                {{ $langg->lang12 }}
              </h4>
              <form action="{{ route('front.blogsearch') }}">
                <input type="text" name="search" placeholder="{{ $langg->lang15 }}" required="">
                <button class="submit" type="submit">{{ $langg->lang16 }}</button>
              </form>
            </div>

            {{-- Category Section --}}

            <div class="categori">
              <h4 class="title">{{ $langg->lang17 }}</h4>
              <ul class="categori-list">

                @foreach($bcats as $cat)
                <li>
                  <a href="{{ route('front.blogcategory',$cat->slug) }}"  {!! $cat->id == $blog->category_id ? 'class="active"':'' !!}>
                    <span>{{ $cat->name }}</span>
                    <span>({{ $cat->blogs()->count() }})</span>
                  </a>
                </li>
                @endforeach

              </ul>
            </div>

            {{-- Recent Post Section --}}

            <div class="recent-post-widget">
              <h4 class="title">{{ $langg->lang18 }}</h4>
              <span class="separator"></span>
              <ul class="post-list">

                @foreach (App\Models\Blog::orderBy('created_at', 'desc')->limit(4)->get() as $blog)
                <li>
                  <div class="post">
                    <div class="post-img">
                      <img style="width: 73px; height: 59px;" src="{{ asset('assets/images/blogs/'.$blog->photo) }}" alt="">
                    </div>
                    <div class="post-details">
                      <a href="{{ route('front.blogshow',$blog->id) }}">
                          <h4 class="post-title">
                              {{strlen($blog->title) > 45 ? substr($blog->title,0,45)." .." : $blog->title}}
                          </h4>
                      </a>
                      <p class="date">
                          {{ date('M d - Y',(strtotime($blog->created_at))) }}
                      </p>
                    </div>
                  </div>
                </li>
                @endforeach

              </ul>
            </div>

            {{-- Archive Section --}}

            <div class="categori">
              <h4 class="title">{{ $langg->lang19 }}</h4>
              <ul class="categori-list">

                @foreach($archives as $key => $archive)
                <li>
                  <a href="{{ route('front.blogarchive',$key) }}">
                    <span>{{ $key }}</span>
                    <span>({{ count($archive) }})</span>
                  </a>
                </li>
                @endforeach
                
              </ul>
            </div>

            {{-- Tag Section --}}

            <div class="tags">
              <h4 class="title">{{ $langg->lang20 }}</h4>
              <span class="separator"></span>
              <ul class="tags-list">
                @foreach($tags as $tag)
                  @if(!empty($tag))
                  <li>
                    <a href="{{ route('front.blogtags',$tag) }}">{{ $tag }} </a>
                  </li>
                  @endif
                @endforeach
              </ul>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- Blog Details Area End -->

@endsection