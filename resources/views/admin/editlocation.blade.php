@extends('layouts.appadmin')

@section('title')
   Edit Location
@endsection 


@section('content')
 <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Location</h4>
                        
                         {!!Form::open(['action' => 'LocationController@updatelocation', 'method' => 'POST', 'class' =>'cmxform' , 'id' => 'commentForm'])!!}
        {{ csrf_field() }}
            
        <div class="form-group">
            {{Form::hidden('id', $location->id)}}
            {{Form::label('', 'Product location' , ['for' => 'cname'])}}
            {{Form::text('location_name', $location->location_name , ['class' => 'form-control','minlength' =>'2'])}}
        </div>
        
     
        {{Form::submit('Update', ['class' => 'btn btn-primary'])}}

    {!!Form::close()!!}
                         
                </div>
              </div>
            </div>
  </div>
@endsection

@section('scripts')

  <script src="{{asset('backend/js/bt-maxLength.js')}}"></script>
@endsection  