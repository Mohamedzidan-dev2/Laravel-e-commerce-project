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
                    <h2 class="h2_font">Add Product</h2>
                </div>

                    <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{url('/add_product')}}"> 
                      
                        @csrf
                      {{-- title --}}
                      <div class="form-group">
                        <label for="exampleInputName1">Title :</label>
                        <input type="text" value="{{old('title')}}" class="form-control" id="exampleInputName1" placeholder="Title" name="title" style="background-color: #4b5564;color: white;border-radius: 5px;">
                      </div>

                      
                      {{-- price --}}
                      <div class="form-group">
                        <label for="exampleInputEmail3">Price :</label>
                        <input type="number" value="{{old('price')}}" class="form-control" id="exampleInputEmail3" placeholder="Price" name='price' style="background-color: #4b5564;color: white;border-radius: 5px;">
                      </div>


                       {{-- Quntity --}}
                      <div class="form-group">
                        <label for="exampleInputPassword4">Quntity :</label>
                        <input type="number"value="{{old('quntity')}}" class="form-control" id="exampleInputPassword4" placeholder="Quntity" name="quntity" style="background-color: #4b5564;color: white;border-radius: 5px;">
                      </div>


                      
                       {{-- Category --}}
                      <div class="form-group">
                        <label for="exampleSelectGender">Category</label>
                        <select class="form-control" name="category" id="exampleSelectGender" style="background-color: #4b5564;color: white;border-radius: 5px;">
                             <option selected disabled>Choose Category</option>

                           @foreach ($data as $category)
                             <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                           @endforeach

                        </select>
                      </div>



                      {{-- Image --}}
                      <div class="form-group">
                        <label>Image :</label>
                        <input type="file"  name="img" class="form-control" style="background-color: #4b5564;color: white;border-radius: 5px;">
                      </div>
                      

                      {{-- Discount Price --}}
                      <div class="form-group">
                        <label for="exampleInputCity1">Discount Price</label>
                        <input type="number" value="{{old('dis_price')}}" class="form-control" id="exampleInputCity1" placeholder="Discount Price" name="dis_price"  style="background-color: #4b5564;color: white;border-radius: 5px;">
                      </div>

                      {{-- Description --}}
                      <div class="form-group">
                        <label for="exampleTextarea1">Textarea</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="des" style="background-color: #4b5564;color: white;border-radius: 5px;">{{old('des')}}</textarea>
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