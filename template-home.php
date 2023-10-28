<?php
// Template Name: Home Page

// var_dump(get_field('front_background_image', get_the_ID()));
?>
<?php get_header(); 
?>
<div class="home_content" style="background-image:url('<?php echo get_field('front_background_image', get_the_ID()) ?>')">
  <h2>Find Your Future Home</h2>
  <div class="formTab">
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a
          href="#rent"
          role="tab"
          data-toggle="tab"
          class="nav-link"
          id="rentTab"
          >For Rent
        </a>
      </li>
      <li class="nav-item">
        <a
          href="#buy"
          role="tab"
          data-toggle="tab"
          class="nav-link activeTab"
          id="buyTab"
          >For Sale
        </a>
      </li>
    </ul>
    <div class="tab-content">

      <div class="tab-pane active mt-2" role="tabpanel" id="rent">
        <!-- rent form content -->
         <?php get_template_part('template-parts/forms/property-search-form'); ?>
        <!-- rent form content end -->
      </div>
    </div>
  </div>
</div>
<div class="property-list">
  <h2>Discover our best deals</h2>
  <?php get_template_part('template-parts/property-list-card'); ?>
</div>
<?php get_footer() ?>
