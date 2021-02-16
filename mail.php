<?php
//the subject
$sub = "Test";
//the message
$msg = "Test message";
//recipient email here
$rec = "chriswongez@gmail.com";
//send email
mail($rec, $sub, $msg);