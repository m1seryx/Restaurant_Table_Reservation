<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../stylers/new_homepage.css">
    <link rel="stylesheet" href="../stylers/responsiveness.css">
   

    <title>Document</title>
</head>
<body>
<?php include "../navbar.php" ?>


<!--HOME CONTAINER ANG PICTURE -->
<div class="homeContainer" id="home">
  <div class="img-container">
    <div>
      <h1><strong>"Savor the flavor!</strong><br> Where Every Bites Tells a Story"</h1>
    </div>
    <div>
      <p>Craving Something Delicious?
      Reserve your seat now and indulge in mouthwatering dishes made with love and the finest ingredients.</p>
    </div>
    <div class="book">
      <a href="#booknow">BOOK NOW</a>
    </div>
  </div>
  
  <div class="img-container" >
    <img src="../image/main_dish.png" alt="">
  </div>
</div>




<!--MAIN DISH SHI -->
<div class="main-dish-container" id="Menu">
  <div class="text-main-dish">
    <h1>Best Main Dishes</h1>
    <p>A selection of hearty and flavorful meals, crafted to satisfy every craving and make every bite memorable.
            Let me know if you want it even shorter or more casual!</p>
    <div class="book">
      <a href="#booknow">BOOK NOW</a>
    </div>
  </div>
  <div class="slider-div">
    <div class="slider-container">
      <div class="slides">
      <!-- Each image inside a slide -->
      <div class="slide">
            <img src="../image/maindish1.png" alt="Dish 1">
            <div class="caption">Vegetable Pad Thai</div>
          </div>
          <div class="slide">
            <img src="../image/maindish2.png" alt="Dish 2">
            <div class="caption">Classic Beef</div>
          </div>
          <div class="slide">
            <img src="../image/maindish3.png" alt="Dish 3">
            <div class="caption">Mushroom Risotto</div>
          </div>
          <div class="slide">
            <img src="../image/maindish4.png" alt="Dish 4">
            <div class="caption">Grilled Chicken</div>
          </div>
          <div class="slide">
            <img src="../image/maindish5.png" alt="Dish 5">
            <div class="caption">Eggplant Parmesan</div>
          </div>
      </div>
    </div>
  </div>
</div>

<!--SIDE DISH -->

<div class="side-dish-container">
<div class="slider-div">
    <div class="slider-container">
      <div class="slides">
      <!-- Each image inside a slide -->
      <div class="slide">
            <img src="../image/sidedish1.avif" alt="Dish 1">
            <div class="caption">Spinach Salad</div>
          </div>
          <div class="slide">
            <img src="../image/sidedish2.avif" alt="Dish 2">
            <div class="caption">Mashed Cauliflower</div>
          </div>
          <div class="slide">
            <img src="../image/sidedish3.avif" alt="Dish 3">
            <div class="caption">Creamy Cajun Shrimp Pasta</div>
          </div>
          <div class="slide">
            <img src="../image/sidedish4.avif" alt="Dish 4">
            <div class="caption">Roasted Potatoes</div>
          </div>
          <div class="slide">
            <img src="../image/sidedish5.avif" alt="Dish 5">
            <div class="caption">Caramelized Brussels Sprouts</div>
          </div>
      </div>
    </div>
  </div>
  <div class="text-main-dish">
    <h1>Best Side Dishes</h1>
    <p>A selection of hearty and flavorful meals, crafted to satisfy every craving and make every bite memorable.
Let me know if you want it even shorter or more casual!</p>
    <div class="book">
      <a href="#booknow">BOOK NOW</a>
    </div>
  </div>
  </div>
</div>

