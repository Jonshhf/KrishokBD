<?php

include "../connection.php";

$ProductId = $_POST["ProductId"];

$sql = "SELECT * FROM products where id=$ProductId";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $product_id=$row["id"];
    $product_name=$row["name"];
    $product_image_url="Admin/API/".$row["image_url"];
  }
}


date_default_timezone_set('Asia/Dhaka');
$date = date('d/m/Y', time());

?>

<style>
        body {
            background-color: #f0f2f5;
        }
        .container1 {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        .district-btn {
            width: 100%;
            margin-bottom: 10px;
            transition: all 0.3s;
            background-image: linear-gradient(45deg, #ff9a9e, #fad0c4, #fad0c4);
            border: none;
            color: black;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
            border-radius: 20px;
            padding: 15px;
            font-size: 16px !important;
            font-weight: bold;
        }
        .district-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            background-image: linear-gradient(90deg, #fbc2eb, #a6c1ee);
        }
        .product-table {
            display: none;
            margin-top: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            padding: 20px;
        }
        .table-responsive {
            max-height: 400px;
            overflow-y: auto;
        }
        .table th {
            position: sticky;
            top: 0;
            background-color: #f8f9fa;
            z-index: 1;
        }
        .price-change {
            font-weight: bold;
        }
        .price-up {
            color: #28a745;
        }
        .price-down {
            color: #dc3545;
        }
        .product-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
            transition: transform 0.3s;
        }
        .product-image:hover {
            transform: scale(1.2);
        }
        .highlight {
            background-color: #fffacd;
        }
        #weather-info {
            margin-top: 20px;
            padding: 15px;
            background-color: #e9ecef;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        @media (max-width: 768px) {
            .district-btn {
                font-size: 14px !important;
                padding: 10px;
            }
            .container {
                padding: 15px;
            }
        }
    </style>

<section id="categories" class="py-5">
            <div class="container-fluid">
                <center><h2 class="text-center section-title mb-4"> <?php echo $product_name; ?> এর প্রকারভেদ </h2><center>
                <div class="row justify-content-center">
                <?php
                
                $conn->set_charset("utf8mb4");
                
                $sql = "SELECT * FROM products_type where product_id=$product_id order by order_no asc";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {

                    $product_type_id=$row["id"];
                    $name=$row["name"];
                    $name = mb_convert_encoding($name, 'UTF-8', 'auto');

                   /* echo '<div class="col-6 col-md-3 mb-3"  onclick="GetDivisions('. $product_id.','.$product_type_id.')">
                        <button class="btn district-btn">'.$name.'</button>
                    </div>';  */

                    //$image_url="Admin/API/".$row["image_url"];
                    if (strpos($row["image_url"], 'uploads') === false) {
                        $row["image_url"] = 'uploads/' . $row["image_url"];
                    }
                
                      $image_url="Admin/imageUpload/".$row["image_url"];

                echo '<div class="col-2 col-responsive"  onclick="GetDivisions('. $product_id.','.$product_type_id.')">
                    <div class="feature-card">
                        <img src="'.$image_url.'" alt="No Image" class="card-img card-height">
                        <h4 class="mt-2"> '.$name.' </h4>
                    </div>
                </div>';

                  }
                }
                   ?>
                   </div>
            </div>
        </section>
      
 