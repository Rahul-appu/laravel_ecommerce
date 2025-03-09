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
    .carousel-inner {
    border-radius: 10px; /* Rounded corners */
    overflow: hidden;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); /* Adds shadow */
}

.carousel-item img {
    width: 100%;
    height: 500px; /* Adjust based on preference */
    object-fit: cover; /* Ensures images cover the area neatly */
    transition: transform 0.5s ease-in-out;
}

.carousel-item:hover img {
    transform: scale(1.02); /* Slight zoom effect on hover */
}

/* Overlay gradient for better text readability */
.carousel-item::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0));
    z-index: 1;
}

/* Navigation arrow customization */
.carousel-control-prev, 
.carousel-control-next {
    width: 5%;
}

.carousel-control-prev i, 
.carousel-control-next i {
    font-size: 30px;
    color: white;
    background: rgba(0, 0, 0, 0.5);
    padding: 10px;
    border-radius: 50%;
    transition: background 0.3s ease;
}

.carousel-control-prev i:hover, 
.carousel-control-next i:hover {
    background: rgba(0, 0, 0, 0.8);
}

/* Dots indicator styling */
.carousel-indicators li {
    background-color: #888;
    border-radius: 50%;
    width: 10px;
    height: 10px;
}

.carousel-indicators .active {
    background-color: #f39c12;
}
.custom-background {
    background-color: #2c3e50; /* Professional dark blue-gray */
    color: white; /* Ensures text contrast */
    border-radius: 10px; /* Smooth rounded corners */
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); /* Adds a subtle shadow */
    height: 300px; /* Adjust height as needed */
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 20px;
    font-size: 18px;
    font-weight: bold;
    transition: background 0.3s ease-in-out; /* Smooth color transition */
}

/* Hover effect for interactivity */
.custom-background:hover {
    background-color: #34495e; /* Slightly lighter shade on hover */
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
  <header style="position: fixed; top: 0; left: 0; width: 100%; background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); padding: 10px 0; z-index: 1000; transition: all 0.3s ease-in-out; box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);">
    <div style="display: flex; align-items: center; justify-content: space-between; max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        
        <div style="display: flex; align-items: center; gap: 10px;">
            <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 1.8rem; color: #ff6f61; animation: rotateCart 1.5s infinite ease-in-out;"></i>
            <span style="font-size: 1.5rem; font-weight: bold; color: white; letter-spacing: 1px;">Ecommerce</span>
        </div>
        
        <div style="position: relative;">
            <input type="text" placeholder="Search..." style="padding: 10px 15px; border-radius: 25px; border: none; outline: none; width: 250px; background: rgba(255, 255, 255, 0.3); backdrop-filter: blur(5px); color: white; font-size: 1rem; transition: 0.3s;">
            <i class="fa fa-search" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); color: white; font-size: 1.2rem; cursor: pointer;"></i>
        </div>
        
        <div style="display: flex; gap: 20px;">
            <label style="color: white; font-size: 1.1rem; cursor: pointer; transition: 0.3s; font-weight: 500; margin-right: 10px;" onmouseover="this.style.color='#ff6f61'; this.style.transform='scale(1.1)';" onmouseout="this.style.color='white'; this.style.transform='scale(1)';">Home</label>
            <label style="color: white; font-size: 1.1rem; cursor: pointer; transition: 0.3s; font-weight: 500;" onmouseover="this.style.color='#ff6f61'; this.style.transform='scale(1.1)';" onmouseout="this.style.color='white'; this.style.transform='scale(1)';">About Us</label>
        </div>
    </div>
</header>

<script>
    // Cart Rotation Animation
    let cartIcon = document.querySelector('.fa-shopping-cart');
    setInterval(() => {
        cartIcon.style.transform = 'rotate(-10deg)';
        setTimeout(() => { cartIcon.style.transform = 'rotate(10deg)'; }, 300);
        setTimeout(() => { cartIcon.style.transform = 'rotate(0deg)'; }, 600);
    }, 1500);
</script>

<div class="card-body" style="position: relative; height: 300px; display: flex; align-items: center; justify-content: center; overflow: hidden;background-color:black;">
  <div class="mbr-overlay" style="
      position: absolute; 
      top: 0; left: 0; 
      width: 100%; height: 100%;
      background: url('{{ asset('banner/ban1.jpg') }}') center/cover no-repeat;
      opacity: 0.8;
      filter: brightness(50%);
  "></div>
  
  <h2 style="
      position: relative; 
      z-index: 2; 
      color: white; 
      font-size: 2rem; 
      font-weight: bold;
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
  ">Enjoy Your Online Shopping With Us .......</h2>
</div>

 
  <div class="card-body">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('banner/temp.jpg') }}" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('banner/temp2.jpg') }}"  alt="Second slide">
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
 


  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span> 
    <span class="dot" onclick="currentSlide(2)"></span> 
    <span class="dot" onclick="currentSlide(3)"></span> 
  </div>
  <div class="card" style="border: none; background-color: #f8f9fa;">
    <h2 style="text-align: center; font-size: 2rem; font-weight: bold; color: #ff6f61; margin-bottom: 20px; text-transform: uppercase; letter-spacing: 2px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">
      🛍️ Product List 🛍️
  </h2>
    <div class="card-body">
      @foreach ($product_details->chunk(3) as $chunk)
          <div class="row">
              @foreach ($chunk as $product)
                  <div class="col-md-12 col-lg-6 col-xl-4">
                      <div class="card product-card" style="display: flex; flex-direction: column; height: 100%; border-radius: 15px; overflow: hidden; background: linear-gradient(135deg, #fdfbfb, #ebedee); box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2); transition: transform 0.3s ease-in-out;">
                          
                          <img class="card-img-top product-image" src="{{ asset('uploads/' . basename($product->image_path)) }}" alt="Product Image"
                              style="height: 280px; object-fit: cover; width: 100%; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                          
                          <div class="card-body text-center" style="display: flex; flex-direction: column; justify-content: space-between; flex-grow: 1; padding: 20px; background-color: #fff;">
                              <h5 class="card-title" style="font-size: 1.3rem; font-weight: bold; color: #ff6f61;">{{ $product->product_name }}</h5>
                              
                              <p class="card-text product-desc" style="color: #555; font-size: 0.95rem; flex-grow: 1; line-height: 1.4; padding: 10px; background: rgba(255, 223, 186, 0.2); border-radius: 8px;">
                                  <b>{{ $product->product_desc }}</b>
                              </p>
  
                              <p class="product-price" style="font-size: 1.4rem; font-weight: bold; color: #333; background: #ff6f61; padding: 10px 20px; border-radius: 30px; color: white; display: inline-block;">
                                  $200
                              </p>
  
                              <button style="background-color: #ff6f61; color: white; border: none; padding: 10px 20px; border-radius: 30px; font-size: 1rem; cursor: pointer; transition: background 0.3s;">
                                  Buy Now
                              </button>
                          </div>
                      </div>
                  </div>
              @endforeach
          </div><br>
      @endforeach
  </div>
  
  
  
</div>
@include('auth.ecom_foot')


<script>
  let slideIndex = 0;
  showSlides();

  function showSlides() {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}    

      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }

      slides[slideIndex - 1].style.display = "block";  
      dots[slideIndex - 1].className += " active";
      
      setTimeout(showSlides, 3000); // Change slide every 3 seconds
  }
</script>

</body>
</html>
