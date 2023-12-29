<?php
require_once 'Toys.php';

function createToy($id, $name, $bestFor) {
    $toy = new Toys();
    $toy->toysId = $id;
    $toy->toysName = $name;
    $toy->bestFor = $bestFor;
    $toy->save();
}

createToy(1, 'Ball', 'Dogs');
createToy(2, 'Squeaky Toy', 'Cats');
createToy(3, 'Laser Pointer', 'Cats');
?>