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
       <q/>
      </data>
     </instance>
     <submission resource='loans_search_results.php' method='get'/>
     <setfocus control='country_code' event='page-ready' />
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

     <input ref='status' appearance='compact' model='page'>
       <label>Status</label>
       <placeholder>fundraising, funded, in_repayment, paid, defaulted</placeholder>
     </input>

     <select ref='gender' model='page'>
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

    <input ref='country_code' appearance='compact' model='page'>
      <label>Country code</label>
      <placeholder>PE,IN,GH,GT</placeholder>
    </input>

    <input ref='sector' appearance='compact' model='page'>
      <label>Sector</label>
      <placeholder></placeholder>
    </input>
    
    <input ref='q' appearance='compact' model='page'>
      <label>Query</label>
      <placeholder></placeholder>
    </input>

     <submit model='page'>
      <label>Search</label>
     </submit>
     
    </module>
<?php
 include('bpxml-footer.php');
?>
  