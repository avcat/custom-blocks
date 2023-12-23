<?php
    $class_names = $block['cb_block_classname'];
    if (!empty($block['className'])) {
        $class_names .= ' ' . $block['className'];
    }
    
    $fields = get_field('fields');

    if (isset($fields['alignment'])) {
        $class_names .= ' alignment-' . $fields['alignment'];
    }

    $wrapper_element = 'section';
    if ($block['title'] === 'Footer') {
        $wrapper_element = 'footer';
    }
?>

<<?= $wrapper_element ?> class="<?= $class_names; ?>">

    <?php block_render_template_front($block, $fields); ?>

</<?= $wrapper_element ?>>