<footer class="site-footer">
    <div class="col_1">
        <a href="http://">Flat for rent in Bahrain</a>
        <a href="http://">Flats for sale in Bahrain</a>
        <a href="http://">Villa for rent in Bahrain</a>
        <a href="http://">Studio Flats for rent in Bahrain</a>
        <a href="http://">Shops for rent in Bahrain</a>
    </div>
    <div class="col_2">
        <a href="http://">Home</a>
        <a href="http://">Apartment</a>
        <a href="http://">Villa</a>
        <a href="http://">Warehouse</a>
        <a href="http://">Contact</a>
    </div>
    <div class="col_3">
        <div> 
            <input type="email" name="email" id="#" placeholder="Enter your email" />
            <button type="submit">Submit</button>
        </div>
        <div>
            Amity is a Real Estate Agents.
        </div>
    </div>
</footer>


	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script> -->

    <script type="text/javascript">
    jQuery('#searchBox').chosen({
        search_contains: false,
        allow_single_deselect: false,
        no_results_text: "Try another region or area ",
        width: "100%"
    });
    jQuery(".chosen-choices").css({'padding':'.275rem .75rem',
        'border-radius': '.25rem', 'background-clip':'padding-box'
        ,'border': '1px solid #ced4da', 'font-size':'1rem', 'height':'45px', 'display':"flex", 'flex-direction':'row', 'align-items':'center', 'box-shadow':'none', 
    });

    jQuery(".chosen-choices.search-choice").css({'padding': '8px 20px 8px 5px !important', 'background-color': 'green'
    });

 

    jQuery(".chosen-search-input").css({'width':'100%'});
    jQuery(".chosen-choices li").css({'width':'140px'});
    jQuery(".formInputs select").css({'height':'45px'});
    jQuery("select option").css({'color':'#999'});


    </script>
    <script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery(".chosen").chosen();
        jQuery("li.search-choice").css({});
    });
    </script>



    <?php wp_footer() ?>

</body>
</html>