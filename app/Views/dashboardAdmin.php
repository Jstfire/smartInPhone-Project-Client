<?php
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost:8080/handphone/',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($response, true);
    include('temp/header.php');
?>
        <title>Dashboard Admin - SmartInPhone</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="<?php echo base_url();?>/assets/css/all-style.css" rel="stylesheet">
    </head>
<body>
<?php
    include('temp/nav.php');
?>
    <div class="container text-center mt-4">
    <div class="w-50 m-auto mt-1">
        <h1>Dashboard Admin</h1><hr>
    </div>
    <div class="input-group flex-nowrap m-2">
        <span class="input-group-text" id="addon-wrapping">By Name</span>
        <input type="text" class="form-control" placeholder="Finding phone by name..." aria-label="Phone Name" aria-describedby="addon-wrapping" onkeyup="showHintNameAdmin(this.value)">
    </div>
    <div class="row" id="txtHintAdmin">
    <?php foreach ($result['handphones'] as $value):?>
        <div class="col">
            <div class="card mb-2" style="width: 261px;">
            <img alt="Phone Photo" style="width: 259px; height: 259px; object-fit: fill;" class="card-img-top" src="data:image/png;base64,<?php echo $value['phone_photo'];?>"/>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $value['name'];?></h5>
                    <p class="card-text"><?php echo $value['launch'];?></p>
                    <a href="<?php echo base_url().'/showHP?ID='.$value['id']?>" class="btn btn-primary m-1">Detail</a>
                    <a href="<?php echo base_url().'/updateHP?ID='.$value['id']?>" class="btn btn-primary m-1">Update</a>
                    <a href="<?php echo base_url().'/deleteHP?ID='.$value['id']?>" class="btn btn-danger m-1">Delete</a>
                </div>
            </div>
        </div>
    <?php endforeach ?> 
    </div>
    
    </div>
    <script src="<?php echo base_url();?>/assets/utils/suggestionAdmin.js"></script>


<?php
    include('temp/footer.php');
?>