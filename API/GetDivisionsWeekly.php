<?php

include "../connection.php";

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

<div class="container1 mt-5">
        <h1 class="text-center mb-4"> বিভাগ নির্বাচন করুন
        </h1>
        <div class="row justify-content-center mb-4">
            <div class="col-md-8 btn-container">
                <div class="row">

                <?php
                
                $conn->set_charset("utf8mb4");
                
                $sql = "SELECT * FROM divisions order by id asc";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {

                    $divisionId=$row["id"];
                    $name=$row["bn_name"];
                    $name = mb_convert_encoding($name, 'UTF-8', 'auto');

                   echo '<div class="col-6 col-md-3 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="GetProductsWeekly('. $divisionId.')">
                        <button class="btn district-btn">'.$name.'</button>
                    </div>';

                  }
                }
                   ?>
                </div>
            </div>
        </div>
         
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
   