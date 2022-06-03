<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['chat'] = 'ChatController/index';
$route['send-message'] = 'ChatController/send_text_message';
$route['chat-attachment/upload'] = 'ChatController/send_text_message';
$route['get-chat-history-vendor'] = 'ChatController/get_chat_history_by_vendor';

$route['update-notification'] = 'ChatController/update_notification';
$route['update-activity'] = 'ChatController/update_activity';
$route['check-notification'] = 'ChatController/check_notification';
$route['check-activity'] = 'ChatController/check_activity';

$route['AssistantGunroom/update-notification'] = 'ChatController/update_notification';
$route['AssistantGunroom/update-activity'] = 'ChatController/update_activity';
$route['AssistantGunroom/check-notification'] = 'ChatController/check_notification';
$route['AssistantGunroom/check-activity'] = 'ChatController/check_activity';

$route['ChiefMess/update-notification'] = 'ChatController/update_notification';
$route['ChiefMess/update-activity'] = 'ChatController/update_activity';
$route['ChiefMess/check-notification'] = 'ChatController/check_notification';
$route['ChiefMess/check-activity'] = 'ChatController/check_activity';

$route['UTO/update-notification'] = 'ChatController/update_notification';
$route['UTO/update-activity'] = 'ChatController/update_activity';
$route['UTO/check-notification'] = 'ChatController/check_notification';
$route['UTO/check-activity'] = 'ChatController/check_activity';

$route['Admin/update_complaint/update-activity'] = 'ChatController/update_activity';
$route['Admin/update_complaint/update-notification'] = 'ChatController/update_notification';
$route['Admin/update_complaint/check-activity'] = 'ChatController/check_activity';
$route['Admin/update_complaint/add_weapons/check-notification'] = 'ChatController/check_notification';

$route['Admin/update_guest_reservation/update-activity'] = 'ChatController/update_activity';
$route['Admin/update_guest_reservation/update-notification'] = 'ChatController/update_notification';
$route['Admin/update_guest_reservation/check-activity'] = 'ChatController/check_activity';
$route['Admin/update_guest_reservation/add_weapons/check-notification'] = 'ChatController/check_notification';

$route['Admin/update_menu_requests/update-activity'] = 'ChatController/update_activity';
$route['Admin/update_menu_requests/update-notification'] = 'ChatController/update_notification';
$route['Admin/update_menu_requests/check-activity'] = 'ChatController/check_activity';
$route['Admin/update_menu_requests/add_weapons/check-notification'] = 'ChatController/check_notification';

$route['Admin/show_complaint/update-activity'] = 'ChatController/update_activity';
$route['Admin/show_complaint/update-notification'] = 'ChatController/update_notification';
$route['Admin/show_complaint/check-activity'] = 'ChatController/check_activity';
$route['Admin/show_complaint/add_weapons/check-notification'] = 'ChatController/check_notification';

$route['chat-clear'] = 'ChatController/chat_clear_client_cs';

$route['mission/(:any)']='Mission/mission/$1';
$route['mission']='CO/mission';
$route['get_values/(:any)']='Manager/Get_Values/$1';
$route['show_records/(:any)']='Manager/show_records/$1';
$route['default_controller'] = 'User_Login';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
