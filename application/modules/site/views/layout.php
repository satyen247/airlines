<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
?>

<!DOCTYPE html>
<html>

<head>
	<title></title>
	<link href='https://fonts.googleapis.com/css?family=Oswald:400' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="//use.fontawesome.com/e7f7322296.css">
	<style>
		.tabcontrol,
		.wizard {
			display: block;
			width: 100%;
			overflow: hidden
		}

		.tabcontrol a,
		.wizard a {
			outline: 0
		}

		.tabcontrol ul,
		.wizard ul {
			list-style: none !important;
			padding: 0;
			margin: 0
		}

		.tabcontrol>.content>.body ul,
		.wizard>.content>.body ul {
			list-style: disc !important
		}

		.tabcontrol ul>li,
		.wizard ul>li {
			display: block;
			padding: 0
		}

		.tabcontrol>.content>.title,
		.tabcontrol>.steps .current-info,
		.wizard>.content>.title,
		.wizard>.steps .current-info {
			position: absolute;
			left: -999em
		}

		.wizard>.steps {
			position: relative;
			display: block;
			width: 100%
		}

		.wizard.vertical>.steps {
			display: inline;
			float: left;
			width: 30%
		}

		.wizard>.steps .number {
			font-size: 1.429em
		}

		.wizard>.steps>ul>li {
			width: 25%
		}

		.wizard>.actions>ul>li,
		.wizard>.steps>ul>li {
			float: left
		}

		.wizard.vertical>.steps>ul>li {
			float: none;
			width: 100%
		}

		.wizard>.steps a,
		.wizard>.steps a:active,
		.wizard>.steps a:hover {
			display: block;
			width: auto;
			margin: 0 .5em .5em;
			padding: 1em;
			text-decoration: none;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px
		}

		.wizard>.steps .disabled a,
		.wizard>.steps .disabled a:active,
		.wizard>.steps .disabled a:hover {
			background: #eee;
			color: #aaa;
			cursor: default
		}

		.wizard>.steps .current a,
		.wizard>.steps .current a:active,
		.wizard>.steps .current a:hover {
			background: #2184be;
			color: #fff;
			cursor: default
		}

		.wizard>.steps .done a,
		.wizard>.steps .done a:active,
		.wizard>.steps .done a:hover {
			background: #9dc8e2;
			color: #fff
		}

		.wizard>.steps .error a,
		.wizard>.steps .error a:active,
		.wizard>.steps .error a:hover {
			background: #ff3111;
			color: #fff
		}

		.wizard>.content {
			background: #eee;
			display: block;
			margin: .5em;
			overflow: hidden;
			position: relative;
			width: auto;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px
		}

		.wizard.vertical>.content {
			display: inline;
			float: left;
			margin: 0 2.5% .5em;
			width: 65%
		}

		.wizard>.content>.body {
			float: left;
			position: absolute;
			width: 95%;
			padding: 2.5%
		}

		.wizard>.content>.body ul>li {
			display: list-item
		}

		.wizard>.content>.body>iframe {
			border: 0;
			width: 100%;
			height: 100%
		}

		.wizard>.content>.body input {
			display: block;
			border: 1px solid #ccc
		}

		.wizard>.content>.body input[type=checkbox] {
			display: inline-block
		}

		.wizard>.content>.body input.error {
			background: #fbe3e4;
			border: 1px solid #fbc2c4;
			color: #8a1f11
		}

		.wizard>.content>.body label {
			display: inline-block;
			margin-bottom: .5em
		}

		.wizard>.content>.body label.error {
			color: #8a1f11;
			display: inline-block;
			margin-left: 1.5em
		}

		.wizard>.actions {
			position: relative;
			display: block;
			text-align: right;
			width: 100%
		}

		.wizard.vertical>.actions {
			display: inline;
			float: right;
			margin: 0 2.5%;
			width: 95%
		}

		.wizard>.actions>ul {
			display: inline-block;
			text-align: right
		}

		.wizard>.actions>ul>li {
			margin: 0 .5em
		}

		.wizard.vertical>.actions>ul>li {
			margin: 0 0 0 1em
		}

		.wizard>.actions a,
		.wizard>.actions a:active,
		.wizard>.actions a:hover {
			background: #2184be;
			color: #fff;
			display: block;
			padding: .5em 1em;
			text-decoration: none;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px
		}

		.wizard>.actions .disabled a,
		.wizard>.actions .disabled a:active,
		.wizard>.actions .disabled a:hover {
			background: #eee;
			color: #aaa
		}

		.tabcontrol>.steps {
			position: relative;
			display: block;
			width: 100%
		}

		.tabcontrol>.steps>ul {
			position: relative;
			margin: 6px 0 0;
			top: 1px;
			z-index: 1
		}

		.tabcontrol>.steps>ul>li {
			float: left;
			margin: 5px 2px 0 0;
			padding: 1px;
			-webkit-border-top-left-radius: 5px;
			-webkit-border-top-right-radius: 5px;
			-moz-border-radius-topleft: 5px;
			-moz-border-radius-topright: 5px;
			border-top-left-radius: 5px;
			border-top-right-radius: 5px
		}

		.tabcontrol>.steps>ul>li:hover {
			background: #edecec;
			border: 1px solid #bbb;
			padding: 0
		}

		.tabcontrol>.steps>ul>li.current {
			background: #fff;
			border: 1px solid #bbb;
			border-bottom: 0 none;
			padding: 0 0 1px;
			margin-top: 0
		}

		.tabcontrol>.steps>ul>li>a {
			color: #5f5f5f;
			display: inline-block;
			border: 0;
			margin: 0;
			padding: 10px 30px;
			text-decoration: none
		}

		.tabcontrol>.steps>ul>li>a:hover {
			text-decoration: none
		}

		.tabcontrol>.steps>ul>li.current>a {
			padding: 15px 30px 10px
		}

		.tabcontrol>.content {
			position: relative;
			display: inline-block;
			width: 100%;
			height: 35em;
			overflow: hidden;
			border-top: 1px solid #bbb;
			padding-top: 20px
		}

		.tabcontrol>.content>.body {
			float: left;
			position: absolute;
			width: 95%;
			height: 95%;
			padding: 2.5%
		}

		.tabcontrol>.content>.body ul>li {
			display: list-item
		}
	</style>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/site/css/screen.min.css')?>">
	<style>
		.owl-carousel,
		.owl-carousel .owl-item,
		.owl-theme .owl-dots {
			-webkit-tap-highlight-color: transparent
		}

		.owl-carousel .animated {
			-webkit-animation-duration: 1s;
			animation-duration: 1s;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both
		}

		.owl-carousel .owl-animated-in {
			z-index: 0
		}

		.owl-carousel .owl-animated-out {
			z-index: 1
		}

		.owl-carousel .fadeOut {
			-webkit-animation-name: fadeOut;
			animation-name: fadeOut
		}

		@-webkit-keyframes fadeOut {
			0% {
				opacity: 1
			}

			100% {
				opacity: 0
			}
		}

		@keyframes fadeOut {
			0% {
				opacity: 1
			}

			100% {
				opacity: 0
			}
		}

		.owl-height {
			-webkit-transition: height .5s ease-in-out;
			-moz-transition: height .5s ease-in-out;
			-ms-transition: height .5s ease-in-out;
			-o-transition: height .5s ease-in-out;
			transition: height .5s ease-in-out
		}

		.owl-carousel {
			display: none;
			position: relative;
			z-index: 1
		}

		.owl-carousel .owl-stage {
			position: relative;
			-ms-touch-action: pan-Y
		}

		.owl-carousel .owl-stage:after {
			content: ".";
			display: block;
			clear: both;
			visibility: hidden;
			line-height: 0;
			height: 0
		}

		.owl-carousel .owl-stage-outer {
			position: relative;
			overflow: hidden;
			-webkit-transform: translate3d(0, 0, 0)
		}

		.owl-carousel .owl-item {
			position: relative;
			min-height: 1px;
			float: left;
			-webkit-backface-visibility: hidden;
			-webkit-touch-callout: none
		}

		.owl-carousel .owl-item img {
			-webkit-transform-style: preserve-3d
		}

		.owl-carousel .owl-dots.disabled,
		.owl-carousel .owl-nav.disabled {
			display: none
		}

		.owl-carousel .owl-dot,
		.owl-carousel .owl-nav .owl-next,
		.owl-carousel .owl-nav .owl-prev {
			cursor: pointer;
			cursor: hand;
			-webkit-user-select: none;
			-khtml-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none
		}

		.owl-carousel.owl-loaded {
			display: block
		}

		.owl-carousel.owl-loading {
			opacity: 0;
			display: block
		}

		.owl-carousel .owl-video-playing .owl-video-play-icon,
		.owl-carousel .owl-video-playing .owl-video-tn,
		.owl-carousel.owl-refresh .owl-item {
			display: none
		}

		.owl-carousel.owl-hidden {
			opacity: 0
		}

		.owl-carousel.owl-drag .owl-item {
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none
		}

		.owl-carousel.owl-grab {
			cursor: move;
			cursor: -webkit-grab;
			cursor: -o-grab;
			cursor: -ms-grab;
			cursor: grab
		}

		.owl-carousel.owl-rtl {
			direction: rtl
		}

		.owl-carousel.owl-rtl .owl-item {
			float: right
		}

		.no-js .owl-carousel {
			display: block
		}

		.owl-carousel .owl-item .owl-lazy {
			opacity: 0;
			-webkit-transition: opacity .4s ease;
			-moz-transition: opacity .4s ease;
			-ms-transition: opacity .4s ease;
			-o-transition: opacity .4s ease;
			transition: opacity .4s ease
		}

		.owl-carousel .owl-video-wrapper {
			position: relative;
			height: 100%;
			background: #000
		}

		.owl-carousel .owl-video-play-icon {
			position: absolute;
			height: 80px;
			width: 80px;
			left: 50%;
			top: 50%;
			margin-left: -40px;
			margin-top: -40px;
			background: url(owl.video.play.png) no-repeat;
			cursor: pointer;
			z-index: 1;
			-webkit-backface-visibility: hidden;
			-webkit-transition: scale .1s ease;
			-moz-transition: scale .1s ease;
			-ms-transition: scale .1s ease;
			-o-transition: scale .1s ease;
			transition: scale .1s ease
		}

		.owl-carousel .owl-video-play-icon:hover {
			-webkit-transition: scale(1.3, 1.3);
			-moz-transition: scale(1.3, 1.3);
			-ms-transition: scale(1.3, 1.3);
			-o-transition: scale(1.3, 1.3);
			transition: scale(1.3, 1.3)
		}

		.owl-carousel .owl-video-tn {
			opacity: 0;
			height: 100%;
			background-position: center center;
			background-repeat: no-repeat;
			-webkit-background-size: contain;
			-moz-background-size: contain;
			-o-background-size: contain;
			background-size: contain;
			-webkit-transition: opacity .4s ease;
			-moz-transition: opacity .4s ease;
			-ms-transition: opacity .4s ease;
			-o-transition: opacity .4s ease;
			transition: opacity .4s ease
		}

		.owl-carousel .owl-video-frame {
			position: relative;
			z-index: 1;
			height: 100%;
			width: 100%
		}

		.owl-carousel {
			width: 100%;
			margin: 0 auto
		}

		.owl-carousel .owl-item img {
			transform-style: preserve-3d;
			display: block;
			margin: 0 auto;
			max-width: 100%;
			width: auto
		}

		.owl-carousel .owl-item .h5,
		.owl-carousel .owl-item h5 {
			text-align: center;
			margin-bottom: 10px;
			font-size: 16px
		}

		.owl-carousel .owl-nav {
			position: absolute;
			top: 33%;
			width: 100%;
			padding: 0 10px;
			box-sizing: border-box;
			pointer-events: none
		}

		.owl-carousel .owl-nav [class*=owl-] {
			background: rgba(255, 255, 255, .6);
			border-radius: 50%;
			color: #333;
			cursor: pointer;
			display: inline-block;
			font-size: 26px;
			height: 40px;
			line-height: 40px;
			text-align: center;
			margin: 5px;
			box-sizing: border-box;
			padding: 0;
			width: 40px;
			position: relative
		}

		.owl-carousel .owl-nav [class*=owl-]:hover {
			background: #5B6871;
			color: #fff
		}

		.owl-carousel .owl-prev {
			float: left;
			pointer-events: auto
		}

		.owl-carousel .owl-next {
			float: right;
			pointer-events: auto
		}

		.owl-carousel .owl-nav .fa {
			margin: 0;
			line-height: 35px
		}

		.owl-carousel .owl-prev .fa {
			margin-left: -4px
		}

		.owl-carousel .owl-next .fa {
			margin-right: -4px
		}

		.owl-carousel .owl-dots {
			margin-top: 10px;
			text-align: center
		}

		.owl-carousel .owl-nav .disabled {
			opacity: .2;
			cursor: default
		}

		.queryTest {
			float: left;
			display: none
		}

		.owl-theme .owl-nav .disabled {
			opacity: .5;
			cursor: default
		}

		.owl-theme .owl-nav.disabled+.owl-dots {
			margin-top: 10px
		}

		.owl-theme .owl-dots {
			text-align: center
		}

		.owl-theme .owl-dots .owl-dot {
			display: inline-block;
			zoom: 1
		}

		.owl-theme .owl-dots .owl-dot span {
			width: 10px;
			height: 10px;
			margin: 5px 7px;
			background: #D6D6D6;
			display: block;
			-webkit-backface-visibility: visible;
			-webkit-transition: opacity .2s ease;
			-moz-transition: opacity .2s ease;
			-ms-transition: opacity .2s ease;
			-o-transition: opacity .2s ease;
			transition: opacity .2s ease;
			-webkit-border-radius: 30px;
			-moz-border-radius: 30px;
			border-radius: 30px
		}

		.owl-theme .owl-dots .owl-dot.active span,
		.owl-theme .owl-dots .owl-dot:hover span {
			background: #5B6871
		}

		@media all and (max-width:480px) {
			.queryTest {
				float: none
			}

			.owl-stage-outer.owl-height {
				height: auto !important
			}

			.owl-carousel {
				display: block
			}

			.owl-carousel li {
				text-align: center;
				margin: 10px
			}
		}
	</style>
	<style>
		/* PRIMARY */
		.primary {
			background-color: #64A813;
		}

		#job-listing .listings .job-summary h3,
		#job-listing .listings .job-summary .h3 {
			color: #64A813;
		}

		/* SECONDARY */
		.secondary {
			background-color: #FFA409;
		}

		#featured-job-listing ul li a h3,
		#featured-job-listing ul li a .h3 {
			color: #FFA409
		}

		/* TERTIARY */
		.tertiary {
			background-color: #eaf0f4;
		}

		#basic-page .create-resume .default-form-box a.right {
			background-color: #eaf0f4
		}

		.more-company-jobs a {
			background-color: #eaf0f4;
		}

		/* nav bg*/
		/* nav color*/
		.sideboard-adspace em {}

		.sideboard-adspace div>div {
			background: transparent url('https://d3ogvqw9m2inp7.cloudfront.net/assets/dynamic/headers/cc/responsive/partner_lib/22723/img/bkgrd-job-alert-4.jpg') no-repeat scroll right top;
		}
	</style>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/site/css/style.css')?>">
</head>

<body>
	<!-- 	starting of the header -->
	<?php  echo (isset($header))?$header:'';?>
	<!-- end of the header -->
	<?php  echo (isset($content))?$content:'';?>  

  <?php  echo (isset($footer))?$footer:'';?> 


	</div>
</body>

</html>