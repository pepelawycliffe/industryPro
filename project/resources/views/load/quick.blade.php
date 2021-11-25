					<div class="row product-details-page py-0">
							<div class="col-lg-5">
								<div class="quick-one-item-slider one-item">
				                    <div class="item"><img src="{{asset('assets/images/products/'.$product->photo)}}" alt="">
				                      <a class="img-popup" href="{{asset('assets/images/products/'.$product->photo)}}"><i class="icofont-search-2"></i></a>
				                    </div>
				                    @foreach($product->galleries as $gal)
				                    <div class="item"><img src="{{asset('assets/images/galleries/'.$gal->photo)}}" alt="">
				                      <a class="img-popup" href="{{asset('assets/images/galleries/'.$gal->photo)}}"><i class="icofont-search-2"></i></a>
				                    </div>
				                    @endforeach
								</div>
								<ul class="quick-all-item-slider all-item">
					                <li><img src="{{asset('assets/images/products/'.$product->photo)}}" alt=""></li>
					                @foreach($product->galleries as $gal)
					                <li><img src="{{asset('assets/images/galleries/'.$gal->photo)}}" alt=""></li>  
					                @endforeach
								</ul>
							</div>
							<div class="col-lg-7">
          <div class="right-area">
            <div class="product-info">
              <h4 class="product-name"><a target="_blank" href="{{ route('front.product',$product->slug) }}">{{ $product->name }}</a></h4>
                <div class="info-meta-1">
                  <ul>
                    <li class="product-id">
                      <p>
                          {{ $langg->lang77 }}: <span class="idno">{{ sprintf("%'.08d",$product->id) }}</span>
                      </p>
                    </li>
                    @if($product->type == 'Physical')
                        @if($product->stock === 0)
                        <li class="product-outstook">
                          <p>
                              <i class="icofont-close-circled"></i>
                              {{ $langg->lang78 }}
                          </p>
                        </li> 
                        @else
                        <li class="product-isstook">
                          <p>
                              <i class="icofont-check-circled"></i>
                              {{ $langg->lang79 }}
                          </p>
                        </li>
                        @endif
                    @endif
                    <li>
                        <div class="ratings">
                          <div class="empty-stars"></div>
                          <div class="full-stars" style="width:{{App\Models\Rating::ratings($product->id)}}%"></div>
                        </div>
                    </li>
                    <li class="review-count">
                      <p>{{count($product->ratings)}} {{ $langg->lang80 }}</p>
                    </li>
                  </ul>
                </div>
                <div class="info-meta-2">
                  <ul>

                  @if($product->type == 'License')

                    @if($product->platform != null)
                    <li>
                      <p>{{ $langg->lang82 }}: <b>{{ $product->platform }}</b></p>
                    </li>
                    @endif

                    @if($product->region != null)
                    <li>
                      <p>{{ $langg->lang83 }}: <b>{{ $product->region }}</b></p>
                    </li>
                    @endif

                    @if($product->licence_type != null)                    
                    <li>
                      <p>{{ $langg->lang84 }}: <b>{{ $product->licence_type }}</b></p>
                    </li>
                    @endif

                  @endif


                    @if($product->product_condition != 0)
                    <li>
                      <p>{{ $langg->lang85 }}: <b>{{ $product->product_condition == 2 ? 'New' : 'Used' }}</b></p>
                    </li>
                    @endif

                    @if($product->ship != null)
                    <li>
                      <p>{{ $langg->lang86 }}: <b> {{ $product->ship }}</b></p>
                    </li>
                    @endif

                  </ul>
                </div>

                <div class="product-price">
                  <p class="title">{{ $langg->lang87 }} :</p>
                  <p class="price"><span id="sizeprice">{{ $product->showPrice() }}</span> <small><del>{{ $product->showPreviousPrice() }}</del></small></p>
                </div>

                @if(!empty($product->size))
                <div class="product-size">
                  <p class="title">{{ $langg->lang88 }} :</p>
                  <ul class="siz-list">
                    @php 
                      $is_first = true;
                    @endphp
                      @foreach($product->size as $key => $data1)
                      <li class="{{ $is_first ? 'active' : '' }}">
                        <span class="box">{{ $data1 }}
                  <input type="hidden" class="size" value="{{ $data1 }}">
                  <input type="hidden" class="size_qty" value="{{ $product->size_qty[$key] }}">
                  <input type="hidden" class="size_key" value="{{$key}}">
                  <input type="hidden" class="size_price" value="{{ round($product->size_price[$key] * $curr->value,2) }}">
                        </span>
                      </li>
                    @php 
                      $is_first = false;
                    @endphp
                      @endforeach
                    <li>
                  </ul>
                </div>
                @endif

                @if(!empty($product->color))
                <div class="product-color">
                  <p class="title">{{ $langg->lang89 }} :</p>
                  <ul class="color-list">
                    @php 
                      $is_first = true;
                    @endphp
                    @foreach($product->color as $key => $data1)
                    <li class="{{ $is_first ? 'active' : '' }}">
                      <span class="box" style="background-color: {{ $product->color[$key] }}"></span>
                    </li>
                    @php 
                      $is_first = false;
                    @endphp
                    @endforeach

                  </ul>
                </div>
                @endif

              @if(!empty($product->size))

                <input type="hidden" id="stock" value="{{ $product->size_qty[0] }}">
              @else 
              @php 
              $stck = (string)$product->stock;
              @endphp
                @if($stck != null)
                  <input type="hidden" id="stock" value="{{ $stck }}">
                @elseif($product->type != 'Physical')
                  <input type="hidden" id="stock" value="0">
                @else 
                  <input type="hidden" id="stock" value="">
                @endif

              @endif
      <input type="hidden" id="product_price" value="{{ round($product->price * $curr->value,2) }}">
      <input type="hidden" id="product_id" value="{{ $product->id }}">
              <input type="hidden" id="curr_pos" value="{{ $gs->currency_format }}">
              <input type="hidden" id="curr_sign" value="{{ $curr->sign }}">
                <div class="info-meta-3">
                  <ul class="meta-list">
                    <li class="count">
                      <div class="qty">
                        <ul>
                          <li>
                            <span class="qtminus">
                              <i class="icofont-minus"></i>
                            </span>
                          </li>
                          <li>
                            <span class="qttotal">1</span>
                          </li>
                          <li>
                            <span class="qtplus">
                              <i class="icofont-plus"></i>
                            </span>
                          </li>
                        </ul>
                    </div>
                    </li>
                    <li class="addtocart">
                      <a href="javascript:;" id="addcrt"><i class="icofont-cart"></i>{{ $langg->lang90 }}</a>
                    </li>
                      @if(Auth::guard('web')->check())
                    <li class="favorite">
                      <a href="javascript:;" class="add-to-wish" data-href="{{ route('user-wishlist-add',$product->id) }}"><i class="icofont-heart-alt"></i></a>
                    </li>
                      @else 
                    <li class="favorite">
                      <a href="javascript:;" data-toggle="modal" data-target="#comment-log-reg"><i class="icofont-heart-alt"></i></a>
                    </li>
                      @endif
                    <li class="compare">
                      <a href="javascript:;" class="add-to-compare" data-href="{{ route('product.compare.add',$product->id) }}"><i class="icofont-exchange"></i></a>
                    </li>
                  </ul>
                </div>
            </div>
          </div>
							</div>
					</div>
<script type="text/javascript">
    $('.quick-one-item-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.quick-all-item-slider',
        responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    vertical: false,
                    horizontal: true,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });


    $('.quick-all-item-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.quick-one-item-slider',
        arrows: true,
        prevArrow: '<i class="fa fa fa-chevron-up slidPrv4"></i>',
        nextArrow: '<i class="fa fa-chevron-down slidNext4"></i>',
        dots: false,
        centerMode: true,
        centerPadding: '0px',
        focusOnSelect: true,
        responsive: [{
            breakpoint: 768,
            settings: {
                vertical: false,
                slidesToShow: 3
            }
        }]
    });

    $('.img-popup').magnificPopup({
        type: 'image'
    });

</script>