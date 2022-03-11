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
                                <input type="text" class="form-control"type="text" id="name"  name="name" placeholder="">
                            
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="">
                               
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
            </div>
        </div>
        </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
   
    @include('admin.script')
  </body>
</html>
