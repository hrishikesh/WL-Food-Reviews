<?php
/**
 * @var $this view
 */
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $title_for_layout; ?></title>

		<!--[if lt IE 9]>
      		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
    	<![endif]-->

    	<?php
    		//Load Bootstrap:
            echo $this->Jquery->load("dev");
    		echo $this->Bootstrap->load("dev");


			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
    	?>

        <style>
            body {
                padding-top: 10px;
                padding-bottom: 40px;
                background-color: #f5f5f5;
            }
            .container-narrow {
                max-width: 700px;
                margin: 0 auto;
                padding: 20px;
                background-color: #fff;
                border: 1px solid #e5e5e5;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 10px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }
            #meal-tab .active a {
                background-color: #EEEEEE;
                text-decoration: none;
                border-bottom: 1px solid;
                border-color: #DDDDDD #DDDDDD transparent;
            }
        </style>

	</head>
	<body>

	    <div class="container-narrow">
            <div class="row-fluid">
                <div class="span6">
                    LOGO
                </div>
                <div class="span6">
                    <ul class="nav nav-pills pull-right">
                        <li class="disabled"><a href="#">Hi Hrishikesh</a></li>
                        <li><a href="">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12"></div>
            </div>

            <ul id="meal-tab" class="row-fluid nav nav-tabs">
                <li class="active span6"><a data-toggle="tab" href="#breakfast">Breakfast</a></li>
                <li class="span6"><a data-toggle="tab" href="#lunch">Lunch</a></li>
            </ul>
	        <div class="row-fluid">

	           	<div id="main-content" class="span12">

					<?php echo $this->Session->flash(); ?>

					<?php echo $this->fetch('content'); ?>

	            </div><!--/span-->

	        </div><!--/row-->

	      <footer>
	        <p>&copy; Weboise Lab <?php echo date('Y'); ?></p>
	      </footer>

	    </div> <!-- /container -->

	</body>
</html>
