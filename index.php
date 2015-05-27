<?
    $name         = ucfirst(strtolower((!empty($_GET["name"])) ? $_GET["name"] : "Unbekannte/r"));

    $bg = null;
    $addCSS = null;
    $addInc = null;
    $logo = null;
    $ogImage      = (!empty($_GET["image"]) ? $_GET["image"] : $webAppPath."/img/cake.gif");

    if ($_SERVER["HTTP_HOST"] == "happy.swat.io") {

      $favicon      = "favicon-swatio.ico";
      $ogTitle      = "Happy Birthday from Swat.io, " . $name . "!";
      $ogDesc       = "Congratulations ". $name . "! Best wishes from the whole team at Swat.io, enjoy your day!";
      $webAppPath   = "http://happy.swat.io";
      $ogImage      = $webAppPath."/img/og-swatio.png";
      $twitterVia   = "swat_io";
      $logo         = "logo-swatio.svg";
      $logoUrl      = "https://swat.io";
      $addCSS       = "swatio.css";
      $addInc       = null;

    } elseif ($_SERVER["HTTP_HOST"] == "happy.walls.io") {

      $favicon      = "favicon-wallsio.ico";
      $ogTitle      = "Happy Birthday from Walls.io, " . $name . "!";
      $ogDesc       = "Congratulations ". $name . ", from the whole team at Walls.io!";
      $webAppPath   = "http://happy.walls.io";
      $twitterVia   = "walls_io";
      $logo         = "logo-wallsio.png";
      $logoUrl      = "https://walls.io";
      $addCSS       = "wallsio.css";
      $addInc       = "inc/wallsio.php";

    } else {

      $ogTitle      = "Happy Birthday, " . $name . "!";
      $ogDesc       = $name . " hat heute Geburtstag und wir möchten dir alle herzlich dazu gratulieren. Hoch sollst du leben, " .$name . "!";
      $webAppPath   = "http://like.farm/happy";
      $twitterVia   = "_subnet";

      if (!empty($_GET["cover"]) && !empty($_GET["image"])) {
        $bg = $_GET["image"];
      }
    }
    //$ogUrl        = "http://".$_SERVER["HTTP_HOST"] . rtrim(strtolower(substr($_SERVER['REQUEST_URI'],0,(strpos($_SERVER['REQUEST_URI'],"?")?strpos($_SERVER['REQUEST_URI'],"?"):strlen($_SERVER['REQUEST_URI'])))), "/");
    $ogUrl        = "http://".$_SERVER["HTTP_HOST"] . rtrim($_SERVER['REQUEST_URI']);
    $customCSS    = "";

    if ($bg) {
      $customCSS    = '<style>body{background: url('.str_replace(" ","+",($bg)).');background-size:cover;} span{opacity:0.7;}</style>';
    }

    $youtubeToken = "OemJriJPmqc";
 ?>
<!DOCTYPE html>
  <meta charset="utf-8">
  <title><?=$ogTitle?></title>
  <link rel="stylesheet" href="<?=$webAppPath?>/css/app.css">
  <? if ($addCSS) { ?>
  <link rel="stylesheet" href="<?=$webAppPath?>/css/<?=$addCSS?>">
  <? } ?>
  <?=$customCSS ?>
  <meta property="og:title" content="<?=$ogTitle?>">
  <meta property="og:site_name" content="brthdy.net">
  <meta property="og:url" content="<?=$ogUrl?>">
  <meta property="og:type" content="article">
  <meta property="og:image" content="<?=$ogImage?>">
  <meta property="og:description" content="<?=$ogDesc?>">
  <meta property="fb:app_id" content="209699839076964">

  <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-24519864-1']);
    _gaq.push(['_setDomainName', '.brthdy.net']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = 'http://www.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

  </script>

  <? if ($logo) { ?>
  <a href="<?=$logoUrl?>" title="Home">
    <img class="logo" src="./img/<?=$logo?>">
  </a>
  <? } ?>

  <div class="header">
    <div class="opener"><span>Turn up the volume ... *sing*</span></div>


    <h1 class="title">Happy Birthday, <?=$name?>!</h1>

    <div class="sub-header">
      <h2 class="sub-title">
        <?= $ogDesc ?>
      </h2>
      <div class="plugins cf">
        <div><a href="http://twitter.com/share" data-via="<?= $twitterVia ?>" data-lang="de" data-count="horizontal" data-url="<?=$ogUrl?>" class="twitter-share-button">Tweet</a></div>
        <div><fb:like href="<?=$ogUrl?>" send="false" layout="button_count" show_faces="false" font="verdana"></fb:like></div>
        <div><g:plusone size="medium" href="<?=$ogUrl?>"></g:plusone></div>
      </div>
    </div>

    <div class="comments">
      <div class="fb-comments" data-href="<?=$ogUrl?>" data-version="v2.3" data-width="100%"></div>
    </div>

  </div>

  <? include_once($addInc) ?>

  <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/<?=$youtubeToken?>?rel=0&autoplay=1" style="position: absolute; left: -5000px; top: -5000px;"></iframe>

  <script src="<?=$webAppPath?>/js/ga_social_tracking.js"></script>
  <div id="fb-root"></div>
  <script>
    window.fbAsyncInit = function() {
        FB.init({
          appId      : '209699839076964',
          xfbml      : true,
          version    : 'v2.3'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
  </script>
  <script>
    (function(){
      var twitterWidgets = document.createElement('script');
      twitterWidgets.type = 'text/javascript';
      twitterWidgets.async = true;
      twitterWidgets.src = 'http://platform.twitter.com/widgets.js';

      // Setup a callback to track once the script loads.
      twitterWidgets.onload = _ga.trackTwitter;

      document.getElementsByTagName('head')[0].appendChild(twitterWidgets);
    })();
  </script>
  <script type="text/javascript" src="https://apis.google.com/js/plusone.js">{lang: 'de'}</script>
</html>
