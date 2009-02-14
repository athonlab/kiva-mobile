<?php
  require_once('kiva_display_blocks.php');

 include('bpxml-header.php');
?>

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

<?php
 include('bpxml-footer.php');
?>