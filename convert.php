#!/usr/bin/php
<?php
/*
 * ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+																			+
+                                                    ,:rvu1PNEqSLr.    		+
+                             .:7Y1kqqZZOOBB@B@B@B@B@B@BBGqj7:.        		+
+                       :UM@B@B@B@B@B@@@B@@@B@@@@@B@GSYY7i,.           		+
+                    rBB@B@B@B@@@B@B@MMOMM@@@B@B@B@B@N,                		+
+                  PB@B@B@BMui.               .7q@B@@@B@1              		+
+                5@B@B@Bv                          ;MB@B@B@:           		+
+               B@@@BP               rY,              r@B@@@Bi         		+	
+             rB@B@B.          :uGBB@B@BM.              ,M@B@B@        		+
+          5B@B@B@B.       .:vJYi71@BX  @@                .@B@B@v      		+
+       L@@B@@@Bv                 OB@B u@q                  YB@B@8     		+
+     L@B@B@N:                   ,j@B@B@,                    .B@B@B    		+
+    Z@B@M:                       .                            @@B@B   		+
+   r@@@,                                                       @@B@u  		+
+   @B@                                                         rB@@@  		+
+   B@L         .,:ii77LLjj2UFFPPZM@@i                           @@@B1 		+
+   @B    7M@B@B@B@B@B@B@B@B@B@B@B@G.                            J@@@B 		+
+   B@  :@B@B@B@BON0qOB@B@B@B@B@BL                               rB@B@ 		+
+   @N :@B@L.          M@B@B@B@r                                 v@B@B 		+
+   @F @M             :@B@B@Bi                                   XB@B@ 		+
+   i5XL             O@B@B@:                                     B@B@B 		+
+    u:            OB@B@M,                                       @B@B@ 		+
+                0@B@BM.                                        .@@B@B 		+
+              LB@@@Z.                                          J@B@B@ 		+
+            .@B@B0                                             @B@B@B 		+
+           X@B@k                                               B@BB:@.		+
+         :B@B5                                                7@B@B Br		+
+        MB@u                                                  @B@v@ kk		+
+      r@Bu                                                    B@B.B  G		+
+     B@u                                                     v@@@ @  v		+
+   LBS                                                       @@ui 8   		+
+  52                                                        .B@ , 5   		+	
+ .                                                          0@L   i   		+
+                                                            @B    .   		+
+                                                           7B:        		+
+                                                           B@         		+
+                                                          ,@          		+
+                                                          @X          		+
+                                                         .B           		+
+                                                         Gi           		+
+                                                        .S            		+
+                                                        .            		+
+                                                       					+
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 * 
 */
//Das Script braucht HTML2wiki und PHP5-CLI Pakete und Linux....

// Müssen angepasst werden:
$dokuwikipath="/var/www/dokuwiki/bin/";
$fullpath="/var/www/dokuwiki/data/pages/";
$pathtopages="/var/www/dokuwiki/data/pages";
$url="http://wiki.eagle-vision.de";

//Ab hier muss nichts mehr Angepasst werden
$fp=opendir($pathtopages);
        while($datei=readdir($fp)) {
        if (is_dir($pathtopages."/".$datei) && $datei!="." && $datei!=".."){
                        $order= $datei;

$handle=opendir ("".$fullpath."".$order."/");

$createorder=mkdir("".$dokuwikipath."pages_wiki/".$order."");
while ($datei = readdir ($handle)) {

echo "Bearbeite: ".$datei."";
$tohtml=exec("php dokucli.php < ".$fullpath."".$order."/".$datei." > ".$dokuwikipath."pages_html/".$datei.".html");
echo "Ok ".$datei." zu HTML verarbeitet!";
$towiki=exec("html2wiki --dialect MediaWiki --encoding iso-8859-1 --base-uri ".$url." --wiki-uri ".$url." ".$dokuwikipath."pages_html/".$datei.".html > ".$dokuwikipath."pages_wiki/".$order."/".$datei."");
$delhtml=exec("rm ".$dokuwikipath."pages_html/".$datei.".html");
echo "Ok ".$datei." Fertiggestellt!";
}

closedir($handle);
}
}
?>