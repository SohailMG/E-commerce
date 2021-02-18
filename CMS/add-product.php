
            <?php
            //Include libraries
            require __DIR__ . '/vendor/autoload.php';
            //Create instance of MongoDB client
            $mongoClient = (new MongoDB\Client);
            $db = $mongoClient->perfumefest;
            $Products = $db->Products;
            // extracting json data of new item being added from server
            $postedData  = $_POST['newItemData'];
            // converting json data into php array format
            $newProductData = json_decode($postedData, true);
            // inserting new item into product collection
            $insertResult = $Products->insertOne($newProductData);

            // getting the id of the inserted item and eching a row of new item data
            $new_id = $insertResult->getInsertedId();
            $item = $Products->findOne(['_id' => new MongoDB\BSON\ObjectID($new_id)]);
            if ($insertResult->getInsertedCount() == 1) {
                echo ' <tr>';
                echo ' <td>' . $new_id . '</td>';
                echo ' <td>' . $item['Name'] . '</td>';
                echo ' <td>£' . $item['Price'] . '</td>';
                echo ' <td>' . $item['size'] . '</td>';
                echo ' <td>' . $item['Quantity'] . '</td>';
                echo ' </tr>';
            } else {
                echo 'failed';
            }
            ?>