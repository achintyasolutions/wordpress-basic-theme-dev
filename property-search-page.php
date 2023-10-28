<?php

/*
Template Name: Property Search Page
Displayes only rent properties search
*/

get_header();
global $wp_query;

$propType = $_GET['type'];
$uloc = !empty( $_GET['uloc'] ) ? $_GET['uloc'] : array();
$beds = $_GET['beds'];
$listingtype = $_GET['listingtype'];
$post_type = $_GET['post_type'];

var_dump(array_values($uloc));




?>

<div class="property-search-layout">
    <div>
      <?php get_template_part('template-parts/forms/property-search-listing-form'); ?>
    </div>

    <div class="property-list">
        <h2>Discover our best deals</h2>
        <div class="card-deck deck-lg-3 ">
          <?php

//echo $wp_the_query;

          $property_post = array(
            'post_type' => $post_type,
            'post_status' => 'publish',
            'tax_query' => array(
              'relation' => 'AND',
              array(
              'taxonomy' => 'listing_type',   // taxonomy name
              'field' => 'slug',           // term_id, slug or name
              'terms' => $listingtype,  
              ),
              array(
                'taxonomy' => 'property_type', 
                'field' => 'term_id',          
                'terms' => $propType,  
              )
              ),
              'meta_query' => array(
                array(
                    'key' => 'location',
                    'value' => $uloc,
                    'compare' => 'IN'
                )
              )
            
           // 's' => $search_str,
           // 'property_type' => $propertyType,
           // 'beds' => $bedsCount,
           // 'sentence' => true
          );


         // print_r(get_ancestors(12,'property_type'))

          // $term = get_term('12', 'property_type');
          //   $termParent = ($term->parent == 0) ? $term : get_term($term->parent, 'property_type');
          //   var_dump($termParent);

          print_r($property_post);

         $property_query = new WP_Query($property_post);

         // $dataVal = get_field_object('area');

         // var_dump($dataVal);
      
          while ($property_query->have_posts()) {
            $property_query->the_post();
            $img_path = wp_get_attachment_image_src(
              get_post_thumbnail_id(),
              'large'
            )
              ?>
               <div class="card mt-4" style="min-width: 20rem; max-width: 25rem;">
              <img class="card-img-top" src="<?php echo $img_path[0] ?>" style="max-height: 16rem;" />
              <div class="card-body">
                <h5 class="card-title">
                  <?php the_title() ?>
                </h5>
                <p class="card-text"><?php echo get_field('location', get_the_ID()) ?></p>

                <div class="p-attributes">
                  <div class="bed">
                    <span><i class="fa fa-bed" aria-hidden="true"></i></span>
                    <span><?php echo get_field('beds', get_the_ID()) ?></span>
                  </div>
                  <div class="shower">
                    <span><i class="fa fa-shower" aria-hidden="true"></i></span>
                    <span><?php echo get_field('beds', get_the_ID()) ?></span>
                  </div>
                  <div class="parkeing">
                    <span><i class="fa fa-car" aria-hidden="true"></i></span>
                    <span><?php echo get_field('beds', get_the_ID()) ?></span>
                  </div>
                  <div class="area">
                    <span><i class="fa fa-area-chart" aria-hidden="true"></i></span>
                    <span><?php echo get_field('area_sqm', get_the_ID()) ?> sqFt</span>
                  </div>
                </div>
                <div class="btnActions">
                  <button>
                    <span><i class="fa fa-phone" aria-hidden="true"></i></span>
                    <span>Phone</span>
                  </button>
                  <button>
                    <span><i class="fa-regular fa-envelope"></i></i></span>
                    <span>Email</span>
                  </button>
                  <button>
                    <span><i class="fa-brands fa-whatsapp"></i></span>
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