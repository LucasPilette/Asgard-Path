<?php 

define('REG_EXP_NAME', '^[a-zA-ZÀ-ÿ\. \-\']*$' );
define('REG_EXP_LOGIN','^[a-zA-ZÀ-ÿ0-9\. \-\']*$');
define('REG_EXP_PASSWORD','^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$');
