<?php
    $sql = "SELECT post FROM appliedTag WHERE tag = (SELECT id FROM tag WHERE name LIKE '{$uri_parts[2]}')";
    $result = $conn->query($sql);
    $data = $result->fetch_all();
    if(empty($data)) {
        if (!$uri_parts[2]) {
            echo "<h1>All tags:</h1>";
        } else {
            echo "<h1>There is no such tag</h1>";
            echo "<h2>In doubt, here all of them.</h2>";
        };
        $sql = "SELECT name FROM tag WHERE 1";
        $result = $conn->query($sql);
        $tags = $result->fetch_all();
        echoTags($tags);
    } else {
        $searchedTag = preg_replace('/-/',' ', $uri_parts[2]);
        echo "<h1>TAG: {$searchedTag}</h1>";
        $data = array_map(fn ($item) => $data[0] = $item[0], $data);
        $data = implode(', ', $data);
        $sql = "SELECT * FROM post WHERE id IN ({$data})";
        $result = $conn->query($sql);
        $data = $result->fetch_all();

        displayPosts($data);
    };
?>