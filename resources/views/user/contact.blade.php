@extends('user.layouts.template')

@section('page_title')
Contact-GagaFashion
@endsection

@section('content')
<section class="banner">
  <div class="banner-overlay"></div>
  <div class="container" style="z-index:50;">
    <div class="row align-items-center">
      <div class="col-md-6 mx-auto text-center">
        <div class="banner-caption">

          <h1 class="text-white">Contactez-nous </h1>
          <p>GAGAFASHION</p>
          <div id="reseau">
                  <a href="#"><i class='bx bxl-whatsapp' ></i></a>
                  <a href="#"><i class='bx bxl-instagram' ></i></a>
                  <a href="#"><i class='bx bxl-facebook-circle' ></i></a>
                 </div>
        </div>
      </div>
    </div>
  </div>
</section>

 <!--formulaire-->
 <div class="main" style="padding-top:5rem; padding-bottom:5rem;">
    <div class="container">
        <div class="row">
          <div class="col-md-6 top" >
            <h2>Contactez-nous</h2>
            <form action="#" method="post">
              <div class="form-group" style="margin-top: 2rem;">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" class="form-control" required>
              </div>
              <div class="form-group" style="margin-top: 2rem;">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" class="form-control" required>
              </div>
              <div class="form-group" style="margin-top: 2rem;">
                <label for="telephone">Téléphone :</label>
                <input type="tel" id="telephone" name="telephone" class="form-control intl-tel-input" required>

              </div>
              <div class="form-group"style="margin-top: 2rem;">
                <label for="message">Message :</label>
                <textarea style="height:10rem;" id="message" name="message" class="form-control" required></textarea>
              </div>
              <button type="submit" class="btn " style="margin-top: 2rem; background:orange; color:white;">Envoyer</button>
            </form>
          </div>
          <div class="col-md-6 localisation">
            <h2>Où nous trouver ?</h2>
            <p style="margin-top: 2rem;">Bastos-Yaoundé<br>Nvogbi-Yaoundé <br>Cameroun</p>
            <p>Email:gagafashion@gmail.com</p>
            <p>Tel: +237 694904052 / +237 6200024230 </p>
            <iframe style="margin-top:2rem;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.9611268898855!2d2.329439515673223!3d48.86805217928764!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e09c764cf73%3A0x738d3fa6284a56a8!2s123%20Rue%20de%20la%20Paix%2C%2075001%20Paris%2C%20France!5e0!3m2!1sen!2sus!4v1617669237377!5m2!1sen!2sus" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>
      </div>
      


    </div>
   
@endsection







 