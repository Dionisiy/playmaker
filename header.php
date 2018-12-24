<!DOCTYPE html>

<html lang="Ru">
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

     <meta name="viewport" content="width=device-width">
    <meta charset="UTF-8"/>

    <link href="/wp-content/themes/playmaker/css/prettyphoto.css" rel="stylesheet">
    <link href="/wp-content/themes/playmaker/css/bootstrap.css" rel="stylesheet">
     <link href="/wp-content/themes/playmaker/style.css" rel="stylesheet">

    <link href="/wp-content/themes/playmaker/css/font-awesome.css" rel="stylesheet">
    <link href="/wp-content/themes/playmaker/css/mediaelementplayer.min.css" rel="stylesheet">
    <link href="/wp-content/themes/playmaker/css/color.css" rel="stylesheet">
    <link href="/wp-content/themes/playmaker/css/responsive.css" rel="stylesheet">
    <link href="/wp-content/themes/playmaker/css/widget.css" rel="stylesheet">
    <link href="/wp-content/themes/playmaker/css/shop.css" rel="stylesheet">
    <link href="/wp-content/themes/playmaker/css/flexslider.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

	 <?php wp_head(); ?>

</head>
<body>
<style type="text/css">
    .pix-colr,
    .pix-colrhvr:hover,
    .price-table article:hover h3,
    .breadcrumbs ul li.pix-active,
    #footer p a:hover,
    .is-countdown span:before,
    .pagination .active,
    .event-listing article:hover .text .pix-post-title a,
    .cs-post-title a,
    .pagination .active,
    .post-categories li a,
    .is-countdown span,
    .widget ul li:hover a {
        color: #5ae392!important
    }

    .pix-bgcolr,
    .pix-bgcolrhvr:hover,
    nav.navigation>ul>li>a:before,
    .cart-sec span,
    .navigation ul ul li:hover>a,
    .navigation ul>li.current-menu-item>a,
    .navigation ul ul li.current-menu-item>a,
    .price-table article:hover .pix-price-box,
    .event.evevt-listing article:hover .text .btn-boobked,
    .match-result.match-lost p,
    .event.event-listing.event-listing-v2 article:hover,
    .cycle-pager-active,
    .widget .tagcloud a:hover,
    .event.event-listing article:hover .text .btn-boobked,
    .flex-direction-nav li a:hover,
    .our-team-sec article:hover figure figcaption .pix-post-title a,
    .footer-widget .widget_newsletter .error,
    .news-section article:hover .text,
    .password_protected form input[type="submit"],
    .team-vertical article figcaption .caption h2,
    .gallery ul li figure figcaption a,
    .woocommerce-pagination ul li a:hover,
    .woocommerce-pagination ul li span,
    .woocommerce-tabs .tabs .active a,
    span.match-category.cat-neutral,
    .event.event-listing article:hover .text .btn,
    .widget_search form input[type="submit"],
    .onsale,
    .gallery ul li:hover .text,
    .footer-icons .followus a:hover,
    .searchform button,
    .tabs.horizontal .nav-tabs li.active a,
    p.stars span a.active,
    .event.event-listing.event-listing-v2 .btn-viewall,
    .featured-title,
    .pix-feature article .blog-bottom .btn,
    .pix-feature .featured,
    .blog-vertical .tab-content header.pix-heading-title h2,
    header #lang_sel a:hover,
    header #lang_sel ul ul a:hover,
    .post-tags a:hover,
    .blog-vertical header.pix-heading-title h2,
    .pix-tittle,
    nav.navigation>ul>li:hover>a,
    nav.navigation>ul>li.current-menu-ancestor>a,
    .table tbody tr:hover,
    {
        background-color: #5ae392!important
    }

    .menu-item-type-post_type a {
        display: block;
        width: 100%;
        height: 100%;

    }
    .pix-bdrcolr,
    .tabs.horizontal .nav-tabs li.active,
    .address-info .text,
    .subtitle h1,
    .about-us article .text,
    blockquote,
    .pagination>ul>li>a:before,
    .pagination>ul>li>a:before,
    .pagination>ul>li>span.active:before,
    .footer-icons .followus a:hover {
        border-color: #5ae392!important
    }

    #banner .flexslider figcaption .pix-desc h3 span {
        box-shadow: -10px 0 0 #5ae392, 10px 0 0 #5ae392!important
    }

    .our-team-sec article:hover figure figcaption .pix-post-title a {
        box-shadow: -10px 0 0 #5ae392, 10px 0 0 #5ae392!important
    }

    nav.navigation>ul>li>a {
        color: #fff!important;
    }

    header #mainheader {
        background-color: #2d2d2d;
    }

    .sliderpagination ul li:before {
        border-color: transparent #5ae392!important
    }

    .footer-widget .widget_newsletter .error:before {
        border-top-color: #5ae392!important
    }
</style>
<style>
.left-side iframe {
    margin: 0 auto;
    width: 100%;
}
iframe .soccer {
    width: 100%!important;
}
iframe #fsbody {
    width: 100%!important;
}

.fs-table table {
    width: 100%!important;
}
</style>

<div id="wrappermain-pix" class="wrapper wrapper_boxed">
	<header id="header">
	    <!-- Top Head Start -->
	    <div class="top-head">
	        <div class="container-fluid">
	            <!-- Logo -->
	            <div class="logo">
	                <a href="/">
                    	<span class="logo">
                            PLAYMAKER
                        </span>
                    </a>
	            </div>
                <!-- Logo Close -->
	        </div>
        </div>

	    <div id="mainheader">
	        <div class="container">
                <nav class="navbar navbar-inverse" role="navigation">
                    <div class="hamburger">
                        <button type="button" class="navbar-toggle cs-click-menu" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <ul class="nav navbar-nav">
                            <?php
                            $countries = get_categories($args);
                            if ($countries) :
                                ?>
                                <?php foreach ($countries as $country) :
                                if ($country->category_parent == 0 && $country->slug !== 'ukraine'):

                                    $termchildren = get_terms( 'category', array( 'parent' => $country->cat_ID, 'hide_empty' => false ) );
                                ?>
                                    <li>
                                        <a href="/<?= $country->slug ?>">
                                            <?= $country->name ?>
                                        </a>
                                        <?php if($termchildren): ?>

                                            <ul class="sub-menu champs">
                                                <?php
                                                $categories = get_categories();
                                                foreach ($termchildren as $child) : ?>
                                                    <li class='menu-item menu-item-type-post_type menu-item-object-page'>
                                                        <a href='/<?php echo $child->slug ?>'> <?php echo $child->name ?> </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="rightheader">
                        <!-- Search Section -->
                        <div class="searcharea">
                            <a class="btnsearch" href="#searchbox">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
                        <!-- Search Section Close-->
                    </div>
                    <!-- Right Header Close -->
                    <div id="searcharea" >
                        <div class="searchform">
                            <form id="searchform" method="get" action="" role="search">
                                <button> <i class="fa fa-search"></i></button>
                                <input name="s" id="searchinput" placeholder="Search for:" type="text">
                            </form>
                        </div>
                    </div>
                </nav>
	        </div>
	    </div>
	</header>
	<div class="clear"></div>
		<div id="main" class="main">
		    <div id="innermain">
		    <?php
			    $post_t = get_post_type( $post );
				$args = array(
					'taxonomy' => array( 'post_tag', 'my_tax' ),
					);
				$myterms = get_terms( $args );
				if(is_page()){
				// do something
				}
		    ?>