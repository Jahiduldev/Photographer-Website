<?php include_once 'common/header.php';  ?>
<!-- === BEGIN CONTENT === -->
<div id="content">
    <div class="container">
        <div class="row margin-vert-30">
            <div class="col-md-12">
                <?php
                $sf=$_REQUEST['sf'];
                $sql_folder_name = "select * from sub_folder where id='$sf' ";
                $qr_folder_name = mysql_query($sql_folder_name);
                while($row_fn = mysql_fetch_array($qr_folder_name)) {
                    $fn=$row_fn['sub_folder_name'];
                }
                ?>
                <div class="row">
                    <h2 style='font-family:Matura MT Script Capitals;color:#0070C0'><?=$fn; ?></h2>
                </div>
                <div class="row">
                    <div class="col-md-12 portfolio-group">
                        <?php
                        $sql_img = "select * from upload where  sub_folder_id='$sf'";
                        $qr_img = mysql_query($sql_img);
                        while($row_img = mysql_fetch_array($qr_img)) {
                            $file_name=$row_img['file_name'];
                            $file_type=$row_img['file_type'];
                            $file_title_name=$row_img['file_title_name'];
 $date_time=$row_img['date_time'];
                            ?>
                        <!-- Portfolio Item -->
                        <div class="col-md-6 portfolio-item margin-bottom-40 code">
                            <div>
                                    <?php if($file_type==3) { ?>
                                <video width="100%" height="340" controls>
                                    <source src="adminpanel/public/uploads/<?php echo $file_name; ?>">
                                        Your browser does not support the video tag.
                                </video>
                                        <?php
                                        echo "<h5 style='color:#0070C0;text-decoration: underline;font-weight: bold;'>$file_title_name</h5>
                                        <h6 style='color:#0070C0;font-weight: bold;'>Uploaded on :$date_time</h6>";
                                        }else {
                                        echo $file_name;
                                          echo "<h5 style='color:#0070C0;text-decoration: underline;font-weight: bold;'>$file_title_name</h5>
                                        <h6 style='color:#0070C0;font-weight: bold;'>Uploaded on :$date_time</h6>";
                                    } ?>
                            </div>
                        </div>
                        <!-- End Portfolio Item -->
                            <?php  } ?>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- === END CONTENT === -->
<?php include_once 'common/footer.php';  ?>