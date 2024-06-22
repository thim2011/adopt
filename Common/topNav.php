
<?php 
    session_start();
    $url = $_SERVER['PHP_SELF'];
    $dir = basename(dirname($url));
    $file = basename($url);
    $file1 = $dir.'/'.$file;
    $act ='active';

    if(isset($_SESSION['level'])) if($_SESSION['level']===-1) header('Location: ../Home/login.php');
       

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css">
<link rel="stylesheet" href="../plugins/css/fontawesome.min.css">
<link rel="stylesheet" href="../plugins/css/fontawesome.css">
<link rel="stylesheet" href="../css/Body.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
<div class="fixed-top shadow-sm" style="background-color: #f9f9f9;">
    <div class="row justify-content-between align-items-center">
        <div class="col-2">
            <a href="../user/index.php"><img width="150px" src="../images/logo1.png" alt=""></a>
        </div>
        <div class="col-6">
            <ul class="nav nav-tabs nav-fill ">
                <li class="nav-item">
                    <a class="nav-link <?php if ($file1 === 'user/index.php') echo $act; ?>" aria-current="page" href="../user/index.php">首頁</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($file1 === 'user/articleList.php' || $file1 === 'user/article.php' ) echo $act; ?>" href="../user/articleList.php">所有文章</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($file1 === 'user/workList.php' || $file1 === 'user/work.php') echo $act; ?>" href="../user/workList.php">所有作品</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($file1 === 'user/about.php') echo $act; ?>" href="../user/about.php">關於我們</a>
                </li>
                <?php
                if(isset($_SESSION['level'])) 
                    if($_SESSION['level']==1){?>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($file1 === 'admin/index.php') echo 'active'; ?>" href="../admin/index.php">後臺管理</a>
                        </li>
                    <?php } ?>
                <?php
                    if(!isset($_SESSION['userName'])){ ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($file1 === 'Home/registerForm.php') echo $act; ?>" href="../Home/registerForm.php">註冊</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="col-2 text-end">
            <div class="dropdown">
                <button class="btn btn-lg dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <span style="color: black"><?php echo isset($_SESSION['userName'])?$_SESSION['userName']:'訪客' ?> <i class="fa-solid fa-user"></i></span>
                </button>

                <?php if(isset($_SESSION['userName'])){ ?>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="../Home/logout.php">登出</a></li>
                    </ul>
                <?php }else{ ?>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="../Home/login.php">登入</a></li>
                    </ul>
                <?php }?>
            </div>
        </div>
    </div>
</div>


<!--  -->