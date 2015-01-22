<?php
session_start();//FacebookCurl,FacebookCurlHttpClient,FacebookHttpable
require_once('Facebook/FacebookCurl.php');
require_once('Facebook/FacebookCurlHttpClient.php');
require_once('Facebook/FacebookHttpable.php');


require_once('Facebook/FacebookSession.php');
require_once('Facebook/FacebookCanvasLoginHelper.php');
require_once('Facebook/FacebookRedirectLoginHelper.php');
require_once('Facebook/FacebookRequest.php');
require_once('Facebook/FacebookResponse.php');
require_once('Facebook/FacebookSDKException.php');
require_once('Facebook/FacebookRequestException.php');
require_once('Facebook/FacebookOtherException.php');
require_once('Facebook/FacebookAuthorizationException.php');
require_once('Facebook/GraphObject.php');
require_once('Facebook/GraphUser.php');
require_once('Facebook/GraphSessionInfo.php');


use Facebook/FacebookHttpable;
use Facebook/FacebookCurl;
use Facebook/FacebookCurlHttpClient;

use Facebook/FacebookSession;
use Facebook/FacebookSession;
use Facebook/FacebookCanvasLoginHelper;
use Facebook/FacebookRedirectLoginHelper;
use Facebook/FacebookRequest;
use Facebook/FacebookResponse;
use Facebook/FacebookSDKException;
use Facebook/FacebookRequestException;
use  Facebook/FacebookOtherException;
use Facebook/FacebookAuthorizationException;
use Facebook/GraphObject;
use Facebook/GraphUser;
use Facebook/GraphSessionInfo;

FacebookSession::setDefaultApplication('338697076318924','253b6453206c787223981e2bed06b9d0');

$helper=new FacebookCanvasLoginHelper();

try {
	$session=$helper->getSession();
} catch (FacebookRequestException $e) {
	echo $e->getMessage();

}catch(Exception $ex){
echo $ex->getMessage();;
}



if($session){

	try {
		$request=new FacebookRequest($session,'Get','/me');
		$response=$request->execute;
		$me=$response->getGraphObject();
		echo $me->getProperty('name');
		//echo "ameer salah";

	} catch (FacebookRequestException $e) {
		echo $e->getMessage();
	}

}else {
$helper=new FacebookRedirectLoginHelper('https://apps.facebook.com/ameermind/');
$auth_url=$helper->getLoginUrl();
echo "<script>window.top.location.href='".$auth_url."'</script>";

}
	



?>
