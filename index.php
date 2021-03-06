<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//Define a default route
$f3->route('GET /', function () {

    //Display a view
    $view = new Template();
    echo $view->render('views/home.html');
});

//Define a breakfast route
$f3->route('GET /breakfast', function () {

    //Display a view
    $view = new Template();
    echo $view->render('views/home2.html');
});

//Define a lunch route
$f3->route('GET /lunch', function () {

    //Display a view
    $view = new Template();
    echo $view->render('views/lunch.html');
});

//Define a breakfast route
$f3->route('GET /lunch/brunch/buffet', function () {

    //Display a view
    $view = new Template();
    echo $view->render('views/buffet.html');
});

//Define a route with a parameter
$f3->route('GET /@item', function($f3, $params) {

    $item = $params['item'];
   switch($item) {
       case 'spaghetti':
           echo"<h3>I like $item with meatballs.</h3>";
           break;
       case 'pizza':
           echo "<h3>Pepperoni or veggie?</h3>";
           break;
       case 'tacos':
           echo "<h3>We don't have $item</h3>";
           break;
       case 'bagel':
           $f3->reroute("/lunch/brunch/buffet");
       default:
           $f3->error(404);
   }
});


//Run Fat-Free
$f3->run();
