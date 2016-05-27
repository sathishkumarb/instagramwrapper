# instagramwrapper



// Step1: Initialize redirect call with API settings params
$instagramWr = new InstagramWrapper(array(
    'cid'      => 'b0940040034c49319c0e543fb94034da',
    'secret'   => 'a96bc4b032544df88506f81b52597b1c',
    'redirect' => 'http://dev.tapetickets.com/public/'
));



// create redirect URL
$redirectTransfer = $instagramWr->userRedirect();

