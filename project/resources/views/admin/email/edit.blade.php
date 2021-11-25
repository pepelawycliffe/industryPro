@extends('layouts.load')

@section('content')

            <div class="content-area">
              <div class="add-product-content">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">
                      @include('includes.admin.form-error') 

                                      <div class="row" >
                                        <div class="col-md-6 offset-md-4">
                                        <p>Use the BB codes, it show the data dynamically in your emails.</p>
                                        <br>
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Meaning</th>
                                                <th>BB Code</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Customer Name</td>
                                                <td>{customer_name}</td>
                                            </tr>
                                            <tr>
                                                <td>Order Amount</td>
                                                <td>{order_amount}</td>
                                            </tr>
                                            <tr>
                                                <td>Admin Name</td>
                                                <td>{admin_name}</td>
                                            </tr>
                                            <tr>
                                                <td>Admin Email</td>
                                                <td>{admin_email}</td>
                                            </tr>
                                            <tr>
                                                <td>Website Title</td>
                                                <td>{website_title}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                        </div>

                      <form id="geniusformdata" action="{{route('admin-mail-update',$data->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Email Type *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" placeholder="Email Type" required="" value="{{$data->email_type}}" disabled="">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Email Subject *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                            </div>

                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="email_subject" placeholder="Email Subject" required="" value="{{$data->email_subject}}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              <h4 class="heading">Email Body *</h4>
                              <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <textarea class="nic-edit" name="email_body" placeholder="Email Body">{{ $data->email_body }}</textarea> 
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <button class="addProductSubmit-btn" type="submit">Save</button>
                          </div>
                        </div>
                      </form>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

@endsection