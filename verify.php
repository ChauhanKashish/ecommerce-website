<?php
require("connection.php");
if(isset($_GET['email'])&& isset($_GET['v_code']))
{
    $query="SELECT * FROM `registered_user` WHERE `email`='$_GET[email]'and `verification_code`='$_GET[v_code]'";
    $result=mysqli_query($conn,$query);
    if($result)
    {  
        if(mysqli_num_rows($result)==1)
        {
            $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['is_verified']==0)
            {
                $update="UPDATE `registered_user` SET `is_verified`='1' WHERE `email`='$result_fetch[email]'";
                if(mysqli_query($conn,$update))
                {
                    echo"
                    <script>
                     alert('Email Verification Successfully');
                     window.location.href='home.php';
                     </script>";
                }
                else
                {
                    echo"
                    <script>
                     alert('Cannot Run');
                     window.location.href='home.php';
                     </script>";
                }
            }
            else
            {
                echo"
                <script>
                 alert('Email already registered');
                 window.location.href='home.php';
                 </script>";
            }
        }  
    }
    else
    {
        echo"
        <script>
         alert('Cannot Run');
         window.location.href='home.php';
         </script>";
    }
}
?>