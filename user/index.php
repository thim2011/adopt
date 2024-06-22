<?php
    require_once dirname(__FILE__) . '/../DAL/articleDAL.php';
    require_once dirname(__FILE__) . '/../DAL/workDAL.php';
    require_once dirname(__FILE__) . '/../DAL/usersDAL.php';

    $category = isset($_GET['category']) ? $_GET['category'] : '';

    $pageNo = isset($_GET['pageno']) ? $_GET['pageno'] : 1;

    $aDAl1 = new articleDAL();
    $aDAl2 = new workDAL();
    $aDAl3 = new usersDAL();

    $titl = $category?$category:'全部';

    //一頁要幾筆資料
	$pageSize = 5;

    $pageStart = ($pageNo - 1) * $pageSize;

    $aInfo1 = $aDAl1->getArticleByPage($category, $pageStart, $pageSize);
 
    $aInfo2 = $aDAl2->getWorkByPage($category, $pageStart, $pageSize);
?>

<!DOCTYPE html>
<html lang="zh-Tw">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="浪愛協會網站">
    <title>浪愛協會</title>
    <link rel="shortcut icon" href="images/rocket.ico">
</head>

<body>
    <div class="top">
        <?php require_once "../Common/topNav.php" ?>
    </div>

    <div class="main">
        <div class="container">

            <!-- Artical--------------------------- -->
            <div class="row">
                <div class="col-6 pt-2 text-center">
                    <h4 style="color: blue"><a href="articleList.php"><b>所有文章</b></a>/ 新文章</h4>
                </div>
                <div class="col-6 pt-2 text-center">
                    <a href="articleList.php">更多文章<i class="fas fa-angle-double-right"></i></a>
                </div>
                <?php require_once "../Common/articleTitle.php" ?>
                <?php
                foreach ($aInfo1 as $aItem1) {
                    $url = 'article.php?no=' . $aItem1->id;
                    $author = $aDAl3->getNameById($aItem1->userNo);
                    $content = $aDAl1->getContentTxt($aItem1->content, 'Article');
                    $theTime = '<small>'.$aItem1->create_date.
                    '<i class="fas fa-pencil-alt" style="margin-left:20px;"></i>  '.$author->fullname.
                    ' <i class="far fa-eye" style="margin-left:20px;"></i> '.$aItem1->viewCX.'</small>';
                ?>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <div class="card mt-3">
                                    <div class="row p-3">
                                        <div class="col-12 col-lg-4 pb-3">
                                            <img class="card-img-top img-fluid" src="../_uploads/Article/Image/<?php echo $aItem1->image ?>">
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <h5><a href="<?php echo $url; ?>"><?php echo $aItem1->title ?></a></h5><?php echo $theTime; ?>
                                            <p class="card-text"><?php echo mb_substr($content, 0, 300).'...'; ?></p>
                                            <div class="text-end">
                                                <a href="<?php echo $url ?>">....閱讀全文....</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-6 pt-2 text-center">
                    <h4 style="color: blue"><a href="workList.php"><b>所有作品</b></a>/ 新作品</h4>
                </div>
                <div class="col-6 pt-2 text-center">
                    <a href="workList.php">更多作品<i class="fas fa-angle-double-right"></i></a>
                </div>
                <?php require_once "../Common/workTitle.php" ?>
                <?php foreach ($aInfo2 as $aItem2) {
                    $url = 'work.php?no=' . $aItem2->id;
                    $author = $aDAl3->getNameById($aItem2->userNo);
                    $content = $aDAl2->getContentTxt($aItem2->content, 'Work');
                    $theTime =  '<small>'.$aItem1->create_date.
                    '<i class="fas fa-pencil-alt" style="margin-left:20px;"></i> '.$author->fullname.
                    ' <i class="far fa-eye" style="margin-left:20px;"></i> '.$aItem1->viewCX.'</small>';
                ?>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <div class="card mt-3">
                                    <div class="row p-3">
                                        <div class="col-12 col-lg-4 pb-3">
                                            <img class="card-img-top" src="../_uploads/Work/Image/<?php echo $aItem2->image ?>" ?>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <h5><a href="<?php echo $url; ?>"><?php echo $aItem2->title ?></a></h5><?php echo $theTime; ?>
                                            <p class="card-text"><?php echo mb_substr($content, 0, 400).'...'; ?></p>
                                            <div class="text-end">
                                                <a href="<?php echo $url ?>">....閱讀全文....</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php require_once "../Common/footer.php" ?>
</body>

</html>