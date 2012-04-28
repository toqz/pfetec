	    
	        <!-- Footer -->
          <div class="footer">
              <div class="row">
                  <div class="four columns">
                      <h5>WHAT'S NEW</h5>
                      <?php 
                        $args = array(
                          'numberposts' => 2,
                          'offset'      => 0,
                          'category'    => "news",
                          'orderby'     => 'post_date',
                          'order'       => 'DESC',
                          'post_type'   => 'post',
                          'post_status' => 'publish' ); 
                        
                        $postArray = get_posts( $args );
                        
                        foreach( $postArray as $news): ?>
                          
                          <div class="row whats-new">
                              <div class="news-title"><?php echo $news->post_title; ?></div> 
                              <p><?php echo substr( $news->post_content, 0, 100);  ?></p>
                              <a href="<?php echo $news->guid; ?>" class="read-more">read more</a>
                          </div>
                          
                      <?php endforeach; ?>
                                       
                      <!-- <div class="row whats-new">
                          <div class="news-title">Lorem ipsum dolor sit amet</div> 
                          <p>Consectetur adipiscing elit. Nulla venenatis nisi dolor, et malesuada ligula. Nullam placerat felis odio. </p>
                          <a href="#" class="read-more">read more</a>
                      </div>
                      <div class="row whats-new">
                          <div class="news-title">Lorem ipsum dolor sit amet</div>
                          <p>Consectetur adipiscing elit. Nulla venenatis nisi dolor, et malesuada ligula. Nullam placerat felis odio. </p>
                          <a href="#" class="read-more">read more</a>
                      </div> -->
                  </div>
                  <div class="eight columns">
                    <div class="row">
                      <h5>CONTACT US</h5>
                      <div class="six columns first">
                        <div class="row">
                            <div class="six columns">
                                <div class="phone">(Telephone)</div>
                                <div class="phone">(Fax)</div>
                                <div class="mail">(Email)</div>
                                <div class="mail">(Tech Support)</div>
                            </div>
                            <div class="six columns">
                                <div class="phone-num">+65 6558 6388</div>
                                <div class="phone-num">+65 6558 7310</div>
                                <div class="mail-add"><a href="mailto:info@pfetec.com?Subject=Hello">sales@pfetec.com</a></div>
                                <div class="mail-add"><a href="mailto:info@pfetec.com?Subject=Hello">info@pfetec.com</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="six columns">
                        <div class="location">
                            <span class="lbl-address">(Address)</span>
                            <span class="address">9 Gul Street 4 Singapore 629238</span>
                        </div>
                        <div id="footer-map"></div>
                          
                      </div>
                    </div>
                  </div>
              </div>
              <div class="row">
                  <div class="copyright">
                          &copy; 2006 PFE Technology Pte Ltd (Regn. No.: 197800448W)
                  </div>                
              </div>
          </div>        
          <!-- END: Footer -->

      </div>
      <!--End: Container-->
      
      <!-- Video Player -->
      <div class="overlay"><a class="close-btn" href="javascript:void(0);"></a></div>
      <div class="videoContainer"></div>
      <!-- End Video Player -->
      
      <!-- Included JS Files -->
  	<!-- Combine and Compress These JS Files -->
  	<script src="<?php bloginfo( 'template_directory' ); ?>/javascripts/jquery.min.js"></script>
  	<script src="<?php bloginfo( 'template_directory' ); ?>/javascripts/jquery.reveal.js"></script>
    <script src="<?php bloginfo( 'template_directory' ); ?>/javascripts/jquery.orbit-1.3.0.js"></script>
  	<script src="<?php bloginfo( 'template_directory' ); ?>/javascripts/forms.jquery.js"></script>
  	<script src="<?php bloginfo( 'template_directory' ); ?>/javascripts/jquery.customforms.js"></script>
  	<script src="<?php bloginfo( 'template_directory' ); ?>/javascripts/jquery.placeholder.min.js"></script>
  	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascripts/jquery.blockUI.js"></script>
  	<script src="<?php bloginfo( 'template_directory' ); ?>/javascripts/custom.js"></script>
  	<!-- End Combine and Compress These JS Files -->
  	<script src="<?php bloginfo( 'template_directory' ); ?>/javascripts/app.js"></script>
    
    <?php wp_footer(); ?>
    
  </body>
</html>