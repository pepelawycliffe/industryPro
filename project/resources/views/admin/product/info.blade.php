@extends('layouts.admin')
@section('content')

            <div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">Informations </h4>
                      <ul class="links">
                        <li>
                          <a href="{{ route('admin.dashboard') }}">Dashboard </a>
                        </li>
                        <li>
                          <a href="javascript:;">Plans </a>
                        </li>
                        <li>
                          <a href="{{ route('admin-prod-info') }}">Informations </a>
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

                                <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                      <form id="geniusform" action="{{ route('admin-gs-update') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        @include('includes.admin.form-both')  

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Subtitle *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <textarea class="input-field" name="price_subtitle" placeholder="Subtitle" required="" rows="5">{{$gs->price_subtitle}}</textarea>

                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Title *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                          <textarea class="input-field" name="price_title" placeholder="Title" required="" rows="5">{{$gs->price_title}}</textarea>

                          </div>
                        </div>


                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Text *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                          <textarea class="input-field" name="price_text" placeholder="Text" required="" rows="5">{{$gs->price_text}}</textarea>

                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Meta Keys *</h4>
                                <p class="sub-heading">(Seperate By Comma. Optional)</p>

                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" placeholder="Enter Meta Keys" name="plan_meta_key" value="{{ $gs->plan_meta_key }}">
                          </div>
                        </div>


                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Meta Description *</h4>
                                <p class="sub-heading">(Optional)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" placeholder="Enter Meta Description" name="plan_meta_description" value="{{ $gs->plan_meta_description }}">
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