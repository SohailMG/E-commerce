
    <?php

    session_start();
    //Include libraries
    require __DIR__ . '/vendor/autoload.php';

    //Create instance of MongoDB client
    $mongoClient = (new MongoDB\Client);
    $db = $mongoClient->perfumefest;
    $cart_collection = $db->cart;
    $orders_collection = $db->orders;

    // extracting address details of customer
    $street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $postcode = filter_input(INPUT_POST, 'postcode', FILTER_SANITIZE_STRING);

    // checking if session is active and extracting customer's id 
    // of the currently logged customer
    if (array_key_exists("customer", $_SESSION)) {
        $customer_id =  $_SESSION["customerID"];

        $findCriteria = [
            "cust_id" => $customer_id,
        ];


        $customer_basket = $cart_collection->find($findCriteria);

        // echoing order confirmation content
        echo ' <div id="order-confirmation">';
        echo '<h1>Thank you for your purchase...</h1>';
        echo '<p><b>Delivery to: </b></p>';
        echo '<p>' . $street . ' <br> ' . $city . ' <br> ' . $postcode . ' </p>';
        // quering all customer's orders 
        foreach ($customer_basket as $item) {
            $order_name = $item['Name'];
            $order_Price = $item['Price'];
            $order_Size = $item['Size'];
            $order_Img = $item['Img_url'];
            $order_id = $item['Name'];

            $order = array(
                "Name" => $order_name,
                "Price" => $order_Price,
                "Size" => $order_Size,
                "Img_url" => $order_Img,
                "cust_id" => $customer_id,
                "street" => $street,
                "city" => $city,
                "postcode" => $postcode
            );


            // storing all cart items into order's collection with added fields
            $insertedResults =  $orders_collection->insertOne($order);
            $new_id = $insertedResults->getInsertedId();

            // echoing back all order's beloging to logged customer
            echo ' <div id="orderDetails">';
            echo ' <div>Order No <p id="orderNo">' . $new_id . '</p></div>';
            echo ' <div>Name <p id="orderName">' . $order_name . '</p></div>';
            echo ' <div>Price <p id="orderPrice">' . $order_Price . '</p></div>';
            echo ' </div>';
        }
        echo '<p id="ordersTotal"></p>';
        echo ' </div>';
    }
    // deleting cart collection documents after checkout is succesfull
    $deleteResult = $cart_collection->deleteMany(['status' => 'temp']);
