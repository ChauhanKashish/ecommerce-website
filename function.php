<?php
// session_start();
error_reporting(0);
include'db/connection.php';
if(isset($_POST['add_catacories'])){
     $cat_id=mt_rand(11111,99999);
     $cat_name=$_POST['cat_name'];
     $meta_title=$_POST['meta_title'];
     $Meta_key=$_POST['Meta_key'];
     $Meta_desc=$_POST['Meta_desc'];
     $added_on=date('d M, Y');
    $slug_url=slugurl($cat_name);
    $sql="INSERT INTO mg_catagories(cat_id,cat_name,meta_title,meta_key,meta_desc,slug_url,status,added_on)VALUES('$cat_id','$cat_name','$meta_title','$Meta_key','$Meta_desc','$slug_url','1','$added_on')";
    $check=mysqli_query($conn,$sql);
    if($check){
        ?>
        <script>
            alert('Inserted Successfully');
            window.location.href="view-catagories.php";
        </script>
        <?php
    }
   }
   
            function get_catagories(){
                include'db/connection.php';
                $sql="SELECT * from mg_catagories order by id desc";
                $check=mysqli_query($conn,$sql);
                
                $sno=1;
                
               while($result=mysqli_fetch_assoc($check)){
               echo $output=" <tr>
                <td>".$sno++."</td>
                <td>".$result['cat_id']."</td>
                <td>".$result['cat_name']."</td>
                <td>".$result['slug_url']."</td>
                <td>".$result['status']."</td>
                <td>".$result['added_on']."</td>
            <td><a href='delete.php?cid=$result[cat_id]'><button type='submit' style='backgorund-color:red;color:black;border-radious:20px;'>Delete</button></a></td>

                </tr>";
                
               }
            
            }
            
            
            
         
            if(isset($_POST['add-sub-catacories'])){
                 $cat_id=mt_rand(11111,99999);
                 $cat_name=$_POST['cat_name'];
                 $meta_title=$_POST['meta_title'];
                 $Meta_key=$_POST['Meta_key'];
                 $Meta_desc=$_POST['Meta_desc'];
                 $added_on=date('d M, Y');
                 $parent_id=$_POST['parent_id'];
                $slug_url=slugurl($cat_name);
                $sql="INSERT INTO mg_sub_catagories(cat_id,parent_id,cat_name,meta_title,meta_key,meta_desc,slug_url,status,added_on)VALUES('$cat_id','$parent_id','$cat_name','$meta_title','$Meta_key','$Meta_desc','$slug_url','1','$added_on')";
                $check=mysqli_query($conn,$sql);
                if($check){
                    ?>
                    <script>
                        alert('Inserted Successfully');
                        window.location.href="view-sub-catagories.php";
                    </script>
                    <?php
                }
               }
            
               function get_sub_catagories(){
                include'db/connection.php';
                $sql="SELECT * from mg_sub_catagories order by id desc";
                $check=mysqli_query($conn,$sql);
                
                $sno=1;
                
               while($result=mysqli_fetch_assoc($check)){
                $sql2="SELECT cat_name from mg_catagories where cat_id=$result[parent_id]";
                $check2=mysqli_query($conn,$sql2);
               $parent=mysqli_fetch_assoc($check2);
               echo $output=" <tr>
                <td>".$sno++."</td>
                <td>".$result['cat_id']."</td>
                <td>".ucwords($result['cat_name'])."</td>
                <td>".ucwords($parent['cat_name'])."</td>
                <td>".$result['slug_url']."</td>
                <td>".$result['status']."</td>
                <td>".$result['added_on']."</td>
                <td><a href='delete.php?csid=$result[cat_id]'><button type='submit' style='backgorund-color:red;color:black;border-radious:20px;'>Delete</button></a></td>

                </tr>";
                
               }
            
            }
            

if(isset($_POST['cat_id']))
{
   
    $sql="SELECT * from mg_sub_catagories  where parent_id=$_POST[cat_id]";
    $check=mysqli_query($conn,$sql);
    echo "<option value=''>--select--</option>";
    while($result=mysqli_fetch_assoc($check)){
        
        echo "
        <option value='$result[cat_id]'>".$result['cat_name']."</option>";
    }
}


