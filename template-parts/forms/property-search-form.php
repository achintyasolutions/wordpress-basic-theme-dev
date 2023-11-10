<!-- buy form content -->
<<<<<<< HEAD
        <form
          role="search"
          method="get"
          id="searchform"
          class="searchform"
          action="<?php echo esc_url(home_url('/')); ?>"
        >
          <div class="formInputs">
            <div>
              <!-- property type -->
              <select
                id="propertyType"
                class="form-control formDesignInput"
                name="type"
              >
                <option selected value="">Property Type</option>
                <?php $pType = get_terms(['taxonomy' =>
                'property_type', 'hide_empty' => false]); foreach ($pType as
                $typeData) { if($typeData->parent != 0){ ?>
                <option value="<?php echo $typeData->term_id?>">
                  <?php echo $typeData->name ?>
                </option>
                <?php } } ?>
              </select>
            </div>
            <!-- search location -->
            <div>
              <select
                id="searchBox"
                class="choosen-select"
                multiple
                style="width: 350px"
                name="uloc[]"
                data-placeholder="Region or area or community"
              ></select>
            </div>
            <!-- beds and bath non-commercial -->
            <select
              id="bedsSelect"
              class="form-control"
              name="beds"
              style="display:block"
            >
              <option value="" selected>Beds</option>
              <?php
                      $dataVal = get_field_object('field_6511bf2a74afd');
                      foreach ($dataVal['choices'] as $value =>
              $label) { ?>
              <option value="<?php echo $value ?>">
                <?php echo $label ?>
              </option>
              <?php } ?>
            </select>
=======
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
  <div class="formInputs">
    <div>
      <!-- property type -->
      <select id="propertyType" class="form-control formDesignInput" name="type">
        <option selected value="">Property Type</option>
        <?php $pType = get_terms([
          'taxonomy' =>
            'property_type',
          'hide_empty' => false
        ]);
        foreach ($pType as $typeData) {
          if ($typeData->parent != 0) { ?>
            <option value="<?php echo $typeData->term_id ?>">
              <?php echo $typeData->name ?>
            </option>
          <?php }
        } ?>
      </select>
    </div>
    <!-- search location -->
    <div>
      <select id="searchBox" class="choosen-select" multiple style="width: 250px" name="uloc[]"
        data-placeholder="Region or area or community"></select>
    </div>
    <!-- beds and bath non-commercial -->
>>>>>>> 86c3484505c8f63c7bebf6d564b37e13fe5a6e79

    <div id="bedsSelect">
      <div id="selectedVal">
        <span>Beds</span>
        <i class="fa-solid fa-angle-down"></i>
      </div>
      <div id="selectOptions" class="show-hide-toggle">
        <div>
          <h3>Bedrooms</h3>
          <div>
            <ul class="bed-and-bath-selector__field__choices">
              <li class="chip-filter__item bed-and-bath-selector__choice">

<<<<<<< HEAD
            <!-- beds and bath -->
            <select
              id="selectAreaCmrcl"
              class="form-control"
              name="beds"
              style="display:"
            >
              <option value="" selected>Select Area</option>
              <?php
                      $dataVal = get_field_object('field_6511bf2a74afd');
                      foreach ($dataVal['choices'] as $value =>
              $label) { ?>
              <option value="<?php echo $value ?>">
                <?php echo $label ?>
              </option>
              <?php } ?>
            </select>

            <!-- d -->
            <div>
              <select id="inputState" class="form-control" value="">
                <option>Price</option>
                <option>Apartment</option>
                <option>Villa</option>
                <option>Villa</option>
              </select>
            </div>
            <div>
              <button type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
