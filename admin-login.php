<?php
session_start();

// بيانات الدخول (يمكن تغييرها)
$admin_username = "bouchra";
$admin_password = "bouchra2003"; // يجب تغيير هذا لكلمة سر أقوى

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['logged_in'] = true;
        header('Location: admin-dashboard.php');
        exit;
    } else {
        $error = "اسم المستخدم أو كلمة المرور غير صحيحة";
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل دخول المدير</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .login-container {
            max-width: 400px;
            margin: 5rem auto;
            padding: 2rem;
            background: #F3EEF1;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .login-container h2 {
            color: #D56989;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .login-form input {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #E49CAF;
            border-radius: 5px;
        }
        .login-form button {
            background: #C2DC80;
            color: #333;
            border: none;
            padding: 0.8rem;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
        .login-form button:hover {
            background: #E49CAF;
            color: #fff;
        }
        .error {
            color: #D56989;
            text-align: center;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>تسجيل دخول المدير</h2>
        
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        
        <form class="login-form" method="POST">
            <input type="text" name="username" placeholder="اسم المستخدم" required>
            <input type="password" name="password" placeholder="كلمة المرور" required>
            <button type="submit">دخول</button>
        </form>
    </div>
</body>
</html>