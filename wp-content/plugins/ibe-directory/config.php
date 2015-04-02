<?php
	
/*-----------------------------------------------
	
Application name and email (used in notify function et al)

-------------------------------------------------*/

define('APPLICATION', 'Allivion');
define('APPLICATION_EMAIL', 'noreply@allivion.com');
define('NOTIFY_EMAIL', 'notifications@allivion.com');


/*-----------------------------------------------
	
define urls for pages using specific templates

-------------------------------------------------*/
	
define('DIRECTORY_LOGINPATH', '/');
define('DIRECTORY_RECADMIN', '/recruiter-dashboard');
define('DIRECTORY_ADVADMIN', '/advertiser-dashboard');
define('DIRECTORY_CANDADMIN', '/candidate-dashboard');
define('DIRECTORY_CREATEUSERPATH', '/user/create');
define('DIRECTORY_UPDATEUSERPATH', '/user/update');
define('POSTTITLEFIELD', 'job_title');

/*-----------------------------------------------
	
Encryption keys

-------------------------------------------------*/

define('IV_SIZE', mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));
define('CRYPTKEY','NFOLOOHWZ0DOAL1VH4K6W7C');




/*-------------------------
	
URLs
----

Recruiter admin urls

/recruiter/dashboard
/recruiter/users
/recruiter/users/create
/recruiter/users/update

Recruiter urls

/recruiter/dashboard
/recruiter/profile
/recruiter/<itemtype>

/candidate/dashboard
/candidate/profile
/candidate/<itemtype>

/advertiser/dashboard