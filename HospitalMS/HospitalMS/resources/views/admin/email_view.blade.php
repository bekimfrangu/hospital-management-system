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

         <div class="main-panel">
          <div class="content-wrapper">
             <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                        <div class="card-body">
                        @if(Session::has('successMail'))
                                <div class="alert alert-success">
                                    
                                    {{Session::get('successMail')}}
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                </div>
                        @endif
                        <h4 class="card-title">Send Email</h4>

                        <form class="forms-sample" method="post"  action="{{url('sendMail', $data->id)}}">
                            @csrf
                            <div class="form-group">
                                <label for="greeting">Greeting</label>
                                <input type="text" style="color: black;" class="form-control"type="text" id="greeting"  name="greeting" placeholder="">
                            
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <input type="text" style="color: black;" class="form-control" id="body" name="body" placeholder="">
                               
                            </div>
                            <div class="form-group">
                                <label for="actionText">Action Text</label>
                                <input type="text" style="color: black;" class="form-control" id="actionText" name="actionText" placeholder="">
                               
                            </div>
                            <div class="form-group">
                                <label for="actionUrl">Action Url</label>
                                <input type="text" style="color: black;" class="form-control" id="actionUrl" name="actionUrl" placeholder="">
                               
                            </div>
                            <div class="form-group">
                                <label for="endPart">End Part</label>
                                <input type="text" style="color: black;" class="form-control" id="endPart" name="endPart" placeholder="">
                               
                            </div>
                        
                            <button type="submit" class="btn btn-primary me-2">Send</button>
                          
                         </form>  
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
