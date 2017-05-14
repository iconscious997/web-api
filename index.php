<?php

require_once('config.php'); // include configuration file
require_once (LIBRARY_PATH . '/Constructor.php'); // include Constructor class
require_once (EXCEPTION_PATH . '/ApiException.php'); // include ApiException class
include(LIBRARY_PATH . '/Logger.php');

// Log
Logger::logServer();
Logger::logHeaders();

try
{
    // construct
    if (isset($_SERVER['PATH_INFO']))  $constructor = new Constructor($_SERVER['PATH_INFO']);
    else throw new ApiException("PATH_INFO",101);

}
catch (NotAuthorizedException $e)
{
    $e->output();
    header(VIEW_PATH . "/authentication.php");
    die();
}
catch (ApiException $e)
{
    $e->output();

    // If no controller is specified then show home page
    // Assume normal execution showing home page
    if ($e->getCode() == 101)
        include(VIEW_PATH . "/controller.php");
}// end try / catch