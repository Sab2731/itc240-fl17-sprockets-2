<?php
/**
 * simple.php is a postback application designed to provide a 
 * contact form for users to email our clients.  
 * 
 * simple.php provides a typical feedback form for a website
 *
 * @package nmCAPTCHA2
 * @author Bill & Sara Newman <williamnewman@gmail.com>
 * @version 1.01 2015/11/17
 * @link http://www.newmanix.com/
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see contact_include.php 
 * @see recaptchalib.php
 * @see util.js 
 * @todo none
 */

#EDIT THE FOLLOWING:
$toAddress = "william.chen@seattlecolleges.edu";  //place your/your client's email address here
$toName = "Willaim Chen"; //place your client's name here
$website = "ItC 240 !!!!!!!!!!!!!!";  //place NAME of your client's website here
#--------------END CONFIG AREA ------------------------#
$sendEmail = TRUE; //if true, will send an email, otherwise just show user data.
$dateFeedback = true; //if true will show date/time with reCAPTCHA error - style a div with class of dateFeedback
include_once 'config.php'; #site keys go inside your config.php file
include 'contact-lib/contact_include.php'; #complex unsightly code moved here
$response = null;
$reCaptcha = new ReCaptcha($secretKey);
if (isset($_POST["g-recaptcha-response"]))
{// if submitted check response
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
if ($response != null && $response->success)
    {#reCAPTCHA agrees data is valid (PROCESS FORM & SEND EMAIL)
        handle_POST($skipFields,$sendEmail,$toName,$fromAddress,$toAddress,$website,$fromDomain);             #Here we can enter the data sent into a database in a later version of this file
    ?>
    <!-- START HTML FEEDBACK -->
    <div class="contact-feedback">
        <hr class="divider">
        <h3 class="text-center text-lg text-uppercase my-0">Message  
          <strong>Sent</strong>
        </h3>
        <hr class="divider">
        
    <h4>YOUR EMAIL IS SUCCESFFULY SENT </h4>
    <p>We\'ll get back to you with in 24 hours </p>
    <p><a href=""> Exit</a></p>
    </div>    
    <!-- END HTML FEEDBACK -->        
    <?php
}else{#show form, either for first time, or if data not valid per reCAPTCHA 
    if($response != null && !$response->success)
    {
        $feedback = dateFeedback($dateFeedback);
        send_POSTtoJS($skipFields); #function for sending POST data to JS array to reload form elements
    }//end failure feedback
 
?>
	<!-- START HTML FORM -->


<hr class="divider">
        <h2 class="text-center text-lg text-uppercase my-0">Contact  
          <strong>FORM</strong>
        </h2>
        <hr class="divider">
        <form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="post">
          <div class="row">
            <div class="form-group col-lg-6">
              <label class="text-heading">Name</label>
              <input type="text" name="FirstName" autofocus required class="form-control" autofocus>
            </div>
            <div class="form-group col-lg-6">
              <label class="text-heading">Email Address</label>
              <input type="email" name="Email" required class="form-control">
            </div>            
            <div class="clearfix"></div>
            <div class="form-group col-lg-12">
              <label class="text-heading">Comments</label>
              <textarea class="form-control" name="Comments" rows="6"></textarea>
            </div>
              
              <div><?=$feedback?></div>
           <div class="g-recaptcha" data-sitekey="<?=$siteKey;?>"></div> 
	
              
              
              
              
            <div class="form-group col-lg-12">
              <button type="submit" class="btn btn-secondary">Submit</button>
            </div>
          </div>
          
        </form>

	<!-- END HTML FORM -->
    <script type="text/javascript"
        src="https://www.google.com/recaptcha/api.js?hl=en">
    </script>
<?php
}
?>