
<?php 

$property_post = array(
    'post_type' => 'property',
    'post_status' => 'publish'
  );

$property_query = new WP_Query($property_post);

?>
    
<div class="card-deck deck-lg-3 ">

<?php while ($property_query->have_posts()) {
  $property_query->the_post();
  $img_path = wp_get_attachment_image_src(
    get_post_thumbnail_id(),
    'large'
  )  ?>

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