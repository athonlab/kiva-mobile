<?php
  require_once('kiva_display_blocks.php');
  // index.php
  // by Ed Voas / Alex Linde
  //
  // Copyright 2009 Yahoo! Inc. All rights reserved.
  //
  // This code is part of the Yahoo! Mobile Widget SDK, governed by
  // the Yahoo! Mobile Widget Developer Terms of Use at:
  // http://info.yahoo.com/legal/us/yahoo/mobilewidgetdvlpr/mobilewidgetdvlpr-2070.html

  // Make sure we set the right content type
  #header( "Content-Type: application/x-blueprint+xml" );
  // Make sure not to cache. The Java client really cares.
  #header( "Cache-Control: no-cache" );
  // Turn on debug output - only stops on errors, not warnings.
  set_error_handler("blueprintErrorHandler");
  
  //////////////////
  // MY CODE
  //////////////////
  
  $lender_id = 'matt';
  $json_request_url = "http://api.kivaws.org/v1/lenders/$lender_id" . ".json";
  // echo "$request_url\n\n";
  $json_response = file_get_contents($json_request_url);

  include('json_error_handling.php');

  $json_decoded = json_decode($json_response, true);

  //print_r($json_decoded);

  foreach($json_decoded['lenders'] as $lender) {
    //print_r($lender);
    // http://www.kiva.org/img/200w200h/<id>.jpg 
    _show_lender_detail($lender);
  }
  ?>
  <h4>Loans</h4>
  <?
  $json_request_url = "http://api.kivaws.org/v1/lenders/$lender_id/loans.json";
  // echo "$request_url\n\n";
  $json_response = file_get_contents($json_request_url);

  include('json_error_handling.php');

  $json_decoded = json_decode($json_response, true);

  //print_r($json_decoded);

  foreach($json_decoded['loans'] as $loan) {
    // print_r($loan);
    // http://kiva.org/app.php?page=businesses&action=about&id=<id>
    // http://www.kiva.org/img/80w80h/<id>.jpg 
    _show_loan($loan);

  }
  
  /////////////////
  // MY CODE END //
  /////////////////
  
?>
  