@extends('user.layouts.template')


@section('page_title')
Category-GagaFashion
@endsection

@section('content')


<main id="main">

   <!-- ======= Search bar======= -->

   <div id="search"style="margin-top:10rem;">

<div class="container">
  <form>
    <div class="inner-form ">

      <div class="input-field first-wrap ">

        <select id="maListeDeroulante">
          <option value="">Categories </option>
          @foreach ($categories as $category)
          <option value="{{ route('categoryshow', ['id' => $category->id]) }}">{{ $category->name }}</option>
          @endforeach  
          
        </select>


      </div>

      <div class="input-field second-wrap">
        <input id="search" type="text" placeholder="Rechercher un produit" />
      </div>

      <div class="input-field third-wrap">
        <button class="btn-search" type="button">
          <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
          </svg>
        </button>
      </div>


    </div>
  </form>

</div>

</div>

<!-- ======= Search bar======= -->






  <!-- ======= product ======= -->
  <div id="team" class="our-team-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>{{$subcategory->name}} </h2>
          </div>
          

          <div class="container">
            <div class="row justify-content-center">
              <div class="col-auto">
                <ul class="list-inline" style="color: orange; font-size: 16px;">
                <li  class="list-inline-item border-left pl-2 "> <a class="text-dark" href="{{ route('categoryshow', ['id' => $subcategory->category_id]) }}">Tout les produits</a></li>

                @foreach ($subcategories as $subcategory)
                  <li  class="list-inline-item border-left pl-2 "> <a class="text-dark" href="{{ route('subcategory.show', ['id' => $subcategory->id]) }}">{{ $subcategory->name }}</a></li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="row">
        
        @foreach($products as $product)
        <div class="col-md-2 card1">
          <a href="{{ route('productdetail', ['id' => $product->id]) }}">
            <div class="product">
              <img class="img " src="{{ $product->image }}" alt="Product 1">
              <div class="info">
                <div class="">
                  <div class="nom">
                    <p>{{ $product->name }} </p>
                  </div>
                  <div class="price">
                    <p>{{ $product->price }} $</p>
                  </div>
                  <div class="form">
                  <form action="{{url('addcard',$product->id)}} " method="POST">
                    @csrf
                    <div class="form-group" hidden="">
                        <label for="quantity">Quantité :</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1">
                      </div>
                    <button style="border: none; background:#fff;" class="sub" type="submit">Buy <i class=" fa fa-plus"></i> </button>
                  </form>
                  </div>

                </div>
              </div>
            </div>
          </a>
        </div>
        @endforeach

      </div>

    </div>
  </div><!-- End product -->


  <div class="d-flex justify-content-center" style="margin-bottom: 2rem;">

   {!! $products->links() !!}

  </div>


   





  @endsection