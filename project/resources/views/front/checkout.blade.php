@extends('layouts.front')

@section('content')

  <!-- Breadcrumb Area Start -->
  <div class="breadcrumb-area" style="background: url({{ $gs->breadcumb_banner ? asset('assets/images/'.$gs->breadcumb_banner):asset('assets/images/noimage.png') }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="pagetitle">
            {{ $langg->lang30 }}
          </h1>

          <ul class="pages">
                
              <li>
                <a href="{{ route('front.index') }}">
                  {{ $langg->lang2 }}
                </a>
              </li>
              <li>
                <a href="{{ route('front.checkout',$product->id) }}">
                  {{ $langg->lang30 }}
                </a>
              </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb Area End -->


<section class="order-details">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="order-details-box">
						<div class="header">
							<h4 class="title">
								{{ $langg->lang31 }}
							</h4>
						</div>
						<div class="row justify-content-between px-4 py-5">
							<div class="col-lg-7">
								<div class="content">


									@include('includes.form-error')
									@include('includes.form-success')

									<form id="payment-form" method="POST" action="{{ route('paypal.submit') }}">

										{{ csrf_field() }}
										<div class="row">
											<div class="col-lg-12">
												<input type="text" name="customer_name" class="input-field" placeholder="{{ $langg->lang32 }}" required="">
											</div>
											<div class="col-lg-12">
												<input type="email" name="customer_email" class="input-field" placeholder="{{ $langg->lang33 }}" required="">
											</div>
											<div class="col-lg-12">
												<input type="text" name="customer_phone" class="input-field" placeholder="{{ $langg->lang34 }}" required="">
											</div>
											<div class="col-lg-12">
												<input type="text" name="customer_address" class="input-field" placeholder="{{ $langg->lang35 }}" required="">
											</div>
											<div class="col-lg-12">
												<input type="text" name="customer_city" class="input-field" placeholder="{{ $langg->lang36 }}" required="">
											</div>
											<div class="col-lg-12">
												<input type="text" name="customer_zip" class="input-field" placeholder="{{ $langg->lang37 }}" required="">
											</div>
											<div class="col-lg-12">
												<select class="patment-method" id="method" name="method" required="">
													@if($gs->paypal_check == 1)
													<option value="Paypal">{{ $langg->lang38 }}</option>
													@endif
													@if($gs->stripe_check == 1)
													<option value="Stripe">{{ $langg->lang39 }}</option>
													@endif
													@if($gs->is_molly == 1)
													<option value="Molly">{{ $langg->lang61 }}</option>
													@endif
											   </select>
											</div>

											<div id="card-view" class="col-lg-12 pt-3 d-none">
												<div class="row">
				                                <input type="hidden" name="cmd" value="_xclick">
				                                <input type="hidden" name="no_note" value="1">
				                                <input type="hidden" name="lc" value="UK">
				                                <input type="hidden" name="currency_code" value="{{ $curr->name }}">
				                                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest">

											<div class="col-lg-6">
												<input type="text" class="input-field card-elements" placeholder="{{ $langg->lang40 }}" name="card">
											</div>
											<div class="col-lg-6">
												<input type="text" class="input-field card-elements" placeholder="{{ $langg->lang41 }}" name="cvv">
											</div>
											<div class="col-lg-6">
												<input type="text" class="input-field card-elements" placeholder="{{ $langg->lang42 }}" name="month">
											</div>
											<div class="col-lg-6">
												<input type="text" class="input-field card-elements" placeholder="{{ $langg->lang43 }}" name="year">
											</div>


												</div>


											</div>
											<input type="hidden" name="subtitle" value="{{ $product->subtitle }}">
											<input type="hidden" name="title" value="{{ $product->title }}">
											<input type="hidden" name="details" value="{{ $product->details }}">
											<input type="hidden" name="type" value="{{ $product->type }}">

											<input type="hidden" name="total" value="{{ $product->convertPrice() }}">
											<input type="hidden" name="currency_sign" value="{{ $curr->sign }}">
											<div class="col-lg-12">
												<button type="submit" class="btn-checkout">{{ $langg->lang44 }}</button>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-lg-4 order-first order-lg-last">
								<div class="pricing-plan">
									<div class="header-area">
										<h4 class="title">{{ $product->title }}</h4>
										<p class="sub-title">{{ $product->subtitle }}</p>
									</div>
									<div class="pricing-area">
										<p>
											{!! $product->showPrice() !!} <sub> / {{ $product->type }}</sub>
										</p>
									</div>
									<div class="content">
										{!! $product->details !!}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>




@endsection


@section('scripts')

<script type="text/javascript">

var pay_val = $('#method').val();

if(pay_val == 'Stripe')
	{
		$('#payment-form').prop('action','{{ route('stripe.submit') }}');
		$('#card-view').removeClass('d-none');
		$('.card-elements').prop('required',true);
	}
	else if(pay_val == 'Paypal') {
		$('#payment-form').prop('action','{{ route('paypal.submit') }}');
		$('#card-view').addClass('d-none');
		$('.card-elements').prop('required',false);
	}
	else {
		$('#payment-form').prop('action','{{ route('payment.molly') }}');
		$('#card-view').addClass('d-none');
		$('.card-elements').prop('required',false);
	}


$('#method').on('change',function(){
	var val = $(this).val();
	if(val == 'Stripe')
	{
		$('#payment-form').prop('action','{{ route('stripe.submit') }}');
		$('#card-view').removeClass('d-none');
		$('.card-elements').prop('required',true);
	}
	else if(val == 'Paypal') {
		$('#payment-form').prop('action','{{ route('paypal.submit') }}');
		$('#card-view').addClass('d-none');
		$('.card-elements').prop('required',false);
	}
	else {
		$('#payment-form').prop('action','{{ route('payment.molly') }}');
		$('#card-view').addClass('d-none');
		$('.card-elements').prop('required',false);
	}
});



$('#payment-form').on('submit',function(){
	 $('#preloader').show();
});

</script>


@endsection