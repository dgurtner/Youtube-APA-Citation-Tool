<?php

    $youtube_page = '';
    $youtube_page = file_get_contents($youtube_link);
    $title_break1 = explode('<title>', $youtube_page);
    $title_break2 = explode(' - YouTube</title>', $title_break1[1]);
    // $video_title = ucwords(strtolower($title_break2[0]));
    $video_title = ucwords($title_break2[0]);
    
    $pub_break1 = explode('<div class="unsubscribe-confirmation-message">', $youtube_page);
    $pub_break2 = explode('?', $pub_break1[1]);
    $pub_break3 = explode('Unsubscribe from ', $pub_break2[0]);
    $video_producer = $pub_break3[1];

?>
