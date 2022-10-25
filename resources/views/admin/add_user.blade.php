<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.png')}}" />
    <style>
        .pro_center{
            text-align: center;
            /* padding-top: 30px; */
          
        }

        .h2_font{
            font-size: 30px;
            padding: 30px;
        }
        .table-dark{
            color: white;
        }

        .forms-sample{
            color: white;
        }
        

    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')

        {{-- content --------------------------------------------------------------------- --}}

        <div class="main-panel">
            <div class="content-wrapper" style="background-color: #434343;">
                
                @if(session()->has('message'))
                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss='alert' aria-hidden="true">X</button>
                    {{session()->get('message')}}
                </div>
                @endif
                    
                {{-- @if(session()->has('message'))
                 <div class="alert alert-success">
                    {{session()->get('message')}}
                 </div>
                @endif --}}
                <div class="pro_center">
                    <h2 class="h2_font">Add Users</h2>
                </div>

                    <form class="forms-sample" method="POST" action="{{url('/add_user_logic')}}"> 
                      
                        @csrf
                      {{-- Name --}}
                      <div class="form-group">
                        <label for="exampleInputName1">Name :</label>
                        <input type="text" value="{{old('name')}}" class="form-control" id="exampleInputName1" placeholder="Name" name="name" style="background-color: #4b5564;color: white;border-radius: 5px;">
                      </div>

                      
                      {{-- Email --}}
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email :</label>
                        <input type="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail3" placeholder="Email" name='email' style="background-color: #4b5564;color: white;border-radius: 5px;">
                      </div>


                       {{-- Phone --}}
                      <div class="form-group">
                        <label for="exampleInputPassword4">Phone :</label>
                        <input type="number" value="{{old('phone')}}" class="form-control" id="exampleInputPassword4" placeholder="Phone" name="phone" style="background-color: #4b5564;color: white;border-radius: 5px;">
                      </div>

                       {{-- UserType --}}
                      <div class="form-group">
                        <label for="exampleInputPassword4">UserType :</label>
                        <select name="usertype" id="" class="form-control"  style="background-color: #4b5564;color: white;border-radius: 5px;">
                            <option value="0" disabled selected>Choose Privliges</option>
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select>
                      </div>

                      

                       {{-- Address --}}
                      <div class="form-group">
                        <label for="exampleInputPassword4">Address :</label>
                        <input type="text" value="{{old('address')}}" class="form-control" id="exampleInputPassword4" placeholder="Address" name="address" style="background-color: #4b5564;color: white;border-radius: 5px;">
                      </div>
          

                      {{-- Password --}}
                      <div class="form-group">
                        <label for="exampleInputCity1">Password</label>
                        <input type="password" value="{{old('password')}}" class="form-control" id="exampleInputCity1" placeholder="Password" name="password"  style="background-color: #4b5564;color: white;border-radius: 5px;">
                      </div>


                      
                      {{-- submit --}}
                      <input type="submit" class="btn btn-primary mr-2" value="Submit">
                    </form>

            </div>
        </div>



      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('admin/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('admin/assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('admin/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('admin/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('admin/assets/js/misc.js')}}"></script>
    <script src="{{asset('admin/assets/js/settings.js')}}"></script>
    <script src="{{asset('admin/assets/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('admin/assets/js/dashboard.js')}}"></script>
    <!-- End custom js for this page -->
    
  </body>
</html>