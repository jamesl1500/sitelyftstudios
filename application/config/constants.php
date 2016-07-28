<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Global Vars
define('APP_URL', 'http://localhost/newrouket/');
define('SITE_NAME', 'Frindse');
define('SITE_DESCRIPTION','Frindse is a simple social network that lets you meet new people and have fun with all your friends');
define('SITE_VERSION','0.0.1');
define('SITE_TAGS','');
define('SITE_ROOT',realpath(dirname(dirname(__FILE__))));
define('SITE_VER','1.1');

/* Encryption HASH */
define('FRINDSE_HASH_KEY',md5('ilikecodingZHwJwq5ycfhwrPtLnQK8'));


// Sessions and cookies
define('COOKIE_EXPIRY', time() + 2 * 7 * 24 * 3600);
define('COOKIE_NAME', 'remember_cache');

/* Coat data main dir */
define('CHAT_DATA_PATH', 'ch_dta_87412230921295366287');

/* Conversation data */
define('CONVO_DIR_DATA_PATH_ONE', 'c_d_p_oneo8b0Ke3eVbsIf1o3HxfF');
define('CONVO_DIR_DATA_PATH_TWO', 'c_d_p_two_ryiHO6YB4OWCWhL5yCeE');

define('CONVO_DIR_DATA_PATH_FOR_PHOTOS','Cp_D-2c8DmAWwLv-');
define('CONVO_DIR_DATA_PATH_FOR_FILES','Cf_D-fPuwr0xK13-');

// Database tables
define('REMEMBER_ME','remember_me');
define('API_KEYS','api_keys');
define('USERS_TABLE','users');
define('FORGOT_PASSWORD','forgot_pasword');
define('FRIEND_REQUESTS','friend_requests');
define('RELATIONSHIPS','relationships');
define('MESSAGES','mesages');
define('PERSONLIKING','personLiking');
define('NOTES','notes');
define('USER_INFO','user_info');
define('PRIVACY','privacy');
define('TAPS','tap');
define('BLOCKS','blocks');
define('HASHTAGS','hashtags');
define('EMAIL_NOTIFICATIONS','email_notifications');
define('ACHIEVEMENTS_TYPES','achievement_types');
define('RANK_TYPES','rank_types');
define('POST_REPORTS','post_reports');
define('PERSON_RATES','person_rates');
define('OPEN_TIMELINE_CHATS','open_timeline_chats');
define("PROFILE_VIEWERS","profile_viewers");

define("QUESTIONS","questions");$questions_rows = array('id' => 'id', 'question_title' => 'question_title', 'question_userto' => 'question_userto', 'question_userfrom' => 'question_userfrom', 'question_unique_id' => 'question_unique_id', 'question_privacy');
define("QUESTION_ANSWERS","question_answers");$questions_answers_rows = array();

// Timeline Tables
define("TIMELINE_ITEM", "timeline_item");
define("TIMELINE_POST_COMMENTS","timeline_post_comments");
define("TIMELINE_ITEM_TEXT", "timeline_item_text");
define("TIMELINE_ITEM_PERSONLIKE","	timeline_item_personlike");
define("TIMELINE_ITEM_VIDEO","timeline_item_videos");
define("TIMELINE_ITEM_PHOTO","timeline_item_photo");
define("TIMELINE_ITEM_FRIENDS","timeline_item_friends");
define("TIMELINE_POST_COMMENTS_LIKES","timeline_post_comments_likes");
define("TIMELINE_ITEM_MUSIC","timeline_item_music");
define("TIMELINE_POST_LIKES","timeline_post_likes");
define("TIMELINE_ITEM_ACTIVITY","timeline_item_activity");
define("TIMELINE_ITEM_CLIQUE_SHARE","timeline_item_clique_share");
define("TIMELINE_ITEM_SHARE","timeline_item_share");
define("TIMELINE_ITEM_ORIGINAL_VIDEOS","timeline_item_original_videos");
define("TIMELINE_ITEM_CHAT_INVITE","timeline_item_chat_invite");

// Albums tables
define("PHOTO_ALBUMS","photo_albums");
define("PHOTOS","photos");
define("PHOTO_TAGS","photo_tags");

// Profile Blocks
define('PROFILE_BLOCKS', 'profileblocks');
define('FAVORITES_BLOCKS', 'favoritesblock');
define('CONTACT_INFO_BLOCK','contactinfoblock');
define('FAMILY_BLOCK','familyblock');

// Chats Tables
define('CHATS', 'chats');
define('CHAT_MEMBERS','chat_members');
define('CHAT_MESSAGES_ITEM','chat_messages_item');
define('CHAT_MESSAGE_ITEM_NOTE','chat_message_item_note');
define('CHAT_MESSAGE_ITEM_TEXT','chat_message_item_text');
define('CHAT_MESSAGE_ITEM_VIDEO','chat_message_item_video');
define('CHAT_MESSAGE_ITEM_PICTURE','chat_message_item_picture');
define('CHAT_MESSAGES_ITEM_USERJOINED','chat_message_item_userJoined');
define('CHAT_MESSAGE_ITEM_USERLEFT','chat_message_item_userLeft');

// Cliques
define('CLIQUES','cliques');
define('CLIQUE_MEMBERS','clique_members');
define('CLIQUE_REQUESTS','clique_requests');

// Conversations
define('CONVERSATIONS', 'conversations');
define('CONVERSATION_MESSAGES', 'conversation_messages');
define('CONVERSATION_MESSAGE_TYPE_PHOTO', 'conversation_message_type_photo');
define('CONVERSATION_MESSAGE_TYPE_VIDEO', 'conversation_message_type_video');
define('CONVERSATION_MESSAGE_TYPE_FILE', 'conversation_message_type_file');

// Sayings
define('MESSAGE_SQL_ERROR', 'Sorry, '.SITE_NAME.' made a little mistake! Please try again.');
define('MESSAGE_USER_NO_EXIST', "Sorry but this person dosen't exist!");

define('MESSAGE_CONVERSATION_ALR_MADE', 'A conversation has already been made');
define('MESSAGE_CONVERSATION_CANT_BE_DUP', 'You cant send a message to yourself silly!');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

/* Assets directory */
define('ASSET_PATH','assets/');
