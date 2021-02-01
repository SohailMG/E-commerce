<?php
include_once('commonPHP/headerNav.php');
outputHTMLtags();
outputHeaderNav("CMS");


//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->www;

// creating a cursor of all product's data
$cursor = $db->Products->find();
?>
<!-- website window resolution 1278 x 1940.58 -->
<main>
    <div class="cms-login">
        <h1>Admin Login</h1>
        Username: <input type="text" id="admin-username">
        Password : <input type="text" id="admin-password">
        <a href="#">Forget Password?</a>
        <button id="login-btn">Login</button>
    </div>

    <div class="cms-wrapper">
        <div class="cms-container">
            <div class="side-menu">
                <div id="">Menu</div>
                <button id="add-btn">Add Product</button>
                <button id="remove-btn">Remove Order</button>
                <button id="update-btn">Update Product details</button>
                <button id="view-btn">View Products</button>
            </div>
            <div class="task-container">
                <div id="add-form">
                    <h1>Product Details</h1>
                    Name: <input type="text">
                    Price: <input type="text">
                    Quantity: <input type="text">
                    Size: <input type="text">
                    <button id="addProduct">Add</button>
                </div>
                <table id="table">
                    <caption>Products Database</caption>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Size</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($cursor as $product) {

                           echo' <tr>';
                           echo' <td>'.$product['_id'].'</td>';
                           echo' <td>'.$product['Name'].'</td>';
                           echo' <td>£'.$product['Price'].'</td>';
                           echo' <td>'.$product['size'].'</td>';
                           echo' <td>'.$product['Quantity'].'</td>';
                           echo' </tr>';
                        }
                     ?>
                    </tbody>
                </table>
                <!-- remove product form -->
                <div id="remove-form">
                <h1>Remove Order</h1>
                Order ID: <input type="text" placeholder="0pwis8ue82js9dg33ldis">
                <button id="remove-product">remove</button>
                </div>
                <!-- update product form -->
                <div id="update-form">
                <h1>Update Product</h1>
                ID: <input type="text" placeholder="0pwis8ue82js9dg33ldis">
                <button id="view-product">View</button>
                Name: <input type="text">
                Price: <input type="text"placeholder="33.30">
                Stock: <input type="text" placeholder="10">
                Size: <input type="text" placeholder="50ml">
                <button id="update-product">Change</button>
                </div>
            </div>


        </div>
    </div>
</main>






<?php
outputFooter();
?>