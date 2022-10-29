<?php
    // include('utils/login.php');
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
        <h1>Add Handphone</h1><hr>
    </div>
    <div class="container d-flex justify-content-between">
        <div class="container m-3">
            <img class="border border-5 border-success"  width="200px" id="blah" src="<?php echo base_url();?>/assets/img/phone_dummy.png" alt="your image"/>
        </div>
        <form class="container m-3" action="<?php echo base_url(); ?>/postHP" method="post" enctype="multipart/form-data">
            <div class="input-group mb-2">
                <input name="phone_photo" type="file" value="<?php echo base_url();?>/assets/img/avaprof.png" class="form-control input_user" id="imgInp"/>
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Name</span>
                <input name="name" type="text" class="form-control" placeholder="Name" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Network</span>
                <input name="network" type="text" class="form-control" placeholder="Network" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Launch</span>
                <input name="launch" id="startDate" class="form-control" placeholder="Launch Date" type="date" />
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Body</span>
                <input name="body" type="text" class="form-control" placeholder="Body" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Display</span>
                <input name="display" type="text" class="form-control" placeholder="Display" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Platform</span>
                <input name="platform" type="text" class="form-control" placeholder="Platform" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Memory</span>
                <input name="memory" type="text" class="form-control" placeholder="Memory" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Maincam</span>
                <input name="maincam" type="text" class="form-control" placeholder="Maincam" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Selfcam</span>
                <input name="selfcam" type="text" class="form-control" placeholder="Selfcam" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Sound</span>
                <input name="sound" type="text" class="form-control" placeholder="Sound" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Comms</span>
                <input name="comms" type="text" class="form-control" placeholder="Comms" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Features</span>
                <input name="features" type="text" class="form-control" placeholder="Features" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Battery</span>
                <input name="battery" type="text" class="form-control" placeholder="Battery" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="mb-2 input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Tests</span>
                <input name="tests" type="text" class="form-control" placeholder="Tests" aria-label="Username" aria-describedby="addon-wrapping">
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