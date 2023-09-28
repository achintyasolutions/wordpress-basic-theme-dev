<?php






function custom_theme_assets() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
}


add_action( 'wp_head', 'wpse_239006_style', 1 );
function wpse_239006_style() {
    wp_enqueue_script('chosencss', get_template_directory_uri() .'/assets/js/chosen_v1.8.7/chosen.min.css');
}




/** Custom Search for Property */
function search_property($template)   
{    
  global $wp_query;   
  $post_type = get_query_var('post_type');   
  if($post_type == 'property' )   
  {
    return locate_template('property-search-page.php');  //  redirect to archive-search.php
  }   
  return $template;   
}
add_filter('template_include', 'search_property');


function my_scripts() {
    wp_enqueue_style('bootstrap5', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap4', 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css');
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');
    wp_enqueue_script( 'jquery','https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', array( 'jquery' ),'',true );
    wp_enqueue_script( 'boot2','https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js', array( 'jquery' ),'',true );
    wp_enqueue_script( 'boot3','https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array( 'jquery' ),'',true );
    wp_enqueue_style( 'chosen_styles', 'https://harvesthq.github.io/chosen/chosen.css', false );
    wp_enqueue_script( 'chosen_js', 'https://harvesthq.github.io/chosen/chosen.jquery.js', array('jquery'), null, true );

}

function show_hide_advance_search_form(){
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', () => {  
            document.getElementById('advanceBtn').addEventListener('click', showhide);

            var div = document.getElementById('newpost');
       
            function showhide() {
                event.preventDefault();
                div.classList.toggle('visible');
            }
          });
      </script>
      <?php
};


add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    'post-thumbnails'
) );



// add the ajax fetch js
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
?>
<script type="text/javascript">

document.addEventListener('DOMContentLoaded', () => {  
    let searchElem = document.getElementById('searchBox_chosen');
    let searchBox = searchElem.getElementsByTagName('input')[0];
    searchBox.addEventListener('keyup', fetch);

    jQuery(".chosen-select").chosen({
    search_contains: true // an option to search between words
        });

    jQuery(".chosen-select-deselect").chosen({
    allow_single_deselect: true
});


    function fetch(){
    if(searchBox.value != undefined && searchBox.value != ''){

    jQuery.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'post',
        dataType:"json",
        data: { action: 'data_fetch', keyword: searchBox.value},
        success: function(data) {
            console.log(data);
            console.log(typeof data);

            var exists;

            if(data['result'] != ''){
                let res = data['result'];
                for(key in res) {
                    if(res.hasOwnProperty(key)) {
                        var val = res[key];
                        //do something with value;
                        console.log(val);
                        var  param = jQuery('.chosen-choices input').val();
                        jQuery('#searchBox option').each(function(){
                            if (this.value == val) {
                            exists = true;
                            }
                        });

                        if (!exists) {
                            console.log('inside not exist');
                            var op= '<option>'+val+'</option>';
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


// the ajax function
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){

    $args = array(
        'posts_per_page' => -1, 
        'post_type' => 'property' ,
        'post_status' => 'publish',
        'meta_query' =>  array(
            'relation'    => 'AND',
            array(
                'key' => 'area',
                'value' => '^'.$_REQUEST['keyword'].'.*',
                'compare' => 'REGEXP'
            )
        )
    );


    $the_query = new WP_Query($args);
  
    $new_array = [];
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post();
             if(!in_array(get_field('field_6513f44f21690'), $new_array)){ 
                 $new_array[get_field('field_6513f44f21690')] = get_field('field_6513f44f21690');     
         } endwhile;
       // wp_reset_postdata();  
    endif;  
     echo json_encode(array("result" => $new_array));
    die();
}





add_post_type_support( 'page', 'excerpt' );
add_post_type_support( 'property', 'excerpt' );
wp_enqueue_style( 'style', get_stylesheet_uri() );
add_action( 'wp_enqueue_scripts', 'custom_theme_assets' );
add_action( 'wp_enqueue_scripts', 'my_scripts' );
add_action( 'wp_enqueue_scripts', 'show_hide_advance_search_form' );