<?php
session_start(); 
include_once 'common/header.php';  ?>
<!-- === BEGIN CONTENT === -->
<div id="content">
    <div class="container">
        <div class="row margin-vert-30">

            <?php

            if(isset ($_POST['news_btn']) || $_SESSION['login']) {          

                if(isset ($_POST['member_id'])) {
                    $member_id=$_POST['member_id'];

                }else{
                   $member_id=$_SESSION['member_id'];
                }
                if(isset ($_POST['personal_no'])) {
                    $personal_no=$_POST['personal_no'];

                }else{
                       $personal_no=$_SESSION['personal_no'];
                }
                if(isset ($_POST['group_no'])) {
                    $group_no=$_POST['group_no'];
                }else{
                     $group_no=$_SESSION['group_no'];
                }

                if(isset ($_POST['id'])) {
                    $id=$_POST['id'];
                   
                }else{
                  $id= $_SESSION['id'];
                }
          
                $result_sql=mysql_query("select * from successfull_officers where army_id like '%$member_id%' and army_no='$personal_no' and group_no='$group_no'");


                if(mysql_num_rows($result_sql)) {

                    $_SESSION['member_id'] = $member_id;
                    $_SESSION['personal_no'] = $personal_no;
                    $_SESSION['group_no'] = $group_no;
                    $_SESSION['login'] = true;

                    $sql_news = "select * from recent_news where menu_id='$id'";
                    $qr_news = mysql_query($sql_news);

                    while($row_news = mysql_fetch_array($qr_news)) {
                        $image_name=$row_news['image_name'];
                        $content=$row_news['content'];

                    }
                    ?>
            <div class="col-md-12">
                <h2>Recent News</h2>
                <div class="col-md-6">
                    <img src="adminpanel/public/uploads/<?php echo $image_name; ?>">
                </div>
                <div class="col-md-6"><?=$content;?></div>

            </div>
            <p>&nbsp;</p>
          
                    <?php
                    $sql_news_file = "select * from recent_news_file where news_id='$id'";
                    $qr_news_file = mysql_query($sql_news_file);
                    if(count($qr_news_file)) {
                        while($row_news_file = mysql_fetch_array($qr_news_file)) {
                            $file_title_name=$row_news_file['file_title_name'];
                            $file_name=$row_news_file['file_name'];
                            ?>
            <div class="row">
                <div class="col-md-10">
                    <label style="font-size: x-large;color: blue;"><?=$file_title_name;?>&nbsp;&nbsp;</label>
                    <a style="color:red;font-weight: bold;font-style: italic;" href="adminpanel/public/uploads/<?php echo $file_name; ?>" target="_blank">Click Here</a>
                </div>
            </div>

                            <?php
                        }
                    }

                }else {


                    ?>
            <script type="text/javascript">
                window.location="index.php";
            </script>
                    <?php
                }

            }else {
                $id= $_REQUEST['id'];
                $sql_news = "select * from recent_news where id='$id'";
                $qr_news = mysql_query($sql_news);

                while($row_news = mysql_fetch_array($qr_news)) {
                    $image_name=$row_news['image_name'];
                    $content=$row_news['content'];
                    //   $file_name=$row_news['file_name'];
                }
                ?>
            <div class="col-md-12">
                <h2 style='font-family:Matura MT Script Capitals;color:#0070C0;'>Recent News</h2>

                <div class="col-md-6">
                    <img src="adminpanel/public/uploads/<?php echo $image_name; ?>">
                </div>
                <div class="col-md-6"><?=$content;?></div>

            </div>
                <?php
                $sql_news_file = "select * from recent_news_file where news_id='$id'";
                $qr_news_file = mysql_query($sql_news_file);
                if(count($qr_news_file)) {
                    while($row_news_file = mysql_fetch_array($qr_news_file)) {
                        $file_title_name=$row_news_file['file_title_name'];
                        $file_name=$row_news_file['file_name'];

                        ?>
            <div class="row">
                <div class="col-md-6 col-md-offset-6">
                    <a style="color:#000;font-weight: bold" href="adminpanel/public/uploads/<?php echo $file_name; ?>" download>Download File</a>
                </div>
            </div>

                        <?php
                    }
                }
            }
            ?>







        </div>
    </div>


</div>
</div>
</div>
<!-- === END CONTENT === -->
<?php include_once 'common/footer.php';  ?>