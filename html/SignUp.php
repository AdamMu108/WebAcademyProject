<?php
include ("dp_connection.php"); // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Submit'])) {
    // Collect and sanitize input data
    $fullName = $conn->real_escape_string($_POST['FullName']);
    $email = $conn->real_escape_string($_POST['Email']);
    $password = password_hash($_POST['Password'], PASSWORD_BCRYPT); // Hash the password
    $confPassword = $_POST['ConfPassword'];
    $registrationType = $conn->real_escape_string($_POST['RegistrationType']);
    $phoneNumber = $conn->real_escape_string($_POST['PhoneNumber']);
    $date = $conn->real_escape_string($_POST['Date']);
    $bloodType = $conn->real_escape_string($_POST['BloddType']);

    // Validate password confirmation
    if (!password_verify($confPassword, $password)) {
        echo "<script>alert('Passwords do not match.');</script>";
    } else {
        // Prepare SQL query to insert data
        $sql = "INSERT INTO trainers (full_name, email, password, phone_number, registration_type, blood_type, date)
                VALUES ('$fullName', '$email', '$password', '$phoneNumber', '$registrationType', '$bloodType', '$date')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registration successful!');</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }
}

$conn->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FootBall Academy</title>
    <link rel="stylesheet" href="../CSS/master.css">
    <link rel="stylesheet" href="../CSS/SignUp.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
    </style>

<script src="../JavaScript/SignUpButton.js">
    
</script>

<script src="../JavaScript/AnimateFromBelow.js">
    
</script>

<script src="../JavaScript/subsButton.js">
    
</script>


</head>
<body>
        <img src="../images/football-training-equipment-4.jpg" alt="Background image" class="Background">
        <nav class="navstyle">
            <a href="../html/index.html" style="text-decoration: none; color: blanchedalmond; margin: 0 10px;">
                <span>الصفحة الرئيسية</span>
            </a> 
            <a href="../html/academy.html" style="text-decoration: none; color: blanchedalmond; margin: 0 10px;">
                <span>الأكاديمية</span>
            </a> 
            <a href="../html/Manhaj.html" style="text-decoration: none; color: blanchedalmond; margin: 0 10px;">
                <span>المنهج</span>
            </a> 
            <a href="../html/Rules.html" style="text-decoration: none; color: blanchedalmond; margin: 0 10px;">
                <span>الشروط والأحكام</span>
            </a> 
            <a href="../html/Contact.html" style="text-decoration: none; color: blanchedalmond; margin: 0 10px;">
                <span>تواصل معنا</span>
            </a> 
            <a href="../html/News.html" style="text-decoration: none; color: blanchedalmond; margin: 0 10px;">
                <span>الأخبار</span>
            </a> 
            <a href="../html/SignUp.html" style="text-decoration: none; color: blanchedalmond; margin: 0 10px;">
                <span>سجِّل الآن</span>
            </a>
          </nav>
</body>

<div class="programs-card-alignment animate-from-below" id="programs-card">
    <div class="programs-card">
        <h2>شهري</h2>
        <p class="price">11.99 دولار/شهريًا</p>
        <ul>
            <li>اشتراك شهري مرن</li>
            <li>إمكانية الوصول إلى جميع الفعاليات</li>
            <li>خدمات تدريبية مميزة</li>
            <li>خصومات خاصة للأعضاء</li>
        </ul>
        <button class="btn" data-type="monthly">اشترك الآن</button>
    </div>

    <div class="programs-card">
        <h2>سنوي</h2>
        <p class="price"><span style=" color: #5a9f7a; font-size: 120%;">99.99</span> <span style="text-decoration: line-through;">119.99</span> دولار/سنوياً</p>
        <ul>
            <li>اشتراك اقتصادي سنوي</li>
            <li>إمكانية الوصول إلى كافة المرافق</li>
            <li>حصص تدريبية متقدمة</li>
            <li>مزايا إضافية للأعضاء السنويين</li>
        </ul>
        <button class="btn" data-type="yearly">اشترك الآن</button>
    </div>
</div>


