<?php
    $socials = $args['socials'];
    $count_socials = count($socials);

    $is_odd = $count_socials % 2 !== 0;

    if ($is_odd) {
        $center_index = floor($count_socials / 2);
    }
?>

<ul 
    class="footer-socials <?= $is_odd ? 'odd' : '' ?>"
    style="--count-socials: <?= $count_socials ?>"
>
    <?php foreach ($socials as $index => $social) { ?>
        <?php
            [
                'type' => $type,
                'link' => $link,
            ] = $social;

            $is_center_class = $index + 1 == $center_index ? 'center' : '';
        ?>
        <li class="footer-social-item <?= $is_center_class ?>">
            <a
                class="footer-social-link" 
                href="<?= $link['url'] ?>"
            >
                <svg title="<?= $link['title'] ?: $type ?>">
                    <use href="<?= CB_IMG_DIR; ?>/footer-socials.svg#<?= $type ?>"></use>
                </svg>
            </a>
        </li>
    <?php } ?>
</ul>