@extends('layouts.appadmin')

@section('title')
   Add Product
@endsection 

@section('content')
 <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create Product</h4>
                  @if(Session::has('status'))
                        <div class="alert alert-success">
                          {{Session::get('status')}}
                        </div>
                    @endif    
                    @if(Session::has('status1'))
                        <div class="alert alert-danger">
                          {{Session::get('status1')}}
                        </div> 
                    @endif  
                         {!!Form::open(['action' => 'ProductController@saveproduct', 'method' => 'POST', 'class' =>'cmxform' , 'id' => 'commentForm', 'enctype' => 'multipart/form-data'])!!}
        {{ csrf_field() }}
            
        <div class="form-group">
            {{Form::label('', 'Product Name' , ['for' => 'cname'])}}
            {{Form::text('product_name', '' , ['class' => 'form-control','minlength' =>'2'])}}
         </div>

        <div class="form-group">
            {{Form::label('', 'Product Price' , ['for' => 'cname'])}}
            {{Form::number('product_price', '' , ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('', 'Product Category' , ['for' => 'cname'])}}
            {{Form::select('product_category', $categories , null, ['placeholder' => 'Select category', 'class' => 'form-control'])}}
            
        </div>

        <div class="form-group">
            {{Form::label('', 'Product Location' , ['for' => 'cname'])}}
            
              <select class="form-control" name="product_location_id">
              <option selected="selected" value="">Select location</option>
              @foreach($locations as $location)
              <option value="{{$location->id}}">{{$location->location_name}}</option>
              @endforeach
              </select>

            
        </div>

        <div class="form-group"> 
            {{Form::label('', 'Product Image' , ['for' => 'cname'])}}          
            {{Form::file('product_image' , ['class' => 'form-control'])}}
        </div>

        {{Form::submit('Save', ['class' => 'btn btn-primary'])}}

    {!!Form::close()!!}
                         
                </div>
              </div>
            </div>
  </div>
@endsection

@section('scripts')
  
  <script src="{{asset('backend/js/bt-maxLength.js')}}"></script>
@endsection  