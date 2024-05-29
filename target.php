<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://exercisedb.p.rapidapi.com/exercises?limit=10",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: exercisedb.p.rapidapi.com",
		"X-RapidAPI-Key: e0e6757d03msh2851670f9283140p15ba52jsndca1f1c4cf41"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
}else {
	$exercices=json_decode($response,true);
}
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
                <div class="container">
                    <div class=row>
                    <?php
                    if (isset($exercices )&& is_array($exercices)){
                     foreach ($exercices as $exercice){
                             $execicestitle=$exercice['name'] ; 
                             $execicesimg=$exercice['gifUrl'] ;  
                          ?>   
                            
                        <div class="col-lg-3 md-4 sm-6">
                           <div class="card">
                            <img src="<?echo $execicesimg ?> " class="card-img-top" alt="">
                            <h5 class="card-title"><? echo $exercicestitle ?></h5>

                            </div>
                           </div>
                        </div>

                    
                        
                    </div>
                </div>
                     <?php 
                     }}
                     ?>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
        
    </body>
</html>
              