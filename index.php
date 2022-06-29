<?php
include_once 'connection-config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Syntax Shop</title>

  <!--cdn bootstrap 5.1.x-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!--cdn bootstrap icon-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

  <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body>
  <?php require 'header.php';?>
  <div id="myCarousel" class="carousel slide" data-bs-ride="false">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
        aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./assets/img/bg4.jpg" class="d-block w-100" alt="bg4">
        <div class="carousel-caption caption1">
          <h5>NEW ARRIVALS</h5>
          <h1><span>Best Prices</span> This Season</h1>
          <p>Syntax Shop offers the best products for the most affordable prices</p>
          <button class="btn">Shop Now</button>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./assets/img/bg5.jpg" class="d-block w-100" alt="bg5">
        <div class="carousel-caption caption2">
          <h5>Questions & Answers</h5>
          <h1><span>Support</span> 24 Hr</h1>
          <p>Syntax Shop offers the best customer supports</p>
          <button class="btn">Shop Now</button>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./assets/img/bg6.jpg" class="d-block w-100" alt="bg6">
        <div class="carousel-caption caption3">
          <h5>NEW ARRIVALS</h5>
          <h1>New Computers<span> Everyday</span></h1>
          <p>Syntax Shop offers the best products for the most affordable prices</p>
          <button class="btn">Shop Now</button>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!--Brand-->
  <section id="brand" class="container">
    <div class="row banner">
      <img src="./assets/img/brand.jpg" alt="brand" class="img-fluid col-lg-12 col-md-12 col-sm-12">
    </div>
    <div class="container mt-5 mb-5">
      <div class="row">
        <div class="col-md-4 col-6 mb-4">
          <i class="bi bi-truck" style="font-size: 30px"></i>
          <h5>Free Delivery</h5>
          <p class="text-muted">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit libero quasi soluta laborum assumenda deleniti
            consequatur temporibus possimus beatae eos doloribus fuga iusto.
          </p>
          <p>
            <a href="#" class="support">Learn more ></a>
          </p>
        </div>
        <div class="col-md-4 col-6 mb-4">
          <i class="bi bi-layout-text-window" style="font-size: 30px"></i>
          <h5>Free Support</h5>
          <p class="text-muted">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit libero quasi soluta laborum assumenda deleniti
            consequatur temporibus possimus beatae eos doloribus fuga iusto.
          </p>
          <a href="#" class="support">Learn more ></a>
        </div>
        <div class="col-md-4 col-6 mb-4">
          <i class="bi bi-credit-card" style="font-size: 30px"></i>
          <h5>Secure Payment System</h5>
          <p class="text-muted">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit libero quasi soluta laborum assumenda deleniti
            consequatur temporibus possimus beatae eos doloribus fuga iusto.
          </p>
          <a href="#" class="support">Learn more ></a>
        </div>
      </div>
    </div>
  </section>

  <!--Laptop-->
  <section id="laptop">
    <div class="container">
      <!-- Section tittle -->
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-10">
          <div class="section-tittle mb-70 text-center">
            <h2>Popular Laptops</h2>
            <hr>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium repellendus eum quia optio, molestiae nihil aut assumenda excepturi aperiam iusto necessitatibus quis obcaecati? </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
          <div class="single-popular-items mb-50 text-center">
            <div class="popular-img">
              <img src="assets/img/computer1.jpg" alt="">
              <div class="img-cap">
                <span>Add to cart</span>
              </div>
            </div>
            <div class="popular-caption">
              <h3><a href="product_details.html">Laptop 1</a></h3>
              <span>$ 1,743</span>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
          <div class="single-popular-items mb-50 text-center">
            <div class="popular-img">
              <img src="assets/img/computer2.jpg" alt="">
              <div class="img-cap">
                <span>Add to cart</span>
              </div>
            </div>
            <div class="popular-caption">
              <h3><a href="product_details.html">Laptop 2</a></h3>
              <span>$ 1,743</span>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
          <div class="single-popular-items mb-50 text-center">
            <div class="popular-img">
              <img src="assets/img/computer3.jpg" alt="">
              <div class="img-cap">
                <span>Add to cart</span>
              </div>
            </div>
            <div class="popular-caption">
              <h3><a href="product_details.html">Laptop 3</a></h3>
              <span>$ 1,743</span>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
          <div class="single-popular-items mb-50 text-center">
            <div class="popular-img">
              <img src="assets/img/computer1.jpg" alt="">
              <div class="img-cap">
                <span>Add to cart</span>
              </div>
            </div>
            <div class="popular-caption">
              <h3><a href="product_details.html">Laptop 4</a></h3>
              <span>$ 1,743</span>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
          <div class="single-popular-items mb-50 text-center">
            <div class="popular-img">
              <img src="assets/img/computer2.jpg" alt="">
              <div class="img-cap">
                <span>Add to cart</span>
              </div>
            </div>
            <div class="popular-caption">
              <h3><a href="product_details.html">Laptop 5</a></h3>
              <span>$ 1,743</span>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
          <div class="single-popular-items mb-50 text-center">
            <div class="popular-img">
              <img src="assets/img/computer3.jpg" alt="">
              <div class="img-cap">
                <span>Add to cart</span>
              </div>
            </div>
            <div class="popular-caption">
              <h3><a href="product_details.html">Laptop 6</a></h3>
              <span>$ 1,743</span>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>




  <!--cdn bootstrap 5.1.x-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

</body>

</html>