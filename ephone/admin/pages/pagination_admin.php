<div class="page">
    <?php
    if ($maxpage > 1) {
        for ($i = 1; $i <= $maxpage; $i++) {
            if ($i != $page)
                echo "<a class='page-item' href='list_order.php?pp=$ppage&p=$i'>$i</a>";
            else
                echo "<strong class='current-page'>$i</strong>";
        }
    }
    ?>
</div>