<?php
    if (isset($_GET['ID'])) {
        $ID = $_GET['ID'];
    }
    $str1 = 'Authorization: Bearer '. $_SESSION["token"];
    $str2 = 'Content-Type: application/json';
    $curl = curl_init();

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


    include('temp/header.php');
?>
        <title>Home - SmartInPhone</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="<?php echo base_url();?>/assets/css/all-style.css" rel="stylesheet">
    </head>
<body>
<?php
    include('temp/nav.php');
?>
    <div class="w-50 m-auto mt-3 text-center">
        <h1>Update Handphone</h1><hr>
    </div>
    <div class="container d-flex justify-content-between">
        <div class="container m-3">
            <img class="border border-5 border-success"  width="200px" id="blah" src="data:image/png;base64,<?php echo $result['phone_photo'];?>" alt="your image"/>
        </div>
        <form class="container m-3" action="<?php echo base_url(); ?>/postUpdateHP?ID=<?php echo $result['id'];?>" method="post" enctype="multipart/form-data">
            <div class="input-group mb-2">
                <input name="phone_photo" type="file" class="form-control input_user" id="imgInp"/>
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Name</span>
                <input name="name" type="text" value="<?php echo $result['name'];?>" class="form-control" placeholder="Name" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Network</span>
                <input name="network" type="text" value="<?php echo $result['network'];?>" class="form-control" placeholder="Network" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Launch</span>
                <input name="launch" id="startDate" value="<?php echo $result['launch'];?>" class="form-control" placeholder="Launch Date" type="date" />
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Body</span>
                <input name="body" type="text" value="<?php echo $result['body'];?>" class="form-control" placeholder="Body" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Display</span>
                <input name="display" type="text" value="<?php echo $result['display'];?>" class="form-control" placeholder="Display" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Platform</span>
                <input name="platform" type="text" value="<?php echo $result['platform'];?>" class="form-control" placeholder="Platform" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Memory</span>
                <input name="memory" type="text" value="<?php echo $result['memory'];?>" class="form-control" placeholder="Memory" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Maincam</span>
                <input name="maincam" type="text" value="<?php echo $result['maincam'];?>" class="form-control" placeholder="Maincam" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Selfcam</span>
                <input name="selfcam" type="text" value="<?php echo $result['selfcam'];?>" class="form-control" placeholder="Selfcam" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Sound</span>
                <input name="sound" type="text" value="<?php echo $result['sound'];?>" class="form-control" placeholder="Sound" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Comms</span>
                <input name="comms" type="text" value="<?php echo $result['comms'];?>" class="form-control" placeholder="Comms" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Features</span>
                <input name="features" type="text" value="<?php echo $result['features'];?>" class="form-control" placeholder="Features" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Battery</span>
                <input name="battery" type="text" value="<?php echo $result['battery'];?>" class="form-control" placeholder="Battery" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Tests</span>
                <input name="tests" type="text" value="<?php echo $result['tests'];?>" class="form-control" placeholder="Tests" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            
            <button type="submit" onclick="on_submit()" class="container btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }	
    </script>
<?php
    include('temp/footer.php');
?>