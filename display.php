<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض البيانات</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            background-color: #f9f9f9;
            padding: 20px;
        }
        .container {
            width: 90%;
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #00897b;
        }
        p {
            font-size: 16px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>عرض البيانات</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $phone = htmlspecialchars($_POST['phone']);
            
            echo "<p><strong>الاسم:</strong> $name</p>";
            echo "<p><strong>البريد الإلكتروني:</strong> $email</p>";
            echo "<p><strong>رقم الهاتف:</strong> $phone</p>";
        } else {
            echo "<p>لم يتم إرسال أي بيانات.</p>";
        }
       
         

        ?>
        <?php
// تحديد مدة صلاحية الـ Cookie (24 ساعة)
$cookie_expiry_time = 24 * 60 * 60; // 24 ساعة بالثواني
$cookie_name = "registered_user";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استلام البيانات من النموذج
    $name = $_POST['name'];
    $email = $_POST['email'];

    // التحقق مما إذا كان المستخدم مسجلًا بالفعل
    if (isset($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] === $email) {
        echo "أنت مسجل بالفعل بهذا البريد الإلكتروني: $email. الرجاء المحاولة لاحقًا.";
    } else {
        // إنشاء Cookie للمستخدم
        setcookie($cookie_name, $email, time() + $cookie_expiry_time, "/");

        // رسالة ترحيب
        echo "مرحبًا $name! تم تسجيلك بنجاح. يمكنك استخدام الموقع لمدة 24 ساعة.";
    }
} else {
    echo "يرجى ملء النموذج للتسجيل.";
}
?>

    </div>
</body>
</html>
