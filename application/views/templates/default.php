<!DOCTYPE html>
<html>
<head>
    <title><?php echo isset($title) ? $title : 'COLOFTECH' ;?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

  <meta property="og:url"           content="<?=isset($link) ? $link : site_url();?>" />
  <meta property="og:type"          content="article" />
  <meta property="og:locale"          content="en_US" />
  <meta property="og:title"         content="<?=isset($meta_title) ? $meta_title : 'Thesis Hub by Coloftech State of the Arts & technolog'; ?>" />
  <meta property="og:description"   content="<?=isset($description) ? $description : 'Thesis hub by Coloftech State of the Arts & technolog is an online thesis management and monitoring system of all research studies of students from BISU Bilar. It stored the title of the study, abstract, researchers, date of study, committee, and examining panel. It also allowed upload of pdf and images.'; ?>" />
  <meta property="og:image"         content="<?=isset($featured_image) ? $featured_image : base_url('public/images/logo-only.png'); ?>" />
<?php
if(isset($description)){
    
}else{
?>
<meta name="author" content="Harold Rita" />
<?php
}
?>
<meta name="keywords" content="<?=isset($keywords) ? $keywords : 'coloftech, harold rita, bisu bilar, bohol island state university, thesis hub, research study compilation system and monitoring system.coloftech project';?>  " />

<meta name="propeller" content="6db29e64f9cb4b5e95f5e9b6bd5fd21b" />
        <link href="<?=base_url('public/assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
        <link href="<?=base_url('public/assets/bootstrap');?>/css/font-awesome.css" rel="stylesheet">
        <link href="<?=base_url('public/assets/css/animate.css');?>" rel="stylesheet">

        <link rel="icon" type="image/png" href="<?=base_url();?>favicon.png">
       

        <?php // add css files
        $this->minify->css(array('default.css'));
        echo $this->minify->deploy_css();
        ?>

    <style type="text/css">
    </style>
        <!-- CORE PLUGINS -->
        <script src="<?=base_url('public/assets/js/jquery-1.11.0.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('public/assets/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('public/assets/js/jquery-migrate.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('public/assets/js/notify/dist/notify.js');?>" type="text/javascript"></script>

</head>
<body class="site"><!-- <script src="//defpush.com/ntfc.php?p=1548402" data-cfasync="false" async></script> -->
    <div id="fb-root"></div>
<script> /*
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=908155116011125&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

*/</script>
<header class="wrapper" >
    <div class="container" >
        

        <div class="logo"><a href="<?=site_url();?>"><img src="<?=base_url();?>public/images/logo-only.png"></div></a>
        <div class="title"><a href="<?=site_url();?>"><h1 style="display:inline-block;color:#fff;"><span style='margin-top:-22px;position:absolute;font-size:1em;'>Coloftech <span style='font-size:10px;display: block;'>State of the Arts &amp; Technology</span></span></h1></a></div>
    </div>
    <div class="container">
        <?php include 'common/default_menu.php';?>
    </div>
</header>

<div class="site-body" >
    <?php echo $body; ?>
</div>

<footer>
    <div class="container">
        
    <div class="footer-top">
        <div class="col-md-4 aboutus">
            <h3>HOSTED SITE</h3>
            <ul id="menu-campuses-menu" class="menu">
                <?=$this->auto_m->getSites()?>
</ul>
        </div>
        <div class="col-md-4 recentspost">
            <h3>RECENT POST</h3></div>
        <div class="col-md-4 campuses">
            
            <h3>PROJECTS</h3>
<ul id="menu-campuses-menu" class="menu">
<li class="menu-balilihan-campus"><a href="http://www.bisuresearchjournals.edu.ph">BISU RESEARCH JOURNALS</a></li>
</ul>
        </div>
    </div>
    <div class="footer-center"><a href="#top" class="btn btn-top">TOP</a></div>
     <div class="footer-bottom">
         
     </div> 

    </div>
</footer>
</body>
</html>
