<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="robots" content="noindex,nofollow"/>
    <title>Registration page</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/style.min.css" rel="stylesheet"/>
</head>
<body class="bg-dark">
<h1 class="text-light d-flex justify-content-center my-5">
    Welcome to the home page
</h1>
<div class="main-wrapper">
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div class="auth-wrapper d-flex no-block justify-content-center
                        align-items-top bg-dark px-3 pb-3 mx-auto row container">
        <!-- ============================================================== -->
        <!-- Registration block -->
        <!-- ============================================================== -->
        <div class="auth-box bg-dark border-top border-secondary col-md-5 col-sm-6 col-9 px-3">
            <div>
                <div class="text-center pt-4 pb-4">
                    <h2 class="text-light">
                        Registration form
                    </h2>
                </div>
                <div id="error-message" style="color: red;"></div>
                <form id="registration-form" name="RegForm"
                      class="validatedForm form-horizontal mt-3"
                      onkeydown="return event.key !== 'Enter'">
                    <div class="row pb-4">
                        <div class="col-12">
                            <!-- name -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white h-100" id="basic-addon1">
                                        <em class="mdi mdi-account fs-4"></em>
                                    </span>
                                </div>
                                <input type="text" class="form-control form-control-lg"
                                       placeholder="Name"
                                       name="name"
                                       aria-label="Name"
                                       aria-describedby="basic-addon1" required/>
                            </div>
                            <!-- surname -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white h-100" id="basic-addon2">
                                        <em class="mdi mdi-account fs-4"></em>
                                    </span>
                                </div>
                                <input type="text" class="form-control form-control-lg"
                                       placeholder="Surname"
                                       name="surname"
                                       aria-label="Surname"
                                       aria-describedby="basic-addon2" required/>
                            </div>
                            <!-- email -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white h-100" id="basic-addon3">
                                        <em class="mdi mdi-email fs-4"></em>
                                    </span>
                                </div>
                                <input type="email" class="form-control form-control-lg"
                                       placeholder="Email"
                                       name="email"
                                       aria-label="Email"
                                       aria-describedby="basic-addon3" required/>
                            </div>
                            <!-- password -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-warning text-white h-100" id="basic-addon4">
                                        <em class="mdi mdi-lock fs-4"></em>
                                    </span>
                                </div>
                                <input type="password" class="form-control form-control-lg"
                                       placeholder="Password"
                                       name="password"
                                       aria-label="Password"
                                       aria-describedby="basic-addon4" required
                                />
                            </div>
                            <!-- password_confirm -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-info text-white h-100" id="basic-addon5">
                                        <em class="mdi mdi-lock fs-4"></em>
                                    </span>
                                </div>
                                <input type="password" class="form-control form-control-lg"
                                       placeholder="Confirm password"
                                       name="password_confirm"
                                       aria-label="Confirm password"
                                       aria-describedby="basic-addon5" required
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row border-top border-secondary">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="pt-3 d-grid">
                                    <button type="submit" class="btn btn-block btn-lg btn-info">
                                        Sign Up
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <footer class="footer text-center text-light ">
            Register-page, PHP test task, 2023
        </footer>
    </div>
</div>
<!-- ============================================================== -->
<!-- All Required js -->
<!-- ============================================================== -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/index.js"></script>
</body>
</html>

