<?php
      $sql = mysql_query("select meta_keyword from identitas");
      $data   = mysql_fetch_array($sql);

    echo "$data[meta_keyword]";
?>
