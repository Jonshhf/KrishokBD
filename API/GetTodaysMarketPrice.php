<?php

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
<!-- Entry Button Section -->
<section id="categories" class="py-5">
            <div class="container-fluid">
                <h2 class="text-center section-title mb-4"> আজকের বাজার দর </h2>
                <div class="row justify-content-center">
                    <div class="col-2 col-responsive" >
                        <div class="feature-card">
                            <img src="assets/images/cart/rice.png" alt="Feature 1" class="card-img card-height">
                            <h4 class="mt-2">  ধান </h4>
                        </div>
                    </div>
                    <div class="col-2 col-responsive">
                        <div class="feature-card">
                            <img src="assets/images/cart/vurta.png" alt="Feature 2" class="card-img  card-height">
                            <h4 class="mt-2">ভূট্টা </h4>
                        </div>
                    </div>
                    <div class="col-2 col-responsive">
                        <div class="feature-card">
                            <img src="assets/images/cart/peyaj.png" alt="Feature 3" class="card-img  card-height">
                            <h4 class="mt-2">পেঁয়াজ  </h4>
                        </div>
                    </div>
                    <div class="col-2 col-responsive">
                        <div class="feature-card">
                            <img src="assets/images/cart/rosun.png" alt="Feature 4" class="card-img  card-height">
                            <h4 class="mt-2">রসুন </h4>
                        </div>
                    </div>
                    <div class="col-2 col-responsive">
                        <div class="feature-card">
                            <img src="assets/images/cart/alu.png" alt="Feature 5" class="card-img  card-height">
                            <h4 class="mt-2">আলু </h4>
                        </div>
                    </div>
                    <div class="col-2 col-responsive">
                        <div class="feature-card">
                            <img src="assets/images/cart/ada.png" alt="Feature 5" class="card-img  card-height">
                            <h4 class="mt-2">আদা </h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>






    
