<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<style>
     .featured-heading {
    text-align: center;
    margin: 20px 0;
    font-size: 24px;
    font-weight: bold;
  }

  .featured-products {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 20px; /* Space between cards */
  }

  .product-card {
    flex: 1 1 calc(25% - 20px); /* Four cards per row */
    max-width: calc(25% - 20px); /* Consistent size */
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
  }

  .product-card:hover {
    transform: translateY(-5px); /* Subtle lift on hover */
  }

  .product-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
  }

  .product-card h5 {
    margin: 10px 0;
    font-size: 18px;
  }

  .product-card p {
    margin: 0 10px 10px;
    color: #666;
  }

  @media (max-width: 768px) {
    .product-card {
      flex: 1 1 calc(50% - 20px); /* Two cards per row for smaller screens */
      max-width: calc(50% - 20px);
    }
  }

  @media (max-width: 480px) {
    .product-card {
      flex: 1 1 100%; /* One card per row for mobile */
      max-width: 100%;
    }
}
</style>
</head>
<body>
    <!-- Featured Products Section -->
<h2 class="featured-heading">Featured Products</h2>
<div class="featured-products">
  <!-- Product Card 1 -->
  <div class="product-card">
    <img src="https://via.placeholder.com/300x200" alt="Product 1">
    <h5>Product 1</h5>
    <p>Short description of product 1.</p>
  </div>
  <!-- Product Card 2 -->
  <div class="product-card">
    <img src="https://via.placeholder.com/300x200" alt="Product 2">
    <h5>Product 2</h5>
    <p>Short description of product 2.</p>
  </div>
  <!-- Product Card 3 -->
  <div class="product-card">
    <img src="https://via.placeholder.com/300x200" alt="Product 3">
    <h5>Product 3</h5>
    <p>Short description of product 3.</p>
  </div>
  <!-- Product Card 4 -->
  <div class="product-card">
    <img src="https://via.placeholder.com/300x200" alt="Product 4">
    <h5>Product 4</h5>
    <p>Short description of product 4.</p>
  </div>
</div>
</body>
</html>