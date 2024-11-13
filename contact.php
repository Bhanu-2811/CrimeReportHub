<?php
include("header.php");
?>


<section class="breadcrumb-section parallax" style="background-image: url(assets/images/bg/breadcrumb4.png);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title">
                    <h1>Contact us</h1>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="pad100">
    <div class="container">
        <div class="row">
            <div class="section-title text-center">
                <h3>Drop Us a Message</h3>
            </div>
        </div>
        <div class="col-md-8">
            <form id="contactForm" class="contact-form" method="post" role="form">
                <div class="controls">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group"><strong>Type here:</strong>
                                <textarea id="form_message" name="message" class="form-control" required="required" data-error="Please,leave us a message." style="min-height: 300px;"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                            <input type="submit" class="btn btn-primary mb30" value="Send message">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4 mbl-mar-top">
            <div class="feature-5">
                <div class="media">
                    <div class="media-left">
                        <div class="icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <a href="#"><h4>Address</h4></a>
                        <div class="feature-text">
                            <p>CVR College Of Engineering,<br/>Vastunagar,Ibrahimpatanam.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature-5">
                <div class="media">
                    <div class="media-left">
                        <div class="icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <a href="#"><h4>E-mail</h4></a>
                        <div class="feature-text">
                            <p>ramidibhanuprakashreddy@gmail.com<br/>contact@policeinfo.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature-5">
                <div class="media">
                    <div class="media-left">
                        <div class="icon">
                            <i class="fa fa-phone"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <a href="#"><h4>Phone</h4></a>
                        <div class="feature-text">
                            <p>+91 9014237130<br/>+91 7032091729<br/>+91 7780110779</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


 <?php
include("footer.php");
?>
 