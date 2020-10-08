<?php 
session_start(); 
include_once 'common/header.php';  ?>
<!-- === BEGIN CONTENT === -->
<?php
 // $member_id=$_SESSION['member_id'];
// $personal_no= $_SESSION['personal_no'];
// $group_no=$_SESSION['group_no'];

if(isset($_POST['uploadImage'])) {

    if(isset($_FILES['image'])) {
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

        $target_dir = "adminpanel/public/uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        $expensions= array("jpeg","jpg","png");


        if (file_exists($target_file)) {
            $file_name="1".$file_name;
        }

        if(in_array($file_ext,$expensions)=== false) {
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

        if($file_size > 2097152) {
            $errors[]='File size must be excately 2 MB';
        }

        if(empty($errors)==true) {
            move_uploaded_file($file_tmp,"adminpanel/public/uploads/".$file_name);
            $member_id=$_POST['member_id'];
            $res= mysql_query("update successfull_officers set file_name='$file_name' where army_id='$member_id'");
            echo "Success Upload Image";
        }else {
            print_r($errors);
        }
    }

}


//exit;
if(isset($_POST['updateButton'])) {
    $army_id= $_POST['member_id'];
    $phn= $_POST['phn'];
    $em= $_POST['em'];
    $date=date('Y-m-d H:i:s');

    $result_sql=mysql_query("insert into confirm_info values(NULL,'$army_id','$phn','$em','0','0','$date')");
    if($result_sql) {
        echo "<div style='text-align:center;'><label style='color:green;'>Request send successfully</label></div>";
    }else {
        echo "<div style='text-align:center;'><label style='color:red;'>Failed to send request</label></div>";
    }
}
//exit;
$member_id='';
$personal_no='';
$group_no='';
if(isset ($_POST['member_id'])) {
    $member_id=$_POST['member_id'];
}else {
    $member_id=$_SESSION['member_id'];
}
if(isset ($_POST['personal_no'])) {
    $personal_no=$_POST['personal_no'];
}else {
    $personal_no=$_SESSION['personal_no'];
}
if(isset ($_POST['group_no'])) {
    $group_no=$_POST['group_no'];
}else {
    $group_no=$_SESSION['group_no'];
}


$result_sql=mysql_query("select * from successfull_officers where army_id like '%$member_id%' and army_no='$personal_no' and group_no='$group_no'");
if(mysql_num_rows($result_sql)) {
    while($row=mysql_fetch_array($result_sql)) {
        $army_id=  $row['army_id'];
        $army_no=  $row['army_no'];
        $rank=  $row['rank'];
        $name_of_army_pers=  $row['name_of_army_pers'];
        $course=  $row['course'];
        $commision_dt=  $row['commision_dt'];
        $contact_no=  $row['contact_no'];
        $email=  $row['email'];
        $name_of_NOK=  $row['name_of_NOK'];
        $unmsn= $row['unmsn'];
        $plotinfo=  $row['plotinfo'];
        $remarks= $row['remarks'];
        $amnt_recvd= $row['amnt_recvd'];
        $contact_no= $row['contact_no'];
        $email= $row['email'];
        $file_name= $row['file_name'];
        $_SESSION['login']=true;
        $_SESSION['member_id']=$army_id;
        $_SESSION['personal_no']=$army_no;
        $_SESSION['group_no']= $row['group_no'];
    }

}else {
    ?>
<script type="text/javascript">
    window.location="index.php?s=40";
</script>
    <?php
}
?>
<div id="content">
    <div class="container">
        <div class="row margin-vert-30">
            <form method="post" action="" enctype="multipart/form-data">
                <input type="hidden"  name="member_id" value="<?=$army_id; ?>" />
                <input type="hidden"  name="personal_no" value="<?=$personal_no; ?>"/>
                <input type="hidden"  name="group_no" value="<?=$group_no; ?>"/>
                <div class="col-md-5">

                    <?php if($file_name=="") { ?>
                    <img class="margin-top-10" alt="about-me" src="assets/img/profiles/99.jpg">
                        <?php }else { ?>
                    <img class="margin-top-10" alt="about-me" src="adminpanel/public/uploads/<?=$file_name; ?>">
                        <?php  } ?>
                    <input type="file" name="image" id="image" />
                    <button class="btn btn-info pull-right" name="uploadImage" type="submit">Upload Image</button>
                </div>
            </form>
            <div class="col-md-5">
                <h2 style="margin-left: -20px">Information</h2>
                <hr>
                <form method="post" action="">
                    <input type="hidden"  name="member_id" value="<?=$army_id; ?>" />
                    <input type="hidden"  name="personal_no" value="<?=$personal_no; ?>"/>
                    <input type="hidden"  name="group_no" value="<?=$group_no; ?>"/>
                    <div class="row">
                        <label>ID : </label>  <span><?=$army_id ?></span>
                    </div>
                    <div class="row">
                        <label>Army No : </label>  <span><?=$army_no ?></span>
                    </div>
                    <div class="row">
                        <label>Rank : </label>  <span><?=$rank ?></span>
                    </div>
                    <div class="row">
                        <label>Name : </label>  <span><?=$name_of_army_pers ?></span>
                    </div>
                    <div class="row">
                        <label>Course : </label>  <span><?=$course ?></span>
                    </div>
                    <div class="row">
                        <label>Commission Date : </label>  <span><?=$commision_dt ?></span>
                    </div>

                    <div class="row">
                        <label>Contact No : </label>  <span><?=$contact_no ?></span>
                    </div>

                    <div class="row">
                        <label>Email : </label>  <span><?=$email ?></span>
                    </div>
                    <div class="row">
                        <label>NOK : </label>  <span><?=$name_of_NOK ?></span>
                    </div>
                    <div class="row">
                        <label>UN Mission : </label>  <span><?=$unmsn ?></span>
                    </div>
                    <div class="row">
                        <label>Plot Info : </label>  <span><?=$plotinfo ?></span>
                    </div>

                    <div class="row">
                        <label>Remarks : </label>  <span><?=$remarks ?></span>
                    </div>
                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Installment No</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $result_sql2=mysql_query("select * from installment where army_no='$army_no'");
                                if(mysql_num_rows($result_sql2)) {
                                    $counter=0;
                                    while($row2=mysql_fetch_array($result_sql2)) {
                                        $counter++;
                                        $ammo= $row2['ammo'];
                                        $dates= $row2['dates'];
                                        ?>
                                <tr>
                                    <td><?=$counter; ?></td>
                                    <td><?=$ammo; ?></td>
                                    <td><?=$dates; ?></td>
                                </tr>
                                        <?php }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <label>Total amount received from you exclusive of registration fees is BDT:<?=$amnt_recvd; ?>  </label>
                    </div>
                    <hr>
                    <div class="row margin-bottom-20">
                        <label>Mobile Number
                            <span class="color-red">*</span>
                        </label>
                        <div class="col-md-12 col-md-offset-0">
                            <input type="text" class="form-control" name="phn"  value="<?=$contact_no; ?>">
                        </div>
                    </div>

                    <div class="row margin-bottom-20">
                        <label>Email
                            <span class="color-red">*</span>
                        </label>
                        <div class="col-md-12 col-md-offset-0">
                            <input type="text" class="form-control" name="em" value="<?=$email; ?>">
                        </div>
                    </div>

                    <div class="row">
                        <button class="btn btn-info pull-right" name="updateButton" type="submit">Update Phone $ Email</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="base">
        <div class="container padding-vert-30 margin-top-40">
        </div>
        <div class="container padding-vert-30 margin-top-40">
        </div>
    </div>

</div>
<?php

?>

</div>
</div>
<!-- === END CONTENT === -->
<?php include_once 'common/footer.php';  ?>