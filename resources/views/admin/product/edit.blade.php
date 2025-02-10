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
          <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
          </button>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item" href="javascript:;">Action</a>
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
        <div class="col-md-8 m-auto">
          <div class="card mb-3">
            <div class="card-header">
              Product
            </div>
            <div class="card-body">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $product_info->product_name }}</li>
                </ol>
              </nav>
              <form action="{{ route('product.update', $product_info->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                  <label>Category Name</label>
                  <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="category_id">
                    <option selected>Open this select menu</option>
                    @foreach($active_categories as $active_category)
                    <option {{ ($active_category->id == $product_info->category_id) ? "selected":"" }} value="{{ $active_category->id }}">{{ $active_category->category_name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Product Name</label>
                  <input type="hidden" name="category_id" value="{{ $product_info->id }}">
                  <input type="text" class="form-control" placeholder="Enter Category Name" name="product_name" value="{{ $product_info->product_name }}">
                  @error('category_name')
                  <samp class="text-danger">{{ $message }}</samp>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Product Short Description</label>
                  <textarea name="product_short_description" class="form-control" placeholder="Enter Category Description" rows="5">{{ $product_info->product_short_description }}</textarea>
                </div>
                <div class="form-group">
                  <label>Product Long Description</label>
                  <textarea name="product_long_description" class="form-control" placeholder="Enter Category Description" rows="5">{{ $product_info->product_long_description }}</textarea>
                </div>
                <div class="form-group">
                  <label>Product Price</label>
                  <input type="text" value="{{ $product_info->product_price }}" name="product_price" class="form-control" placeholder="Enter Category Description">
                </div>
                <div class="form-group">
                  <label>Product Quantity</label>
                  <input type="text" value="{{ $product_info->product_quantity }}" name="product_quantity" class="form-control" placeholder="Enter Category Description">
                </div>
                <div class="form-group">
                  <label>Alert QT</label>
                  <input type="text" value="{{ $product_info->product_alert_quantity }}" name="product_alert_quantity" class="form-control" placeholder="Enter Category Description">
                </div>
                <div class="form-group">
                  <label>Product Photo</label>
                  <input type="file" name="product_photo" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update Product</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection