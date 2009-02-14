<?
// bpxml header
// Make sure we set the right content type
header( "Content-Type: application/x-ywidget+xml" );
// Make sure not to cache. The Java client really cares.
header( "Cache-Control: no-cache" );

$headers = apache_request_headers();
foreach ($headers as $header => $value) {
    error_log("$header: $value");
}
?>
<page style="collection">
  <page-header>
    <back-title>Kiva Mobile </back-title>

    <title-bar>
      <title>Kiva Mobile</title>
       <commands>
         <ui-command>
            <icon>http://kivamobile.socialsync.org/images/nav_home_4v4.gif</icon>
            <load-page event='activate' page='http://kivamobile.socialsync.org'/>
         </ui-command>
      </commands>
    </title-bar>
  </page-header>
  <content>
