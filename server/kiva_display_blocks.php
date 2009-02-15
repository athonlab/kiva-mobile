<?php

function _show_image($image, $size = '80w80h') {
  $image_id = $image['id'];
  echo "http://www.kiva.org/img/$size/$image_id.jpg";
}

function _show_loan($loan) {
?>
<placard layout="card" class="link">
  <layout-items>
    <image resource="<?php _show_image($loan['image']) ?>" size="medium"/>
    <block class="title"><?php echo $loan['name'] ?></block>
    <block class="subtext"><?php echo $loan['location']['country'] ?>, <?php echo $loan['location']['town']  ?></block>
    <block class="subdued" lines="1">$<?php echo $loan['loan_amount'] ?> needed; <?php echo$loan['use'] ?></block>
  </layout-items>
  <load-page event="activate" page="/loan_detail.php?show=<?php echo $loan['id'] ?>" />
</placard>
<?
}

function _show_loan_detail($loan) {
?>
<placard layout="card">
  <layout-items>
    <image resource="<?php _show_image($loan[image]) ?>" size="xx-large"/>
    <block class="title"><?php echo $loan['name'] ?></block>
    <block class="subtext"><?php echo $loan['location']['country'] ?>, <?php echo $loan['location']['town'] ?></block>
    <block class="subdued" lines="1">$<?php echo $loan['loan_amount'] ?> needed; <?php echo $loan['use'] ?></block>
    <block class="status"><?php echo $loan['status'] ?></block>
    <block class="loan_amount"><?php echo $loan['loan_amount'] ?></block>
    <block class="funded_amount"><?php echo $loan['funded_amount'] ?></block>
    <block class="activity"><?php echo $loan['activity'] ?></block>
  </layout-items>
</placard>
<?  
}

function _show_lender($lender) {
?>
<placard layout="card" class="link">
  <layout-items>
    <image resource="<?php _show_image($lender['image']) ?>" size="medium"/>
    <block class="title"><?php echo $lender['name'] ?></block>
    <block class="subtext"><?php echo $lender['whereabouts'] ?>, <?php echo $lender['country_code'] ?></block>
  </layout-items>
  <load-page event="activate" page="/lender_detail.php?show=<?php echo $lender['uid'] ?>" />
</placard>
<?  
}

function _show_lender_detail($lender) {
?>
<placard layout="card">
  <layout-items>
    <image resource="<?php _show_image($lender['image']) ?>" size="xx-large"/>
    <block class="title"><?php echo $lender['name'] ?></block>
    <block class="subdued"><?php echo $lender['whereabouts'] ?>, <?php echo $lender['country_code'] ?></block>
    <block class="link"><?php echo $lender['personal_url'] ?></block>
    <block class="description"><?php echo $lender['occupation'] ?>: <em><?php echo $lender['occupation_info'] ?></em></block>
    <block class="description"><?php echo $lender['loan_because'] ?></block>
  </layout-items>
</placard>
<?
}

function _show_journal_entry($journal_entry) {
?>
<placard layout="card">
  <layout-items>
    <block class="title"><?php echo $journal_entry['subject'] ?></block>
    <block class="subtext"><?php echo $journal_entry['body'] ?></block>
  </layout-items>
</placard>
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