<!--BEVERAGES -->
<div class="main-dish-container">
  <div class="text-main-dish">
    <h1>Best Drinks</h1>
    <p>A selection of hearty and flavorful meals, crafted to satisfy every craving and make every bite memorable.
            Let me know if you want it even shorter or more casual!</p>
    <div class="book">
      <a href="#booknow">BOOK NOW</a>
    </div>
  </div>
  <div class="slider-div">
    <div class="slider-container">
      <div class="slides">
      <!-- Each image inside a slide -->
      <div class="slide">
            <img src="../image/beverages1.webp" alt="Dish 1">
            <div class="caption">Cold Mango Coffee</div>
          </div>
          <div class="slide">
            <img src="../image/beverages2.webp" alt="Dish 2">
            <div class="caption">Bananatella Oat Smoothie</div>
          </div>
          <div class="slide">
            <img src="../image/beverages3.webp" alt="Dish 3">
            <div class="caption">Cranberry Orange Smoothie</div>
          </div>
          <div class="slide">
            <img src="../image/beverages4.webp" alt="Dish 4">
            <div class="caption">Vanilla and Maple Horchata</div>
          </div>
          <div class="slide">
            <img src="../image/beverages5.webp" alt="Dish 5">
            <div class="caption">Cherry Old Fashioned Smash</div>
          </div>
      </div>
    </div>
  </div>
</div>






<div class="booknow" id="booknow">
<h1 data-aos="fade-left" tabindex="0">RESERVE NOW</h1>
  <div class="book-container">
  
    <div class="form" data-aos="fade-left">
     
      <form action="" id="bookingForm" method="post">
        <div class="div-input">
          <div>
        <input type="email" name="email" required size="25" placeholder="Enter your email:" id="email"> 
        </div>
        <div>
        <input type="name" name="name" required size="25" placeholder="Enter your name:" id="name">
        </div>  
      </div>
        <div class="div-select">
        <div>
       <select name="numSeats" id="numSeats" required>
        <option value="" selected disabled>Number of seat</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>  
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
       </select>
        </div>  
       <div>
       <input type="date" name="res_date" min="2025-04-01" max="2025-04-29" >
       </div>
       </div>
        <input type="submit" value="Next" class="sub" id="sub" >
        
      </form>
    </div>
  </div>
  <div id="availableTables" class="ye">

  </div>
  </div>

</div>





<div class="feedback-div" id="feedback">   
  <div class="slide-up">
        <div class="testimonial-box">
            <h2 class="testimonial-title">GUEST REVIEWS</h2>
            <div class="testimonial-content">
                <span class="quote quote-left">&ldquo;</span>
                <p id="testimonial-text">
                </p>
                <span class="quote quote-right">&rdquo;</span>
                <p id="author" class="testimonial-author">- Chill J.</p>
            </div>
              <div class="buttons">
                 <button id="prev" class="arrow left">&#10094;</button>
                 <button id="next" class="arrow right">&#10095;</button>
              </div>
          </div>
    </div>
</div>

<!--about us -->
<div class="about-us-section" id="aboutus">
  <div class="about-container">
    <h1>About Us</h1>
    <p>
      At <strong>Your Restaurant Name</strong>, we're more than just a dining destination — we're a flavor journey. 
      Every dish is crafted with love, passion, and the finest ingredients to give you a meal you’ll remember. 
      Whether you're in the mood for comfort food, something adventurous, or a sweet drink to refresh your day — 
      we’ve got something for everyone.
    </p>
    <p>
      Our team believes in creating a warm, welcoming space for families, friends, and foodies alike. 
      Come in hungry, leave happy!
    </p>
  </div>

  <div class="contact-section">
    <h2>Contact Us</h2>
    <p><strong>Email:</strong> contact@yourrestaurant.com</p>
    <p><strong>Phone:</strong> +63 912 345 6789</p>
    <p><strong>Address:</strong> 123 Flavor Street, Taste Town, PH</p>
  </div>

  <div class="social-media-links">
    <h2>Follow Us</h2>
    <a href="https://www.youtube.com/watch?v=s1tAYmMjLdY" target="_blank">
      <img src="../icons/fb.png" alt="Facebook" class="social-icon">
    </a>
    <a href=https://www.youtube.com/watch?v=s1tAYmMjLdY" target="_blank">
      <img src="../icons/ig.png" alt="Instagram" class="social-icon">
    </a>
    <a href="https://www.youtube.com/watch?v=s1tAYmMjLdY" target="_blank">
      <img src="../icons/tiktok.png" alt="Twitter" class="social-icon">
    </a>
  </div>
</div>


<script src="../javascript/book-form.js"></script>
<script src="../javascript/homepage.js"></script>
<script src="../javascript/book-backend.js"></script>


</body>
</html>

