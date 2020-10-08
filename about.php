<?php
session_start(); 
include_once 'common/header.php';  ?>
<!-- === BEGIN CONTENT === -->
<div id="content">
    <div class="container">
        <div class="row margin-vert-30">
            <div class="col-md-12">
                <!-- Main Column -->

                <?php

                $content='';
                $sql = "select * from menu_content where menu_id='5' ";
                $qr = mysql_query($sql);
                while($rows = mysql_fetch_array($qr))
                    $content = $rows['content'];
                ?>
               
                    <!-- Main Content -->
                  
                    <?=$content?>
                    <!-- End Main Content -->
              
                <!-- End Main Column -->
                <!-- Side Column -->
            
                <!-- End Side Column -->
            </div>
        </div>


    </div>

</div>

<!-- === END CONTENT === -->
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