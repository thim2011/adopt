<?php
    require_once dirname(__FILE__) . '/../DAL/titleDAL.php';


    $titleArticleDAL = new titleDAL();

    $titles = $titleArticleDAL->getAllArticleTitle();
?>

<div class="btn-group d-flex align-items-center justify-content-center text-center" role="group" aria-label="Article Categories">
    <div class="witdh">
    <?php foreach ($titles as $title): ?>
        <a href="../user/articleList.php?category=<?php echo $title->id; ?>&pageno=1" class="btn btn-success btn-lg btn-block m-1">
            <?php echo $title->category; ?>
        </a>
    <?php endforeach; ?>
    </div>
</div>