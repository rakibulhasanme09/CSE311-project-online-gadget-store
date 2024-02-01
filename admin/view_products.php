<h1 class="text-center text-success">All Products</h1>
<table class="table table-bordered-mt-5">
    <thead class="bg-info">
        <th class="text-center">Product ID</th>
        <th class="text-center">Product Title</th>
        <th class="text-center">Product Price</th>
        <th class="text-center">Total Sold</th>
        <th class="text-center">Status</th>

    </thead>
    <tbody class="bg-secondary text-light">
        <?php 
            $get_products= "select * from products";
            $result=mysqli_query($con,$get_products);
            while($row=mysqli_fetch_assoc($result)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_price=$row['product_price'];
                $status=$row['status'];

                echo "<tr class='text-center'>
                <td>$product_id</td>
                <td>$product_title</td>
                <td>$product_price</td>
                <td>0</td>
                <td>$status</td>
                
            </tr>";
            }
        ?>
        
    </tbody>
</table>