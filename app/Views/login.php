<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Shotcut Icon" href="<?php echo base_url();?>/assets/img/logosm.png" type="image/png" />
    <title>Login - SmartInPhone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="<?php echo base_url();?>/assets/css/login-reg.css" rel="stylesheet">
</head>
<body>
    <div class="container h-100">
            <div class="login_name_wrapper">
                <div class="d-flex justify-content-center">SmartInPhone</div>
            </div>
        <div class="d-flex justify-content-center h-50" >
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="login_logo_container"> <img src="<?php echo base_url();?>/assets/img/avaprof.png" class="login_logo" alt="Logo"> </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form style="width: 320px" action="<?php echo base_url(); ?>/login/postLogin" method="post">
                        <div id="msgcont" class="d-flex justify-content-center" style="display:none!important">
                            <div id="msg" class="alert alert-danger py-1 px-2" role="alert"></div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                            <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control input_user" required>
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-append"> <span class="input-group-text"><i class="fas fa-key"></i></span> </div>
                            <input type="password" name="password" placeholder="Password" class="form-control input_pass" required>
                        </div>

                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" onclick="on_submit()"class="btn login_btn">Login</button>
                        </div>
                    </form>
                </div>
                <div class="mt-4">
                    <div class="d-flex justify-content-center links">Belum mempunyai akun?<a href="<?php echo base_url();?>/register">Daftar!</a> </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>