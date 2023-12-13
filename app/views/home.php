
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $data['title']; ?></title>
    <link rel="stylesheet" type="text/css" href="/SlRail/public/css/home.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
 .navbar {
    background-color: white;
    overflow: hidden;
}

.navbar a {
    float: left;
    display: block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 18px;
}

.navbar a:hover {
    background-color: whitesmoke;
    color: black;
}

.navbar img {
    margin-top: 10px;
    margin-right: 10px;
    border-radius: 50%;
}

.navbar li {
    float: right;
}

.navbar li a {
    padding: 14px 16px;
    color: black;
    text-align: center;
    text-decoration: none;
    font-size: 18px;
}

.navbar li a:hover {
    background-color: #ddd;
    color: black;
}
.slideshow-container {
    max-width: 100%;
    width: 100%;
    height: auto;
    position: relative;
    margin: auto;
}

.mySlides {
    display: none;
}

img {
    vertical-align: middle;
}
.subfooter {
    margin-left: 0px;
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 40px;
    background-color: #f9f9f9bb;
}

.subfooter-container {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    align-items: center;
    background-color: #f9f9f9bb;

}
.services {
    display: flex;
    justify-content: space-around;
    align-items: center;
    font-size: 36px;
    padding: 20px;
  }

  .material-symbols-outlined {
    font-family: 'Material Symbols Outlined', sans-serif;
    color: blue; /* Set the color to blue */
  }

  .services span {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
  }



    </style>
</head>
<body>
 <div class="navbar">
    <a href="#"><img style="width: 100px;  margin-top:0px; border-radius:100px;"  src="/SlRail/public/assets/logo.jpg" > </a>
    <a href="#">Home</a>
    <a href="#">Gallery</a>
    <a href="#">Services</a>
    <a href="#">History</a>

    <li  style="float:right"><a class="active" href="/SlRail/passenger/register">Register</a></li>
    <li  style="float:right"><a class="active" href="/SlRail/home/login">Login</a></li>
  </div>
  <div class="slideshow-container">
         <div class="mySlides fade" >
         <img src="/SlRail/public/assets/img9.jpeg.webp" style="width: 1400px; " >
          </div>
          
          <div class="mySlides fade">
            <img src="/SlRail/public/assets/img10.jpg"  >
          </div>
          
          <div class="mySlides fade">
            <img src="/SlRail/public/assets/img8.jpg" style="width: 1400px;" >
          </div>

  
</div>
<br>

          <div style="text-align:center">
            <span class="dot"></span> 
            <span class="dot"></span> 
            <span class="dot"></span> 
          </div>

  <h1 style="padding-left: 20px; font-size: 42px;">Gallery</h1>
    <div class="row">
      <div class="column">
        <img src="/SlRail/public/assets/img3.jpg"  >
      </div>
      <div class="column">
        <img src="/SlRail/public/assets/img4.jpg" >
      </div>
      <div class="column">
        <img src="/SlRail/public/assets/img2.jpg">
      </div>
    </div>
    <div class="row">
      <div class="column">
        <img src="/SlRail/public/assets/img1.jpg"  >
      </div>
      <div class="column">
        <img src="/SlRail/public/assets/img7.jpg" >
      </div>
      <div class="column">
        <img src="/SlRail/public/assets/img6.jpg">
      </div>
    </div>
<!-- Add the following HTML code for the Services section -->
<h1 style="padding-left: 20px; font-size: 42px;">Services</h1>
<div class="services">
  <div class="service-item">
    <span class="material-symbols-outlined" style="font-size: 60px; display: block;">book_online</span>
    <p>Book Train Tickets</p>
  </div>
  <div class="service-item">
    <span class="material-symbols-outlined" style="font-size: 60px;">calendar_month</span>
    <p>Check Train Schedule</p>
  </div>
</div>
<div class="services">
  <div class="service-item">
    <span class="material-symbols-outlined" style="font-size: 60px;">location_on</span>
    <p>Track Live Locations</p>
  </div>
  <div class="service-item">
    <span class="material-symbols-outlined" style="font-size: 60px;">info</span>
    <p>Get Accurate Train Delay Information</p>
  </div>
</div>

    <h1 style="padding-left: 20px; font-size: 42px;">History</h1>
    <p>Rail was introduced in Sri Lanka in 1864 to transport coffee from plantations in the hill country district of Kandy to the port city of Colombo on its way to Europe and the world market.
       The coffee blight of 1871 destroyed many a fine plantation and tea replaced coffee. With the development of tea plantations in the 1880s, the joint-stock companies swallowed up the former 
       individual proprietorship of the coffee era. Under corporate ownership and management control by companies, the process of production of tea became more sophisticated and needed more and
        more railways built to the Kandyan highlands. To send tea to Colombo and to transport labour, machinery, manure, rice, and foodstuff, etc to Kandy, another 100 miles of railways were
        constructed in the tea planting districts to serve the expanding tea domain.
    </p>

    <div class="subfooter">
        <div class="subfooter-container">
            <h5>&copy; 2023 SL Rail. All rights reserved.</h5>
        </div>
    </div>

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
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>



</body>
</html>




