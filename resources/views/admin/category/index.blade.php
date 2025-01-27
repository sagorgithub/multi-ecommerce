@extends('layouts.dashbord_app')

@section('category')
active
@endsection

@section('Title')
Category
@endsection
@section('dashbord_content')
 <!--start main wrapper-->
 <main class="main-wrapper">
    <div class="main-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">
          <a href="{{url('home')}}">Dashboard</a>
        </div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
          </nav>
        </div>
        <div class="ms-auto">
          <div class="btn-group">
            <button type="button" class="btn btn-primary">Settings</button>
            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
              <a class="dropdown-item" href="javascript:;">Another action</a>
              <a class="dropdown-item" href="javascript:;">Something else here</a>
              <div class="dropdown-divider"></div><a class="dropdown-item" href="javascript:;">Separated link</a>
            </div>
          </div>
        </div>
      </div>
      <!--end breadcrumb-->
        <div class="">
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-header">
                            List Category
                        </div>
                        <div class="card-body">
                            @if (session('deleted_status'))
                                <div class="alert alert-danger">
                                    {{ session('deleted_status') }}
                                </div>
                            @endif
                            @if (session('edit_status'))
                                <div class="alert alert-success">
                                    {{ session('edit_status') }}
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table id="category_table"  class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL No</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Created By</th>
                                            <th>Created AT</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($categories as $category)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>{{ $category->category_description }}</td>
                                            <td>{{ App\Models\User::find($category->user_id)->name }}</td>
                                            <td>{{ $category->created_at->format('d/m/y h:i:s A') }}</td>
                                            <td>
                                              <img class="img-fluid" src="{{ asset('upload/category_photos') }}/{{ $category->category_photo }}" alt="">
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                    <a href="{{ url('edit/category') }}/{{ $category->id }}" type="button" class="btn btn-info">Edit</a>
                                                    <a href="{{ url('delete/category') }}/{{ $category->id }}" type="button" class="btn btn-danger">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="50" class="text-center text-danger">Vai kono Data nai akhn Guma to</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 mt-5">
                        <div class="card-header bg-danger text-white">
                            List Category (Deleted)
                        </div>
                        <div class="card-body">
                            @if (session('restore_status'))
                                <div class="alert alert-success">
                                    {{ session('restore_status') }}
                                </div>
                            @endif
                            @if (session('forsedelete_status'))
                                <div class="alert alert-danger">
                                    {{ session('forsedelete_status') }}
                                </div>
                            @endif
                            <table>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL No</th>
                                            <th>Category Name</th>
                                            <th>Category Description</th>
                                            <th>Category Created By</th>
                                            <th>Category Created AT</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($deleted_categories as $deleted_category)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $deleted_category->category_name }}</td>
                                            <td>{{ $deleted_category->category_description }}</td>
                                            <td>{{ App\Models\User::find($deleted_category->user_id)->name }}</td>
                                            <td>{{ $deleted_category->created_at->format('d/m/y h:i:s A') }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                    <a href="{{ url('forse/delete/category') }}/{{ $deleted_category->id }}" type="button" class="btn btn-danger">F.D</a>
                                                    <a href="{{ url('restore/category') }}/{{ $deleted_category->id }}" type="button" class="btn btn-info">Restore</a>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="50" class="text-center text-danger">Vai kono Data nai akhn Guma to</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-header">
                            Add Category
                        </div>
                        <div class="card-body">
                            @if (session('succss_status'))
                                <div class="alert alert-success">
                                    {{ session('succss_status') }}
                                </div>
                            @endif

                            @if ($errors->all())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{ url('add/category/post') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" class="form-control" placeholder="Enter Category Name" name="category_name" value="{{ old('category_name') }}">
                                @error('category_name')
                                    <samp class="text-danger">{{ $message }}</samp>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label>Category Description</label>
                                    <textarea name="category_description" class="form-control" placeholder="Enter Category Description" rows="5">{{ old('category_description') }}</textarea>
                                    @error('category_description')
                                        <samp class="text-danger">{{ $message }}</samp>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Category Photo</label>
                                    <input type="file" name="category_photo" class="form-control">
                                    @error('category_description')
                                        <samp class="text-danger">{{ $message }}</samp>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('footer_script')
<script>
  $(document).ready(function() {
    $('#category_table').DataTable();
    } );
</script>
<!-- <script>
  $(document).ready(function() {
    var table = $('#example2').DataTable( {
      lengthChange: false,
      buttons: [ 'copy', 'excel', 'pdf', 'print']
    } );

    table.buttons().container()
      .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
  } );
</script> -->
@endsection
