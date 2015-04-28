<!DOCTYPE html>
<html>
<head>
<link id = "pstyle" type="text/css" rel="stylesheet" href="homestyle.css"/>
<title>Music Zombie</title>
<link rel="icon" href="zombies.ico"/><!-- Only works when image is placed in same folder as html,
it creates a hotbar icon beside the title so not currently working as the zombie.ico is in the images folder-->
</head>
<body>
<header>
<!-- Main header and navigation bar with drop down menus -->
<nav>
<ul class = "menu">
<li>
<a href = "homepage.html"><img src = "zombie.png"/></a>
<a href = "homepage.html">Music Zombies</a>
</li>
<li>
<a href="#">Music</a><!-- Drop down menu title-->
<ul>
<!-- Drop down menu links -->
<li>
<a href = "#">CD's</a><!-- # is placeholder-->
</li>
<li>
<a href = "#">Digital</a><!-- # is placeholder-->
</li>
</ul>
</li>
<li>
<a href="#">Merchandise &nbsp; &nbsp; </a><!-- Drop down menu title-->
<ul>
<!-- Drop down menu links -->
<li>
<a href = "#">T-Shirts</a><!-- # is placeholder-->
</li>
<li>
<a href = "#">Cups</a><!-- # is placeholder-->
</li>
<li>
<a href = "#">Posters</a><!-- # is placeholder-->
</li>
</ul>
</li>
<li>
<a href="#">Sign Up</a>
</li>
</ul>
<br>
<form action="demo_form.asp">
  Hamza & Jeanette 5eva <input type="text" name="fname">
  <input type="submit" value="Submit">
</form> 
</nav>
</header>

<section id = "secondhead">
<nav>
<ul>
 
<!-- The searchbar, login button, basket button etc.. will go in here, this has no css yet -->
</ul>
</nav>
</section>
<div id="sidebar">
            <h1>Sidebar</h1>
			</div>



<div align ="center" id = "wrapper">
<br>
<br>
<br>
<section id = "main">
<script type="text/javascript">
var image1 = new Image()
image1.src = "S1dside.jpg"
var image2 = new Image()
image2.src = "S3.jpg"
var image3 = new Image()
image3.src = "s4.jpg"
var image4 = new Image()
image4.src = "s5.jpg"
var image5 = new Image()   <!--  SLIDESHOW!
image5.src = "s6.jpg"
var image6 = new Image()
image6.src = "s7.jpg"
var image7 = new Image()
image7.src = "s8.jpg"
</script>
</head>
<body>
<p><img src="images/pentagg.jpg" width="600" height="400" name="slide" /></p>
<script type="text/javascript">
        var step=1;
        function slideit()
        {
            document.images.slide.src = eval("image"+step+".src");
            if(step<6)
                step++;
            else
                step=1;
            setTimeout("slideit()",2500);
        }
        slideit();
</script>
<!-- Everything else goes in here somewhere, I have javascript to put in a slideshow of products when you are ready -->
</section>
</div>

<footer
<!-- Footer needs to have alot more -->
<p>&#169; Team A3</p>
<br>
<p> About Us </p>
<p> Contact info </p>
<p> T & C </p>
<p> Help </p>
</footer>
</body>
</html>