
    <?php

    session_start();
    //Include libraries
    require __DIR__ . '/vendor/autoload.php';

    //Create instance of MongoDB client
    $mongoClient = (new MongoDB\Client);
    $db = $mongoClient->perfumefest;
    $cart_collection = $db->cart;
    $orders_collection = $db->orders;
    // checking if a customer session is active
    if (array_key_exists("customer", $_SESSION)) {
        $customer_id =  $_SESSION["customerID"];

        $findCriteria = [
            "cust_id" => $customer_id,
        ];

        // quering all order's in orders collection that have same custmomer id
        $customerOrders = $orders_collection->find($findCriteria);

        echo ' <div id="orders-container">';
        echo ' <h1>Order History...</h1>';
        foreach ($customerOrders as $item) {
            // storing details of all products with same customer id
            $order_name = $item['Name'];
            $order_Price = $item['Price'];
            $order_Size = $item['Size'];
            $order_Img = $item['Img_url'];
            $order_id = $item['_id'];

            echo ' <div id="orderDetails">';
            echo ' <div>Order No <p id="orderNo">' . $order_id . '</p></div>';
            echo ' <div>Name <p id="orderName">' . $order_name . '</p></div>';
            echo ' <div>Price <p id="orderPrice">' . $order_Price . '</p></div>';
            echo ' </div>';
        }
        echo '<button onclick="returnToAccount()">Return</button>';
        echo ' </div>';
    }
