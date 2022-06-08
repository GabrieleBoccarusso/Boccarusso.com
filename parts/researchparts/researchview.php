<?php
    $sql = "SELECT * FROM post WHERE Title LIKE '%{$_GET['q']}%'";
    $result = $conn->query($sql);
    $data = $result->fetch_all();

    if($data){
        echo "<h1 class='primary'>Search results for {$_GET['q']} </h1>";
        displayPosts($data);
    } else {
        echo "<h1 class='primary'>Your research for {$_GET['q']} has produced no results.</h1>";
    }

?>