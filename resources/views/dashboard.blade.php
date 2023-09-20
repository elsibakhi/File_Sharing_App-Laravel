<x-main-layout  name="Dashboard"  path="/dashbord/">

    <!-- partial:partials/_navbar.html -->


      <!-- partial:partials/_settings-panel.html -->


      <!-- partial -->

      <!-- partial -->
      <div class="main-panel w-100">
        <div class="content-wrapper">
          <div class="row ml-5">
            <div class=" ml-5 col-md-12 grid-margin pl-5">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome {{auth()->user()->name}}</h3>
                  <h6 class="font-weight-normal mb-0 " style="font-size: 17px">Hello there! Welcome to  <span class="text-primary">{{config("app.name")}}</span>, where meaningful connections come to life. We're thrilled to have you on board as we embark on a journey to nurture lasting customer relationships. Let's make every interaction count and grow together. Explore our intuitive tools and discover the power of personalized CRM solutions tailored just for you. Together, let's take your business to new heights!</h6>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">

        <div class="row mr-5">
          <a href="{{route('files.create')}}" type="button" class="btn btn-outline-primary btn-icon-text mx-2">
            Add files
            <i class="ti-plus "></i>
          </a>
        </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">

            <div class="col-md-6 mx-auto grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">files number</p>
                      <p class="fs-30 mb-2">{{$number_of_files}}</p>

                    </div>
                  </div>
                </div>

            </div>
          </div>
          </div>



          <div class="row">

          <div class=" col-10  my-5 mx-auto">
      <div class="col-md-10 grid-margin m-auto stretch-card">
        <div class="card">
          <div class="card-body">
            <x-alert name="success" class="alert-success"  />
            <p class="card-title mb-0">Top Products</p>
            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Message</th>
                    <th>Size</th>
                    <th>Type</th>
                    <th>Downloads number</th>
                    <th>Actions</th>

                  </tr>
                </thead>
                <tbody>
                  @forelse ($files as $file)
                  <tr>
{{--
                    <td><img src="{{
                      $file->path ?
                      Storage::url($file->path)
                      :'default/cover.png'}}"
                      alt="" style="width: 100px; height: 100px; transform: scale(0.7)" ></td> --}}
                    <td>{{$file->title}}</td>
                    <td class="font-weight-bold">{{$file->message}}</td>
                    <td>{{$file->size}} KB</td>
                    <td class="font-weight-medium">{{$file->type}}</td>
                    <td class="font-weight-medium">{{$file->logs()->count()}}</td>

                    <td class="d-flex">

                  <a href="{{route('files.edit',$file->id)}}" type="button" class="btn btn-sm  btn-outline-secondary btn-icon-text my-2">
                    Edit
                    <i class="ti-file btn-icon-append"></i>
                  </a>
                       <a href={{route("files.download",$file->id)}} class="btn btn-sm btn-outline-primary my-2 ">Download File</a>
                  <form action="{{route('files.destroy',$file->id)}}" method="post">

                      @csrf
                      @method("delete")

                      <button type="submit" class="btn btn-sm btn-outline-danger btn-icon-text my-2">
                        <i class="ti-alert btn-icon-prepend"></i>
                        Delete
                      </button>
                  </form>

                    </td>
                  </tr>

                  @empty
                  <tr>

                    <td class="font-weight-bold">There is no files</td>

                  </tr>

                  @endforelse


                </tbody>
              </table>
            </div>
          </div>
          {{ $files->links('pagination::bootstrap-5') }}
        </div>
      </div>

    </div>

  </div>

        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023.  Baraa </span>

          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->

  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>



</x-main-layout>
