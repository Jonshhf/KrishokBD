
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-control, .form-select {
            border-radius: 10px;
            padding: 12px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
            border: 2px solid #ddd;
        }

        .form-control:focus, .form-select:focus {
            border-color: #28a745;
            box-shadow: 0 0 8px rgba(40, 167, 69, 0.2);
        }

        .form-control:hover, .form-select:hover {
            border-color: #80bdff;
        }

        .form-control::placeholder {
            color: #888;
        }

        .btn {
            background: linear-gradient(135deg, #28a745, #218838);
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: bold;
            color: #fff;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: linear-gradient(135deg, #218838, #1e7e34);
            box-shadow: 0 4px 8px rgba(40, 167, 69, 0.2);
        }

        .invalid-feedback {
            display: none; /* Hidden by default */
        }

        input:invalid + .invalid-feedback {
            display: block;
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($success_message)) { ?>
            <div class="alert alert-success"><?php echo $success_message; ?></div>
        <?php } elseif (isset($error_message)) { ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php } ?>
        
        <form method="POST" action="reg_connection.php">
            <div class="mb-3">
                <select class="form-select" name="user_type" required>
                    <option value="">ব্যবহারকারীর ধরণ নির্বাচন করুন</option>
                    <option value="farmer">কৃষক</option>
                    <option value="businessman">ব্যবসায়ী</option>
                </select>
            </div>

            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="নাম" required>
            </div>

            <div class="mb-3">
                <input type="tel" name="mobile" class="form-control" id="mobile" placeholder="মোবাইল নম্বর" pattern="[0-9]{10}" required>
                <div id="mobileError" class="invalid-feedback">Invalid mobile number.</div>
            </div>

            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="পাসওয়ার্ড" required>
            </div>

            <button class="btn btn-success w-100" type="submit">নিবন্ধন করুন</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
