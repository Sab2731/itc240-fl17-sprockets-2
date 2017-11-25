<?php include 'includes/config.php' ?>

<?php
// dailyphp code  goes here 
    
  if(isset($_GET['day']))
  {// show selected day
      
      
  } else {// show current day
      
      $day= date('l');
  } 
    
?>


<?php include 'includes/header.php'?>

<h3> Daily Goods </h3>
<p>The contends of day is currenty: <?=$day?></p>
<p><a href="?day=Monday">Monday</a></p>
<p><a href="?day=Sunday">Sunday</a></p>
<p><a href="?day=Wednsday">Wednesday</a></p>
<p><a href="?day=Thursday">Thursday</a></p>

    

<?php include 'includes/footer.php' ?>