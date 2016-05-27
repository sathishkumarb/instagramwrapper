<?php

require 'InstagramWrapper.php';
$authcode = '63746d159de84b53bf50e872acd05691';
$userdata = $instagramWr->userAuthToken($authcode);
print_r($userdata);
