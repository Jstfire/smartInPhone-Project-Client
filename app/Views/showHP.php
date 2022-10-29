<?php
    if (isset($_GET['ID'])) {
        $ID = $_GET['ID'];
        // echo $ID;
    }
    
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost:8080/handphone/'.$ID,
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
    // echo $result['name'];
    include('temp/header.php');
?>
        <title><?php echo $result['name'];?> - SmartInPhone</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="<?php echo base_url();?>/assets/css/all-style.css" rel="stylesheet">
    </head>
<body>
<?php
    include('temp/nav.php');
?>
<div class="container-fluid m-2">
    <ul class="list-group text-center">
        <li class="list-group-item">
            <h3><?php echo $result['name'];?></h3>
            <img class="border border-2 border-success" alt="Phone Photo" style="height: 300px;" src="data:image/png;base64,<?php echo $result['phone_photo'];?>"/>
            <a href="<?php echo base_url().'/updateHP?ID='.$result['id']?>" class="btn btn-primary">Update</a>
        </li>
        <li class="list-group-item list-group-item-dark"><h5>Network</h5></li>
        <li class="list-group-item"><p><?php echo $result['network'];?></p></li>
        <li class="list-group-item list-group-item-dark"><h5>Launch Date</h5></li>
        <li class="list-group-item"><p><?php echo $result['launch'];?></p></li>
        <li class="list-group-item list-group-item-dark"><h5>Body</h5></li>
        <li class="list-group-item"><p><?php echo $result['body'];?></p></li>
        <li class="list-group-item list-group-item-dark"><h5>Display</h5></li>
        <li class="list-group-item"><p><?php echo $result['display'];?></p></li>
        <li class="list-group-item list-group-item-dark"><h5>Platform</h5></li>
        <li class="list-group-item"><p><?php echo $result['platform'];?></p></li>
        <li class="list-group-item list-group-item-dark"><h5>Memory</h5></li>
        <li class="list-group-item"><p><?php echo $result['memory'];?></p></li>
        <li class="list-group-item list-group-item-dark"><h5>Main Camera</h5></li>
        <li class="list-group-item"><p><?php echo $result['maincam'];?></p></li>
        <li class="list-group-item list-group-item-dark"><h5>Selfie Camera</h5></li>
        <li class="list-group-item"><p><?php echo $result['selfcam'];?></p></li>
        <li class="list-group-item list-group-item-dark"><h5>Sound</h5></li>
        <li class="list-group-item"><p><?php echo $result['sound'];?></p></li>
        <li class="list-group-item list-group-item-dark"><h5>Comms</h5></li>
        <li class="list-group-item"><p><?php echo $result['comms'];?></p></li>
        <li class="list-group-item list-group-item-dark"><h5>Features</h5></li>
        <li class="list-group-item"><p><?php echo $result['features'];?></p></li>
        <li class="list-group-item list-group-item-dark"><h5>Battery</h5></li>
        <li class="list-group-item"><p><?php echo $result['battery'];?></p></li>
        <li class="list-group-item list-group-item-dark"><h5>Tests</h5></li>
        <li class="list-group-item"><p><?php echo $result['tests'];?></p></li>
    </ul>
</div>

<?php
    // return $result;
    // print_r($result);
    // echo $result['handphones'][0]['name'];
    // echo $result['handphones'][1]['name'];
    // echo $response;
    include('temp/footer.php');
?>