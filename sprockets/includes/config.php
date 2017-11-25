<?php 
/*
config.php

stores configuration information for our web application

*/
//remove header already sent errors 
ob_start();

// use lower case JS is case senstives true /false
define('DEBUG',true); #we want to see all errors


include 'credentials.php'; // stores database info 
include 'common.php'; // stores favorite functions



// prevents date errors
date_default_timezone_set('America/Los_angeles');

// create config object 
$config = new stdClass;




//  default page repersent url page=='THIS_PAGE'
define('THIS_PAGE', basename ($_SERVER['PHP_SELF']));
//constant no $
//echo THIS_PAGE;

// $ means super globe 
//echo basename ($_SERVER['PHP_SELF']);
//die;


// Set website defaults        
$config->title = THIS_PAGE;    
$config->banner = 'Widgets';

switch(THIS_PAGE){

        
    case 'contact.php':
           $config->title = 'Contact Page';
               
        break;
        
        case 'index.php':
           $config->title = 'Welcome Home Page!!';
           
               
        break;
        case 'appointmentt.php':
           $config->title = 'Appointment Page';
           $config->banner = ' WsDs Sprockets';    
        break;
        
        case 'daily-coffee.php':
           $config->title = 'coffee pages ';
               
        break;
        
        
        
}




?> 