<?php
include("header.php");
?>

<section class="pad100" style="background-image: url(assets/images/slideshow/slider-7.jpg); padding-bottom:30rem ">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="template-image">
                </div>
            </div>
            <div class="col-md-7" style="background-color:white;padding-bottom:1rem; border-radius:0.5rem;">
                <div class="text-section" >
                    <h3 class="underline">Crime Report <br/><span>Hub</span></h3>
                    <p class="mb30">The <strong>Crime Report Hub</strong>  is a website in which will reduce the paperwork of the police station.This project is maintained in a single server and it makes handling of records easier. Here we can maintain, add and retrieve all complaint related records in a single database system.</p>
                    <a href="about.php" class="btn btn-primary mini-mar-bottom">VIEW MORE</a>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="pad-t100 pad-b70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3>Crime Report Hub </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="feature-1">
                    <div class="media">
                        <div class="media-left">
                            <div class="feature-icon text-center">
                                <i class="fa fa icon-lightbulb"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h4>Cop Account</h4>
                            <p>This module allows cops to add and modify crime reports with all new updates..  Admin is the main user of the system. Cops are updated with real time data.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-1">
                    <div class="media">
                        <div class="media-left">
                            <div class="feature-icon text-center">
                                <i class="fa fa icon-gears"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h4>Complaint</h4>
                            <p>Any public members can file complaint through online by entering Complaint reason, evidence, complaint details, complaint type, etc. Even police department can file complaint from their account if anyone gives complaint directly by visiting police station.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="pad-t100 pad-b70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3>Contact Cops</h3> 
                </div>
            </div>
        </div>
        <div class="row">
        <?php
            $sql = "SELECT cop.*,designation.designation_type,station.station FROM cop LEFT JOIN station on cop.station_id=station.station_id LEFT JOIN designation ON designation.designation_id=cop.designation_id WHERE cop.status='Active' AND cop.cop_id!= '0' order by rand() limit 9 ";
            $qsql = mysqli_query($con,$sql);
            while($rsprofile = mysqli_fetch_array($qsql)){
        ?>
            <div class="col-md-4 col-sm-4">
                <div class="team-member-1">
                    <div class="team-info">
                        <div class="team-name"><?php echo $rsprofile['cop_name']; ?></div>
                        <div class="team-designation"><?php echo $rsprofile['designation_type']; ?></div>
                        <div class="team-designation"><?php echo $rsprofile['contact_no']; ?></div>
                        <div class="team-designation"><?php echo $rsprofile['email_id']; ?></div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>

        </div>
    </div>
</section>

<?php
include("footer.php");
?>