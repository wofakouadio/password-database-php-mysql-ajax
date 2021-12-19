
 <?php
    include 'header.php';
 ?>

<div class='container'>

    <div class='row justify-content-lg-center'>

        <!-- sign-in form -->

        <div class='col-md-8 col-xs-6'>

            <div class='d-flex card shadow-lg p-3 m-4 my-5 mb-1'>

                <div class='card-body mb-0'>

                    <h4 class='card-title fs-2 fw-bold text-center text-uppercase'>Password Database 🔐🗄️</h4>

                    <div class="row justify-content-between my-5 p-1 gx-5">

                        <div class="alert">

                        </div>

                            <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fs-4 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">SignIn</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fs-4" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">SignUp</button>
                                </li>
                                
                            </ul>
                            <div class="tab-content" id="pills-tabContent">

                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    
                                    <div class="col col-xs-6 pl-2 ml-2">

                                        <!-- <h4 class="fs-4 text-center">SignIn</h4> -->

                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method='POST'
                                        class="form-group pt-3 pb-2" id="signin-form">

                                            <div class='form-group'>
                                                <label for="Email">Email</label>
                                                <input type="email" name="si-user_mail" id="si-user_mail" class="form-control">
                                            </div>

                                            <div class='form-group'>
                                                <label for="Password">Password</label>
                                                <input type="password" name="si-user_pass" id="si-user_pass" class="form-control">
                                            </div>

                                            <div class='form-group'>
                                                <button class='btn btn-info my-3 text-white' name='signup_btn' type='submit'
                                                    id='signup_btn'>SignIn</button>
                                            </div>

                                        </form>

                                    </div>

                                </div>

                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    
                                    <div class="col col-xs-6 pl-2 mr-2">

                                        <!-- <h4 class="fs-6 text-center">Create an account to have a sound mind knowing your passwords are safe</h4> -->

                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method='POST'
                                        class="form-group pt-3 pb-2" id="signup-form">

                                            <div class="row">

                                                <div class="col">
                                                   <div class='form-group'>
                                                        <label for="FirstName">FirstName</label>
                                                        <input type="text" name="su-user_fname" id="su-user_fname" class="form-control">
                                                    </div> 
                                                </div>

                                                <div class="col">
                                                    <div class='form-group'>
                                                        <label for="LastName">LastName</label>
                                                        <input type="text" name="su-user_lname" id="su-user_lname" class="form-control">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col">
                                                    <div class='form-group'>
                                                        <label for="Contact">Contact</label>
                                                        <input type="text" name="su-user_contact" id="su-user_contact" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class='form-group'>
                                                        <label for="Email">Email</label>
                                                        <input type="text" name="su-user_mail" id="su-user_mail" class="form-control">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col">
                                                    <div class='form-group'>
                                                        <label for="Password">Password</label>
                                                        <input type="password" name="su-user_pass" id="su-user_pass" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class='form-group'>
                                                        <label for="Password">Repeat Password</label>
                                                        <input type="password" name="su-user_rpass" id="su-user_rpass" class="form-control">
                                                    </div>
                                                </div>

                                            </div><br> 
                                            
                                            <div class="form-check">
                                                <input type="checkbox" name="agreed_terms_conditions" id="agreed_terms_conditions" class="form-check-input bg-warning">
                                                <label for="form-check-input">I agree to the terms, conditions and policies</label>
                                            </div>

                                            <div class='form-group'>
                                                <button class='btn btn-warning my-3 text-white' name='signup_btn' type='submit'
                                                    id='signup_btn'>SignUp</button>
                                            </div>

                                        </form>

                                    </div>

                                </div>
                            </div>
                    </div>

                </div>

            </div>

        </div>        

    </div>

</div>


<?php
    include 'footer.php';
 ?>