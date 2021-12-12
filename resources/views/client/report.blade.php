<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Complain</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <div class="main-body">

 
							<form action="{{route('postreport')}}" method="POST" enctype="multipart/form-data"
>
						@csrf

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>{{ Auth::guard('web')->user()->name }}</h4>
                      <!-- <p class="text-secondary mb-1">Full Stack Developer</p>
                      <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p> -->
                      <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">

                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ Auth::guard('web')->user()->name }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ Auth::guard('web')->user()->email }}
                    </div>
                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Upload Document</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="file" id="myFile" name="img" accept="image/*"
>
                    </div>
                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                  <h6 class="mb-0">Complain</h6>
                    </div>
	                  <textarea type="text" class="col-sm-9 text-secondary" name="complain"></textarea>
	                </div>
                    <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <select id="location" name="product_location">
                        @foreach($locations as $location)
                        <option value="{{ $location->location_name }}">{{ $location->location_name }}</option>
                        @endforeach

                    </select>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <button class="btn btn-info"  type="submit">Report</button>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
          </form>
        </div>
    </div>

<style type="text/css">
body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

{{Form::hidden('',$increment=1)}}
</style>
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
                          
                            
                            <th>Complain Track</th>

                            <th>Message</th>
                            
                            
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($complains as $complain)
                        <tr>
                            <td>{{$increment}}</td>
                            <td>{{$complain->name}}</td>
                            
                           
                            <td> <span class="badge badge-primary">{{$complain->status}}</span></td>
                           
                            
                            @if($complain->status=='pending')
                            <td>
                              <label class="badge badge-primary">Admin Taking Steps About Your Complain</label>
                            </td>
                            @endif
                            @if($complain->status=='step taken')
                            <td>
                              <label class="badge badge-success">Your Complain Reviewd. You Will get refund soon</label>
                            </td>
                            @endif
                            @if($complain->status=='processing')
                            <td>
                              <label class="badge badge-danger">Your Complain Reviewd. Failed to varify</label>
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


<script type="text/javascript">

</script>
</body>
</html>