</head>
<body>
    <div class="container1 mt-5">
        <h1 class="text-center mb-4">রংপুর বিভাগের জেলাসমূহ</h1>
        <div class="row justify-content-center mb-4">
            <div class="col-md-8 btn-container">
                <div class="row">
                    <div class="col-6 col-md-3 mb-3">
                        <button class="btn district-btn" data-district="রংপুর">রংপুর</button>
                    </div>
                    <div class="col-6 col-md-3 mb-3">
                        <button class="btn district-btn" data-district="দিনাজপুর">দিনাজপুর</button>
                    </div>
                    <div class="col-6 col-md-3 mb-3">
                        <button class="btn district-btn" data-district="পঞ্চগড়">পঞ্চগড়</button>
                    </div>
                    <div class="col-6 col-md-3 mb-3">
                        <button class="btn district-btn" data-district="ঠাকুরগাঁও">ঠাকুরগাঁও</button>
                    </div>
                    <div class="col-6 col-md-3 mb-3">
                        <button class="btn district-btn" data-district="গাইবান্ধা">গাইবান্ধা</button>
                    </div>
                    <div class="col-6 col-md-3 mb-3">
                        <button class="btn district-btn" data-district="কুড়িগ্রাম">কুড়িগ্রাম</button>
                    </div>
                    <div class="col-6 col-md-3 mb-3">
                        <button class="btn district-btn" data-district="নীলফামারী">নীলফামারী</button>
                    </div>
                    <div class="col-6 col-md-3 mb-3">
                        <button class="btn district-btn" data-district="লালমনিরহাট">লালমনিরহাট</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="productTable" class="product-table mb-5">
                    <h2 id="districtTitle" class="text-center mb-3"></h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>পণ্য</th>
                                    <th>ছবি</th>
                                    <th>মূল্য (টাকা)</th>
                                    <th>পরিবর্তন</th>
                                    <th>মজুদ</th>
                                    <th>রেটিং</th>
                                </tr>
                            </thead>
                            <tbody id="productTableBody"></tbody>
                        </table>
                    </div>
                </div>
                <div id="weather-info" class="mb-5"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const products = {
            রংপুর: [
                {name: "ধান", image: "assets/images/cart/rice.png", price: 120, change: 5, stock: 200, rating: 4.7},
                {name: "ভূট্টা", image: "assets/images/cart/vurta.png", price: 80, change: -2, stock: 500, rating: 4.2},
                {name: "পেঁয়াজ", image: "assets/images/cart/peyaj.png", price: 40, change: 3, stock: 1000, rating: 4.5},
                {name: "রসুন", image: "assets/images/cart/rosun.png", price: 40, change: 3, stock: 1000, rating: 4.5},
                {name: "আলু", image: "assets/images/cart/alu.png", price: 40, change: 3, stock: 1000, rating: 4.5},
                {name: "আদা", image: "assets/images/cart/ada.png", price: 40, change: 3, stock: 1000, rating: 4.5}
            ],
            দিনাজপুর: [
                {name: "ধান", image: "assets/images/cart/rice.png", price: 150, change: 5, stock: 200, rating: 4.7},
                {name: "ভূট্টা", image: "assets/images/cart/vurta.png", price: 90, change: -2, stock: 500, rating: 4.2},
                {name: "পেঁয়াজ", image: "assets/images/cart/peyaj.png", price: 50, change: 3, stock: 1000, rating: 4.5},
                {name: "রসুন", image: "assets/images/cart/rosun.png", price: 40, change: 3, stock: 1000, rating: 4.5},
                {name: "আলু", image: "assets/images/cart/alu.png", price: 40, change: 3, stock: 1000, rating: 4.5},
                {name: "আদা", image: "assets/images/cart/ada.png", price: 40, change: 3, stock: 1000, rating: 4.5}
            ],
			পঞ্চগড়: [
                {name: "ধান", image: "assets/images/cart/rice.png", price: 120, change: 5, stock: 200, rating: 4.7},
                {name: "ভূট্টা", image: "assets/images/cart/vurta.png", price: 80, change: -2, stock: 500, rating: 4.2},
                {name: "পেঁয়াজ", image: "assets/images/cart/peyaj.png", price: 40, change: 3, stock: 1000, rating: 4.5},
                {name: "রসুন", image: "assets/images/cart/rosun.png", price: 40, change: 3, stock: 1000, rating: 4.5},
                {name: "আলু", image: "assets/images/cart/alu.png", price: 40, change: 3, stock: 1000, rating: 4.5},
                {name: "আদা", image: "assets/images/cart/ada.png", price: 40, change: 3, stock: 1000, rating: 4.5}
            ],
			ঠাকুরগাঁও: [
			    {name: "ধান", image: "assets/images/cart/rice.png", price: 120, change: 5, stock: 200, rating: 4.7},
                {name: "ভূট্টা", image: "assets/images/cart/vurta.png", price: 80, change: -2, stock: 500, rating: 4.2},
                {name: "পেঁয়াজ", image: "assets/images/cart/peyaj.png", price: 40, change: 3, stock: 1000, rating: 4.5},
                {name: "রসুন", image: "assets/images/cart/rosun.png", price: 40, change: 3, stock: 1000, rating: 4.5},
                {name: "আলু", image: "assets/images/cart/alu.png", price: 40, change: 3, stock: 1000, rating: 4.5},
                {name: "আদা", image: "assets/images/cart/ada.png", price: 40, change: 3, stock: 1000, rating: 4.5}
            ],
			গাইবান্ধা: [
			    {name: "ধান", image: "assets/images/cart/rice.png", price: 120, change: 5, stock: 200, rating: 4.7},
                {name: "ভূট্টা", image: "assets/images/cart/vurta.png", price: 80, change: -2, stock: 500, rating: 4.2},
                {name: "পেঁয়াজ", image: "assets/images/cart/peyaj.png", price: 40, change: 3, stock: 1000, rating: 4.5},
                {name: "রসুন", image: "assets/images/cart/rosun.png", price: 40, change: 3, stock: 1000, rating: 4.5},
                {name: "আলু", image: "assets/images/cart/alu.png", price: 40, change: 3, stock: 1000, rating: 4.5},
                {name: "আদা", image: "assets/images/cart/ada.png", price: 40, change: 3, stock: 1000, rating: 4.5}
            ],
			কুড়িগ্রাম: [
                {name: "ধান", image: "assets/images/cart/rice.png", price: 120, change: 5, stock: 200, rating: 4.7},
                {name: "ভূট্টা", image: "assets/images/cart/vurta.png", price: 80, change: -2, stock: 500, rating: 4.2},
                {name: "পেঁয়াজ", image: "assets/images/cart/peyaj.png", price: 40, change: 3, stock: 1000, rating: 4.5},
                {name: "রসুন", image: "assets/images/cart/rosun.png", price: 40, change: 3, stock: 1000, rating: 4.5},
                {name: "আলু", image: "assets/images/cart/alu.png", price: 40, change: 3, stock: 1000, rating: 4.5},
                {name: "আদা", image: "assets/images/cart/ada.png", price: 40, change: 3, stock: 1000, rating: 4.5}
            ],
			নীলফামারী: [
			    {name: "ধান", image: "assets/images/cart/rice.png", price: 120, change: 5, stock: 200, rating: 4.7},
                {name: "ভূট্টা", image: "assets/images/cart/vurta.png", price: 80, change: -2, stock: 500, rating: 4.2},
                {name: "পেঁয়াজ", image: "assets/images/cart/peyaj.png", price: 40, change: 3, stock: 1000, rating: 4.5},
                {name: "রসুন", image: "assets/images/cart/rosun.png", price: 40, change: 3, stock: 1000, rating: 4.5},
                {name: "আলু", image: "assets/images/cart/alu.png", price: 40, change: 3, stock: 1000, rating: 4.5},
                {name: "আদা", image: "assets/images/cart/ada.png", price: 40, change: 3, stock: 1000, rating: 4.5}
            ],
			লালমনিরহাট: [
                {name: "ধান", image: "assets/images/cart/rice.png", price: 120, change: 5, stock: 200, rating: 4.7},
                {name: "ভূট্টা", image: "assets/images/cart/vurta.png", price: 80, change: -2, stock: 500, rating: 4.2},
                {name: "পেঁয়াজ", image: "assets/images/cart/peyaj.png", price: 40, change: 3, stock: 1000, rating: 4.5},
                {name: "রসুন", image: "assets/images/cart/rosun.png", price: 40, change: 3, stock: 1000, rating: 4.5},
                {name: "আলু", image: "assets/images/cart/alu.png", price: 40, change: 3, stock: 1000, rating: 4.5},
                {name: "আদা", image: "assets/images/cart/ada.png", price: 40, change: 3, stock: 1000, rating: 4.5}
            ],
            // Add more products for other districts...
        };

        document.querySelectorAll('.district-btn').forEach(button => {
            button.addEventListener('click', () => {
                const district = button.dataset.district;
                document.getElementById('districtTitle').textContent = `${district} জেলার পণ্যসমূহ`;
                const tableBody = document.getElementById('productTableBody');
                tableBody.innerHTML = '';

                products[district].forEach(product => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${product.name}</td>
                        <td><img src="${product.image}" alt="${product.name}" class="product-image"></td>
                        <td>${product.price}</td>
                        <td class="price-change ${product.change > 0 ? 'price-up' : 'price-down'}">
                            ${product.change > 0 ? '+' : ''}${product.change}
                        </td>
                        <td>${product.stock}</td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: ${product.rating * 20}%">
                                    ${product.rating}
                                </div>
                            </div>
                        </td>
                    `;
                    tableBody.appendChild(row);
                });

                document.getElementById('productTable').style.display = 'block';
                showWeatherInfo(district);
            });
        });

        function highlightExpensiveProducts() {
            const rows = document.querySelectorAll('#productTableBody tr');
            rows.forEach(row => {
                const price = parseFloat(row.children[2].textContent);
                if (price > 100) {
                    row.classList.add('highlight');
                }
            });
        }

        function sortTable(column) {
            const table = document.querySelector('.table');
            const rows = Array.from(table.querySelectorAll('tbody tr'));
            const sortedRows = rows.sort((a, b) => {
                const aValue = a.children[column].textContent;
                const bValue = b.children[column].textContent;
                return aValue.localeCompare(bValue, undefined, {numeric: true});
            });
            table.querySelector('tbody').append(...sortedRows);
        }

        function addSearchFeature() {
            const searchInput = document.createElement('input');
            searchInput.type = 'text';
            searchInput.placeholder = 'পণ্য খুঁজুন...';
            searchInput.classList.add('form-control', 'mb-3');
            document.getElementById('productTable').prepend(searchInput);

            searchInput.addEventListener('input', () => {
                const searchTerm = searchInput.value.toLowerCase();
                const rows = document.querySelectorAll('#productTableBody tr');
                rows.forEach(row => {
                    const productName = row.children[0].textContent.toLowerCase();
                    row.style.display = productName.includes(searchTerm) ? '' : 'none';
                });
            });
        }

        function showWeatherInfo(district) {
            // This is a mock function. In a real application, you would fetch actual weather data.
            const weatherData = {
                রংপুর: { temp: 30, condition: 'রৌদ্রোজ্জ্বল' },
                // Add weather data for other districts...
            };

            const weather = weatherData[district];
            const weatherInfo = document.getElementById('weather-info');
            weatherInfo.innerHTML = `
                <h3>${district} এর আবহাওয়া</h3>
                <p>তাপমাত্রা: ${weather.temp}°C</p>
                <p>অবস্থা: ${weather.condition}</p>
            `;
        }

        document.addEventListener('DOMContentLoaded', () => {
            addSearchFeature();
            document.querySelector('.table thead').addEventListener('click', (e) => {
                if (e.target.tagName === 'TH') {
                    const column = Array.from(e.target.parentNode.children).indexOf(e.target);
                    sortTable(column);
                }
            });
        });

        document.getElementById('productTable').addEventListener('mouseover', highlightExpensiveProducts);
    </script>
</body>
</html>

<br><br><br>