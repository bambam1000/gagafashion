@extends('user.layouts.template')


@section('page_title')
Accueil-GagaFashion
@endsection

@section('content')

<!-- ======= hero Section ======= -->
<section id="hero">
  <div class="hero-container">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">


      <div class="carousel-inner" role="listbox">

        <div class="carousel-item active" style="background-image: url(assets/img/hero-carousel/1.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">GAGAFASHION </h2>
              <p class="animate__animated animate__fadeInUp">L'afrique c'est chic</p>
              <div>
                <a href="{{url('contact')}}" class="btn-get-started scrollto animate__animated animate__fadeInUp">Contactez Nous</a>
                <a href="{{url('about')}}" class="btn-get-started scrollto animate__animated animate__fadeInUp">A propos De Nous</a>
              </div>

              <div id="reseau">
                <a href="#"><i class='bx bxl-whatsapp'></i></a>
                <a href="#"><i class='bx bxl-instagram'></i></a>
                <a href="#"><i class='bx bxl-facebook-circle'></i></a>
              </div>


            </div>
          </div>
        </div>

        <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/2.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">GAGAFASHION </h2>
              <p class="animate__animated animate__fadeInUp">L'afrique c'est chic</p>
              <div>
                <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Contactez Nous</a>
                <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">A propos De Nous</a>
              </div>
              <div id="reseau">
                <a href="#"><i class='bx bxl-whatsapp'></i></a>
                <a href="#"><i class='bx bxl-instagram'></i></a>
                <a href="#"><i class='bx bxl-facebook-circle'></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/3.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">GAGAFASHION </h2>
              <p class="animate__animated animate__fadeInUp">L'afrique c'est chic</p>
              <div>
                <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Contactez Nous</a>
                <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">A propos De Nous</a>
              </div>
              <div id="reseau">
                <a href="#"><i class='bx bxl-whatsapp'></i></a>
                <a href="#"><i class='bx bxl-instagram'></i></a>
                <a href="#"><i class='bx bxl-facebook-circle'></i></a>
              </div>
            </div>

          </div>

        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </div>
</section><!-- End Hero Section -->

<main id="main">

  <!-- ======= Search bar======= -->

  <div id="search">

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
            <h2>Nos Produits</h2>
          </div>
        </div>
      </div>
      @if(session()->has('message'))
      <div class="alert alert-success">
        {{ session()->get('message')}}
      </div>
      @endif
      <div class="row">
        @foreach($products as $product)
        <div class="col-md-2 card1">
          <a href="{{ route('productdetail', ['id' => $product->id]) }}">
            <div class="product">
              <img class="img " src="{{ $product->image }}" alt="Product 1">
              <div class="product-img" style="background-image: url({{ $product->image }});"></div>
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
  </div><!-- End product -->

  <div class="d-flex justify-content-center" style="margin-bottom: 2rem;">

    {!! $products->links() !!}


  </div>





  @endsection