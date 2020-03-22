<?php
// if data are received via POST, with index of 'test'
if (isset($_POST['antwort_id']) && isset($_POST['type'])) {
    $antwort_id = $_POST['antwort_id'];
    $type = $_POST['type'];
    echo "Die id ist: $antwort_id und der Type ist: $type";


    // Connect to database
    $mysqli = new mysqli("localhost", "root", "", "wissensdatenbank2");

    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    // Get the question:
if ($type==1){

    $query = "UPDATE antworten SET Upvote = Upvote + 1 WHERE antworten.ID = $antwort_id";
}
else{
    $query = "UPDATE antworten SET Downvote = Downvote + 1 WHERE antworten.ID = $antwort_id";
}
    
    echo $query;
    // Print the answers
    if ($result = $mysqli->query($query)) {
        
    }
}

?>