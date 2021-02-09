
                <?php
                //Include libraries
                require __DIR__ . '/vendor/autoload.php';

                //Create instance of MongoDB client
                $mongoClient = (new MongoDB\Client);
                $db = $mongoClient->www;
                $Products = $db->Customers;

                $postedData  = $_POST['CustomerData'];



                $CustomerData = json_decode($postedData, true);
                $insertResult = $Products->insertOne($CustomerData);
                $cust_id = $insertResult->getInsertedId();

                $customer = $Products->findOne(['_id' => new MongoDB\BSON\ObjectID($cust_id)]);

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
