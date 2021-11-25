@extends('layouts.admin')
@section('content')


          <div class="content-area">
            <div class="mr-breadcrumb">
              <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">Website Favicon</h4>
                    <ul class="links">
                      <li>
                        <a href="{{ route('admin.dashboard') }}">Dashboard </a>
                      </li>
                      <li>
                        <a href="javascript:;">Generel Settings</a>
                      </li>
                      <li>
                        <a href="{{ route('admin-gs-fav') }}">Website Favicon</a>
                      </li>
                    </ul>
                </div>
              </div>
            </div>
            <div class="add-logo-area">
              <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
              <div class="row justify-content-center">
                <div class="col-lg-6">

                        @include('includes.admin.form-both')  

                  <form class="uplogo-form" id="geniusform"  action="{{ route('admin-gs-update') }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="currrent-logo">
                      <h4 class="title">
                        Current Favicon :
                      </h4>
                      <img src="{{ $gs->favicon ? asset('assets/images/'.$gs->favicon):asset('assets/images/noimage.png')}}" alt="">
                    </div>
                    <div class="set-logo">
                      <h4 class="title">
                        Set New Favicon :
                      </h4>
                      <input class="img-upload1" type="file" name="favicon">
                    </div>
                    <div class="submit-area">
                      <button type="submit" class="submit-btn">Save</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

@endsection