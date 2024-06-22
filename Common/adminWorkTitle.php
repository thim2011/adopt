<?php
    require_once dirname(__FILE__) . '/../DAL/titleDAL.php';

    $titleWorkDAL = new titleDAL();

    $titles = $titleWorkDAL->getAllWorkTitle();
?>

<div class="btn-group d-flex justify-content-center" role="group" aria-label="Article Categories">
    <?php foreach ($titles as $title): ?>
        <a href="../admin/workManagement.php?category=<?php echo $title->id; ?>&pageno=1" class="btn btn-success btn-lg btn-block m-1">
            <?php echo $title->category; ?>
        </a>
    <?php endforeach; ?>
</div>