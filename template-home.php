<?php
// Template Name: Home Page

?>

<?php get_header(); 
?>

<div class="home_content">
  <h2>Find Your Future Home</h2>
  <div class="formTab">
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a href="#rent" role="tab" data-toggle="tab" class="nav-link active">For Rent
        </a>
      </li>
      <li class="nav-item">
        <a href="#buy" role="tab" data-toggle="tab" class="nav-link">For Sale
        </a>
      </li>
    </ul>

    <div class="tab-content">

      <div class="tab-pane active" role="tabpanel" id="rent">
        <!-- rent form content -->
        <form role="search" method="get" id="searchform" class="searchform"
          action="<?php echo esc_url(home_url('/')); ?>" >
          <div class="formInputs">
            <div>
              <select id="inputState" class="form-control" name="propertyType">
                <option selected value="">Property Type</option>
                <?php $pType = get_terms(['taxonomy' => 'property_type', 'hide_empty' => false]);

                foreach ($pType as $typeData) {
                  ?>
                  <option value="<?php echo $typeData->name ?>">
                    <?php echo $typeData->name ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div>
              <!-- <input class="form-control mr-sm-2" type="search" id="searchBox" placeholder="Region or Area"
                aria-label="Search" value="<?php echo esc_html(get_search_query());
                ?>" name="s" />
                <div> -->
                  <select id="searchBox" class="choosen-select" multiple style="width:400px;" name="uloc[]">
                   
    
                    <!-- <?php
                    $dataVal = get_field_object('field_6511bf2a74afd');
                    foreach ($dataVal['choices'] as $value => $label) { ?>
                      <option value="<?php echo $value ?>">
                        <?php echo $label ?>
                      </option>
                    <?php } ?> -->
    
                  </select>
              </div>
  
            </div>
            <div>
              <select id="beds" class="form-control" name="beds">
                <?php
                $dataVal = get_field_object('field_6511bf2a74afd');
                foreach ($dataVal['choices'] as $value => $label) { ?>
                  <option value="<?php echo $value ?>">
                    <?php echo $label ?>
                  </option>
                <?php } ?>

              </select>
            </div>
            <div>
              <select id="inputState" class="form-control">
                <option selected>Price</option>
                <option>Apartment</option>
                <option>Villa</option>
                <option>Villa</option>
              </select>
            </div>
            <div>
              <button type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </div>
          </div>
          <div class="advanceFormInput">
            <div id="newpost">
              <div class="advanceInputs">
                <div>
                  <select id="inputState" class="form-control">
                    <option selected>Beds</option>
                    <option>Apartment</option>
                    <option>Villa</option>
                    <option>Villa</option>
                  </select>
                </div>
                <input type="hidden" name="post_type" value="property" />
                <div>
                  <input class="form-control mr-sm-2" type="search" placeholder="Region or Area" aria-label="Search" />
                </div>
              </div>
            </div>

            <div class="advanceText">
              <a href="#" id="advanceBtn" tabindex="-1">Show more search options <i class="fa fa-angle-down"
                  aria-hidden="true"></i> </a>
            </div>
          </div>

        </form>

        <!-- rent form content end -->
      </div>


      <!-- buy tab -->
      <div class="tab-pane" role="tabpanel" id="buy">
        <!-- buy form content -->
        <h3>Ratings</h3>
        <p>
          values 2:
        </p>
     </div>
     </div>
  </div>
</div>



<div class="property-list">
  <h2>Discover our best deals</h2>

  <div class="card-deck deck-lg-3 ">
    <?php
    $property_post = array(
      'post_type' => 'property',
      'post_status' => 'publish'
    );

    $property_query = new WP_Query($property_post);

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
            <?php the_title() ?>
          </h5>
          <p class="card-text"><?php echo get_field('area', get_the_ID()) ?></p>

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
<?php get_footer() ?>