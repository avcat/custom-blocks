<?php
    [
        'title' => $title,
        'links' => $socials_links,
    ] = $fields;
?>

<div class="container">

    <?php if ($title) { ?>
        <h2 class="title">
            <?= $title; ?>
        </h2>
    <?php } ?>

    <?php cb_get_template(
        'socials-icons',
        [
            'socials_links' => $socials_links
        ]
    ); ?>

</div>