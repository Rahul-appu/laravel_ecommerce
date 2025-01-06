<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Product Slideshow</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    /* Basic styles for the header */
    header {
      width: 100%;
      background-color: bisque;
      padding: 10px;
      position: sticky; /* Makes the header stick to the top */
      top: 0; /* Ensures it stays at the top */
  z-index: 1000; /* Keeps it above other content */
    }

    .header-content {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
      flex-wrap: wrap; /* Allows content to wrap on smaller screens */
    }

    /* Rotate custom icon */
    .rotate-custom {
      display: inline-block;
      transform: rotate(20deg);
      transform-origin: 60% 30%;
      margin-right: 10px;
      color: blue;
      font-size: 25px;
    }

    .ecommerce-text {
      font-family: 'Verdana', sans-serif;
      font-weight: 700;
      font-size: 28px;
      color: #2c3e50;
      text-transform: capitalize;
      letter-spacing: 2px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
      margin-left: 5px;
    }

    /* Search container */
    .search-container {
      position: relative;
      display: flex;
      justify-content: center;
      margin-top: 10px;
      width: 100%;
      max-width: 400px; /* Max width for larger screens */
    }

    .search-box {
      width: 100%;
      padding: 10px 40px 10px 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      outline: none;
    }

    .search-icon {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      color: #888;
    }

    /* Navigation container */
    .nav-container {
      display: flex;
      gap: 20px;
      margin-top: 10px;
    }

    .nav-label {
      font-size: 18px;
      cursor: pointer;
      position: relative;
      display: inline-block;
      padding: 5px 5px;
    }

    .nav-label:hover::after {
      content: "";
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 2px;
      background-color: red;
    }

    /* Slideshow container */
    .slideshow-container {
      max-width: 1000px;
      position: relative;
      margin: auto;
      overflow: hidden; /* Prevents image overflow */
    }

    .mySlides img {
      width: 100%;
      height: auto;
      object-fit: cover; /* Ensures images scale and cover the container */
    }

    /* Next & previous buttons */
    .prev, .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      padding: 16px;
      margin-top: -22px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
    }

    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover, .next:hover {
      background-color: rgba(0,0,0,0.8);
    }

    /* Caption text */
    .text {
      color: #f2f2f2;
      font-size: 15px;
      padding: 8px 12px;
      position: absolute;
      bottom: 8px;
      width: 100%;
      text-align: center;
    }

    /* The dots/bullets/indicators */
    .dot {
      cursor: pointer;
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.6s ease;
    }

    .active, .dot:hover {
      background-color: #717171;
    }

    /* Fading animation */
    .fade {
      animation-name: fade;
      animation-duration: 1.5s;
    }

    @keyframes fade {
      from {opacity: .4} 
      to {opacity: 1}
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
      .prev, .next,.text {font-size: 11px}
    }
  </style>
</head>
<link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>



<body>
  <header>
    <div class="header-content">
      <div>
        <i class="fa fa-shopping-cart rotate-custom" aria-hidden="true"></i>
        <span class="ecommerce-text">Ecommerce</span>
      </div>
      <div class="search-container">
        <input type="text" class="search-box" placeholder="Search...">
        <i class="fa fa-search search-icon"></i>
      </div>
      <div class="nav-container">
        <label class="nav-label">Home</label>
        <label class="nav-label">About Us</label>
      </div>
    </div>
  </header>

  {{-- <div class="slideshow-container">
    <div class="mySlides fade">
      <div class="numbertext">1 / 3</div>
      <img src="https://i.pinimg.com/1200x/84/c4/3f/84c43fc4eb506dff646ebcd1ebc9e4e5.jpg" width="1500" height="700">       
      <div class="text">Caption Text</div>
    </div>
    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <img src="https://img.freepik.com/free-psd/sales-banner-template-with-image_23-2148149654.jpg" width="1500" height="700">
            <div class="text">Caption Two</div>
    </div>
    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <img src="https://webbytemplate.com/_next/image?url=https%3A%2F%2Fwebby-template-dot-com.s3.eu-north-1.amazonaws.com%2Fassets%2F1097066529.jpg&w=2048&q=75" width="1500" height="700">
            <div class="text">Caption Three</div>
    </div>

    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>
  </div> --}}
  <div class="card-body">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item">
          <img class="d-block w-100" src="https://i.pinimg.com/1200x/84/c4/3f/84c43fc4eb506dff646ebcd1ebc9e4e5.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="https://img.freepik.com/free-psd/sales-banner-template-with-image_23-2148149654.jpg" alt="Second slide">
        </div>
        <div class="carousel-item active">
          <img class="d-block w-100" src="https://webbytemplate.com/_next/image?url=https%3A%2F%2Fwebby-template-dot-com.s3.eu-north-1.amazonaws.com%2Fassets%2F1097066529.jpg&w=2048&q=75" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-custom-icon" aria-hidden="true">
          <i class="fas fa-chevron-left"></i>
        </span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-custom-icon" aria-hidden="true">
          <i class="fas fa-chevron-right"></i>
        </span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-12 col-lg-6 col-xl-4">
        <div class="card mb-2 bg-gradient-dark">
          <img class="card-img-top" src="../dist/img/photo1.png" alt="Dist Photo 1">
          <div class="card-img-overlay d-flex flex-column justify-content-end">
            <h5 class="card-title text-primary text-white">Card Title</h5>
            <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p>
            <a href="#" class="text-white">Last update 2 mins ago</a>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-lg-6 col-xl-4">
        <div class="card mb-2">
          <img class="card-img-top" src="../dist/img/photo2.png" alt="Dist Photo 2">
          <div class="card-img-overlay d-flex flex-column justify-content-center">
            <h5 class="card-title text-white mt-5 pt-2">Card Title</h5>
            <p class="card-text pb-2 pt-1 text-white">
              Lorem ipsum dolor sit amet, <br>
              consectetur adipisicing elit <br>
              sed do eiusmod tempor.
            </p>
            <a href="#" class="text-white">Last update 15 hours ago</a>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-lg-6 col-xl-4">
        <div class="card mb-2">
          <img class="card-img-top" src="../dist/img/photo3.jpg" alt="Dist Photo 3">
          <div class="card-img-overlay">
            <h5 class="card-title text-primary">Card Title</h5>
            <p class="card-text pb-1 pt-1 text-white">
              Lorem ipsum dolor <br>
              sit amet, consectetur <br>
              adipisicing elit sed <br>
              do eiusmod tempor. </p>
            <a href="#" class="text-primary">Last update 3 days ago</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span> 
    <span class="dot" onclick="currentSlide(2)"></span> 
    <span class="dot" onclick="currentSlide(3)"></span> 
  </div>

  <script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
    }
  </script>
</body>
</html>
