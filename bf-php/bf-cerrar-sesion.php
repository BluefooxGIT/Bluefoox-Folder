<?php
session_start();
clearstatcache();
session_destroy();
header( "Location: ../" );
?>