<?php
###############################################################################
# 452 Productions Internet Group (http://www.452productions.com)
# 452 Download tracker  v1.0 
#    This script is freeware and is realeased under the GPL
#    Copyright (C) 2000  452 Productions
#
#    This program is free software; you can redistribute it and/or modify
#    it under the terms of the GNU General Public License as published by
#    the Free Software Foundation; either version 2 of the License, or
#    (at your option) any later version.
#
#    This program is distributed in the hope that it will be useful,
#    but WITHOUT ANY WARRANTY; without even the implied warranty of
#    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#    GNU General Public License for more details.
#
#    You should have received a copy of the GNU General Public License
#    along with this program; if not, write to the Free Software
#    Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.
#    Or just download it http://www.fsf.org/
###############################################################################
require("config.inc.php");
$download_file = $path . $dir. $file;
$download_loc = $dir . $file;
if ($file) {
	 if (!file_exists($download_file) ){
	 		echo"<p>Oops! That file dosen't seem to exist</p>";
	 } else {
	 	  $db_file = explode(".", $file);
	 	 	$sql = "SELECT * FROM downloads WHERE filename='$db_file[0]'";
			$result = mysql_query($sql, $db);
			$myrow = mysql_fetch_array($result);
			if ($myrow["filename"] == $db_file[0] && $myrow["ext"] == $db_file[1]) {
		 		 $old_val = $myrow["downloads"];
				 $new_val = $old_val + 1;
		  	 $sql = "UPDATE downloads SET downloads='$new_val', last='$today' WHERE filename='$db_file[0]'";
				 $result = mysql_query($sql, $db) or die(mysql_error());
	 			 Header("Location: $download_loc");
			}else{
				 $sql1 = "INSERT INTO downloads (filename, ext, downloads, last) VALUES ('$db_file[0]', '$db_file[1]', '1', '$today')";
				 $result1= mysql_query($sql1, $db) or die(mysql_error());
				 Header("Location: $download_loc");
			}
		}
}else{
	echo"<html>\n";
	echo"<head>\n";
	echo"<title>File download</title>\n";
	echo"</header>\n";
	echo"<body>\n";
	echo"<h3>File download</h3>\n";
	echo"<p>To download a file click on its name below</p>\n";
	echo"<table cellspacing=\"2\" cellpadding=\"2\" border=\"0\">\n";
	$sql2 = "SELECT * FROM downloads ORDER BY downloads DESC";
	$result = mysql_query($sql2, $db);
	while($myrow = mysql_fetch_array($result)) {
							 $file = $myrow["filename"] . "." . $myrow["ext"];
							 $last = $myrow["last"];
							 $downloads = $myrow["downloads"];
							 echo"<tr>\n";
							 echo"<td><a href=\"$PHP_SELF?file=$file\">$file</a></td>\n";
							 echo"<td>Downloads: $downloads";
							 echo"<td>Last download on $last</td>\n";
							 echo"</tr>";
	}
	echo"</table>\n";
	echo"<!-- 452 download tracker http://www.452productions.com -->";
	echo"</body>\n";
	echo"</html>\n";
}
?>