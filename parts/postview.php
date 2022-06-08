<!DOCTYPE html>
<html>
	<head>
	    <?php 
            $content = addslashes($post["intro"]);
            $keywords = preg_replace('/-/',', ',$post["tags"]);
            echo "<title>".$post["title"]."</title>"; 
            echo "<meta name='description' content=\"{$content}\">";
            echo "<meta name='keywords' content=\"{$keywords}\">";
            echo "<meta property='og:title' content='" . $post["title"] ."'>";
            echo "<meta property='og:type' content='article'>";
            echo "<meta property='og:url' content='https://www.boccarusso.com" . $_SERVER["REQUEST_URI"] . "' >";
            echo "<meta property='og:image' content='" . $get_from_drive . $post['image'] . "'>";
        ?>
        <link rel="canonical" href="<?php echo getenv("WEBSITE_NAME").$post["slug"].'/' ?>">
        <meta name="author" content="Gabriele Boccarusso">
        <?php require_once 'parts/generalparts/style.php'; ?>
	</head>

	<body class="is-preload">
		<div id="wrapper">
			<header id="header">
				<?php require_once 'parts/generalparts/header.php'; ?>
			</header>

			<main id="main" style="width: 70%; margin: 0 auto">
        <div class="inner">
          <h1 style="text-align:center"> <?php echo $post["title"]?></h1>
          <hr>
          <p style="text-align:center"> 
            <?php
              echo <<<TEXT
              author: <span class="h">Boccarusso</span>
              <br>
              created: <span class="h">{$post["creation"]}</span>
              <br>
              Last update: <span class="h">{$post["lastUpdate"]}</span>
              TEXT;
            ?>
          </p>
          
          <hr>

          <?php
            $tags = explode('-', $post["tags"]);
            echoTags($tags);
          ?>
          
          <hr>

          <span class="image main" id = "main-img">
          <img src="<?php echo $get_from_drive . $post['image']?>" alt="article cover">
          </span>

          <article> 
            <?php
              echo file_get_contents($get_from_drive . $post['content']);
            ?>
            <!--
              <span class="image left">
                <a href="google.com">
                  <img src="https://drive.google.com/uc?id=<?php // echo $post['image']?>" alt="">
                </a>
              </span>
              <span class="image right">
                <img src="https://drive.google.com/uc?id=<?php // echo $post['image']?>" alt="">
              </span> 
            -->
          </article>
        </div>
       
      
			</main>

		    <?php require_once 'parts/generalparts/footer.php' ?>
		</div>

  		<?php require_once 'parts/generalparts/scripts.php' ?>
      <script src="/assets/js/resize_img.js"></script>
	</body>
</html>