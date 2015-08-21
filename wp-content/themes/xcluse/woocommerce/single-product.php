<?php
global $wpdb;
$args = array( 'posts_per_page' => -1, 'order' => 'asc','meta_key' => 'book_id','meta_value' => get_the_ID() );
$rand_posts = get_posts( $args );
$i=1;
	 $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
foreach($rand_posts as $pos){
	 $filename =  get_template_directory().'/pages/' . $i . ".html";
 	$myfile = fopen($filename, "w") or die("Unable to open file!");
	fwrite($myfile, apply_filters('the_content',$pos->post_content));
	fclose($myfile);

$i++;}
?>
<!doctype html>
<html>
<head>
    <title> Flipbook </title>
    <meta name="viewport" content="width = device-width, minimum-scale=1, maximum-scale=1, user-scalable = no" />
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- External JS dependencies -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/underscore-min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/backbone-min.js"></script>
    
    <!-- Turn.js UI Kit -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/turn.min.js"></script>
    
    <!-- App dependencies -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/app.js"></script>


     <!-- External CSS dependencies -->
    <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/font-awesome.min.css"></link>
   <!--  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/img/favicon0cc1.png?a" />-->
    

    <!-- App CSS dependencies -->
    <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/main.css"></link>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/animate.css" type="text/css" />

    <style type="text/css">
      .page-1 .s1{
        -webkit-transform: translateY(100px);
        -webkit-transition: all 1.5s;
        opacity: 0;
      }
      .page-1 .s2{
        -webkit-transform: translateY(100px);
        -webkit-transition: all 1s;
        -webkit-transition-delay: 0.5s;
        opacity: 0;
        font-family: 'Carrois Gothic SC', sans-serif;
        font-style: normal;
        font-weight: 400;
        font-size: 40px;
        text-align: center;
        color: white;
      }
    
      .page-1.animation-on .s1{
        -webkit-transform: translateY(0px);
        opacity: 1;
      }
      .page-1.animation-on .s2{
        -webkit-transform: translateY(0px);
        opacity: 1;
      }

    </style>
  </head>
<body>
  <div class="catalog-app">
  <div id="viewer">
    <div id="flipbook" class="ui-flipbook">
      <?php for($k=1; $k<$i;$k++){?>
               <div>
				      <?php include (TEMPLATEPATH . '/pages/'.$k.'.html'); ?>
              </div>
               <?php } ?>
    </div>
  </div>


  <!-- controls -->
  <div id="controls">
    <div class="all">
        <div class="ui-slider" id="page-slider">
        <div class="bar">
          <div class="progress-width">
            <div class="progress">
              <div class="handler"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="ui-options" id="options">
        <a class="ui-icon" id="ui-icon-table-contents">
          <i class="fa fa-bars"></i>
        </a>
        <a class="ui-icon show-hint" title="Miniatures" id="ui-icon-miniature">
          <i class="fa fa-th"></i>
        </a>
        <a class="ui-icon" id="ui-icon-zoom">
          <i class="fa fa-file-o"></i>
        </a>
        <a class="ui-icon show-hint" title="Share" id="ui-icon-share">
          <i class="fa fa-share"></i>
        </a>
        <a class="ui-icon show-hint" title="Full Screen" id="ui-icon-full-screen">
          <i class="fa fa-expand"></i>
        </a>
        <a class="ui-icon show-hint" id="ui-icon-toggle">
          <i class="fa fa-ellipsis-h"></i>
        </a>
      </div>

      <!-- zoom slider -->
      <div id="zoom-slider-view" class="zoom-slider">
          <div class="bg">
             <div class="ui-slider" id="zoom-slider">
              <div class="bar">
                <div class="progress-width">
                  <div class="progress">
                    <div class="handler"></div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <!-- / zoom slider -->
    </div>
    
    <div id="ui-icon-expand-options">
      <a class="ui-icon show-hint">
        <i class="fa fa-ellipsis-h"></i>
      </a>
    </div>

  </div>
  <!-- / controls -->

  <!-- miniatures -->
  <div id="miniatures" class="ui-miniatures-slider">
	

  </div>
  <!-- / miniatures -->

<script type="text/javascript">
  // Change these settings

  FlipbookSettings = {
    options: {
      width: 1280,
      height: 920,
turnCorners: "tl,tr,bl,br"
    },
	

    shareMessage: 'Flipbook',

    /* table: [
      {text: 'Cover', page: 1},
      {text: 'Introduction', page: 2},
      {text: 'Getting Started', page: 4},
      {text: 'Reference', page: 6},
      {text: 'Pre-order', page: 8},
      {text: 'About', page: 12}
    ], */

    pageFolder: 'pages/'
  };
	/*setInterval(function() {
 if ( $('#flipbook').turn('page')==$('#flipbook').turn('pages') ) {
    $('#flipbook').turn('page', 1);
 } else {
    $('#flipbook').turn('next');
 }
}, 1000);
  $(window).load(function(event) {
    $("#flipbook .page-1").addClass('animation-on');
	 
  });*/
  </script>
  
  </body>

</html>