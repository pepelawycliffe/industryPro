@if($payment == 'cod') 
                                <input type="hidden" name="method" value="Cash On Delivery">


@endif
@if($payment == 'paypal') 
                                <input type="hidden" name="method" value="Paypal">
                                <input type="hidden" name="cmd" value="_xclick">
                                <input type="hidden" name="no_note" value="1">
                                <input type="hidden" name="lc" value="UK">
                                <input type="hidden" name="currency_code" value="{{$curr->name}}">
                                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest">

@endif

@if($payment == 'stripe') 
                                	<input type="hidden" name="method" value="Stripe">
									<div class="col-lg-6">
										<label>{{ $langg->lang163 }} *</label>
										<input class="form-control" name="card" type="text" placeholder="{{ $langg->lang163 }}" required="">
									</div>
									<div class="col-lg-6">
										<label>{{ $langg->lang164 }} *</label>
										<input class="form-control" name="cvv" type="text" placeholder="{{ $langg->lang164 }}" required="">
									</div>
									<div class="col-lg-6">
										<label>{{ $langg->lang165 }} *</label>
										<input class="form-control" name="month" type="text" placeholder="{{ $langg->lang165 }}" required="">
									</div>
									<div class="col-lg-6">
										<label>{{ $langg->lang166 }} *</label>
										<input class="form-control" name="year" type="text" placeholder="{{ $langg->lang166 }}" required="">
									</div>

@endif

@if($payment == 'other') 

                                <input type="hidden" name="method" value="{{ $gateway->title }}">
<div class="col-lg-12 pb-2">
	
	{!! $gateway->details !!}

</div>


<div class="col-lg-6">
	<label>{{ $langg->lang167 }} *</label>
	<input class="form-control" name="txn_id4" type="text" placeholder="{{ $langg->lang167 }}" required="">
</div>

@endif