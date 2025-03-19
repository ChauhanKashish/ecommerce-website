<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Div Box Layout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/style-card.css">

<!-- custom js file link  -->

<link rel="stylesheet" href="css/header.css">
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-regular-rounded/css/uicons-regular-rounded.css'>	


    <style>
        .body1 {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #e9f7ef; /* Light green background */
            font-family: Arial, sans-serif;
        }
        .container {
            width: 900px;
            height: 300px;
            display: flex;
            border: 1px solid #a3d9a5; /* Border color */
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff; /* White background for the box */
        }
        .part {
            flex: 1;
            padding: 15px;
            box-sizing: border-box;
            position: relative;
        }
        .upload {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }
        .upload button {
            margin-top: 10px;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            background-color: #6fbf7f; /* Button color */
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .upload button:hover {
            background-color: #5a9e67; /* Darker shade on hover */
        }
        h4 {
            margin: 0 0 10px;
            color: #4a7c4a; /* Heading color */
        }
        ul {
            list-style-type: disc;
            padding-left: 20px;
            margin: 0;
            color: #555; /* Text color */
        }
    </style>
</head>
<?php include'components/header-user.php'?>
<body>
<?php
 if(isset($_SESSION['logged_in'])&& $_SESSION['logged_in']=true)
    {
      // echo"<h1 style='text-align:center;margin-top:200px;'>HEllo-$_SESSION[user_id]</h1>";
     
    }
    else
    {
    echo"
    <script>
            alert('Plz login');
            window.location.href = 'medicine.php';
        </script>";
    }
 ?> 
<form method="POST" enctype="multipart/form-data">
    <span class="body1">
<div class="container">
    <div class="part upload">
        <label for="imageUpload">Upload Image:</label>
        <input type="file" id="imageUpload" accept="image/*" name='pro_img'>
        <button type="submit" name='pre'>Upload</button>
    </div>
    </form>
    <div class="part">
        <h4>How to Upload</h4>
        <ul>
            <li>User logs in to their account on the platform.</li>
            <li>User clicks on the "Choose File" button.</li>
            <li>User clicks the "Upload" or "Submit" button</li>
        </ul>
    </div>
    <div class="part">
        <h4>After Upload</h4>
        <ul>
            <li>Healthcare professional reviews the uploaded prescription for accuracy and completeness.</li>
            <li>Contact the patient to schedule a Email within 24 hours of the prescription upload.</li>
            <li>Remind the patient that they can reach out for further questions or concerns at any time.</li>
        </ul>
    </div>
</div>
    </span>



<?php
include'connection.php';
if(isset($_POST['pre'])){
    $pid=mt_rand(11111,99999);
$file_name=$_FILES['pro_img']['name'];
$temp_name=$_FILES['pro_img']['tmp_name'];
$destination='pro-img/uploades/'.$file_name;
move_uploaded_file($temp_name,$destination);
$sql="INSERT INTO prescription( `pid`, `user_id`, `image`)VALUES('$pid','$_SESSION[user_id]','$destination')";
   $check=mysqli_query($conn,$sql);
   if($check){
       ?>
       <script>
           alert('Your Document uploadead successfully we will reach out in 24Hr in email');
           window.location.href="medicine.php";
       </script>
    
<?php 
}}
?>


</body>
</html>
