@extends('layouts.template')
@section('title', 'Create Announcement')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('layouts.topnav')
@include('layouts.sidebar')
  <div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              {{-- <h1>Data Tables</h1> --}}
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li> --}}
              </ol>
            </div>
          </div>
        </div>
      </section>
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Announcements</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <form action="{{ route('transparency.announcements.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <br>
                    <label for="inputText">Title</label>
                    <input type="text" class="form-control"  id="title" name="title">
                    <br>
                    <label for="inputText">Contents</label>
                    <input type="text" class="form-control"  id="content" name="content">
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  </div>
    @include('layouts.footer')
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
</body>
</html>






























