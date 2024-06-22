<?php
session_start();
require_once dirname(__FILE__) . '/../../DAL/workDAL.php';

$id = isset($_POST['id']) ? $_POST['id'] : '';

$videoFile = $_FILES['video'];
$content = $_POST['content'];
$image = $_FILES['image'];
$save = $_POST['save'];

$aDAL1 = new workDAL();
$aInfo1 = new stdClass();

if ($id != '') {
    $aInfo1->id = $id;
} else {
    $aInfo1->id = '';
    $id = $aDAL1->getLastKey();
}

$contentFileName = str_pad($id, 4, '0', STR_PAD_LEFT) . '.txt';

$contentPath = '../../_uploads/Work/Content/' . $contentFileName;
file_put_contents($contentPath, $content);


if ($image) {
    $imageName = str_pad($id, 4, '0', STR_PAD_LEFT);

    if ($image['type'] === 'image/jpeg' || $image['type'] === 'image/jpg') {
        $imageFileName = $imageName . '.jpg';
        $imagePath = '../../_uploads/Work/Image/' . $imageFileName;
    } else if ($image['type'] === 'image/png') {
        $imageFileName = $imageName . '.png';
        $imagePath = '../../_uploads/Work/Image/' . $imageFileName;
    }

    move_uploaded_file($image['tmp_name'], $imagePath);
} else
    $imageFileName = '';

if ($videoFile) {
    $videoFileName = str_pad($id, 4, '0', STR_PAD_LEFT) . '.mp4';

    $videoPath = '../../_uploads/Work/Video/' . $videoFileName;

    move_uploaded_file($videoFile['tmp_name'], $videoPath);
} else {
    $videoFileName = '';
}

$aInfo1->userNo = $_SESSION['userNo'];
$aInfo1->title = $_POST['title'];
$aInfo1->category = $_POST['category'];
$aInfo1->content = $contentFileName;
$aInfo1->publish = 1;
$aInfo1->create_date = date("Y-m-d H:i:s");
$aInfo1->modify_date = date("Y-m-d H:i:s");
$aInfo1->image = $imageFileName;
$aInfo1->video = $videoFileName;
$aInfo1->save = $save;
$result = $aDAL1->save($aInfo1);

header("Location: ../../admin/WorkManagement.php");
exit();
?>