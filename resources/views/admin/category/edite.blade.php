@extends('layouts.dashbord_app')

@section('dashbord_content')
 <!--start main wrapper-->
 <main class="main-wrapper">
    <div class="main-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Components</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Blank Page</li>
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
        <div class="container">
            <div class="row">
                <div class="col-md-4 m-auto">
                    <div class="card mb-3">
                        <div class="card-header">
                            Add Category
                        </div>
                        <div class="card-body">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('add/category') }}">Add Category</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $category_info->category_name }}</li>
                                </ol>
                            </nav>
                            <form action="{{ url('edit/category/post') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                <label>Category Name</label>
                                <input type="hidden" name="category_id" value="{{ $category_info->id }}">
                                <input type="text" class="form-control" placeholder="Enter Category Name" name="category_name" value="{{ $category_info->category_name }}">
                                @error('category_name')
                                    <samp class="text-danger">{{ $message }}</samp>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label>Category Description</label>
                                    <textarea name="category_description" class="form-control" placeholder="Enter Category Description" rows="10">{{ $category_info->category_description }}</textarea>
                                    @error('category_description')
                                        <samp class="text-danger">{{ $message }}</samp>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Update Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
