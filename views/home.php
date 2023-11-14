
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $data['title']; ?></title>
    <link rel="stylesheet" type="text/css" href="/SlRail/public/css/home.css">
</head>
<body>
 <div class="navbar">
    <a href="#"><img width="100px"  src="/SlRail/public/assets/logo.jpg"> </a>
    <a href="#">Home</a>
    <a href="#">Gallery</a>
    <a href="#">History</a>
    <li  style="float:right"><a class="active" href="/SlRail/passenger/login">Login</a></li>
    <li  style="float:right"><a class="active" href="/SlRail/passenger/register">Register</a></li>
  </div>
  <div class="slideshow-container">
         <div class="mySlides fade" >
         <img src="/SlRail/public/assets/img9.jpeg.webp" style="width: 900px; " >
          </div>
          
          <div class="mySlides fade">
            <img src="/SlRail/public/assets/img10.jpg" style="width: 900px;" >
          </div>
          
          <div class="mySlides fade">
            <img src="/SlRail/public/assets/img7.jpg" style="width: 900px;" >
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
    <h1 style="padding-left: 20px; font-size: 42px;">History</h1>
    <p>Rail was introduced in Sri Lanka in 1864 to transport coffee from plantations in the hill country district of Kandy to the port city of Colombo on its way to Europe and the world market.
       The coffee blight of 1871 destroyed many a fine plantation and tea replaced coffee. With the development of tea plantations in the 1880s, the joint-stock companies swallowed up the former 
       individual proprietorship of the coffee era. Under corporate ownership and management control by companies, the process of production of tea became more sophisticated and needed more and
        more railways built to the Kandyan highlands. To send tea to Colombo and to transport labour, machinery, manure, rice, and foodstuff, etc to Kandy, another 100 miles of railways were
        constructed in the tea planting districts to serve the expanding tea domain.
    </p>
   

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




