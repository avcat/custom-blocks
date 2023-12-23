<?php

if (function_exists('acf_add_local_field_group')) :

  acf_add_local_field_group(array(
    'key' => 'group_656eb81a48800',
    'title' => 'Global Templates [Custom Blocks]',
    'fields' => array(
      array(
        'key' => 'field_656eb81b9628d',
        'label' => 'Footer Content (Page)',
        'name' => '',
        'aria-label' => '',
        'type' => 'tab',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'placement' => 'top',
        'endpoint' => 0,
      ),
      array(
        'key' => 'field_656eb85c9628e',
        'label' => '',
        'name' => 'footer_content_page_id',
        'aria-label' => '',
        'type' => 'post_object',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'post_type' => array(
          0 => 'page',
        ),
        'taxonomy' => '',
        'return_format' => 'id',
        'multiple' => 0,
        'allow_null' => 1,
        'ui' => 1,
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'theme-global-tpls',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
  ));

endif;
