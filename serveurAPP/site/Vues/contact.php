<!DOCTYPE html>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 

<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<LINK rel=STYLESHEET href="styleVoyage.css" type="text/css">
<style>

.sommes
{
	position : absolute;
	top :30%;
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
.text
{
	position : absolute;
	font-family : "Raleway", Arial, Helvetica, sans-serif;
	top :37%;
	left:10%;
	width:25%;
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
.engagmenu
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
<div class="engagmenu">
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

      <a  href='http://localhost/projet%20ppe%20site/' class="w3-padding-large w3-theme-d3 w3-card-4 w3-button "  >Acceuil <i ></i></a>     


  </div>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
	position:absolute;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
	width:75%;
	left:12%;
	top:20%;
}
.contact
{
	position:absolute;
	color:#2196F3;
	left:12%;
	top:13%;
}

</style>
</head>
<body>

<div class='contact'>
<h3>Contactez-nous</h3>
</div>
<div class="container">
 <form action="index.php?page=contact&actionautre=sauver" method="post">
    <label for="nom">Nom</label>
    <input type="text"  name="nomContact"required placeholder="prenom..">
	
    <label for="prenom">Prénom</label>
    <input type="text"  name="prenomContact" required placeholder="prenom..">
    <label for="mail">Votre Email</label>
    <input type="text"  name="mailContact"required placeholder="Email..">

    

    <label for="commentaire">Commentaire</label>
    <textarea  type="text" name="textContact" required placeholder="Ecrivez ici" style="height:200px"></textarea>

    <input type="submit" value="Envoyer" name="envoyer">
  </form>
</div>
        
  
</body>
</html>