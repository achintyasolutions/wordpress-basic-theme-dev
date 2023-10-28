<!-- buy form content -->
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
                data-placeholder="Search Region or area or community"
              ></select>
            </div>
            <!-- beds and bath non-commercial -->
            <select
              id="bedsSelect"
              class="form-control"
              name="beds"
              style="display: block"
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

            <!-- show for commercial -->

            <!-- beds and bath -->
            <select
              id="selectAreaCmrcl"
              class="form-control"
              name="beds"
              style="display: none"
            >
              <option value="" selected>Select Size (sqm)</option>
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

                <!-- post type and listing type -->
                <input type="hidden" name="post_type" value="property" />
                <input type="hidden" name="listingtype" value="for-rent" id="listingtype" />

                <div>
                  <input
                    class="form-control mr-sm-2"
                    type="search"
                    placeholder="Region or Area"
                    aria-label="Search"
                  />
                </div>
              </div>
            </div>
            <div class="advanceText">
              <a href="#" id="advanceBtn" tabindex="-1"
                >Show more search options
                <i class="fa fa-angle-down" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </form>
        <!-- buy form content end -->