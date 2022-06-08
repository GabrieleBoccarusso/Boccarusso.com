<?php
	// NOTE: images are 1920 per 1280
	// NOTE: to change heroku repos: heroku git:remote -a repo-name
	// NOTE: to send everything in production: git push heroku main
	session_start();
	
	// BEGIN GLOBAL FUNCTIONS
	function displayProjects($data) {
		echo '<section class="tiles" id = "posts-box">';
		for($i = 0; $i < count($data); ++$i) {
			echo <<<TEXT
				<article>
					<span class="image">
						<img src=https://drive.google.com/uc?id={$data[$i][3]} alt = "cover">
					</span>
					<a href={$data[$i][4]}>
						<h2>{$data[$i][1]}</h2>
						<div class="content">
							<p> {$data[$i][2]} </p>
						</div>
					</a>
				</article>
			TEXT;
		};
		echo "</section>";
	}
	function displayPosts($data) { // used for the search function
        echo '<section class="tiles" id = "posts-box">';
        echo '<div id="spinner-box" class="not-visible"></div>';
        for ($i = 0; $i < count($data); $i++) {
            $data[$i][1]=getenv("WEBSITE_NAME").$data[$i][1].'/';
            echo <<<TEXT
                <article>
                    <span class="image">
                        <img src=https://drive.google.com/uc?id={$data[$i][4]} alt = "cover">
                    </span>
                    <a href={$data[$i][1]}>
                        <h2> {$data[$i][2]} </h2>
                        <div class="content">
                            <p> {$data[$i][3]} </p>
                        </div>
                    </a>
                </article>
            TEXT;
        };
        echo "</section>";
	}
	function createTagLink($tag) {
		return getenv("WEBSITE_NAME") . 'tags/'.$tag.'/';
	}
	function echoSingleTag($class, $link, $name) {
		echo '<li>';
		echo "<a class='button {$class}' href={$link}><span>{$name}</span></a>";
		echo '</li>';
	}
	function echoTags($tags) {
		echo '<ul class = "actions container-tag">';
		if (is_array($tags[0])) {
			for ($i = 0; $i < count($tags); ++$i) {
				$name = str_replace('-', ' ', $tags[$i][0]);
				echoSingleTag($tags[$i][0], createTagLink($tags[$i][0]), $name);
			};
		} else {
            for ($i = 0; $i < count($tags); ++$i) {
              $class = str_replace(' ', '-', $tags[$i]);
			  echoSingleTag($class, createTagLink($class), $tags[$i]);
            };
		};
		echo '</ul>';
	}
	function setSession($value, $errorValue=NULL) {
		if ($value!="Error") {
			$_SESSION["load"]=$value;
		} else {
			$_SESSION["load"]=$value;
			$_SESSION["error"]=$errorValue;
		};
	}
	// END GLOBAL FUNCTIONS

	$get_from_drive = 'https://drive.google.com/uc?id=' ;
	$servername = getenv("DB_SERVER_NAME");
	$username = getenv("DB_USER");
	$password_db = getenv("DB_PW");
	$database = getenv("DB_NAME");
	$conn = new mysqli($servername, $username, $password_db, $database);

	$uri_parts = explode('/', $_SERVER["REQUEST_URI"]);
	$slug = $uri_parts[1];

	switch ($slug) {
		case "":
			setSession("Aboutme");
			$_SESSION["title"]="Gabriele Boccarusso's official website - home";
			require_once 'parts/home.php';
			break;
		case "tag":
		case "tags":
			setSession("Tags");
			$_SESSION["title"]="Tag list";
			require_once 'parts/home.php';
			break;
		case 'success':
			setSession("Success");
			$_SESSION["title"]="Success!";
			require_once 'parts/home.php';
			break;
        case 'project':
		case 'projects':
			setSession("Projects");
			$_SESSION["title"]="Projects";
			require_once 'parts/home.php';
			break;
		default:
			if (substr($slug, 0, 3) == "?q=") {
				setSession("Query");
				$_SESSION["title"]="Looking for ".substr($slug, 3, strlen($slug)).'.';
				require_once 'parts/home.php';
			} else {
				$query = "SELECT * FROM post WHERE slug = '{$slug}'";
				$result = $conn->query($query);
				$post = $result->fetch_assoc();
				if (!$post) {
					setSession("Error", "404");
					$_SESSION["title"]="Resource not found.";
					require_once 'parts/home.php';
				} else {
					require_once 'parts/postview.php';
				};
			};
			break;			
	};
?> 
