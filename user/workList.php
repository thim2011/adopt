<?php
    require_once dirname(__FILE__) . '/../DAL/workDAL.php';
    require_once dirname(__FILE__) . '/../DAL/titleDAL.php';
    require_once dirname(__FILE__) . '/../DAL/usersDAL.php';

    $pageNo = isset($_GET['pageno']) ? $_GET['pageno'] : '1';

    $category = isset($_GET['category']) ? $_GET['category'] : '';

    $aDAl1 = new workDAL();
    $aDAL2 = new titleDAL();
    $aDAl3 = new usersDAL();

    $titl = $category?$aDAL2->getTitlebyId($category, 'Work'):'全部';
    //一頁要幾筆資料
    $pageSize = 5;

    // 載入一頁的資料
    $pageStart = ($pageNo - 1) * $pageSize;

    $aInfo1 = $aDAl1->getWorkByPage($category, $pageStart, $pageSize);
    
    $total = $aDAl1->getPageCount($category);

    $totalpage = intval( ($total + $pageSize -1) / $pageSize );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="top">
        <?php require_once("../Common/topNav.php") ?>
    </div>
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-6 pt-2 text-center">
                    <h4 style="color: blue"><a href="articleList.php"><b>所有作品</b></a>/ <?php echo $titl=='全部'? $titl :$titl->category ?></h4>
                </div>
            <?php require_once "../Common/workTitle.php" ?>
            <?php
                foreach ($aInfo1 as $aItem1) {
                    $url = 'work.php?no=' . $aItem1->id;
                    $author = $aDAl3->getNameById($aItem1->userNo);
                    $content = $aDAl1->getContentTxt($aItem1->content, 'Work');
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
                                            <img class="card-img-top" src="../_uploads/Work/Image/<?php echo $aItem1->image ?>">
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <h5><a href="<?php echo $url; ?>"><?php echo $aItem1->title ?></a></h5><?php echo $theTime; ?>
                                            <p class="card-text"><?php  echo mb_substr($content, 0, 400).'...'; ?></p>
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
        <input type="hidden" name="category" value="<?php echo $category ?>">
        <div class="row mt-3">
            <div class="col-12 d-flex justify-content-center">
				<?php require_once('../Common/MyNavPage.php'); ?> 
            </div>
        </div>
    </div>

    <?php require_once("../Common/footer.php") ?>
    <script src="workList.js?v=2023"></script>
</body>

</html>