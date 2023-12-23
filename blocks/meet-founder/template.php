<?php
    [
        'background_image' => $background_image,
        'title' => $title,
        'subtitle' => $subtitle,
        'link_button' => $link_button,
        'socials' => $socials,
    ] = $fields;
?>

<?php if ($background_image) { ?>
    <div class="bg-image-wrapper">
        <img 
            class="bg-image"
            src="<?= $background_image['url']; ?>" 
            alt="<?= $background_image['title']; ?>"
        >
    </div>
<?php } ?>

<div class="container">

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

    <?php if ($link_button) { ?>
        <a class="link_button" href="<?= $link_button['url']; ?>">
            <?= $link_button['title']; ?>
        </a>
    <?php } ?>

    <?php
        [
            'title' => $socials_title,
            'links' => $socials_links,
        ] = $socials;
    ?>
    <?php if ($socials_title) { ?>
        <h3 class="socials_title">
            <?= $socials_title; ?>
        </h3>
    <?php } ?>

    <?php cb_get_template(
        'socials-icons',
        [
            'socials_links' => $socials_links
        ]
    ); ?>

</div>