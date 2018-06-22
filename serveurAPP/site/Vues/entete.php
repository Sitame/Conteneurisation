<!DOCTYPE html>
<html>
<title>Mon Agence</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<LINK rel=STYLESHEET href="styleVoyage.css" type="text/css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
.myLink {display: none}
.w3-theme-d3 {color:#000 !important; background-color:#e8c168 !important}
.mySlides {display: none}
</style>

<body class="w3-light-grey">
<div class="tete">
<!-- Navigation Bar -->
<div class="w3-bar w3-blue w3-border-bottom w3-xlarge">
 <a href="#" class="w3-bar-item w3-left w3-button w3-text-white w3-hover-blue"><b><i class=" fa fa-plane w3-margin-right"></i>Voy'in</b></a>  
 <a href="#" class="w3-bar-item w3-right w3-button w3-text-white w3-hover-blue"><b><i class="fa fa-date w3-margin-right"></i>
 <?php
 
  $date = date("d-m-Y");
 
Print(" $date  ");
?>  
 </b></a>  
</div>
 
 <!-- Automatic Slideshow Images -->
  <div class="mySlides w3-display-container w3-center ">
    <img src="Images/f.png" style="width:100%; height:10%;">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
        
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="Images/h.jpeg" style="width:100%;">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      
    </div>
  </div>
 <div class="mySlides w3-display-container w3-center">
    <img src="Images/a.png" style="width:100%;">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      
    </div>
  </div>





<script>
// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 30000);    
}

// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>




</div>
 
</body>
</html>