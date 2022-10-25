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
        .mydiv{
            display: inline-block;
            width: 520px;
            justify-content: center;
            align-items: center;
            display: flex;
            padding: 10px;

        }

        form input{
            margin-left: 30px;
           border-radius: 5px;
        
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

        <!-- partial -->
           
        <div class="main-panel">
            <div class="content-wrapper" style="background-color: #434343;">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12" style="text-align:center;font-size:20px;font-weight:bold; width:80%;margin:auto">
                            <h1>Send Email To : {{$data->email}}</h1>

                            <form action="{{url('send_notification',$data->id)}}" style="padding-top:35px ;width:45%;margin:auto" method="GET">
                      @csrf
                               <div class="mydiv">
                                <label for="">Email Greeting : </label>
                                <input type="text" name="greeting" placeholder="email greeting" style="border-radius: 5px;color:black;">
                               </div> 

                               <div class="mydiv">
                                <label for="">Email Firstline : </label>
                                <input type="text" name="firstline" placeholder="firstline" style="border-radius: 5px; margin-left:83;color:black;">
                               </div> 

                               <div class="mydiv">
                                <label for="">Email Body :</label>
                                <input type="text" name="body" placeholder="email body" style="border-radius: 5px;    margin-left: 61px;color:black;">
                               </div>

                                <div class="mydiv">
                                 <label for="">Email button :</label>
                                 <input type="text" name="button" style="border-radius: 5px; margin-left: 48px;color:black;">
                                </div>

                                <div class="mydiv">
                                 <label for="">Email Url :</label>
                                 <input type="text" name="url" placeholder="url" style="border-radius: 5px;  margin-left: 80px;color:black;" >
                               </div>

                                <div class="mydiv">
                                <label for="">Email Lastline :</label>
                                <input type="text" name="lastline" placeholder="lastline" style="border-radius: 5px ; margin-left: 35px;color:black;
                            ">
                                </div> 

                                <div class="mydiv">
                                    <input type="submit" name="submit" value="Send Email" class="btn btn-info" style="margin-right: 65%;">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>




        <!-- main-panel ends -->
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