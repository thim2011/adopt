<?php
require_once dirname(__FILE__) . '/../../DAL/usersDAL.php';

$aDAl1 = new usersDAL();

$id = $_POST['id'];

$aInfo1 = $aDAl1->getOnebyID($id);
?>
    <form id="UserForm" name="UserForm">
        <div class="form-group">
            <label for="fullname">全名：</label>
            <input type="text" class="form-control" name="fullname" placeholder="輸入全名" value="<?php echo $aInfo1->fullname ?>">
        </div>
        <div class="form-group">
            <label for="email">Email：</label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" value="<?php echo $aInfo1->email ?>">
        </div>
        <div class="form-group">
            <label for="username">帳號：</label>
            <input type="text" class="form-control" name="username" value="<?php echo $aInfo1->username ?>">
        </div>
        <div class="form-group">
            <label for="password">密碼：</label>
            <input type="text" class="form-control" name="password" value="<?php echo $aInfo1->password ?>">
        </div>
        <div class="form-group">
            <label for="level">權限：</label>
            <select class="form-select" name="level" id="level">
                <option value="1" <?php echo $aInfo1->level == '1' ?"selected":'' ?>>管理員</option>
                <option value="2" <?php echo $aInfo1->level == '2' ?"selected":''?>>一般用戶</option>
                <option value="-1" <?php echo $aInfo1->level == '-1' ?"selected":''?>>停用</option>
            </select>
            <small>*管理員=1 </small><small> *使用者=2 </small><small> *停用=-1</small>
        </div>
        <input type="hidden" name="id" value="<?php echo $aInfo1->id ?>">
    </form>
