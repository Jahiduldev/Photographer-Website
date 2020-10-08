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
                    $date_time=$row_fn['date_time'];
                }
                ?>
                <div class="row">
                    <h2 style='font-family:Matura MT Script Capitals;color:#0070C0;text-decoration: underline;'><?=$fn; ?></h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span style="color:#0070C0; "><strong>Uploaded :<?=date("jS F Y ",strtotime($date_time)); ?></strong></span>
                    </div>
                    <div class="col-md-4">
                        <?php
                        $sql_img = "select * from upload where  sub_folder_id='$sf' order by id desc limit 1";
                        $qr_img = mysql_query($sql_img);
                        while($row_img = mysql_fetch_array($qr_img)) {
                            $date_time_update=$row_img['date_time'];
                        }

                        ?>

                        <span style="color:#0070C0; "><strong>Updated :<?=date("jS F Y ",strtotime($date_time_update)); ?></strong></span>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12 portfolio-group">
                        <?php

                        $sql_img = "select * from upload where  sub_folder_id='$sf' ";
                        $qr_img = mysql_query($sql_img);
                        while($row_img = mysql_fetch_array($qr_img)) {
                            $file_name=$row_img['file_name'];
                            $file_title_name=$row_img['file_title_name'];
                            $date_time=$row_img['date_time'];
                            ?>
                        <!-- Portfolio Item -->
                        <div class="col-md-3 portfolio-item margin-bottom-40 code">
                            <div>
                                <a  class="thumbBox2" href="adminpanel/public/uploads/<?php echo $file_name; ?>" rel="lightbox-thumbs2">
                                    <figure>
                                        <img src="adminpanel/public/uploads/<?php echo $file_name; ?>" alt="image1">
                                        <figcaption>
                                            <span style="color:#0070C0; "><strong><?=$file_title_name; ?></strong></span><br>

                                        </figcaption>
                                    </figure>
                                </a>
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