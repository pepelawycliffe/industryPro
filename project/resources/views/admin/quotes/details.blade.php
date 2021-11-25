@extends('layouts.admin')
        
@section('content')
    <div class="content-area">
                        <div class="mr-breadcrumb">
                            <div class="row">
                                <div class="col-lg-12">
                                        <h4 class="heading">Quote Details  <a class="add-btn" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Back</a></h4>
                                        <ul class="links">
                                            <li>
                                                <a href="{{ route('admin.dashboard') }}">Dashboard </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">Quotes</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">Quote Details</a>
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
                                                <th width="50%">Name</th>
                                                <td>{{$data->name}}</td>
                                            </tr>

                                            <tr>
                                                <th>Email</th>
                                                <td>{{$data->email}}</td>
                                            </tr>

                                            <tr>
                                                <th>Subject</th>
                                                <td>{{$data->subject}}</td>
                                            </tr>
                                            @if($data->quotes != null)
                                            <tr>
                                                <th>Quotes</th>
                                                <td>
                                                    <ul class="list-unstyled">
                                                        @foreach (explode(',',$data->quotes) as $element)
                                                        <li>
                                                            {{ $element }}
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <th>Description</th>
                                                <td>{{$data->details}}</td>
                                            </tr>

                                            <tr>
                                                <th>Submitted</th>
                                                <td>{{$data->created_at->diffForHumans()}}</td>
                                            </tr>

                                            <tr class="text-center">
                                                <td colspan="2"><a class="btn sendEmail send" href="javascript:;" class="send" data-email="{{ $data->email }}" data-toggle="modal" data-target="#vendorform"><i class="fa fa-send"></i> Send Email </a></td>
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