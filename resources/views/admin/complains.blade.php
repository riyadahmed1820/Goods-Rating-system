@extends('layouts.appadmin')

@section('title')
   Complains
@endsection   

@section('content')

{{Form::hidden('',$increment=1)}}

 <div class="card">
            <div class="card-body">
              <h4 class="card-title">Complains</h4>
              
             
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Complain #</th>
                            <th>Client Name</th>
                            <th>Client Email</th>
                            <th>Location</th>
                            <th>Complain</th>
                            <th>Complain file</th>
                            <th>Action</th>
                            <th>Complain Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($complains as $complain)
                        <tr>
                            <td>{{$increment}}</td>      
                            <td>{{$complain->name}}</td>
                            <td>{{$complain->email}}</td>
                            <td>{{$complain->product_location}}</td>
                            <td>{{$complain->complain}}</td>
                            <td><img src="source/back/profile/{{$complain->files}}" alt="" width='100px' height='120px'></td>
                            

                            <td>
                              
                              @if ($complain->status==0)
                              <button class="btn btn-outline-warning" onclick="window.location ='{{URL::to('/takestep_complain/'.$complain->id)}}'">TakeStep</button>
                              @endif
                              @if($complain->status==0)
                              <button class="btn btn-outline-danger" onclick="window.location ='{{URL::to('/varify_complain/'.$complain->id)}}'">Varification Failed</button>
                              @endif
                            </td>

                            @if($complain->status=='pending')
                            <td>
                              <label class="badge badge-primary">Reviewing</label>
                            </td>
                            @endif
                            @if($complain->status=='step taken')
                            <td>
                              <label class="badge badge-success">Step Taken</label>
                            </td>
                            @endif
                            @if($complain->status=='processing')
                            <td>
                              <label class="badge badge-danger">Varification Failed</label>
                            </td>
                            @endif


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