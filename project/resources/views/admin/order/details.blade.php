@extends('layouts.admin')
        
@section('content')
    <div class="content-area">
                        <div class="mr-breadcrumb">
                            <div class="row">
                                <div class="col-lg-12">
                                        <h4 class="heading">Order Details  <a class="add-btn" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Back</a></h4>
                                        <ul class="links">
                                            <li>
                                                <a href="{{ route('admin.dashboard') }}">Dashboard </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">Orders</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">Order Details</a>
                                            </li>
                                        </ul>
                                </div>
                            </div>
                        </div>

                            <div class="add-product-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="product-description">
                                            <div class="body-area">

                                    <div class="table-responsive show-table">
                                        <table class="table">
                                            <tr>
                                                <th width="50%">Order Number</th>
                                                <td>{{$order->order_number}}</td>
                                            </tr>

                                            <tr>
                                                <th>Pricing Plan</th>
                                                <td>{{$order->title}}</td>
                                            </tr>

                                            <tr>
                                                <th>Payment Method</th>
                                                <td>{{$order->method}}</td>
                                            </tr>
                                            <tr>
                                                <th>Total Cost</th>
                                                <td>{{$order->pay_amount}}</td>
                                            </tr>
                                            <tr>
                                                <th>Transaction ID</th>
                                                <td>{{$order->txnid}}</td>
                                            </tr>
                                            <tr>
                                                <th>Charge ID</th>
                                                <td>{{$order->charge_id}}</td>
                                            </tr>

                                            <tr>
                                                <th>Payment Status</th>
                                                <td>{{$order->payment_status}}</td>
                                            </tr>

                                            <tr>
                                                <th>Customer Email</th>
                                                <td>{{$order->customer_email}}</td>
                                            </tr>

                                            <tr>
                                                <th>Customer Name</th>
                                                <td>{{$order->customer_name}}</td>
                                            </tr>


                                            <tr>
                                                <th>Customer Phone</th>
                                                <td>{{$order->customer_phone}}</td>
                                            </tr>

                                            <tr>
                                                <th>Customer Address</th>
                                                <td>{{$order->customer_address}}</td>
                                            </tr>
                                            <tr>
                                                <th>Customer City</th>
                                                <td>{{$order->customer_city}}</td>
                                            </tr>

                                            <tr>
                                                <th>Customer Zip</th>
                                                <td>{{$order->customer_zip}}</td>
                                            </tr>


                                            <tr>
                                                <th>Ordered</th>
                                                <td>{{$order->created_at->diffForHumans()}}</td>
                                            </tr>

                                            <tr class="text-center">
                                                <td colspan="2"><a class="btn sendEmail send" href="javascript:;" class="send" data-email="{{ $order->customer_email }}" data-toggle="modal" data-target="#vendorform"><i class="fa fa-send"></i> Send Email </a></td>
                                            </tr>
                                            
                                        </table>
                                    </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


    </div>



{{-- MESSAGE MODAL --}}
<div class="sub-categori">
    <div class="modal" id="vendorform" tabindex="-1" role="dialog" aria-labelledby="vendorformLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="vendorformLabel">Send Email</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
            <div class="modal-body">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-form">
                                <form id="emailreply">
                                    {{csrf_field()}}
                                    <ul>
                                        <li>
                                            <input type="email" class="input-field eml-val" id="eml" name="to" placeholder="Email *" value="" required="" readonly="">
                                        </li>
                                        <li>
                                            <input type="text" class="input-field" id="subj" name="subject" placeholder="Subject *" required="">
                                        </li>
                                        <li>
                                            <textarea class="input-field textarea" name="message" id="msg" placeholder="Your Message *" required=""></textarea>
                                        </li>
                                    </ul>
                                    <button class="submit-btn" id="emlsub" type="submit">Send Email</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

{{-- MESSAGE MODAL ENDS --}}

@endsection