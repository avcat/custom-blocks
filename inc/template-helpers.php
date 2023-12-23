<?php

function cb_get_testimonial_data($testimonial) {
    [
        'ID' => $testimonial_id,
        'post_content' => $testimonial_text,
        'post_title' => $post_title,
    ] = json_decode(json_encode($testimonial), true);

    $client_name_acf = get_field('author_name', $testimonial_id);
    $client_name = $client_name_acf ? $client_name_acf : $post_title;
    $client_position = get_field('author_source', $testimonial_id);
    $client_picture = get_field('author_avatar', $testimonial_id);

    $company_logo = get_field('company_logo', $testimonial_id);
    
    $video_youtube_video_id = get_field('video_youtube_video_id', $testimonial_id);
    $video_placeholder = get_field('video_placeholder', $testimonial_id);
    $testimonial_type = $video_youtube_video_id ? 'video' : 'text';

    $case_study = get_field('сase_obj', $testimonial_id);

    return [
        'testimonial_text' => $testimonial_text,
        'client_name_acf' => $client_name_acf,
        'client_name' => $client_name,
        'client_position' => $client_position,
        'client_picture' => $client_picture,
        'company_logo' => $company_logo,
        'video_youtube_video_id' => $video_youtube_video_id,
        'video_placeholder' => $video_placeholder,
        'testimonial_type' => $testimonial_type,
        'case_study' => $case_study,
    ];
}