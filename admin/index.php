<?php
    require_once "../DAL/articleDAL.php";
    require_once "../DAL/workDAL.php";
    require_once "../DAL/usersDAL.php";

    $aDAl1=new articleDAL();
    $aDAl2= new workDAL();
    $aDAl3 = new usersDAL();
    
    $aInfo1 = $aDAl1->getPageCount('');
    $aInfo2 = $aDAl2->getPageCount('');
    $aInfo3 = $aDAl3->getUserTotalCount(0);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>後臺管理首頁</title>
</head>

<body>
<?php require_once "../Common/topNav.php"; ?>
<div class="main">
    <div class="container">
        <h1 class="text-center mb-5">後臺管理</h1>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-white shadow-lg" style="background-color: #148580;">
                    <div class="card-body">
                        <h2 class="card-title">文章管理</h2>
                        <p class="card-text">進行文章的新增、編輯和刪除操作。</p>
                        <h3 style="margin-top: 70px">目前有 <span style="color: #0032c9; text-decoration: underline;"><?php echo $aInfo1 ?>文章</span>在平臺</h3>
                        
                    </div>
                    <a href="articleManagement.php" class="btn btn-primary fs-6">進入<b>文章管理</b></a>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 text-white shadow-lg" style="background-color: #148580;">
                    <div class="card-body">
                        <h2 class="card-title">作品管理</h2>
                        <p class="card-text">進行作品的新增、編輯和刪除操作。</p>

                        <h3 style="margin-top: 70px">目前有 <span style="color: #0032c9; text-decoration: underline;"><?php echo $aInfo2 ?>作品</span>在平臺</h3>
                        
                    </div>
                    <a href="workManagement.php" class="btn btn-primary fs-6">進入<b>作品管理</b></a>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 text-white shadow-lg" style="background-color: #148580;">
                    <div class="card-body">
                        <h2 class="card-title">會員管理</h2>
                        <p class="card-text">進行會員的新增、編輯和刪除操作。</p>
                        <h3 style="margin-top: 70px">目前有 <span style="color: #0032c9; text-decoration: underline;"><?php echo $aInfo3 ?>會員</span >在平臺</h3>
                        
                    </div>
                    <a href="memberManagement.php" class="btn btn-primary fs-6">進入<b>會員管理</b></a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php require_once "../Common/footer.php" ?>
</body>
</html>