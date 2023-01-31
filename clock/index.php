<?php include 'layouts/header.php'; ?>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class = "auth-wrapper d-flex no-block justify-content-center align-items-center" style = "background-color:#2525a8;">
        <div class = "auth-box border-top border-secondary" style                                   = "width:700px ;">
                <div>
                    <div  class = "text-center">
                    <span class = "db"><img src = "layouts/assets/images/nupsg-logo.png" alt = "logo" width = "100px"/></span>
                        <h6 class="text-uppercase">3<sup>rd</sup> February 2023 AllNight Registration</h6>
                    </div>
                    <!-- alert -->
                    <div class = " reg-alert alert"></div>
                    <!-- Form -->
                    <form  class = "form-horizontal m-t-20" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" id = "student-reg-form" enctype = "multipart/form-data">
                    <div   class = "row p-b-30">
                    <div   class = "col-12">
                    <div   class = "form-group mb-3">
                    <input type  = "text" class                    = "form-control form-control-lg" placeholder               = "FullName" aria-label      = "FullName" name = "student-name" autofocus>
                                </div>
                                <div   class = "form-group mb-3">
                                <small class = "text-danger">your student ID should not be comprised of any of the following: / - _ @ ., \ | ` ' " i.e. UGXXXXXXXXX</small>
                                    <input type = "text" class = "form-control form-control-lg" placeholder = "Student ID" aria-label = "Student ID" name = "student-id">
                                </div>
                                <div   class = "form-group mb-3">
                                <input type  = "text" class = "form-control form-control-lg" placeholder = "Level" aria-label = "Level" name = "student-level">
                                </div>
                                <div   class = "form-group mb-3">
                                <input type  = "text" class = "form-control form-control-lg" placeholder = "Program" aria-label = "Program" name = "student-program">
                                </div>
                                <div   class = "form-group mb-3">
                                <input type  = "text" class = "form-control form-control-lg" placeholder = "Hall/Hostel" aria-label = "Hall" name = "student-hall">
                                </div>
                                <div   class = "form-group mb-3">
                                <input type  = "text" class = "form-control form-control-lg" placeholder = "Contact" aria-label = "Contact" name = "student-contact">
                                </div>
                                <div class = "form-group mb-3">
                                    <label>Upload Passport Picture</label>
                                    <input type = "file" class = "form-control form-control-lg" name = "student-picture">
                                </div>
                            </div>
                        </div>
                        <div    class = "row border-top border-secondary">
                        <div    class = "col-12">
                        <div    class = "form-group">
                        <div    class = "p-t-20">
                        <button class = "btn btn-block btn-lg btn-info" type = "submit">Register</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->

    <?php include 'layouts/footer.php'; ?>