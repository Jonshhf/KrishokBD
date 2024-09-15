<?php

include "../connection.php";

// Query to get the average price of products per product type, per district in each division
$sql_price_avg = "
    SELECT p.id AS product_id, p.name AS product_name, pt.name AS product_type_name, 
           d.name AS division_name, AVG(dwp.price) AS avg_price
    FROM district_wise_price dwp
    JOIN products p ON dwp.product_id = p.id
    JOIN products_type pt ON p.id = pt.product_id
    JOIN divisions d ON dwp.division_id = d.id
    JOIN districts ds ON dwp.district_id = ds.id
    GROUP BY p.id, d.id
    ORDER BY p.id, d.id
";

$result_price_avg = $conn->query($sql_price_avg);

$product_data = [];
if ($result_price_avg->num_rows > 0) {
    while ($row = $result_price_avg->fetch_assoc()) {
        $product_name = $row['product_name'];
        $division_name = $row['division_name'];
        $avg_price = $row['avg_price'];

        // Group average prices by product and division
        $product_data[$product_name][] = ['division' => $division_name, 'avg_price' => $avg_price];
    }
}

$conn->close();
?>



    <?php foreach ($product_data as $product_name => $data): ?>
    <div class="chart-container">
        <h4><?php echo $product_name; ?> এর গ্রাফ </h4><hr>
        <canvas id="chart-<?php echo $product_name; ?>"></canvas>
    </div>

    <script>
        // Data for product: <?php echo $product_name; ?>
        debugger;
        var data = <?php echo json_encode($data); ?>;
        console.log(data);
        // Labels for divisions
        var labels_<?php echo $product_name; ?> = data.map(item => item.division);

        // Average prices for each division
        var prices_<?php echo $product_name; ?> = data.map(item => item.avg_price);

        var ctx_<?php echo $product_name; ?> = document.getElementById('chart-<?php echo $product_name; ?>').getContext('2d');
        var chart_<?php echo $product_name; ?> = new Chart(ctx_<?php echo $product_name; ?>, {
            type: 'bar',
            data: {
                labels: labels_<?php echo $product_name; ?>, // Division names as labels
                datasets: [{
                    label: 'Average Price',
                    data: prices_<?php echo $product_name; ?>, // Average prices
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Average Price'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Division'
                        }
                    }
                }
            }
        });
    </script>
    <?php endforeach; ?>

</body>
</html>
