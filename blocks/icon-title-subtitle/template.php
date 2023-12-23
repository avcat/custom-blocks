<?php
    [
        'alignment' => $alignment,
        'icon' => $icon,
        'icon_width' => $icon_width,
        'title' => $title,
        'subtitle' => $subtitle,
    ] = $fields;
?>

<div class="container">

    <?php if ($icon) { ?>
        <img class="icon" src="<?= $icon['url']; ?>" alt="<?= $icon['title']; ?>" <?php if ($icon_width) { ?> width="<?= $icon_width; ?>" <?php } ?>>
    <?php } ?>

    <?php if ($title) { ?>
        <h2 class="title">
            <?= $title; ?>
        </h2>
    <?php } ?>

    <?php if ($subtitle) { ?>
        <div class="subtitle">
            <?= $subtitle; ?>
        </div>
    <?php } ?>

</div>