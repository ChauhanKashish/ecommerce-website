<?php
session_start();
//session_destroy();
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['add_to_cart']))
   {
     
        if(isset($_SESSION['cart']))
        {
            $my_items=array_column($_SESSION['cart'],'item_id');
            if(in_array($_POST['pro_id'],$my_items))
            {
               echo"     <script>
                    alert('Pro Already Added');
                    window.location.href='store.php';
                    </script>";
            }
            else{
            $count=count($_SESSION['cart']);
            $_SESSION['cart'][$count]=array('item_id'=>$_POST['pro_id'],'item_img'=>$_POST['pro_img'],'item_name'=>$_POST['pro_name'],'price'=>$_POST['selling_price'],'qty'=>1);
            echo"     <script>
            alert('Pro Added');
            window.location.href='store.php';
            </script>";
            }
        }
        else
        {
             $_SESSION['cart'][0]=array('item_id'=>$_POST['pro_id'],'item_img'=>$_POST['pro_img'],'item_name'=>$_POST['pro_name'],'price'=>$_POST['selling_price'],'qty'=>1);
            echo"     <script>
            alert('Pro Added');
            window.location.href='store.php';
            </script>";
        }
    }
    if(isset($_POST['remove_pro']))
    {
            foreach($_SESSION['cart'] as $key => $value)
            {
                if($value['item_id']==$_POST['pro_id'])
                {
                    unset($_SESSION['cart'][$key]);
                   $_SESSION['cart']=array_values($_SESSION['cart']);
                    echo"<script>
                    alert('Pro deleted');
                     window.location.href='cart.php';
                     </script>
                    ";
                }
               
            }
    }
    if(isset($_POST['mod_qty']))
    {
        foreach($_SESSION['cart'] as $key => $value)
            {
              if($value['item_id']==$_POST['pro_id'])
                { 
                    $_SESSION['cart'][$key]['qty']=$_POST['mod_qty'];
                //    print_r($_SESSION['cart']);
                    echo"<script>
                    
                     window.location.href='cart.php';
                     </script>
                    ";
                }
    }
}
}

    
?>