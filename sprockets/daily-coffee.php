<?php include 'includes/config.php' ?>


<?php
    
    // dailyphp code goes here 
    // use this before any date functions 
    

  if(isset($_GET['day']))
  {// show selected day
      
      $day =$_GET['day'];
  } else {// show current day
      
     $day = date('l');
  } 

  switch ($day){
        
    case 'Thursday':   
        $coffee= 'Caffé Latte'; 
        $pic= 'Caffé-Latte.jpg';
        $color = 'blue';
        $alt = 'Caffé-Latte.';
        $description = '
        which makes us wish it was always Fall, 
        as this is one of our top sellers!
        
        ';
        break;
        
    case 'Satursday':   
        $coffee= ' Cafe mocha'; 
    case 'Sunday':   
        $coffee= 'Cappuccino Coffee';
        $pic = 'cappuccino.jpg';
        $color = 'blue';
        $alt= 'Cappuccino Coffee';
        $description = 'Our Nariño 70 Cold Brew is handcrafted daily in small batches and slow-steeped in cool water for 20 hours' ;
        break;
        
     case 'Monday':   
        $coffee= 'Café Bombón';
        $pic = 'Café Bombón.jpg';
        $color = 'red';
        $alt= 'Café-Bombón.jpg';
        $description = 'Coffee is a brewed drink prepared from roasted coffee beans, which are the seeds of berries from the Coffea plant ';
        break;
        
    case 'Tuesday':   
        $coffee= 'Café Crema';
        $pic='Caffe-Crema.jpg';
        $color = 'black';
        $alt= 'Café Crema';
        $description = 'The earliest credible evidence of coffee-drinking appears in the middle of the 15th century in the Sufi shrines of Yemen , 
        
        why dont you give a try';
        break;
        
    case 'Wednsday':   
        $coffee= 'Caffé macchiato';
        $color = 'white';
        $pic='Caffé-macchiato.jpg';
        $alt= 'Caffé macchiato';
        $description = 'Transform beverages into specialty offerings and extend your menu with high quality Fontana';
        break;
          
          case 'Friday':   
        $coffee= 'Caffé macchiato';
        $color = 'white';
        $pic='Caffé-macchiato.jpg';
        $alt= 'Caffé macchiato';
        $description = 'Transform beverages into specialty offerings and extend your menu with high quality Fontana';
        break;
          
          case 'Satursday':   
        $coffee= 'Caffé macchiato';
        $color = 'white';
        $pic='Caffé-macchiato.jpg';
        $alt= 'Caffé macchiato';
        $description = 'Transform beverages into specialty offerings and extend your menu with high quality Fontana';
        break;
          
          
        
    default:
        $coffee= 'Drip';
        $pic='drip.jpg';
        $alt= 'drip';
        $description = ' drip coffee is still tates good. Buy one get one free today';
        break;
    
}
    


?>
<?php include 'includes/header.php'?>


<?=$day?>

<img src="images/<?=$pic?>"
<h3> Daily Coffee Speical :  </h3>
<p><?=$description?></p>
<p>The contends of day is currenty: <?=$day?></p>

<h3> Click other days to see what else special coffee we have!!  </h3>
<p><a href="?day=Monday" >Monday</a></p>
<p><a href="?day=Tuesday" >Tuesday</a></p>
<p><a href="?day=Wedsnday">Wedsnday</a></p>
<p><a href="?day=Thursday">Thursday</a></p>
<p><a href="?day=Friday">Friday</a></p>
<p><a href="?day=Satursday">Satursday</a></p>
<p><a href="?day=Sunday">Sunday</a></p>


    

<?php include 'includes/footer.php' ?>