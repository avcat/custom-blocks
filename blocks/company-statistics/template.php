<?php
    [
        'statistic_items' => $statistic_items,
    ] = $fields;
?>

<div class="container">

    <?php if ($statistic_items && !empty($statistic_items)) { ?>
        <ul class="statistic-items">
            <?php 
                foreach ($statistic_items as $statistic_item) { 
                    $how_many = $statistic_item->post_content;
                    $of_what = $statistic_item->post_title;
                    
                    $alternative_title = get_field('title_with_linebreak', $statistic_item->ID);
                    if ($alternative_title) {
                        $of_what = $alternative_title;
                    }
            ?>
                <li class="statistic-item">
                    <p class="how-many">
                        <?= $how_many; ?>
                    </p>
                    <p class="of-what">
                        <?= $of_what; ?>
                    </p>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>

</div>