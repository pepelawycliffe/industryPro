@extends('layouts.admin')
@section('content')

          <div class="content-area">
            <div class="mr-breadcrumb">
              <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">Website logo</h4>
                    <ul class="links">
                      <li>
                        <a href="{{ route('admin.dashboard') }}">Dashboard </a>
                      </li>
                      <li>
                        <a href="javascript:;">Generel Settings</a>
                      </li>
                      <li>
                        <a href="{{ route('admin-gs-load') }}">Website Loader</a>
                      </li>
                    </ul>
                </div>
              </div>
            </div>
            <div class="add-logo-area">
              <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
              <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="special-box">
                        <div class="heading-area">
                            <h4 class="title">
                              Header Logo
                            </h4>
                        </div>

                        <form class="uplogo-form" id="geniusform" action="{{ route('admin-gs-update') }}" method="POST" enctype="multipart/form-data">
                          {{csrf_field()}}   

                @include('includes.admin.form-both')  
                          <div class="currrent-logo">
                            <h4 class="title">
                              Current Logo :
                            </h4>
                            <img src="{{ $gs->logo ? asset('assets/images/'.$gs->logo):asset('assets/images/noimage.png')}}" alt="">
                          </div>
                          <div class="set-logo">
                            <h4 class="title">
                              Set New Logo :
                            </h4>
                            <input class="img-upload1" type="file" name="logo">
                          </div>

             


                          <div class="submit-area mb-4">
                            <button type="submit" class="submit-btn">Submit</button>
                          </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="special-box">
                        <div class="heading-area">
                            <h4 class="title">
                              Footer Logo
                            </h4>
                        </div>

                        <form class="uplogo-form" id="geniusform" action="{{ route('admin-gs-update') }}" method="POST" enctype="multipart/form-data">
                          {{csrf_field()}}   

                           @include('includes.admin.form-both')  

                          <div class="currrent-logo">
                            <h4 class="title">
                              Current Logo :
                            </h4>

                            <img src="{{ $gs->footer_logo ? asset('assets/images/'.$gs->footer_logo):asset('assets/images/noimage.png')}}" alt="">
                          </div>
                          
                          <div class="set-logo">
                            <h4 class="title">
                              Set New Logo :
                            </h4>
                            <input class="img-upload1" type="file" name="footer_logo">
                          </div>


                          <div class="submit-area mb-4">
                            <button type="submit" class="submit-btn">Submit</button>
                          </div>
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>

@endsection