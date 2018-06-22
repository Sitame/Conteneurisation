<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<LINK rel=STYLESHEET href="styleVoyage.css" type="text/css">
<style>

.text
{
	position : absolute ;
	top :30%;
	left : 15%;
	width : 70%;
}
.sommes
{
	position : absolute;
	top :20%;
	left:10%;
    color:#2196F3;
	font-family : "Raleway", Arial, Helvetica, sans-serif;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: center;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 18px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}


.w3-theme-d3 {color:#000 !important; background-color:#e8c168 !important}
.aproposmenu
{
	position : relative;
	width:100%;
	left : 0%;
	height:15%;
	top : 50%;
	background-color:#FFFFFF;
	font-family : "Raleway", Arial, Helvetica, sans-serif;
	text-align : center;
}
</style>
<body>
<div class="aproposmenu">
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

      <a  href='http://localhost/projet%20ppe%20site/' class="w3-padding-large w3-theme-d3 w3-card-4 w3-button "  >Accueil <i ></i></a>     


  </div>
  <div class="sommes">
  <h3>Qui sommes nous ?</h3 <BR/>
  
  </div>
  
  <div class="text">
   Voyin est une jeune entreprise créé en 2008 mettant à votre disposition une <b>équipe d'expert</b> de voyage pour vous aider et accompagner à faire votre choix parmi un grand nombre de destinations circuit, de clubs répartis dans plusieurs pays ou au sein de notre large séléction d'hôtels à travers le monde. <BR/>
   <BR>
   Tout nos activités touristiques <b>préserve l’environnement</b>, le valorise sa qualité et se conforme à la réglementation en vigueur.
	<br></br>
   
   Voyin s'est engagée à développer lors de ses activités, une dimension écologique, éthique, à respecter scrupuleusement ses obligations tant sur le plan légal que déontologique, à atteindre des objectifs environnementaux vertueux nécessaires à des orientations sociales et sociétales durables.<BR></BR>
   
	En collaboration avec nos équipes locales, nous sélectionnons nos lieux de destination pour leur beauté ou leur intérêt mais aussi en veillant à la qualité des sols qui nous accueillent. Nous privilégions des zones où notre présence, même temporaire, ne laissera pas de trace indélébile.
   </br> </br>
   Pour plus d'informations contactez-nous : <a href='contact.php'>contact</a>
	
   
   
   
   
   </div>
  
</body>
</html>