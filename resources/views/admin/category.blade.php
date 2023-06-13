@extends('admin.layouts.template');



@section('content')


<div class="container">
  
<!-- Navbar -->

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center " id="navbar-collapse">
                        <!-- Search -->
                        <form style="padding-top: 10px;" action="{{ route('categories.search') }}" method="GET">
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" name="query" class="form-control border-0 shadow-none" placeholder="Search Categories..." aria-label="Search..." />
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>All Category </h4>


    <!-- Bootstrap Table with Header - Light -->
    <div class="card">
                <h5 class="card-header">List of Category </h5>
               @if(session()->has('message'))
                     <div class="alert alert-success">
                         {{ session()->get('message')}}
                     </div>
               @endif
                
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach($categories as $category)
                    
                        
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$category->id}} </strong></td>
                        <td>{{$category->name}} </td>
                         
                        <td>
                           <a href="{{ route('categoryedit', $category->id) }} "class=" btn btn-primary">Edit</a>
                           <a href="{{route('delecategory', $category->id)}} "class=" btn btn-Warning">delete</a>
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