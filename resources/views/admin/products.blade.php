@extends('layouts.appadmin')

@section('title')
   Products
@endsection   

@section('content')

{{Form::hidden('',$increment=1)}}

 <div class="card">
            <div class="card-body">
              <h4 class="card-title">Products</h4>
              @if(Session::has('status'))
                        <div class="alert alert-success">
                          {{Session::get('status')}}
                        </div>
                    @endif
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Order #</th>
                            <th>image</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$increment}}</td>
                            <td><img src="storage/product_image/{{$product->product_image}}" alt=""></td>
                            <td>{{$product->product_name}}</td>
                            <td>${{$product->product_price}}</td>
                            <td>{{$product->product_category}}</td>
                            <td>{{$product->product_location}}</td>
                            @if($product->status==1)
                            <td>
                              <label class="badge badge-success">Activated</label>
                            </td>
                            @else
                            <td>
                              <label class="badge badge-danger">deactivated</label>
                            </td>
                            @endif
                            <td>
                              <button class="btn btn-outline-primary" onclick="window.location ='{{URL::to('/edit_product/'.$product->id)}}'" >Edit</button>
                              <a href="/delete_product/{{$product->id}}" class="btn btn-outline-danger"  id="delete">Delete</a>
                              @if ($product->status==1)
                              <button class="btn btn-outline-warning" onclick="window.location ='{{URL::to('/deactivate_product/'.$product->id)}}'">Deactivate</button>
                              @else
                              <button class="btn btn-outline-success" onclick="window.location ='{{URL::to('/activate_product/'.$product->id)}}'">Active</button>
                              @endif
                            </td>
                        </tr>
                        {{Form::hidden('',$increment=$increment+1)}}  
                        @endforeach
                       
                            
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection 

@section('scripts')
   <script src="{{asset('backend/js/data-table.js')}}"></script> 

@endsection         