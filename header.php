<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="author" content="<?php bloginfo("name"); ?>">
    <meta name="designer" content="<?php bloginfo("name"); ?>">
    <meta name="rating" content="general">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!--[if lt IE 9]>
        <script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/html5shiv.js"></script>
    <![endif]-->    

    <?php wp_head(); ?>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-XXXXXXXX-X', 'auto');
        ga('send', 'pageview');
    </script>
    
</head>
<body <?php body_class(); ?>>

    <header id="header">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">H<span class="first">ayden</span>B<span class="second">arnett</span><span class="dot">.</span></a>
                    </div>

                    <nav id="menu">
                        <?php primary_menu(); ?>
                    </nav>

                    <a href="javascript:void(0)" class="hamburger"> 
                        <div class="menu-bar bar-1"></div>
                        <div class="menu-bar bar-2"></div>
                        <div class="menu-bar bar-3"></div>
                    </a>

                </div>

            </div>

        </div>

    </header>

    <div id="content">