<?php
  require_once('kiva_display_blocks.php');

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
    <back-title> Kiva mobile </back-title>

    <title-bar>
      <logo resource='http://kivamobile.socialsync.org/images/km-logo16.png'/>
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
    <module>
      <module>
        <header layout="simple">
          <layout-items>
            <block class="title">Home</block>
          </layout-items>
        </header>

        <placard layout='simple' class='link'>
           <layout-items>
             <block class='title'>My Kiva</block>
           </layout-items>
           <load event='activate' resource='http://kivamobile.socialsync.org/my_kiva.php' />
         </placard>
         <placard layout='simple' class='link'>
           <layout-items>
             <block class='title'>Recent Loans</block>
           </layout-items>
           <load event='activate' resource='http://kivamobile.socialsync.org/loans_recent.php' />
         </placard>
         <placard layout='simple' class='link'>
           <layout-items>
             <block class='title'>Search Loans</block>
           </layout-items>
           <load event='activate' resource='http://kivamobile.socialsync.org/loans_search.php' />
         </placard>

      </module>
    </module>
  </content>
  
  <page-footer>
    <placard layout='simple'>
      <layout-items>
        <block>Copyleft 2009. No rights reserved</block>
      </layout-items>
    </placard>
  </page-footer>
</page>