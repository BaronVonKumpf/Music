<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../inc/img/Speaker.ico">

    <title>My Music Library</title>
  </head>

  <body>

    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="#"><i>My Music Library</i></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
          <li><a href="/Music/index.php">Home</a></li>
            <li><a href="/Music/index.php?controller=artist&action=home">Artists</a></li>
            <li><a href="/Music/index.php?controller=album&action=home">Albums</a></li>
             <li><a href="/Music/index.php?controller=song&action=home">Songs</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">

     <?php include('routes.php') ?>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  </body>
</html>
