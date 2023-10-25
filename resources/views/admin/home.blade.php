@extends('admin.layouts.source')

@section('source')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Courses</h1>
        </div><!-- /.col -->

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body card-primary card-outline">
              <h5 class="card-title"><strong>Course Category</strong></h5>
              <p class="card-text">
                Make for your course category!
              </p>

              <a href="{{ route('category#listPage') }}" class="card-link text-decoration-none">Detail <small class="text-danger">Click here!</small></a>
              <a href="{{ route('category#createPage') }}" class="card-link text-decoration-none">Create Category <small class="text-danger">Click here!</small></a>
            </div>
          </div>
          <div class="card card-primary card-outline">
            <div class="card-body">
              <h5 class="card-title"><strong>Free Courses</strong></h5>

              <p class="card-text">
                Create free courses for your course.
              </p>

              <a href="{{ route('freeCourse#listPage') }}" class="card-link text-decoration-none">Detail<small class="text-danger ms-1">Click here!</small></a>
              <a href="{{ route('freeCourse#createPage') }}" class="card-link text-decoration-none">Create Course<small class="text-danger ms-1">Click here!</small></a>
            </div>
          </div>
          <div class="card card-primary card-outline">
            <div class="card-body">
              <h5 class="card-title"><strong>Popular Courses</strong></h5>

              <p class="card-text">
                Create popular courses for your course.
              </p>

              <a href="{{ route('popularCourse#listPage') }}" class="card-link text-decoration-none">Detail<small class="text-danger ms-1">Click here!</small></a>
              <a href="{{ route('popularCourse#createPage') }}" class="card-link text-decoration-none">Create Course<small class="text-danger ms-1">Click here!</small></a>
            </div>
          </div>
        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-6">
            <div class="card card-primary card-outline">
                <div class="card-body">
                  <h5 class="card-title"><strong>Opening Courses</strong></h5>

                  <p class="card-text">
                    Create opening courses for your course.
                  </p>

                  <a href="{{ route('course#listPage') }}" class="card-link text-decoration-none">Detail<small class="text-danger ms-1">Click here!</small></a>
                  <a href="{{ route('course#createPage') }}" class="card-link text-decoration-none">Create Course<small class="text-danger ms-1">Click here!</small></a>
                </div>
              </div>

              <div class="card card-primary card-outline">
                <div class="card-body">
                  <h5 class="card-title"><strong>Upcoming Courses</strong></h5>

                  <p class="card-text">
                    Create upcoming courses for your course.
                  </p>

                  <a href="{{ route('UpComingCourse#listPage') }}" class="card-link text-decoration-none">Detail<small class="text-danger ms-1">Click here!</small></a>
                  <a href="{{ route('UpComingCourse#createPage') }}" class="card-link text-decoration-none">Create Course<small class="text-danger ms-1">Click here!</small></a>
                </div>
              </div>

              <div class="card card-primary card-outline">
                <div class="card-body">
                  <h5 class="card-title"><strong>Payment Category</strong></h5>

                  <p class="card-text">
                    Make for your course payment!
                  </p>

                  <a href="{{ route('payment#listPage') }}" class="card-link text-decoration-none">Detail<small class="text-danger ms-1">Click here!</small></a>
                  <a href="{{ route('payment#createPage') }}" class="card-link text-decoration-none">Create Course<small class="text-danger ms-1">Click here!</small></a>
                </div>
              </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>

@endsection







