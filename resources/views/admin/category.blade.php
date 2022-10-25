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
        .cat_center{
            text-align: center;
            /* padding-top: 30px; */
          
        }

        td img{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width:100px;
            height: 200px;
        }

        .table th img, .jsgrid .jsgrid-table th img, .table td img, .jsgrid .jsgrid-table td img {
            width: 100px;
            height: 92px;
            border-radius: 15%;
        }

        .h2_font{
            font-size: 30px;
            padding: 30px;
        }
        .table-dark{
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

                 {{-- for validation errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                {{--  result message --}}
                @if(session()->has('message'))
                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss='alert' aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
                @endif

                <div class="cat_center">
                    <h2 class="h2_font">Add Ctegory</h2>
                    
                <form action="{{url('add_category')}}" method="POST" style="padding-bottom: 20px;" enctype="multipart/form-data">
                    @csrf
                    <input type="text" value="{{old('category')}}" name="category" placeholder="Category Name" class="input_color" style="color: black; border-radius: 5px;">
                    <input type="file" name="img" class="input_color" style="color: black; border-radius: 5px; display:inline-block;">
                    <input type="submit" value="Add Ctegory" class="btn btn-primary">
                   </form>

                    {{-- category table --}}
                  <?php  $id = 0;?>
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                   <div class="table-responsive">
                    <table class="table table-dark">
                      <thead>
                        <tr>
                          <th> Id </th>
                          <th> Category Name </th>
                          <th>Category Image </th>
                          <th> Controlls </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $category)
                        <tr>
                          <td> <?php echo ++$id ?> </td>
                          <td> {{$category->category_name}}</td>
                          <td> <img src="category_img/{{$category->img}}" alt="" ></td>
                          <td>
                          

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#d{{$category->id}}">
                         Delete
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="d{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header" 

                                style="background-color: #e5e5e5;
                                color: black;">

                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" 

                                style="background-color: #e5e5e5;
                                color: black;
                                border-bottom-right-radius: calc(0.3rem - 1px);
                                border-bottom-left-radius: calc(0.3rem - 1px);">

                                    Are You Sure  To Delet Category : <i class="fa fa-arrow-right fa-lg" aria-hidden="true"></i> 
                                    <span style="color:red ;font-size:20px;"> {{$category->category_name}}</span>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                    <a href="{{url('delete_category',$category->id)}}" class="btn btn-primary">Save changes</a>
                                </div>
                                </div>
                             </div>
                            </div>
                        </div>
                         
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