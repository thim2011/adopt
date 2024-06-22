<?php
session_start();
require_once dirname(__FILE__) . '/../../DAL/articleDAL.php';

$id = isset($_POST['id']) ? $_POST['id'] : '';
$content = $_POST['content'];
$image = $_FILES['image'];
$save = $_POST['save'];

$aDAL1 = new articleDAL();
$aInfo1 = new stdClass();

if ($id != '') {
    $aInfo1->id = $id;
} else {
    $aInfo1->id = '';
    $id = $aDAL1->getLastKey();
}

$contentFileName = str_pad($id, 4, '0', STR_PAD_LEFT) . '.txt';

$contentPath = '../../_uploads/Article/Content/' . $contentFileName;
file_put_contents($contentPath, $content);

if ($image) {
    $imageName = str_pad($id, 4, '0', STR_PAD_LEFT);

    if ($image['type'] === 'image/jpeg' || $image['type'] === 'image/jpg') {
        $imageFileName = $imageName . '.jpg';
        $imagePath = '../../_uploads/Article/Image/' . $imageFileName;
    } else if ($image['type'] === 'image/png') {
        $imageFileName = $imageName . '.png';
        $imagePath = '../../_uploads/Article/Image/' . $imageFileName;
    }

    move_uploaded_file($image['tmp_name'], $imagePath);
}else {
    $imageFileName = '';
}

$aInfo1->userNo = $_SESSION['userNo'];
$aInfo1->title = $_POST['title'];
$aInfo1->category = $_POST['category'];
$aInfo1->content = $contentFileName;
$aInfo1->publish = 1;
$aInfo1->create_date = date("Y-m-d H:i:s");
$aInfo1->modify_date = date("Y-m-d H:i:s");
$aInfo1->image = $imageFileName;
$aInfo1->save = $save;
$result = $aDAL1->save($aInfo1);

header("Location: ../../admin/articleManagement.php");
exit();
?>