@extends('admin.layouts.template');



@section('content')



<div class="container mt-4">
  <!-- Basic Layout & Basic with Icons -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Add Sub Category </h4>
    <div class="row">
      <!-- Basic Layout -->
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Add New Sub Category</h5>

          </div>
      <!-- message code  laravel validate -->

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
            

            <form action="{{route('subcategoryupdate',$subcategory->id) }} " method="POST">
            @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Sub Category Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" name="name" value="{{$subcategory->name}} " />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category </label>
                <div class="col-sm-10">
                  <select class="form-select" id="category_id" aria-label="Default select example" name="category_id">
                 
                    
                    @foreach ($categories as $category)   
                   
                    <option value="{{$category->id}}  " {{ $subcategory->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }} </option>
                 
                  @endforeach 
                  

                  </select>
                </div>
              </div>

              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn"style="background: orange; color:#fff">Update Category</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


@endsection





 