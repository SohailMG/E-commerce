
                <?php
                //Include libraries
                require __DIR__ . '/vendor/autoload.php';

                //Create instance of MongoDB client
                $mongoClient = (new MongoDB\Client);
                $db = $mongoClient->www;
                $Products = $db->Products;

                $postedData  = $_POST['newItemData'];



                $newProductData = json_decode($postedData, true);
                $insertResult = $Products->insertOne($newProductData);


                ?>