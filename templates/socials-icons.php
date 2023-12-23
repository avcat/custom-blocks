<?php
    $socials_links = $args['socials_links'];
?>

<?php if ($socials_links && !empty($socials_links)) { ?>
    <ul class="socials_items">
        <?php
        foreach ($socials_links as $socials_link) {
            [
                'type' => $type,
                'link' => $link,
            ] = $socials_link;
        ?>
            <li class="socials_item">
                <a class="socials_link" href="<?= $link['url']; ?>">
                    <svg class="socials_icon">
                        <use href="<?= CB_IMG_DIR; ?>/icons.svg#<?= $type; ?>"></use>
                    </svg>
                </a>
            </li>
        <?php } ?>
    </ul>
<?php } ?>