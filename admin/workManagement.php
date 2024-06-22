<?php
require_once dirname(__FILE__) . '/../DAL/workDAL.php';
require_once dirname(__FILE__) . '/../DAL/usersDAL.php';
require_once dirname(__FILE__) . '/../DAL/titleDAL.php';

$pageNo = isset($_GET['pageno']) ? $_GET['pageno'] : '1';

$category = isset($_GET['category']) ? $_GET['category'] : '';

$aDAl1 = new workDAL();
$aDAl2 = new usersDAL();
$aDAL3 = new titleDAL();
//一頁要幾筆資料
$pageSize = 10;

// 載入一頁的資料
$pageStart = ($pageNo - 1) * $pageSize;

$aInfo1 = $aDAl1->getWorkByPage($category, $pageStart, $pageSize);

$total = $aDAl1->getPageCount($category);

$totalpage = intval(($total + $pageSize - 1) / $pageSize);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文章管理</title>
</head>

<body>
    <div class="top">
        <?php require_once "../Common/topNav.php" ?>
    </div>
    <div class="main">
        <div class="container">
            <div class="row mt-3 mb-3">
                <?php require_once "../Common/adminWorkTitle.php" ?>
            </div>
            <a href="workManagement.php" class="btn btn-primary mb-3">所有作品</a>
            <a href="editWork.php" class="btn btn-primary mb-3">新增作品</a>
            <table class="table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col" class="border-2 border-light bg-info align-middle">#</th>
                        <th scope="col" class="border-2 border-light bg-info align-middle">作品圖片</th>
                        <th scope="col" class="border-2 border-light bg-info align-middle">作品影片</th>
                        <th scope="col" class="border-2 border-light bg-info align-middle">建立日期</th>
                        <th scope="col" class="border-2 border-light bg-info align-middle">修改日期</th>
                        <th scope="col" class="border-2 border-light bg-info align-middle">類別</th>
                        <th scope="col" class="border-2 border-light bg-info align-middle">主題</th>
                        <th scope="col" class="border-2 border-light bg-info align-middle">作者</th>
                        <th scope="col" class="border-2 border-light bg-info align-middle">狀態</th>
                        <th scope="col" class="border-2 border-light bg-info align-middle">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($aInfo1 as $key => $aItem1) {
                        $video_public_id  = "../_uploads/Work/Video/" . $aItem1->video;
                        $index = $key + 1;
                        $aInfo2 = $aDAl2->getNameById($aItem1->userNo);
                        $titl = $aDAL3->getTitlebyId($aItem1->category, 'Work');
                        ?>
                        <tr>
                            <td class="align-middle">
                                <?php echo $index ?>
                            </td>
                            <td class="align-middle">
                                <img src="../_uploads/Work/Image/<?php echo $aItem1->image ?>" alt="作品圖片"
                                    class="img-thumbnail img-fluid" style="width: 130px; height: 130px; object-fit: cover;">
                            </td>
                            <td class="align-middle">
                                <video controls poster="<?php echo $preview_image_url; ?>"
                                    style="width: 130px; height: 130px; object-fit: cover;">
                                    <source src="../_uploads/Work/Video/<?php echo $aItem1->video ?>" type="video/mp4">
                                </video>
                            </td>
                            <td class="align-middle">
                                <?php echo $aItem1->create_date ?>
                            </td>
                            <td class="align-middle">
                                <?php echo $aItem1->modify_date ?>
                            </td>
                            <td class="align-middle">
                                <?php echo $titl->category ?>
                            </td>
                            <td class="align-middle">
                                <?php echo $aItem1->title ?>
                            </td>
                            <td class="align-middle">
                                <?php echo $aInfo2->fullname ?>
                            </td>
                            <td class="align-middle">
                                <?php if ($aItem1->publish == 1): ?>
                                    <i class="fas fa-check text-success"></i>
                                <?php else: ?>
                                    <i class="fas fa-times text-danger"></i>
                                <?php endif; ?>
                            </td>
                            <td class="align-middle">
                                <a href="editWork.php?id=<?php echo $aItem1->id ?>" class="btn btn-primary">
                                    <i class="far fa-edit"></i>編輯
                                </a>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                    data-id="<?php echo $aItem1->id ?>">
                                    <i class="far fa-trash-alt"></i>刪除
                                </button>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- 刪除確認彈窗 -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">刪除文章</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        確定要刪除此文章嗎？
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-lg"></i>取消
                        </button>
                        <button id="btnDel" type="button" class="btn btn-danger">
                            <i class="far fa-trash-alt"></i>刪除
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" name="category" value="<?php echo $category ?>">
        <div class="row mt-3">
            <div class="col-12 d-flex justify-content-center">
                <?php require_once('../Common/MyNavPage.php'); ?>
            </div>
        </div>

    </div>
    <?php require_once "../Common/footer.php" ?>
    <script src="workManagement.js?v=2023"></script>
</body>

</html>