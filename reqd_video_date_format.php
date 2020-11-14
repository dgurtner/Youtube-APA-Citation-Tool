<?php
    
    // check if the video was published, uploaded or streamed
    if (preg_match("/<strong class=\"watch-time-text\">Published/i", $youtube_page)) $date_break_1 = explode('<strong class="watch-time-text">Published', $youtube_page);
    if (preg_match("/<strong class=\"watch-time-text\">Uploaded/i", $youtube_page)) $date_break_1 = explode('<strong class="watch-time-text">Uploaded', $youtube_page);
    if (preg_match("/<strong class=\"watch-time-text\">Streamed/i", $youtube_page)) $date_break_1 = explode('<strong class="watch-time-text">Streamed', $youtube_page);
    
    // create correct APA date format
    $date_break_2 = explode('</strong>', $date_break_1[1]);
    $date_break_3 = explode('on ', $date_break_2[0]);
    $date_break_4 = explode(', ', $date_break_3[1]);
    
    $video_date = ', ';
    $video_date = "$date_break_4[1], $date_break_4[0]";
    
    if ($video_date != ', ') {
        $use_this_date = $video_date;
    } else {
        $use_this_date = date("Y, F j");
    }
    
?>
