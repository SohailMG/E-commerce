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
            <div class="task-container">

                <!-- add product form  -->
                <div id="add-form">
                    <h1>Product Details</h1>
                    Name: <input type="text" id="addform-Name">
                    Price: <input type="text" id="addform-Price">
                    Quantity: <input type="text" id="addform-Quantity">
                    Size: <input type="text" id="addform-Size">
                    Image: <input type="text" id="addform-Image">
                    KeyWords: <input type="text" id="addform-keywords">
                    <button id="addProduct" onclick="addNewProduct()">Add</button>
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
                        //Include libraries
                        require __DIR__ . '/vendor/autoload.php';
                        $mongoClient = (new MongoDB\Client);
                        $db = $mongoClient->www;
                        $cursor = $db->Products->find();
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
                    Price: <input type="text" placeholder="33.30">
                    Stock: <input type="text" placeholder="10">
                    Size: <input type="text" placeholder="50ml">
                    <button id="update-product">Change</button>
                </div>
            </div>


        </div>
    </div>
</main>