=======
                <label for="0"
                  class="text text--size2 text--capitalize chip bed-and-bath-selector__choice-chip"><span>Studio</span>
                  <input type="checkbox" autocomplete="off" class="chip-filter__input" id="0" name="choices-bedrooms"
                    value="0">
                </label>
              </li>
              <li class="chip-filter__item bed-and-bath-selector__choice">
                <label for="1"
                  class="text text--size2 text--capitalize chip bed-and-bath-selector__choice-chip"><span>1</span>
                  <input type="checkbox" autocomplete="off" class="chip-filter__input" id="1" name="choices-bedrooms"
                    value="1">
                </label>
              </li>
              <li class="chip-filter__item bed-and-bath-selector__choice">
                <label for="2"
                  class="text text--size2 text--capitalize chip bed-and-bath-selector__choice-chip"><span>2</span>
                  <input type="checkbox" autocomplete="off" class="chip-filter__input" id="2" name="choices-bedrooms"
                    value="2">
                </label>
              </li>
              <li class="chip-filter__item bed-and-bath-selector__choice">
                <label for="3"
                  class="text text--size2 text--capitalize chip bed-and-bath-selector__choice-chip"><span>3</span>
                  <input type="checkbox" autocomplete="off" class="chip-filter__input" id="3" name="choices-bedrooms"
                    value="3">
                </label>
              </li>
              <li class="chip-filter__item bed-and-bath-selector__choice">
                <label for="4"
                  class="text text--size2 text--capitalize chip bed-and-bath-selector__choice-chip"><span>4</span>
                  <input type="checkbox" autocomplete="off" class="chip-filter__input" id="4" name="choices-bedrooms"
                    value="4">
                </label>
              </li>
              <li class="chip-filter__item bed-and-bath-selector__choice">
                <label for="5"
                  class="text text--size2 text--capitalize chip bed-and-bath-selector__choice-chip"><span>5</span>
                  <input type="checkbox" autocomplete="off" class="chip-filter__input" id="5" name="choices-bedrooms"
                    value="5">
                </label>
              </li>
            </ul>
          </div>
          <div class="dropdown-wrapper__footer">
            <div class="dropdown-wrapper__footer-action">
              <button type="button" class="bed-and-bath-selector__clear-button" id="formResetbtn"> Reset</button>
