<?php
// Call the loader in the vendor directory
require join(DIRECTORY_SEPARATOR, array( __DIR__ , 'vendor', 'loader.php'));

// Start the application
Root\System\Application::oss_start();
?>