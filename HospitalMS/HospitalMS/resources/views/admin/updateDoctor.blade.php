<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/public">
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
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                    @if(Session::has('successEditDoc'))
                                            <div class="alert alert-success">
                                                
                                                {{Session::get('successEditDoc')}}
                                                <button type="button" class="close" data-dismiss="alert">x</button>
                                            </div>
                                    @endif
                                    @if(Session::has('errorEditDoc'))
                                            <div class="alert alert-warning">
                                                <strong>{{Session::get('errorEditDoc')}}</strong>
                                                <button type="button" class="close" data-dismiss="alert">x</button>
                                            </div>
                                    @endif
                                    <h4 class="card-title">Update Doctor</h4>

                                    <form class="forms-sample" method="post" enctype="multipart/form-data" action="{{url('updateDoctor', $doctor->id)}}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            
                                            <input type="text" style="color: black;" class="form-control"type="text" id="name"  name="name" value="{{$doctor->name}}" placeholder="">
                                        
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" style="color: black;" class="form-control" id="phone" name="phone" placeholder="" value="{{$doctor->phone}}">
                                        
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
                                            <img src="doctorImage/{{$doctor->image}}" width="100" height="100" alt="">

                                        </div>
                                        <div class="form-group">
                                            <label for="file">Change Image</label><br>
                                            <input type="file" name="file">

                                        </div>
                                        <button type="submit" class="btn btn-primary me-2">Update</button>
                                    
                                    </form>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
   
    @include('admin.script')
  </body>
</html>
