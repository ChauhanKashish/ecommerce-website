<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>catageory</title>
    
  <style>
  body {
    /* font-family: Arial, sans-serif; */
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    text-decoration: none;
    width: 95%;
    margin: auto;
    padding: 20px;
    text-align: center;
}

h1 {
    margin-bottom: 10px;
    font-size: 2em;
}

.category-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 50px;
    justify-content: center;
}

.category-card {
    width: 150px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
}

.category-card:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.category-card img {
    width: 100%;
    height: 100px;
    object-fit: cover;
}

.category-info {
    text-decoration: none;
    padding: 10px;
}

.category-info h3 {
    text-decoration: none;
    margin: 0;
    font-size: 1.5em;
}

.category-info p {
    text-decoration: none;
    margin: 7px 0 0;
    color: #555;
}


  </style>
</head>
<body>


    <div class="container">
        <!-- <h1>Our Categories</h1> -->
        
        <div class="category-grid">
        <a href="medicine.php" >
            <div class="category-card">
                <img src="image/medicine.jpg" alt="Category 1">
                <div class="category-info">
                    <h3>Medicine</h3>
                    <!-- <p> </p> -->
                </div>
                </div>
            </a>
                <a href="health-care.php" >
            <div class="category-card">
                <img src="image/healthcare.jpg" alt="Category 2">
                <div class="category-info">
                    <h3>Healt care</h3>
                    <!-- <p> </p> -->
                </div>
            </div>
            </a>
            <a href="up-prisc.php" >
             <div class="category-card">
                <img src="image/labtest.jpg" alt="Category 3">
                <div class="category-info">
                    <h3>Prescription</h3>
                    
                </div> 
            </div>
                </a>
            <a href="blog.php" >
            <div class="category-card">
                <img src="image/healthblog.jpg" alt="Category 2">
                <div class="category-info">
                    <h3>Blog</h3>
                    <!-- <p> </p> -->
                </div>
            </a>
            </div>
            <a href="store.php" >
            <div class="category-card">
            
                <img src="image/store.jpg" alt="Category 2">
                <div class="category-info">
                
                    <h3>Store</h3>
                    <!-- <p> </p> -->
                </div>
               
            </div>
            </a>
           
            
            

            <!-- Add more category cards as needed -->
        </div>
    </div>





</body>
</html>