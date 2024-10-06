
    <style>
    form {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-control,
    .form-select {
        border-radius: 10px;
        padding: 12px;
        margin-bottom: 15px;
        transition: all 0.3s ease;
        border: 2px solid #ddd;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #28a745;
        box-shadow: 0 0 8px rgba(40, 167, 69, 0.2);
    }

    .form-control:hover,
    .form-select:hover {
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
        display: none;
        /* Hidden by default */
    }

    input:invalid+.invalid-feedback {
        display: block;
        color: #dc3545;
    }
    </style>


    <form method="POST" action="API/reg_connection.php">
        <div class="mb-4">
            <select class="form-select" name="user_type" id="type" required style="width:100%;">
                <option hidden="">ব্যবহারকারীর ধরণ নির্বাচন করুন</option>
                <option value="farmer">কৃষক</option>
                <option value="businessman">ব্যবসায়ী</option>
                <option value="general">সাধারণ ব্যবহারকারী</option>
            </select>
        </div>

        <div class="mb-3">
            <input type="text" name="name" id="name" class="form-control" placeholder="নাম" required>
        </div>

        <div class="mb-3">
            <input type="tel" name="mobile" class="form-control" id="mobile" placeholder="মোবাইল নম্বর" required>
        </div>

        <div class="mb-3">
            <input type="password" id="password" class="form-control" placeholder="পাসওয়ার্ড" required>
        </div>

        <button class="btn btn-success w-100" type="button" onclick="registerUser()">নিবন্ধন করুন</button>
    </form>
    </div>
