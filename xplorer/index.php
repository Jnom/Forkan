<!DOCTYPE html>
<html dir="rtl">
<head>
	<title>الفرقان</title>
    <meta charset="utf-8">
	
	<link rel="stylesheet" href="theme/raky/reset.css" type="text/css" />
	<link rel="stylesheet" href="theme/raky/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="theme/raky/forkan.css" media="all" type="text/css"/>
    <link rel="stylesheet" href="theme/raky/scrollbar.css" media="all" type="text/css"/>
	
    <script src="js/LAB.js"></script>
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script>
		$LAB  
		.script("js/jquery.min.js").wait()  
		.script("js/json2.js")  
		.script("js/jquery.tmpl.min.js") 
		.script("js/jquery.scroll.js") 
		.script("js/underscore-1.1.6.js")  
		.script("js/backbone.js")      
		//.script("js/backbone-localstorage.js")   
		.script("js/forkan.js") 
		
		.script("js/bootstrap-modal.js")
    	.script("js/bootstrap-alerts.js")

    	.script("js/bootstrap-twipsy.js")
    	.script("js/bootstrap-popover.js")
    	.script("js/bootstrap-dropdown.js")
    	.script("js/bootstrap-scrollspy.js")
    	.script("js/bootstrap-tabs.js")
    	.script("js/bootstrap-buttons.js");

	</script>
	
	<style>
@font-face {
	font-family: 'ArType';
	src: url('public/ArTypesetting.eot');
	src:local('Arabic Typesetting'), 
		url('public/ArTypesetting.ttf') format('truetype');
	
	font-weight: normal;
	font-style: normal;
}
@font-face {
	font-family: 'raky';
	src: url('public/jvolt.eot');
	src:local('me_quran'), 
		url('public/jvolt.ttf') format('truetype');
	
	font-weight: normal;
	font-style: normal;
}


@font-face {
	font-family: 'uthmanic';
	src: url('public/uthmanicHafsv09.eot');
	src: local('KFGQPC Uthman Taha Naskh'),
		 url('public/uthmanicHafsv09.otf') format('opentype'),
		 url('public/uthmanicHafsv09.woff') format('woff');
	
	font-weight: normal;
	font-style: normal;
}


      /* Override some defaults */
      html, body {
        background-color: #eee;
      }
      body {
        padding-top: 40px; /* 40px to make the container go all the way to the bottom of the topbar */
      }
      .container > footer p {
        text-align: center; /* center align it with the container */
      }
      .container {
        width: 820px; /* downsize our container to make the content feel a bit tighter and more cohesive. NOTE: this removes two full columns from the grid, meaning you only go to 14 columns and not 16. */
      }

      /* The white background content wrapper */
      .container > .content {
        background-color: #fff;
		background:#fff url('theme/raky/bodyBg.gif') 0 0 repeat-x;
        padding: 20px;
        margin: 0 -20px; /* negative indent the amount of the padding to maintain the grid system */
        -webkit-border-radius: 0 0 6px 6px;
           -moz-border-radius: 0 0 6px 6px;
                border-radius: 0 0 6px 6px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                box-shadow: 0 1px 2px rgba(0,0,0,.15);
      }

      /* Page header tweaks */
      .page-header {
        background-color: #f5f5f5;
        padding: 20px 20px 10px;
        margin: -20px -20px 20px;
    font-family: "ArType";
    font-size: 180%;
      }

      /* Styles you shouldn't keep as they are for displaying this base example only */
      .content .span10,
      .content .span4 {
        min-height: 500px;
      }
      /* Give a quick and non-cross-browser friendly divider */
      .content .span4 {
        margin-right: 0;
        padding-right: 19px;
        border-right: 1px solid #eee;
      }

      .topbar .btn {
        border: 0;
      }
	  

	</style>    
	<!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="favicon.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">

    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
</head>
<body>
	<div class="topbar">
		<div class="fill">
			<div class="container">
				<a class="brand" href="index.php" style="width: 80px;height: 20px;background:url(forkan.png) center center no-repeat;" /></a>          
				<ul class="nav">
					<li class="active"><a href="/" data-placement="below" rel='twipsy' title="الصفحة الرئيسية">الرئيسية</a></li>
					<li><a href="#about" data-placement="below" rel='twipsy' title="من نحن">من نحن</a></li>
					<li><a href="#contact" data-placement="below" rel='twipsy' title="إتصل بنا">وصال</a></li>
				</ul>
				<form action="" class="pull-right">
					<input type="text" placeholder="Search">
				</form>
			</div>
		</div>
	</div>
	
    <div class="container">

      <div class="content">
        <div class="page-header">
          <h1>الفرقان <small>نسخة القرآان الكريم على الويب</small></h1>
        </div>
        <div class="row">
          
          <div class="span10">

			<!-- Forkan App Interface -->            
			<div id="forkanApp">
			<div class="content scrolled simple">
				<p id="ipage">
				</p>
			</div>
			</div>

	
  

          </div>
          <div class="span4">
            <h3>Secondary content</h3>
			
			<!-- Forkan App Interface --> 
			<div id="iside">
			
			</div>
			
          </div>
        </div>
      </div> <!-- /row -->

      <footer>
        <p>&copy; itkane.com 2012. by Jnom23.</p>

      </footer>

    </div> <!-- /container -->	



    <!-- Templates -->

    <script type="text/template" id="aya-template">
      	<% if (aya == 1) { %>
			<div class="suraHeader">سورة <%= sura %></div>
		<% }; %>
		<span data-placement="above" rel="popover" data-content="<%= text %>" class="iAya" id="y<%= index %>">
        <%= text %>       
		</span>
		<span class="label success iAyaSep"><%= aya %></span>
    </script>

    <script type="text/template" id="side-template">
	  <span class="iTafseer"><%= text %></span>
    </script> 

</body>
</html>