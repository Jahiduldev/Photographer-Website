<?php
session_start(); 
include_once 'common/header.php';  ?>

             
                    <!-- Top Menu -->
                    
                    <!-- End Top Menu -->
                    <!-- === END HEADER === -->
                    <!-- === BEGIN CONTENT === -->
                    <div id="content">
                        <div class="container no-padding">
                            <div class="row">
                                <!-- Carousel Slideshow -->
                                <div id="carousel-example" class="carousel slide" data-ride="carousel">
                                    <!-- Carousel Indicators -->
                                
                                    <div class="clearfix"></div>
                                    <!-- End Carousel Indicators -->
                                    <!-- Carousel Images -->
                       <div id="jssor_1" style=" margin: 0 auto; top: 0px; left: 0px; width: 550px; height: 400px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
       
        <div data-u="slides" style="cursor: default;  top: 0px; left: 0px; width: 990px; height: 400px; overflow: hidden;">
                <?php
                $sql_img = "select * from upload where file_type='1' ";
                $qr_img = mysql_query($sql_img);
                $counter=0;
                while($row_img = mysql_fetch_array($qr_img)) {
                    $counter++;
                    $file_name=$row_img['file_name'];
                    if($counter==1) {
                        ?>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="adminpanel/public/uploads/<?php echo $file_name; ?>" />
            </div>

                        <?php }else { ?>

            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="adminpanel/public/uploads/<?php echo $file_name; ?>" />
            </div>

                        <?php  }
                }
                ?>




       
            <!-- <div data-p="112.50" style="display: none;">
                 <img data-u="image" src="assets/img/04.jpg" />
             </div>-->


        </div>
        <!-- Bullet Navigator -->
   
        <!-- Arrow Navigator -->

        
    </div>
                                    <!-- End Carousel Images -->
                                    <!-- Carousel Controls -->
                                   
                                <!-- End Carousel Slideshow -->
                            </div>
                        </div>
                        <div class="container background-gray-lighter">
                            <div class="row">
                                <h2 class="animate fadeIn text-center margin-top-50">Welcome to Towfiq's Gallery </h2>
                                <hr class="margin-top-15">
                                <p class="animate fadeIn text-center" style="font-weight:bold;">Allows you to view the photography and paintings of an amateur artist and photographer</p>
                                <p class="text-center animate fadeInUp margin-bottom-50">
                            <a href="about.php">         <button type="button" class="btn btn-lg btn-primary">View Details</button></a>
                                </p>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row margin-vert-30">
                                <!-- Main Text -->
                                   <p style="color:black;"> <span style=" font-family: 'Matura MT Script Capitals', arial; font-size:22px;">Muhammad Towfiq Hasan  </span>is a Dhaka based amateur photographer and painter. Photography is his hobby and painting – passion. He has a solo photography exhibition on birds titled ‘Parkir Pakhira’ [Birds of Parki] and a few water colour painting exhibitions titled ‘Impressions of Liberia’ , ‘Dhaka in Frame’ , ‘My Beautiful Bangladesh’ and so on to his credit. These are none but his leisure time endeavours to mental refreshment and spectral amusement to his colleagues and public in general.</p>
                                    
                                  

                                <!-- End Main Text -->
                                <!-- Side Column -->
                                
                                <!-- End Side Column -->
                            
                        </div>
						 <h3 style="margin-bottom:20px; color:#1E90FF"><strong>Latest Category</strong></h3>
                        <div class="container background-gray-lighter">
                            <div class="row row-no-margin">
                                <!-- Portfolio -->
                                <ul class="portfolio-group">
                                    <!-- Portfolio Item -->
                                 
                                    <!-- //Portfolio Item// -->
                                    <!-- Portfolio Item -->
									   <?php
                        $sql_folder1 = "select * from sub_folder where cat_id=2 order by date_time DESC limit 2  ";
                        $qr_folder1 = mysql_query($sql_folder1);

                        while($row_folder = mysql_fetch_array($qr_folder1)) {
                             $image_name1=$row_folder['sub_folder_image'];
                            $content1=$row_folder['sub_folder_name'];
                            $content1=substr($content1,0,100);
                             $id=$row_folder['id'];
                        
						?>
                                    <li class="portfolio-item col-sm-3 col-xs-6 no-padding">
                                        <a href="gallery_image.php?sf=<?php echo $id;?>">
                                            <h3 style="color:#1E90FF;"><?php echo $content1;?></h3>
                                            <figure class="animate fadeInLeft animated"style="padding-left:30px;">
                                                      <img src="adminpanel/public/uploads/<?php echo $image_name1; ?>" alt="image2">
                                            
                                            </figure>
                                        </a>
                                    </li>
									<?php }?>
									
									
										   <?php
                        $sql_folder1 = "select * from sub_folder where cat_id=3 order by date_time DESC limit 2";
                        $qr_folder1 = mysql_query($sql_folder1);

                        while($row_folder = mysql_fetch_array($qr_folder1)) {
                             $image_name1=$row_folder['sub_folder_image'];
                            $content1=$row_folder['sub_folder_name'];
                            $content1=substr($content1,0,100);
							  $id=$row_folder['id'];

                        
						?>
                                    <li class="portfolio-item col-sm-3 col-xs-6 no-padding">
                                        <a href="gallery_image.php?sf=<?php echo $id;?>">
                                            <h3 style="color:#1E90FF;"><?php echo $content1;?></h3>
                                            <figure class="animate fadeInLeft animated" style="padding-left:30px;">
                                                      <img src="adminpanel/public/uploads/<?php echo $image_name1; ?>" alt="image2">
                                               
                                            </figure>
                                        </a>
                                    </li>
									<?php }?>
                                    <!-- //Portfolio Item// -->
                                    <!-- Portfolio Item -->
                                 
                                    <!-- //Portfolio Item// -->
                                    <!-- Portfolio Item -->
                                   
                                    <!-- //Portfolio Item// -->
                                </ul>
                                <!-- End Portfolio -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- === END CONTENT === -->
            <!-- === BEGIN FOOTER === -->
           
            <!-- Footer Menu -->
            <div id="footer">
                <div class="container">
                    <div class="row">
                        <div id="copyright" class="col-md-4">
                            <p>(c) 2014 Your Copyright Info</p>
                        </div>
                      
                    </div>
                </div>
            </div>
            <!-- End Footer Menu -->
            <!-- JS -->
            <script type="text/javascript" src="assets/js/jquery.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="assets/js/bootstrap.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="assets/js/scripts.js"></script>
            <!-- Isotope - Portfolio Sorting -->
            <script type="text/javascript" src="assets/js/jquery.isotope.js" type="text/javascript"></script>
            <!-- Mobile Menu - Slicknav -->
            <script type="text/javascript" src="assets/js/jquery.slicknav.js" type="text/javascript"></script>
            <!-- Animate on Scroll-->
            <script type="text/javascript" src="assets/js/jquery.visible.js" charset="utf-8"></script>
            <!-- Sticky Div -->
            <script type="text/javascript" src="assets/js/jquery.sticky.js" charset="utf-8"></script>
            <!-- Slimbox2-->
            <script type="text/javascript" src="assets/js/slimbox2.js" charset="utf-8"></script>
            <!-- Modernizr -->
            <script src="assets/js/modernizr.custom.js" type="text/javascript"></script>
            <!-- End JS -->
    </body>
</html>
<!-- === END FOOTER === -->