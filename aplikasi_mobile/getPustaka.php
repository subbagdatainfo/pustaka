<?php
	include("koneksi.php");
	
	$q = mysql_query("select * from pustaka");
		
	$v = '[';
	while($r=mysql_fetch_array($q)) {
		$ob = array("<br>","<b>","</b>");
		if(strlen($v)<12) {
			$v .= '{"id" 	      : "'.$r['id'].'",
		                "nama_buku"   : "'.$r['nama_buku'].'",
		                "foto_sampul" : "'.$r['foto_sampul'].'",
		                "nama_file"   : "'.$r['nama_file'].'",
		                "url_preview" : "'.$r['url_preview'].'"}';
		} else {
			$v .= ',{"id" 	       : "'.$r['id'].'",
		                 "nama_buku"   : "'.$r['nama_buku'].'",
		                 "foto_sampul" : "'.$r['foto_sampul'].'",
		                 "nama_file"   : "'.$r['nama_file'].'",
		                 "url_preview" : "'.$r['url_preview'].'"}';
		}
	}
	$v .= ']';
	echo $v;
?>