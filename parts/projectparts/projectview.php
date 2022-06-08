<?php
    $sql = "SELECT * FROM projects ORDER BY id DESC";
    $result = $conn->query($sql);
    $data = $result->fetch_all();
    echo '<h1>All projects: </h1>';
    displayProjects($data);
?>