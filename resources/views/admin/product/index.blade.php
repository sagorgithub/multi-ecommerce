@extends('layouts.dashbord_app')

@section('product')
active
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
                            List Product
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
                                <table id="category_table" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="" width='5' style="padding-right: 2px;">S/N</th>
                                            <th class="" width='5'>Category</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Alert</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($products as $product)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ App\Models\Category::find($product->category_id)->category_name }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->product_price }}</td>
                                            <td>{{ $product->product_quantity }}</td>
                                            <td>{{ $product->product_alert_quantity }}</td>
                                            <td>
                                                <img class="img-fluid" src="{{ asset('upload/product_photos') }}/{{ $product->product_thumbnail_photo }}" alt="">
                                            </td>
                                            <td>
                                                <a href="{{ route('product.edit', $product->id) }}" type="button" class="btn btn-info">Edit</a>
                                                <form action="{{ route('product.destroy', $product->id) }}" method="POST"> 
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                            <!-- <td>
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                    <a href="#" type="button" class="btn btn-info">Edit</a>
                                                    <a href="#" type="button" class="btn btn-danger">Delete</a>
                                                </div>
                                            </td> -->
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
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-header">
                            Add Product
                        </div>
                        <div class="card-body">
                          @if (session('product_status'))
                              <div class="alert alert-success">
                                  {{ session('product_status') }}
                              </div>
                          @endif
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label>Category Name</label>
                                  <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="category_id">
                                    <option selected>Open this select menu</option>
                                    @foreach($active_categories as $active_category)
                                    <option value="{{ $active_category->id }}">{{ $active_category->category_name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" name="product_name" class="form-control" placeholder="Enter Category Description">
                                </div>
                                <div class="form-group">
                                    <label>Product Short Description</label>
                                    <textarea name="product_short_description" class="form-control" placeholder="Enter Category Description" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Product Long Description</label>
                                    <textarea name="product_long_description" class="form-control" placeholder="Enter Category Description" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Product Price</label>
                                    <input type="text" name="product_price" class="form-control" placeholder="Enter Category Description">
                                </div>
                                <div class="form-group">
                                    <label>Product Quantity</label>
                                    <input type="text" name="product_quantity" class="form-control" placeholder="Enter Category Description">
                                </div>
                                <div class="form-group">
                                    <label>Alert QT</label>
                                    <input type="text" name="product_alert_quantity" class="form-control" placeholder="Enter Category Description">
                                </div>
                                <div class="form-group">
                                    <label>Product Photo</label>
                                    <input type="file" name="product_photo" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Add Product</button>
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
