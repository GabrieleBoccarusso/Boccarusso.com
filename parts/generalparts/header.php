<div class="inner">
    <nav> <!-- outer button of nav -->
        <ul>
            <li><a href="#menu">Menu</a></li>
        </ul>
    </nav>
    <div id="menu">
        <h2>Hub</h2>
        <ul>
            <li><?php require_once 'headerparts/searchpost.php'; ?></li>
            <li><a href="<?php echo getenv("WEBSITE_NAME")?>">Home</a></li>
            <li><a href="<?php echo getenv("WEBSITE_NAME").'projects/'?>">Projects</a></li>
            <li><a href="<?php echo getenv("WEBSITE_NAME").'tags/'?>">Tags</a></li>
            <!-- <li><a href="<?php //echo getenv("WEBSITE_NAME").'/'?>">Copyright & Policies</a></li> -->
            <li><?php require_once 'headerparts/selecttag.php'; ?></li>
        </ul>
    </div>
</div>