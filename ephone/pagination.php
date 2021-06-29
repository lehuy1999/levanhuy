<div class="page">
    <?php
        if($current_page > 2) {
            $firt_page = 1;
    ?>
    <a class="page-item" href="?item_page=<?= $item_page ?>&page=<?= $firt_page ?>">First</a>
    <?php } ?>

    <?php for($num = 1; $num <= $total_page; $num++) { ?>
        <?php if($num != $current_page) { ?>
        <?php if($num > $current_page - 3 && $num < $current_page + 3) { ?>

        <a class="page-item" href="?item_page=<?=$item_page?>&page=<?=$num?>"><?=$num?></a>
        
        <?php } ?>
        <?php } else { ?>
            <strong class="current-page"><?=$num?></strong>
        <?php } ?>
    <?php } ?>

    <?php
        if($current_page < $total_page - 2) {
            $last_page = $total_page;
    ?>
    <a class="page-item" href="?item_page=<?=$item_page?>&page=<?=$last_page?>">Last</a>
    <?php } ?>
</div>


