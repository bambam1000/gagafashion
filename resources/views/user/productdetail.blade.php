@extends('user.layouts.template')

@section('page_title')
Product-Detail-GagaFashion
@endsection

@section('content')
<div class="container detail">
  <div class="row">
    <div class="col-md-6">
      <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid">
    </div>
    <div class="col-md-6">
      <h2>{{ $product->name }}</h2>
      <p>{{ $product->description }}</p>
      <p class="prix"><span>Prix</span> : {{ $product->price }} Fcfa</p>
      
      <form action="{{url('addcard',$product->id)}} " method="POST">
        @csrf
        <div class="form-group">
          <label for="quantity">Quantité :</label>
          <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1">
        </div>
        <button type="submit" class="btn btn-primary">Ajouter au panier</button>
      </form>
    </div>
  </div>
</div>

<div class="container detail-product">
  <h2>Produits similaires</h2>
  <div class="row">
    @foreach($categoryProducts as $categoryProduct)
    <div class="col-md-2 card1">
          <a href="{{ route('productdetail', ['id' => $categoryProduct->id]) }}">
            <div class="product">
              <img class="img " src="{{ $categoryProduct->image }}" alt="Product 1">
              <div class="info">
                <div class="">
                  <div class="nom">
                    <p>{{ $categoryProduct->name }} </p>
                  </div>
                  <div class="price">
                    <p>{{ $categoryProduct->price }} $</p>
                  </div>
                  <div class="form">
                  <form action="{{url('addcard',$product->id)}} " method="POST">
                    @csrf
                     
                    <button class="sub" type="submit">Buy <i class=" fa fa-plus"></i> </button>
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
@endsection
