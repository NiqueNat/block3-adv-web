<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//create the class name//
class Laptop
{

    public $state = 'on';
    public $battery= 'full';
    public $pluggedIn = 'no';


}

//Object//
$schoolbook = new Laptop();

echo $schoolbook->state . '<br>';

$pluggedIn = 'no'; 

if ($pluggedIn) 
echo 'Your laptop is plugged in!';


?>