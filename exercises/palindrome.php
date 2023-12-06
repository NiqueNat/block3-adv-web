<?php


$phaseToTest = "ada";

//two veriable to keep track of forwards and backwards//
$forwards = "";
$backwards = "";


//populate 2 vearibles- use loop
for($i = 0; $i < strlen($phaseToTest); $i++){
    //echo $phaseToTest[i];
    //$forwards. = $phaseToTest[$i];
    if($phaseToTest[$i] == " "){
        //echo"skip";
} else{
    $forwards .= $phaseToTest[i];
}
}
echo $forwards;

for($i = ($phaseToTest)-1; $i >= 0 ;$i--){
    if(!($phaseToTest[$i] == "" || $phaseToTest[0] == ".")){
        $backwards .= $phaseToTest[$i];

}
}
echo $backwards;

if ($forwards == $backwards) {
    echo "palindrome!";
}

//check for spaces
//ignor or skip
//then compare



?>