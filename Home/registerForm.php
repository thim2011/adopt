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
                <form id="registration_form">
                    <h2><b>浪愛協會</b></h2>
                    <div class="mb-3">
                        <label for="fullname" class="form-label"><b>中文姓名</b></label>
                        <input type="text" class="form-control" id="fullname" name="fullname" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label"><b>電子郵件</b></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label"><b>賬號</b></label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">
                            <b>密碼</b><small>(必须至少包含6个字符，并且至少包含一个字母和一个数字)</small>
                        </label>
                        <input type="password" class="form-control" id="password" name="password"
                            pattern="^(?=.*[a-zA-Z])(?=.*[0-9]).{6,}$" required>
                    </div>
                    <button type="button" id="subBtn" class="btn btn-primary">注冊賬號</button>
                </form>
                <div class="mt-3">
                    <p>已有賬號?點擊<a href="login.php">登錄</a>.</p>
                </div>
            </div>
        </div>
    </div>
    <?php require_once "../Common/footer.php" ?>
    <script src="registerForm.js?v=2023"></script>
</body>

</html>