  <div class="clear"></div>
     <div class=" collapse  search_filter_more" id="div_search_filter_more">
      <div class="clear"></div>
            <ul class="nav navbar-nav">
              <li> <span><?php echo Yii::t('Base','Search BedRoom')?> </span>
                <select id="search_bedroom_filter" multiple="multiple" >		
              <option  value=""></option>
					 </select>
              </li>
              <li><span><?php echo Yii::t('Base','Toilets')?></span>
              <select id="search_baths_filter" multiple="multiple" >		
              <option  value=""></option>
					 </select>
              </li>
			      <li><span><?php echo Yii::t('Base','LivingArea')?></span>
              <select id="search_floor_area_filter" multiple="multiple" >		
              <option  value=""></option>
					 </select>
              </li>
              <li><span><?php echo Yii::t('Base','LandArea')?></span>
               <select id="search_area_main_filter" multiple="multiple" >		
              <option  value=""></option>
					 </select>
              </li>
              </ul>
              
              
               <div class="clear"></div>
              <ul class="nav navbar-nav">
                
                 <li> <span><?php echo Yii::t('Base','Age')?> </span>
                <select id="search_age_filter" multiple="multiple" >		
              <option  value=""></option>
					 </select>
              </li>
              
                <li><span id="Community_label"><?php echo Yii::t('Base','Street')?></span>
              <select id="search_street_filter" multiple="multiple" >		
              <option  value=""></option>
					 </select>
              </li>
                <li><span id="Community_label"><?php echo Yii::t('Base','Streets Species')?></span>
              <select id="search_street_species_filter" multiple="multiple" >		
              <option  value=""></option>
					 </select>
              </li>
                  <li><span><?php echo Yii::t('Base','Plan')?></span>
             <select id="search_plan_filter" multiple="multiple" >		
              <option  value=""></option>
					 </select>
              </li>     
            </ul>
           
            <div class="clear"></div>
            <ul class="nav navbar-nav">
            
            
			    
                  <li><span><?php echo Yii::t('Base','Sales Time')?></span>
             <select id="search_sales_times_filter" multiple="multiple" >		
              <option  value=""></option>
					 </select>
              </li>			      
                 <li> <span id="city_label"><?php echo Yii::t('Base','Unit Number')?> </span>
                  <input type="text" class="form-control" placeholder="Unit Number">
              </li>
              <li> <span ><?php echo Yii::t('Base','MLS Code')?> </span>
                <input type="text" class="form-control" placeholder="MLS Code">
              </li>
            </ul>

               <div class="clear"></div>
            <ul class="nav navbar-nav">
              <li><span><?php echo Yii::t('Base','PID Code')?></span>
             <input type="text" class="form-control" placeholder="'PID Code">              
              </li>
                 <li><span id="Community_label"><?php echo Yii::t('Base','Number')?></span>
                <input type="text" class="form-control" placeholder=" Number">
              </li>
                <li><span><?php echo Yii::t('Base','Zip Code')?></span>
             <input type="text" class="form-control" placeholder=" Zip Code">
              </li>
            </ul>
              </div>
          </div>
          <!--/.nav-collapse -->