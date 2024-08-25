<?php

include "../connection.php";

$divisionId=$_POST["divisionId"];
$productId=$_POST["productId"];
$productTypeId=$_POST["productTypeId"];
$ViewType=$_POST["ViewType"];

$sql = "SELECT * FROM divisions where id=$divisionId";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $division_name=$row["bn_name"];
  
  }
}

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
            display: block;
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

<div class="row">
            <div class="col-12">
                <div id="productTable" class="product-table mb-5">
                    <h2 id="districtTitle" class="text-center mb-3"></h2>
                    <div class="table-responsive">
                   <b> বিভাগ : <?php echo $division_name; ?> </b>
                   <br>

                   <?php if($ViewType=='Daily') { ?>

                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>জেলার নাম</th>
                                    <th>মূল্য (টাকা)</th>
                                    <th>পরিবর্তন</th>
                                </tr>
                            </thead>
                            <tbody id="productTableBody">
<?php
$date = date('Y-m-d');
$sql = "SELECT a.*,b.bn_name FROM district_wise_price a,districts b where a.district_id=b.id and  a.product_id=$productId and a.product_type_id =$productTypeId and a.division_id=$divisionId and a.date='$date'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $district_name=$row["bn_name"];
    $price=$row["price"];
    $change="+/- 5";

    echo "<tr>";
    echo "<td>".$district_name."</td>";
    echo "<td>".$price."</td>";
    echo "<td>".$change."</td>";
    echo "</tr>";

  }
}
    ?>

    <?php } else if($ViewType=='Weekly') { ?>


        <table class="table table-striped table-hover">
        <thead>
    <tr>
        <th>জেলার নাম</th>
        <?php
        // Generate date headers for the last 7 days
        for ($i = 0; $i < 7; $i++) {
            $date = date('Y-m-d', strtotime("-$i days"));
            echo "<th>$date</th>";
        }
        ?>
    </tr>
</thead>
<tbody id="productTableBody">
<?php
$sql = "SELECT a.*, b.bn_name FROM district_wise_price a
        JOIN districts b ON a.district_id = b.id
        WHERE a.product_id = $productId 
        AND a.product_type_id = $productTypeId 
        AND a.division_id = $divisionId 
        AND a.date BETWEEN CURDATE() - INTERVAL 6 DAY AND CURDATE()";

$result = $conn->query($sql);

$districtData = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $district_name = $row["bn_name"];
        $date = $row["date"];
        $price = $row["price"];
        
        // Group the data by district and date
        $districtData[$district_name][$date] = $price;
    }
}

// Display the data
foreach ($districtData as $district_name => $dates) {
    echo "<tr>";
    echo "<td>" . $district_name . "</td>";
    
    // Loop through the last 7 days and display prices
    for ($i = 0; $i < 7; $i++) {
        $date = date('Y-m-d', strtotime("-$i days"));
        $price = isset($dates[$date]) ? $dates[$date] : '-';
        echo "<td>" . $price . "</td>";
    }
    
    echo "</tr>";
}
?>


    <?php } else {} ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="weather-info" class="mb-5"></div>
            </div>
        </div>
    </div>