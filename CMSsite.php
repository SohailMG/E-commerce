<!-- CMS site includes - adding product - view and remove orders - update product - view products -->
<main>
    <!-- main CMS page content -->
    <div class="cms-wrapper">
        <div class="cms-container">
            <div class="side-menu">
                <div id="">Menu</div>
                <button id="add-btn" onclick="addProduct()">Add Product</button>
                <button id="remove-btn" onclick="removeProduct()">Remove Order</button>
                <button id="update-btn" onclick="updateProduct()">Update Product details</button>
                <button id="view-btn" onclick="viewProduct()">View Products</button>
            </div>
            <!-- main section of CMS page displays different forms -->
            <div class="task-container">
                <!-- database table displaying all product's table -->
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
                        //Include libraries
                        require __DIR__ . '/vendor/autoload.php';
                        $mongoClient = (new MongoDB\Client);
                        $db = $mongoClient->perfumefest;
                        $cursor = $db->Products->find();
                        // quering all products in database and displaying it into the page
                        foreach ($cursor as $product) {

                            echo ' <tr>';
                            echo ' <td>' . $product['_id'] . '</td>';
                            echo ' <td>' . $product['Name'] . '</td>';
                            echo ' <td>£' . $product['Price'] . '</td>';
                            echo ' <td>' . $product['size'] . '</td>';
                            echo ' <td>' . $product['Quantity'] . '</td>';
                            echo ' </tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <!-- table displaying all customers and their data -->
                <table id="customers-table">
                    <caption>Customers Database</caption>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- quering all customer collections's data -->
                        <?php
                        //Include libraries
                        require __DIR__ . '/vendor/autoload.php';
                        $mongoClient = (new MongoDB\Client);
                        $db = $mongoClient->perfumefest;
                        $cursor = $db->Customers->find();
                        // echoing customer data as a table
                        foreach ($cursor as $product) {

                            echo ' <tr>';
                            echo ' <td>' . $product['_id'] . '</td>';
                            echo ' <td>' . $product['firstname'] . '</td>';
                            echo ' <td>' . $product['email'] . '</td>';
                            echo ' </tr>';
                        }
                        ?>
                    </tbody>
                </table>


                <!-- add product form  -->
                <div id="add-form">
                    <h1>Product Details</h1>
                    Name: <input type="text" id="addform-Name">
                    Price: <input type="text" id="addform-Price">
                    Quantity: <input type="text" id="addform-Quantity">
                    Size: <input type="text" id="addform-Size" placeholder="e.g 50ml">
                    <!-- adding and uploading image form -->
                    Image URL: <input type="text" id="addform-Image" placeholder="Image Must be 200x200" disabled="true">
                    <input id="fileupload" type="file" name="fileupload" />
                    <button id="upload-button" onclick="uploadFile()"> Upload </button>
                    KeyWords: <input type="text" id="addform-keywords" placeholder="mens black cheap..etc">
                    <p id="errorMsg"></p>
                    <!-- button to add product info -->
                    <button id="addProduct" onclick="addNewProduct()">Add</button>
                </div>

                <!-- remove product form -->
                <div id="remove-form">
                    <h1>Remove Order</h1>
                    Customer ID: <input id="view-id" type="text">
                    <button id="remove-product" onclick="viewOrders()">View Orders</button>
                    Order ID: <input id="remove-id" type="text">
                    <button id="remove-product" onclick="remove_item()">Remove</button>
                    <button id="view-customers" onclick="viewCustomers()">View Customers</button>
                    <p id="removed-msg"></p>
                </div>
                <!-- update product form -->
                <div id="update-form">
                    <h1>Update Product</h1>
                    ID: <input id="update-id" type="text" onfocusout="showItemInfo()">
                    Name: <input id="update-name" type="text">
                    Price: <input id="update-price" type="text">
                    Stock: <input id="update-stock" type="text">
                    Size: <input id="update-size" type="text">
                    <button id="update-product" onclick="update_item()">Change</button>
                    <p id="update-msg"></p>
                </div>
            </div>
        </div>
    </div>
</main>