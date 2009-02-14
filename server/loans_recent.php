<?php
require_once('kiva_display_blocks.php');
include('bpxml-header.php');

// Query params
$query_params = '';

if (isset($_GET['page'])) {
  $page = $_GET['page'];
  $query_params .= "page=$page&";
}

$json_request_url = "http://api.kivaws.org/v1/loans/newest.json?$query_params" . "page_size=1";
// echo "$request_url\n\n";
$json_response = file_get_contents($json_request_url);

  include('json_error_handling.php');

$json_decoded = json_decode($json_response, true);

//print_r($json_decoded);
?>

<module>
  <header layout="simple">
    <layout-items>
      <block class="title">Recent Loans</block>
    </layout-items>
  </header>

<?php
foreach($json_decoded['loans'] as $loan) {
  //print_r($loan);
  // echo "/loan_detail?show=$load_id";
  // http://kiva.org/app.php?page=businesses&action=about&id=<id>
  // http://www.kiva.org/img/80w80h/<id>.jpg
  _show_loan($loan);
}
?>

</module>

<?php
 include('bpxml-footer.php');
?>