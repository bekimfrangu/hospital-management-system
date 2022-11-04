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

         <div class="main-panel">
          <div class="content-wrapper">
             <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                        <div class="card-body">
                        @if(Session::has('successDoc'))
                                <div class="alert alert-success">
                                    
                                    {{Session::get('successDoc')}}
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                </div>
                        @endif
                        @if(Session::has('errorDoc'))
                                <div class="alert alert-warning">
                                    <strong>{{Session::get('errorDoc')}}</strong>
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                </div>
                        @endif
                        <h4 class="card-title">Add Doctor</h4>

                        <form class="forms-sample" method="post" enctype="multipart/form-data" action="{{url('upload_doctor')}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" style="color: black;" class="form-control"type="text" id="name"  name="name" placeholder="">
                            
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" style="color: black;" class="form-control" id="phone" name="phone" placeholder="">
                               
                            </div>
                            <div class="form-group">
                                <label for="speciality">Speciality</label><br>
                                <select class="form-control"  name="speciality" id="speciality">
                                    <option value="">--Select--</option>
                                    <option value="Skin">Skin</option>
                                    <option value="Eye">Eye</option>
                                    <option value="Heart">Heart</option>
                                    <option value="Nose">Nose</option>
                                    <option value="Brain">Brain</option>
                                </select>
                            
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label><br>
                                <input type="file" name="image">

                            </div>
                        
                            <button type="submit" class="btn btn-primary me-2">Add</button>
                          
                         </form>  
                         </div>
                         </div>
                        </div>
                        </div>
                            <div class="row">
                               <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                @if(Session::has('successDelDoc'))
                                <div class="alert alert-success">
                                    
                                    {{Session::get('successDelDoc')}}
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                </div>
                                @endif
                                @if(Session::has('errorDelDoc'))
                                        <div class="alert alert-warning">
                                            <strong>{{Session::get('errorDelDoc')}}</strong>
                                            <button type="button" class="close" data-dismiss="alert">x</button>
                                        </div>
                                @endif
                                    <div class="card-body">
                                    <h4 class="card-title">All Doctors</h4>

                                    
                                    <form action="{{url('/search_doctor')}}" method="post">
                                                        @method('GET')
                                                        @csrf
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="search" placeholder="Search for Doctor's name">
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
                                                        <th>Image</th>
                                                        <th>Name</th>
                                                        <th>Phone.</th>
                                                        <th>Speciality</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($data as $doctor)
                                                    <tr> 
                                                        <td><img src="doctorImage/{{$doctor->image}}" width="100" height="100" alt=""></td>
                                                        <td>{{$doctor->name}}</td>
                                                        <td>{{$doctor->phone}}</td>
                                                        <td>{{$doctor->speciality}}</td>
                                                       
                                                        <td>
                                                        <a href="{{url('updateDoc', $doctor->id)}}" >  <button type="submit" class="btn btn-warning">Update</button></a> 
                                                        <a href="{{url('deleteDoc', $doctor->id)}}" onclick="return confirm('Are you sure you want to delete doctor?')"> <button type="submit" class="btn btn-danger">Delete</button></a>  
                                                        </td>
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
                </div>
            </div>
        </div>
        </div>
      <!-- page-body-wrapper ends -->
    <!-- container-scroller -->
   
    @include('admin.script')
  </body>
</html>
