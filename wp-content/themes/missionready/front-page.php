<?php get_header(); ?>

<?php
    // top banner section
    $hero = get_field('hero');
    
    // campaign message from Sylvia
    $campaign = get_field('campaign_message');

    // staff stories
    $stories = get_field('staff_stories');

    // share your stories
    $share = get_field('share_story');

    // customer obsession section
    $sessions = get_field('obsession_sessions');

    // events section
    $events = get_field('events');

    // events section
    $editions = get_field('editions');
?>

    <!--============ Infotechno Hero Start ============-->
    <div class="hero-banner hero-banner-bg"
         style="background:url(<?php bloginfo('template_directory') ?>/images/main-bannner.jpg);">
        <div class="container">
            <div class="row align-items-center">
                <!--baseline-->
                <div class="col-lg-8 col-md-7">
                    <div class="hero-banner-text wow move-up">
                        <h6><?php echo $hero['tag_line']; ?></h6>
                        <h1><?php echo $hero['main_title']; ?></h1>
                        <p><?php echo $hero['title_description']; ?></p>
                        <div class="hero-button mt-30"><a href="<?php echo $hero['link']; ?>" class="main-btn main-btn-md"><?php echo $hero['link_text']; ?></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============ Infotechno Hero End ============-->

    <main class="maincontent">
        <section class="quote-tp-area section">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 order-md-first order-last">
                        <div class="quote-tp-area-img"><img
                                    src="<?php bloginfo('template_directory'); ?>/images/home-banner-02.jpg"
                                    alt="Customer obsession banner">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="quote-tp-content">
                            <div class="content">
                                <div class="quoteicon"><i class="icofont-quote-left"></i></div>
                                <blockquote><?php echo $campaign['message']; ?></blockquote>
                                <h3><?php echo $campaign['title']; ?></h3>
                                <h4><?php echo $campaign['role']; ?> </h4>
                                <div class="hero-button mt-30"><a href="<?php echo $campaign['link']; ?>" class="main-btn main-btn-md"><?php echo $campaign['link_text']; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-blk-area section p-60">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-12">
                        <div class="content-blk-intro">
                            <h2><?php echo $stories['title']; ?> </h2>
                            <p><?php echo $stories['description']; ?> </p>
                            <div class="hero-button mt-30"><a href="<?php echo $stories['link']; ?>" class="main-btn main-btn-md"><?php echo $stories['link_text']; ?> </a></div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="content-blk-slider">
                            <div class="owl-carousel owl-theme home-carousel">
                            <?php 
                            /**
                             * fetch the latest stories on featured area
                             * throttle limit on numberposts variable
                             */
                                $args = array(
                                    'numberposts' => 2 
                                );
                               
                                $latest_posts = get_posts( $args );
                                
                                if ($latest_posts) : foreach ($latest_posts as $post):
                                    setup_postdata($post);
                            ?>
                                <div class="text-center">
                                    <a href="<?php echo get_permalink(); ?>" class="video-link">
                                        <div class="single-popup-wrap"><img class="img-fluid"
                                                                            src="<?php the_post_thumbnail('full'); ?>"
                                                                            alt="">
                                            <div class="ht-popup-video video-button">
                                                <div class="video-mark">
                                                    <div class="wave-pulse wave-pulse-1"></div>
                                                    <div class="wave-pulse wave-pulse-2"></div>
                                                </div>
                                                <div class="video-button__two">
                                                    <div class="video-play"><span class="video-play-icon"></span></div>
                                                </div>
                                            </div>
                                            <div class="single-popip-intro">
                                                <p><?php the_title(); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php endforeach; ?>

                                <?php endif; ?>
                                <!-- <div class="video-popup text-center"><a
                                            href="https://www.youtube.com/watch?v=Nyqs9MOgEdk"
                                            class="video-link lightbox-image video-fancybox">
                                        <div class="single-popup-wrap"><img class="img-fluid"
                                                                            src="/images/story-banner-01.jpg"
                                                                            alt="">
                                            <div class="ht-popup-video video-button">
                                                <div class="video-mark">
                                                    <div class="wave-pulse wave-pulse-1"></div>
                                                    <div class="wave-pulse wave-pulse-2"></div>
                                                </div>
                                                <div class="video-button__two">
                                                    <div class="video-play"><span class="video-play-icon"></span></div>
                                                </div>
                                            </div>
                                            <div class="single-popip-intro">
                                                <p>John Kamau - My Story</p>
                                            </div>
                                        </div>
                                    </a></div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="quote-tp-area section">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="quote-tp-area-img"><img
                                    src="<?php bloginfo('template_directory'); ?>/images/strory-share-01.jpg"
                                    alt="Customer obsession banner"></div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="content-blk-intro right-blockintro">
                            <h2><?php echo $share['title']; ?></h2>
                            <p><?php echo $share['description']; ?></p>
                            <div class="hero-button mt-30">
                                <ul>
                                    <li class="d-inline"><a href="<?php echo $share['link']; ?>" class="main-btn main-btn-md"><?php echo $share['link_text']; ?></a>
                                    </li>
                                    <!-- <li class="d-inline"><a href="#" class="main-btn main-btn-md main-btn-outlined">Previous
                                            Stories</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-blk-area section p-60">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-12">
                        <div class="content-blk-intro">
                            <h2><?php echo $sessions['title']; ?></h2>
                            <p><?php echo $sessions['description']; ?></p>
                            <div class="hero-button mt-30"><a href="<?php echo $sessions['link']; ?>" class="main-btn main-btn-md"><?php echo $sessions['link_text']; ?></a></div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="content-blk-slider">
                            <div class="owl-carousel owl-theme home-carousel">
                                <?php
                                    /**
                                     * fetch the 'townhall' sessions on featured area
                                     * throttle limit on numberposts variable
                                     */
                                        $args = array(
                                            'numberposts' => 2,
                                            'post_type' => 'townhall'
                                        );
                                       
                                        $latest_posts = get_posts( $args );
                                        
                                        if ($latest_posts) : foreach ($latest_posts as $post):
                                            setup_postdata($post);
                                ?>
                                <div class="video-popup text-center"><a href="<?php echo get_permalink(); ?>" class="video-link">
                                        <div class="single-popup-wrap"><img class="img-fluid"
                                                                            src="<?php the_post_thumbnail('full'); ?>"
                                                                            alt="">
                                            <div class="single-popip-intro">
                                                <p><?php the_title(); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php endforeach; ?>

                                <?php endif; ?>

                                <!-- <div class="video-popup text-center"><a href="townhall-inside.html" class="video-link">
                                        <div class="single-popup-wrap"><img class="img-fluid"
                                                                            src="/images/customer-obsession-01.jpg"
                                                                            alt="">
                                            <div class="single-popip-intro">
                                                <p>Week 1 Townhall Session</p>
                                            </div>
                                        </div>
                                    </a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Gallery Carousel Section -->
        <section class="events-section section">
            <div class="container">
                <div class="leftline-block"></div>
                <div class="row">
                    <div class="col-lg-10 col-md-12 mx-auto">
                        <div class="row align-items-center">
                            <div class="col-lg-3">
                                <div class="section-title line text-left">
                                    <h2><?php echo $events['title']; ?></h2>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="section-title text-left">
                                    <p><?php echo $events['description']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="container p-0">
                            <div class="case-carousel owl-carousel owl-theme">

                                <!--Gallery Item-->
                                <?php
                                    /**
                                     * fetch the 'events' on featured area
                                     * throttle limit on numberposts variable
                                     */
                                        $args = array(
                                            'numberposts' => 3,
                                            'post_type' => 'events'
                                        );
                                       
                                        $latest_posts = get_posts( $args );
                                        
                                        if ($latest_posts) : foreach ($latest_posts as $post):
                                            setup_postdata($post);
                                            /**
                                             * split event date into an array to get dat and month
                                             * elem 1: month (reformat to 3 letter)
                                             * elem 2: day
                                             */
                                            $event_date = explode(" ", get_field('when'));
                                ?>
                                <div class="single-case">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <div class="image">
                                            <?php the_post_thumbnail('full'); ?>
                                        </div>
                                        <div class="content">
                                            <div class="event-listing">
                                                <div class="event-slot-time"><span><?php echo $event_date[1]; ?></span> <?php echo substr($event_date[0], 0, 3); ?></div>
                                                <div class="event-slot-info">
                                                    <h3><?php the_title(); ?></h3>
                                                    <p><?php echo get_field('duration'); ?></p>
                                                </div>
                                                <!-- Slot info end -->
                                            </div>
                                            <div class="event-timeline"><p>07Hrs 59Mn to go</p></div>
                                        </div>
                                    </a>
                                </div>
                                <?php endforeach; ?>

                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Gallery Carousel Section -->

    </main>
    <div class="edition-banner d-flex align-items-center"
         style="background-image:url('<?php bloginfo('template_directory'); ?>/images/edition-banner.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="top-editinfo"><h5><?php echo $editions['small_title']?></h5></div>
                    <div class="text-editorbanner">
                        <h2><?php echo $editions['big_title']; ?></h2>
                        <div class="hero-button mt-30"><a href="<?php $editions['link']?>" class="main-btn main-btn-md"><?php echo $editions['link_text']?></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>