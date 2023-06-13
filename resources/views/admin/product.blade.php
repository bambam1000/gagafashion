@extends('admin.layouts.template');



@section('content')


<div class="container ">

<!-- Navbar -->

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center " id="navbar-collapse">
                        <!-- Search -->
                        <form style="padding-top: 10px;" action="{{ route('product.search') }}" method="GET">
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" name="query" class="form-control border-0 shadow-none" placeholder="Search products..." aria-label="Search..." />
                            </div>
                        </div>
                        </form>

                       
     
     
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->
                            <li class="nav-item lh-1 me-3">

                            </li>

                            <!-- User -->

                            <li>
                                <x-app-layout style="border: 1px solid black;">

                                </x-app-layout>
                            </li>

                        </ul>
                    </div>
                </nav>

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>All Products </h4>


    <!-- Bootstrap Table with Header - Light -->
    <div class="card">

      @if(session()->has('message'))
      <div class="alert alert-success">
        {{ session()->get('message')}}
      </div>
      @endif
      
      <h5 class="card-header">List of Products </h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead class="table-light">
            <tr>
              <th>Id</th>
              <th>Product Name</th>
              <th> Image</th>
              <th>Price</th>
              <th>Category</th>
              <th>Subcategory</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">

          @foreach ($products as $product);
            <tr>
              <td><i class="fab fa-angular fa-lg text-danger "></i> <strong>{{ $product->id }} </strong></td>
              <td>{{ $product->name }} </td>
              <td> <img style="height: 90px;" src="{{ $product->image }} " alt=""> <br>
              
                 
              
            </td>
              <td>{{ $product->price }} <span class="text-success">FCFA </span> </td>
              <td>{{ $product->category->name }} </td>
              <td>{{ $product->subcategory->name }} </td>

              <td></td>
              <td>
                <a href="{{route('productedit',$product->id)}} " class=" btn btn-primary">Edit</a>
                <a href="{{route('deleteproduct', $product->id)}} " class=" btn btn-Warning">delete</a>
              </td>
            </tr>
            @endforeach  
          </tbody>
        </table>
      </div>
    </div>
    <!-- Bootstrap Table with Header - Light -->


  </div>

 @endsection