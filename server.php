
<?php

        require __DIR__ . '/vendor/autoload.php';

        // creating instance of mongodb client
        $client = (new MongoDB\Client);

        // selecting database
        $database = $client->www;

        // selecting collection
        $collection = $database->Products;

        $data  = "<table style='border:1px solid red;";
        $data .= "border-collapse:collapse' border='1px'>";
        $data .= "<thead>";
        $data .= "<tr>";
        $data .= "<th>Name</th>";
        $data .= "<th>Age</th>";
        $data .= "<th>Course</th>";
        $data .= "<th>Marks</th>";
        $data .= "</tr>";
        $data .= "</thead>";
        $data .= "<tbody>";




        $cursor = $collection->find();
        echo $cursor;