if(isset($_POST['add_product'])){
    $pro_name=$_POST['pro_name'];
    $pro_id=mt_rand(11111,99999);
    $pro_cat=$_POST['parent_id'];
    $pro_sub_cat=$_POST['sub_id'];
    $pro_desc=$_POST['pro_desc'];
    $stock=$_POST['stock'];
    $mrp=$_POST['mrp'];
    $sell_price=$_POST['sell_price'];
    $file_name=$_FILES['pro_img']['name'];
    $temp_name=$_FILES['pro_img']['tmp_name'];
    $destination='pro-img/uploades/'.$file_name;
    $destination2='C:/xampp/htdocs/mg/user/image'.$file_name;
    move_uploaded_file($temp_name,$destination);
    $meta_title=$_POST['meta_title'];
    $Meta_key=$_POST['Meta_key'];
    $Meta_desc=$_POST['Meta_desc'];
    $status=$_POST['status'];
    $added_on=date('d M, Y');
   // print_r($_POST);
    
    // $parent_id=$_POST['parent_id'];
   $slug_url=slugurl($_POST['pro_name']);
   $sql="INSERT INTO mg_products(pro_id,pro_name,pro_cat,pro_sub_cat,pro_desc,stock,mrp,selling_price,pro_img,meta_title,meta_desc,meta_key,status,slug_url,added_on)VALUES('$pro_id','$pro_name','$pro_cat','$pro_sub_cat','$pro_desc','$stock','$mrp','$sell_price','$destination','$meta_title','$Meta_key','$Meta_desc','$status','$slug_url','$added_on')";
   $check=mysqli_query($conn,$sql);
   if($check){
       ?>
       <script>
           alert('Inserted Successfully');
           window.location.href="view-product.php";
       </script>
    
      
       
       
      <?php } }
   
  

  function get_product(){
    include'db/connection.php';
    $sql="SELECT * from mg_products order by id desc";
    $check=mysqli_query($conn,$sql);
    
    $sno=1;
    
   while($result=mysqli_fetch_assoc($check)){
    $sql2="SELECT cat_name from mg_catagories where cat_id=$result[pro_cat]";
    $check2=mysqli_query($conn,$sql2);
   $parent=mysqli_fetch_assoc($check2);
   $sql3="SELECT cat_name from mg_sub_catagories where cat_id=$result[pro_sub_cat]";
    $check3=mysqli_query($conn,$sql3);
   $sub=mysqli_fetch_assoc($check3);
   echo $output=" <tr>
    <td>".$sno++."</td>
    <td>".$result['pro_id']."</td>
    <td>".$result['pro_name']."</td>
    <td>"."<img src='$result[pro_img]' width='60px' hight='60px' >"."</td>
    <td>".$result['pro_desc']."</td>
    <td>".$result['mrp']."</td>
    <td>".$result['stock']."</td>
    <td>".$result['status']."</td>
     <td>".ucwords($parent['cat_name'])."</td>
     <td>".ucwords($sub['cat_name'])."</td>
    <td><a href='delete.php?pid=$result[pro_id]'><button type='submit' style='backgorund-color:red;color:black;border-radious:20px;'>Delete</button></a></td>

    
    
    </tr>";
    
   }

}
     function slugurl($string){
            //$slug=trim($string);
            $slug=preg_replace('/[^a-zA-Z0-9]/',' ',$string);
            $slug=str_replace(' ','-',$slug);
            $slug=strtolower($slug);
            return $slug;
    }


    function get_product_user(){
        include'connection.php';
        $sql='SELECT * from mg_products order by id desc';
        $check=mysqli_query($conn,$sql);
        
        $sno=1;
        
       while($result=mysqli_fetch_assoc($check)){
   
       echo $output=" 
       
        
        <div class='product' data-name='$result[pro_id]'>
             <img src='$result[pro_img]'  >
             <h1>$result[pro_name]</h1>
             <div class='price'><h3>PRICE $result[selling_price]</h3></div>
          </div>
       
        ";
        
       }
    
    }
        
    function get_product_user2(){
        include'connection.php';
        $sql='SELECT * from mg_products order by id desc';
        $check=mysqli_query($conn,$sql);
        
        $sno=1;
        
       while($result=mysqli_fetch_assoc($check)){
   
       echo $output=" 
       <div class='cart'>
        <form action='add-cart.php' method='post'>
        <div class='preview' data-target='$result[pro_id]'>
      <i class='fas fa-times'></i>
      <img src='$result[pro_img]' alt=''>
      <h1>$result[pro_name]</h1>
     
      <p>$result[pro_desc]</p>
      <div class='price'><h3>PRICE $result[selling_price]</h3></div>

      <div class='buttons'>
                 
         <button type='submit' name='add_to_cart' class='cart' style=width:100%;>Add to Cart</button>
        
      </div>
   </div>
   
   <input type='hidden' name='pro_id' value='$result[pro_id]'>
   <input type='hidden' name='pro_img' value='$result[pro_img]'>
   <input type='hidden' name='pro_name' value='$result[pro_name]'>
   <input type='hidden' name='selling_price' value='$result[selling_price]'>
    <input type='hidden' name='qty' value=''>
    <div>
</form>
      
        ";
        
       }
    //    <div class='select'><h3>
    //    <select  id='qty' name='qty'>
    //    <option >qty</option>
    //    <option >1</option>
    //    <option >2</option>
    //    <option >3</option>
    //    </select>
       
    //    </h3></div>
    
    }
    
    function get_user(){
        include'db/connection.php';
        $sql="SELECT * from registered_user order by id desc";
        $check=mysqli_query($conn,$sql);
        
        $sno=1;
        
       while($result=mysqli_fetch_assoc($check)){
        
       echo $output=" <tr>
        <td>".$sno++."</td>
        <td>".$result['user_id']."</td>
        <td>".ucwords($result['full_name'])."</td>
        <td>".ucwords($result['username'])."</td>
        <td>".$result['email']."</td>
        <td>".$result['is_verified']."</td>
        <td><a href='delete.php?uid=$result[user_id]'><button type='submit' style='backgorund-color:red;color:black;border-radious:20px;'>Delete</button></a></td>
        </tr>";
        // <a href='delete.php?id=$result[id]'><input type='submit' value='Delete' class='delete'></a>
       }
    
    }


    function get_product_health(){
        include'connection.php';
        $sql='SELECT * from mg_products where pro_cat=11426';
        $check=mysqli_query($conn,$sql);
        
        $sno=1;
        
       while($result=mysqli_fetch_assoc($check)){
   
       echo $output=" 
       
        
        <div class='product' data-name='$result[pro_id]'>
             <img src='$result[pro_img]'  >
             <h1>$result[pro_name]</h1>
             <div class='price'><h3>PRICE $result[selling_price]</h3></div>
          </div>
       
        ";
        
       }
    }
    function get_product_health2(){
        include'connection.php';
        $sql='SELECT * from mg_products order by id desc';
        $check=mysqli_query($conn,$sql);
        
        $sno=1;
        
       while($result=mysqli_fetch_assoc($check)){
   
       echo $output=" 
       <div class='cart'>
        <form action='add-cart.php' method='post'>
        <div class='preview' data-target='$result[pro_id]'>
      <i class='fas fa-times'></i>
      <img src='$result[pro_img]' alt=''>
      <h1>$result[pro_name]</h1>
     
      <p>$result[pro_desc]</p>
      <div class='price'><h3>PRICE $result[selling_price]</h3></div>

      <div class='buttons'>
                 
         <button type='submit' name='add_to_cart' class='cart' style=width:100%;>Add to Cart</button>
        
      </div>
   </div>
   
   <input type='hidden' name='pro_id' value='$result[pro_id]'>
   <input type='hidden' name='pro_img' value='$result[pro_img]'>
   <input type='hidden' name='pro_name' value='$result[pro_name]'>
   <input type='hidden' name='selling_price' value='$result[selling_price]'>
    <input type='hidden' name='qty' value=''>
    <div>
</form>
      
        ";
        
       }
     }
    
    function get_product_medicine(){
        include'connection.php';
       
        $sql='SELECT * from mg_products where pro_cat=19441';
        $check=mysqli_query($conn,$sql);
        
        $sno=1;
        
       while($result=mysqli_fetch_assoc($check)){
   
       echo $output=" 
       
        
        <div class='product' data-name='$result[pro_id]'>
             <img src='$result[pro_img]'  >
             <h1>$result[pro_name]</h1>
             <div class='price'><h3>PRICE $result[selling_price]</h3></div>
          </div>
       
        ";
        
       }
    }
    function get_product_medicine2(){
        include'connection.php';
        $sql='SELECT * from mg_products order by id desc';
        $check=mysqli_query($conn,$sql);
        
        $sno=1;
        
       while($result=mysqli_fetch_assoc($check)){
   
       echo $output=" 
       <div class='cart'>
        <form action='add-cart.php' method='post'>
        <div class='preview' data-target='$result[pro_id]'>
      <i class='fas fa-times'></i>
      <img src='$result[pro_img]' alt=''>
      <h1>$result[pro_name]</h1>
     
      <p>$result[pro_desc]</p>
      <div class='price'><h3>PRICE $result[selling_price]</h3></div>

      <div class='buttons'>
                 
         <button type='submit' name='add_to_cart' class='cart' style=width:100%;>Add to Cart</button>
        
      </div>
   </div>
   
   <input type='hidden' name='pro_id' value='$result[pro_id]'>
   <input type='hidden' name='pro_img' value='$result[pro_img]'>
   <input type='hidden' name='pro_name' value='$result[pro_name]'>
   <input type='hidden' name='selling_price' value='$result[selling_price]'>
    <input type='hidden' name='qty' value=''>
    <div>
</form>
      
        ";
        
       }
     }
     function get_prisc() {
        include 'connection.php';
        
        
        $sql = "SELECT * FROM prescription ORDER BY id DESC";
        $check = mysqli_query($conn, $sql);
        
        $sno = 1;
    
        while ($result = mysqli_fetch_assoc($check)) {
            $sql1 = "SELECT * FROM registered_user WHERE user_id = '$result[user_id]'";
            $check1 = mysqli_query($conn, $sql1);
            $user = mysqli_fetch_assoc($check1); // Fixed from $check2 to $check1
            
            echo $output = "<tr>
                <td>" . $sno++ . "</td>
                <td>" . $result['pid'] . "</td>
                <td>" . $result['user_id'] . "</td>
                <td>" . ucwords($user['username']) . "</td>
                <td>" . "<img src='$result[image] ' width='100px' height='120px'>" . "</td>
                <td><a href='delete.php?peid=" . $result['pid'] . "'>
                    <button type='button' style='background-color:red;color:black;border-radius:20px;'>Delete</button>
                </a></td>
            </tr>";
        }
    }
    
                
?>