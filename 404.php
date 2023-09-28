<?php 
/**
 * 404 error page
 *
 *
**/


get_header(); ?>


    <section class="page-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">                      
                    <div class="article-wrap">
                        <article class="article-page-wrap">
                           
                            <div class="error-404-page text-center">
                                <h1>Your Search Not Found </h1>
    
                                <p>You can search something else! </p>
                                
                                <a class="btn btn-link" href="<?php echo esc_url( site_url() ); ?>"><?php echo '404 Page Not Found '?></a>
                            </div>
                                
                           
                        </article><!-- article-page-wrap -->
                    </div>
                </div><!-- bt-content-wrap -->
            </div><!-- row -->
        </div><!-- container -->
    </section><!-- listing-wrap -->


<?php get_footer(); ?>