<?php
require_once dirname(__FILE__) . '/../DAL/workDAL.php';
require_once dirname(__FILE__) . '/../DAL/usersDAL.php';
require_once dirname(__FILE__) . '/../DAL/titleDAL.php';

$no = isset($_GET['no']) ? $_GET['no'] : '';

$aDAl1 = new workDAL();
$aDAl2 = new usersDAL();
$aDAL3 = new titleDAL();

if ($no){
    $aDAl1->addView($no);
    $aInfo1 = $aDAl1->getOnebyId($no);
    $titl = $aDAL3->getTitlebyId($aInfo1->category, 'Work');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>作品</title>
</head>

<body>
    <div class="top">

        <?php require_once("../Common/topNav.php") ?>
    </div>
    <div class="main">
        <div class="container">
            <div class="col-6 pt-2 text-center">
                <h4 style="color: blue"><a href="articleList.php"><b>所有作品</b></a>/ <?php echo $titl->category ?></h4>
            </div>
            <?php require_once "../Common/workTitle.php" ?>
            <?php
                $author = $aDAl2->getNameById($aInfo1->userNo);
                $theTime = $aInfo1->create_date.
	           '<i class="fas fa-pencil-alt" style="margin-left:20px;"></i> '.$author->fullname.
	           ' <i class="far fa-eye" style="margin-left:20px;"></i> ' . $aInfo1->viewCX;
                $photo = $aInfo1->image ? $aInfo1->image : 'autoPic.jpg';
                $content = $aDAl1->getContentTxt($aInfo1->content, 'Work');
            ?>
                <main class="container mt-3">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-9">
                            <div class="card mt-3 mb-3">
                                <div class="row p-3">
                                    <div class="col-12 text-md font15">
                                        <h1><?php echo $aInfo1->title ?></h1> 
                                    </div>
                                </div>
                                <div class="row p-3">
                                    <div class="col-12 small">
                                        <?php echo $theTime; ?>
                                    </div>
                                </div>
                                <div class="row p-3">
                                    <div class="col-12 my-summernote">
                                        <img class="img-fluid" src="../_uploads/Work/Image/<?php echo $photo ?>" alt="">
                                    </div> 
                                </div>
                                <div class="row p-3">
                                    <div class="col-12 my-summernote">
                                        <?php echo $content; ?>
                                    </div> 
                                </div>
                                <div class="row p-3" >
                                    <div class="col-12 my-summernote">
                                        <video controls poster="<?php echo $preview_image_url; ?>"
                                        style="width: 100%;">
                                        <source src="../_uploads/Work/Video/<?php echo $aInfo1->video ?>" type="video/mp4">
                                        </video>
                                    </div> 
                                </div>
                            </div>
                        </div>

                    </div>
        </div>
        
        <?php require_once("../Common/footer.php") ?>
</body>

</html>