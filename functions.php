<?php


/** Custom Search for Property */
function search_property($template)
{
    global $wp_query;
    $post_type = get_query_var('post_type');
    if ($post_type == 'property') {
        return locate_template('property-search-page.php'); //  redirect to archive-search.php
    }
    return $template;
}
add_filter('template_include', 'search_property');


function my_scripts()
{
    wp_enqueue_style('bootstrap5', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap4', 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', array('jquery'), '', true);
    wp_enqueue_script('boot2', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js', array('jquery'), '', true);
    wp_enqueue_script('boot3', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array('jquery'), '', true);
    wp_enqueue_style('chosen_styles', 'https://harvesthq.github.io/chosen/chosen.css', false);
    wp_enqueue_script('chosen_js', 'https://harvesthq.github.io/chosen/chosen.jquery.js', array('jquery'), null, true);
    wp_enqueue_style('style', get_stylesheet_uri());

}

add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    'post-thumbnails'
));

add_theme_support('custom-header');


// add the ajax fetch js
add_action('wp_footer', 'ajax_fetch');
function ajax_fetch()
{
    ?>
    <script type="text/javascript">

        document.addEventListener('DOMContentLoaded', () => {

            // (START) ajax for conditional select of beds and area
            let propTypeElem = document.getElementById('propertyType');
            let selectedTermId = propTypeElem.addEventListener('change', fetchSelectValue);

            // advance btn toggle fa-angle-down
            jQuery('#advanceBtn').click(function(){
                jQuery('#newpost').toggleClass('visible');
                jQuery('#advanceBtn i').toggleClass('fa-angle-up');
            });

            // fornt Tab Handle
             let rentElem = document.getElementById('rentTab');
             let buyElem = document.getElementById('buyTab');

             rentElem.addEventListener('click', addRentStyleFun);
             
             function addRentStyleFun(){
                console.log('clicked rent');
                jQuery('#rentTab').removeClass('activeTab');
                jQuery('#buyTab').addClass('activeTab');
                jQuery('#listingtype').val('for-rent');
             };

             buyElem.addEventListener('click', addBuyStyleFun);

             function addBuyStyleFun(){
                console.log('clicked buy');
                jQuery('#buyTab').removeClass('activeTab');
                jQuery('#rentTab').addClass('activeTab');
                jQuery('#listingtype').val('for-sale');
             };



            function fetchSelectValue() {
                if (propTypeElem.value && propTypeElem.value != undefined && propTypeElem.value != '') {
                    console.log(propTypeElem.value);

                    jQuery.ajax({
                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                        type: 'post',
                        dataType: "json",
                        data: { action: 'select_fetch', keyword: propTypeElem.value },
                        success: function (data) {
                            console.log(data.data[0]);
                            if(data.data[0] == '27'){
                                jQuery('#bedsSelect').css({'display': 'none'});
                                jQuery('#selectAreaCmrcl').css({'display': 'block'});
                                
                            }else{
                                jQuery('#bedsSelect').css({'display': 'block'});
                                jQuery('#selectAreaCmrcl').css({'display': 'none'});
                            }

                        }
                        })
                    return false;
                }
            }

            // (END) ajax for conditional select of beds and area


            // (START) ajax for search location
            let searchElem = document.getElementById('searchBox_chosen');
            let searchBox = searchElem.getElementsByTagName('input')[0];
            searchBox.addEventListener('keyup', fetch);

            function fetch() {
                if (searchBox.value && searchBox.value != undefined && searchBox.value != '') {

                    jQuery.ajax({
                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                        type: 'post',
                        dataType: "json",
                        data: { action: 'data_fetch', keyword: searchBox.value },
                        success: function (data) {
                            console.log(data);
                            console.log(typeof data);

                            var exists;

                            if (data['result'] != '') {
                                let res = data['result'];
                                for (key in res) {
                                    if (res.hasOwnProperty(key)) {
                                        var val = res[key];
                                        //do something with value;
                                        console.log(val);
                                        var param = jQuery('.chosen-choices input').val();
                                        jQuery('#searchBox option').each(function () {
                                            if (this.value == val) {
                                                exists = true;
                                            }
                                        });

                                        if (!exists) {
                                            console.log('inside not exist');
                                            var op = '<option>' + val + '</option>';
                                            jQuery("#searchBox").append(op);
                                            var ChosenInputValue = jQuery('.chosen-choices input').val();
                                            jQuery("#searchBox").trigger("chosen:updated");
                                            jQuery('.chosen-choices input').val(ChosenInputValue);
                                        }
                                    }
                                }
                            }
                        }
                    });
                }
            }
        })

    </script>

    <?php
}



add_action('wp_ajax_select_fetch', 'select_fetch');
add_action('wp_ajax_nopriv_select_fetch', 'select_fetch');

// the ajax function
add_action('wp_ajax_data_fetch', 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch', 'data_fetch');




//  to fetch select property type dependent
function select_fetch()
{
    $paramVal = $_REQUEST['keyword'];
    
    wp_send_json_success(get_ancestors($paramVal,'property_type'));
    die();
}



// to fetch location

function data_fetch()
{

    $args = array(
        'posts_per_page' => 10,
        'post_type' => 'property',
        'post_status' => 'publish',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'location',
                'value' => '^' . $_REQUEST['keyword'] . '.*',
                'compare' => 'REGEXP'
            )
        )
    );


    $the_query = new WP_Query($args);

    $new_array = [];
    if ($the_query->have_posts()):
        while ($the_query->have_posts()):
            $the_query->the_post();
            if (!in_array(get_field('field_6513f44f21690'), $new_array)) {
                $new_array[get_field('field_6513f44f21690')] = get_field('field_6513f44f21690');
            }
        endwhile;
        // wp_reset_postdata();  
    endif;
    echo json_encode(array("result" => $new_array));
    die();
}





add_post_type_support('page', 'excerpt');
add_post_type_support('property', 'excerpt');
add_action('wp_enqueue_scripts', 'my_scripts');