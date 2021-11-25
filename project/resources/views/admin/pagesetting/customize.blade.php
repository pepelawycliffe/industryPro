@extends('layouts.admin')

@section('content')

<div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">Home Page Customization</h4>
                    <ul class="links">
                      <li>
                        <a href="{{ route('admin.dashboard') }}">Dashboard </a>
                      </li>
                      <li>
                        <a href="javascript:;">Home Page Settings</a>
                      </li>
                      <li>
                        <a href="{{ route('admin-ps-customize') }}">Home Page Customization</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="add-product-content">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="social-links-area">
                        <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>

                        <form id="geniusform" action="{{ route('admin-ps-homeupdate') }}" method="POST" enctype="multipart/form-data">
                          {{ csrf_field() }}

                        @include('includes.admin.form-both')  


                <div class="row justify-content-center">
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="slider">Sliders *</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="slider" value="1" {{$data->slider==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="col-lg-2"></div>
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="service">Featured Services *</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="service" value="1" {{$data->service==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>

                <div class="row justify-content-center">
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="featured">Welcome Informations *</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="featured" value="1" {{$data->featured==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="col-lg-2"></div>
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="small_banner">Experience Section *</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="small_banner" value="1" {{$data->small_banner==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>

                <div class="row justify-content-center">
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="best">Feature Section *</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="best" value="1" {{$data->best==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="col-lg-2"></div>
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="contact_section">Contact Section *</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="contact_section" value="1" {{$data->contact_section == 1 ? "checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
              </div>

                <div class="row justify-content-center">
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="pricing_plan">Pricing Plan *</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="pricing_plan" value="1" {{$data->pricing_plan == 1 ? "checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="col-lg-2"></div>
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="top_rated">Project Section *</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="top_rated" value="1" {{$data->top_rated==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>
                </div>
                </div>

                <div class="row justify-content-center">
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="large_banner">Video Presentation Section *</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="large_banner" value="1" {{$data->large_banner==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="col-lg-2"></div>
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="big">Team Section *</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="big" value="1" {{$data->big==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>

                <div class="row justify-content-center">
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="hot_sale">Review section *</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="hot_sale" value="1" {{$data->hot_sale==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="col-lg-2"></div>
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="review_blog">Latest Blog Section *</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="review_blog" value="1" {{$data->review_blog==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>

                <br>

                <div class="row">
                  <div class="col-12 text-center">
                    <button type="submit" class="submit-btn">Submit</button>
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