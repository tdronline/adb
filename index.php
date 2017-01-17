<?php require_once ('includes/functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>wePlay - Music Database</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/default.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="js/soundmanager2-jsmin.js"></script>
    <script src="js/bar-ui.js"></script>
    <link rel="stylesheet" href="css/bar-ui.css" />
</head>
<body>

<nav class="navbar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="img/wePlay_logo.png" /></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <!--<li><a href="#">Dashboard</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Help</a></li>-->
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control search" placeholder="Search...">
            </form>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="#" title="album"><span class="icon-cd" aria-hidden="true"></span></a></li>
                <li><a href="#" title="artist"><span class="icon-user" aria-hidden="true"></span></a></li>
                <li><a href="#"><span class="icon-folder" aria-hidden="true"></span></a></li>
                <li><a href="#"><span class="icon-music" aria-hidden="true"></span></a></li>
                <li><a href="#" title="playlists"><span class="icon-file-play" aria-hidden="true"></span></a></li>
                <li><a href="#" title="stats"><span class="icon-stats-bars" aria-hidden="true"></span></a></li>
                <li><a href="#" title="search"><span class="icon-search" aria-hidden="true"></span></a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-md-10 main">
            <h1 class="page-header">Main Folders</h1>
            <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <?php
                $panels = "";
                $directories = glob(DRIVE_PATH . '\*' , GLOB_ONLYDIR);
                foreach ($directories as $dir) {
                  $sub_folders = "";
                  $song_folder = str_replace (DRIVE_PATH.'\\','',$dir);
                  echo "<li role='presentation'>
                  <a href='#$song_folder' aria-controls='$song_folder' role='tab' data-toggle='tab'>
                      <span class='icon-folder' aria-hidden='true'></span>
                      $song_folder
                  </a></li>";

                  $sub_directories = glob($dir."\*", GLOB_ONLYDIR);
                  foreach ($sub_directories as $sub_dir) {
                    $sub_song_folder = str_replace ($dir.'\\','',$sub_dir);
                    $sub_folders .= "<li class='list-group-item'><span class='icon-folder' aria-hidden='true'></span> $sub_song_folder</li>";
                  }
                  $panels .= "<div role='tabpanel' class='tab-pane' id='$song_folder'>
                  <ul class='list-group'>
                  $sub_folders
                  </ul>
                  </div>";
                }
                ?>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <?php echo $panels; ?>
              </div>
        </div>
    </div>
</div>

<?php include('tpl-player.php'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
//get folders
$('body').on("click", ".languages", function () {
    var pagerequest = $(this).attr('href');

    var request = $.ajax({
        url: pagerequest,
        method: "POST",
        dataType: "html"
    });

    request.done(function (msg) {
        $(".modal-body").html(msg);
        $('#movieInfo').modal('show');
    });

    request.fail(function (jqXHR, textStatus) {
        alert("Request failed: " + textStatus);
    });
    return false;
});
</script>
</body>
</html>
