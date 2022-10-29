<?php
    // include('utils/login.php');
    include('temp/header.php');
?>
        <title>Home - SmartInPhone</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="<?php echo base_url();?>/assets/css/all-style.css" rel="stylesheet">
        <link href="<?php echo base_url();?>/assets/css/index_news.css" rel="stylesheet">
    </head>
<body>

<?php
    include('temp/nav.php');
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://localhost:8080/handphone/1',
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
    // echo $response;
    // echo $_SESSION["email"];
?>
    <div id="root" class="container"></div>
    <script src="<?php echo base_url();?>/assets/utils/getNews.js"></script>
    <script>
        getNews("carouselNews1","https://www.cnnindonesia.com/nasional/rss", "CNN Indonesia");
    </script>
<?php
    include('temp/footer.php');
?>
