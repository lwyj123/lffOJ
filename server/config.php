<?php

define('ROOT', $_SERVER['DOCUMENT_ROOT']);

//状态码
define('SUCCESS', 0);
define('HTTP_ERROR', -1);
define('EMAIL_DUPLICATE', 1);
define('EMAIL_ERROR', 2);
define('PHONE_NUM_DUPLICATE', 3);
define('PHONE_NUM_ERROR', 4);
define('USERNAME_DUPLICATE', 5);
define('NO_SUCH_USER', 6);
define('NO_SUCH_TASK', 7);
define('TASK_HAS_BEEN_GOT', 8);
define('WAITFOR_PAY', 9);
define('UNKNOWN_ERROR', 99);

//action flag
define('ACTION_FLAG', "actionFlag");
define('ACTION_GET_COMP_USERSELFINFO', 1);
define('ACTION_GET_COMP_USERINFO', 2);
define('ACTION_GET_COMP_TASKINFO', 3);
define('ACTION_GET_BRIEF_TASKLIST', 4);
define('ACTION_ADD_USER', 5);
define('ACTION_LOGIN', 6);
define('ACTION_UPDATE_USERINFO', 7);
define('ACTION_PUBLISH_TASK', 8);
define('ACTION_UPDATE_TASK', 9);
define('ACTION_GET_THETASK', 10);
define('ACTION_COMMIT_TASK', 11);
define('ACTION_COMMENT_TASK', 12);

//JSON TAG
define('TAG_JSON_USERINFO', "userInfo");
define('TAG_JSON_TASKINFO', "taskInfo");
define('TAG_JSON_USERID', "userId");
define('TAG_JSON_TASKID', "taskId");
define('TAG_JSON_LISTTYPE', "listType");
define('TAG_JSON_COMMENT', "comment");

//task list type code
define('LISTTYPE_RECOMMEND', 1);
define('LISTTYPE_ALL', 2);
define('LISTTYPE_HIGHREWORD', 3);



