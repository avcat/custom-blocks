<?php
    $languages = array_filter(
        $args['languages'],
        function($language) {
            if (!$language['link']) {
                return $language;
            }

            $link_basename = basename($language['link']['url']);
            $site_basename = basename(get_bloginfo('url'));

            return $link_basename !== $site_basename;
        }
    );
?>

<ul class="footer-languages">
    <?php foreach ($languages as $language) { ?>
        <?php
            [
                'flag' => $flag,
                'link' => $link,
            ] = $language;
        ?>
        <li class="language-item">
            <a
                class="footer-language-link"    
                href="<?= $link['url'] ?>"
            >
                <svg 
                    width="24"
                    height="16"
                    title="<?= $link['title'] ?: $flag ?>"
                >
                    <use href="<?= CB_IMG_DIR; ?>/flags-languages.svg#<?= $flag ?>"></use>
                </svg>
            </a>
        </li>
    <?php } ?>
</ul>