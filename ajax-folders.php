<?php require_once ('includes/functions.php'); ?>
<?php $directories = glob(DRIVE_PATH . '\*' , GLOB_ONLYDIR); ?>
<div class="row placeholders">
  <?php
  foreach ($directories as $dir) {
    $song_folder = str_replace (DRIVE_PATH.'\\','',$dir);
    echo "<div class='col-xs-3 col-sm-2 languages'>
        <span class='icon-folder' aria-hidden='true'></span>
        <h4>$song_folder</h4>
    </div>";
  }
  ?>
</div>

<h2 class="sub-header">Section title</h2>
