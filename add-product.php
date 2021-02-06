
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
                $new_id = $insertResult->getInsertedId();

                $item = $Products->findOne(['_id' => new MongoDB\BSON\ObjectID($new_id)]);

                if($insertResult->getInsertedCount()==1){
                    echo '<div id="green-tick"><img src="./Images/green-tick.png" alt=""></div>';
                    echo '<h1>Item Added Successfully</h1>';
                    echo '<p id="new-item-id"><b>ID</b> : '.$new_id.' </p>';
                    echo '<p id="new-item-name"><b>Name</b> :'.$item['Name'].'</p>';
                    echo '<p id="new-item-price"><b>Price </b>:'.$item['Price'].'</p>';
                    echo '<p id="new-item-size"><b>Size</b> :'.$item['size'].'</p>';
                    echo '<p id="new-item-qty"><b>Stock</b> :'.$item['Quantity'].'</p>';
                }
                else {
                    echo 'failed';
                }


                ?>