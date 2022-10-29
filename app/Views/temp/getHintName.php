<?php    
    $name = $_GET["keyword1"];
    // echo $name;

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
?>
    <?php 
        foreach ($result['handphones'] as $value):
            if (stristr($value['name'], $name)) {
    ?>
        <div class="col">
            <div class="card mb-2" style="width: 261px;">
            <img alt="Phone Photo" style="width: 259px; height: 259px; object-fit: fill;" class="card-img-top" src="data:image/png;base64,<?php echo $value['phone_photo'];?>"/>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $value['name'];?></h5>
                    <p class="card-text"><?php echo $value['launch'];?></p>
                    <a href="<?php echo base_url().'/showHP?ID='.$value['id']?>" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
    <?php
            }
        endforeach
    ?> 

