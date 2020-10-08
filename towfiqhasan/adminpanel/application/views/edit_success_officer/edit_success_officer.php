<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Edit Success Officer
                    </header>
                    <div class="panel-body">
                        <?php foreach ($get_success_officer_data as $rowOfficer) :
                            $id=$rowOfficer->id;
                            $army_id=$rowOfficer->army_id;
                            $army_no= $rowOfficer->army_no;
                            $rank= $rowOfficer->rank;
                            $name_of_army_pers= $rowOfficer->name_of_army_pers;
                            $course= $rowOfficer->course;
                            $commision_dt= $rowOfficer->commision_dt;
                            $contact_no= $rowOfficer->contact_no;
                            $docus_recvd= $rowOfficer->docus_recvd;
                            $Required_Amount= $rowOfficer->Required_Amount;
                            $amnt_recvd=  $rowOfficer->amnt_recvd;
                            $amount_due=  $rowOfficer->amount_due;
                            $interest=  $rowOfficer->interest;
                            $group_no=  $rowOfficer->group_no;
                            $email=  $rowOfficer->email;
                            $name_of_NOK= $rowOfficer->name_of_NOK;
                            $unmsn= $rowOfficer->unmsn;
                            $plotinfo= $rowOfficer->plotinfo;
                            $remarks=  $rowOfficer->remarks;
                            $file_name=$rowOfficer->file_name;
                        endforeach;
                        ?>

                        <form class="cmxform form-horizontal tasi-form" id="addUserForm"  role="form" method="post"  action="<?php echo site_url('add_success_officer/editOfficerData');  ?>" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Army Id *</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Army Id" id="add_army_id" name="add_army_id" value="<?=$army_id;?>">
                                    <input type="hidden" class="form-control"  id="id" name="id" value="<?=$id;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Army No *</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Army No" id="add_army_no" name="add_army_no" value="<?=$army_no;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Rank *</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Rank" id="add_rank" name="add_rank" value="<?=$rank;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Army Name *</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Army Name" id="add_name" name="add_name" value="<?=$name_of_army_pers;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Course</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Course" id="add_course" name="add_course" value="<?=$course;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Commission Date</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Commission Date" id="add_cm_date" name="add_cm_date" value="<?=$commision_dt;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Contact No</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Contact No" id="add_contact_no" name="add_contact_no" value="<?=$contact_no;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Docus Received</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Docus Received" id="add_doc_rec" name="add_doc_rec" value="<?=$docus_recvd;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Required Amount</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Required Amount" id="add_req_am" name="add_req_am" value="<?=$Required_Amount;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Amount Received</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Amount Received" id="add_am_rec" name="add_am_rec" value="<?=$amnt_recvd;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Amount Due</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Amount Due" id="add_am_due" name="add_am_due" value="<?=$amount_due;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Interest</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Interest" id="add_interest" name="add_interest" value="<?=$interest;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Group No</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Group No" id="add_group_no" name="add_group_no" value="<?=$group_no;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Email</label>
                                <div class="col-lg-10">
                                    <input type="email" class="form-control" placeholder="Enter Email" id="add_email" name="add_email" value="<?=$email;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Name Of Nock</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Name Of Nock" id="add_nock" name="add_nock" value="<?=$name_of_NOK;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Unmsn</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Unmsn" id="add_unmsn" name="add_unmsn" value="<?=$unmsn;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Plot Info</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Plot Info" id="add_plot_info" name="add_plot_info" value="<?=$plotinfo;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Remark</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Enter Remark" id="add_remark" name="add_remark" value="<?=$remarks;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">Upload Image</label>
                                <div class="col-lg-10">
                                    <div class="col-lg-5">  <img src="<?php echo $base_url ?>public/uploads/<?php echo $file_name ?>" class="img-responsive" alt="image1"></div>
                                    <div class="col-lg-5"> <input type="file" name="userfile" size="20" /></div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info pull-right">Submit</button>
                        </form>

                    </div>
                </section>
            </div>
        </div>


    </section>
</section>
<!--main content end-->
