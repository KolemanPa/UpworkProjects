<?php
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/about.php":
			$CURRENT_PAGE = "About"; 
			$PAGE_TITLE = "About Us";
			break;
		case "/contact.php":
			$CURRENT_PAGE = "Contact"; 
			$PAGE_TITLE = "Contact Us";
			break;
        case "/signup.php":
            $CURRENT_PAGE = "Signup";
            $PAGE_TITLE = "User Registration";
            break;
        case "/gallery.php":
            $CURRENT_PAGE = "Gallery";
            $PAGE_TITLE = "Photo Gallery";
            break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "BeastMowed Landscaping";
	}
?>
