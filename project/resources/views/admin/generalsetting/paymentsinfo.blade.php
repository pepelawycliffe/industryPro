@extends('layouts.admin')

@section('content')

<div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">Payment Informations</h4>
                    <ul class="links">
                      <li>
                        <a href="{{ route('admin.dashboard') }}">Dashboard </a>
                      </li>
                      <li>
                        <a href="javascript:;">Payment Settings</a>
                      </li>
                      <li>
                        <a href="{{ route('admin-gs-payments') }}">Payment Informations</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="add-product-content social-links-area">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">
                        <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                        <form action="{{ route('admin-gs-update') }}" id="geniusform" method="POST" enctype="multipart/form-data">
                          {{ csrf_field() }}

                        @include('includes.admin.form-both')  


                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    Stripe
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->stripe_check == 1 ? 'drop-success' : 'drop-danger' }}">
                                      <option data-val="1" value="{{route('admin-gs-stripe',1)}}" {{ $gs->stripe_check == 1 ? 'selected' : '' }}>Activated</option>
                                      <option data-val="0" value="{{route('admin-gs-stripe',0)}}" {{ $gs->stripe_check == 0 ? 'selected' : '' }}>Deactivated</option>
                                    </select>
                                  </div>
                            </div>
                          </div>

                          <div class="row justify-content-center">
                              <div class="col-lg-3">
                                <div class="left-area">
                                    <h4 class="heading">Stripe Key *
                                      </h4>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <input type="text" class="input-field" placeholder="Stripe Key" name="stripe_key" value="{{ $gs->stripe_key }}" required="">
                              </div>
                            </div>
    
                            <div class="row justify-content-center">
                              <div class="col-lg-3">
                                <div class="left-area">
                                    <h4 class="heading">Stripe Secret *
                                      </h4>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <input type="text" class="input-field" placeholder="Stripe Secret" name="stripe_secret" value="{{ $gs->stripe_secret }}" required="">
                              </div>
                            </div>
    
                            <hr>


                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    Paypal
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->paypal_check == 1 ? 'drop-success' : 'drop-danger' }}">
                                      <option data-val="1" value="{{route('admin-gs-paypal',1)}}" {{ $gs->paypal_check == 1 ? 'selected' : '' }}>Activated</option>
                                      <option data-val="0" value="{{route('admin-gs-paypal',0)}}" {{ $gs->paypal_check == 0 ? 'selected' : '' }}>Deactivated</option>
                                    </select>
                                  </div>
                            </div>
                          </div>          
                          
                          <div class="row justify-content-center">
                              <div class="col-lg-3">
                                <div class="left-area">
                                    <h4 class="heading">Paypal Business Email *
                                      </h4>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <input type="text" class="input-field" placeholder="Paypal Business Email" name="paypal_business" value="{{ $gs->paypal_business }}" required="">
                              </div>
                            </div>
                            <hr>



                          <div class="row justify-content-center">
                              <div class="col-lg-3">
                                <div class="left-area">
                                  <h4 class="heading">
                                      Molly Payment
                                  </h4>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="action-list">
                                      <select class="process select droplinks {{ $gs->is_molly == 1 ? 'drop-success' : 'drop-danger' }}">
                                        <option data-val="1" value="{{route('admin-gs-molly',1)}}" {{ $gs->is_molly == 1 ? 'selected' : '' }}>Activated</option>
                                        <option data-val="0" value="{{route('admin-gs-molly',0)}}" {{ $gs->is_molly == 0 ? 'selected' : '' }}>Deactivated</option>
                                      </select>
                                    </div>
                              </div>
                            </div> 




                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">Molly Api Key*
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="Molly Api Key" name="molly_key" value="{{ $gs->molly_key }}" required="">
                          </div>
                        </div>

                        <hr>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">Currency Format *</h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                              <select name="currency_format" required="">
                                  <option value="0" {{ $gs->currency_format == 0 ? 'selected' : '' }}>Before Price</option>
                                  <option value="1" {{ $gs->currency_format == 1 ? 'selected' : '' }}>After Price</option>
                              </select>
                          </div>
                        </div>


                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                              
                            </div>
                          </div>
                          <div class="col-lg-6">
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