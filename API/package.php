<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KrisokBD Packages</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* styles.css */

        .container1 {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #ffffff;
            border-bottom: 1px solid #ddd;
        }

        .header-left,
        .header-right {
            display: flex;
            align-items: center;
        }

        .back-button {
            font-size: 24px;
            text-decoration: none;
            color: #000;
        }

        .logo {
            width: 70px;
        }

        .header-icon {
            margin-left: 10px;
            text-decoration: none;
            color: #000;
            font-size: 18px;
        }

        .notification {
            background-color: #00b050;
            color: #ffffff;
            padding: 2px 8px;
            border-radius: 50%;
            font-size: 12px;
            margin-left: 5px;
        }

        .promo-banner {
            background-color: #fff8e1;
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .promo-banner p {
            font-size: 14px;
            margin: 0 0 10px;
            color: #333;
        }

        .promo-button {
            background-color: #1a73e8;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        .info-buttons {
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }

        .info-button {
            background-color: #ffffff;
            border: 1px solid #ddd;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            width: 48%;
        }

        .package-section {
            padding: 20px;
        }

        .package-section h2 {
            font-size: 18px;
            margin-bottom: 15px;
            color: #333;
        }

        .package-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ffffff;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: box-shadow 0.3s;
            position: relative;
        }

        .package-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .package-details {
            flex: 1;
        }

        .package-info h3 {
            margin: 0;
            font-size: 16px;
            color: #333;
        }

        .package-info p {
            margin: 5px 0;
            font-size: 14px;
            color: #777;
        }

        .package-price {
            text-align: right;
            min-width: 120px;
        }

        .current-price {
            font-size: 16px;
            color: #000;
            display: block;
        }

        .original-price {
            font-size: 14px;
            color: #999;
            text-decoration: line-through;
            display: block;
        }

        .discount {
            font-size: 14px;
            color: #00b050;
            display: block;
        }

        .package-radio {
            display: none;
        }

        .cart-icon {
            font-size: 20px;
            color: #1a73e8;
            cursor: pointer;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
            border-radius: 50%;
            padding: 10px;
            border: 1px solid #ddd;
            transition: background-color 0.3s, transform 0.3s;
        }

        .cart-icon:hover {
            background-color: #f0f0f0;
            transform: translate(-50%, -50%) scale(1.1);
        }
    </style>
</head>
<body>
    <div class="container1">


        <div class="promo-banner">
            <p>৩০ দিনের ফ্রী প্রিমিয়াম প্যাকেজ এক্টিভ করুন </p>
            <button class="promo-button">ফ্রি প্রিমিয়াম প্যাকেজ Active করুন</button>
        </div>

        <div class="info-buttons">
            <button class="info-button">পেমেন্টের নিরাপত্তা সম্পর্কে</button>
            <button class="info-button">কোন একাউন্টে না থাকলে</button>
        </div>

        <section class="package-section">
            <h2>প্রিমিয়াম প্যাকেজ</h2>

            <!-- Package Card -->
            <div class="package-card">
                <div class="package-details">
                    <input type="radio" id="annual-package" name="package" class="package-radio">
                    <label for="annual-package">
                        <div class="package-info">
                            <h3>বার্ষিক প্রিমিয়াম প্যাকেজ</h3>
                            <p>মেয়াদ: ১ বছর</p>
                            <p>সকল পণ্য </p>
                        </div>
                    </label>
                </div>
                <div class="package-price">
                    <span class="current-price">1199 টাকা</span>
                    <span class="original-price">1499 টাকা</span>
                    <span class="discount">Save 20.01%</span>
                </div>
                <!-- Cart Icon in the middle -->
                <span class="cart-icon" onclick="addToCart('annual-package')">🛒</span>
            </div>

            <!-- Another Package Card -->
            <div class="package-card">
                <div class="package-details">
                    <input type="radio" id="monthly-package" name="package" class="package-radio">
                    <label for="monthly-package">
                        <div class="package-info">
                            <h3>মাসিক প্রিমিয়াম প্যাকেজ</h3>
                            <p>মেয়াদ: ১ মাস</p>
                            <p>সকল পণ্য </p>
                        </div>
                    </label>
                </div>
                <div class="package-price">
                    <span class="current-price">199 টাকা</span>
                    <span class="original-price">299 টাকা</span>
                    <span class="discount">Save 33.44%</span>
                </div>
                <!-- Cart Icon in the middle -->
                <span class="cart-icon" onclick="addToCart('monthly-package')">🛒</span>
            </div>

        </section>
    </div>

    <script>
        function addToCart(packageId) {
            alert(packageId + ' কার্টে যোগ করা হয়েছে!');
            // Here you can add code to handle adding the item to the cart
        }
    </script>
</body>
</html>
