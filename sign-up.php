         <?php
            //Include libraries
            require __DIR__ . '/vendor/autoload.php';
            //Create instance of MongoDB client
            $mongoClient = (new MongoDB\Client);
            $db = $mongoClient->perfumefest;
            $customerCollection = $db->Customers;

            // storing posted customer's JSON data
            $postedData  = $_POST['CustomerData'];
            // decoding json data to php format
            $CustomerData = json_decode($postedData, true);
            // inserting customer's data into customer's collection
            $insertResult = $customerCollection->insertOne($CustomerData);
            // extracting inserted id
            $cust_id = $insertResult->getInsertedId();
            // echoing back login screen once user is singe up
            $customer = $customerCollection->findOne(['_id' => new MongoDB\BSON\ObjectID($cust_id)]);
            if ($insertResult->getInsertedCount() == 1) {
                echo '<div id="switch-btns">';
                echo '<button id="show-signIn">Sign-In</button>';
                echo '<button id="show-signup">Sign-Up</button>';
                echo '</div>';
                echo '<h1 id="formtitle">Sign In</h1>';
                echo ' <div id="sign-in">';
                echo ' Email : <input type="text"    id="login-email">';
                echo ' Password : <input type="text" id="login-password">';
                echo ' <p id="error-msg"></p>';
                echo ' <button id="signinBtn" onclick="login_customer()">Login</button>';
                echo ' </div>';
            } else {
                echo 'failed to sign up';
            }