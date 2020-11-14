<!DOCTYPE html>
<html>
<head>
  <!-- version 201810021503 -->
  <title>Paste a List - Citing Youtube Videos</title>
  <link rel="stylesheet" type="text/css" href="style.css?<?php require('reqd_force_reload_assets.php') ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="numpy.css?<?php require('reqd_force_reload_assets.php') ?>" />
  <style type="text/css" id="switch"></style>
  <style type="text/css">
    #main {
      width: auto;
    }
  </style>
  
</head>
<body id="rapper">
  <div id="main">

<?php

$sent_me_links = $_POST['youtube_link_list'];
$links_to_array = explode("\r\n", $sent_me_links);

print '<!-- 

 ';
print_r($links_to_array);
print ' 
 -->';

$current_date = date("F j, Y");

if ($sent_me_links != '' || $sent_me_links != null) {
  
  $count_links = 0;
  $link_sum = count($links_to_array) - 1;
  
  while ($count_links <= $link_sum) {
    $youtube_link = $links_to_array[$count_links];
        
    // video title n'stuff
    require('reqd_video_title_nstuff.php');
    
    // format video date
    require('reqd_video_date_format.php');
    
    // make months pretty
    require('reqd_make_months_pretty.php');
          
    $print_it = "<p>$video_producer (Producer). ($make_months_pretty). <em>$video_title</em>. Retrieved $current_date,&nbsp;<a href='$youtube_link' target='_blank' title='$video_title' rel='noopener' class='inline_disabled' id='youtube_link_$count_inputs'>$youtube_link</a></p>";
    
    require('reqd_cite_in_spanish.php');
    
    if ($video_title != '' || $video_title != null) {
      // print $print_it;
      $alef_bet[] .= $print_it;
    }
    
    $count_links++;
    $print_it = '';

  }

  // print 'sort<br><br>';
  require('reqd_alef_bet.php');
  
  if($cite_in_spanish != '' && $cite_in_spanish === 'por favor') {
    $thors_button = '<p><a class="another" href="/citingyoutube/add_urls.php" title="¡otra ves!">¡más!</a></p>';
  } else {
    $thors_button = '<p><a class="another" href="/citingyoutube/add_urls.php" title="Do Another!">another!</a></p>';
  }

  print $thors_button;

} else {

?>
    <form action="/citingyoutube/add_urls.php" method="post" name="just_urls" id="theform">
      <textarea name="youtube_link_list" id="youtube_link_list" rows="20" cols="80" autofocus></textarea>
      <p><input type="checkbox" name="espanol" value="por favor">Make Citation(s) Spanish</p>
      <p><input type="submit" name="send_me_links" value="cite!" id="send_link_list"></p>
    </form>

  </div>
<?php
}

// require_once "sidebar.php";

?>
  <div class="clear_fix"></div>
  
</body>
</html>

