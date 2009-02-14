<?php

function _show_image($image, $size = '80w80h') {
  $image_id = $image['id'];
  echo "http://www.kiva.org/img/$size/$image_id.jpg";
}

function _show_loan($loan) {
?>
<layout-items>
  <image resource="<?php _show_image($loan['image']) ?>" size="small"/>
  <block class="name"><?php echo htmlentities( $loan['name'] ) ?></block>
  <block class="location"><?php echo htmlentities( $loan['location']['country'] ) ?>, <?php echo htmlentities( $loan['location']['town'] ) ?></block>
  <block class="activity"><?php echo htmlentities( $loan['activity'] ) ?></block>
  <block class="loan_amount"><?php echo htmlentities( $loan['loan_amount'] ) ?></block>
</layout-items>
<?
}

function _show_loan_detail($loan) {
?>
<layout-items>
  <image resource="<?php _show_image($loan[image]) ?>" size="large"/>
  <block class="name"><?php echo htmlentities( $loan['name'] ) ?></block>
  <block class="status"><?php echo htmlentities( $loan['status'] ) ?></block>
  <block class="loan_amount"><?php echo htmlentities( $loan['loan_amount'] ) ?></block>
  <block class="funded_amount"><?php echo htmlentities( $loan['funded_amount'] ) ?></block>
  <block class="activity"><?php echo htmlentities( $loan['activity'] ) ?></block>
  <block class="use"><?php echo htmlentities( $loan['use'] ) ?></block>
  <block class="location"><?php echo htmlentities( $loan['location']['country'] ) ?>, <?php echo htmlentities( $loan['location']['town'] ) ?></block>
</layout-items>
<?  
}

function _show_lender($lender) {
?>
<layout-items>
  <image resource="<?php _show_image($lender['image']) ?>" size="small"/>
  <block class="name"><?php echo htmlentities( $lender['name'] ) ?></block>
  <block class="location"><?php echo htmlentities( $lender['whereabout'] ) ?>, <?php echo htmlentities( $lender['country_code'] ) ?></block>
  <block class="loan_count"><?php echo htmlentities( $lender['loan_count'] ) ?></block>
</layout-items>
<?  
}

function _show_lender_detail($lender) {
?>
<layout-items>
  <image resource="<?php _show_image($lender['image']) ?>" size="large"/>
  <block class="name"><?php echo htmlentities( $lender['name'] ) ?></block>
  <block class="location"><?php echo htmlentities( $lender['whereabout'] ) ?>, <?php echo htmlentities( $lender['country_code'] ) ?></block>
  <block class="personal_url"><?php echo htmlentities( $lender['personal_url'] ) ?></block>
  <block class="occupation"><?php echo htmlentities( $lender['occupation'] ) ?></block>
  <block class="occupation_info"><?php echo htmlentities( $lender['occupation_info'] ) ?></block>
  <block class="loan_because"><?php echo htmlentities( $lender['loan_because'] ) ?></block>
  <block class="loan_count"><?php echo htmlentities( $lender['loan_count'] ) ?></block>
  <block class="invite_count"><?php echo htmlentities( $lender['invite_count'] ) ?></block>
</layout-items>
<?    
}

function _show_journal_entry($journal_entry) {
?>
  <layout-items>
    <block class="subject"><?php echo htmlentities( $journal_entry['subject'] ) ?></block>
    <block class="body"><?php echo htmlentities( $journal_entry['body'] ) ?>, <?php echo htmlentities( $journal_entry['country_code'] ) ?></block>
    <block class="date"><?php echo htmlentities( $journal_entry['date'] ) ?></block>
  </layout-items>
<?
}

function blueprintErrorHandler( $errno, $errstr, $errfile, $errline )
{
  if ( $errno == E_USER_ERROR )
  {
    // Make sure we set the right content type
    header( "Content-Type: application/x-blueprint+xml" );
    
    // Make sure not to cache. The Java client really cares.
    header( "Cache-Control: no-cache" );
?>
<page>
  <content>
    <module>
      <header layout="simple">
        <layout-items>
          <block class="title"><?php echo "Error - ".htmlentities( $errno ) ?></block>
        </layout-items>
      </header>
      <block><?php echo htmlentities( $errstr ) ?></block>
      <block><?php echo "File: ".htmlentities( $errfile ) ?></block>
      <block><?php echo "Line: ".htmlentities( $errline ) ?></block>
    </module>
  </content>
</page>
<?php
    exit();
  }
}
set_error_handler("blueprintErrorHandler");

?>