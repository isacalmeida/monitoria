<?php
###############################################################################
# 452 Productions Internet Group (http://www.452productions.com)
# 452 Download tracker
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
# This is the install script for 452 Download tracker from 452
# When you are done DELETE THIS SCRIPT!!!!
# THIS PROGRAM IS A SECURITY RISK AND SHOULD _NOT_
# BE LEFT ON YOUR SERVER!
# If everything works this script will do every thing for you except
# tell the other scripts where the config file is.
# Great improvemnts hove been made over our previous install scripts
# should be even more seemless than before.
# Lets go!@#
#################################################################################
if (!$submit){
?>
   		<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
   		<html>
  		<head>
				 <title>452 Productions 452 Download tracker Install</title>
		</head>
		<body>
		<h3>Welcome</h3>
		<p>This script will attempt to create a database and set up the fields for 452 Download tracker from 452. We hope you have read the read me, but since most people don't we will walk you through the process.</p>
		<p>Tell us about your data base</p>
		Data base name:<br>
		<form method="post" action="<?php echo $PHP_SELF; ?>">
		<input type="text" name="dbName" value="site"> <br><br>
		Data base password:<br>
		<input type="password" name="dbPass" value="YES"><br><br>
		Data base username:<br>
		<input type="text" name="dbUserName" value="root"> <br><br>
		Data base host:<br>
		<input type="text" name="host" value="localhost"> <br><br>
		Base url: No http:// no ending /'s<br>
		<input type="text" name="base" value="yoursite.com"> <br><br>
		Dir: This is the path off of your root www dir where the scripts are stored
		<input type="text" name="dir" value="/src/"> <br><br>
		Path: Absolute UNIX path to your web directory
		<input type="text" name="path" value="/home/www"> <br><br>
		So a little clarification: Lets say you have your scripts in a folder at http://www.yoursite.com/blah/ then your base url is yoursite.com, dir is /blah/ and the path would be somthing like /www or /home/www/ or /www/username/www<br><br>
		<input type="submit" name="submit" value= "Go!!">
		</form>
		<p> If you don't know what your username and pass are you need to contact your sysadmin. When you hit submit this script will see if the data base named whatever you put in exisits. If it does its all good. If not the script  will try and create that data base. If you get an error that means PHP can't create the database (no permisson, dosen't know how). In that case you will need to ask your sys admin how to create a database.</p>
		</body>
		</html>
<?php }elseif($submit){

		$fp = fopen ("config.inc.php", "w");
		fwrite ( $fp, "<?php\n
###############################################################################
# 452 Productions Internet Group (http://www.452productions.com)
# 452 Download tracker v1.0
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
###############################################################################\n");
						fwrite ( $fp, "# Config values\n\n");
						fwrite ( $fp, "\$dbName = \"". $dbName . "\";\n");
			   		fwrite ( $fp, "\$dbPass = \"". $dbPass . "\";\n");
		      	fwrite ( $fp, "\$dbUserName = \"". $dbUserName . "\";\n");
			  		fwrite ( $fp, "\$host = \"". $host . "\";\n");
						fwrite ( $fp, "\$base = \"". $base . "\";\n");
			  		fwrite ( $fp, "\$db = mysql_connect(\$host, \$dbUserName, \$dbPass) or die (\"Could not connect\");");
			   		fwrite ( $fp, "\nmysql_select_db(\$dbName,\$db);\n");
						fwrite ( $fp, "\$today = gmdate ( \"M d Y H:i:s\" ); #This affecs how your date is displayed www.php.net/date for more info\n");
						fwrite ( $fp, "\n#User vars\n\n");
						fwrite ( $fp, "\$dir = \"". $dir ."\";\n");
						fwrite ( $fp, "\$path = \"". $path ."\";\n");
						fwrite ( $fp, "?>");
						fclose ( $fp);
						
				
?> <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
	<html>
	<head>
	<title>452 Productions 452 Download tracker Install</title>
	</head>
	<body><?php
  $db = mysql_connect($host, $dbUserName, $dbPass) or die ("Could not connect");
	$db_exist = mysql_select_db($dbName,$db);
	$sql1 = "CREATE TABLE downloads (
   id tinyint(4) DEFAULT '0' NOT NULL auto_increment,
   filename varchar(255) NOT NULL,
   ext varchar(255) NOT NULL,
   downloads int(11) DEFAULT '0' NOT NULL,
   last varchar(255) NOT NULL,
   PRIMARY KEY (id),
   UNIQUE id (id)
);";
	if ($db_exist) {		
	   			  printf("Database exists\n<br>Attempting to create tables..."); 
						$db = mysql_connect($host, $dbUserName, $dbPass);
   					mysql_select_db($dbName,$db);
		 				$result = mysql_query($sql1);
		 				if ($result){
								 						 printf("\n<br><br>\nTable creation done! Your database has been sucessfully set up.");
														 ?><p>Good! It looks like everything worked out. Unless someone lied to me along the way you should now have a database with all the approprite tables. Your done! Remeber to send an e-mail to <a href="mailto:services@452productions.com?subject=Download tracker install">services@452productions.com</a> telling them where you are using this script</p>
<?php
}elseif (mysql_create_db ("$dbName")) { 
	   					print ("Database created successfully\n<br>Attempting to create tables...");
						 $db = mysql_connect($host, $dbUserName, $dbPass);
   						mysql_select_db($dbName,$db);
							$result = mysql_query($sql1);
		 				if ($result){
								 						 print "\n<br><br>\nTable creation done! Your database has been sucessfully set up. Lets continue.";
														 ?><p>Good! It looks like everything worked out. Unless someone lied to me along the way you should now have a database with all the approprite tables. Your done! Remeber to send an e-mail to <a href="mailto:services@452productions.com?subject=Download tracker install">services@452productions.com</a> telling them where you are using this script</p>
<?php
						}elseif (!$result) {
                                  						echo"Erp! I ran into an error! ", mysql_error();
														echo"</body>\n</html>\n";
                                  						exit;
						}
			
    } else {
        printf ("Error creating database: %s\n", mysql_error ());
		echo"</body>\n</html>\n";
    }
}
}
#fin
?>
