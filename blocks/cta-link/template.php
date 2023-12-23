<?php
    [
        'title' => $title,
        'link' => $link,
    ] = $fields;
?>

<div class="container">

    <?php if ($title) { ?>
        <h2 class="title">
            <?= $title; ?>
        </h2>
    <?php } ?>

    <?php if ($link) { ?>
        <a 
            class="link"
            href="<?= $link['url']; ?>"
        >
            <?= $link['title']; ?>
        </a>
    <?php } ?>

</div>