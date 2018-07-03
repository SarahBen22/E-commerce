
<?php
require_once "layout.php"
?>

<?php
require_once "navbar.php"
?>



<form id="panier" action="../static/controllers/users.php" method="post" enctype="multipart/form-data">   <div>Surname :</div><input type="text" name="surname"></br> <div>Name    :</div><input type="text" name="name"></br> <div>Login   :</div><input type="text" name="login"></br> <div>Alias   :</div><input type="text" name="alias"></br> <div>Age     :</div><input type="text" name="age"></br> <div>Email   :</div><input type="text" name="mail"></br> <div>Password:</div><input type="password" name="pwd"></br> <div>Retapez votre Password:</div><input type="password" name="pwd2"></br> <div>Importez votre Avatar :</div><input type="file" name="avatar" /><br/>  <br><input type="submit" name="submit" value="Valider">    </form>


<div class="homecontainer">

  <div class="carousel">
    <img class="carouselimg" src="../img/lara.jpg" alt="Image 1" width= "616 px" height="353px" />
    <img class="carouselimg" src="../img/larac.png" alt="Image 2" width= "616 px" height="353px"/>
    <img class="carouselimg" src="../img/laracro.jpg" alt="Image 3" width= "616 px" height="353px"/>
    <img class="carouselimg" src="../img/lara.jpg" alt="Image 4" width= "616 px" height="353px"/>
    <img class="carouselimg carouselsec" src="../img/larac.png" alt="Image 5" width= "616 px" height="353px"/>
  </div>





  


 <div class="platformlink"> 
  
  <ul>  

  <div class="row">

   
    
  <li class="col-sm"> <dl> <dt><a href=""><img src="../img/ps4.jpg"  width= "150px"
  height= "150px"> </a> <dd> PS4</dd> </dl> </dt> </li>

  <li class="col-sm"> <dl> <dt><a href=""><img src="../img/xbox.jpg"  width= "150px"
  height= "150px"></a> <dd>  XBOX ONE</dd> </dl> </dt> </li>

  <li class="col-sm"> <dl> <dt><a href=""><img src="../img/pc.jpg"  width= "150px"
  height= "150px"></a> <dd> PC</dd> </dl> </dt> </li>


  <li class="col-sm"> <dl> <dt><a href=""><img src="../img/nintendo.jpg"  width= "150px"
  height= "150px"></a> <dd>  WII</dd> </dl> </dt> </li> 

 

</div>


  </ul>



 
</div>






</div>




<?php
require_once "footer.php";
?>


 
    

