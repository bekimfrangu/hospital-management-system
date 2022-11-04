<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
         @include('admin.navbar')
        <!-- partial -->
          <div class="main-panel">
            <div class="content-wrapper">
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">All Appointments</h4>

                    <form action="{{url('/search_appointment')}}" method="post">
                                        @method('GET')
                                        @csrf
                                     <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search" placeholder="Search for patient's name">
                                            <div class="input-group-append">
                                            <button class="btn btn-primary m-1" type="submit">Search</button>
                                            </div>
                                        </div>
                                     </div>
                     </form>

                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Patient Name</th>
                            <th>Email.</th>
                            <th>Phone</th>
                            <th>Doctor Name</th>
                            <th>Date</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $appointment)
                          <tr>
                            <td>{{$appointment->name}}</td>
                            <td>{{$appointment->email}}</td>
                            <td>{{$appointment->phone}}</td>           
                            <td>{{$appointment->doctor}}</td>
                            <td>{{$appointment->date}}</td>
                            <td>{{$appointment->message}}</td>
                            <td>
                            @if($appointment->status == "Canceled")
                              <label class="badge badge-danger">{{$appointment->status}}</label></td>
                            @elseif($appointment->status == "In progress")
                            <label class="badge badge-warning">{{$appointment->status}}</label></td>
                            @else
                             <label class="badge badge-success">{{$appointment->status}}</label></td>
                            @endif
                         
                             <td>
                             <a href="{{url('approveAppoint', $appointment->id)}}">  <button type="submit" class="btn btn-success">Approve</button></a> 
                              <a href="{{url('cancelAppoint', $appointment->id)}}"> <button type="submit" class="btn btn-danger">Cancel</button></a>  

                           

                            <a href="{{url('emailView', $appointment->id)}}"><button type="submit" class="btn btn-info">Send Mail</button></a></td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      <!-- page-body-wrapper ends -->
    </div> 
  </div>
 </div>
    <!-- container-scroller -->
   
    @include('admin.script')
  </body>
</html>
