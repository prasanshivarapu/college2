<!DOCTYPE html>
<html lang="en"> 
    <head>
        <title>Career | Jeevas Biotech</title>
        <?php include_once ("title.php"); ?>
    </head>
    <body class="home-orange-color">        
        <div class="offwrap"></div>
        <?php include_once ("loader.php"); ?>   
        
        <div class="main-content">
            <?php include_once ("header.php"); ?>
            <div class="rs-breadcrumbs img1">
                <div class="container">
                    <div class="breadcrumbs-inner">
                        <h1 class="page-title">Career</h1>
                    </div>
                </div>
            </div>

            <div class="rs-contact contact-style2 pt-100 pb-100 md-pt-70 md-pb-70">
                <div class="container">
                    <div class="row margin-0">
                        <div class="col-lg-6 contact-address">
                            <div class="sec-title mb-46">
                                <img src="images/joinourteam.png" />
                                <p class="margin-5"></p>
                                <p>Would you like to be a part of an Organization that is Devoted to Excellence in Quality and uncompromising Integrity in its service?</p>
                                <p>If yes, read on. In our fervour to realize our vision, we are looking for Talented, Experienced Professionals who have a taste for Excellence and who never want to stop Learning.</p>
                                <p>As an Analytical CRO, Jeevas Biotech gives its people an experience in a various scientific fields and we encourage our people to constantly improve their Knowledge and Skills through Training programs. Jeevas Biotech provides excellent working environment.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 contact-section contact-style2">
                            <div class="sec-title mb-60">
                                <h2 class="title">Submit Your Resume</h2>
                            </div>
                            <div class="contact-wrap">
                                <div id="form-messages"></div>
                                <form  method="post" action="#">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                                                <input class="from-control" type="text" id="name" name="name" placeholder="Fullname" required>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                                                <input class="from-control" type="text" id="email" name="email" placeholder="Email-Id" required>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                                                <input class="from-control" type="text" id="phone" name="phone" placeholder="Contact-No" required>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                                                <select class="from-control" id="department" name="department" required>
                                                    <option value="">Select Department</option>
                                                    <option value="Analytical Chemist">Analytical Chemist</option>
                                                    <option value="Microbiologist">Microbiologist</option>
                                                    <option value="Quality Assurance - Sr. Executives">Quality Assurance - Sr. Executives</option>
                                                    <option value="Business Development - Executives">Business Development - Executives</option>
                                                    <option value="Sample Collection Executives">Sample Collection Executives</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                                                <input class="from-control" type="file" accept="application/pdf" id="resume" name="resume" placeholder="Resume" required>
                                            </div>
                                            <div class="col-lg-12 mb-35">
                                                <textarea class="from-control" id="message" name="message" placeholder="Message" required></textarea>
                                            </div>
                                        </div>
                                        <div class="btn-part">
                                            <div class="form-group mb-0">
                                                <input class="readon submit" type="submit" value="Submit Now">
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p>&nbsp;</p>            
        </div>
        <?php include_once ("footer.php"); ?>
    </body>
</html>