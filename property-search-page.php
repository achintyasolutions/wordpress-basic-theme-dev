<?php

/*
Template Name: Property Search Page
Displayes only rent properties search
*/

get_header();
global $wp_query;



$search_str = $_GET['uloc'];
$propertyType = $_GET['property_type'];
$bedsCount = $_GET['beds'];
?>

<div class="property-search-layout">
    <div class="property-list">
        <h2>Discover our best deals</h2>
        <div class="card-deck deck-lg-3 ">
          <?php

//echo $wp_the_query;

          $property_post = array(
            'post_type' => 'property',
            'post_status' => 'publish',
            
           // 's' => $search_str,
           // 'property_type' => $propertyType,
           // 'beds' => $bedsCount,
           // 'sentence' => true
          );

          
      
          $property_query = new WP_Query($property_post);

          $dataVal = get_field_object('area');

          var_dump($dataVal);
      
          while ($property_query->have_posts()) {
            $property_query->the_post();
            $img_path = wp_get_attachment_image_src(
              get_post_thumbnail_id(),
              'large'
            )
              ?>
            <div class="card mt-4" style="min-width: 20rem; max-width: 25rem;">
              <img class="card-img-top" src="<?php echo $img_path[0] ?>" />
              <div class="card-body">
                <h5 class="card-title">
                <a href="<?php the_permalink() ?>">  <?php the_title() ?> </a> 
                </h5>
                <p class="card-text"><?php echo get_field('area', get_the_ID()) ?> </p>
      
                <div class="p-attributes">
                  <div class="bed">
                    <span><i class="fa fa-bed" aria-hidden="true"></i></span>
                    <span>4</span>
                  </div>
                  <div class="shower">
                    <span><i class="fa fa-shower" aria-hidden="true"></i></span>
                    <span>4</span>
                  </div>
                  <div class="parkeing">
                    <span><i class="fa fa-car" aria-hidden="true"></i></span>
                    <span>4</span>
                  </div>
                  <div class="area">
                    <span><i class="fa fa-area-chart" aria-hidden="true"></i></span>
                    <span>1789 sqFt</span>
                  </div>
                </div>
                <div class="btnActions">
                  <button>
                    <span><i class="fa fa-phone" aria-hidden="true"></i></span>
                    <span>Phone</span>
                  </button>
                  <button>
                    <span><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                    <span>Email</span>
                  </button>
                  <button>
                    <span><i class="fa fa-whatsapp" aria-hidden="true"></i></span>
                    <span>WhatsApp</span>
                  </button>
                </div>
      
              </div>
            </div>
      
          <?php } ?>
        </div>
      </div>
</div>


<?php
get_footer();
?>