@extends('layouts.admin')

@section('content')

<div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">Website Contents</h4>
                    <ul class="links">
                      <li>
                        <a href="{{ route('admin.dashboard') }}">Dashboard </a>
                      </li>
                      <li>
                        <a href="javascript:;">Generel Settings</a>
                      </li>
                      <li>
                        <a href="{{ route('admin-gs-contents') }}">Website Contents</a>
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
                        <form action="{{ route('admin-gs-update') }}" id="geniusform" method="POST" enctype="multipart/form-data">
                          {{ csrf_field() }}

                        @include('includes.admin.form-both')  

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">Website Title *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="Write Your Site Title Here" name="title" value="{{ $gs->title }}" required="">
                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">Theme Color *</h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group"> 
                                <div class="input-group colorpicker-component cp">
                                  <input type="text" name="colors" value="{{ $gs->colors }}"  class="form-control cp"  />
                                  <span class="input-group-addon"><i></i></span>
                                </div>
                              </div>
                  
                          </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    Tawk.to
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->is_talkto == 1 ? 'drop-success' : 'drop-danger' }}">
                                      <option data-val="1" value="{{route('admin-gs-talkto',1)}}" {{ $gs->is_talkto == 1 ? 'selected' : '' }}>Activated</option>
                                      <option data-val="0" value="{{route('admin-gs-talkto',0)}}" {{ $gs->is_talkto == 0 ? 'selected' : '' }}>Deactivated</option>
                                    </select>
                                  </div>
                            </div>
                          </div>
                          <div class="row justify-content-center">
                              <div class="col-lg-3">
                                <div class="left-area">
                                  <h4 class="heading">
                                      Tawk.to Widget Code *
                                  </h4>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="tawk-area">
                                    <textarea  name="talkto">{{$gs->talkto}}</textarea>
                                  </div>
                              </div>
                            </div>


                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    Disqus
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->is_disqus == 1 ? 'drop-success' : 'drop-danger' }}">
                                      <option data-val="1" value="{{route('admin-gs-isdisqus',1)}}" {{ $gs->is_disqus == 1 ? 'selected' : '' }}>Activated</option>
                                      <option data-val="0" value="{{route('admin-gs-isdisqus',0)}}" {{ $gs->is_disqus == 0 ? 'selected' : '' }}>Deactivated</option>
                                    </select>
                                  </div>
                            </div>
                          </div>
                          <div class="row justify-content-center">
                              <div class="col-lg-3">
                                <div class="left-area">
                                  <h4 class="heading">
                                      Disqus Universal Code *
                                  </h4>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="tawk-area">
                                    <textarea  name="disqus">{{$gs->disqus}}</textarea>
                                  </div>
                              </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-lg-3">
                                  <div class="left-area">
                                      <h4 class="heading">Quotes *</h4>
                                      <p class="sub-heading">Separated by (,)</p>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <ul id="tags" class="myTags">

                                      @foreach (explode(',',$gs->quotes) as $element)
                                      <li>{{ $element }}</li>
                                    @endforeach

                                  </ul>
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

@section('scripts')

{{--TAGIT --}}

<script type="text/javascript">

          $("#tags").tagit({
          fieldName: "quotes[]",
          allowSpaces: true 
        });

</script>

{{-- TAGIT ENDS--}}

@endsection