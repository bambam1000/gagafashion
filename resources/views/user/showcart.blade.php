@extends('user.layouts.template')

@section('page_title')
Card-GagaFashion
@endsection

@section('content')

<div class="table-responsive cart" >
    <table class="table table-striped">
        <!-- message code  laravel validate -->
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message')}}
        </div>
        @endif

        <thead>
            <tr>
                <th>Nom produit</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <form action="{{url('order')}} " method="post">

            @csrf
            @php
              $totalPrice = 0; // initialiser la variable de prix total
              
            @endphp

            @foreach($cart as $carts)
              
              
            
            <tr>
                <td>
                   <input type="text" name="productname[]" value="{{$carts->product_title}}" hidden="">    
                {{$carts->product_title}} </td>
                <td>
                <input type="text" name="quantity[]}" value="{{$carts->quantity}}" hidden="">      
                {{$carts->quantity}}</td>

                <td>
                <input type="text" name="price[]}" value="{{$carts->price}}" hidden="">  
                 {{$carts->price*$carts->quantity}}$</td>
                <td><a href="{{url('deletecart', $carts->id)}} " class="btn btn-danger">Supprimer </a> </td>
            </tr>
            @php
              $totalPrice += $carts->price*$carts->quantity; // additionner le prix du produit à la variable de prix total
            @endphp
            @endforeach

        </tbody>
    </table>
      <div class="total-price">
        <h1 style="margin: 2rem 0 2rem 0;">Prix total : {{ $totalPrice }} $</h1>
      </div>

      <button class="btn"
      >Commandez</button>

    </form>
</div>


@endsection