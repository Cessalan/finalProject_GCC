<?php
/**
 * Created by PhpStorm.
 * User: fatsy
 * Date: 2020-01-20
 * Time: 3:22 PM
 */

include('../DB/DBManager.php');
if(!emtpy($_GET['email'])){
    insertSubscriber($_GET['email']);
}
