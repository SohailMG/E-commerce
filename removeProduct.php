<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->www;

//Extract ID from POST data
$item_id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

//Build PHP array with delete criteria 
$deleteCriteria = [
    "_id" => new MongoDB\BSON\ObjectID($item_id)
];
$deleteRes = $db->Products->deleteOne($deleteCriteria);
    
if($deleteRes->getDeletedCount() == 1){
    echo 'Item: '. $item_id .' has been deleted successfully.';
}
else{
   echo 'Error deleting item';
}