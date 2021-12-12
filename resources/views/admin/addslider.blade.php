@extends('layouts.appadmin')

@section('title')
   Add Slider
@endsection 

@section('content')
 <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create Slider</h4>
                  @if(Session::has('status'))
                        <div class="alert alert-success">
                          {{Session::get('status')}}
                        </div>
                    @endif 
                         {!!Form::open(['action' => 'SliderController@saveslider', 'method' => 'POST', 'class' =>'cmxform' , 'id' => 'commentForm', 'enctype' => 'multipart/form-data'])!!}
        {{ csrf_field() }}
            
        <div class="form-group">
            {{Form::label('', 'Description_one' , ['for' => 'cname'])}}
            {{Form::text('description_one', '' , ['class' => 'form-control','minlength' =>'2'])}}
         </div>

        <div class="form-group">
            {{Form::label('', 'Description_two' , ['for' => 'cname'])}}
            {{Form::text('description_two', '' , ['class' => 'form-control','minlength' =>'2'])}}
        </div>

        <div class="form-group"> 
            {{Form::label('', 'Slider Image' , ['for' => 'cname'])}}          
            {{Form::file('slider_image' , ['class' => 'form-control'])}}
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