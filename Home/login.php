<?php
    if(isset($_GET['message'])){
        if($_GET['message'] === 'none'){
            $message = "帳號或密碼錯誤";
            echo '<script>alert("' . $message . '");</script>';
        }  
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>浪愛協會</title>
</head>

<body>
    <div class="top">
        <?php require_once "../Common/topNav.php" ?>
    </div>
    <div class="container">
        <div class="row justify-content-center d-flex align-items-center vh-100">
            <div class="col-lg-4" style="background-color: #f3f3f3; border-radius: 10px; padding: 30px">
                <form id="login_form" action="../BLL/Users/loginCheck.php" method="post" class="mt-5">
                    <h2 class="mb-4">浪愛協會</h2>
                    <div class="mb-3">
                        <label for="username" class="form-label">帳號</label>
                        <input type="text" id="username" name="username" class="form-control input-short" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">密碼</label>
                        <input type="password" id="password" name="password" class="form-control input-short" required>
                    </div>
                    <button type="submit" id="loginBtn" class="btn btn-primary">登錄</button>
                    <button type="button" id="visitBtn" class="btn btn-primary">訪客模式</button>
                </form>
                <div class="mt-3 register-link">
                    <p>沒賬號? 點擊 <a href="registerForm.php">注冊</a>.</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php require_once "../Common/footer.php" ?>
    <script src="login.js?v=2023"></script>
</body>

</html>