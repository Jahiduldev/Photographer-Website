<?php include_once 'common/header.php';  ?>
<!-- === BEGIN CONTENT === -->
<div id="content">
    <div class="container">
        <div class="row margin-vert-30">
            <div class="col-md-12">

                <?php
				if(isset($_POST['btnCmt'])){
				$up_id=$_POST['up_id'];
				$name=$_POST['name'];
				$mobile=$_POST['mobile'];
				$email=$_POST['email'];
				$comment=$_POST['comment'];
				
			$res=	mysql_query("insert into comment(`up_id`,`name`,`mobile`,`email`,`cmt`) values('$up_id','$name','$mobile','$email','$comment')");
				if($res){
				echo "<p style='color:green;font-weight:bold'>Submitted Successfully</p>";
				}else{
				echo "<p style='color:red;font-weight:bold'>Submitted Failed</p>";
				}
				}
				
				
				
				
				
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
						$date_time_update='';
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
						 $id=$row_img['id'];
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

				
				 <!-- Modal -->
        <div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Comment Confirmation</h4>
                    </div>

                    <div class="modal-body">
                        <form role="form" class="form-horizontal" action="" method="post">
                            <div class="form-group">
                                <label class="col-lg-3 col-sm-3 control-label" for="name">Name</label>
                                <div class="col-lg-9">
                                    <input type="text" placeholder="Enter Your Name" id="name" name="name" class="form-control">
									<input type="hidden" id="up_id" name="up_id" />
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-lg-3 col-sm-3 control-label" for="name">Mobile</label>
                                <div class="col-lg-9">
                                    <input type="text" placeholder="Enter Your Mobile No" id="mobile" name="mobile" class="form-control">
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-lg-3 col-sm-3 control-label" for="name">Email</label>
                                <div class="col-lg-9">
                                    <input type="email" placeholder="Enter Your Email" id="email" name="email" class="form-control">
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-lg-3 col-sm-3 control-label" for="name">Comment</label>
                                <div class="col-lg-9">
                                    <textarea placeholder="Enter Comment" id="comment" name="comment" class="form-control"> </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-9">
                                    <button class="btn btn-success" name="btnCmt" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- modal -->
				
				

            </div>
        </div>
    </div>
</div>

<!-- === END CONTENT === -->
<script>
 

       function editMenu(id){
	   $("#up_id").val(id);
     $("#myModalEdit").modal();
    }

</script>
<?php include_once 'common/footer.php';  ?>