<div class="signup-alignment animate-from-below" >
    <h1>اكتشف البطل الذي بداخلك. سجّل الآن وابدأ رحلتك نحو النجاح في كرة القدم</h1>

    <div class="SignUp-form animate-from-below" id="signup-form">
        <h2>استمارة التسجيل</h2>

        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
        <div class="form-row">
            <div class="form-group">
                <label for="fName">الاسم الكامل</label>
                <input type="text" required id="fName" title="الاسم الكامل" name="FullName"> 
            </div>
            <div class="form-group">
                <label for="email">البريد الالكتروني</label>
                <input type="email" required title="البريد الالكتروني" id="email" name="Email"> 
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="conf-password">تأكيد كلمة المرور</label>
                <input type="password" required title="تأكيد كلمة المرور" id="conf-password" name="ConfPassword">
            </div>

            <div class="form-group">
                <label for="password">كلمة المرور</label>
                <input type="password" required title="كلمة المرور" id="password" name="Password">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="subs-type">نوع الاشتراك</label>
                <select required title="نوع الاشتراك" id="subs-type" name="RegistrationType">
                    <option value="monthly">شهري</option>
                    <option value="yearly">سنوي</option>
                </select>
            </div>

            <div class="form-group">
                <label for="phone-number">رقم الهاتف</label>
                <input type="text" required title="رقم الهاتف" id="phone-number" name="PhoneNumber"> 
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="date-of-birth">تاريخ الميلاد</label>
                <input type="date" required title="تاريخ الميلاد" id="date-of-birth" max="2017-1-1" min="2008-1-1" name="Date"> 
            </div>
            <div class="form-group">
                <label for="blood-type">فصيلة الدم</label>
                <select required title="فصيلة الدم" id="blood-type" name="BloddType">
                    <option value="O+">O+</option>
                    <option value="A+">A+</option>
                    <option value="B+">B+</option>
                    <option value="AB+">AB+</option>
                    <option value="A-">A-</option>
                    <option value="B-">B-</option>
                    <option value="AB-">AB-</option>
                    <option value="O-">O-</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <input id="request-button" type="submit" name="Submit" value="ارسال الطلب">
            <button id="request-button" type="button">ارسال الطلب</button>
        </div>
    </div>

        </form>
 <!-- Login Form -->
 <div class="SignUp-form animate-from-below" id="login-form" style="display: none;">
        <h2>تسجيل الدخول</h2>
        <div class="form-row">
           
            <div class="form-group">
                <label for="login-email">البريد الالكتروني</label>
                <input type="email" required title="البريد الالكتروني" id="login-email"> 
            </div>
           
        </div>
        <div class="form-row">
           
            <div class="form-group">
                <label for="password">كلمة المرور</label>
                <input type="password" required title="كلمة المرور" id="login-password">
            </div>
        
           
        </div>
        <div class="form-row">
            <button id="back-to-signup" type="button" class="button">ارسال الطلب</button>
            <button id="login-button" type="button">تسجيل الدخول</button>
        </div>
    </div>
</div>

<div class="styleadjust">
    <footer class="onlyForAnimation animate-from-below">
        <h3>ابقى على اطلاع بأخر التحديثات</h3>
        <div class="social-icons">
            <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
        </div>
        <div class="columns">
            <div class="column">
                <h4>روابط</h4>
                <ul>
                    <li><a href="../html/index.html">الصفحة الرئيسية</a></li>
                    <li><a href="../html/Manhaj.html">المنهج</a></li>
                    <li><a href="../html/academy.html">الأكاديمية</a></li>
                </ul>
            </div>
            <div class="column">
                <h4>مصادر</h4>
                <ul>
                    <li><a href="../html/News.html">الأخبار</a></li>
                    <li><a href="../html/Contact.html">تواصل معنا</a></li>
                    <li><a href="../html/SignUp.html">سجل الآن</a></li>
                </ul>
            </div>
            <div class="column">
                <h4>جهات الاتصال</h4>
                <p style="color: rgb(194, 194, 194);">رفيديا, نابلس</p>
                <p style="color: rgb(194, 194, 194);">055 000 0000</p>
                <p style="color: rgb(194, 194, 194);">050 000 0000</p>
                <p><a href="mailto:test@gmail.com" style="color: white;">test@gmail.com</a></p>
            </div>
        </div>
        <div class="bottom">
            حقوق النشر © 2025. جميع الحقوق محفوظة. رفيديا, نابلس<br>
            طورت بواسطة أكاديمية الكابتن
        </div>
    </footer>
</div>

</html>