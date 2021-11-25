@extends('layouts.load')

@section('content')

            <div class="content-area">

              <div class="add-product-content">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">
                        @include('includes.admin.form-error')  
                      <form id="geniusformdata" action="{{route('admin-service-create')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

												<div class="row">
                            <div class="col-lg-4">
                              <div class="left-area">
                                  <h4 class="heading">{{ __("Category") }}*</h4>
                              </div>
                            </div>
                            <div class="col-lg-7">
                                <select id="cat" name="category_id" required="">
                                    <option value="">{{ __("Select Category") }}</option>
                                    @foreach($cats as $cat)
                                    <option value="{{ $cat->id }}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
  
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Title *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="title" placeholder="Title" required="" value="">
                          </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-4">
                              <div class="left-area">
                                  <h4 class="heading">Slug *</h4>
                                  <p class="sub-heading">(In English)</p>
                              </div>
                            </div>
                            <div class="col-lg-7">
                              <input type="text" class="input-field" name="slug" placeholder="Slug" required="" value="">
                            </div>
                          </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Subtitle *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <textarea class="input-field" name="subtitle" placeholder="Subtitle" required=""></textarea>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              <h4 class="heading">
                                  Description *
                              </h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <textarea  class="nic-edit" rows="5" name="details" placeholder="Details"></textarea> 
                          </div>
                        </div>



												<div class="row">
                            <div class="col-lg-4">
                              <div class="left-area">
                              </div>
                            </div>
                            <div class="col-lg-7">
                              <div class="checkbox-wrapper">
                                <input type="checkbox" name="is_featured" class="checkclick" id="is_featured" value="1">
                                <label for="is_featured">{{ __('Allow Featured Service') }}</label>
                              </div>
  
                            </div>
                          </div>

                      <div class="showbox">

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Set Icon *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <div class="img-upload">
                                <div id="image-preview" class="img-preview" style="background: url({{ asset('assets/admin/images/upload.png') }});">
                                    <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>Upload Icon</label>
                                    <input type="file" name="photo" class="img-upload" id="image-upload">
                                  </div>
                                  <p class="text">Prefered Size: (300x300)</p>
                            </div>
                          </div>
                        </div>

                      </div>


                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <button class="addProductSubmit-btn" type="submit">Create Feature</button>
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