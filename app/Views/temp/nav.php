<?php
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
    $url = "https://";   
    else  
    $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   

    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];
?>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url();?>"><i class="fa-solid fa-mobile-screen-button fa-2xl logo-title"></i>SmartInPhone</a></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <?php
                        if ($url == base_url().'/') {
                            echo '<a class="nav-link active" aria-current="page" href="'.base_url().'">Home</a>';
                        } else {
                            echo '<a class="nav-link" aria-current="page" href="'.base_url().'">Home</a>';
                        }
                    ?>
                </li>
                <li class="nav-item">
                <?php
                        if ($url == base_url().'/listHP') {
                            echo '<a class="nav-link active" aria-current="page" href="'.base_url().'/listHP">List Handphone</a>';
                        } else {
                            echo '<a class="nav-link" aria-current="page" href="'.base_url().'/listHP">List Handphone</a>';
                        }
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                        if ($url == base_url().'/compare') {
                            echo '<a class="nav-link active" aria-current="page" href="'.base_url().'/compare">Compare</a>';
                        } else {
                            echo '<a class="nav-link" aria-current="page" href="'.base_url().'/compare">Compare</a>';
                        }
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                        if ($url == base_url().'/addHP') {
                            echo '<a class="nav-link active" aria-current="page" href="'.base_url().'/addHP">Add Handphone</a>';
                        } else {
                            echo '<a class="nav-link" aria-current="page" href="'.base_url().'/addHP">Add Handphone</a>';
                        }
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                        if ($url == base_url().'/about') {
                            echo '<a class="nav-link active" aria-current="page" href="'.base_url().'/about">About</a>';
                        } else {
                            echo '<a class="nav-link" aria-current="page" href="'.base_url().'/about">About</a>';
                        }
                    ?>
                </li>
            </ul>
            <!-- <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
            <?php
                if (!isset($_SESSION["email"])) {
                    include("loggedOut.php");
                } else {
                    include("loggedIn.php");
                }
            ?>
            </div>
        </div>
    </nav>