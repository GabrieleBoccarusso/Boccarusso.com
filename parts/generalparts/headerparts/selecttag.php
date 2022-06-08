<select name="select-tag" id="select-tag">
    <option value="">Visit a tag</option>
    <?php
        $query = "SELECT * FROM tag WHERE 1";
        $result = $conn->query($query);
        $tags = $result->fetch_all();
        $polished = "";
        foreach($tags as $tag) {
            $polished = preg_replace('/-/',' ',$tag[1]);
            echo "<option value='{$tag[1]}'>{$polished}</option>";
        };
    ?>
</select>