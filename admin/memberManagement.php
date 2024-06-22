<?php
    require_once "../DAL/usersDAL.php";
    require_once "../DAL/levelDAL.php";

    $pageNo = isset($_GET['pageno']) ? $_GET['pageno'] : '1';

    $Type = isset($_GET['type']) ? $_GET['type'] : '0';

    $aDAl1= new usersDAL();
    $aDAl2= new levelDAL();

    $aInfo2= $aDAl2->getLevel();

    $pageSize = 5;

    // 載入一頁的資料
    $pageStart = ($pageNo - 1) * $pageSize;

    $aInfo1 = $aDAl1->getUserByPage($Type, $pageStart, $pageSize);

    $total = $aDAl1->getUserTotalCount($Type);

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
        <?php require_once "../Common/topNav.php"?>
    </div>

    <div class="main">
        <div class="container">
            <h1>會員管理</h1>
            <div class="row text-start">
                <div class="col-lg-12">
                    <button id="registerBtn" class="btn btn-success btn-lg btn-block m-1"><i class="fa-solid fa-plus"></i> 新增會員</button>
                </div>
            </div>
            <select class="form-select" name="selectType" id="selectType">
                <option value="0" <?php echo $Type == 0? "selected" : '' ?>>全部</option>
                <?php foreach($aInfo2 as $aItem2){
                    echo '<option value="'.$aItem2->level_id.'" '. ($aItem2->level_id == $Type ? "selected": '') .'>'.$aItem2->permis.'</option>';
                } ?>
            </select>
            <table class="table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col" class="border-2 border-light bg-info align-middle">#</th>
                        <th scope="col" class="border-2 border-light bg-info align-middle">全名</th>
                        <th scope="col" class="border-2 border-light bg-info align-middle">Email</th>
                        <th scope="col" class="border-2 border-light bg-info align-middle">狀態</th>
                        <th scope="col" class="border-2 border-light bg-info align-middle">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($aInfo1 as $key => $aItem1){?>
                        <?php $index = $key + 1; ?>
                            <tr>
                                <td class="align-middle"> <?php echo $index ?></td>
                                <td class="align-middle"><?php echo $aItem1->fullname ?></td>
                                <td class="align-middle"><?php echo $aItem1->email ?></td>
                                <td class="align-middle">
                                    <?php if ($aItem1->level == 1): ?>
                                        <p>管理員 <i class="fa-solid fa-user-tie"></i></p>

                                    <?php elseif($aItem1->level == -1): ?>
                                        <p>停用 <i class="fa-solid fa-user-slash"></i></p>  
                                    <?php else: ?>
                                       <p>一般用戶 <i class="fa-solid fa-users"></i></p>
                                    <?php endif; ?>
                                </td>
                                <td class="align-middle">
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUser" data-id="<?php echo $aItem1->id ?>">
                                        <i class="far fa-edit"></i>編輯
                                    </button>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUser" data-id="<?php echo $aItem1->id ?>">
                                        <i class="far fa-trash-alt"></i>刪除
                                    </button>
                                </td>
                            </tr>
                    <?php } ?>                    
                </tbody>
            </table>
        </div>
    </div>

    <!-- 刪除 Modal -->
    <div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">刪除用戶</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        確定要刪除此用戶嗎？
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

    <!-- 修改 Modal -->
    <div class="modal fade" id="editUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">修改資料</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <div id="saveUser"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                <button type="button" id="btnEdit" class="btn btn-primary">確認修改</button>
            </div>
        </div>
    </div>
    </div>                                   
    <div class="row">
            <div class="col-11 d-flex justify-content-center">
                <?php require_once('../Common/MyNavPage.php'); ?> 
        </div> 
    </div>
    <div class="footer">
        <?php require_once "../Common/footer.php"?>
    </div>
    <script src="memberManagement.js"></script>
</body>
</html>

