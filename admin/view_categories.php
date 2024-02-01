<h1 class="text-center text-success">All Categories</h1>
<table class="table table-bordered-mt-5">
    <thead class="bg-info">
        <th class="text-center">Category ID</th>
        <th class="text-center">Category Title</th>

    </thead>
    <tbody class="bg-secondary text-light">
        <?php 
            $get_categories= "select * from categories";
            $result=mysqli_query($con,$get_categories);
            while($row=mysqli_fetch_assoc($result)){
                $category_id=$row['category_id'];
                $category_title=$row['category_title'];

                echo "<tr class='text-center'>
                <td>$category_id</td>
                <td>$category_title</td>
                
            </tr>";
            }
        ?>
        
    </tbody>
</table>