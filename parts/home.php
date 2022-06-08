<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title><?php echo $_SESSION["title"];?></title>
        <link rel="canonical" href="http://www.boccarusso.com/">
        <meta name='description' content="Official website of Gabriele Boccarusso, European developer writing about informatics and various topics">
        <?php require_once 'parts/generalparts/style.php';?>

        <style>html{scroll-behavior: smooth;}</style>
	</head>

	<body class="is-preload">
        <div id="wrapper">
            <header id="header">
				<?php require_once 'generalparts/header.php';?>
			</header>
            <main id="main">
                <div class="inner">
                    <?php 
                        switch ($_SESSION["load"]) {
                            case "Aboutme":
                                echo '<header>';
                                require_once 'homeparts/aboutme.php';
                                echo '</header>';
                                require_once 'homeparts/latestposts.php';
                                break;
                            case "Tags":
                                require_once 'tagparts/tagview.php';
                                break;
                            case "Query":
                                require_once 'researchparts/researchview.php';
                                break;
                            case "Projects":
                                require_once 'projectparts/projectview.php';
                                break;
                            case "Success":
                                echo '<h1>Success!</h1><br>';
                                echo '<h2>The email has been sent with success!</h2>';
                                break;
                            case "Error":
                                switch ($_SESSION["error"]) {
                                    case "404":
                                        echo '<h1>Error 404!</h1><br>';
                                        echo '<h2>It seems that the resource that you are looking for doesn\'t exists, better luck next time.</h2>';
                                        break;
                                    default:
                                        echo '<h1>Generic error!</h1><br>';
                                        echo '<h2>An error so rare that even the system doesn\'t know what really happened!</h2>';
                                }
                                break;
                        };
                    ?>
                </div>
            </main>

            <?php require_once 'parts/generalparts/footer.php'; ?>
        </div>
        
        <?php 
            require_once 'parts/generalparts/scripts.php';
            if ($_SESSION["load"] == "Aboutme") {
                echo '<script src="assets/js/posts.js"></script>';
            }
        ?>
	</body>
</html>