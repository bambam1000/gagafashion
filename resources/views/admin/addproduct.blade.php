@extends('admin.layouts.template');



@section('content')

<div class="container " style="margin-top: 100px">
  <!-- Basic Layout & Basic with Icons -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Add Product </h4>
    <div class="row">
      <!-- Basic Layout -->
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Add New Product</h5>

          </div>
          <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif


            <form action="{{route('insertproduct')}} " method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default_name">Product Price</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="price" name="price" placeholder="2" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="quantity" name="quantity" placeholder="7" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                </div>
              </div>


              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category </label>
                <div class="col-sm-10">
                  <select class="form-select" id="categories_id" aria-label="Default select example" name="category" >
                    <option selected>Open this select Category</option>
                    @foreach($categories as $category )
                    <option value="{{$category->id }}">{{ $category->name}} </option>
                    @endforeach
                  </select>
                </div>


              </div>


              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Select Sub Category </label>
                <div class="col-sm-10">
                  <select class="form-select" id="subcategories_id" aria-label="Default select example" name="subcategory">
                    <option selected>Open this select sub Category</option>

                    @foreach($subcategories as $subcategory )
                    <option value="{{$subcategory->id }} ">{{$subcategory->name }} </option>
                    @endforeach

                  </select>
                </div>


              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Upload Image</label>
                <div class="col-sm-10">
                  <input class="form-control" type="file" id="image" name="image" />
                </div>
              </div>

              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn" style="background: orange; color:#fff">Add Product</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>



    @endsection