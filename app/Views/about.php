<?php
    // include('utils/login.php');
    include('temp/header.php');
?>
        <title>About - SmartInPhone</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="<?php echo base_url();?>/assets/css/all-style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="<?php echo base_url();?>/assets/css/about.css" rel="stylesheet">
    </head>
<body>

<?php
    include('temp/nav.php');
?>
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card p-3 py-4 mt-2">
                <div class="text-center">
                    <img src="<?php echo base_url();?>/assets/img/Profil.jpg" width="100" class="rounded-circle">
                </div>
                
                <div class="text-center mt-3">
                    <h5 class="mt-2 mb-0">M.Mahbubbillah</h5>
                    <span>222011569</span>
                    
                    <div class="px-4 mt-4">
                        <p class="fonts fw-10">Saya M.Mahbubbillah dari 3SI1. Web ini dibuat untuk memenuhi tugas proyek UTS Pemrograman Platform Khusus.</p>
                    </div>
                    
                     <ul class="social-list">
                        <li><i class="fa fa-facebook"></i></li>
                        <li><i class="fa fa-dribbble"></i></li>
                        <li><i class="fa fa-instagram"></i></li>
                        <li><i class="fa fa-linkedin"></i></li>
                        <li><i class="fa fa-google"></i></li>
                    </ul>
                    
                    <div class="buttons">
                        
                        <button class="btn btn-outline-primary px-4">Message</button>
                        <button class="btn btn-primary px-4 ms-3">Contact</button>
                    </div>
                </div>  
            </div>
        </div> 
    </div>
</div>
<?php
    include('temp/footer.php');
?>