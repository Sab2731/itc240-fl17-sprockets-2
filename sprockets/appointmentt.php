<?php include 'includes/config.php' ?>
<?php include 'includes/header.php'?>


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
    //$Comments = clean_post('Comments');
    
    
    $myText= process_post();
    
    /*
    $myText = "The user has entered their information as follows:" . PHP_EOL . PHP_EOL; //double newlines 
    $myText .= $FirstName . " " . $LastName . PHP_EOL;
    $myText .= $Comments . PHP_EOL;
     */  
    
    $Subject = "ITC240 Contact From " . $FirstName . " " . $LastName . " " . date("m/d/y, G:i:s");
    $headers = 'From: williamprodesign.com' . PHP_EOL .
        'Reply-To: ' . $Email . PHP_EOL .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $myText, $headers);
    
    echo '
    <hr class="divider">
        <h3 class="text-center text-lg text-uppercase my-0">Your Form has been sent
          <strong>Sent</strong>
        </h3>
        <hr class="divider">
        

    <h3><strong>Thank you for contacting us </strong></h3>
    <p><a href=""> Exit</a></p>
    
    
    ';
    

    
}else{  //show form
    
    /*
    Radio buttons
    Appointment  type
    
    Intake
    Degree audit
    Registration
    
    Special Requests

    Checkbox
    Online meeting
    Early morning 
    Official transcript 

    Appointment Date
    
    
    */
    
    
    
    
    echo '
    <hr class="divider">
        <h2 class="text-center text-lg text-uppercase my-0">Appointment  
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
            
            <div class="form-group col-lg-4">
              <label class="text-heading">Appointment Type</label>
              <input type="radio" name="Appointment_Type" value="Intake" /> Intake <br />
              <input type="radio" name="Appointment_Type" value="Degree audit" /> Degree Audit <br />
              <input type="radio" name="Appointment_Type" value="Registration" /> Registation <br />
            </div>
            
            <div class="form-group col-lg-4">
              <label class="text-heading">Special Requests</label>
              <input type="checkbox" name="Special_Requests[]" value="Online Meeting" /> Online Meeting <br />
              <input type="checkbox" name="Special_Requests[]" value="Early Morning" /> Early Morning<br />
              <input type="checkbox" name="Special_Requests[]" value="Offical Transcript" /> Offical Transcript <br />
            </div>
            
            
            
            <div class="form-group col-lg-4">
              <label class="text-heading">Appointment Date/Time</label>
              <input type="date" name="Appointment_time" required class="form-control">
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

include 'includes/footer.php';

function clean_post($key){
    
    if(isset($_POST[$key])){
        return strip_tags(trim($_POST[$key]));
     }else{
        return '';
    }
 
}

function process_post()
{//loop through POST vars and return a single string
    $myReturn = ''; //set to initial empty value

    foreach($_POST as $varName=> $value)
    {#loop POST vars to create JS array on the current page - include email
         $strippedVarName = str_replace("_"," ",$varName);#remove underscores
        if(is_array($_POST[$varName]))
         {#checkboxes are arrays, and we need to collapse the array to comma separated string!
             $myReturn .= $strippedVarName . ": " . implode(",",$_POST[$varName]) . PHP_EOL;
         }else{//not an array, create line
             $myReturn .= $strippedVarName . ": " . $value . PHP_EOL;
         }
    }
    return $myReturn;
}