>>>>>>> 86c3484505c8f63c7bebf6d564b37e13fe5a6e79
            </div>
          </div>
        </div>
        <div>
        </div>
      </div>
    </div>

    <!-- show for commercial -->

    <!-- select area -->
    <div id="areaSelect">
      <div id="selectedAreaVal">
        <span id="areaMainBox">Area (sqm)</span>
        <i class="fa-solid fa-angle-down"></i>
      </div>
      <div id="selectAreaOptions" class="show-hide-toggle">
        <div>
          <!-- <h3>Select Price Range</h3> -->
          <div class="priceContent">
            <div class="select_price-container">

              <div class="select_price-input">
                <div class="inputField">
                  <input type="text" placeholder="" name="minarea" id="minAreaBox" autocomplete="off" onkeypress="return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57">
                  <span id="minAreaSpan">Min Area (sqm)</span>
                </div>
               <div class="dropdown-box" id="minDropDownArea">
               <ul class="price_select-ul">
                  <li class="dropdown-list_item-content">
                    <button class="btn-noBg">30,000</button>
                  </li>
                  <li class="dropdown-list_item-content">
                    <button class=" btn-noBg">40,000</button>
                  </li>
                  <li class="dropdown-list_item-content">
                    <button class=" btn-noBg">50,000</button>
                  </li>
                </ul>
               </div>
              </div>
              
              <div class="range-divider">
                _
              </div>

              <div class="select_price-input">
                <div class="inputField">
                  <input type="text" placeholder="" name="maxarea" id="maxAreaBox" autocomplete="off" onkeypress="return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57">
                  <span id="maxAreaSpan">Max area (sqm)</span>
                </div>
               <div class="dropdown-box" id="maxDropDownArea">
               <ul class="price_select-ul">
                  <li class="dropdown-list_item-content">
                    <button class="btn-noBg">30,000</button>
                  </li>
                  <li class="dropdown-list_item-content">
                    <button class=" btn-noBg">40,000</button>
                  </li>
                  <li class="dropdown-list_item-content">
                    <button class=" btn-noBg">50,000</button>
                  </li>
                </ul>
               </div>
              </div>

            </div>
          </div>
        </div>
        <div class="dropdown-wrapper__footer">
          <div class="dropdown-wrapper__footer-action">
            <button type="button" class="bed-and-bath-selector__clear-button" id="formAreaResetbtn"> Reset</button>
          </div>
        </div>
      </div>
      <div>
      </div>
    </div>
    <!-- select area -->





    <!-- select price -->
    <div id="priceSelect">
      <div id="selectedPriceVal">
        <span id="priceMainBox">Price</span>
        <i class="fa-solid fa-angle-down"></i>
      </div>
      <div id="selectPriceOptions" class="show-hide-toggle">
        <div>
          <!-- <h3>Select Price Range</h3> -->
          <div class="priceContent">
            <div class="select_price-container">

              <div class="select_price-input">
                <div class="inputField">
                  <input type="text" placeholder="" name="minprice" id="minTextBox" autocomplete="off" onkeypress="return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57">
                  <span id="minSpan">Min Price (BHD)</span>
                </div>
               <div class="dropdown-box" id="minDropDown">
               <ul class="price_select-ul">
                  <li class="dropdown-list_item-content">
                    <button class="btn-noBg">30,000</button>
                  </li>
                  <li class="dropdown-list_item-content">
                    <button class=" btn-noBg">40,000</button>
                  </li>
                  <li class="dropdown-list_item-content">
                    <button class=" btn-noBg">50,000</button>
                  </li>
                </ul>
               </div>
              </div>
              
              <div class="range-divider">
                _
              </div>

              <div class="select_price-input">
                <div class="inputField">
                  <input type="text" placeholder="" name="maxprice" id="maxTextBox" autocomplete="off" onkeypress="return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57">
                  <span id="maxSpan">Max Price (BHD)</span>
                </div>
               <div class="dropdown-box" id="maxDropDown">
               <ul class="price_select-ul">
                  <li class="dropdown-list_item-content">
                    <button class="btn-noBg">30,000</button>
                  </li>
                  <li class="dropdown-list_item-content">
                    <button class=" btn-noBg">40,000</button>
                  </li>
                  <li class="dropdown-list_item-content">
                    <button class=" btn-noBg">50,000</button>
                  </li>
                </ul>
               </div>
              </div>

            </div>
          </div>
        </div>
        <div class="dropdown-wrapper__footer">
          <div class="dropdown-wrapper__footer-action">
            <button type="button" class="bed-and-bath-selector__clear-button" id="formPriceResetbtn"> Reset</button>
          </div>
        </div>
      </div>
      <div>
      </div>
    </div>
  
    <div>
    <button type="submit" id="searchBtn">
      <i class="fa fa-search" aria-hidden="true"></i>
    </button>
  </div>

  </div>
  <!-- price end -->
  
  
  <!-- post type and listing type -->
  <input type="hidden" name="post_type" value="property" />
  <input type="hidden" name="listingtype" value="for-rent" id="listingtype" />
  
  </div>
  <div class="advanceFormInput">
    <div id="newpost">
      <div class="advanceInputs twoColGrid" id="advanceFormInput">

          <!-- select area -->
    <div id="areaSelectAdvance">
      <div id="selectedAreaVal">
        <span id="areaMainBox">Area (sqm)</span>
        <i class="fa-solid fa-angle-down"></i>
      </div>
      <div id="selectAreaOptions" class="show-hide-toggle">
        <div>
          <!-- <h3>Select Price Range</h3> -->
          <div class="priceContent">
            <div class="select_price-container">

              <div class="select_price-input">
                <div class="inputField">
                  <input type="text" placeholder="" name="minarea" id="minAreaBox" autocomplete="off" onkeypress="return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57">
                  <span id="minAreaSpan">Min Area (sqm)</span>
                </div>
               <div class="dropdown-box" id="minDropDownArea">
               <ul class="price_select-ul">
                  <li class="dropdown-list_item-content">
                    <button class="btn-noBg">30,000</button>
                  </li>
                  <li class="dropdown-list_item-content">
                    <button class=" btn-noBg">40,000</button>
                  </li>
                  <li class="dropdown-list_item-content">
                    <button class=" btn-noBg">50,000</button>
                  </li>
                </ul>
               </div>
              </div>
              
              <div class="range-divider">
                _
              </div>

              <div class="select_price-input">
                <div class="inputField">
                  <input type="text" placeholder="" name="maxarea" id="maxAreaBox" autocomplete="off" onkeypress="return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57">
                  <span id="maxAreaSpan">Max area (sqm)</span>
                </div>
               <div class="dropdown-box" id="maxDropDownArea">
               <ul class="price_select-ul">
                  <li class="dropdown-list_item-content">
                    <button class="btn-noBg">30,000</button>
                  </li>
                  <li class="dropdown-list_item-content">
                    <button class=" btn-noBg">40,000</button>
                  </li>
                  <li class="dropdown-list_item-content">
                    <button class=" btn-noBg">50,000</button>
                  </li>
                </ul>
               </div>
              </div>

            </div>
          </div>
        </div>
        <div class="dropdown-wrapper__footer">
          <div class="dropdown-wrapper__footer-action">
            <button type="button" class="bed-and-bath-selector__clear-button" id="formAreaResetbtn"> Reset</button>
          </div>
        </div>
      </div>
      <div>
      </div>
    </div>
    <!-- select area -->

    <div>
    <select id="searchKeywordBox" class="choosen-select" multiple style="width: 350px" name="uloc[]"
        data-placeholder="Keywords: e.g. beach, chiller free"></select>
    </div>
      </div>
    </div>
    <div class="advanceText">
      <a href="#" id="advanceBtn" tabindex="-1">Show more search options
        <i class="fa fa-angle-down" aria-hidden="true"></i>
      </a>
    </div>
  </div>
</form>
<!-- buy form content end -->