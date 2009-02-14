<?php

list($version,$status_code,$msg) = explode(' ',$http_response_header[0], 3);
switch($status_code) {
  case 200:
    // Success
    break;
  case 503:
    die('Kiva web service is unavailable at this moment. Please try again later. [503]');
    break;
  case 403:
    die('Kiva web service is unavailable at this moment. Please try again later. [403]');
    break;
  case 400:
    // You may want to fall through here and read the specific XML error
    die('Kiva web service is unavailable at this moment. Please try again later. [400]');
    break;
  default:
    die('Kiva web service is unavailable at this moment. Please try again later. [' . $status_code . ']');
}

?>