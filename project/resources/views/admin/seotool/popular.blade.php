@extends('layouts.admin') 

@section('content')  
					<input type="hidden" id="headerdata" value="PICKUP LOCATION">
					<div class="content-area">
						<div class="mr-breadcrumb">
							<div class="row">
								<div class="col-lg-12">
										<h4 class="heading">Popular Products</h4>
										<ul class="links">
											<li>
												<a href="{{ route('admin.dashboard') }}">Dashboard </a>
											</li>
											<li>
												<a href="javascript:;">SEO Tools </a>
											</li>
											<li>
												<a href="javascript:;">Popular Products</a>
											</li>
										</ul>
								</div>
							</div>
						</div>
						<div class="product-area">
							<div class="row">
								<div class="col-lg-12">
									<div class="mr-table allproduct">
							          @include('includes.form-error')
							          @include('includes.form-success')
										<div class="table-responsiv">
												<table id="example" class="table table-hover dt-responsive" cellspacing="0" width="100%">
													<thead>
														<tr>
									                        <th>Name</th>
									                        <th>Category</th>
									                        <th>Type</th>
									                        <th>Clicks</th>
														</tr>
													</thead>

                                              <tbody>
                                                @foreach($productss as $productt) 
                    @foreach($productt as $prod)

                                                        <tr>

                                      <td>
                                        {{strlen($prod->product->name) > 30 ? substr($prod->product->name,0,30).'...' : $prod->product->name}}
                                      </td>
                                                      <td>
                                                        {{$prod->product->category->name}} <br>

                                                        @if($prod->product->subcategory_id != null)

                                                        {{$prod->product->subcategory->name}} <br>

                                                        @if($prod->product->childcategory_id != null)
                                                        {{$prod->product->childcategory->name}}
                                                        @endif

                                                        @endif
                                                      </td>
												  <td>
												{{$prod->product->type}}
												  </td>
                                      <td>{{$productt->count('product_id')}}</td>
                                                  </tr>

                                                  @break
                    @endforeach



                                                  @endforeach
                                                  </tbody>

												</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>




@endsection    



@section('scripts')

<script type="text/javascript">

 			$('#example').DataTable({
			   ordering: false
            });

$( document ).ready(function() {
        $(".btn-area").append('<div class="col-sm-4 text-right">'+
        '<select class="form-control" id="prevdate">'+
          '<option value="30" {{$val==30 ? 'selected':''}}>Last 30 Days</option>'+
          '<option value="15" {{$val==15 ? 'selected':''}}>Last 15 Days</option>'+
          '<option value="7" {{$val==7 ? 'selected':''}}>Last 7 Days</option>'+
        '</select>'+
          '</div>'); 

        $("#prevdate").change(function () {
        var sort = $("#prevdate").val();
        window.location = "{{url('/admin/products/popular/')}}/"+sort;
    });                                                                      
});
</script>

@endsection   