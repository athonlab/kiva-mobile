<?php
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
  <models>
    <model id='page'>
     <instance>
      <data xmlns=''>
       <status/>
       <gender/>
       <sector/>
       <country_code/>
       <q/>
      </data>
     </instance>
     <submission resource='/loans_search_results.php' method='get'/>
     <setfocus control='q' event='page-ready' />
    </model>
  </models>
  
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
  
  <module>
    <header layout="simple">
      <layout-items>
        <block class="title">Search</block>
      </layout-items>
    </header>

     <input ref='status' appearance='compact'>
       <label>Status</label>
       <placeholder></placeholder>
     </input>

     <select ref='gender'>
      <label>Gender</label>
      <item>
        <label>Male</label>
        <value>male</value>
      </item>
      <item>
        <label>Female</label>
        <value>female</value>
      </item>
    </select>

    <input ref='country_code' appearance='compact'>
      <label>Country code</label>
      <placeholder></placeholder>
    </input>

    <input ref='sector' appearance='compact'>
      <label>Sector</label>
      <placeholder>Yahoo</placeholder>
    </input>

     <submit>
      <label>Search</label>
     </submit>
     
    </module>
<?php
 include('bpxml-footer.php');
?>
  