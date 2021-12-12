@extends('layouts.appadmin')

@section('title')
Locations
@endsection   

@section('content')

{{Form::hidden('',$increment=1)}}

 <div class="card">
            <div class="card-body">
              <h4 class="card-title">Locations</h4>
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
                            <th>Location Name</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                        @foreach ($locations as $location)
                          <tbody>
                            <tr>
                                <td>{{$increment}}</td>
                                <td>{{$location->location_name}}</td>
                                <td>
<button class="btn btn-outline-primary"        onclick="window.location ='{{URL::to('/edit_location/'.$location->id)}}'">Edit</button>
                                  <a href="/delete/{{$location->id}}" class="btn btn-outline-danger" id="delete">Delete</a>
                                </td>
                            </tr>
                            {{Form::hidden('',$increment=$increment+1)}}  
                            @endforeach                          
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