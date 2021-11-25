@extends('layouts.admin')

@section('content')

<div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">Manage Menus Links</h4>
                    <ul class="links">
                      <li>
                        <a href="{{ route('admin.dashboard') }}">Dashboard </a>
                      </li>
                      <li>
                        <a href="javascript:;">Menu Page Settings</a>
                      </li>
                      <li>
                        <a href="javascript:;">Manage Menus Links</a>
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

                        <form id="geniusform" action="{{ route('admin-gs-menuupdate') }}" method="POST" enctype="multipart/form-data">
                          {{ csrf_field() }}

                        @include('includes.admin.form-both')  


                <div class="row justify-content-center">
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="is_home">Home *</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="is_home" value="1" {{$gs->is_home==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="col-lg-2"></div>
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="is_services">Services *</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="is_services" value="1" {{$gs->is_services==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>

                <div class="row justify-content-center">
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="is_plans">Plans *</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="is_plans" value="1" {{$gs->is_plans==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="col-lg-2"></div>
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="is_projects">Projects *</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="is_projects" value="1" {{$gs->is_projects==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>

                <div class="row justify-content-center">
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="is_teams">Teams*</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="is_teams" value="1" {{$gs->is_teams==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="col-lg-2"></div>
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="is_blog">Blog *</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="is_blog" value="1" {{$gs->is_blog == 1 ? "checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
              </div>

                <div class="row justify-content-center">
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="is_faq">FAQ *</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="is_faq" value="1" {{$gs->is_faq == 1 ? "checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="col-lg-2"></div>
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="is_pages">Pages *</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="is_pages" value="1" {{$gs->is_pages == 1 ? "checked":""}}>
                      <span class="slider round"></span>
                    </label>
                </div>
                </div>

                <div class="row justify-content-center">
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="is_contact">Contact Us *</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="is_contact" value="1" {{$gs->is_contact==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="col-lg-2"></div>
                  <div class="col-lg-4 d-flex justify-content-between">
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