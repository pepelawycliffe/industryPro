@extends('layouts.load')
@section('content')

						<div class="content-area no-padding">
							<div class="add-product-content">
								<div class="row">
									<div class="col-lg-12">
										<div class="product-description">
											<div class="body-area">

                                    <div class="table-responsive show-table">
                                        <table class="table">
                                            <tr>
                                                <th>Staff ID#</th>
                                                <td>{{$data->id}}</td>
                                            </tr>
                                            <tr>
                                                <th>Staff Photo</th>
                                                <td>
                                              <img src="{{ $data->photo ? asset('assets/images/admins/'.$data->photo):asset('assets/images/noimage.png')}}" alt="No Image">

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Staff Name</th>
                                                <td>{{$data->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Staff Role</th>
                                                <td>{{$data->role}}</td>
                                            </tr>
                                            <tr>
                                                <th>Staff Email</th>
                                                <td>{{$data->email}}</td>
                                            </tr>
                                            <tr>
                                                <th>Staff Phone</th>
                                                <td>{{$data->phone}}</td>
                                            </tr>
                                            <tr>
                                                <th>Joined</th>
                                                <td>{{$data->created_at->diffForHumans()}}</td>
                                            </tr>
                                        </table>
                                    </div>


											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

@endsection