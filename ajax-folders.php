<?php require_once ('includes/functions.php'); ?>
<?php $directories = glob(DRIVE_PATH . '\*' , GLOB_ONLYDIR); ?>
<!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <?php
    foreach ($directories as $dir) {
      $song_folder = str_replace (DRIVE_PATH.'\\','',$dir);
      echo "<li role='presentation'>
      <a href='#$song_folder' aria-controls='$song_folder' role='tab' data-toggle='tab'>
          <span class='icon-folder' aria-hidden='true'></span>
          $song_folder
      </a></li>";
    }
    ?>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">...</div>
  </div>
