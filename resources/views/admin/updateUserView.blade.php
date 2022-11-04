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
                                    @if(Session::has('successUpdateUser'))
                                            <div class="alert alert-success">
                                                
                                                {{Session::get('successUpdateUser')}}
                                                <button type="button" class="close" data-dismiss="alert">x</button>
                                            </div>
                                    @endif
                                    @if(Session::has('errorUpdateUser'))
                                            <div class="alert alert-warning">
                                                <strong>{{Session::get('errorUpdateUser')}}</strong>
                                                <button type="button" class="close" data-dismiss="alert">x</button>
                                            </div>
                                    @endif
                                    <h4 class="card-title">Update User</h4>

                                    <form class="forms-sample" method="post" action="{{url('updateUser', $user->id)}}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            
                                            <input type="text" style="color: black;" class="form-control" id="name"  name="name" value="{{$user->name}}" placeholder="">
                                        
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" style="color: black;" class="form-control" id="email" name="email" placeholder="" value="{{$user->email}}">
                                        
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            
                                            <input type="text" style="color: black;" class="form-control" id="password"  name="password" value="{{$user->password}}" placeholder="">
                                        
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            
                                            <input type="text" style="color: black;" class="form-control" id="address"  name="address" value="{{$user->address}}" placeholder="">
                                        
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            
                                            <input type="text" style="color: black;" class="form-control" id="phone"  name="phone" value="{{$user->phone}}" placeholder="">
                                        
                                        </div>
                                        <div class="form-group">
                                            <label for="utype">Role</label><br>
                                            <select class="form-control"  name="utype" id="utype">
                                                <option value="">--Select--</option>
                                                <option value="0">User</option>
                                                <option value="1">Admin</option>
                                            </select>
                                        
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
