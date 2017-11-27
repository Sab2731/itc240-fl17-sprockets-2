<?php include 'includes/config.php' ?>
<?php get_header()?>


<?php
    
    
    /*
    Quick to see who is it this going to ? 
    This to the client's email when its done 
    When it's done it's going to point to the clints 
    */
    
    $to = 'william.chen@seattlecolleges.edu';

if(isset($_POST["FirstName"]))
{//if data, show it
    
    $FirstName = clean_post('FirstName');
    $LastName = clean_post('LastName');
    $Email = clean_post('Email');
    $Comments = clean_post('Comments');
    
    
    $myText = "The user has entered their information as follows:" . PHP_EOL . PHP_EOL; //double newlines 
    $myText .= $FirstName . " " . $LastName . PHP_EOL;
    $myText .= $Comments . PHP_EOL;
       
    
    $Subject = "ITC240 Contact From " . $FirstName . " " . $LastName . " " . date("m/d/y, G:i:s");
    $headers = 'From: williamprodesign.com' . PHP_EOL .
        'Reply-To: ' . $Email . PHP_EOL .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $myText, $headers);
    
    echo '
    <hr class="divider">
        <h3 class="text-center text-lg text-uppercase my-0">Message  
          <strong>Sent</strong>
        </h3>
        <hr class="divider">
        
    <h4>YOUR EMAIL IS SUCCESFFULY SENT </h4>
    <p>We\'ll get back to you with in 24 hours </p>
    <p><a href=""> Exit</a></p>
    
    
    ';
    

    
}else{  //show form
    echo '
    <hr class="divider">
        <h2 class="text-center text-lg text-uppercase my-0">Contact  
          <strong>FORM</strong>
        </h2>
        <hr class="divider">
        <form action="" method="post">
          <div class="row">
            <div class="form-group col-lg-4">
              <label class="text-heading">First Name</label>
              <input type="text" name="FirstName" autofocus required class="form-control">
            </div>
            <div class="form-group col-lg-4">
              <label class="text-heading">Last Name</label>
              <input type="text" name="LastName" required class="form-control">
            </div>
            <div class="form-group col-lg-4">
              <label class="text-heading">Email Address</label>
              <input type="email" name="Email" required class="form-control">
            </div>            
            <div class="clearfix"></div>
            <div class="form-group col-lg-12">
              <label class="text-heading">Comments</label>
              <textarea class="form-control" name="Comments" rows="6"></textarea>
            </div>
            <div class="form-group col-lg-12">
              <button type="submit" class="btn btn-secondary">Submit</button>
            </div>
          </div>
          
        </form>
        <div class="g-recaptcha" data-sitekey="6LeDYDYUAAAAANoLB0pAE5rjxTVZmdPllJ-E-RfM"></div>
    ';
}    
    
?>
<?php 

get_footer();

function clean_post($key){
    
    if(isset($_POST[$key])){
        return strip_tags(trim($_POST[$key]));
     }else{
        return '';
    }
 
}



?>