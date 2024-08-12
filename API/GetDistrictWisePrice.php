<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "krisok_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$divisionId=$_POST["divisionId"];
$productId=$_POST["productId"];

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
$sql = "SELECT a.*,b.bn_name FROM district_wise_price a,districts b where a.district_id=b.id and  a.product_id=$productId and a.division_id=$divisionId and a.date='$date'";
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

                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="weather-info" class="mb-5"></div>
            </div>
        </div>
    </div>