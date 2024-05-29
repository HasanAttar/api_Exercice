<?php
if (isset($_GET['exercise'])) {
    $selectedExercise = $_GET['exercise'];

    // Fetch the exercises for the selected category
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://exercisedb.p.rapidapi.com/exercises/target/$selectedExercise?limit=10",
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
    } else {
        $exerciseDetails = json_decode($response, true);

        // Display the selected exercises
        echo "<h2>Exercises for $selectedExercise</h2>";
        echo "<ul>";
        foreach ($exerciseDetails as $exercise) {
            echo "<li>" . $exercise['name'] . "</li>";
        }
        echo "</ul>";
    }
} else {
    // Handle the case where no exercise is selected
    echo "Please select an exercise from the dropdown.";
}
?>
