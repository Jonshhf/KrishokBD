<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
    .wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top:20px;
    }

    .login-container {
        width: 650px;
        padding: 80px;
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .login-container:hover {
        transform: scale(1.02);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
    }

    .login-form h2 {
        margin-bottom: 20px;
        font-weight: 500;
        color: #333;
        text-align: center;
    }

    .input-container {
        position: relative;
        margin-bottom: 20px;
    }

    .input-container input {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: none;
        border-bottom: 2px solid #ccc;
        border-radius: 5px;
        background: none;
        outline: none;
        transition: all 0.3s ease;
    }

    .input-container input:focus {
        border-bottom-color: #fda085;
        box-shadow: 0 4px 8px rgba(253, 160, 133, 0.1);
    }

    .input-container label {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: #aaa;
        pointer-events: none;
        transition: all 0.3s ease;
    }

    .input-container input:focus+label,
    .input-container input:not(:placeholder-shown)+label {
        top: 0;
        font-size: 12px;
        color: #fda085;
    }

    button {
        width: 100%;
        padding: 10px;
        background-color: green;
        border: none;
        border-radius: 5px;
        color: white;
        font-size: 16px;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    button:hover {
        transform: scale(1.05);
    }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="login-container">
            <form class="login-form">
                <h2>লগইন করুন</h2>
                <div class="input-container">
                    <input type="tel" id="mobile" required>
                    <label for="mobile">ফোন নম্বর *</label>
                </div>
                <div class="input-container">
                    <input type="password" id="password" required>
                    <label for="password">পাসওয়ার্ড *</label>
                </div>
                <button type="button" onclick="loginUser()">লগইন</button>
            </form>
        </div>
    </div>
</body>

</html>