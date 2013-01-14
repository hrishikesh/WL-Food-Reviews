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
        <link href='http://fonts.googleapis.com/css?family=Allura|Shadows+Into+Light|Bad+Script' rel='stylesheet' type='text/css'>
		<!--[if lt IE 9]>
      		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
    	<![endif]-->

    	<?php
    		//Load Bootstrap:  
    		echo $this->Bootstrap->load(); 


			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
    	?>
        <style type="text/css">
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #f5f5f5;
                font-family: 'Bad Script', cursive;
            }

            .container-narrow {
                min-width: 500px;
                max-width: 500px;
                padding: 19px 29px 29px;
                margin: 0 auto 20px;
                margin-top: 10px;
                background-color: #fff;
                border: 1px solid #e5e5e5;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }


            .btn-custom {
                background-color: hsl(260, 4%, 49%) !important;
                background-repeat: repeat-x; filter:
                progid:DXImageTransform.Microsoft.gradient(startColorstr="#e2e1e4", endColorstr="#7b7781");
                background-image: -khtml-gradient(linear, left top, left bottom, from(#e2e1e4), to(#7b7781));
                background-image: -moz-linear-gradient(top, #e2e1e4, #7b7781);
                background-image: -ms-linear-gradient(top, #e2e1e4, #7b7781);
                background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #e2e1e4), color-stop(100%, #7b7781));
                background-image: -webkit-linear-gradient(top, #e2e1e4, #7b7781);
                background-image: -o-linear-gradient(top, #e2e1e4, #7b7781);
                background-image: linear-gradient(#e2e1e4, #7b7781);
                border-color: #7b7781 #7b7781 hsl(260, 4%, 39%); color: #333 !important;
                text-shadow: 0 1px 1px rgba(255, 255, 255, 0.66);
                -webkit-font-smoothing: antialiased;
                min-width: 170px;
                min-height: 60px;
            }

            .sign-in .span12 {
                text-align: center;
            }

        </style>
	</head>
	<body>

	    <div class="container-fluid">
            <div class='container-narrow sign-in'>

                <div class="row-fluid">
                    <div class="span12">
                        <?php echo $this->Html->image('logo.png');?>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <h3>Sign in with...</h3>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <?php echo $this->Session->flash(); ?>
                        <?php echo $this->fetch('content'); ?>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <?php echo $this->Session->flash('auth'); ?>
                    </div>
                </div>
            </div>
                <footer>
                   <!-- <p>&copy; Weboise Lab <?php /*echo date('Y'); */?></p>-->
                </footer>


	    </div> <!-- /container -->

	</body>
</html>
