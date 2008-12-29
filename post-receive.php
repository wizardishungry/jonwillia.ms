<?php /*
example post receive hook for github
url: http://example.com/post-receive.php?secret=amazingpasswordgoeshere
setup sudo using visudo -- these are my defaults on openbsd, YMMV

 Cmnd_Alias    GIT = /usr/local/bin/git
 Defaults:www !authenticate
 www    ALL=(usernamehere) NOPASSWD: GIT

*/

$my_secret='githubrocks';
$my_path='/var/www/htdocs/wizardishungry.com/';
$my_user='jon';
$my_git='/usr/local/bin/git';

function hide($e)
{
    trigger_error($e);
    header("Status: 404 Not Found");
    exit();
}
    if(!isset($_POST['payload'])) { hide('payloaf'); }
    //    if(@$_GET['secret']!=$my_secret) { hide('sec'); }
    //$payload=json_decode($_POST['payload']);
    echo shell_exec("cd $my_path && sudo -u  $my_user $my_git pull");
?>
