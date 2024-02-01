<h1 class="text-center text-success">All Brands</h1>
<table class="table table-bordered-mt-5">
    <thead class="bg-info">
        <th class="text-center">Brand ID</th>
        <th class="text-center">Brand Title</th>

    </thead>
    <tbody class="bg-secondary text-light">
        <?php 
            $get_brands= "select * from brands";
            $result=mysqli_query($con,$get_brands);
            while($row=mysqli_fetch_assoc($result)){
                $brand_id=$row['brand_id'];
                $brand_title=$row['brand_title'];

                echo "<tr class='text-center'>
                <td>$brand_id</td>
                <td>$brand_title</td>
                
            </tr>";
            }
        ?>
        
    </tbody>
</table>