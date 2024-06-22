<?php
require_once dirname(__FILE__) . '/../DAL/workDAL.php';
require_once dirname(__FILE__) . '/../DAL/titleDAL.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';

$aDAl1 = new workDAL();
$aDAl2 = new titleDAL();

$aInfo1 = $aDAl1->getOneById($id);

$category = $aDAl2->getTitlebyId($aInfo1->category, 'Work');

$content = $aDAl1->getContentTxt($aInfo1->content, 'Work');

$image = $aDAl1->getImageFile($aInfo1->image, 'Work');

$video = $aDAl1->getVideoFile($aInfo1->video, 'Work');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增作品</title>
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
            <a href="editArticle.php" class="btn btn-primary mb-3">新增作品</a>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">
                                <i class="fas fa-edit"></i> 輸入相關資料
                            </h3>
                            <input type="hidden" id="img" value="<?php echo $image; ?>">
                            <form id="workForm" action="../BLL/Work/saveWork.php" method="POST"
                                enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="hidden" id="save" name="save" value="save">
                                <div class="form-group">
                                    <label for="category">分类</label>
                                    <select class="form-select" id="category" name="category">
                                        <?php foreach ($titles as $title): ?>
                                            <option value="<?php echo $title->id; ?>" <?php echo ($category->id == $title->id) ? 'selected' : ''; ?>>
                                                <?php echo $title->category; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">標題</label>
                                    <input type="text" class="form-control" id="title" name="title" value=<?php echo $aInfo1->title ?>>
                                </div>
                                <div class="form-group">
                                    <label for="content">內容</label>
                                    <textarea class="form-control" id="content" name="content"
                                        rows="5"><?php echo $content; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">圖片</label>
                                    <input type="file" class="custom-file-input" id="image" name="image"
                                        accept="image/*">
                                </div>
                                <div class="form-group">
                                    <label for="video">影片</label>
                                    <div class="embed-responsive embed-responsive-16by9 mb-3"
                                        style="border: 1px solid #ddd; background-color: #f0f0f0;">
                                        <video id="videoPreview" class="embed-responsive-item" controls
                                            style="width: 100%;">
                                            <?php if (!empty($video)): ?>
                                                <source src="<?= $video ?>" type="video/mp4">
                                            <?php endif; ?>
                                        </video>
                                    </div>
                                    <input type="file" class="d-none" id="videoFile" name="video" accept="video/mp4">
                                    <button type="button" class="btn btn-primary"
                                        onclick="document.getElementById('videoFile').click();">選擇檔案</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer text-left">
                        <button id="btnPos" type="button" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i> 發佈
                        </button>
                        <button type="button" id="btnSave" class="btn btn-secondary">
                            <i class="fas fa-save"></i> 暫存
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 刪除確認彈窗 -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">刪除文章</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        確定要刪除此文章嗎？
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                        <button type="button" class="btn btn-danger">刪除</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once "../Common/footer.php" ?>
    <script src="editWork.js?v=2023"></script>
</body>

</html>