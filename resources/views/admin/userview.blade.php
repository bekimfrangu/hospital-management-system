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
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                        <div class="card-body">
                        @if(Session::has('successUser'))
                                <div class="alert alert-success">
                                    
                                    {{Session::get('successUser')}}
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                </div>
                        @endif
                        @if(Session::has('errorUser'))
                                <div class="alert alert-warning">
                                    <strong>{{Session::get('errorUser')}}</strong>
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                </div>
                        @endif
                        <h4 class="card-title">Add User</h4>

                        <form class="forms-sample" method="post" action="{{url('upload_user')}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" style="color: black;" class="form-control"type="text" id="name"  name="name" placeholder="">
                            
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" style="color: black;" class="form-control"type="text" id="email"  name="email" placeholder="">
                            
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" style="color: black;" class="form-control"type="text" id="password"  name="password" placeholder="">
                            
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" style="color: black;" class="form-control"type="text" id="address"  name="address" placeholder="">
                            
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" style="color: black;" class="form-control" id="phone" name="phone" placeholder="">
                               
                            </div>
                            <div class="form-group">
                                <label for="utype">Role</label><br>
                                <select class="form-control"  name="utype" id="utype">
                                    <option value="">--Select--</option>
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                </select>
                            
                            </div>
                     
                        
                            <button type="submit" class="btn btn-primary me-2">Add</button>
                          
                            </form>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Admins</h4>
                                <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>         
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admins as $admin)
                                    <tr>
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->email}}</td>
                                
                                        <td>{{$admin->address}}</td>
                                        <td>{{$admin->phone}}</td>
                                        <td>
                                          <a href="{{url('updateAdminView', $admin->id)}}"><button type="submit" class="btn btn-warning">Update</button></a>
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

                <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                @if(Session::has('successDelUser'))
                             <div class="alert alert-success">
                                    
                                {{Session::get('successDelUser')}}
                                <button type="button" class="close" data-dismiss="alert">x</button>
                             </div>
                    @endif
                    @if(Session::has('errorDelUser'))
                             <div class="alert alert-warning">
                                <strong>{{Session::get('errorDelUser')}}</strong>
                                <button type="button" class="close" data-dismiss="alert">x</button>
                             </div>
                 @endif
                  <div class="card-body">
                    <h4 class="card-title">All Users</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Address</th>
                            <th>Phone</th>
                     
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                          <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->password}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->phone}}</td>
                         
                            <td>
                             <a href="{{url('updateUserView', $user->id)}}">  <button type="submit" class="btn btn-warning">Update</button></a> 
                            <a href="{{url('deleteUser', $user->id)}}" onclick="return confirm('Are you sure you want to delete user?')"> <button type="submit" class="btn btn-danger">Delete</button></a>   
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
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
   
    @include('admin.script')
  </body>
</html>
