@extends('layouts.admin')

@section('content')

						<div class="content-area">
							<div class="mr-breadcrumb">
								<div class="row">
									<div class="col-lg-12">
											<h4 class="heading"> Edit Plan<a class="add-btn" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Back</a></h4>
											<ul class="links">
												<li>
													<a href="{{ route('admin.dashboard') }}">Dashboard </a>
												</li>
												<li>
													<a href="{{ route('admin-prod-index') }}">All Products </a>
												</li>
												<li>
													<a href="{{ route('admin-prod-edit',$data->id) }}">Edit</a>
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
					                      <form id="geniusform" action="{{route('admin-prod-update',$data->id)}}" method="POST" enctype="multipart/form-data">
					                        {{csrf_field()}}


                        						@include('includes.admin.form-both')  

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">Slug *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input name="slug" type="text" class="input-field" placeholder="Slug" value="{{ $data->slug }}" required="">
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">Title *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input name="title" type="text" class="input-field" placeholder="Title" required="" value="{{ $data->title }}">
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">Sub Title *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input name="subtitle" type="text" class="input-field" placeholder="Sub Title" required="" value="{{ $data->subtitle }}">
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">Type *</h4>
															<p class="sub-heading">
																eg. (Day, Month, Year)
															</p>
														</div>
													</div>
													<div class="col-lg-7">
														<input name="type" type="text" class="input-field" placeholder="Type" required="" value="{{ $data->type }}">
													</div>
												</div>


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">Price *</h4>
															<p class="sub-heading">
																(In {{$sign->name}})
															</p>
														</div>
													</div>
													<div class="col-lg-7">
														<input name="price" type="text" pattern="[0-9.]+" class="input-field" placeholder="Price" required="" value="{{ $data->price }}">
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
														<div class="text-editor">
															<textarea class="nic-edit" name="details">{{ $data->details }}</textarea> 
														</div>
                            <div class="checkbox-wrapper">
                              <input type="checkbox" name="secheck" class="checkclick" id="allowProductSEO" {{ ($data->meta_tag != null || strip_tags($data->meta_description) != null) ? 'checked':'' }}>
                              <label for="allowProductSEO">Allow Blog SEO</label>
                            </div>

													</div>
												</div>



                        <div class="{{ ($data->meta_tag == null && strip_tags($data->meta_description) == null) ? "showbox":"" }}">
                          <div class="row">
                            <div class="col-lg-4">
                              <div class="left-area">
                                  <h4 class="heading">Meta Tags *</h4>
                              </div>
                            </div>
                            <div class="col-lg-7">
                              <ul id="metatags" class="myTags">
                                @foreach (explode(',',$data->meta_tag) as $element)
                                  <li>{{  $element }}</li>
                                @endforeach
                              </ul>
                            </div>
                          </div>  

                          <div class="row">
                            <div class="col-lg-4">
                              <div class="left-area">
                                <h4 class="heading">
                                    Meta Description *
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-7">
                              <div class="text-editor">
                                <textarea class="nic-edit" name="meta_description" placeholder="Details">{{ $data->meta_description }}</textarea> 
                              </div>
                            </div>
                          </div>
                        </div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
															
														</div>
													</div>
													<div class="col-lg-7 text-center">
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
<script type="text/javascript">

{{-- TAGIT --}}

          $("#metatags").tagit({
          fieldName: "meta_tag[]",
          allowSpaces: true 
          });

{{-- TAGIT ENDS--}}
</script>
@endsection