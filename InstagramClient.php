<?php
require('InstagramWrapper.php');
// initialize redirect call on html view more details on read me
$instagramWr = new InstagramWrapper(array(
    'cid'      => 'b0940040034c49319c0e543fb94034da',
    'secret'   => 'a96bc4b032544df88506f81b52597b1c',
    'redirect' => 'http://dev.tapetickets.com/public/'
));

//echo $redirectTransfer = $instagramWr->userRedirect();
//echo "<a href='$redirectTransfer'>Login with Instagram</a>";

$authcode = "9855f77856d044c5aff558549755ef46";
$userdata = $instagramWr->userAuthToken($authcode);
var_dump($userdata);
