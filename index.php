<?php
/***************************************************************************
 *
 * DropYet v2.4.6.4
 *
 * Author : TheQuickSaveGamer/ Maximilian Sixdorf 
 * Modified script from marek ät marekrei dot com
 * dropyet.maximiliansixdorf.de
 *
 *
 * NB!:If you change anything, save with UTF-8! Otherwise you may
 *     encounter problems, especially when displaying images.
 *
 ***************************************************************************/

/***************************************************************************/
/*   HERE ARE THE SETTINGS FOR CONFIGURATION                               */
/*   Settings for password, etc. in dropyet itself						   */
/***************************************************************************/

//
// Initialising variables. Don't change these.
//

$_CONFIG = array();
$_ERROR = "";
$_START_TIME = microtime(TRUE);

/*
 * GENERAL SETTINGS (Do not change anything in this file!)
 */

//
// Choose a language. See below in the language section for options.
// Default: $_CONFIG['lang'] = "en";
//
include("config_user.php");
$_CONFIG['lang'] = $languagedy;

//
// Display thumbnails when hovering over image entries in the list.
// Common image types are supported (jpeg, png, gif).
// Pdf files are also supported but require ImageMagick to be installed.
// Default: $_CONFIG['thumbnails'] = true;
//
$_CONFIG['thumbnails'] = false;

//
// Maximum sizes of the thumbnails.
// Default: $_CONFIG['thumbnails_width'] = 200;
// Default: $_CONFIG['thumbnails_height'] = 200;
//
$_CONFIG['thumbnails_width'] = 300;
$_CONFIG['thumbnails_height'] = 300;

//
// Mobile interface enabled. true/false
// Default: $_CONFIG['mobile_enabled'] = true;
//
$_CONFIG['mobile_enabled'] = true;

//
// Mobile interface as the default setting. true/false
// Default: $_CONFIG['mobile_default'] = false;
//
$_CONFIG['mobile_default'] = false;

/*
 * USER INTERFACE
 */

//
// Will the files be opened in a new window? true/false
// Default: $_CONFIG['open_in_new_window'] = false;
//
$_CONFIG['open_in_new_window'] = true;

//
// How deep in subfolders will the script search for files?
// Set it larger than 0 to display the total used space.
// Default: $_CONFIG['calculate_space_level'] = 0;
//
$_CONFIG['calculate_space_level'] = 0;

//
// Will the page header be displayed? 0=no, 1=yes.
// Default: $_CONFIG['show_top'] = true;
//
$_CONFIG['show_top'] = false;

//
// The title for the page
// Default: $_CONFIG['main_title'] = "Encode Explorer";
//
$_CONFIG['main_title'] = "DropYet";

//
// The secondary page titles, randomly selected and displayed under the main header.
// For example: $_CONFIG['secondary_titles'] = array("Secondary title", "&ldquo;Secondary title with quotes&rdquo;");
// Default: $_CONFIG['secondary_titles'] = array();
//
$_CONFIG['secondary_titles'] = array();

//
// Display breadcrumbs (relative path of the location).
// Default: $_CONFIG['show_path'] = true;
//
$_CONFIG['show_path'] = true;

//
// Display the time it took to load the page.
// Default: $_CONFIG['show_load_time'] = true;
//
$_CONFIG['show_load_time'] = false;

//
// The time format for the "last changed" column.
// Default: $_CONFIG['time_format'] = "d.m.y H:i:s";
//
$_CONFIG['time_format'] = "".$timeform."";

//
// Charset. Use the one that suits for you.
// Default: $_CONFIG['charset'] = "UTF-8";
//
$_CONFIG['charset'] = "UTF-8";

/*
* PERMISSIONS
*/

//
// The array of folder names that will be hidden from the list.
// Default: $_CONFIG['hidden_dirs'] = array();
//
$_CONFIG['hidden_dirs'] = array();

//
// Filenames that will be hidden from the list.
// Default: $_CONFIG['hidden_files'] = array(".ftpquota", "index.php", "index.php~", ".htaccess", ".htpasswd");
//
$_CONFIG['hidden_files'] = array(".ftpquota", "index.php", "index.php~", ".htaccess", ".htpasswd");

//
// Whether authentication is required to see the contents of the page.
// If set to false, the page is public.
// If set to true, you should specify some users as well (see below).
// Important: This only prevents people from seeing the list.
// They will still be able to access the files with a direct link.
// Default: $_CONFIG['require_login'] = false;
//
$_CONFIG['require_login'] = true;
$_CONFIG['md5_passwords'] = true;

//
// Usernames and passwords for restricting access to the page.
// The format is: array(username, password, status)
// Status can be either "user" or "admin". User can read the page, admin can upload and delete.
// For example: $_CONFIG['users'] = array(array("username1", "password1", "user"), array("username2", "password2", "admin"));
// You can also keep require_login=false and specify an admin.
// That way everyone can see the page but username and password are needed for uploading.
// For example: $_CONFIG['users'] = array(array("username", "password", "admin"));
// Default: $_CONFIG['users'] = array();
//
//include("config_user.php");
$_CONFIG['users'] = array(array($usernamedy, $passworddy, "admin"));

//
// Permissions for uploading, creating new directories and deleting.
// They only apply to admin accounts, regular users can never perform these operations.
// Default:
// $_CONFIG['upload_enable'] = true;
// $_CONFIG['newdir_enable'] = true;
// $_CONFIG['delete_enable'] = false;
//
$_CONFIG['upload_enable'] = true;
$_CONFIG['newdir_enable'] = true;
$_CONFIG['delete_enable'] = true;

/*
 * UPLOADING
 */

//
// List of directories where users are allowed to upload.
// For example: $_CONFIG['upload_dirs'] = array("./myuploaddir1/", "./mydir/upload2/");
// The path should be relative to the main directory, start with "./" and end with "/".
// All the directories below the marked ones are automatically included as well.
// If the list is empty (default), all directories are open for uploads, given that the password has been set.
// Default: $_CONFIG['upload_dirs'] = array();
//
$_CONFIG['upload_dirs'] = array("./Daten/");

//
// MIME type that are allowed to be uploaded.
// For example, to only allow uploading of common image types, you could use:
// $_CONFIG['upload_allow_type'] = array("image/png", "image/gif", "image/jpeg");
// Default: $_CONFIG['upload_allow_type'] = array();
//
$_CONFIG['upload_allow_type'] = array();

//
// File extensions that are not allowed for uploading.
// For example: $_CONFIG['upload_reject_extension'] = array("php", "html", "htm");
// Default: $_CONFIG['upload_reject_extension'] = array();
//
$_CONFIG['upload_reject_extension'] = array();////////

//
// By default, apply 0755 permissions to new directories
//
// The mode parameter consists of three octal number components specifying
// access restrictions for the owner, the user group in which the owner is
// in, and to everybody else in this order.
//
// See: https://php.net/manual/en/function.chmod.php
//
// Default: $_CONFIG['new_dir_mode'] = 0755;
//
$_CONFIG['new_dir_mode'] = 0755;

//
// By default, apply 0644 permissions to uploaded files
//
// The mode parameter consists of three octal number components specifying
// access restrictions for the owner, the user group in which the owner is
// in, and to everybody else in this order.
//
// See: https://php.net/manual/en/function.chmod.php
//
// Default: $_CONFIG['upload_file_mode'] = 0644;
//
$_CONFIG['upload_file_mode'] = 0644;

/*
 * LOGGING
 */

//
// Upload notification e-mail.
// If set, an e-mail will be sent every time someone uploads a file or creates a new dirctory.
// Default: $_CONFIG['upload_email'] = "";
//
$_CONFIG['upload_email'] = $emaildy;

//
// Logfile name. If set, a log line will be written there whenever a directory or file is accessed.
// For example: $_CONFIG['log_file'] = ".log.txt";
// Default: $_CONFIG['log_file'] = "";
//
$_CONFIG['log_file'] = $log;

/*
 * SYSTEM
 */


//
// The starting directory. Normally no need to change this.
// Use only relative subdirectories!
// For example: $_CONFIG['starting_dir'] = "./mysubdir/";
// Default: $_CONFIG['starting_dir'] = ".";
//
$_CONFIG['starting_dir'] = "./Daten/";

//
// Location in the server. Usually this does not have to be set manually.
// Default: $_CONFIG['basedir'] = "";
//
$_CONFIG['basedir'] = "";

//
// Big files. If you have some very big files (>4GB), enable this for correct
// file size calculation.
// Default: $_CONFIG['large_files'] = false;
//
$_CONFIG['large_files'] = false;

//
// The session name, which is used as a cookie name.
// Change this to something original if you have multiple copies in the same space
// and wish to keep their authentication separate.
// The value can contain only letters and numbers. For example: MYSESSION1
// More info at: http://www.php.net/manual/en/function.session-name.php
// Default: $_CONFIG['session_name'] = "";
//
$_CONFIG['session_name'] = "DROPYETSESS";


$_TRANSLATIONS = array();

// English
$_TRANSLATIONS["en"] = array(
	"file_name" => "File name",
	"size" => "Size",
	"last_changed" => "Last updated",
	"total_used_space" => "Total space used",
	"free_space" => "Free space",
	"password" => "Password",
	"upload" => "Upload",
	"failed_upload" => "Failed to upload the file!",
	"failed_move" => "Failed to move the file into the right directory!",
	"wrong_password" => "Wrong password",
	"make_directory" => "New directory",
	"new_dir_failed" => "Failed to create directory",
	"chmod_dir_failed" => "Failed to change directory rights",
	"unable_to_read_dir" => "Unable to read directory",
	"location" => "Location",
	"root" => "Root",
	"log_file_permission_error" => "The script does not have permissions to write the log file.",
	"upload_not_allowed" => "The script configuration does not allow uploading in this directory.",
	"upload_dir_not_writable" => "This directory does not have write permissions.",
	"mobile_version" => "Mobile view",
	"standard_version" => "Standard view",
	"page_load_time" => "Page loaded in %.2f ms",
	"wrong_pass" => "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>Wrong username or password</div>",
	"username" => "Username",
	"log_in" => "Log in",
	"upload_type_not_allowed" => "This file type is not allowed for uploading.",
	"del" => "Delete",
	"log_out" => "Log out",
	"settings" => "Settings",
	"settings_changedy" => "Settings",
	"multi_upl" => "Add files",
	"filesdy" => "Files",
	"supportdy" => "Help",
	"submit_ideady" => "Submit feedback",
	"choose_filedy" => "File...",
	"close_modaldy" => "Cancel",
	"folder_namedy" => "Directory...",
	"delete_filedy" => "Delete",
	"settings_savedy" => "Save",
	"settings_usernamedy" => "Username",
	"settings_passworddy" => "Password",
	"settings_emaildy" => "Email address (keep empty to disable)",
	"settings_languagedy" => "as current language",
	"settings_alertdy" => "Your changes appear after a page reload.",
	"settings_hint" => "Please keep your username and password secret!",
	"usefuldy" => "Useful stuff",
	"aysywddy1" => "Are you sure, that you want to delete the file",
	"aysywddy2" => "",
	"infody" => "Details",
	"helpurl" => "/en/",
	"helpurldoc" => "/#installation_en",
	"settings_choose" => "set as bar colour",
	"settings_choose_nav" => "set as menu colour",
	"settings_lightblue" => "Light blue",
	"settings_blue" => "Blue",
	"settings_green" => "Green",
	"settings_yellow" => "Yellow",
	"settings_red" => "Red",
	"settings_lightblue_striped" => "Light blue striped",
	"settings_blue_striped" => "Blue striped",
	"settings_green_striped" => "Green striped",
	"settings_yellow_striped" => "Yellow striped",
	"settings_red_striped" => "Red striped",
	"settings_nav_white" => "White",
	"settings_nav_black" => "Black",
	"public_modedy" => "Public mode",
	"private_modedy" => "Private mode",
	"login_username_plho" => "Username...",
	"login_password_plho" => "Password...",
	"currently_private" => "Your data is not accessible from outside.",
	"currently_public" => "Your data is accessible from outside.",
	"ueber_menu" => "About",
	"ueber_title" => "About DropYet",
	"ueber_close" => "Close",
	"security_close" => "Accept & Close",
	"security_menu" => "Security",
	"security_pone" => "The URL you are running DropYet on is ",
	"security_ssl" => "SSL-Encrypted.",
	"security_nossl" => "not SSL encrypted.",
	"security_title" => "Security & Encryption",
	"about_by" => "by",
	"about_under" => "under",
	"about_license" => "license",
	"about_see" => "see here",
	"contactdy" => "Contact",
	"security_recommendation" => "It is not recommended to store confidential data in DropYet.",
	"security_sslrec" => "It is recommended to use DropYet only with an SSL-encrypted connection. Please contact your hoster.",
	"ssl_info" => "Info",
	"about_document" => "Documentations",
	"about_web" => "Website",
	"about_form" => "Contact form",
	"logprv_title" => "Private Access-Log",
	"logplc_title" => "Public Access-Log",
	"log_close" => "Close",
	"log_menu" => "Log",
	"settings_morelang" => "More languages with your help!",
	"about_ty" => "A big thank you to:",
	"about_mm" => "And much more...",
	"about_dhm" => "Don't hate me, I'm not a pro. :)",
	"license" => "License",
	"timeform" => "Date- and Timeformat",
	"tformger" => "German (24.12.2016 18:00:00)",
	"tformeng" => "English (12/24/2016 06:00:00 pm)",
	"tformchi" => "Chinese (2016年12月24日 06点00分00秒 pm)",
	"tformes" => "Spanish (24-12-2016 18:00:00)",
	"clearlog" => "Clear log",
	"comp" => "There is a compatibility problem with your browser. Use another browser to use DropYet correctly.",
	"comp_title" => "Compatibility",
	"comp_old" => "There is a compatibility problem with your browser. Your browser is outdated and should be updated soon!",
	"cn_trans" => "And a anonymous chinese translator",
	"size_all" => "overall size in",
	"size_files" => "files",
	"and" => "and",
	"size_dirs" => "directories",
	"tform" => "as chosen time format",
	"langdeu" => "German",
	"langeng" => "English",
	"langchi" => "Chinese",
	"langes" => "Spanish",
	"log_subject" => "DropYet Log sent via Email",
	"log_message" => "With this email, you received your DropYet log as attachment.",
	"log_send_btn" => "Send log via Email",
	"log_mailsent" => "Your log was sent to your Email address.",
	"log_mailfailed" => "Sending the Email failed!",
	"percent_private" => "private",
	"percent_public" => "public",
	"pw_warn_short" => "Your password is way too short! You better change it.",
	"pw_warn_enough" => "Your password length is okay, but you should definitely use a longer one.",
	"pw_warn_middle" => "Your password length is okay.",
	"pw_warn_good" => "Your password has a good length.",
	"pw_warn_vgood" => "Your password has a very good length!",
	"pw_warn_wow" => "Wow! How can you even remember your DropYet password?",
	"pw_warn_title" => "Detailed password checker",
	"pw_warn_nospecial" => "No special characters in password found!",
	"pw_warn_special" => "Special characters in your password found",
	"pw_warn_nobig" => "No upper case letters in password found!",
	"pw_warn_capital" => "Upper case letters in your password found",
	"pw_warn_nosmall" => "No lower case letters in password found!",
	"pw_warn_normal" => "Lower case letters  in your password found",
	"pw_warn_nonums" => "No numbers in password found!",
	"pw_warn_nums" => "Numbers in your password found",
	"pw_warn_nouser" => "Your username was not found in your password",
	"pw_warn_user" => "Your username was found in your password!",
	"pw_warn_info" => "DropYet analyzes your password and gives you feedback about the current safety-status of your password. If everything lights green, your password is a rather safe one. Yellow means, you should change something of you can and red means a total no-go.",
	"js_url" => "js/bootstrap-filestyleen.min.js",
	"comp_ff" => "It seems that you are using Firefox. Sadly, Firefox is currently not supporting all of the features we need to use. DropYet is currently running in a compatibility mode. Nevertheless you should change your browser to avoid display errors.",
	"comp_edge" => "It seems that you are using Microsoft's Edge Browser. Sadly, Edge is currently having trouble with displaying websites correctly so you might have so issues while using DropYet.",
	"chng_paswod_chck" => "Change password?",
	"gone_pw_chck" => "Since version 2.4.4.1 DropYet uses a SHA512 encryption to disguise your password. With appropriate knowledge but also simple passwords can be cracked. Make sure you have a secure, long and unique password!",
	"log_deac_btn" => "Mail deactivated",
	"encrypto" => "File encryption",
	"bg_none" => "No background",
	"bgnone" => "Nothing",
	"bgdy" => "set as login background",
	"bg1" => "Architecture",
	"bg2" => "Sunset",
	"bg3" => "Crystals",
	"bg4" => "Forest",
	"bg5" => "Mountains Clouds",
	"bg6" => "Under the Sea",
	"bg7" => "Island",
	"bg8" => "Sunset Clouds",
	"bg9" => "Mosaic",
	"bg10" => "Dust",
	"bgrandom" => "Unsplash random image",
	"currinst" => "Inst.:",
	"latestver" => "Latest:",
	"evcwarn" => "Updateproblem",
	"settmailtitle" => "Your DropYet settings were changed",
	"settmailmsg" => "Your DropYet settings have been changed recently. If it was not you, please check if your password as changed. If you cannot log in into your DropYet anymore, please try to safe your data and reinstall your DropYet.",
	"dyupdate" => "Do Update",
	"evctitle" => "Error recognising latest DropYet version",
	"evctext" => "DropYet cannot determine the latest version of DropYet.  Possibly your DropYet cannot connect to the DropYet-servers. If this warning remains permanent, please look for updates manually on <a target=\"_blank\" href=\"https://dropyet.maximiliansixdorf.de/en\">the DropYet-Website</a>.",
	"menuenc" => "Encryption",
	"axcrypt" => "AxCrypt",
	"newver" => "Update available!",
	"updone" => "For DropYet there is now version",
	"updtwo" => "as an update available. Do you want to update now?",
	"updnow" => "Do update now",
	"updlater" => "Do update later",
	"updno" => "No update",
	"log_setting" => "Log",
	"log_activated" => "activated",
	"log_deactivated" => "deactivated",
	"log_state" => "Log is",
	"log_enable" => "Activate log",
	"log_disable" => "Deactivate log",
	
);

// German
$_TRANSLATIONS["de"] = array(
	"file_name" => "Dateiname",
	"size" => "Gr&ouml;&szlig;e",
	"last_changed" => "Letzte &Auml;nderung",
	"total_used_space" => "Benutzter Speicherplatz",
	"free_space" => "Freier Speicherplatz",
	"password" => "Passwort",
	"upload" => "Hochladen",
	"failed_upload" => "Hochladen ist fehlgeschlagen!",
	"failed_move" => "Verschieben der Datei ist fehlgeschlagen!",
	"wrong_password" => "Falsches Passwort",
	"make_directory" => "Neuer Ordner",
	"new_dir_failed" => "Erstellen des Ordners fehlgeschlagen",
	"chmod_dir_failed" => "Ver&auml;nderung der Zugriffsrechte des Ordners fehlgeschlagen",
	"unable_to_read_dir" => "Ordner konnte nicht gelesen werden",
	"location" => "Ort",
	"root" => "Übersicht",
	"log_file_permission_error" => "Das Script kann wegen fehlenden Berechtigungen keine Log Datei schreiben.",
	"upload_not_allowed" => "Die Scriptkonfiguration erlaubt kein Hochladen in dieses Verzeichnis.",
	"upload_dir_not_writable" => "Dieser Ordner besitzt keine Schreibrechte.",
	"mobile_version" => "Mobile Ansicht",
	"standard_version" => "Normale Ansicht",
	"page_load_time" => "Die Seite wurde in %.2f ms geladen",
	"wrong_pass" => "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>Benutzername oder Kennwort falsch</div>",
	"username" => "Benutzername",
	"log_in" => "Einloggen",
	"upload_type_not_allowed" => "Dieser Dateityp darf nicht hochgeladen werden.",
	"del" => "Entfernen",
	"log_out" => "Ausloggen",
	"settings" => "Einstellungen",
	"settings_changedy" => "Einstellungen",
	"multi_upl" => "Daten hinzufügen",
	"filesdy" => "Daten",
	"supportdy" => "Hilfe",
	"submit_ideady" => "Feedback",
	"choose_filedy" => "Datei...",
	"close_modaldy" => "Schließen",
	"folder_namedy" => "Ordnername...",
	"delete_filedy" => "Löschen",
	"settings_savedy" => "Speichern",
	"settings_usernamedy" => "Benutzername",
	"settings_passworddy" => "Passwort",
	"settings_emaildy" => "E-Mail Adresse (leer lassen zum deaktivieren)",
	"settings_languagedy" => "als Sprache gewählt",
	"settings_alertdy" => "Ihre Einstellungen werden nach einem Reload  übernommen.",
	"settings_hint" => "Bitte halten Sie Ihren Nutzernamen und Ihr Passwort geheim!",
	"usefuldy" => "Nützliches",
	"aysywddy1" => "Sind Sie sicher, dass Sie die Datei",
	"aysywddy2" => "löschen möchten?",
	"infody" => "Info",
	"helpurl" => "/",
	"helpurldoc" => "/",
	"settings_choose" => "als Akzentfarbe gewählt",
	"settings_choose_nav" => "als Menüfarbe gewählt",
	"settings_white" => "Weiß",
	"settings_black" => "Schwarz",
	"settings_lightblue" => "Hellblau",
	"settings_blue" => "Blau",
	"settings_green" => "Grün",
	"settings_yellow" => "Gelb",
	"settings_red" => "Rot",
	"settings_lightblue_striped" => "Hellblau gestreift",
	"settings_blue_striped" => "Blau gestreift",
	"settings_green_striped" => "Grün gestreift",
	"settings_yellow_striped" => "Gelb gestreift",
	"settings_red_striped" => "Rot gestreift",
	"settings_nav_white" => "Weiß",
	"settings_nav_black" => "Schwarz",
	"public_modedy" => "Öffentlich",
	"private_modedy" => "Privat Modus",
	"login_username_plho" => "Benutzername...",
	"login_password_plho" => "Passwort...",
	"currently_private" => "Ihre Daten sind geschützt.",
	"currently_public" => "Ihre Daten sind öffentlich erreichbar.",
	"ueber_menu" => "Über",
	"ueber_close" => "Schließen",
	"ueber_title" => "Über DropYet",
	"security_close" => "Akzeptieren & Schließen",
	"security_menu" => "Sicherheit",
	"security_pone" => "Für die URL, unter der Sie DropYet benutzen, besteht  ",
	"security_ssl" => "eine SSL-Verschlüsselung.",
	"security_nossl" => "keine SSL-Verschlüsselung.",
	"security_title" => "Sicherheit & Verschlüsselung",
	"about_by" => "von",
	"about_under" => "unter",
	"about_license" => "Lizenz",
	"about_see" => "siehe hier",
	"contactdy" => "Kontakt",
	"security_recommendation" => "Es wird nicht empfohlen, DropYet zum Speichern höchst sensibler Daten zu benutzen.",
	"security_sslrec" => "Es wird empfohlen, DropYet nur mit SSL-verschlüsselter Verbindung zu nutzen! Setzen Sie sich ggf. mit Ihrem Hoster in Verbindung.",
	"ssl_info" => "Info",
	"about_document" => "Hilfe & Anleitung",
	"about_web" => "Webseite",
	"about_form" => "Kontaktformular",
	"logprv_title" => "Zugriffslog privater Modus",
	"logplc_title" => "Zugriffslog öffentlicher Modus",
	"log_close" => "Schließen",
	"log_menu" => "Zugriffslog",
	"settings_morelang" => "Mehr Sprachen mit Ihrer Hilfe!",
	"about_ty" => "Ein großes Dankeschön an:",
	"about_mm" => "Und vielen mehr...",
	"about_dhm" => "Ich bin kein Profi.",
	"license" => "Lizenz",
	"timeform" => "Datums- und Zeitformat",
	"tformger" => "Deutsch (24.12.2016 18:00:00)",
	"tformeng" => "Englisch (12/24/2016 06:00:00 pm)",
	"tformchi" => "Chinesisch (2016年12月24日 06点00分00秒 pm)",
	"tformes" => "Spanisch (24-12-2016 18:00:00)",
	"clearlog" => "Log leeren",
	"comp" => "Mit Ihrem Browser liegt ein Kompatibilitätsproblem vor! Sie sollten Ihren Browser wechseln, um DropYet vernünftig nutzen zu können.",
	"comp_title" => "Kompatibilität",
	"comp_old" => "Mit Ihrem Browser liegt ein Kompatibilitätsproblem vor! Er ist veraltet und sollte dringend aktualisiert werden!",
	"cn_trans" => "Und einem anonymen Chinesisch-Übersetzer",
	"size_all" => "Gesamtgröße in",
	"size_files" => "Dateien",
	"and" => "und",
	"size_dirs" => "Verzeichnissen",
	"tform" => "als Zeitformat gewählt",
	"langdeu" => "Deutsch",
	"langeng" => "Englisch",
	"langchi" => "Chinesisch",
	"langes" => "Spanisch",
	"log_subject" => "DropYet Log per E-Mail versandt",
	"log_message" => "Mit dieser E-Mail erhalten Sie Ihren DropYet-Log als Datei im Anhang.",
	"log_send_btn" => "Log per E-Mail senden",
	"log_mailsent" => "Der Log wurde an Ihre E-Mail versandt.",
	"log_mailfailed" => "Versenden fehlgeschlagen!",
	"percent_private" => "privat",
	"percent_public" => "öffentlich",
	"pw_warn_short" => "Ihr Passwort ist viel zu kurz! Sie sollten ein längeres nutzen.",
	"pw_warn_enough" => "Ihr Passwort hat eine ausreichende Länge. Es wird jedoch empfohlen, ein längeres zu nutzen.",
	"pw_warn_middle" => "Ihr Passwort hat eine mittlere Länge",
	"pw_warn_good" => "Ihr Passwort hat eine gute Länge.",
	"pw_warn_vgood" => "Ihr Passwort hat eine sehr gute Länge!",
	"pw_warn_wow" => "Wow! Wie können Sie sich Ihr Passwort bei dieser Länge überhaupt noch merken?",
	"pw_warn_title" => "Detaillierte Passwortüberprüfung",
	"pw_warn_nospecial" => "Keine Sonderzeichen im Passwort gefunden!",
	"pw_warn_special" => "Sonderzeichen im Passwort gefunden",
	"pw_warn_nobig" => "Keine Großbuchstaben im Passwort gefunden!",
	"pw_warn_capital" => "Großbuchstaben im Passwort gefunden",
	"pw_warn_nosmall" => "Keine Kleinbuchstaben im Passwort gefunden!",
	"pw_warn_normal" => "Kleinbuchstaben im Passwort gefunden",
	"pw_warn_nonums" => "Keine Zahlen im Passwort gefunden!",
	"pw_warn_nums" => "Zahlen im Passwort gefunden",
	"pw_warn_nouser" => "Ihr Nutzername wurde nicht im Passwort gefunden",
	"pw_warn_user" => "Ihr Nutzername wurde im Passwort gefunden!",
	"pw_warn_info" => "DropYet analysiert Ihr Passwort auf die Sicherheit im Bezug auf Länge und darin vorkommende Zeichen. Sollte die Übersicht bei Ihnen grün leuchten, haben Sie ein eher sicheres Passwort. Gelb bedeutet, dass Sie etwas verändern sollten, wenn es möglich ist. Rot bedeutet, Sie müssen bezüglich diesem Punkt dringend etwas unternehmen, wenn Sie DropYet sicher nutzen möchten.",
	"js_url" => "js/bootstrap-filestylede.min.js",
	"comp_ff" => "Es sieht aus, als würden Sie Firefox nutzen. Leider unterstützt Firefox nicht alle Funktionen die DropYet benötigt. Ihre DropYet läuft gerade in einem speziellen Kompatibilitätsmodus, in dem alles funktionieren sollte. Trotzdem kann es mit diesem Browser zu Anzeigefehlern kommen.",
	"comp_edge" => "Es sieht aus als würden Sie derzeit Microsoft's Edge Browser nutzen. Leider stellt Edge manche Webseiten nicht richtig dar, weswegen Ihnen geraten sei Ihren Browser zu wechseln.",
	"chng_paswod_chck" => "Passwort ändern?",
	"gone_pw_chck" => "DropYet benutzt seit Version 2.4.4.1 eine SHA512 Verschlüsselung zum verschleiern Ihres Passwortes. Bei entsprechender Kenntnis können aber auch damit einfache Passwörter geknackt werden. Achten Sie stehts auf ein sicheres, langes und einzigartiges Passwort!",
	"log_deac_btn" => "Mail deaktiviert",
	"encrypto" => "Dateiverschlüsselung",
	"bg_none" => "Kein Hintergrund",
	"bgnone" => "Nichts",
	"bgdy" => "als Login-Hintergrund gewählt",
	"bg1" => "Architektur",
	"bg2" => "Sonnenuntergang",
	"bg3" => "Kristalle",
	"bg4" => "Wald",
	"bg5" => "Bergwolken",
	"bg6" => "Unter dem Meer",
	"bg7" => "Inselfeeling",
	"bg8" => "Sonnenuntergangswolken",
	"bg9" => "Mosaik",
	"bg10" => "Staub",
	"bgrandom" => "Unsplash-Zufallsbild",
	"currinst" => "Inst.:",
	"latestver" => "Aktuellste:",
	"evcwarn" => "Aktualisierungsfehler",
	"settmailtitle" => "Ihre DropYet-Einstellungen wurden geändert",
	"settmailmsg" => "Vor kurzem wurden an den Einstellungen Ihrer DropYet Änderungen vorgenommen. Möglicherweise wurden Passwörter geändert. Sollten Sie dies nicht gewesen sein, sichern Sie bitte all Ihre Daten und ändern Sie Ihr Passwort. Sollte Ihre DropYet schon blockiert sein, installieren Sie DropYet neu.",
	"dyupdate" => "Aktualisieren",
	"evctitle" => "Probleme beim Erkennen der neusten Version",
	"evctext" => "DropYet konnte derzeit nicht die neuste Version von DropYet ermitteln. Möglicherweise konnte keine Verbindung zu den DropYet-Servern hergestellt werden. Sollte diese Meldung dauerhaft bestehen bleiben, schauen Sie auf <a target=\"_blank\" href=\"https://dropyet.maximiliansixdorf.de\">der DropYet-Webseite</a> manuell nach Updates.",
	"menuenc" => "Verschlüsselung",
	"axcrypt" => "AxCrypt",
	"newver" => "Neue Version verfügbar!",
	"updone" => "Für DropYet ist nun die Version",
	"updtwo" => "als Update verfügbar. Möchten Sie jetzt aktualisieren?",
	"updnow" => "Update jetzt durchführen",
	"updlater" => "Update später durchführen",
	"updno" => "Kein Update",
	"log_setting" => "Log",
	"log_activated" => "aktiviert",
	"log_deactivated" => "deaktiviert",
	"log_state" => "Log ist",
	"log_enable" => "Log aktivieren",
	"log_disable" => "Log deaktivieren",
	
);


// Chinese
$_TRANSLATIONS["cn"] = array(
"file_name" => "文件名",
"size" => "大小",
"last_changed" => "最后更新",
"total_used_space" => "已用空间",
"free_space" => "可用空间",
"password" => "密码",
"upload" => "上传",
"failed_upload" => "文件上传失败！",
"failed_move" => "未能将文件移动到正确的目录！",
"wrong_password" => "密码错误",
"make_directory" => "新建目录",
"new_dir_failed" => "新建目录失败",
"chmod_dir_failed" => "更改目录权限失败",
"unable_to_read_dir" => "无法读取目录",
"location" => "位置",
"root" => "根",
"log_file_permission_error" => "脚本没有写日志文件的权限。",
"upload_not_allowed" => "脚本配置不允许在此目录中上传。",
"upload_dir_not_writable" => "此目录没有写入权限。",
"mobile_version" => "手机视图",
"standard_version" => "标准视图",
"page_load_time" => "页面载入%.2f毫秒",
"wrong_pass" => "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>用户名或密码错误</div>",
"username" => "用户名",
"log_in" => "登录",
"upload_type_not_allowed" => "此类型的文件不允许上传。",
"del" => "删除",
"log_out" => "退出",
"settings" => "设置",
"settings_changedy" => "设置",
"multi_upl" => "添加文件",
"filesdy" => "文件",
"supportdy" => "帮助",
"submit_ideady" => "提交反馈",
"choose_filedy" => "文件...",
"close_modaldy" => "取消",
"folder_namedy" => "文件夹名称...",
"delete_filedy" => "删除",
"settings_savedy" => "保存",
"settings_usernamedy" => "用户名",
"settings_passworddy" => "密码",
"settings_emaildy" => "电子邮件地址（保持空禁用）",
"settings_languagedy" => "作為語言",
"settings_alertdy" => "您的更改会在页面重新加载后显示。",
"settings_hint" => "请把你的用户名和密码保密！",
"usefuldy" => "有用的",
"aysywddy1" => "你确定你的文件",
"aysywddy2" => "要删除吗？",
"infody" => "详细信息",
"helpurl" => "/en/",
"settings_choose" => "作為口音顏色",
"settings_choose_nav" => "作為菜單顏色",
"settings_white" => "白色",
"settings_black" => "黑色",
"settings_lightblue" => "浅蓝色",
"settings_blue" => "蓝色",
"settings_green" => "绿色",
"settings_yellow" => "黄色",
"settings_red" => "红色",
"settings_lightblue_striped" => "浅蓝色条纹",
"settings_blue_striped" => "蓝色条纹",
"settings_green_striped" => "绿色条纹",
"settings_yellow_striped" => "黄色条纹",
"settings_red_striped" => "红色条纹",
"settings_nav_white" => "白色",
"settings_nav_black" => "黑色",
"public_modedy" => "公共模式",
"private_modedy" => "私人模式",
"login_username_plho" => "用户名...",
"login_password_plho" => "密码...",
"currently_private" => "您的数据无法从外部访问。",
"currently_public" => "您的数据可从外部访问。",
"ueber_menu" => "关于",
"ueber_close" => "关闭",
"ueber_title" => "关于DropYet",
"security_close" => "接受并关闭",
"security_menu" => "安全",
"security_pone" => "您运行DropYet的URL",
"security_ssl" => "是SSL加密的。",
"security_nossl" => "不是SSL加密的。",
"security_title" => "安全与加密",
"about_by" => "由",
"about_under" => "根据",
"about_license" => "许可证",
"about_see" => "见这里",
"contactdy" => "联系",
"security_recommendation" => "不建议使用DropYet存储高度敏感的数据。",
"security_sslrec" => "建议仅使用SSL加密连接使用DropYet。请联系您的托管服务提供商。",
"ssl_info" => "信息",
"about_document" => "文档",
"about_web" => "网站",
"about_form" => "联系表单",
"logprv_title" => "私人访问日志",
"logplc_title" => "公共访问日志",
"log_close" => "关闭",
"log_menu" => "日志",
"settings_morelang" => "更多的语言在您的帮助！",
"about_ty" => "非常感谢你：",
"about_mm" => "还有很多...",
"about_dhm" => "我不是专业的。",
"license" => "许可证",
"timeform" => "日期和时间格式",
"tformger" => "德國 (24.12.2016 18:00:00)",
"tformeng" => "英語 (12/24/2016 06:00:00 pm)",
"tformchi" => "中國 (2016年12月24日 06点00分00秒 pm)",
"tformes" => "西班牙語 (24-12-2016 18:00:00)",
"clearlog" => "清除日志",
"comp" => "您的浏览器存在兼容性问题。使用其他浏览器正确使用DropYet。",
"comp_title" => "兼容性",
"comp_old" => "您的瀏覽器存在兼容性問題。 您的瀏覽器已經過時了，應該盡快更新！",
"cn_trans" => "和一個匿名的中文翻譯",
"size_all" => "整體尺寸 在",
"size_files" => "檔",
"and" => "和",
"size_dirs" => "目錄",
"tform" => "作為時間格式",
"langdeu" => "德國",
"langeng" => "英語",
"langchi" => "中國",
"langes" => "西班牙語",
"log_subject" => "DropYet 日誌通過郵件發送",
"log_message" => "通過此電子郵件，您收到您的 DropYet 日誌作為附件。",
"log_send_btn" => "通過電子郵件發送日誌",
"log_mailsent" => "您的日誌已發送到您的電子郵件地址",
"log_mailfailed" => "發送電子郵件失敗",
"percent_private" => "私人的",
"percent_public" => "上市",
"pw_warn_short" => "你的密碼太短了！ 你最好改變它",
"pw_warn_enough" => "你的密碼長度是可以的，但你一定要使用更長的密碼。",
"pw_warn_middle" => "你的密碼長度沒關係",
"pw_warn_good" => "你的密碼有一個很好的長度。",
"pw_warn_vgood" => "你的密碼有很好的長度！",
"pw_warn_wow" => "哇！ 你怎麼能記得你的DropYet密碼？",
"pw_warn_title" => "詳細的密碼檢查",
"pw_warn_nospecial" => "沒有找到密碼的特殊字符！",
"pw_warn_special" => "找到您的密碼中的特殊字符",
"pw_warn_nobig" => "沒有大寫字母的密碼找到！",
"pw_warn_capital" => "找到您的密碼中的大寫字母",
"pw_warn_nosmall" => "沒有找到小寫字母的密碼！",
"pw_warn_normal" => "找到您的密碼中的小寫字母",
"pw_warn_nonums" => "沒有密碼找到號碼！",
"pw_warn_nums" => "找到密碼中的數字",
"pw_warn_nouser" => "您的用戶名在您的密碼中找不到",
"pw_warn_user" => "您的用戶名被發現在您的密碼！",
"pw_warn_info" => "DropYet分析您的密碼，並提供有關當前密碼安全狀態的反饋。 如果一切都變綠，你的密碼是一個相當安全的密碼。 黃色意味著，你應該改變一些你可以和紅色意味著一個完全不要去。",
"js_url" => "js/bootstrap-filestylecn.min.js",
"comp_ff" => "看來你正在使用Firefox。 可悲的是，Firefox目前不支持我們需要使用的所有功能。 DropYet當前正在以兼容模式運行。 不過，您應該更改瀏覽器以避免顯示錯誤。",
"comp_edge" => "看來你正在使用微軟的Edge瀏覽器。 可悲的是，Edge目前在正確顯示網站時遇到了麻煩，所以在使用DropYet時可能會遇到這樣的問題。",
"chng_paswod_chck" => "更改密碼？",
"gone_pw_chck" => "從版本2.4.4.1起，DropYet使用SHA512加密來掩飾您的密碼。 具有適當的知識，但也可以破解簡單的密碼。 確保你有一個安全，長期和獨特的密碼！",
"log_deac_btn" => "郵件停用",
"encrypto" => "文件加密",
"bg_none" => "沒有背景",
"bgnone" => "沒有",
"bgdy" => "設置為登錄背景",
"bg1" => "建築",
"bg2" => "日落",
"bg3" => "水晶",
"bg4" => "森林",
"bg5" => "山雲",
"bg6" => "在海底",
"bg7" => "島",
"bg8" => "晚霞",
"bg9" => "鑲嵌",
"bg10" => "灰塵",
"bgrandom" => "Unsplash 隨機圖像",
"currinst" => "安裝:",
"latestver" => "最新:",
"evcwarn" => "更新問題",
"settmailtitle" => "您的DropYet設置已更改",
"settmailmsg" => "您的DropYet設置最近已更改。 如果不是你，請檢查你的密碼是否已更改。 如果您無法再登錄您的DropYet，請嘗試保護您的數據並重新安裝您的DropYet。",
"dyupdate" => "做更新",
"evctitle" => "識別最新的DropYet版本時出錯",
"evctext" => "DropYet無法確定最新版本的DropYet。 可能您的DropYet無法連接到DropYet服務器。 如果此警告保持不變，請手動查找更新 <a target=\"_blank\" href=\"https://dropyet.maximiliansixdorf.de/en\">DropYet網站</a>.",
"menuenc" => "加密",
"axcrypt" => "AxCrypt",
"newver" => "更新可用！",
"updone" => "對於DropYet，現在有版本",
"updtwo" => "作為可用的更新。 你想現在更新嗎？",
"updnow" => "現在更新",
"updlater" => "稍後再更新",
"updno" => "沒有更新",
"log_setting" => "日誌",
"log_activated" => "活性",
"log_deactivated" => "停用",
"log_state" => "日誌是",
"log_enable" => "激活日誌",
"log_disable" => "停用日誌",

);


// Spanish
$_TRANSLATIONS["es"] = array(
	"file_name" => "Nombre de archivo",
	"size" => "Tamaño",
	"last_changed" => "Último cambio",
	"total_used_space" => "Espacio utilizado",
	"free_space" => "Espacio libre",
	"password" => "Contraseña",
	"upload" => "Subir",
	"failed_upload" => "Carga fallida",
	"failed_move" => "Moviendo el archivo falló!",
	"wrong_password" => "Contraseña incorrecta",
	"make_directory" => "Nueva carpeta",
	"new_dir_failed" => "No se pudo crear la carpeta",
	"chmod_dir_failed" => "Se produjo un error en el cambio de los derechos de acceso de la carpeta",
	"unable_to_read_dir" => "La carpeta no se pudo leer",
	"location" => "Lugar",
	"root" => "Estudio",
	"log_file_permission_error" => "La secuencia de comandos no puede escribir un archivo de registro debido a la falta de permisos.",
	"upload_not_allowed" => "La configuración del script no permite cargar en este directorio.",
	"upload_dir_not_writable" => "Esta carpeta no tiene permisos de escritura.",
	"mobile_version" => "Vista móvil",
	"standard_version" => "Vista normal",
	"page_load_time" => "El sitio estaba cargado en %.2f ms",
	"wrong_pass" => "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>Nombre de usuario o contraseña incorrecta</div>",
	"username" => "Nombre de usuario",
	"log_in" => "Acceder",
	"upload_type_not_allowed" => "Este tipo de archivo no se puede cargar.",
	"del" => "Eliminar",
	"log_out" => "Finalizar la sesión",
	"settings" => "Ajustes",
	"settings_changedy" => "Ajustes",
	"multi_upl" => "Agregar datos",
	"filesdy" => "Datos",
	"supportdy" => "Ayudar",
	"submit_ideady" => "Realimentación",
	"choose_filedy" => "Datos...",
	"close_modaldy" => "Cerca",
	"folder_namedy" => "Nombre de la carpeta...",
	"delete_filedy" => "Borrar",
	"settings_savedy" => "Guardar",
	"settings_usernamedy" => "Nombre de usuario",
	"settings_passworddy" => "Contraseña",
	"settings_emaildy" => "Dirección de correo electrónico (dejar en blanco para desactivar)",
	"settings_languagedy" => "elegido como idioma",
	"settings_alertdy" => "Su configuración se aplicará después de una recarga.",
	"settings_hint" => "Por favor, mantenga su nombre de usuario y contraseña en secreto!",
	"usefuldy" => "Útil",
	"aysywddy1" => "¿Seguro que tienes el archivo",
	"aysywddy2" => "quieres borrar?",
	"infody" => "Info",
	"helpurl" => "/",
	"helpurldoc" => "/",
	"settings_choose" => "elegido como el color de acento",
	"settings_choose_nav" => "seleccionado como color del menú",
	"settings_white" => "Blanco",
	"settings_black" => "Negro",
	"settings_lightblue" => "La luz azul",
	"settings_blue" => "Azul",
	"settings_green" => "Verde",
	"settings_yellow" => "Amarillo",
	"settings_red" => "Rojo",
	"settings_lightblue_striped" => "Rayas azul claro",
	"settings_blue_striped" => "Azul a rayas",
	"settings_green_striped" => "Verde a rayas",
	"settings_yellow_striped" => "Amarillo rayado",
	"settings_red_striped" => "Rayas rojas",
	"settings_nav_white" => "Blanco",
	"settings_nav_black" => "Negro",
	"public_modedy" => "En público",
	"private_modedy" => "Modo privado",
	"login_username_plho" => "Nombre de usuario...",
	"login_password_plho" => "Contraseña...",
	"currently_private" => "Tus datos están protegidos.",
	"currently_public" => "Sus datos están disponibles públicamente.",
	"ueber_menu" => "Sobre",
	"ueber_close" => "Cerca",
	"ueber_title" => "Sobre DropYet",
	"security_close" => "Aceptar & Cerrar",
	"security_menu" => "Seguridad",
	"security_pone" => "La URL donde usa DropYet es  ",
	"security_ssl" => "una encriptación SSL.",
	"security_nossl" => "sin cifrado SSL.",
	"security_title" => "Seguridad & Codificación",
	"about_by" => "de",
	"about_under" => "por debajo",
	"about_license" => "Licencia",
	"about_see" => "ver aquí",
	"contactdy" => "Contacto",
	"security_recommendation" => "No se recomienda utilizar DropYet para almacenar datos altamente confidenciales.",
	"security_sslrec" => "¡Se recomienda usar DropYet solo con conexión encriptada SSL! Si es necesario, contáctese con su proveedor de servicios de Internet.",
	"ssl_info" => "Info",
	"about_document" => "Ayuda e instrucciones",
	"about_web" => "Sitio web",
	"about_form" => "Contacto",
	"logprv_title" => "Modo privado de registro de acceso",
	"logplc_title" => "Modo de registro de acceso público",
	"log_close" => "Cerca",
	"log_menu" => "Rastros de acceso",
	"settings_morelang" => "¡Más idiomas con tu ayuda!",
	"about_ty" => "Muchas gracias a:",
	"about_mm" => "Y muchos más ...",
	"about_dhm" => "No soy un profesional o un traductor.",
	"license" => "Licencia",
	"timeform" => "Formato de fecha y hora",
	"tformger" => "Alemán (24.12.2016 18:00:00)",
	"tformeng" => "Inglés (12/24/2016 06:00:00 pm)",
	"tformchi" => "Chino (2016年12月24日 06点00分00秒 pm)",
	"tformes" => "Español (24-12-2016 18:00:00)",
	"clearlog" => "Registro vacío",
	"comp" => "¡Hay un problema de compatibilidad con su navegador! Debe cambiar su navegador para hacer un uso razonable de DropYet.",
	"comp_title" => "Compatibilidad",
	"comp_old" => "¡Hay un problema de compatibilidad con su navegador! ¡Está desactualizado y debe actualizarse con urgencia!",
	"cn_trans" => "Y un traductor chino anónimo",
	"size_all" => "Tamaño total en",
	"size_files" => "archivos",
	"and" => "y",
	"size_dirs" => "directorios",
	"tform" => "elegido como formato de tiempo",
	"langdeu" => "Alemán",
	"langeng" => "Inglés",
	"langchi" => "Chino",
	"langes" => "Español",
	"log_subject" => "DropYet Log enviado por correo electrónico",
	"log_message" => "Con este correo electrónico, recibirá su registro de DropYet como un archivo adjunto.",
	"log_send_btn" => "Enviar registro por correo electrónico",
	"log_mailsent" => "El registro ha sido enviado a su correo electrónico.",
	"log_mailfailed" => "¡El envío falló!",
	"percent_private" => "en privado",
	"percent_public" => "en público",
	"pw_warn_short" => "¡Tu contraseña es demasiado corta! Deberías usar uno más largo.",
	"pw_warn_enough" => "Tu contraseña es lo suficientemente larga Sin embargo, se recomienda usar uno más largo.",
	"pw_warn_middle" => "Su contraseña tiene una longitud media",
	"pw_warn_good" => "Tu contraseña es buena.",
	"pw_warn_vgood" => "¡Tu contraseña tiene una longitud muy buena!",
	"pw_warn_wow" => "Wow! ¿Cómo puede recordar su contraseña de esta longitud?",
	"pw_warn_title" => "Verificación de contraseña detallada",
	"pw_warn_nospecial" => "¡No se encontraron caracteres especiales en la contraseña!",
	"pw_warn_special" => "Caracteres especiales encontrados en la contraseña",
	"pw_warn_nobig" => "¡No se encontraron letras mayúsculas en la contraseña!",
	"pw_warn_capital" => "Mayúsculas encontradas en la contraseña",
	"pw_warn_nosmall" => "¡No se encontraron letras minúsculas en la contraseña!",
	"pw_warn_normal" => "Letras minúsculas encontradas en la contraseña",
	"pw_warn_nonums" => "¡No se encontraron números en la contraseña!",
	"pw_warn_nums" => "Números encontrados en la contraseña",
	"pw_warn_nouser" => "Tu nombre de usuario no se encontró en la contraseña",
	"pw_warn_user" => "¡Tu nombre de usuario fue encontrado en la contraseña!",
	"pw_warn_info" => "DropYet analiza su contraseña para la seguridad en términos de longitud y caracteres. Si la descripción general se ilumina en verde para usted, tiene una contraseña bastante segura. Amarillo significa que debe cambiar algo si es posible. Rojo significa que debe hacer algo al respecto si desea usar DropYet de forma segura.",
	"js_url" => "js/bootstrap-filestylees.min.js",
	"comp_ff" => "Parece que estás usando Firefox. Lamentablemente, Firefox actualmente no admite todas las funciones que necesitamos usar. DropYet se está ejecutando actualmente en un modo de compatibilidad. Sin embargo, debe cambiar su navegador para evitar errores de visualización.",
	"comp_edge" => "Parece que actualmente está utilizando Microsoft Edge Browser. Desafortunadamente, Edge no representa correctamente algunos sitios web, por lo que se recomienda cambiar su navegador.",
	"chng_paswod_chck" => "Cambiar contraseña?",
	"gone_pw_chck" => "Desde la versión 2.4.4.1, DropYet usa un cifrado SHA512 para disfrazar su contraseña. Con el conocimiento apropiado, también se pueden descifrar contraseñas simples. ¡Asegúrate de tener una contraseña segura, larga y única!",
	"log_deac_btn" => "Correo desactivado",
	"encrypto" => "Cifrado de archivos",
	"bg_none" => "Sin antecedentes",
	"bgnone" => "Nada",
	"bgdy" => "establecer como fondo de inicio de sesión",
	"bg1" => "Arquitectura",
	"bg2" => "Puesta de sol",
	"bg3" => "Cristales",
	"bg4" => "Bosque",
	"bg5" => "Nubes de montañas",
	"bg6" => "Debajo del mar",
	"bg7" => "Isla",
	"bg8" => "Nubes al atardecer",
	"bg9" => "Mosaico",
	"bg10" => "Polvo",
	"bgrandom" => "Unsplash Imagen aleatoria",
	"currinst" => "Inst.:",
	"latestver" => "Último:",
	"evcwarn" => "Problema de actualización",
	"settmailtitle" => "Sus configuraciones de DropYet fueron cambiadas",
	"settmailmsg" => "Su configuración de DropYet ha cambiado recientemente. Si no fue usted, compruebe si su contraseña ha sido modificada. Si ya no puede iniciar sesión en su DropYet, intente proteger sus datos y vuelva a instalar su DropYet.",
	"dyupdate" => "Hacer la actualización",
	"evctitle" => "Error al reconocer la última versión de DropYet",
	"evctext" => "DropYet no puede determinar la última versión de DropYet. Posiblemente su DropYet no se puede conectar a los servidores DropYet. Si esta advertencia permanece permanente, busque actualizaciones manualmente en <a target=\"_blank\" href=\"https://dropyet.maximiliansixdorf.de/en\">el sitio web DropYet</a>.",
	"menuenc" => "Cifrado",
	"axcrypt" => "AxCrypt",
	"newver" => "¡Actualización disponible!",
	"updone" => "Para DropYet ahora hay una versión",
	"updtwo" => "como una actualización disponible. ¿Quieres actualizar ahora?",
	"updnow" => "Actualiza ahora",
	"updlater" => "Actualiza más tarde",
	"updno" => "Ninguna actualización",
	"log_setting" => "Iniciar sesión",
	"log_activated" => "activado",
	"log_deactivated" => "desactivado",
	"log_state" => "El registro es",
	"log_enable" => "Activar registro",
	"log_disable" => "Desactivar registro",
	
);

/***************************************************************************/
/*   CSS FOR TWEAKING THE DESIGN                                           */
/***************************************************************************/


function css()
{
?>
<link href="css/bootstrap.css"rel="stylesheet">
<link href="css/navbar.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

<?php
}

/***************************************************************************/
/*   IMAGE CODES IN BASE64                                                 */
/*   You can generate your own with a converter                            */
/*   Like here: http://www.motobit.com/util/base64-decoder-encoder.asp     */
/*   Or here: http://www.greywyvern.com/code/php/binary2base64             */
/*   Or just use PHP base64_encode() function                              */
/***************************************************************************/


$_IMAGES = array();

$_IMAGES["arrow_down"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAALJ2lUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6cGhvdG9z
aG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOnhtcD0i
aHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMu
YWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5j
b20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgIHhtbG5zOmRjPSJodHRwOi8vcHVy
bC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0iaHR0cDovL2lw
dGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBsdXNfMV89Imh0
dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgIHBob3Rvc2hvcDpIZWFkbGluZT0i
VXNlciBpbnRlcmZhY2UgbWFrZSB1cCIKICAgeG1wUmlnaHRzOk1hcmtlZD0iVHJ1ZSIKICAgeG1w
Ok1ldGFkYXRhRGF0ZT0iMjAxMS0wMS0yNVQxMzo1NToxNSswMTowMCIKICAgeG1wTU06SW5zdGFu
Y2VJRD0ieG1wLmlpZDpEQTREQ0Y1QTgyMjhFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgeG1wTU06
RG9jdW1lbnRJRD0ieG1wLmRpZDozNzkwMzFENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAg
eG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjM3OTAzMUQ1RTAyN0UwMTE5ODlDQzBB
MUFEMDJCNUMyIj4KICAgPHhtcFJpZ2h0czpVc2FnZVRlcm1zPgogICAgPHJkZjpBbHQ+CiAgICAg
PHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9u
LU5vbkNvbW1lcmNpYWwgbGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L3htcFJp
Z2h0czpVc2FnZVRlcm1zPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxy
ZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJzYXZlZCIKICAgICAgc3RFdnQ6aW5zdGFuY2VJRD0i
eG1wLmlpZDozNzkwMzFENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgICAgc3RFdnQ6d2hl
bj0iMjAxMS0wMS0yNFQxODozOTowMiswMTowMCIKICAgICAgc3RFdnQ6Y2hhbmdlZD0iL21ldGFk
YXRhIi8+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2
dDppbnN0YW5jZUlEPSJ4bXAuaWlkOkRBNERDRjVBODIyOEUwMTE5ODlDQzBBMUFEMDJCNUMyIgog
ICAgICBzdEV2dDp3aGVuPSIyMDExLTAxLTI1VDEzOjU1OjE1KzAxOjAwIgogICAgICBzdEV2dDpj
aGFuZ2VkPSIvbWV0YWRhdGEiLz4KICAgIDwvcmRmOlNlcT4KICAgPC94bXBNTTpIaXN0b3J5Pgog
ICA8ZGM6Y3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGk+R2VudGxlZmFjZSBjdXN0
b20gdG9vbGJhciBpY29ucyBkZXNpZ248L3JkZjpsaT4KICAgIDwvcmRmOlNlcT4KICAgPC9kYzpj
cmVhdG9yPgogICA8ZGM6ZGVzY3JpcHRpb24+CiAgICA8cmRmOkFsdD4KICAgICA8cmRmOmxpIHht
bDpsYW5nPSJ4LWRlZmF1bHQiPldpcmVmcmFtZSBtb25vIHRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgIDwvcmRmOkFsdD4KICAgPC9kYzpkZXNjcmlwdGlvbj4KICAgPGRjOnN1YmplY3Q+CiAgICA8
cmRmOkJhZz4KICAgICA8cmRmOmxpPmN1c3RvbSBpY29uIGRlc2lnbjwvcmRmOmxpPgogICAgIDxy
ZGY6bGk+dG9vbGJhciBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+Y3VzdG9tIGljb25zPC9y
ZGY6bGk+CiAgICAgPHJkZjpsaT5pbnRlcmZhY2UgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjps
aT51aSBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPmd1aSBkZXNpZ248L3JkZjpsaT4KICAg
ICA8cmRmOmxpPnRhc2tiYXIgaWNvbnM8L3JkZjpsaT4KICAgIDwvcmRmOkJhZz4KICAgPC9kYzpz
dWJqZWN0PgogICA8ZGM6cmlnaHRzPgogICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFu
Zz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uLU5vbkNvbW1lcmNpYWwg
bGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L2RjOnJpZ2h0cz4KICAgPElwdGM0
eG1wQ29yZTpDcmVhdG9yQ29udGFjdEluZm8KICAgIElwdGM0eG1wQ29yZTpDaVVybFdvcms9Imh0
dHA6Ly93d3cuZ2VudGxlZmFjZS5jb20iLz4KICAgPHBsdXNfMV86SW1hZ2VDcmVhdG9yPgogICAg
PHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBwbHVzXzFfOkltYWdlQ3JlYXRvck5hbWU9Imdl
bnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpJbWFnZUNyZWF0b3I+
CiAgIDxwbHVzXzFfOkNvcHlyaWdodE93bmVyPgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQog
ICAgICBwbHVzXzFfOkNvcHlyaWdodE93bmVyTmFtZT0iZ2VudGxlZmFjZS5jb20iLz4KICAgIDwv
cmRmOlNlcT4KICAgPC9wbHVzXzFfOkNvcHlyaWdodE93bmVyPgogIDwvcmRmOkRlc2NyaXB0aW9u
PgogPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KPD94cGFja2V0IGVuZD0iciI/PltFw1gAAAAZdEVY
dFNvZnR3YXJlAEFkb2JlIEltYWdlUmVhZHlxyWU8AAAAPHRFWHRBTFRUYWcAVGhpcyBpcyB0aGUg
aWNvbiBmcm9tIEdlbnRsZWZhY2UuY29tIGZyZWUgaWNvbnMgc2V0LiDYa+jEAAAARHRFWHRDb3B5
cmlnaHQAQ3JlYXRpdmUgQ29tbW9ucyBBdHRyaWJ1dGlvbiBOb24tQ29tbWVyY2lhbCBObyBEZXJp
dmF0aXZlc3vdsKAAAABFaVRYdERlc2NyaXB0aW9uAAAAAABUaGlzIGlzIHRoZSBpY29uIGZyb20g
R2VudGxlZmFjZS5jb20gZnJlZSBpY29ucyBzZXQuILwR+BoAAABIaVRYdENvcHlyaWdodAAAAAAA
Q3JlYXRpdmUgQ29tbW9ucyBBdHRyaWJ1dGlvbiBOb24tQ29tbWVyY2lhbCBObyBEZXJpdmF0aXZl
c1iCywUAAAENSURBVHja7FOxioNAEHUVQawGVDgQIWJjpX5C7FLmPuG+TFKmyv2Bn6D4Ax6IlRZb
HiqaGU9lCSEhbbiFB8+d92ZnZl1J+l8sDMM9YyxFno/jGBdFwR8ZgiAAWZZJH03TFCumaSZo3CE+
EAfDMM5t2/7eM/u+D2hKURchJPLJfd+fuq6TCMijYRhSz/Pg1kx7FCONoD8xCrque8RsCdLVOLdT
VdXcjuM4W9lLnOP3V1mW32w9wbZtKisVknDqcR7U34xAMMd1XedzTCzTsiwazCZGzpcEmxl53DRN
vt3Cba8AQAO9COWuK8eTPznnP0/vVtd10DQtQ0wLMtp76QdRVRUURbkQiL/xW7gKMACHNoe9lYld
KQAAAABJRU5ErkJggg==";
$_IMAGES["arrow_up"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAALJ2lUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6cGhvdG9z
aG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOnhtcD0i
aHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMu
YWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5j
b20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgIHhtbG5zOmRjPSJodHRwOi8vcHVy
bC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0iaHR0cDovL2lw
dGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBsdXNfMV89Imh0
dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgIHBob3Rvc2hvcDpIZWFkbGluZT0i
VXNlciBpbnRlcmZhY2UgbWFrZSB1cCIKICAgeG1wUmlnaHRzOk1hcmtlZD0iVHJ1ZSIKICAgeG1w
Ok1ldGFkYXRhRGF0ZT0iMjAxMS0wMS0yNVQxMzo1NToxNSswMTowMCIKICAgeG1wTU06SW5zdGFu
Y2VJRD0ieG1wLmlpZDo5NUY2Qzk1QTgyMjhFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgeG1wTU06
RG9jdW1lbnRJRD0ieG1wLmRpZDowMUE1MjdENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAg
eG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjAxQTUyN0Q1RTAyN0UwMTE5ODlDQzBB
MUFEMDJCNUMyIj4KICAgPHhtcFJpZ2h0czpVc2FnZVRlcm1zPgogICAgPHJkZjpBbHQ+CiAgICAg
PHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9u
LU5vbkNvbW1lcmNpYWwgbGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L3htcFJp
Z2h0czpVc2FnZVRlcm1zPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxy
ZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJzYXZlZCIKICAgICAgc3RFdnQ6aW5zdGFuY2VJRD0i
eG1wLmlpZDowMUE1MjdENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgICAgc3RFdnQ6d2hl
bj0iMjAxMS0wMS0yNFQxODozOTowMiswMTowMCIKICAgICAgc3RFdnQ6Y2hhbmdlZD0iL21ldGFk
YXRhIi8+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2
dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjk1RjZDOTVBODIyOEUwMTE5ODlDQzBBMUFEMDJCNUMyIgog
ICAgICBzdEV2dDp3aGVuPSIyMDExLTAxLTI1VDEzOjU1OjE1KzAxOjAwIgogICAgICBzdEV2dDpj
aGFuZ2VkPSIvbWV0YWRhdGEiLz4KICAgIDwvcmRmOlNlcT4KICAgPC94bXBNTTpIaXN0b3J5Pgog
ICA8ZGM6Y3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGk+R2VudGxlZmFjZSBjdXN0
b20gdG9vbGJhciBpY29ucyBkZXNpZ248L3JkZjpsaT4KICAgIDwvcmRmOlNlcT4KICAgPC9kYzpj
cmVhdG9yPgogICA8ZGM6ZGVzY3JpcHRpb24+CiAgICA8cmRmOkFsdD4KICAgICA8cmRmOmxpIHht
bDpsYW5nPSJ4LWRlZmF1bHQiPldpcmVmcmFtZSBtb25vIHRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgIDwvcmRmOkFsdD4KICAgPC9kYzpkZXNjcmlwdGlvbj4KICAgPGRjOnN1YmplY3Q+CiAgICA8
cmRmOkJhZz4KICAgICA8cmRmOmxpPmN1c3RvbSBpY29uIGRlc2lnbjwvcmRmOmxpPgogICAgIDxy
ZGY6bGk+dG9vbGJhciBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+Y3VzdG9tIGljb25zPC9y
ZGY6bGk+CiAgICAgPHJkZjpsaT5pbnRlcmZhY2UgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjps
aT51aSBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPmd1aSBkZXNpZ248L3JkZjpsaT4KICAg
ICA8cmRmOmxpPnRhc2tiYXIgaWNvbnM8L3JkZjpsaT4KICAgIDwvcmRmOkJhZz4KICAgPC9kYzpz
dWJqZWN0PgogICA8ZGM6cmlnaHRzPgogICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFu
Zz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uLU5vbkNvbW1lcmNpYWwg
bGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L2RjOnJpZ2h0cz4KICAgPElwdGM0
eG1wQ29yZTpDcmVhdG9yQ29udGFjdEluZm8KICAgIElwdGM0eG1wQ29yZTpDaVVybFdvcms9Imh0
dHA6Ly93d3cuZ2VudGxlZmFjZS5jb20iLz4KICAgPHBsdXNfMV86SW1hZ2VDcmVhdG9yPgogICAg
PHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBwbHVzXzFfOkltYWdlQ3JlYXRvck5hbWU9Imdl
bnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpJbWFnZUNyZWF0b3I+
CiAgIDxwbHVzXzFfOkNvcHlyaWdodE93bmVyPgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQog
ICAgICBwbHVzXzFfOkNvcHlyaWdodE93bmVyTmFtZT0iZ2VudGxlZmFjZS5jb20iLz4KICAgIDwv
cmRmOlNlcT4KICAgPC9wbHVzXzFfOkNvcHlyaWdodE93bmVyPgogIDwvcmRmOkRlc2NyaXB0aW9u
PgogPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KPD94cGFja2V0IGVuZD0iciI/PiZC9FsAAAAZdEVY
dFNvZnR3YXJlAEFkb2JlIEltYWdlUmVhZHlxyWU8AAAAPHRFWHRBTFRUYWcAVGhpcyBpcyB0aGUg
aWNvbiBmcm9tIEdlbnRsZWZhY2UuY29tIGZyZWUgaWNvbnMgc2V0LiDYa+jEAAAARHRFWHRDb3B5
cmlnaHQAQ3JlYXRpdmUgQ29tbW9ucyBBdHRyaWJ1dGlvbiBOb24tQ29tbWVyY2lhbCBObyBEZXJp
dmF0aXZlc3vdsKAAAABFaVRYdERlc2NyaXB0aW9uAAAAAABUaGlzIGlzIHRoZSBpY29uIGZyb20g
R2VudGxlZmFjZS5jb20gZnJlZSBpY29ucyBzZXQuILwR+BoAAABIaVRYdENvcHlyaWdodAAAAAAA
Q3JlYXRpdmUgQ29tbW9ucyBBdHRyaWJ1dGlvbiBOb24tQ29tbWVyY2lhbCBObyBEZXJpdmF0aXZl
c1iCywUAAADxSURBVHjaYmAY8oARl4SBgYEAIyPjfBD7////iRcuXPhAtAFaWloCTExM+0HmQIUu
/Pv3z/HatWsfCBqgoqKiANS8Hmi7AbI40BUgQwLv3LnzAKcB8vLyBlCbBaBCMBvhfJBLHj58eAHD
AElJSQzNQL4jiAHUtB/dkOfPn1+AGyAiIhIACjAghim6ANL84sULsAskJCQEoIYYQL3zARSwb968
2cDIz8+fAAttZM3v3r1DCTAhISEUQ2Cxw8jFxQUSdEDW/OXLF6xRxsPDg27IAQZWVlYHFhaW/0D6
PBsbmwChhANSA1IL1ePAMAoYAAIMAFzGZycsX6uqAAAAAElFTkSuQmCC";
$_IMAGES["del"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAKBmlUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOmRjPSJo
dHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0i
aHR0cDovL2lwdGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBs
dXNfMV89Imh0dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgICB4bWxuczp4bXA9
Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25z
LmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUu
Y29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgIHhtcFJpZ2h0czpNYXJrZWQ9IlRy
dWUiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMTEtMDEtMjVUMTM6NTU6MTMrMDE6MDAiCiAgIHht
cE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6QkQ3MkM5NTk4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIi
CiAgIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6QkQ3MkM5NTk4MjI4RTAxMTk4OUNDMEExQUQw
MkI1QzIiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpCRDcyQzk1OTgyMjhF
MDExOTg5Q0MwQTFBRDAyQjVDMiI+CiAgIDx4bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgIDxyZGY6
QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9ucyBB
dHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFsdD4K
ICAgPC94bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgPGRjOmNyZWF0b3I+CiAgICA8cmRmOlNlcT4K
ICAgICA8cmRmOmxpPkdlbnRsZWZhY2UgY3VzdG9tIHRvb2xiYXIgaWNvbnMgZGVzaWduPC9yZGY6
bGk+CiAgICA8L3JkZjpTZXE+CiAgIDwvZGM6Y3JlYXRvcj4KICAgPGRjOmRlc2NyaXB0aW9uPgog
ICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5XaXJlZnJhbWUg
bW9ubyB0b29sYmFyIGljb25zPC9yZGY6bGk+CiAgICA8L3JkZjpBbHQ+CiAgIDwvZGM6ZGVzY3Jp
cHRpb24+CiAgIDxkYzpzdWJqZWN0PgogICAgPHJkZjpCYWc+CiAgICAgPHJkZjpsaT5jdXN0b20g
aWNvbiBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPnRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgICA8cmRmOmxpPmN1c3RvbSBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+aW50ZXJmYWNl
IGRlc2lnbjwvcmRmOmxpPgogICAgIDxyZGY6bGk+dWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJk
ZjpsaT5ndWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjpsaT50YXNrYmFyIGljb25zPC9yZGY6
bGk+CiAgICA8L3JkZjpCYWc+CiAgIDwvZGM6c3ViamVjdD4KICAgPGRjOnJpZ2h0cz4KICAgIDxy
ZGY6QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9u
cyBBdHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFs
dD4KICAgPC9kYzpyaWdodHM+CiAgIDxJcHRjNHhtcENvcmU6Q3JlYXRvckNvbnRhY3RJbmZvCiAg
ICBJcHRjNHhtcENvcmU6Q2lVcmxXb3JrPSJodHRwOi8vd3d3LmdlbnRsZWZhY2UuY29tIi8+CiAg
IDxwbHVzXzFfOkltYWdlQ3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAg
cGx1c18xXzpJbWFnZUNyZWF0b3JOYW1lPSJnZW50bGVmYWNlLmNvbSIvPgogICAgPC9yZGY6U2Vx
PgogICA8L3BsdXNfMV86SW1hZ2VDcmVhdG9yPgogICA8cGx1c18xXzpDb3B5cmlnaHRPd25lcj4K
ICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgcGx1c18xXzpDb3B5cmlnaHRPd25lck5h
bWU9ImdlbnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpDb3B5cmln
aHRPd25lcj4KICAgPHhtcE1NOkhpc3Rvcnk+CiAgICA8cmRmOlNlcT4KICAgICA8cmRmOmxpCiAg
ICAgIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiCiAgICAgIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6
QkQ3MkM5NTk4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIiCiAgICAgIHN0RXZ0OndoZW49IjIwMTEt
MDEtMjVUMTM6NTU6MTMrMDE6MDAiCiAgICAgIHN0RXZ0OmNoYW5nZWQ9Ii9tZXRhZGF0YSIvPgog
ICAgPC9yZGY6U2VxPgogICA8L3htcE1NOkhpc3Rvcnk+CiAgPC9yZGY6RGVzY3JpcHRpb24+CiA8
L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+mb/f/AAAABl0RVh0U29m
dHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAA8dEVYdEFMVFRhZwBUaGlzIGlzIHRoZSBpY29u
IGZyb20gR2VudGxlZmFjZS5jb20gZnJlZSBpY29ucyBzZXQuINhr6MQAAABEdEVYdENvcHlyaWdo
dABDcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRp
dmVze92woAAAAEVpVFh0RGVzY3JpcHRpb24AAAAAAFRoaXMgaXMgdGhlIGljb24gZnJvbSBHZW50
bGVmYWNlLmNvbSBmcmVlIGljb25zIHNldC4gvBH4GgAAAEhpVFh0Q29weXJpZ2h0AAAAAABDcmVh
dGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRpdmVzWILL
BQAAAU9JREFUeNqkk1Fqg0AQhtWqmBdZH4T4IjQQqYLgEdK39hbxRO0N9AbtDXIERR98EQz4Ivjg
XiCxs9us6KqhoQM/zs7Mfju7g4LwTxOZE4CJongC99z3/WuappgvHtV8J0kSDgDf92kChMgaACmB
5Hk+QBZq4izLQgrwPK9jCWYMUhQFdl13snlU8ykR53q9ni+XizAWxALQyXGcA/mC0ELN7xX2+z0C
Grlb8MD7xWVZhsMj7na7RyBxVVXhZArEbNv+CySu6zqcjZGZZVmH26hmBnAMem6aBi8CTNNkc0Z3
OqDTadsWTwCGYSyOaqUTCum6DlOAruv3TsYrcQp5Ip4sywUsyAMKnGJIv8O838DfcrktxF8oStO0
CNRzithRm80GwTrhayB+HPpRFCUC9TdFfL+qqiKIJ6Oa4/zXFMUPorXHkyQJQf4LvsPmHwEGAKSv
3ZK89rTGAAAAAElFTkSuQmCC";


$_IMAGES["archive"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAALJ2lUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6cGhvdG9z
aG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOnhtcD0i
aHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMu
YWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5j
b20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgIHhtbG5zOmRjPSJodHRwOi8vcHVy
bC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0iaHR0cDovL2lw
dGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBsdXNfMV89Imh0
dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgIHBob3Rvc2hvcDpIZWFkbGluZT0i
VXNlciBpbnRlcmZhY2UgbWFrZSB1cCIKICAgeG1wUmlnaHRzOk1hcmtlZD0iVHJ1ZSIKICAgeG1w
Ok1ldGFkYXRhRGF0ZT0iMjAxMS0wMS0yNVQxMzo1NToxNSswMTowMCIKICAgeG1wTU06SW5zdGFu
Y2VJRD0ieG1wLmlpZDoxQUFGQjM1QTgyMjhFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgeG1wTU06
RG9jdW1lbnRJRD0ieG1wLmRpZDo2QkRFMDJENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAg
eG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjZCREUwMkQ1RTAyN0UwMTE5ODlDQzBB
MUFEMDJCNUMyIj4KICAgPHhtcFJpZ2h0czpVc2FnZVRlcm1zPgogICAgPHJkZjpBbHQ+CiAgICAg
PHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9u
LU5vbkNvbW1lcmNpYWwgbGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L3htcFJp
Z2h0czpVc2FnZVRlcm1zPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxy
ZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJzYXZlZCIKICAgICAgc3RFdnQ6aW5zdGFuY2VJRD0i
eG1wLmlpZDo2QkRFMDJENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgICAgc3RFdnQ6d2hl
bj0iMjAxMS0wMS0yNFQxODozOTowMiswMTowMCIKICAgICAgc3RFdnQ6Y2hhbmdlZD0iL21ldGFk
YXRhIi8+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2
dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjFBQUZCMzVBODIyOEUwMTE5ODlDQzBBMUFEMDJCNUMyIgog
ICAgICBzdEV2dDp3aGVuPSIyMDExLTAxLTI1VDEzOjU1OjE1KzAxOjAwIgogICAgICBzdEV2dDpj
aGFuZ2VkPSIvbWV0YWRhdGEiLz4KICAgIDwvcmRmOlNlcT4KICAgPC94bXBNTTpIaXN0b3J5Pgog
ICA8ZGM6Y3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGk+R2VudGxlZmFjZSBjdXN0
b20gdG9vbGJhciBpY29ucyBkZXNpZ248L3JkZjpsaT4KICAgIDwvcmRmOlNlcT4KICAgPC9kYzpj
cmVhdG9yPgogICA8ZGM6ZGVzY3JpcHRpb24+CiAgICA8cmRmOkFsdD4KICAgICA8cmRmOmxpIHht
bDpsYW5nPSJ4LWRlZmF1bHQiPldpcmVmcmFtZSBtb25vIHRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgIDwvcmRmOkFsdD4KICAgPC9kYzpkZXNjcmlwdGlvbj4KICAgPGRjOnN1YmplY3Q+CiAgICA8
cmRmOkJhZz4KICAgICA8cmRmOmxpPmN1c3RvbSBpY29uIGRlc2lnbjwvcmRmOmxpPgogICAgIDxy
ZGY6bGk+dG9vbGJhciBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+Y3VzdG9tIGljb25zPC9y
ZGY6bGk+CiAgICAgPHJkZjpsaT5pbnRlcmZhY2UgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjps
aT51aSBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPmd1aSBkZXNpZ248L3JkZjpsaT4KICAg
ICA8cmRmOmxpPnRhc2tiYXIgaWNvbnM8L3JkZjpsaT4KICAgIDwvcmRmOkJhZz4KICAgPC9kYzpz
dWJqZWN0PgogICA8ZGM6cmlnaHRzPgogICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFu
Zz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uLU5vbkNvbW1lcmNpYWwg
bGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L2RjOnJpZ2h0cz4KICAgPElwdGM0
eG1wQ29yZTpDcmVhdG9yQ29udGFjdEluZm8KICAgIElwdGM0eG1wQ29yZTpDaVVybFdvcms9Imh0
dHA6Ly93d3cuZ2VudGxlZmFjZS5jb20iLz4KICAgPHBsdXNfMV86SW1hZ2VDcmVhdG9yPgogICAg
PHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBwbHVzXzFfOkltYWdlQ3JlYXRvck5hbWU9Imdl
bnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpJbWFnZUNyZWF0b3I+
CiAgIDxwbHVzXzFfOkNvcHlyaWdodE93bmVyPgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQog
ICAgICBwbHVzXzFfOkNvcHlyaWdodE93bmVyTmFtZT0iZ2VudGxlZmFjZS5jb20iLz4KICAgIDwv
cmRmOlNlcT4KICAgPC9wbHVzXzFfOkNvcHlyaWdodE93bmVyPgogIDwvcmRmOkRlc2NyaXB0aW9u
PgogPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KPD94cGFja2V0IGVuZD0iciI/PpUOaa0AAAAZdEVY
dFNvZnR3YXJlAEFkb2JlIEltYWdlUmVhZHlxyWU8AAAAPHRFWHRBTFRUYWcAVGhpcyBpcyB0aGUg
aWNvbiBmcm9tIEdlbnRsZWZhY2UuY29tIGZyZWUgaWNvbnMgc2V0LiDYa+jEAAAARHRFWHRDb3B5
cmlnaHQAQ3JlYXRpdmUgQ29tbW9ucyBBdHRyaWJ1dGlvbiBOb24tQ29tbWVyY2lhbCBObyBEZXJp
dmF0aXZlc3vdsKAAAABFaVRYdERlc2NyaXB0aW9uAAAAAABUaGlzIGlzIHRoZSBpY29uIGZyb20g
R2VudGxlZmFjZS5jb20gZnJlZSBpY29ucyBzZXQuILwR+BoAAABIaVRYdENvcHlyaWdodAAAAAAA
Q3JlYXRpdmUgQ29tbW9ucyBBdHRyaWJ1dGlvbiBOb24tQ29tbWVyY2lhbCBObyBEZXJpdmF0aXZl
c1iCywUAAACzSURBVHjaxFLRDcIgEL2LDIAT2JDwR2LZoJtpN3EiHMEVHAA475JWiSmmLR++hBy8
cC/w3iEU8N5rRHzwVsMyniGEY0mo8kBEkHOuNcMP4Q+ccyRrLa++iRjjonCNR2vtlesF9mFEYwxB
A1RK6a3GBt64dmIWp9FP/GnigLmhKsAJSPOdL+k5kU0v4IZhbt70hcLdrtWDc6uAbhJgD3r24A8v
qI3oWhxkPiRCyX3HGl8CDAAOjXY7XjCfXwAAAABJRU5ErkJggg==";
$_IMAGES["audio"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAKBmlUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOmRjPSJo
dHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0i
aHR0cDovL2lwdGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBs
dXNfMV89Imh0dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgICB4bWxuczp4bXA9
Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25z
LmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUu
Y29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgIHhtcFJpZ2h0czpNYXJrZWQ9IlRy
dWUiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMTEtMDEtMjVUMTM6NTU6MTArMDE6MDAiCiAgIHht
cE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6N0MwNkVGNTc4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIi
CiAgIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6N0MwNkVGNTc4MjI4RTAxMTk4OUNDMEExQUQw
MkI1QzIiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo3QzA2RUY1NzgyMjhF
MDExOTg5Q0MwQTFBRDAyQjVDMiI+CiAgIDx4bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgIDxyZGY6
QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9ucyBB
dHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFsdD4K
ICAgPC94bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgPGRjOmNyZWF0b3I+CiAgICA8cmRmOlNlcT4K
ICAgICA8cmRmOmxpPkdlbnRsZWZhY2UgY3VzdG9tIHRvb2xiYXIgaWNvbnMgZGVzaWduPC9yZGY6
bGk+CiAgICA8L3JkZjpTZXE+CiAgIDwvZGM6Y3JlYXRvcj4KICAgPGRjOmRlc2NyaXB0aW9uPgog
ICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5XaXJlZnJhbWUg
bW9ubyB0b29sYmFyIGljb25zPC9yZGY6bGk+CiAgICA8L3JkZjpBbHQ+CiAgIDwvZGM6ZGVzY3Jp
cHRpb24+CiAgIDxkYzpzdWJqZWN0PgogICAgPHJkZjpCYWc+CiAgICAgPHJkZjpsaT5jdXN0b20g
aWNvbiBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPnRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgICA8cmRmOmxpPmN1c3RvbSBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+aW50ZXJmYWNl
IGRlc2lnbjwvcmRmOmxpPgogICAgIDxyZGY6bGk+dWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJk
ZjpsaT5ndWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjpsaT50YXNrYmFyIGljb25zPC9yZGY6
bGk+CiAgICA8L3JkZjpCYWc+CiAgIDwvZGM6c3ViamVjdD4KICAgPGRjOnJpZ2h0cz4KICAgIDxy
ZGY6QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9u
cyBBdHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFs
dD4KICAgPC9kYzpyaWdodHM+CiAgIDxJcHRjNHhtcENvcmU6Q3JlYXRvckNvbnRhY3RJbmZvCiAg
ICBJcHRjNHhtcENvcmU6Q2lVcmxXb3JrPSJodHRwOi8vd3d3LmdlbnRsZWZhY2UuY29tIi8+CiAg
IDxwbHVzXzFfOkltYWdlQ3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAg
cGx1c18xXzpJbWFnZUNyZWF0b3JOYW1lPSJnZW50bGVmYWNlLmNvbSIvPgogICAgPC9yZGY6U2Vx
PgogICA8L3BsdXNfMV86SW1hZ2VDcmVhdG9yPgogICA8cGx1c18xXzpDb3B5cmlnaHRPd25lcj4K
ICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgcGx1c18xXzpDb3B5cmlnaHRPd25lck5h
bWU9ImdlbnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpDb3B5cmln
aHRPd25lcj4KICAgPHhtcE1NOkhpc3Rvcnk+CiAgICA8cmRmOlNlcT4KICAgICA8cmRmOmxpCiAg
ICAgIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiCiAgICAgIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6
N0MwNkVGNTc4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIiCiAgICAgIHN0RXZ0OndoZW49IjIwMTEt
MDEtMjVUMTM6NTU6MTArMDE6MDAiCiAgICAgIHN0RXZ0OmNoYW5nZWQ9Ii9tZXRhZGF0YSIvPgog
ICAgPC9yZGY6U2VxPgogICA8L3htcE1NOkhpc3Rvcnk+CiAgPC9yZGY6RGVzY3JpcHRpb24+CiA8
L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+DhF/tQAAABl0RVh0U29m
dHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAA8dEVYdEFMVFRhZwBUaGlzIGlzIHRoZSBpY29u
IGZyb20gR2VudGxlZmFjZS5jb20gZnJlZSBpY29ucyBzZXQuINhr6MQAAABEdEVYdENvcHlyaWdo
dABDcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRp
dmVze92woAAAAEVpVFh0RGVzY3JpcHRpb24AAAAAAFRoaXMgaXMgdGhlIGljb24gZnJvbSBHZW50
bGVmYWNlLmNvbSBmcmVlIGljb25zIHNldC4gvBH4GgAAAEhpVFh0Q29weXJpZ2h0AAAAAABDcmVh
dGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRpdmVzWILL
BQAAAOhJREFUeNq8U8sNgzAMDZ8bEkJMwIEzcidoVugonaAjdJSOQEfgziGMQO9AeEFJVcIvVaVa
sqzYz/Zz4jD2o3hHACLiE9DzuHadP8+hnVAUBcHcVS5AiZRy8htry6JA3/cJDHcdYa2A7Wq0VmD0
gn1CWzBSjcpFga7rmJ7xVNd1tdU5z3O+y0AIUe1RNziXEb4rYEY4EoP7L4M0TdXNqz2hGYM4jmcB
vMAiGRhC1wdi2WwPoiiiYRjega2NA+ZmJ08FVAA2c53ZkjbcCqwwuOrtM2vegNGFBUGQQUvf96VW
gTO5/oVRgAEAQD9rR2JLf+oAAAAASUVORK5CYII=";
$_IMAGES["code"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAALJ2lUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6cGhvdG9z
aG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOnhtcD0i
aHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMu
YWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5j
b20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgIHhtbG5zOmRjPSJodHRwOi8vcHVy
bC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0iaHR0cDovL2lw
dGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBsdXNfMV89Imh0
dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgIHBob3Rvc2hvcDpIZWFkbGluZT0i
VXNlciBpbnRlcmZhY2UgbWFrZSB1cCIKICAgeG1wUmlnaHRzOk1hcmtlZD0iVHJ1ZSIKICAgeG1w
Ok1ldGFkYXRhRGF0ZT0iMjAxMS0wMS0yNVQxMzo1NToxNSswMTowMCIKICAgeG1wTU06SW5zdGFu
Y2VJRD0ieG1wLmlpZDo5MUY2Qzk1QTgyMjhFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgeG1wTU06
RG9jdW1lbnRJRD0ieG1wLmRpZDpGREE0MjdENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAg
eG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOkZEQTQyN0Q1RTAyN0UwMTE5ODlDQzBB
MUFEMDJCNUMyIj4KICAgPHhtcFJpZ2h0czpVc2FnZVRlcm1zPgogICAgPHJkZjpBbHQ+CiAgICAg
PHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9u
LU5vbkNvbW1lcmNpYWwgbGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L3htcFJp
Z2h0czpVc2FnZVRlcm1zPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxy
ZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJzYXZlZCIKICAgICAgc3RFdnQ6aW5zdGFuY2VJRD0i
eG1wLmlpZDpGREE0MjdENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgICAgc3RFdnQ6d2hl
bj0iMjAxMS0wMS0yNFQxODozOTowMiswMTowMCIKICAgICAgc3RFdnQ6Y2hhbmdlZD0iL21ldGFk
YXRhIi8+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2
dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjkxRjZDOTVBODIyOEUwMTE5ODlDQzBBMUFEMDJCNUMyIgog
ICAgICBzdEV2dDp3aGVuPSIyMDExLTAxLTI1VDEzOjU1OjE1KzAxOjAwIgogICAgICBzdEV2dDpj
aGFuZ2VkPSIvbWV0YWRhdGEiLz4KICAgIDwvcmRmOlNlcT4KICAgPC94bXBNTTpIaXN0b3J5Pgog
ICA8ZGM6Y3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGk+R2VudGxlZmFjZSBjdXN0
b20gdG9vbGJhciBpY29ucyBkZXNpZ248L3JkZjpsaT4KICAgIDwvcmRmOlNlcT4KICAgPC9kYzpj
cmVhdG9yPgogICA8ZGM6ZGVzY3JpcHRpb24+CiAgICA8cmRmOkFsdD4KICAgICA8cmRmOmxpIHht
bDpsYW5nPSJ4LWRlZmF1bHQiPldpcmVmcmFtZSBtb25vIHRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgIDwvcmRmOkFsdD4KICAgPC9kYzpkZXNjcmlwdGlvbj4KICAgPGRjOnN1YmplY3Q+CiAgICA8
cmRmOkJhZz4KICAgICA8cmRmOmxpPmN1c3RvbSBpY29uIGRlc2lnbjwvcmRmOmxpPgogICAgIDxy
ZGY6bGk+dG9vbGJhciBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+Y3VzdG9tIGljb25zPC9y
ZGY6bGk+CiAgICAgPHJkZjpsaT5pbnRlcmZhY2UgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjps
aT51aSBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPmd1aSBkZXNpZ248L3JkZjpsaT4KICAg
ICA8cmRmOmxpPnRhc2tiYXIgaWNvbnM8L3JkZjpsaT4KICAgIDwvcmRmOkJhZz4KICAgPC9kYzpz
dWJqZWN0PgogICA8ZGM6cmlnaHRzPgogICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFu
Zz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uLU5vbkNvbW1lcmNpYWwg
bGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L2RjOnJpZ2h0cz4KICAgPElwdGM0
eG1wQ29yZTpDcmVhdG9yQ29udGFjdEluZm8KICAgIElwdGM0eG1wQ29yZTpDaVVybFdvcms9Imh0
dHA6Ly93d3cuZ2VudGxlZmFjZS5jb20iLz4KICAgPHBsdXNfMV86SW1hZ2VDcmVhdG9yPgogICAg
PHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBwbHVzXzFfOkltYWdlQ3JlYXRvck5hbWU9Imdl
bnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpJbWFnZUNyZWF0b3I+
CiAgIDxwbHVzXzFfOkNvcHlyaWdodE93bmVyPgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQog
ICAgICBwbHVzXzFfOkNvcHlyaWdodE93bmVyTmFtZT0iZ2VudGxlZmFjZS5jb20iLz4KICAgIDwv
cmRmOlNlcT4KICAgPC9wbHVzXzFfOkNvcHlyaWdodE93bmVyPgogIDwvcmRmOkRlc2NyaXB0aW9u
PgogPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KPD94cGFja2V0IGVuZD0iciI/Pq/JY+YAAAAZdEVY
dFNvZnR3YXJlAEFkb2JlIEltYWdlUmVhZHlxyWU8AAAAPHRFWHRBTFRUYWcAVGhpcyBpcyB0aGUg
aWNvbiBmcm9tIEdlbnRsZWZhY2UuY29tIGZyZWUgaWNvbnMgc2V0LiDYa+jEAAAARHRFWHRDb3B5
cmlnaHQAQ3JlYXRpdmUgQ29tbW9ucyBBdHRyaWJ1dGlvbiBOb24tQ29tbWVyY2lhbCBObyBEZXJp
dmF0aXZlc3vdsKAAAABFaVRYdERlc2NyaXB0aW9uAAAAAABUaGlzIGlzIHRoZSBpY29uIGZyb20g
R2VudGxlZmFjZS5jb20gZnJlZSBpY29ucyBzZXQuILwR+BoAAABIaVRYdENvcHlyaWdodAAAAAAA
Q3JlYXRpdmUgQ29tbW9ucyBBdHRyaWJ1dGlvbiBOb24tQ29tbWVyY2lhbCBObyBEZXJpdmF0aXZl
c1iCywUAAAFmSURBVHjazFIxbsJAEPTZkYwBIUNlkAUICmSJ4swL4h/kByFPyEvyjJTJD+4JuZQU
UNCQ7iwqCsCZsWxwIkLK5KRh17Ozy+3YlvXXx/lOxHEse73ec7fbFZvNRpObzWZzPD8FQfD+gVPV
29WH6XQq9/u9Am6B+5JnXnCKmosDoigaHg4HBfgQpoiPZY15wfnUUFvWBH/G47Fv27ZCyukp8mSx
WOjqP00mE3k8HqnxAY08WS6XqRgMBr4QQgF5M2KyWq30JcNGo5HMsiwfgqiBRIRh+IKmu/w6QsTr
9Vpfc73f73PIG3PE1xvsdiriWr++tt1uZ2HFs4kw5QFDNAfRoE6nI39qZo0aatnD3tzEdrvNnRSQ
+8Ddttvtl1VarZakV9wfUdMrY0x6EjSbzWGj0TBAVq/Xjed5p5swJ8caNdRevGKtVpOu6xogA1TJ
My84Q831b9txJL8JxHmFmxectP7d+RRgACFlurolLbQ/AAAAAElFTkSuQmCC";
$_IMAGES["database"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAKBmlUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOmRjPSJo
dHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0i
aHR0cDovL2lwdGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBs
dXNfMV89Imh0dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgICB4bWxuczp4bXA9
Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25z
LmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUu
Y29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgIHhtcFJpZ2h0czpNYXJrZWQ9IlRy
dWUiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMTEtMDEtMjVUMTM6NTU6MTMrMDE6MDAiCiAgIHht
cE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6QzE3MkM5NTk4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIi
CiAgIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6QzE3MkM5NTk4MjI4RTAxMTk4OUNDMEExQUQw
MkI1QzIiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpDMTcyQzk1OTgyMjhF
MDExOTg5Q0MwQTFBRDAyQjVDMiI+CiAgIDx4bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgIDxyZGY6
QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9ucyBB
dHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFsdD4K
ICAgPC94bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgPGRjOmNyZWF0b3I+CiAgICA8cmRmOlNlcT4K
ICAgICA8cmRmOmxpPkdlbnRsZWZhY2UgY3VzdG9tIHRvb2xiYXIgaWNvbnMgZGVzaWduPC9yZGY6
bGk+CiAgICA8L3JkZjpTZXE+CiAgIDwvZGM6Y3JlYXRvcj4KICAgPGRjOmRlc2NyaXB0aW9uPgog
ICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5XaXJlZnJhbWUg
bW9ubyB0b29sYmFyIGljb25zPC9yZGY6bGk+CiAgICA8L3JkZjpBbHQ+CiAgIDwvZGM6ZGVzY3Jp
cHRpb24+CiAgIDxkYzpzdWJqZWN0PgogICAgPHJkZjpCYWc+CiAgICAgPHJkZjpsaT5jdXN0b20g
aWNvbiBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPnRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgICA8cmRmOmxpPmN1c3RvbSBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+aW50ZXJmYWNl
IGRlc2lnbjwvcmRmOmxpPgogICAgIDxyZGY6bGk+dWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJk
ZjpsaT5ndWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjpsaT50YXNrYmFyIGljb25zPC9yZGY6
bGk+CiAgICA8L3JkZjpCYWc+CiAgIDwvZGM6c3ViamVjdD4KICAgPGRjOnJpZ2h0cz4KICAgIDxy
ZGY6QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9u
cyBBdHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFs
dD4KICAgPC9kYzpyaWdodHM+CiAgIDxJcHRjNHhtcENvcmU6Q3JlYXRvckNvbnRhY3RJbmZvCiAg
ICBJcHRjNHhtcENvcmU6Q2lVcmxXb3JrPSJodHRwOi8vd3d3LmdlbnRsZWZhY2UuY29tIi8+CiAg
IDxwbHVzXzFfOkltYWdlQ3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAg
cGx1c18xXzpJbWFnZUNyZWF0b3JOYW1lPSJnZW50bGVmYWNlLmNvbSIvPgogICAgPC9yZGY6U2Vx
PgogICA8L3BsdXNfMV86SW1hZ2VDcmVhdG9yPgogICA8cGx1c18xXzpDb3B5cmlnaHRPd25lcj4K
ICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgcGx1c18xXzpDb3B5cmlnaHRPd25lck5h
bWU9ImdlbnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpDb3B5cmln
aHRPd25lcj4KICAgPHhtcE1NOkhpc3Rvcnk+CiAgICA8cmRmOlNlcT4KICAgICA8cmRmOmxpCiAg
ICAgIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiCiAgICAgIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6
QzE3MkM5NTk4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIiCiAgICAgIHN0RXZ0OndoZW49IjIwMTEt
MDEtMjVUMTM6NTU6MTMrMDE6MDAiCiAgICAgIHN0RXZ0OmNoYW5nZWQ9Ii9tZXRhZGF0YSIvPgog
ICAgPC9yZGY6U2VxPgogICA8L3htcE1NOkhpc3Rvcnk+CiAgPC9yZGY6RGVzY3JpcHRpb24+CiA8
L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+hPdH1wAAABl0RVh0U29m
dHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAA8dEVYdEFMVFRhZwBUaGlzIGlzIHRoZSBpY29u
IGZyb20gR2VudGxlZmFjZS5jb20gZnJlZSBpY29ucyBzZXQuINhr6MQAAABEdEVYdENvcHlyaWdo
dABDcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRp
dmVze92woAAAAEVpVFh0RGVzY3JpcHRpb24AAAAAAFRoaXMgaXMgdGhlIGljb24gZnJvbSBHZW50
bGVmYWNlLmNvbSBmcmVlIGljb25zIHNldC4gvBH4GgAAAEhpVFh0Q29weXJpZ2h0AAAAAABDcmVh
dGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRpdmVzWILL
BQAAAQ5JREFUeNrEUruNg0AQZcAJAZIzJCKHSEhoO8AdGFdgXMmVcCWY68DXAa7AiIgKkIgJSEDj
t/buypbw94Ib6enNamdmH4+xrD8G6UQgiGiDdAkWU8XMXIIK8E+JMAPiON6hKUO6Bx/A5Z0HBZoT
cArOq6raWlEULQAGsldly1rZYxSEYchK4h54qAAKEyCVh7quaSaTYRh0QarwcpwHjONYSPPe/AGF
GQAFc8haI03UIHGnqVSNB3zql/EgCAK+KvjFZTH5z4nk8JV+oGkaOg/wfZ8/WaK2bY2J/+yB53l8
tapPPdCr3nXdxQPXdT/yoO970nuQg7I3+/Obk+M4AvgGjrZt8xTknaoxHp0EGABbN3sxLJ2DngAA
AABJRU5ErkJggg==";
$_IMAGES["directory"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAKBmlUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOmRjPSJo
dHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0i
aHR0cDovL2lwdGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBs
dXNfMV89Imh0dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgICB4bWxuczp4bXA9
Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25z
LmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUu
Y29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgIHhtcFJpZ2h0czpNYXJrZWQ9IlRy
dWUiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMTEtMDEtMjVUMTM6NTU6MTIrMDE6MDAiCiAgIHht
cE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6QUNCNDEzNTk4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIi
CiAgIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6QUNCNDEzNTk4MjI4RTAxMTk4OUNDMEExQUQw
MkI1QzIiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpBQ0I0MTM1OTgyMjhF
MDExOTg5Q0MwQTFBRDAyQjVDMiI+CiAgIDx4bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgIDxyZGY6
QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9ucyBB
dHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFsdD4K
ICAgPC94bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgPGRjOmNyZWF0b3I+CiAgICA8cmRmOlNlcT4K
ICAgICA8cmRmOmxpPkdlbnRsZWZhY2UgY3VzdG9tIHRvb2xiYXIgaWNvbnMgZGVzaWduPC9yZGY6
bGk+CiAgICA8L3JkZjpTZXE+CiAgIDwvZGM6Y3JlYXRvcj4KICAgPGRjOmRlc2NyaXB0aW9uPgog
ICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5XaXJlZnJhbWUg
bW9ubyB0b29sYmFyIGljb25zPC9yZGY6bGk+CiAgICA8L3JkZjpBbHQ+CiAgIDwvZGM6ZGVzY3Jp
cHRpb24+CiAgIDxkYzpzdWJqZWN0PgogICAgPHJkZjpCYWc+CiAgICAgPHJkZjpsaT5jdXN0b20g
aWNvbiBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPnRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgICA8cmRmOmxpPmN1c3RvbSBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+aW50ZXJmYWNl
IGRlc2lnbjwvcmRmOmxpPgogICAgIDxyZGY6bGk+dWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJk
ZjpsaT5ndWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjpsaT50YXNrYmFyIGljb25zPC9yZGY6
bGk+CiAgICA8L3JkZjpCYWc+CiAgIDwvZGM6c3ViamVjdD4KICAgPGRjOnJpZ2h0cz4KICAgIDxy
ZGY6QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9u
cyBBdHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFs
dD4KICAgPC9kYzpyaWdodHM+CiAgIDxJcHRjNHhtcENvcmU6Q3JlYXRvckNvbnRhY3RJbmZvCiAg
ICBJcHRjNHhtcENvcmU6Q2lVcmxXb3JrPSJodHRwOi8vd3d3LmdlbnRsZWZhY2UuY29tIi8+CiAg
IDxwbHVzXzFfOkltYWdlQ3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAg
cGx1c18xXzpJbWFnZUNyZWF0b3JOYW1lPSJnZW50bGVmYWNlLmNvbSIvPgogICAgPC9yZGY6U2Vx
PgogICA8L3BsdXNfMV86SW1hZ2VDcmVhdG9yPgogICA8cGx1c18xXzpDb3B5cmlnaHRPd25lcj4K
ICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgcGx1c18xXzpDb3B5cmlnaHRPd25lck5h
bWU9ImdlbnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpDb3B5cmln
aHRPd25lcj4KICAgPHhtcE1NOkhpc3Rvcnk+CiAgICA8cmRmOlNlcT4KICAgICA8cmRmOmxpCiAg
ICAgIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiCiAgICAgIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6
QUNCNDEzNTk4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIiCiAgICAgIHN0RXZ0OndoZW49IjIwMTEt
MDEtMjVUMTM6NTU6MTIrMDE6MDAiCiAgICAgIHN0RXZ0OmNoYW5nZWQ9Ii9tZXRhZGF0YSIvPgog
ICAgPC9yZGY6U2VxPgogICA8L3htcE1NOkhpc3Rvcnk+CiAgPC9yZGY6RGVzY3JpcHRpb24+CiA8
L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+HtCrmgAAABl0RVh0U29m
dHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAA8dEVYdEFMVFRhZwBUaGlzIGlzIHRoZSBpY29u
IGZyb20gR2VudGxlZmFjZS5jb20gZnJlZSBpY29ucyBzZXQuINhr6MQAAABEdEVYdENvcHlyaWdo
dABDcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRp
dmVze92woAAAAEVpVFh0RGVzY3JpcHRpb24AAAAAAFRoaXMgaXMgdGhlIGljb24gZnJvbSBHZW50
bGVmYWNlLmNvbSBmcmVlIGljb25zIHNldC4gvBH4GgAAAEhpVFh0Q29weXJpZ2h0AAAAAABDcmVh
dGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRpdmVzWILL
BQAAAH9JREFUeNpiZAACQ0PD84yMjAYMUPD///8PQOx4AQgYCAAmPT29hn///hn8/fuXAYaBfAEg
nq+rqytAyABGbW3t90CaoEIc4AML0EZyNTOALVZVVQ0gVzclehFhICcn958SA1j+/PlDkQtAgcgw
xF0w9L3AyMTE9J9hIAFAgAEAV6g+lYaEJWwAAAAASUVORK5CYII=";
$_IMAGES["graphics"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAKBmlUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOmRjPSJo
dHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0i
aHR0cDovL2lwdGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBs
dXNfMV89Imh0dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgICB4bWxuczp4bXA9
Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25z
LmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUu
Y29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgIHhtcFJpZ2h0czpNYXJrZWQ9IlRy
dWUiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMTEtMDEtMjVUMTM6NTU6MDkrMDE6MDAiCiAgIHht
cE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6Q0ZBMzNDNTc4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIi
CiAgIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6Q0ZBMzNDNTc4MjI4RTAxMTk4OUNDMEExQUQw
MkI1QzIiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpDRkEzM0M1NzgyMjhF
MDExOTg5Q0MwQTFBRDAyQjVDMiI+CiAgIDx4bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgIDxyZGY6
QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9ucyBB
dHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFsdD4K
ICAgPC94bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgPGRjOmNyZWF0b3I+CiAgICA8cmRmOlNlcT4K
ICAgICA8cmRmOmxpPkdlbnRsZWZhY2UgY3VzdG9tIHRvb2xiYXIgaWNvbnMgZGVzaWduPC9yZGY6
bGk+CiAgICA8L3JkZjpTZXE+CiAgIDwvZGM6Y3JlYXRvcj4KICAgPGRjOmRlc2NyaXB0aW9uPgog
ICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5XaXJlZnJhbWUg
bW9ubyB0b29sYmFyIGljb25zPC9yZGY6bGk+CiAgICA8L3JkZjpBbHQ+CiAgIDwvZGM6ZGVzY3Jp
cHRpb24+CiAgIDxkYzpzdWJqZWN0PgogICAgPHJkZjpCYWc+CiAgICAgPHJkZjpsaT5jdXN0b20g
aWNvbiBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPnRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgICA8cmRmOmxpPmN1c3RvbSBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+aW50ZXJmYWNl
IGRlc2lnbjwvcmRmOmxpPgogICAgIDxyZGY6bGk+dWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJk
ZjpsaT5ndWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjpsaT50YXNrYmFyIGljb25zPC9yZGY6
bGk+CiAgICA8L3JkZjpCYWc+CiAgIDwvZGM6c3ViamVjdD4KICAgPGRjOnJpZ2h0cz4KICAgIDxy
ZGY6QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9u
cyBBdHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFs
dD4KICAgPC9kYzpyaWdodHM+CiAgIDxJcHRjNHhtcENvcmU6Q3JlYXRvckNvbnRhY3RJbmZvCiAg
ICBJcHRjNHhtcENvcmU6Q2lVcmxXb3JrPSJodHRwOi8vd3d3LmdlbnRsZWZhY2UuY29tIi8+CiAg
IDxwbHVzXzFfOkltYWdlQ3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAg
cGx1c18xXzpJbWFnZUNyZWF0b3JOYW1lPSJnZW50bGVmYWNlLmNvbSIvPgogICAgPC9yZGY6U2Vx
PgogICA8L3BsdXNfMV86SW1hZ2VDcmVhdG9yPgogICA8cGx1c18xXzpDb3B5cmlnaHRPd25lcj4K
ICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgcGx1c18xXzpDb3B5cmlnaHRPd25lck5h
bWU9ImdlbnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpDb3B5cmln
aHRPd25lcj4KICAgPHhtcE1NOkhpc3Rvcnk+CiAgICA8cmRmOlNlcT4KICAgICA8cmRmOmxpCiAg
ICAgIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiCiAgICAgIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6
Q0ZBMzNDNTc4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIiCiAgICAgIHN0RXZ0OndoZW49IjIwMTEt
MDEtMjVUMTM6NTU6MDkrMDE6MDAiCiAgICAgIHN0RXZ0OmNoYW5nZWQ9Ii9tZXRhZGF0YSIvPgog
ICAgPC9yZGY6U2VxPgogICA8L3htcE1NOkhpc3Rvcnk+CiAgPC9yZGY6RGVzY3JpcHRpb24+CiA8
L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+LvobZgAAABl0RVh0U29m
dHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAA8dEVYdEFMVFRhZwBUaGlzIGlzIHRoZSBpY29u
IGZyb20gR2VudGxlZmFjZS5jb20gZnJlZSBpY29ucyBzZXQuINhr6MQAAABEdEVYdENvcHlyaWdo
dABDcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRp
dmVze92woAAAAEVpVFh0RGVzY3JpcHRpb24AAAAAAFRoaXMgaXMgdGhlIGljb24gZnJvbSBHZW50
bGVmYWNlLmNvbSBmcmVlIGljb25zIHNldC4gvBH4GgAAAEhpVFh0Q29weXJpZ2h0AAAAAABDcmVh
dGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRpdmVzWILL
BQAAAKxJREFUeNpiZAACQ0PDBkZGxnoGEsH///8bGXV1dQWYmJjeM5AJWEDE379/Ga5cucJIqmYd
HZ3/TJcvX/7w588fsmwH6WOCuYAcANI3agDUgAGNBXDi4efn/09uSmQGEaysrIzAdO0AxAwk4kac
JnNwcCRwcnKeB+L/QHwfxCfaWUAXJQDxeTY2NgEg/R+IA0B8kDhRBgBz535mZmYBKPs/EBuA+CBx
dLUAAQYAZAh3XzD6P9YAAAAASUVORK5CYII=";
$_IMAGES["image"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAKBmlUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOmRjPSJo
dHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0i
aHR0cDovL2lwdGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBs
dXNfMV89Imh0dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgICB4bWxuczp4bXA9
Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25z
LmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUu
Y29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgIHhtcFJpZ2h0czpNYXJrZWQ9IlRy
dWUiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMTEtMDEtMjVUMTM6NTU6MTArMDE6MDAiCiAgIHht
cE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6Q0NDMDhDNTc4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIi
CiAgIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6Q0NDMDhDNTc4MjI4RTAxMTk4OUNDMEExQUQw
MkI1QzIiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpDQ0MwOEM1NzgyMjhF
MDExOTg5Q0MwQTFBRDAyQjVDMiI+CiAgIDx4bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgIDxyZGY6
QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9ucyBB
dHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFsdD4K
ICAgPC94bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgPGRjOmNyZWF0b3I+CiAgICA8cmRmOlNlcT4K
ICAgICA8cmRmOmxpPkdlbnRsZWZhY2UgY3VzdG9tIHRvb2xiYXIgaWNvbnMgZGVzaWduPC9yZGY6
bGk+CiAgICA8L3JkZjpTZXE+CiAgIDwvZGM6Y3JlYXRvcj4KICAgPGRjOmRlc2NyaXB0aW9uPgog
ICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5XaXJlZnJhbWUg
bW9ubyB0b29sYmFyIGljb25zPC9yZGY6bGk+CiAgICA8L3JkZjpBbHQ+CiAgIDwvZGM6ZGVzY3Jp
cHRpb24+CiAgIDxkYzpzdWJqZWN0PgogICAgPHJkZjpCYWc+CiAgICAgPHJkZjpsaT5jdXN0b20g
aWNvbiBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPnRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgICA8cmRmOmxpPmN1c3RvbSBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+aW50ZXJmYWNl
IGRlc2lnbjwvcmRmOmxpPgogICAgIDxyZGY6bGk+dWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJk
ZjpsaT5ndWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjpsaT50YXNrYmFyIGljb25zPC9yZGY6
bGk+CiAgICA8L3JkZjpCYWc+CiAgIDwvZGM6c3ViamVjdD4KICAgPGRjOnJpZ2h0cz4KICAgIDxy
ZGY6QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9u
cyBBdHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFs
dD4KICAgPC9kYzpyaWdodHM+CiAgIDxJcHRjNHhtcENvcmU6Q3JlYXRvckNvbnRhY3RJbmZvCiAg
ICBJcHRjNHhtcENvcmU6Q2lVcmxXb3JrPSJodHRwOi8vd3d3LmdlbnRsZWZhY2UuY29tIi8+CiAg
IDxwbHVzXzFfOkltYWdlQ3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAg
cGx1c18xXzpJbWFnZUNyZWF0b3JOYW1lPSJnZW50bGVmYWNlLmNvbSIvPgogICAgPC9yZGY6U2Vx
PgogICA8L3BsdXNfMV86SW1hZ2VDcmVhdG9yPgogICA8cGx1c18xXzpDb3B5cmlnaHRPd25lcj4K
ICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgcGx1c18xXzpDb3B5cmlnaHRPd25lck5h
bWU9ImdlbnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpDb3B5cmln
aHRPd25lcj4KICAgPHhtcE1NOkhpc3Rvcnk+CiAgICA8cmRmOlNlcT4KICAgICA8cmRmOmxpCiAg
ICAgIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiCiAgICAgIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6
Q0NDMDhDNTc4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIiCiAgICAgIHN0RXZ0OndoZW49IjIwMTEt
MDEtMjVUMTM6NTU6MTArMDE6MDAiCiAgICAgIHN0RXZ0OmNoYW5nZWQ9Ii9tZXRhZGF0YSIvPgog
ICAgPC9yZGY6U2VxPgogICA8L3htcE1NOkhpc3Rvcnk+CiAgPC9yZGY6RGVzY3JpcHRpb24+CiA8
L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+1O5f+gAAABl0RVh0U29m
dHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAA8dEVYdEFMVFRhZwBUaGlzIGlzIHRoZSBpY29u
IGZyb20gR2VudGxlZmFjZS5jb20gZnJlZSBpY29ucyBzZXQuINhr6MQAAABEdEVYdENvcHlyaWdo
dABDcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRp
dmVze92woAAAAEVpVFh0RGVzY3JpcHRpb24AAAAAAFRoaXMgaXMgdGhlIGljb24gZnJvbSBHZW50
bGVmYWNlLmNvbSBmcmVlIGljb25zIHNldC4gvBH4GgAAAEhpVFh0Q29weXJpZ2h0AAAAAABDcmVh
dGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRpdmVzWILL
BQAAAShJREFUeNqkUzFug0AQ9JGAQgMnChRASO4oaGI+ENzlF/EPnB+EvCT5CV9Ig2go3AASTWgj
AZdddIucOIpj3UqjnVtu9uYWHUuSRKwU4nocx5VSg2EYZlIUBbtEGMexOHEQRVHGGHsEbMqy7P9q
QLrFgSw+Q3qpqqo/54B03xwgF0Lc/+cKpNOQ0ALy2zRNaRiGOWB9rgGC+b4/D6NpmnmIQRDMwrqu
D5g9z+MwkxzoGtxt27Z9xzrpTn4jCY9OeoIGd8ihQe667qbrusOvQ/wZjuNw2Lg/KnHAK2BLumUG
lmVx27Y/OOcCckanAzjtkUjh+47WV7quZ2AN7X2C5kHy1DAMvPMOcCNrC2DQ+O0WOTNNk95CLy1e
FAxOUnpMTNM0pQbK8SXAAO1HxRf5B8IfAAAAAElFTkSuQmCC";
$_IMAGES["presentation"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAALJ2lUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6cGhvdG9z
aG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOnhtcD0i
aHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMu
YWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5j
b20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgIHhtbG5zOmRjPSJodHRwOi8vcHVy
bC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0iaHR0cDovL2lw
dGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBsdXNfMV89Imh0
dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgIHBob3Rvc2hvcDpIZWFkbGluZT0i
VXNlciBpbnRlcmZhY2UgbWFrZSB1cCIKICAgeG1wUmlnaHRzOk1hcmtlZD0iVHJ1ZSIKICAgeG1w
Ok1ldGFkYXRhRGF0ZT0iMjAxMS0wMS0yNVQxMzo1NToxNSswMTowMCIKICAgeG1wTU06SW5zdGFu
Y2VJRD0ieG1wLmlpZDo0NTNEQTg1QTgyMjhFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgeG1wTU06
RG9jdW1lbnRJRD0ieG1wLmRpZDoxOTE2RkJENEUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAg
eG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjE5MTZGQkQ0RTAyN0UwMTE5ODlDQzBB
MUFEMDJCNUMyIj4KICAgPHhtcFJpZ2h0czpVc2FnZVRlcm1zPgogICAgPHJkZjpBbHQ+CiAgICAg
PHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9u
LU5vbkNvbW1lcmNpYWwgbGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L3htcFJp
Z2h0czpVc2FnZVRlcm1zPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxy
ZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJzYXZlZCIKICAgICAgc3RFdnQ6aW5zdGFuY2VJRD0i
eG1wLmlpZDoxOTE2RkJENEUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgICAgc3RFdnQ6d2hl
bj0iMjAxMS0wMS0yNFQxODozOTowMiswMTowMCIKICAgICAgc3RFdnQ6Y2hhbmdlZD0iL21ldGFk
YXRhIi8+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2
dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjQ1M0RBODVBODIyOEUwMTE5ODlDQzBBMUFEMDJCNUMyIgog
ICAgICBzdEV2dDp3aGVuPSIyMDExLTAxLTI1VDEzOjU1OjE1KzAxOjAwIgogICAgICBzdEV2dDpj
aGFuZ2VkPSIvbWV0YWRhdGEiLz4KICAgIDwvcmRmOlNlcT4KICAgPC94bXBNTTpIaXN0b3J5Pgog
ICA8ZGM6Y3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGk+R2VudGxlZmFjZSBjdXN0
b20gdG9vbGJhciBpY29ucyBkZXNpZ248L3JkZjpsaT4KICAgIDwvcmRmOlNlcT4KICAgPC9kYzpj
cmVhdG9yPgogICA8ZGM6ZGVzY3JpcHRpb24+CiAgICA8cmRmOkFsdD4KICAgICA8cmRmOmxpIHht
bDpsYW5nPSJ4LWRlZmF1bHQiPldpcmVmcmFtZSBtb25vIHRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgIDwvcmRmOkFsdD4KICAgPC9kYzpkZXNjcmlwdGlvbj4KICAgPGRjOnN1YmplY3Q+CiAgICA8
cmRmOkJhZz4KICAgICA8cmRmOmxpPmN1c3RvbSBpY29uIGRlc2lnbjwvcmRmOmxpPgogICAgIDxy
ZGY6bGk+dG9vbGJhciBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+Y3VzdG9tIGljb25zPC9y
ZGY6bGk+CiAgICAgPHJkZjpsaT5pbnRlcmZhY2UgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjps
aT51aSBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPmd1aSBkZXNpZ248L3JkZjpsaT4KICAg
ICA8cmRmOmxpPnRhc2tiYXIgaWNvbnM8L3JkZjpsaT4KICAgIDwvcmRmOkJhZz4KICAgPC9kYzpz
dWJqZWN0PgogICA8ZGM6cmlnaHRzPgogICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFu
Zz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uLU5vbkNvbW1lcmNpYWwg
bGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L2RjOnJpZ2h0cz4KICAgPElwdGM0
eG1wQ29yZTpDcmVhdG9yQ29udGFjdEluZm8KICAgIElwdGM0eG1wQ29yZTpDaVVybFdvcms9Imh0
dHA6Ly93d3cuZ2VudGxlZmFjZS5jb20iLz4KICAgPHBsdXNfMV86SW1hZ2VDcmVhdG9yPgogICAg
PHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBwbHVzXzFfOkltYWdlQ3JlYXRvck5hbWU9Imdl
bnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpJbWFnZUNyZWF0b3I+
CiAgIDxwbHVzXzFfOkNvcHlyaWdodE93bmVyPgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQog
ICAgICBwbHVzXzFfOkNvcHlyaWdodE93bmVyTmFtZT0iZ2VudGxlZmFjZS5jb20iLz4KICAgIDwv
cmRmOlNlcT4KICAgPC9wbHVzXzFfOkNvcHlyaWdodE93bmVyPgogIDwvcmRmOkRlc2NyaXB0aW9u
PgogPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KPD94cGFja2V0IGVuZD0iciI/PtEhl38AAAAZdEVY
dFNvZnR3YXJlAEFkb2JlIEltYWdlUmVhZHlxyWU8AAAAPHRFWHRBTFRUYWcAVGhpcyBpcyB0aGUg
aWNvbiBmcm9tIEdlbnRsZWZhY2UuY29tIGZyZWUgaWNvbnMgc2V0LiDYa+jEAAAARHRFWHRDb3B5
cmlnaHQAQ3JlYXRpdmUgQ29tbW9ucyBBdHRyaWJ1dGlvbiBOb24tQ29tbWVyY2lhbCBObyBEZXJp
dmF0aXZlc3vdsKAAAABFaVRYdERlc2NyaXB0aW9uAAAAAABUaGlzIGlzIHRoZSBpY29uIGZyb20g
R2VudGxlZmFjZS5jb20gZnJlZSBpY29ucyBzZXQuILwR+BoAAABIaVRYdENvcHlyaWdodAAAAAAA
Q3JlYXRpdmUgQ29tbW9ucyBBdHRyaWJ1dGlvbiBOb24tQ29tbWVyY2lhbCBObyBEZXJpdmF0aXZl
c1iCywUAAAC+SURBVHjapJM9D4MgEIaBNMSFxI2NmVH+/9CfICMzmzMrH/VIaVqLKHqDvoTzvefA
Q+hmYHgopWaM8dT7cUpJP0DEGKeLAFM28N63MTFW74rzdi8bhBCaBsYYDW8pJaoaHBGUqOWdIigB
edt2ug2stbkdIUS7hdrBfecVvUuwLEuuxDn/Idjqw0OsVd0lAOwVeVzls1X1j6AsnHMZmzGGugwK
zjAM8EuPsD6jP8NEKU23ppEQAld1ZaD0S4ABACd/iDLeHEUAAAAAAElFTkSuQmCC";
$_IMAGES["spreadsheet"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAALJ2lUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6cGhvdG9z
aG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOnhtcD0i
aHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMu
YWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5j
b20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgIHhtbG5zOmRjPSJodHRwOi8vcHVy
bC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0iaHR0cDovL2lw
dGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBsdXNfMV89Imh0
dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgIHBob3Rvc2hvcDpIZWFkbGluZT0i
VXNlciBpbnRlcmZhY2UgbWFrZSB1cCIKICAgeG1wUmlnaHRzOk1hcmtlZD0iVHJ1ZSIKICAgeG1w
Ok1ldGFkYXRhRGF0ZT0iMjAxMS0wMS0yNVQxMzo1NToxNiswMTowMCIKICAgeG1wTU06SW5zdGFu
Y2VJRD0ieG1wLmlpZDoyM0I4MTY1QjgyMjhFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgeG1wTU06
RG9jdW1lbnRJRD0ieG1wLmRpZDo0OEY2QTlENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAg
eG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjQ4RjZBOUQ1RTAyN0UwMTE5ODlDQzBB
MUFEMDJCNUMyIj4KICAgPHhtcFJpZ2h0czpVc2FnZVRlcm1zPgogICAgPHJkZjpBbHQ+CiAgICAg
PHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9u
LU5vbkNvbW1lcmNpYWwgbGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L3htcFJp
Z2h0czpVc2FnZVRlcm1zPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxy
ZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJzYXZlZCIKICAgICAgc3RFdnQ6aW5zdGFuY2VJRD0i
eG1wLmlpZDo0OEY2QTlENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgICAgc3RFdnQ6d2hl
bj0iMjAxMS0wMS0yNFQxODozOTowMyswMTowMCIKICAgICAgc3RFdnQ6Y2hhbmdlZD0iL21ldGFk
YXRhIi8+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2
dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjIzQjgxNjVCODIyOEUwMTE5ODlDQzBBMUFEMDJCNUMyIgog
ICAgICBzdEV2dDp3aGVuPSIyMDExLTAxLTI1VDEzOjU1OjE2KzAxOjAwIgogICAgICBzdEV2dDpj
aGFuZ2VkPSIvbWV0YWRhdGEiLz4KICAgIDwvcmRmOlNlcT4KICAgPC94bXBNTTpIaXN0b3J5Pgog
ICA8ZGM6Y3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGk+R2VudGxlZmFjZSBjdXN0
b20gdG9vbGJhciBpY29ucyBkZXNpZ248L3JkZjpsaT4KICAgIDwvcmRmOlNlcT4KICAgPC9kYzpj
cmVhdG9yPgogICA8ZGM6ZGVzY3JpcHRpb24+CiAgICA8cmRmOkFsdD4KICAgICA8cmRmOmxpIHht
bDpsYW5nPSJ4LWRlZmF1bHQiPldpcmVmcmFtZSBtb25vIHRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgIDwvcmRmOkFsdD4KICAgPC9kYzpkZXNjcmlwdGlvbj4KICAgPGRjOnN1YmplY3Q+CiAgICA8
cmRmOkJhZz4KICAgICA8cmRmOmxpPmN1c3RvbSBpY29uIGRlc2lnbjwvcmRmOmxpPgogICAgIDxy
ZGY6bGk+dG9vbGJhciBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+Y3VzdG9tIGljb25zPC9y
ZGY6bGk+CiAgICAgPHJkZjpsaT5pbnRlcmZhY2UgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjps
aT51aSBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPmd1aSBkZXNpZ248L3JkZjpsaT4KICAg
ICA8cmRmOmxpPnRhc2tiYXIgaWNvbnM8L3JkZjpsaT4KICAgIDwvcmRmOkJhZz4KICAgPC9kYzpz
dWJqZWN0PgogICA8ZGM6cmlnaHRzPgogICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFu
Zz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uLU5vbkNvbW1lcmNpYWwg
bGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L2RjOnJpZ2h0cz4KICAgPElwdGM0
eG1wQ29yZTpDcmVhdG9yQ29udGFjdEluZm8KICAgIElwdGM0eG1wQ29yZTpDaVVybFdvcms9Imh0
dHA6Ly93d3cuZ2VudGxlZmFjZS5jb20iLz4KICAgPHBsdXNfMV86SW1hZ2VDcmVhdG9yPgogICAg
PHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBwbHVzXzFfOkltYWdlQ3JlYXRvck5hbWU9Imdl
bnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpJbWFnZUNyZWF0b3I+
CiAgIDxwbHVzXzFfOkNvcHlyaWdodE93bmVyPgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQog
ICAgICBwbHVzXzFfOkNvcHlyaWdodE93bmVyTmFtZT0iZ2VudGxlZmFjZS5jb20iLz4KICAgIDwv
cmRmOlNlcT4KICAgPC9wbHVzXzFfOkNvcHlyaWdodE93bmVyPgogIDwvcmRmOkRlc2NyaXB0aW9u
PgogPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KPD94cGFja2V0IGVuZD0iciI/PrUTvtcAAAAZdEVY
dFNvZnR3YXJlAEFkb2JlIEltYWdlUmVhZHlxyWU8AAAAPHRFWHRBTFRUYWcAVGhpcyBpcyB0aGUg
aWNvbiBmcm9tIEdlbnRsZWZhY2UuY29tIGZyZWUgaWNvbnMgc2V0LiDYa+jEAAAARHRFWHRDb3B5
cmlnaHQAQ3JlYXRpdmUgQ29tbW9ucyBBdHRyaWJ1dGlvbiBOb24tQ29tbWVyY2lhbCBObyBEZXJp
dmF0aXZlc3vdsKAAAABFaVRYdERlc2NyaXB0aW9uAAAAAABUaGlzIGlzIHRoZSBpY29uIGZyb20g
R2VudGxlZmFjZS5jb20gZnJlZSBpY29ucyBzZXQuILwR+BoAAABIaVRYdENvcHlyaWdodAAAAAAA
Q3JlYXRpdmUgQ29tbW9ucyBBdHRyaWJ1dGlvbiBOb24tQ29tbWVyY2lhbCBObyBEZXJpdmF0aXZl
c1iCywUAAACpSURBVHjarJMxCsQgEEVnBksLCZZWYpliNydw7w8ewSO4ewBNVgMJS2wymwx8+L5C
/nwRp2l6A4CC/+ZDpRQ1z/MzhIBNzVcGJ5mCcRyX47UcRjnnLheHtRXAOffYYPWew9Bau8CFoa2c
GCM2/RZ2hoExpkvAYWuC43DY+gpa672c6j2H4TAM95SYUsKmen5xGEgpuwQcdk+JQoi9nOo9hyER
XfrOXwEGAIpK8gJLfFejAAAAAElFTkSuQmCC";
$_IMAGES["textdocument"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAKBmlUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOmRjPSJo
dHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0i
aHR0cDovL2lwdGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBs
dXNfMV89Imh0dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgICB4bWxuczp4bXA9
Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25z
LmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUu
Y29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgIHhtcFJpZ2h0czpNYXJrZWQ9IlRy
dWUiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMTEtMDEtMjVUMTM6NTU6MTMrMDE6MDAiCiAgIHht
cE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6QjdDQkIxNTk4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIi
CiAgIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6QjdDQkIxNTk4MjI4RTAxMTk4OUNDMEExQUQw
MkI1QzIiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpCN0NCQjE1OTgyMjhF
MDExOTg5Q0MwQTFBRDAyQjVDMiI+CiAgIDx4bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgIDxyZGY6
QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9ucyBB
dHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFsdD4K
ICAgPC94bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgPGRjOmNyZWF0b3I+CiAgICA8cmRmOlNlcT4K
ICAgICA8cmRmOmxpPkdlbnRsZWZhY2UgY3VzdG9tIHRvb2xiYXIgaWNvbnMgZGVzaWduPC9yZGY6
bGk+CiAgICA8L3JkZjpTZXE+CiAgIDwvZGM6Y3JlYXRvcj4KICAgPGRjOmRlc2NyaXB0aW9uPgog
ICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5XaXJlZnJhbWUg
bW9ubyB0b29sYmFyIGljb25zPC9yZGY6bGk+CiAgICA8L3JkZjpBbHQ+CiAgIDwvZGM6ZGVzY3Jp
cHRpb24+CiAgIDxkYzpzdWJqZWN0PgogICAgPHJkZjpCYWc+CiAgICAgPHJkZjpsaT5jdXN0b20g
aWNvbiBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPnRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgICA8cmRmOmxpPmN1c3RvbSBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+aW50ZXJmYWNl
IGRlc2lnbjwvcmRmOmxpPgogICAgIDxyZGY6bGk+dWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJk
ZjpsaT5ndWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjpsaT50YXNrYmFyIGljb25zPC9yZGY6
bGk+CiAgICA8L3JkZjpCYWc+CiAgIDwvZGM6c3ViamVjdD4KICAgPGRjOnJpZ2h0cz4KICAgIDxy
ZGY6QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9u
cyBBdHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFs
dD4KICAgPC9kYzpyaWdodHM+CiAgIDxJcHRjNHhtcENvcmU6Q3JlYXRvckNvbnRhY3RJbmZvCiAg
ICBJcHRjNHhtcENvcmU6Q2lVcmxXb3JrPSJodHRwOi8vd3d3LmdlbnRsZWZhY2UuY29tIi8+CiAg
IDxwbHVzXzFfOkltYWdlQ3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAg
cGx1c18xXzpJbWFnZUNyZWF0b3JOYW1lPSJnZW50bGVmYWNlLmNvbSIvPgogICAgPC9yZGY6U2Vx
PgogICA8L3BsdXNfMV86SW1hZ2VDcmVhdG9yPgogICA8cGx1c18xXzpDb3B5cmlnaHRPd25lcj4K
ICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgcGx1c18xXzpDb3B5cmlnaHRPd25lck5h
bWU9ImdlbnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpDb3B5cmln
aHRPd25lcj4KICAgPHhtcE1NOkhpc3Rvcnk+CiAgICA8cmRmOlNlcT4KICAgICA8cmRmOmxpCiAg
ICAgIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiCiAgICAgIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6
QjdDQkIxNTk4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIiCiAgICAgIHN0RXZ0OndoZW49IjIwMTEt
MDEtMjVUMTM6NTU6MTMrMDE6MDAiCiAgICAgIHN0RXZ0OmNoYW5nZWQ9Ii9tZXRhZGF0YSIvPgog
ICAgPC9yZGY6U2VxPgogICA8L3htcE1NOkhpc3Rvcnk+CiAgPC9yZGY6RGVzY3JpcHRpb24+CiA8
L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+DDAqUwAAABl0RVh0U29m
dHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAA8dEVYdEFMVFRhZwBUaGlzIGlzIHRoZSBpY29u
IGZyb20gR2VudGxlZmFjZS5jb20gZnJlZSBpY29ucyBzZXQuINhr6MQAAABEdEVYdENvcHlyaWdo
dABDcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRp
dmVze92woAAAAEVpVFh0RGVzY3JpcHRpb24AAAAAAFRoaXMgaXMgdGhlIGljb24gZnJvbSBHZW50
bGVmYWNlLmNvbSBmcmVlIGljb25zIHNldC4gvBH4GgAAAEhpVFh0Q29weXJpZ2h0AAAAAABDcmVh
dGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRpdmVzWILL
BQAAAN9JREFUeNrUUksKgzAQnSm6T/cuRBBciOANehQ9ib2J3qS9gRvFnfUI3ftJJ2IkTVUa6KYP
hnnMTF4emSAQ4jhmiPggyuAAnPOiLMtUrZ2WBozjyCjgKKZpSqIoylUBlCQMQy5yVVWo37z0CopE
OqnrOl0dCAzDMMcWRJ2EU3JRCE45CYIgfxOQNrcg6r7vX5ummUWW2dmNpQ7tgXpPSpnneZk+95VA
27Zn13UvyjZuRgICXdfdJXccB4wF9Df5ENjbwN5Wfu/gfwXWf2/bNgdD9H2PlvbbmMF5MQ8vAQYA
O/OtGXlisAoAAAAASUVORK5CYII=";
$_IMAGES["unknown"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAKBmlUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOmRjPSJo
dHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0i
aHR0cDovL2lwdGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBs
dXNfMV89Imh0dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgICB4bWxuczp4bXA9
Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25z
LmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUu
Y29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgIHhtcFJpZ2h0czpNYXJrZWQ9IlRy
dWUiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMTEtMDEtMjVUMTM6NTU6MTMrMDE6MDAiCiAgIHht
cE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NjhDRDk0NTk4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIi
CiAgIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NjhDRDk0NTk4MjI4RTAxMTk4OUNDMEExQUQw
MkI1QzIiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo2OENEOTQ1OTgyMjhF
MDExOTg5Q0MwQTFBRDAyQjVDMiI+CiAgIDx4bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgIDxyZGY6
QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9ucyBB
dHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFsdD4K
ICAgPC94bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgPGRjOmNyZWF0b3I+CiAgICA8cmRmOlNlcT4K
ICAgICA8cmRmOmxpPkdlbnRsZWZhY2UgY3VzdG9tIHRvb2xiYXIgaWNvbnMgZGVzaWduPC9yZGY6
bGk+CiAgICA8L3JkZjpTZXE+CiAgIDwvZGM6Y3JlYXRvcj4KICAgPGRjOmRlc2NyaXB0aW9uPgog
ICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5XaXJlZnJhbWUg
bW9ubyB0b29sYmFyIGljb25zPC9yZGY6bGk+CiAgICA8L3JkZjpBbHQ+CiAgIDwvZGM6ZGVzY3Jp
cHRpb24+CiAgIDxkYzpzdWJqZWN0PgogICAgPHJkZjpCYWc+CiAgICAgPHJkZjpsaT5jdXN0b20g
aWNvbiBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPnRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgICA8cmRmOmxpPmN1c3RvbSBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+aW50ZXJmYWNl
IGRlc2lnbjwvcmRmOmxpPgogICAgIDxyZGY6bGk+dWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJk
ZjpsaT5ndWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjpsaT50YXNrYmFyIGljb25zPC9yZGY6
bGk+CiAgICA8L3JkZjpCYWc+CiAgIDwvZGM6c3ViamVjdD4KICAgPGRjOnJpZ2h0cz4KICAgIDxy
ZGY6QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9u
cyBBdHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFs
dD4KICAgPC9kYzpyaWdodHM+CiAgIDxJcHRjNHhtcENvcmU6Q3JlYXRvckNvbnRhY3RJbmZvCiAg
ICBJcHRjNHhtcENvcmU6Q2lVcmxXb3JrPSJodHRwOi8vd3d3LmdlbnRsZWZhY2UuY29tIi8+CiAg
IDxwbHVzXzFfOkltYWdlQ3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAg
cGx1c18xXzpJbWFnZUNyZWF0b3JOYW1lPSJnZW50bGVmYWNlLmNvbSIvPgogICAgPC9yZGY6U2Vx
PgogICA8L3BsdXNfMV86SW1hZ2VDcmVhdG9yPgogICA8cGx1c18xXzpDb3B5cmlnaHRPd25lcj4K
ICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgcGx1c18xXzpDb3B5cmlnaHRPd25lck5h
bWU9ImdlbnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpDb3B5cmln
aHRPd25lcj4KICAgPHhtcE1NOkhpc3Rvcnk+CiAgICA8cmRmOlNlcT4KICAgICA8cmRmOmxpCiAg
ICAgIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiCiAgICAgIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6
NjhDRDk0NTk4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIiCiAgICAgIHN0RXZ0OndoZW49IjIwMTEt
MDEtMjVUMTM6NTU6MTMrMDE6MDAiCiAgICAgIHN0RXZ0OmNoYW5nZWQ9Ii9tZXRhZGF0YSIvPgog
ICAgPC9yZGY6U2VxPgogICA8L3htcE1NOkhpc3Rvcnk+CiAgPC9yZGY6RGVzY3JpcHRpb24+CiA8
L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+227lowAAABl0RVh0U29m
dHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAA8dEVYdEFMVFRhZwBUaGlzIGlzIHRoZSBpY29u
IGZyb20gR2VudGxlZmFjZS5jb20gZnJlZSBpY29ucyBzZXQuINhr6MQAAABEdEVYdENvcHlyaWdo
dABDcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRp
dmVze92woAAAAEVpVFh0RGVzY3JpcHRpb24AAAAAAFRoaXMgaXMgdGhlIGljb24gZnJvbSBHZW50
bGVmYWNlLmNvbSBmcmVlIGljb25zIHNldC4gvBH4GgAAAEhpVFh0Q29weXJpZ2h0AAAAAABDcmVh
dGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRpdmVzWILL
BQAAAQVJREFUeNrMU8EJg0AQ9CQF+BV8+FEQBMEKzgokpaSDpILUkgq8EiI+RfAh+IwFqJfZ4AVz
YmIgjyws4+3t7M7uoWF8YXEcH/UY20KMougspbyYppmN45gwxtI8zw90t1NJYRjeANaM1yFxXxSF
AOmCAhlcECKeqCRTfQzDYMGNmV+JHATBse/7DGcBPE2YUfxlBN/3paa8Q7d9WZbC8zyOrg8FQA5M
KK4r0N2C9DPdAVOaHc4nTBXvuQPIWl1iVVWPhbmue6rrmjqLxSs4jiNX+NcJD03TCORxwkUB27bl
p+dUO2jbli1GoLk3GNcDm3bwzr5V8M8FfrGDTvuZ1qybH+4CDABPtbUoaQhGyQAAAABJRU5ErkJg
gg==";
$_IMAGES["vectorgraphics"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAKBmlUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOmRjPSJo
dHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0i
aHR0cDovL2lwdGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBs
dXNfMV89Imh0dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgICB4bWxuczp4bXA9
Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25z
LmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUu
Y29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgIHhtcFJpZ2h0czpNYXJrZWQ9IlRy
dWUiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMTEtMDEtMjVUMTM6NTU6MTErMDE6MDAiCiAgIHht
cE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6M0JBNTBBNTg4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIi
CiAgIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6M0JBNTBBNTg4MjI4RTAxMTk4OUNDMEExQUQw
MkI1QzIiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDozQkE1MEE1ODgyMjhF
MDExOTg5Q0MwQTFBRDAyQjVDMiI+CiAgIDx4bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgIDxyZGY6
QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9ucyBB
dHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFsdD4K
ICAgPC94bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgPGRjOmNyZWF0b3I+CiAgICA8cmRmOlNlcT4K
ICAgICA8cmRmOmxpPkdlbnRsZWZhY2UgY3VzdG9tIHRvb2xiYXIgaWNvbnMgZGVzaWduPC9yZGY6
bGk+CiAgICA8L3JkZjpTZXE+CiAgIDwvZGM6Y3JlYXRvcj4KICAgPGRjOmRlc2NyaXB0aW9uPgog
ICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5XaXJlZnJhbWUg
bW9ubyB0b29sYmFyIGljb25zPC9yZGY6bGk+CiAgICA8L3JkZjpBbHQ+CiAgIDwvZGM6ZGVzY3Jp
cHRpb24+CiAgIDxkYzpzdWJqZWN0PgogICAgPHJkZjpCYWc+CiAgICAgPHJkZjpsaT5jdXN0b20g
aWNvbiBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPnRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgICA8cmRmOmxpPmN1c3RvbSBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+aW50ZXJmYWNl
IGRlc2lnbjwvcmRmOmxpPgogICAgIDxyZGY6bGk+dWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJk
ZjpsaT5ndWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjpsaT50YXNrYmFyIGljb25zPC9yZGY6
bGk+CiAgICA8L3JkZjpCYWc+CiAgIDwvZGM6c3ViamVjdD4KICAgPGRjOnJpZ2h0cz4KICAgIDxy
ZGY6QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9u
cyBBdHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFs
dD4KICAgPC9kYzpyaWdodHM+CiAgIDxJcHRjNHhtcENvcmU6Q3JlYXRvckNvbnRhY3RJbmZvCiAg
ICBJcHRjNHhtcENvcmU6Q2lVcmxXb3JrPSJodHRwOi8vd3d3LmdlbnRsZWZhY2UuY29tIi8+CiAg
IDxwbHVzXzFfOkltYWdlQ3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAg
cGx1c18xXzpJbWFnZUNyZWF0b3JOYW1lPSJnZW50bGVmYWNlLmNvbSIvPgogICAgPC9yZGY6U2Vx
PgogICA8L3BsdXNfMV86SW1hZ2VDcmVhdG9yPgogICA8cGx1c18xXzpDb3B5cmlnaHRPd25lcj4K
ICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgcGx1c18xXzpDb3B5cmlnaHRPd25lck5h
bWU9ImdlbnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpDb3B5cmln
aHRPd25lcj4KICAgPHhtcE1NOkhpc3Rvcnk+CiAgICA8cmRmOlNlcT4KICAgICA8cmRmOmxpCiAg
ICAgIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiCiAgICAgIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6
M0JBNTBBNTg4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIiCiAgICAgIHN0RXZ0OndoZW49IjIwMTEt
MDEtMjVUMTM6NTU6MTErMDE6MDAiCiAgICAgIHN0RXZ0OmNoYW5nZWQ9Ii9tZXRhZGF0YSIvPgog
ICAgPC9yZGY6U2VxPgogICA8L3htcE1NOkhpc3Rvcnk+CiAgPC9yZGY6RGVzY3JpcHRpb24+CiA8
L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+OtKncgAAABl0RVh0U29m
dHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAEoSURBVHjanFG7bYRAEF3+4iPgIEAisUmJ1lRg
d0AJXAfu4OQKOHfgDlwCrgA7IsURhOccwfqtxUnodAdaj/T0ZkfzeTMrkRXLsuwZdGCMPfC3JEmf
oJe6ro/nHHmtwTRNH+M4EqAADtznsWWOdKs4TdN7kC/LMoWCclawR4NvuD9N03Am6sr0duZl+P1y
+FqDhCvAdAou5/AeKv4UbK7ALUkSioIK7itwB+Ro+NS27dc5R9044uO8+xtnFOcgHttuEMdxPgwD
6bputwjvLvOurhBFEcX1+Z+Tvu9X11RvSC/59SH9SEQtCIICYMApDENfqNh1Xd/zvBPAgEJ4um3b
peM4DKiEiw3DoKZpMg7LsqhwA03TKoDpul6S/xi+reVQFEXocL8CDACw9G3Ar2D3RgAAAABJRU5E
rkJggg==";
$_IMAGES["video"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAKBmlUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOmRjPSJo
dHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0i
aHR0cDovL2lwdGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBs
dXNfMV89Imh0dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgICB4bWxuczp4bXA9
Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25z
LmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUu
Y29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgIHhtcFJpZ2h0czpNYXJrZWQ9IlRy
dWUiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMTEtMDEtMjVUMTM6NTU6MDkrMDE6MDAiCiAgIHht
cE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6OUFGMzRFNTc4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIi
CiAgIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6OUFGMzRFNTc4MjI4RTAxMTk4OUNDMEExQUQw
MkI1QzIiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo5QUYzNEU1NzgyMjhF
MDExOTg5Q0MwQTFBRDAyQjVDMiI+CiAgIDx4bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgIDxyZGY6
QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9ucyBB
dHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFsdD4K
ICAgPC94bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgPGRjOmNyZWF0b3I+CiAgICA8cmRmOlNlcT4K
ICAgICA8cmRmOmxpPkdlbnRsZWZhY2UgY3VzdG9tIHRvb2xiYXIgaWNvbnMgZGVzaWduPC9yZGY6
bGk+CiAgICA8L3JkZjpTZXE+CiAgIDwvZGM6Y3JlYXRvcj4KICAgPGRjOmRlc2NyaXB0aW9uPgog
ICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5XaXJlZnJhbWUg
bW9ubyB0b29sYmFyIGljb25zPC9yZGY6bGk+CiAgICA8L3JkZjpBbHQ+CiAgIDwvZGM6ZGVzY3Jp
cHRpb24+CiAgIDxkYzpzdWJqZWN0PgogICAgPHJkZjpCYWc+CiAgICAgPHJkZjpsaT5jdXN0b20g
aWNvbiBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPnRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgICA8cmRmOmxpPmN1c3RvbSBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+aW50ZXJmYWNl
IGRlc2lnbjwvcmRmOmxpPgogICAgIDxyZGY6bGk+dWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJk
ZjpsaT5ndWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjpsaT50YXNrYmFyIGljb25zPC9yZGY6
bGk+CiAgICA8L3JkZjpCYWc+CiAgIDwvZGM6c3ViamVjdD4KICAgPGRjOnJpZ2h0cz4KICAgIDxy
ZGY6QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9u
cyBBdHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFs
dD4KICAgPC9kYzpyaWdodHM+CiAgIDxJcHRjNHhtcENvcmU6Q3JlYXRvckNvbnRhY3RJbmZvCiAg
ICBJcHRjNHhtcENvcmU6Q2lVcmxXb3JrPSJodHRwOi8vd3d3LmdlbnRsZWZhY2UuY29tIi8+CiAg
IDxwbHVzXzFfOkltYWdlQ3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAg
cGx1c18xXzpJbWFnZUNyZWF0b3JOYW1lPSJnZW50bGVmYWNlLmNvbSIvPgogICAgPC9yZGY6U2Vx
PgogICA8L3BsdXNfMV86SW1hZ2VDcmVhdG9yPgogICA8cGx1c18xXzpDb3B5cmlnaHRPd25lcj4K
ICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgcGx1c18xXzpDb3B5cmlnaHRPd25lck5h
bWU9ImdlbnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpDb3B5cmln
aHRPd25lcj4KICAgPHhtcE1NOkhpc3Rvcnk+CiAgICA8cmRmOlNlcT4KICAgICA8cmRmOmxpCiAg
ICAgIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiCiAgICAgIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6
OUFGMzRFNTc4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIiCiAgICAgIHN0RXZ0OndoZW49IjIwMTEt
MDEtMjVUMTM6NTU6MDkrMDE6MDAiCiAgICAgIHN0RXZ0OmNoYW5nZWQ9Ii9tZXRhZGF0YSIvPgog
ICAgPC9yZGY6U2VxPgogICA8L3htcE1NOkhpc3Rvcnk+CiAgPC9yZGY6RGVzY3JpcHRpb24+CiA8
L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+M5nU3QAAABl0RVh0U29m
dHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAA8dEVYdEFMVFRhZwBUaGlzIGlzIHRoZSBpY29u
IGZyb20gR2VudGxlZmFjZS5jb20gZnJlZSBpY29ucyBzZXQuINhr6MQAAABEdEVYdENvcHlyaWdo
dABDcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRp
dmVze92woAAAAEVpVFh0RGVzY3JpcHRpb24AAAAAAFRoaXMgaXMgdGhlIGljb24gZnJvbSBHZW50
bGVmYWNlLmNvbSBmcmVlIGljb25zIHNldC4gvBH4GgAAAEhpVFh0Q29weXJpZ2h0AAAAAABDcmVh
dGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRpdmVzWILL
BQAAAMpJREFUeNpiYBhowIzMMTIyei8hIaEBxBdfvHjxgRgDGJE5urq6/2Hs////NwLxhKtXr+I1
iAmZ8+fPHzj++/dvPRDfV1dXTyDaBSoqKv+xKQK65AIQF967d+8AXgPk5eX/47MNaMgBIE58/Pjx
A5gYC7KC379/EwozByCuB+JErAaA/E4AHGBkZGxEFiDWBReAGgvfvXuHEQaEDPgA0vj58+cFRKUq
dnb2/zDMwcHRwMnJKUBSsmRiYnrPzMw8n4WFRYFh5ACAAAMASMxZaop4eY0AAAAASUVORK5CYII=";
$_IMAGES["webpage"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAKBmlUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOmRjPSJo
dHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0i
aHR0cDovL2lwdGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBs
dXNfMV89Imh0dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgICB4bWxuczp4bXA9
Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25z
LmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUu
Y29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgIHhtcFJpZ2h0czpNYXJrZWQ9IlRy
dWUiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMTEtMDEtMjVUMTM6NTU6MTArMDE6MDAiCiAgIHht
cE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MDkxM0JBNTc4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIi
CiAgIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MDkxM0JBNTc4MjI4RTAxMTk4OUNDMEExQUQw
MkI1QzIiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDowOTEzQkE1NzgyMjhF
MDExOTg5Q0MwQTFBRDAyQjVDMiI+CiAgIDx4bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgIDxyZGY6
QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9ucyBB
dHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFsdD4K
ICAgPC94bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgPGRjOmNyZWF0b3I+CiAgICA8cmRmOlNlcT4K
ICAgICA8cmRmOmxpPkdlbnRsZWZhY2UgY3VzdG9tIHRvb2xiYXIgaWNvbnMgZGVzaWduPC9yZGY6
bGk+CiAgICA8L3JkZjpTZXE+CiAgIDwvZGM6Y3JlYXRvcj4KICAgPGRjOmRlc2NyaXB0aW9uPgog
ICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5XaXJlZnJhbWUg
bW9ubyB0b29sYmFyIGljb25zPC9yZGY6bGk+CiAgICA8L3JkZjpBbHQ+CiAgIDwvZGM6ZGVzY3Jp
cHRpb24+CiAgIDxkYzpzdWJqZWN0PgogICAgPHJkZjpCYWc+CiAgICAgPHJkZjpsaT5jdXN0b20g
aWNvbiBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPnRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgICA8cmRmOmxpPmN1c3RvbSBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+aW50ZXJmYWNl
IGRlc2lnbjwvcmRmOmxpPgogICAgIDxyZGY6bGk+dWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJk
ZjpsaT5ndWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjpsaT50YXNrYmFyIGljb25zPC9yZGY6
bGk+CiAgICA8L3JkZjpCYWc+CiAgIDwvZGM6c3ViamVjdD4KICAgPGRjOnJpZ2h0cz4KICAgIDxy
ZGY6QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9u
cyBBdHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFs
dD4KICAgPC9kYzpyaWdodHM+CiAgIDxJcHRjNHhtcENvcmU6Q3JlYXRvckNvbnRhY3RJbmZvCiAg
ICBJcHRjNHhtcENvcmU6Q2lVcmxXb3JrPSJodHRwOi8vd3d3LmdlbnRsZWZhY2UuY29tIi8+CiAg
IDxwbHVzXzFfOkltYWdlQ3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAg
cGx1c18xXzpJbWFnZUNyZWF0b3JOYW1lPSJnZW50bGVmYWNlLmNvbSIvPgogICAgPC9yZGY6U2Vx
PgogICA8L3BsdXNfMV86SW1hZ2VDcmVhdG9yPgogICA8cGx1c18xXzpDb3B5cmlnaHRPd25lcj4K
ICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgcGx1c18xXzpDb3B5cmlnaHRPd25lck5h
bWU9ImdlbnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpDb3B5cmln
aHRPd25lcj4KICAgPHhtcE1NOkhpc3Rvcnk+CiAgICA8cmRmOlNlcT4KICAgICA8cmRmOmxpCiAg
ICAgIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiCiAgICAgIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6
MDkxM0JBNTc4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIiCiAgICAgIHN0RXZ0OndoZW49IjIwMTEt
MDEtMjVUMTM6NTU6MTArMDE6MDAiCiAgICAgIHN0RXZ0OmNoYW5nZWQ9Ii9tZXRhZGF0YSIvPgog
ICAgPC9yZGY6U2VxPgogICA8L3htcE1NOkhpc3Rvcnk+CiAgPC9yZGY6RGVzY3JpcHRpb24+CiA8
L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+IzdOLQAAABl0RVh0U29m
dHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAA8dEVYdEFMVFRhZwBUaGlzIGlzIHRoZSBpY29u
IGZyb20gR2VudGxlZmFjZS5jb20gZnJlZSBpY29ucyBzZXQuINhr6MQAAABEdEVYdENvcHlyaWdo
dABDcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRp
dmVze92woAAAAEVpVFh0RGVzY3JpcHRpb24AAAAAAFRoaXMgaXMgdGhlIGljb24gZnJvbSBHZW50
bGVmYWNlLmNvbSBmcmVlIGljb25zIHNldC4gvBH4GgAAAEhpVFh0Q29weXJpZ2h0AAAAAABDcmVh
dGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRpdmVzWILL
BQAAALZJREFUeNqsUzsOwyAMxW04BFsWNiTEDXqzNndkQ6LZMrMnohjJUaI0n0KfZMEzesY8CzDG
vADgyQoQY+xAax1ZBZppmvLGWgu/CJVS+eJmHMeim0k3d4CQUrZpeR8JnXO5U9LdcEMkHfbE94JA
fNUBwnt/yQvSbQpcxdcCQojZg2EYYMkJmF95gG6So+mw3+PLPE0BY/OEM37qQXWBEAIc8b9PATjn
VZ/pjkXSt3ykYAXRfQQYAFc03ZoNxfZ7AAAAAElFTkSuQmCC";


$_IMAGES["7z"] = $_IMAGES["archive"];
$_IMAGES["as"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAALJ2lUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6cGhvdG9z
aG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOnhtcD0i
aHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMu
YWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5j
b20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgIHhtbG5zOmRjPSJodHRwOi8vcHVy
bC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0iaHR0cDovL2lw
dGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBsdXNfMV89Imh0
dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgIHBob3Rvc2hvcDpIZWFkbGluZT0i
VXNlciBpbnRlcmZhY2UgbWFrZSB1cCIKICAgeG1wUmlnaHRzOk1hcmtlZD0iVHJ1ZSIKICAgeG1w
Ok1ldGFkYXRhRGF0ZT0iMjAxMS0wMS0yNVQxMzo1NToxNSswMTowMCIKICAgeG1wTU06SW5zdGFu
Y2VJRD0ieG1wLmlpZDozMEE5MDE1QjgyMjhFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgeG1wTU06
RG9jdW1lbnRJRD0ieG1wLmRpZDoxNjhCODhENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAg
eG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjE2OEI4OEQ1RTAyN0UwMTE5ODlDQzBB
MUFEMDJCNUMyIj4KICAgPHhtcFJpZ2h0czpVc2FnZVRlcm1zPgogICAgPHJkZjpBbHQ+CiAgICAg
PHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9u
LU5vbkNvbW1lcmNpYWwgbGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L3htcFJp
Z2h0czpVc2FnZVRlcm1zPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxy
ZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJzYXZlZCIKICAgICAgc3RFdnQ6aW5zdGFuY2VJRD0i
eG1wLmlpZDoxNjhCODhENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgICAgc3RFdnQ6d2hl
bj0iMjAxMS0wMS0yNFQxODozOTowMiswMTowMCIKICAgICAgc3RFdnQ6Y2hhbmdlZD0iL21ldGFk
YXRhIi8+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2
dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjMwQTkwMTVCODIyOEUwMTE5ODlDQzBBMUFEMDJCNUMyIgog
ICAgICBzdEV2dDp3aGVuPSIyMDExLTAxLTI1VDEzOjU1OjE1KzAxOjAwIgogICAgICBzdEV2dDpj
aGFuZ2VkPSIvbWV0YWRhdGEiLz4KICAgIDwvcmRmOlNlcT4KICAgPC94bXBNTTpIaXN0b3J5Pgog
ICA8ZGM6Y3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGk+R2VudGxlZmFjZSBjdXN0
b20gdG9vbGJhciBpY29ucyBkZXNpZ248L3JkZjpsaT4KICAgIDwvcmRmOlNlcT4KICAgPC9kYzpj
cmVhdG9yPgogICA8ZGM6ZGVzY3JpcHRpb24+CiAgICA8cmRmOkFsdD4KICAgICA8cmRmOmxpIHht
bDpsYW5nPSJ4LWRlZmF1bHQiPldpcmVmcmFtZSBtb25vIHRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgIDwvcmRmOkFsdD4KICAgPC9kYzpkZXNjcmlwdGlvbj4KICAgPGRjOnN1YmplY3Q+CiAgICA8
cmRmOkJhZz4KICAgICA8cmRmOmxpPmN1c3RvbSBpY29uIGRlc2lnbjwvcmRmOmxpPgogICAgIDxy
ZGY6bGk+dG9vbGJhciBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+Y3VzdG9tIGljb25zPC9y
ZGY6bGk+CiAgICAgPHJkZjpsaT5pbnRlcmZhY2UgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjps
aT51aSBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPmd1aSBkZXNpZ248L3JkZjpsaT4KICAg
ICA8cmRmOmxpPnRhc2tiYXIgaWNvbnM8L3JkZjpsaT4KICAgIDwvcmRmOkJhZz4KICAgPC9kYzpz
dWJqZWN0PgogICA8ZGM6cmlnaHRzPgogICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFu
Zz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uLU5vbkNvbW1lcmNpYWwg
bGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L2RjOnJpZ2h0cz4KICAgPElwdGM0
eG1wQ29yZTpDcmVhdG9yQ29udGFjdEluZm8KICAgIElwdGM0eG1wQ29yZTpDaVVybFdvcms9Imh0
dHA6Ly93d3cuZ2VudGxlZmFjZS5jb20iLz4KICAgPHBsdXNfMV86SW1hZ2VDcmVhdG9yPgogICAg
PHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBwbHVzXzFfOkltYWdlQ3JlYXRvck5hbWU9Imdl
bnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpJbWFnZUNyZWF0b3I+
CiAgIDxwbHVzXzFfOkNvcHlyaWdodE93bmVyPgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQog
ICAgICBwbHVzXzFfOkNvcHlyaWdodE93bmVyTmFtZT0iZ2VudGxlZmFjZS5jb20iLz4KICAgIDwv
cmRmOlNlcT4KICAgPC9wbHVzXzFfOkNvcHlyaWdodE93bmVyPgogIDwvcmRmOkRlc2NyaXB0aW9u
PgogPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KPD94cGFja2V0IGVuZD0iciI/PvP0DzcAAAAZdEVY
dFNvZnR3YXJlAEFkb2JlIEltYWdlUmVhZHlxyWU8AAAA4UlEQVR42qRSsQ3CMBC0LbcRlpIqUiQX
adLhDTISbMAGYQNGYAU2gC4lI8T0Scx9pKBYFNjmpdf/W7733b8Z+9O4MWbgnKsUsHPOynmeY8E3
eLtGOY5j7MPtNsppmhgkmL7vHzFdmqbZQ8Kd1XXtUgdIWEEMVtNan+BdaAPCeg0w0B38UFXVJbQB
K8vSk4D6Smfwn0zontwyIKOtYKjBElie5x8GyDuqi6IIkkB3PQbIXwhna+1RKaWRP7cAnPMvBlmW
Ja+RsCLhJ3rzWtYopWxjwcDsl18shBhQq0QS9i3AADUVZzeru1sfAAAAAElFTkSuQmCC";
$_IMAGES["avi"] = $_IMAGES["video"];
$_IMAGES["bz2"] = $_IMAGES["archive"];
$_IMAGES["c"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAALJ2lUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6cGhvdG9z
aG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOnhtcD0i
aHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMu
YWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5j
b20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgIHhtbG5zOmRjPSJodHRwOi8vcHVy
bC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0iaHR0cDovL2lw
dGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBsdXNfMV89Imh0
dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgIHBob3Rvc2hvcDpIZWFkbGluZT0i
VXNlciBpbnRlcmZhY2UgbWFrZSB1cCIKICAgeG1wUmlnaHRzOk1hcmtlZD0iVHJ1ZSIKICAgeG1w
Ok1ldGFkYXRhRGF0ZT0iMjAxMS0wMS0yNVQxMzo1NToxNSswMTowMCIKICAgeG1wTU06SW5zdGFu
Y2VJRD0ieG1wLmlpZDozMEE5MDE1QjgyMjhFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgeG1wTU06
RG9jdW1lbnRJRD0ieG1wLmRpZDoxNjhCODhENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAg
eG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjE2OEI4OEQ1RTAyN0UwMTE5ODlDQzBB
MUFEMDJCNUMyIj4KICAgPHhtcFJpZ2h0czpVc2FnZVRlcm1zPgogICAgPHJkZjpBbHQ+CiAgICAg
PHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9u
LU5vbkNvbW1lcmNpYWwgbGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L3htcFJp
Z2h0czpVc2FnZVRlcm1zPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxy
ZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJzYXZlZCIKICAgICAgc3RFdnQ6aW5zdGFuY2VJRD0i
eG1wLmlpZDoxNjhCODhENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgICAgc3RFdnQ6d2hl
bj0iMjAxMS0wMS0yNFQxODozOTowMiswMTowMCIKICAgICAgc3RFdnQ6Y2hhbmdlZD0iL21ldGFk
YXRhIi8+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2
dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjMwQTkwMTVCODIyOEUwMTE5ODlDQzBBMUFEMDJCNUMyIgog
ICAgICBzdEV2dDp3aGVuPSIyMDExLTAxLTI1VDEzOjU1OjE1KzAxOjAwIgogICAgICBzdEV2dDpj
aGFuZ2VkPSIvbWV0YWRhdGEiLz4KICAgIDwvcmRmOlNlcT4KICAgPC94bXBNTTpIaXN0b3J5Pgog
ICA8ZGM6Y3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGk+R2VudGxlZmFjZSBjdXN0
b20gdG9vbGJhciBpY29ucyBkZXNpZ248L3JkZjpsaT4KICAgIDwvcmRmOlNlcT4KICAgPC9kYzpj
cmVhdG9yPgogICA8ZGM6ZGVzY3JpcHRpb24+CiAgICA8cmRmOkFsdD4KICAgICA8cmRmOmxpIHht
bDpsYW5nPSJ4LWRlZmF1bHQiPldpcmVmcmFtZSBtb25vIHRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgIDwvcmRmOkFsdD4KICAgPC9kYzpkZXNjcmlwdGlvbj4KICAgPGRjOnN1YmplY3Q+CiAgICA8
cmRmOkJhZz4KICAgICA8cmRmOmxpPmN1c3RvbSBpY29uIGRlc2lnbjwvcmRmOmxpPgogICAgIDxy
ZGY6bGk+dG9vbGJhciBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+Y3VzdG9tIGljb25zPC9y
ZGY6bGk+CiAgICAgPHJkZjpsaT5pbnRlcmZhY2UgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjps
aT51aSBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPmd1aSBkZXNpZ248L3JkZjpsaT4KICAg
ICA8cmRmOmxpPnRhc2tiYXIgaWNvbnM8L3JkZjpsaT4KICAgIDwvcmRmOkJhZz4KICAgPC9kYzpz
dWJqZWN0PgogICA8ZGM6cmlnaHRzPgogICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFu
Zz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uLU5vbkNvbW1lcmNpYWwg
bGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L2RjOnJpZ2h0cz4KICAgPElwdGM0
eG1wQ29yZTpDcmVhdG9yQ29udGFjdEluZm8KICAgIElwdGM0eG1wQ29yZTpDaVVybFdvcms9Imh0
dHA6Ly93d3cuZ2VudGxlZmFjZS5jb20iLz4KICAgPHBsdXNfMV86SW1hZ2VDcmVhdG9yPgogICAg
PHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBwbHVzXzFfOkltYWdlQ3JlYXRvck5hbWU9Imdl
bnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpJbWFnZUNyZWF0b3I+
CiAgIDxwbHVzXzFfOkNvcHlyaWdodE93bmVyPgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQog
ICAgICBwbHVzXzFfOkNvcHlyaWdodE93bmVyTmFtZT0iZ2VudGxlZmFjZS5jb20iLz4KICAgIDwv
cmRmOlNlcT4KICAgPC9wbHVzXzFfOkNvcHlyaWdodE93bmVyPgogIDwvcmRmOkRlc2NyaXB0aW9u
PgogPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KPD94cGFja2V0IGVuZD0iciI/PvP0DzcAAAAZdEVY
dFNvZnR3YXJlAEFkb2JlIEltYWdlUmVhZHlxyWU8AAAA4UlEQVR42qRSsQ3CMBC0LbcRlpIqUiQX
adLhDTISbMAGYQNGYAU2gC4lI8T0Scx9pKBYFNjmpdf/W7733b8Z+9O4MWbgnKsUsHPOynmeY8E3
eLtGOY5j7MPtNsppmhgkmL7vHzFdmqbZQ8Kd1XXtUgdIWEEMVtNan+BdaAPCeg0w0B38UFXVJbQB
K8vSk4D6Smfwn0zontwyIKOtYKjBElie5x8GyDuqi6IIkkB3PQbIXwhna+1RKaWRP7cAnPMvBlmW
Ja+RsCLhJ3rzWtYopWxjwcDsl18shBhQq0QS9i3AADUVZzeru1sfAAAAAElFTkSuQmCC";
$_IMAGES["cab"] = $_IMAGES["archive"];
$_IMAGES["cpp"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAALJ2lUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6cGhvdG9z
aG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOnhtcD0i
aHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMu
YWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5j
b20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgIHhtbG5zOmRjPSJodHRwOi8vcHVy
bC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0iaHR0cDovL2lw
dGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBsdXNfMV89Imh0
dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgIHBob3Rvc2hvcDpIZWFkbGluZT0i
VXNlciBpbnRlcmZhY2UgbWFrZSB1cCIKICAgeG1wUmlnaHRzOk1hcmtlZD0iVHJ1ZSIKICAgeG1w
Ok1ldGFkYXRhRGF0ZT0iMjAxMS0wMS0yNVQxMzo1NToxNSswMTowMCIKICAgeG1wTU06SW5zdGFu
Y2VJRD0ieG1wLmlpZDozMEE5MDE1QjgyMjhFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgeG1wTU06
RG9jdW1lbnRJRD0ieG1wLmRpZDoxNjhCODhENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAg
eG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjE2OEI4OEQ1RTAyN0UwMTE5ODlDQzBB
MUFEMDJCNUMyIj4KICAgPHhtcFJpZ2h0czpVc2FnZVRlcm1zPgogICAgPHJkZjpBbHQ+CiAgICAg
PHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9u
LU5vbkNvbW1lcmNpYWwgbGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L3htcFJp
Z2h0czpVc2FnZVRlcm1zPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxy
ZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJzYXZlZCIKICAgICAgc3RFdnQ6aW5zdGFuY2VJRD0i
eG1wLmlpZDoxNjhCODhENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgICAgc3RFdnQ6d2hl
bj0iMjAxMS0wMS0yNFQxODozOTowMiswMTowMCIKICAgICAgc3RFdnQ6Y2hhbmdlZD0iL21ldGFk
YXRhIi8+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2
dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjMwQTkwMTVCODIyOEUwMTE5ODlDQzBBMUFEMDJCNUMyIgog
ICAgICBzdEV2dDp3aGVuPSIyMDExLTAxLTI1VDEzOjU1OjE1KzAxOjAwIgogICAgICBzdEV2dDpj
aGFuZ2VkPSIvbWV0YWRhdGEiLz4KICAgIDwvcmRmOlNlcT4KICAgPC94bXBNTTpIaXN0b3J5Pgog
ICA8ZGM6Y3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGk+R2VudGxlZmFjZSBjdXN0
b20gdG9vbGJhciBpY29ucyBkZXNpZ248L3JkZjpsaT4KICAgIDwvcmRmOlNlcT4KICAgPC9kYzpj
cmVhdG9yPgogICA8ZGM6ZGVzY3JpcHRpb24+CiAgICA8cmRmOkFsdD4KICAgICA8cmRmOmxpIHht
bDpsYW5nPSJ4LWRlZmF1bHQiPldpcmVmcmFtZSBtb25vIHRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgIDwvcmRmOkFsdD4KICAgPC9kYzpkZXNjcmlwdGlvbj4KICAgPGRjOnN1YmplY3Q+CiAgICA8
cmRmOkJhZz4KICAgICA8cmRmOmxpPmN1c3RvbSBpY29uIGRlc2lnbjwvcmRmOmxpPgogICAgIDxy
ZGY6bGk+dG9vbGJhciBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+Y3VzdG9tIGljb25zPC9y
ZGY6bGk+CiAgICAgPHJkZjpsaT5pbnRlcmZhY2UgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjps
aT51aSBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPmd1aSBkZXNpZ248L3JkZjpsaT4KICAg
ICA8cmRmOmxpPnRhc2tiYXIgaWNvbnM8L3JkZjpsaT4KICAgIDwvcmRmOkJhZz4KICAgPC9kYzpz
dWJqZWN0PgogICA8ZGM6cmlnaHRzPgogICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFu
Zz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uLU5vbkNvbW1lcmNpYWwg
bGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L2RjOnJpZ2h0cz4KICAgPElwdGM0
eG1wQ29yZTpDcmVhdG9yQ29udGFjdEluZm8KICAgIElwdGM0eG1wQ29yZTpDaVVybFdvcms9Imh0
dHA6Ly93d3cuZ2VudGxlZmFjZS5jb20iLz4KICAgPHBsdXNfMV86SW1hZ2VDcmVhdG9yPgogICAg
PHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBwbHVzXzFfOkltYWdlQ3JlYXRvck5hbWU9Imdl
bnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpJbWFnZUNyZWF0b3I+
CiAgIDxwbHVzXzFfOkNvcHlyaWdodE93bmVyPgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQog
ICAgICBwbHVzXzFfOkNvcHlyaWdodE93bmVyTmFtZT0iZ2VudGxlZmFjZS5jb20iLz4KICAgIDwv
cmRmOlNlcT4KICAgPC9wbHVzXzFfOkNvcHlyaWdodE93bmVyPgogIDwvcmRmOkRlc2NyaXB0aW9u
PgogPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KPD94cGFja2V0IGVuZD0iciI/PvP0DzcAAAAZdEVY
dFNvZnR3YXJlAEFkb2JlIEltYWdlUmVhZHlxyWU8AAAA4UlEQVR42qRSsQ3CMBC0LbcRlpIqUiQX
adLhDTISbMAGYQNGYAU2gC4lI8T0Scx9pKBYFNjmpdf/W7733b8Z+9O4MWbgnKsUsHPOynmeY8E3
eLtGOY5j7MPtNsppmhgkmL7vHzFdmqbZQ8Kd1XXtUgdIWEEMVtNan+BdaAPCeg0w0B38UFXVJbQB
K8vSk4D6Smfwn0zontwyIKOtYKjBElie5x8GyDuqi6IIkkB3PQbIXwhna+1RKaWRP7cAnPMvBlmW
Ja+RsCLhJ3rzWtYopWxjwcDsl18shBhQq0QS9i3AADUVZzeru1sfAAAAAElFTkSuQmCC";
$_IMAGES["cs"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAALJ2lUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6cGhvdG9z
aG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOnhtcD0i
aHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMu
YWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5j
b20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgIHhtbG5zOmRjPSJodHRwOi8vcHVy
bC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0iaHR0cDovL2lw
dGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBsdXNfMV89Imh0
dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgIHBob3Rvc2hvcDpIZWFkbGluZT0i
VXNlciBpbnRlcmZhY2UgbWFrZSB1cCIKICAgeG1wUmlnaHRzOk1hcmtlZD0iVHJ1ZSIKICAgeG1w
Ok1ldGFkYXRhRGF0ZT0iMjAxMS0wMS0yNVQxMzo1NToxNSswMTowMCIKICAgeG1wTU06SW5zdGFu
Y2VJRD0ieG1wLmlpZDozMEE5MDE1QjgyMjhFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgeG1wTU06
RG9jdW1lbnRJRD0ieG1wLmRpZDoxNjhCODhENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAg
eG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjE2OEI4OEQ1RTAyN0UwMTE5ODlDQzBB
MUFEMDJCNUMyIj4KICAgPHhtcFJpZ2h0czpVc2FnZVRlcm1zPgogICAgPHJkZjpBbHQ+CiAgICAg
PHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9u
LU5vbkNvbW1lcmNpYWwgbGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L3htcFJp
Z2h0czpVc2FnZVRlcm1zPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxy
ZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJzYXZlZCIKICAgICAgc3RFdnQ6aW5zdGFuY2VJRD0i
eG1wLmlpZDoxNjhCODhENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgICAgc3RFdnQ6d2hl
bj0iMjAxMS0wMS0yNFQxODozOTowMiswMTowMCIKICAgICAgc3RFdnQ6Y2hhbmdlZD0iL21ldGFk
YXRhIi8+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2
dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjMwQTkwMTVCODIyOEUwMTE5ODlDQzBBMUFEMDJCNUMyIgog
ICAgICBzdEV2dDp3aGVuPSIyMDExLTAxLTI1VDEzOjU1OjE1KzAxOjAwIgogICAgICBzdEV2dDpj
aGFuZ2VkPSIvbWV0YWRhdGEiLz4KICAgIDwvcmRmOlNlcT4KICAgPC94bXBNTTpIaXN0b3J5Pgog
ICA8ZGM6Y3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGk+R2VudGxlZmFjZSBjdXN0
b20gdG9vbGJhciBpY29ucyBkZXNpZ248L3JkZjpsaT4KICAgIDwvcmRmOlNlcT4KICAgPC9kYzpj
cmVhdG9yPgogICA8ZGM6ZGVzY3JpcHRpb24+CiAgICA8cmRmOkFsdD4KICAgICA8cmRmOmxpIHht
bDpsYW5nPSJ4LWRlZmF1bHQiPldpcmVmcmFtZSBtb25vIHRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgIDwvcmRmOkFsdD4KICAgPC9kYzpkZXNjcmlwdGlvbj4KICAgPGRjOnN1YmplY3Q+CiAgICA8
cmRmOkJhZz4KICAgICA8cmRmOmxpPmN1c3RvbSBpY29uIGRlc2lnbjwvcmRmOmxpPgogICAgIDxy
ZGY6bGk+dG9vbGJhciBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+Y3VzdG9tIGljb25zPC9y
ZGY6bGk+CiAgICAgPHJkZjpsaT5pbnRlcmZhY2UgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjps
aT51aSBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPmd1aSBkZXNpZ248L3JkZjpsaT4KICAg
ICA8cmRmOmxpPnRhc2tiYXIgaWNvbnM8L3JkZjpsaT4KICAgIDwvcmRmOkJhZz4KICAgPC9kYzpz
dWJqZWN0PgogICA8ZGM6cmlnaHRzPgogICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFu
Zz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uLU5vbkNvbW1lcmNpYWwg
bGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L2RjOnJpZ2h0cz4KICAgPElwdGM0
eG1wQ29yZTpDcmVhdG9yQ29udGFjdEluZm8KICAgIElwdGM0eG1wQ29yZTpDaVVybFdvcms9Imh0
dHA6Ly93d3cuZ2VudGxlZmFjZS5jb20iLz4KICAgPHBsdXNfMV86SW1hZ2VDcmVhdG9yPgogICAg
PHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBwbHVzXzFfOkltYWdlQ3JlYXRvck5hbWU9Imdl
bnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpJbWFnZUNyZWF0b3I+
CiAgIDxwbHVzXzFfOkNvcHlyaWdodE93bmVyPgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQog
ICAgICBwbHVzXzFfOkNvcHlyaWdodE93bmVyTmFtZT0iZ2VudGxlZmFjZS5jb20iLz4KICAgIDwv
cmRmOlNlcT4KICAgPC9wbHVzXzFfOkNvcHlyaWdodE93bmVyPgogIDwvcmRmOkRlc2NyaXB0aW9u
PgogPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KPD94cGFja2V0IGVuZD0iciI/PvP0DzcAAAAZdEVY
dFNvZnR3YXJlAEFkb2JlIEltYWdlUmVhZHlxyWU8AAAA4UlEQVR42qRSsQ3CMBC0LbcRlpIqUiQX
adLhDTISbMAGYQNGYAU2gC4lI8T0Scx9pKBYFNjmpdf/W7733b8Z+9O4MWbgnKsUsHPOynmeY8E3
eLtGOY5j7MPtNsppmhgkmL7vHzFdmqbZQ8Kd1XXtUgdIWEEMVtNan+BdaAPCeg0w0B38UFXVJbQB
K8vSk4D6Smfwn0zontwyIKOtYKjBElie5x8GyDuqi6IIkkB3PQbIXwhna+1RKaWRP7cAnPMvBlmW
Ja+RsCLhJ3rzWtYopWxjwcDsl18shBhQq0QS9i3AADUVZzeru1sfAAAAAElFTkSuQmCC";
$_IMAGES["css"] = $_IMAGES["code"];
$_IMAGES["doc"] = $_IMAGES["textdocument"];
$_IMAGES["docx"] = $_IMAGES["textdocument"];
$_IMAGES["exe"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAALJ2lUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6cGhvdG9z
aG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOnhtcD0i
aHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMu
YWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5j
b20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgIHhtbG5zOmRjPSJodHRwOi8vcHVy
bC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0iaHR0cDovL2lw
dGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBsdXNfMV89Imh0
dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgIHBob3Rvc2hvcDpIZWFkbGluZT0i
VXNlciBpbnRlcmZhY2UgbWFrZSB1cCIKICAgeG1wUmlnaHRzOk1hcmtlZD0iVHJ1ZSIKICAgeG1w
Ok1ldGFkYXRhRGF0ZT0iMjAxMS0wMS0yNVQxMzo1NToxNSswMTowMCIKICAgeG1wTU06SW5zdGFu
Y2VJRD0ieG1wLmlpZDo3RDAwMDc1QjgyMjhFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgeG1wTU06
RG9jdW1lbnRJRD0ieG1wLmRpZDoyMzAxOTJENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAg
eG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjIzMDE5MkQ1RTAyN0UwMTE5ODlDQzBB
MUFEMDJCNUMyIj4KICAgPHhtcFJpZ2h0czpVc2FnZVRlcm1zPgogICAgPHJkZjpBbHQ+CiAgICAg
PHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9u
LU5vbkNvbW1lcmNpYWwgbGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L3htcFJp
Z2h0czpVc2FnZVRlcm1zPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxy
ZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJzYXZlZCIKICAgICAgc3RFdnQ6aW5zdGFuY2VJRD0i
eG1wLmlpZDoyMzAxOTJENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgICAgc3RFdnQ6d2hl
bj0iMjAxMS0wMS0yNFQxODozOTowMyswMTowMCIKICAgICAgc3RFdnQ6Y2hhbmdlZD0iL21ldGFk
YXRhIi8+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2
dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjdEMDAwNzVCODIyOEUwMTE5ODlDQzBBMUFEMDJCNUMyIgog
ICAgICBzdEV2dDp3aGVuPSIyMDExLTAxLTI1VDEzOjU1OjE1KzAxOjAwIgogICAgICBzdEV2dDpj
aGFuZ2VkPSIvbWV0YWRhdGEiLz4KICAgIDwvcmRmOlNlcT4KICAgPC94bXBNTTpIaXN0b3J5Pgog
ICA8ZGM6Y3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGk+R2VudGxlZmFjZSBjdXN0
b20gdG9vbGJhciBpY29ucyBkZXNpZ248L3JkZjpsaT4KICAgIDwvcmRmOlNlcT4KICAgPC9kYzpj
cmVhdG9yPgogICA8ZGM6ZGVzY3JpcHRpb24+CiAgICA8cmRmOkFsdD4KICAgICA8cmRmOmxpIHht
bDpsYW5nPSJ4LWRlZmF1bHQiPldpcmVmcmFtZSBtb25vIHRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgIDwvcmRmOkFsdD4KICAgPC9kYzpkZXNjcmlwdGlvbj4KICAgPGRjOnN1YmplY3Q+CiAgICA8
cmRmOkJhZz4KICAgICA8cmRmOmxpPmN1c3RvbSBpY29uIGRlc2lnbjwvcmRmOmxpPgogICAgIDxy
ZGY6bGk+dG9vbGJhciBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+Y3VzdG9tIGljb25zPC9y
ZGY6bGk+CiAgICAgPHJkZjpsaT5pbnRlcmZhY2UgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjps
aT51aSBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPmd1aSBkZXNpZ248L3JkZjpsaT4KICAg
ICA8cmRmOmxpPnRhc2tiYXIgaWNvbnM8L3JkZjpsaT4KICAgIDwvcmRmOkJhZz4KICAgPC9kYzpz
dWJqZWN0PgogICA8ZGM6cmlnaHRzPgogICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFu
Zz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uLU5vbkNvbW1lcmNpYWwg
bGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L2RjOnJpZ2h0cz4KICAgPElwdGM0
eG1wQ29yZTpDcmVhdG9yQ29udGFjdEluZm8KICAgIElwdGM0eG1wQ29yZTpDaVVybFdvcms9Imh0
dHA6Ly93d3cuZ2VudGxlZmFjZS5jb20iLz4KICAgPHBsdXNfMV86SW1hZ2VDcmVhdG9yPgogICAg
PHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBwbHVzXzFfOkltYWdlQ3JlYXRvck5hbWU9Imdl
bnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpJbWFnZUNyZWF0b3I+
CiAgIDxwbHVzXzFfOkNvcHlyaWdodE93bmVyPgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQog
ICAgICBwbHVzXzFfOkNvcHlyaWdodE93bmVyTmFtZT0iZ2VudGxlZmFjZS5jb20iLz4KICAgIDwv
cmRmOlNlcT4KICAgPC9wbHVzXzFfOkNvcHlyaWdodE93bmVyPgogIDwvcmRmOkRlc2NyaXB0aW9u
PgogPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KPD94cGFja2V0IGVuZD0iciI/PvKBPc0AAAAZdEVY
dFNvZnR3YXJlAEFkb2JlIEltYWdlUmVhZHlxyWU8AAAAj0lEQVR42tyTMQ6AIAxFKWmYPQQLm9yA
o3sD3Vi4gx4AqEVD4locTPwJ+enw2t8mKPVS4L3fAWAagYnowFqrFF74he6Yc5YODk/HUoriFXyM
cZN0cc7NvMJ6JUgpbdZakjTggcDMnaCpu0SNed+gH3HgmBfzhwSfr6CMMYSIQQozMzcWtNY719Pg
bz5OAQYAGzdvi9ZENIkAAAAASUVORK5CYII=";
$_IMAGES["encrypto"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAACXBIWXMAAAsTAAALEwEAmpwYAAAK
T2lDQ1BQaG90b3Nob3AgSUNDIHByb2ZpbGUAAHjanVNnVFPpFj333vRCS4iAlEtvUhUIIFJCi4AU
kSYqIQkQSoghodkVUcERRUUEG8igiAOOjoCMFVEsDIoK2AfkIaKOg6OIisr74Xuja9a89+bN/rXX
Pues852zzwfACAyWSDNRNYAMqUIeEeCDx8TG4eQuQIEKJHAAEAizZCFz/SMBAPh+PDwrIsAHvgAB
eNMLCADATZvAMByH/w/qQplcAYCEAcB0kThLCIAUAEB6jkKmAEBGAYCdmCZTAKAEAGDLY2LjAFAt
AGAnf+bTAICd+Jl7AQBblCEVAaCRACATZYhEAGg7AKzPVopFAFgwABRmS8Q5ANgtADBJV2ZIALC3
AMDOEAuyAAgMADBRiIUpAAR7AGDIIyN4AISZABRG8lc88SuuEOcqAAB4mbI8uSQ5RYFbCC1xB1dX
Lh4ozkkXKxQ2YQJhmkAuwnmZGTKBNA/g88wAAKCRFRHgg/P9eM4Ors7ONo62Dl8t6r8G/yJiYuP+
5c+rcEAAAOF0ftH+LC+zGoA7BoBt/qIl7gRoXgugdfeLZrIPQLUAoOnaV/Nw+H48PEWhkLnZ2eXk
5NhKxEJbYcpXff5nwl/AV/1s+X48/Pf14L7iJIEyXYFHBPjgwsz0TKUcz5IJhGLc5o9H/LcL//wd
0yLESWK5WCoU41EScY5EmozzMqUiiUKSKcUl0v9k4t8s+wM+3zUAsGo+AXuRLahdYwP2SycQWHTA
4vcAAPK7b8HUKAgDgGiD4c93/+8//UegJQCAZkmScQAAXkQkLlTKsz/HCAAARKCBKrBBG/TBGCzA
BhzBBdzBC/xgNoRCJMTCQhBCCmSAHHJgKayCQiiGzbAdKmAv1EAdNMBRaIaTcA4uwlW4Dj1wD/ph
CJ7BKLyBCQRByAgTYSHaiAFiilgjjggXmYX4IcFIBBKLJCDJiBRRIkuRNUgxUopUIFVIHfI9cgI5
h1xGupE7yAAygvyGvEcxlIGyUT3UDLVDuag3GoRGogvQZHQxmo8WoJvQcrQaPYw2oefQq2gP2o8+
Q8cwwOgYBzPEbDAuxsNCsTgsCZNjy7EirAyrxhqwVqwDu4n1Y8+xdwQSgUXACTYEd0IgYR5BSFhM
WE7YSKggHCQ0EdoJNwkDhFHCJyKTqEu0JroR+cQYYjIxh1hILCPWEo8TLxB7iEPENyQSiUMyJ7mQ
AkmxpFTSEtJG0m5SI+ksqZs0SBojk8naZGuyBzmULCAryIXkneTD5DPkG+Qh8lsKnWJAcaT4U+Io
UspqShnlEOU05QZlmDJBVaOaUt2ooVQRNY9aQq2htlKvUYeoEzR1mjnNgxZJS6WtopXTGmgXaPdp
r+h0uhHdlR5Ol9BX0svpR+iX6AP0dwwNhhWDx4hnKBmbGAcYZxl3GK+YTKYZ04sZx1QwNzHrmOeZ
D5lvVVgqtip8FZHKCpVKlSaVGyovVKmqpqreqgtV81XLVI+pXlN9rkZVM1PjqQnUlqtVqp1Q61Mb
U2epO6iHqmeob1Q/pH5Z/YkGWcNMw09DpFGgsV/jvMYgC2MZs3gsIWsNq4Z1gTXEJrHN2Xx2KruY
/R27iz2qqaE5QzNKM1ezUvOUZj8H45hx+Jx0TgnnKKeX836K3hTvKeIpG6Y0TLkxZVxrqpaXllir
SKtRq0frvTau7aedpr1Fu1n7gQ5Bx0onXCdHZ4/OBZ3nU9lT3acKpxZNPTr1ri6qa6UbobtEd79u
p+6Ynr5egJ5Mb6feeb3n+hx9L/1U/W36p/VHDFgGswwkBtsMzhg8xTVxbzwdL8fb8VFDXcNAQ6Vh
lWGX4YSRudE8o9VGjUYPjGnGXOMk423GbcajJgYmISZLTepN7ppSTbmmKaY7TDtMx83MzaLN1pk1
mz0x1zLnm+eb15vft2BaeFostqi2uGVJsuRaplnutrxuhVo5WaVYVVpds0atna0l1rutu6cRp7lO
k06rntZnw7Dxtsm2qbcZsOXYBtuutm22fWFnYhdnt8Wuw+6TvZN9un2N/T0HDYfZDqsdWh1+c7Ry
FDpWOt6azpzuP33F9JbpL2dYzxDP2DPjthPLKcRpnVOb00dnF2e5c4PziIuJS4LLLpc+Lpsbxt3I
veRKdPVxXeF60vWdm7Obwu2o26/uNu5p7ofcn8w0nymeWTNz0MPIQ+BR5dE/C5+VMGvfrH5PQ0+B
Z7XnIy9jL5FXrdewt6V3qvdh7xc+9j5yn+M+4zw33jLeWV/MN8C3yLfLT8Nvnl+F30N/I/9k/3r/
0QCngCUBZwOJgUGBWwL7+Hp8Ib+OPzrbZfay2e1BjKC5QRVBj4KtguXBrSFoyOyQrSH355jOkc5p
DoVQfujW0Adh5mGLw34MJ4WHhVeGP45wiFga0TGXNXfR3ENz30T6RJZE3ptnMU85ry1KNSo+qi5q
PNo3ujS6P8YuZlnM1VidWElsSxw5LiquNm5svt/87fOH4p3iC+N7F5gvyF1weaHOwvSFpxapLhIs
OpZATIhOOJTwQRAqqBaMJfITdyWOCnnCHcJnIi/RNtGI2ENcKh5O8kgqTXqS7JG8NXkkxTOlLOW5
hCepkLxMDUzdmzqeFpp2IG0yPTq9MYOSkZBxQqohTZO2Z+pn5mZ2y6xlhbL+xW6Lty8elQfJa7OQ
rAVZLQq2QqboVFoo1yoHsmdlV2a/zYnKOZarnivN7cyzytuQN5zvn//tEsIS4ZK2pYZLVy0dWOa9
rGo5sjxxedsK4xUFK4ZWBqw8uIq2Km3VT6vtV5eufr0mek1rgV7ByoLBtQFr6wtVCuWFfevc1+1d
T1gvWd+1YfqGnRs+FYmKrhTbF5cVf9go3HjlG4dvyr+Z3JS0qavEuWTPZtJm6ebeLZ5bDpaql+aX
Dm4N2dq0Dd9WtO319kXbL5fNKNu7g7ZDuaO/PLi8ZafJzs07P1SkVPRU+lQ27tLdtWHX+G7R7ht7
vPY07NXbW7z3/T7JvttVAVVN1WbVZftJ+7P3P66Jqun4lvttXa1ObXHtxwPSA/0HIw6217nU1R3S
PVRSj9Yr60cOxx++/p3vdy0NNg1VjZzG4iNwRHnk6fcJ3/ceDTradox7rOEH0x92HWcdL2pCmvKa
RptTmvtbYlu6T8w+0dbq3nr8R9sfD5w0PFl5SvNUyWna6YLTk2fyz4ydlZ19fi753GDborZ752PO
32oPb++6EHTh0kX/i+c7vDvOXPK4dPKy2+UTV7hXmq86X23qdOo8/pPTT8e7nLuarrlca7nuer21
e2b36RueN87d9L158Rb/1tWeOT3dvfN6b/fF9/XfFt1+cif9zsu72Xcn7q28T7xf9EDtQdlD3YfV
P1v+3Njv3H9qwHeg89HcR/cGhYPP/pH1jw9DBY+Zj8uGDYbrnjg+OTniP3L96fynQ89kzyaeF/6i
/suuFxYvfvjV69fO0ZjRoZfyl5O/bXyl/erA6xmv28bCxh6+yXgzMV70VvvtwXfcdx3vo98PT+R8
IH8o/2j5sfVT0Kf7kxmTk/8EA5jz/GMzLdsAAAAgY0hSTQAAeiUAAICDAAD5/wAAgOkAAHUwAADq
YAAAOpgAABdvkl/FRgAAARBJREFUeNqkkbFOw0AQRN+iCFFCSwUSHc01SHwGn+BP408sapr8AW5I
QQqnSATcnT0UsZ2zfSFInLQ6ezwzuzs2SfznnOVhc2AlmGhNRBPfVrIzN6NKmhROopaQGqSA9IW0
RdpQa41L+TmDshPX8hT6xGlLoZpaa6QV5SmDfWdPMcI/eNI7UoVS3GYhtiYaoOGKC20GfGWXBGoC
cCc7HmIDRBiJAa61IQBhTF/MDGJXuePn3w4reLuh4Y3Ydelvnzyn+ON+jcMK56oGUi/0yfu0shnk
ydXMKP5m4Efdl9zrlsDy2ASLExM4Xq0g4IZwY/enshPkdn7Q80g8MchPkKb+YhpE/d3+1WDatRcn
Bj8DAHKTEh4NHRpdAAAAAElFTkSuQmCC";
$_IMAGES["crypto"] = $_IMAGES["encrypto"];
$_IMAGES["hc"] = $_IMAGES["encrypto"];
$_IMAGES["tc"] = $_IMAGES["encrypto"];
$_IMAGES["axx"] = $_IMAGES["encrypto"];
$_IMAGES["gz"] = $_IMAGES["archive"];
$_IMAGES["gif"] = $_IMAGES["image"];
$_IMAGES["h"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAALJ2lUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6cGhvdG9z
aG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOnhtcD0i
aHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMu
YWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5j
b20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgIHhtbG5zOmRjPSJodHRwOi8vcHVy
bC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0iaHR0cDovL2lw
dGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBsdXNfMV89Imh0
dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgIHBob3Rvc2hvcDpIZWFkbGluZT0i
VXNlciBpbnRlcmZhY2UgbWFrZSB1cCIKICAgeG1wUmlnaHRzOk1hcmtlZD0iVHJ1ZSIKICAgeG1w
Ok1ldGFkYXRhRGF0ZT0iMjAxMS0wMS0yNVQxMzo1NToxNSswMTowMCIKICAgeG1wTU06SW5zdGFu
Y2VJRD0ieG1wLmlpZDozMEE5MDE1QjgyMjhFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgeG1wTU06
RG9jdW1lbnRJRD0ieG1wLmRpZDoxNjhCODhENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAg
eG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjE2OEI4OEQ1RTAyN0UwMTE5ODlDQzBB
MUFEMDJCNUMyIj4KICAgPHhtcFJpZ2h0czpVc2FnZVRlcm1zPgogICAgPHJkZjpBbHQ+CiAgICAg
PHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9u
LU5vbkNvbW1lcmNpYWwgbGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L3htcFJp
Z2h0czpVc2FnZVRlcm1zPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxy
ZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJzYXZlZCIKICAgICAgc3RFdnQ6aW5zdGFuY2VJRD0i
eG1wLmlpZDoxNjhCODhENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgICAgc3RFdnQ6d2hl
bj0iMjAxMS0wMS0yNFQxODozOTowMiswMTowMCIKICAgICAgc3RFdnQ6Y2hhbmdlZD0iL21ldGFk
YXRhIi8+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2
dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjMwQTkwMTVCODIyOEUwMTE5ODlDQzBBMUFEMDJCNUMyIgog
ICAgICBzdEV2dDp3aGVuPSIyMDExLTAxLTI1VDEzOjU1OjE1KzAxOjAwIgogICAgICBzdEV2dDpj
aGFuZ2VkPSIvbWV0YWRhdGEiLz4KICAgIDwvcmRmOlNlcT4KICAgPC94bXBNTTpIaXN0b3J5Pgog
ICA8ZGM6Y3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGk+R2VudGxlZmFjZSBjdXN0
b20gdG9vbGJhciBpY29ucyBkZXNpZ248L3JkZjpsaT4KICAgIDwvcmRmOlNlcT4KICAgPC9kYzpj
cmVhdG9yPgogICA8ZGM6ZGVzY3JpcHRpb24+CiAgICA8cmRmOkFsdD4KICAgICA8cmRmOmxpIHht
bDpsYW5nPSJ4LWRlZmF1bHQiPldpcmVmcmFtZSBtb25vIHRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgIDwvcmRmOkFsdD4KICAgPC9kYzpkZXNjcmlwdGlvbj4KICAgPGRjOnN1YmplY3Q+CiAgICA8
cmRmOkJhZz4KICAgICA8cmRmOmxpPmN1c3RvbSBpY29uIGRlc2lnbjwvcmRmOmxpPgogICAgIDxy
ZGY6bGk+dG9vbGJhciBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+Y3VzdG9tIGljb25zPC9y
ZGY6bGk+CiAgICAgPHJkZjpsaT5pbnRlcmZhY2UgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjps
aT51aSBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPmd1aSBkZXNpZ248L3JkZjpsaT4KICAg
ICA8cmRmOmxpPnRhc2tiYXIgaWNvbnM8L3JkZjpsaT4KICAgIDwvcmRmOkJhZz4KICAgPC9kYzpz
dWJqZWN0PgogICA8ZGM6cmlnaHRzPgogICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFu
Zz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uLU5vbkNvbW1lcmNpYWwg
bGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L2RjOnJpZ2h0cz4KICAgPElwdGM0
eG1wQ29yZTpDcmVhdG9yQ29udGFjdEluZm8KICAgIElwdGM0eG1wQ29yZTpDaVVybFdvcms9Imh0
dHA6Ly93d3cuZ2VudGxlZmFjZS5jb20iLz4KICAgPHBsdXNfMV86SW1hZ2VDcmVhdG9yPgogICAg
PHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBwbHVzXzFfOkltYWdlQ3JlYXRvck5hbWU9Imdl
bnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpJbWFnZUNyZWF0b3I+
CiAgIDxwbHVzXzFfOkNvcHlyaWdodE93bmVyPgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQog
ICAgICBwbHVzXzFfOkNvcHlyaWdodE93bmVyTmFtZT0iZ2VudGxlZmFjZS5jb20iLz4KICAgIDwv
cmRmOlNlcT4KICAgPC9wbHVzXzFfOkNvcHlyaWdodE93bmVyPgogIDwvcmRmOkRlc2NyaXB0aW9u
PgogPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KPD94cGFja2V0IGVuZD0iciI/PvP0DzcAAAAZdEVY
dFNvZnR3YXJlAEFkb2JlIEltYWdlUmVhZHlxyWU8AAAA4UlEQVR42qRSsQ3CMBC0LbcRlpIqUiQX
adLhDTISbMAGYQNGYAU2gC4lI8T0Scx9pKBYFNjmpdf/W7733b8Z+9O4MWbgnKsUsHPOynmeY8E3
eLtGOY5j7MPtNsppmhgkmL7vHzFdmqbZQ8Kd1XXtUgdIWEEMVtNan+BdaAPCeg0w0B38UFXVJbQB
K8vSk4D6Smfwn0zontwyIKOtYKjBElie5x8GyDuqi6IIkkB3PQbIXwhna+1RKaWRP7cAnPMvBlmW
Ja+RsCLhJ3rzWtYopWxjwcDsl18shBhQq0QS9i3AADUVZzeru1sfAAAAAElFTkSuQmCC";
$_IMAGES["htm"] = $_IMAGES["webpage"];
$_IMAGES["html"] = $_IMAGES["webpage"];
$_IMAGES["iso"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAKBmlUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOmRjPSJo
dHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0i
aHR0cDovL2lwdGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBs
dXNfMV89Imh0dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgICB4bWxuczp4bXA9
Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25z
LmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUu
Y29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgIHhtcFJpZ2h0czpNYXJrZWQ9IlRy
dWUiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMTEtMDEtMjVUMTM6NTU6MDkrMDE6MDAiCiAgIHht
cE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RDg4NkVDNTY4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIi
CiAgIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RDg4NkVDNTY4MjI4RTAxMTk4OUNDMEExQUQw
MkI1QzIiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpEODg2RUM1NjgyMjhF
MDExOTg5Q0MwQTFBRDAyQjVDMiI+CiAgIDx4bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgIDxyZGY6
QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9ucyBB
dHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFsdD4K
ICAgPC94bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgPGRjOmNyZWF0b3I+CiAgICA8cmRmOlNlcT4K
ICAgICA8cmRmOmxpPkdlbnRsZWZhY2UgY3VzdG9tIHRvb2xiYXIgaWNvbnMgZGVzaWduPC9yZGY6
bGk+CiAgICA8L3JkZjpTZXE+CiAgIDwvZGM6Y3JlYXRvcj4KICAgPGRjOmRlc2NyaXB0aW9uPgog
ICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5XaXJlZnJhbWUg
bW9ubyB0b29sYmFyIGljb25zPC9yZGY6bGk+CiAgICA8L3JkZjpBbHQ+CiAgIDwvZGM6ZGVzY3Jp
cHRpb24+CiAgIDxkYzpzdWJqZWN0PgogICAgPHJkZjpCYWc+CiAgICAgPHJkZjpsaT5jdXN0b20g
aWNvbiBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPnRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgICA8cmRmOmxpPmN1c3RvbSBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+aW50ZXJmYWNl
IGRlc2lnbjwvcmRmOmxpPgogICAgIDxyZGY6bGk+dWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJk
ZjpsaT5ndWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjpsaT50YXNrYmFyIGljb25zPC9yZGY6
bGk+CiAgICA8L3JkZjpCYWc+CiAgIDwvZGM6c3ViamVjdD4KICAgPGRjOnJpZ2h0cz4KICAgIDxy
ZGY6QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9u
cyBBdHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFs
dD4KICAgPC9kYzpyaWdodHM+CiAgIDxJcHRjNHhtcENvcmU6Q3JlYXRvckNvbnRhY3RJbmZvCiAg
ICBJcHRjNHhtcENvcmU6Q2lVcmxXb3JrPSJodHRwOi8vd3d3LmdlbnRsZWZhY2UuY29tIi8+CiAg
IDxwbHVzXzFfOkltYWdlQ3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAg
cGx1c18xXzpJbWFnZUNyZWF0b3JOYW1lPSJnZW50bGVmYWNlLmNvbSIvPgogICAgPC9yZGY6U2Vx
PgogICA8L3BsdXNfMV86SW1hZ2VDcmVhdG9yPgogICA8cGx1c18xXzpDb3B5cmlnaHRPd25lcj4K
ICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgcGx1c18xXzpDb3B5cmlnaHRPd25lck5h
bWU9ImdlbnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpDb3B5cmln
aHRPd25lcj4KICAgPHhtcE1NOkhpc3Rvcnk+CiAgICA8cmRmOlNlcT4KICAgICA8cmRmOmxpCiAg
ICAgIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiCiAgICAgIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6
RDg4NkVDNTY4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIiCiAgICAgIHN0RXZ0OndoZW49IjIwMTEt
MDEtMjVUMTM6NTU6MDkrMDE6MDAiCiAgICAgIHN0RXZ0OmNoYW5nZWQ9Ii9tZXRhZGF0YSIvPgog
ICAgPC9yZGY6U2VxPgogICA8L3htcE1NOkhpc3Rvcnk+CiAgPC9yZGY6RGVzY3JpcHRpb24+CiA8
L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+OHpJzwAAABl0RVh0U29m
dHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAA8dEVYdEFMVFRhZwBUaGlzIGlzIHRoZSBpY29u
IGZyb20gR2VudGxlZmFjZS5jb20gZnJlZSBpY29ucyBzZXQuINhr6MQAAABEdEVYdENvcHlyaWdo
dABDcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRp
dmVze92woAAAAEVpVFh0RGVzY3JpcHRpb24AAAAAAFRoaXMgaXMgdGhlIGljb24gZnJvbSBHZW50
bGVmYWNlLmNvbSBmcmVlIGljb25zIHNldC4gvBH4GgAAAEhpVFh0Q29weXJpZ2h0AAAAAABDcmVh
dGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRpdmVzWILL
BQAAAPNJREFUeNqkUksKgzAQ9YfiRrITXMWNGxFc9hj2CD2J9AQ9QnuDehRBXMcb6M6NmL4RLFqq
EA28jJmML28+mnZy6b+ONE2Zrus5PjNYPvullA1MAXsvy7L7S5AkCf30BNjWiyDogFtVVcWKII7j
DOatoP5a13UxEURRRLLF3ssbSkKLDuM4Us5MsX4Un08EwzBQ7sodgIJsVsAPdpFbQRBwKDg3B77v
y6MEcw1oSI6k0Zi0O47DUZALoCniNaXgeR7DQSi2skPnwm/vXNdVnsS+74uVB6lktm23gNxBS3Gb
tKZpMuBhGIYA5AKC/HS/jP8IMACM64OcfZ+ufAAAAABJRU5ErkJggg==";
$_IMAGES["java"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAALJ2lUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6cGhvdG9z
aG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOnhtcD0i
aHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMu
YWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5j
b20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgIHhtbG5zOmRjPSJodHRwOi8vcHVy
bC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0iaHR0cDovL2lw
dGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBsdXNfMV89Imh0
dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgIHBob3Rvc2hvcDpIZWFkbGluZT0i
VXNlciBpbnRlcmZhY2UgbWFrZSB1cCIKICAgeG1wUmlnaHRzOk1hcmtlZD0iVHJ1ZSIKICAgeG1w
Ok1ldGFkYXRhRGF0ZT0iMjAxMS0wMS0yNVQxMzo1NToxNCswMTowMCIKICAgeG1wTU06SW5zdGFu
Y2VJRD0ieG1wLmlpZDo3ODUwNUQ1QTgyMjhFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgeG1wTU06
RG9jdW1lbnRJRD0ieG1wLmRpZDozNkY4RDBENEUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAg
eG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjM2RjhEMEQ0RTAyN0UwMTE5ODlDQzBB
MUFEMDJCNUMyIj4KICAgPHhtcFJpZ2h0czpVc2FnZVRlcm1zPgogICAgPHJkZjpBbHQ+CiAgICAg
PHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9u
LU5vbkNvbW1lcmNpYWwgbGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L3htcFJp
Z2h0czpVc2FnZVRlcm1zPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxy
ZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJzYXZlZCIKICAgICAgc3RFdnQ6aW5zdGFuY2VJRD0i
eG1wLmlpZDozNkY4RDBENEUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgICAgc3RFdnQ6d2hl
bj0iMjAxMS0wMS0yNFQxODozOTowMSswMTowMCIKICAgICAgc3RFdnQ6Y2hhbmdlZD0iL21ldGFk
YXRhIi8+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2
dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjc4NTA1RDVBODIyOEUwMTE5ODlDQzBBMUFEMDJCNUMyIgog
ICAgICBzdEV2dDp3aGVuPSIyMDExLTAxLTI1VDEzOjU1OjE0KzAxOjAwIgogICAgICBzdEV2dDpj
aGFuZ2VkPSIvbWV0YWRhdGEiLz4KICAgIDwvcmRmOlNlcT4KICAgPC94bXBNTTpIaXN0b3J5Pgog
ICA8ZGM6Y3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGk+R2VudGxlZmFjZSBjdXN0
b20gdG9vbGJhciBpY29ucyBkZXNpZ248L3JkZjpsaT4KICAgIDwvcmRmOlNlcT4KICAgPC9kYzpj
cmVhdG9yPgogICA8ZGM6ZGVzY3JpcHRpb24+CiAgICA8cmRmOkFsdD4KICAgICA8cmRmOmxpIHht
bDpsYW5nPSJ4LWRlZmF1bHQiPldpcmVmcmFtZSBtb25vIHRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgIDwvcmRmOkFsdD4KICAgPC9kYzpkZXNjcmlwdGlvbj4KICAgPGRjOnN1YmplY3Q+CiAgICA8
cmRmOkJhZz4KICAgICA8cmRmOmxpPmN1c3RvbSBpY29uIGRlc2lnbjwvcmRmOmxpPgogICAgIDxy
ZGY6bGk+dG9vbGJhciBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+Y3VzdG9tIGljb25zPC9y
ZGY6bGk+CiAgICAgPHJkZjpsaT5pbnRlcmZhY2UgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjps
aT51aSBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPmd1aSBkZXNpZ248L3JkZjpsaT4KICAg
ICA8cmRmOmxpPnRhc2tiYXIgaWNvbnM8L3JkZjpsaT4KICAgIDwvcmRmOkJhZz4KICAgPC9kYzpz
dWJqZWN0PgogICA8ZGM6cmlnaHRzPgogICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFu
Zz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uLU5vbkNvbW1lcmNpYWwg
bGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L2RjOnJpZ2h0cz4KICAgPElwdGM0
eG1wQ29yZTpDcmVhdG9yQ29udGFjdEluZm8KICAgIElwdGM0eG1wQ29yZTpDaVVybFdvcms9Imh0
dHA6Ly93d3cuZ2VudGxlZmFjZS5jb20iLz4KICAgPHBsdXNfMV86SW1hZ2VDcmVhdG9yPgogICAg
PHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBwbHVzXzFfOkltYWdlQ3JlYXRvck5hbWU9Imdl
bnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpJbWFnZUNyZWF0b3I+
CiAgIDxwbHVzXzFfOkNvcHlyaWdodE93bmVyPgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQog
ICAgICBwbHVzXzFfOkNvcHlyaWdodE93bmVyTmFtZT0iZ2VudGxlZmFjZS5jb20iLz4KICAgIDwv
cmRmOlNlcT4KICAgPC9wbHVzXzFfOkNvcHlyaWdodE93bmVyPgogIDwvcmRmOkRlc2NyaXB0aW9u
PgogPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KPD94cGFja2V0IGVuZD0iciI/PmO5B2EAAAAZdEVY
dFNvZnR3YXJlAEFkb2JlIEltYWdlUmVhZHlxyWU8AAABCklEQVR42rRSOw6CQBBlwdCQECzoCNGS
TjgBdpZ6A25iPIF6Aq7gDTwC2FGaUFKIFQm/9S2BhGLRpXCSyZvMzrz5rSRxxHXdwPO8UBIQmeds
2zas6zoXIVB4TtM0DUppANxB31mWJVMEZOrBcRxGEsFcJUkyGbeYeqiqyiCEsDEu0j+la8227Req
Gb+CMRLr6Ap8Am9pmuYdgWVZdG5lRgI9dDtomka8ZUK2SPRhHoFn0p/tDvAF8nOcdDnOGTrIBRuI
BwM58ZjgAdiLjqHruo+cgHU0EDwFF7fSNC3CV9/0rtMsAvYre2Tx16IoLt0SVVVl3/YlcIF1WZb8
YoqiBLIs0y965uV9BBgA/IN7mxefftAAAAAASUVORK5CYII=";
$_IMAGES["jpg"] = $_IMAGES["image"];
$_IMAGES["jpeg"] = $_IMAGES["image"];
$_IMAGES["js"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAALJ2lUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6cGhvdG9z
aG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOnhtcD0i
aHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMu
YWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5j
b20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgIHhtbG5zOmRjPSJodHRwOi8vcHVy
bC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0iaHR0cDovL2lw
dGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBsdXNfMV89Imh0
dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgIHBob3Rvc2hvcDpIZWFkbGluZT0i
VXNlciBpbnRlcmZhY2UgbWFrZSB1cCIKICAgeG1wUmlnaHRzOk1hcmtlZD0iVHJ1ZSIKICAgeG1w
Ok1ldGFkYXRhRGF0ZT0iMjAxMS0wMS0yNVQxMzo1NToxNSswMTowMCIKICAgeG1wTU06SW5zdGFu
Y2VJRD0ieG1wLmlpZDo5MUY2Qzk1QTgyMjhFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgeG1wTU06
RG9jdW1lbnRJRD0ieG1wLmRpZDpGREE0MjdENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAg
eG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOkZEQTQyN0Q1RTAyN0UwMTE5ODlDQzBB
MUFEMDJCNUMyIj4KICAgPHhtcFJpZ2h0czpVc2FnZVRlcm1zPgogICAgPHJkZjpBbHQ+CiAgICAg
PHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9u
LU5vbkNvbW1lcmNpYWwgbGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L3htcFJp
Z2h0czpVc2FnZVRlcm1zPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxy
ZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJzYXZlZCIKICAgICAgc3RFdnQ6aW5zdGFuY2VJRD0i
eG1wLmlpZDpGREE0MjdENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgICAgc3RFdnQ6d2hl
bj0iMjAxMS0wMS0yNFQxODozOTowMiswMTowMCIKICAgICAgc3RFdnQ6Y2hhbmdlZD0iL21ldGFk
YXRhIi8+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2
dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjkxRjZDOTVBODIyOEUwMTE5ODlDQzBBMUFEMDJCNUMyIgog
ICAgICBzdEV2dDp3aGVuPSIyMDExLTAxLTI1VDEzOjU1OjE1KzAxOjAwIgogICAgICBzdEV2dDpj
aGFuZ2VkPSIvbWV0YWRhdGEiLz4KICAgIDwvcmRmOlNlcT4KICAgPC94bXBNTTpIaXN0b3J5Pgog
ICA8ZGM6Y3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGk+R2VudGxlZmFjZSBjdXN0
b20gdG9vbGJhciBpY29ucyBkZXNpZ248L3JkZjpsaT4KICAgIDwvcmRmOlNlcT4KICAgPC9kYzpj
cmVhdG9yPgogICA8ZGM6ZGVzY3JpcHRpb24+CiAgICA8cmRmOkFsdD4KICAgICA8cmRmOmxpIHht
bDpsYW5nPSJ4LWRlZmF1bHQiPldpcmVmcmFtZSBtb25vIHRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgIDwvcmRmOkFsdD4KICAgPC9kYzpkZXNjcmlwdGlvbj4KICAgPGRjOnN1YmplY3Q+CiAgICA8
cmRmOkJhZz4KICAgICA8cmRmOmxpPmN1c3RvbSBpY29uIGRlc2lnbjwvcmRmOmxpPgogICAgIDxy
ZGY6bGk+dG9vbGJhciBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+Y3VzdG9tIGljb25zPC9y
ZGY6bGk+CiAgICAgPHJkZjpsaT5pbnRlcmZhY2UgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjps
aT51aSBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPmd1aSBkZXNpZ248L3JkZjpsaT4KICAg
ICA8cmRmOmxpPnRhc2tiYXIgaWNvbnM8L3JkZjpsaT4KICAgIDwvcmRmOkJhZz4KICAgPC9kYzpz
dWJqZWN0PgogICA8ZGM6cmlnaHRzPgogICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFu
Zz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uLU5vbkNvbW1lcmNpYWwg
bGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L2RjOnJpZ2h0cz4KICAgPElwdGM0
eG1wQ29yZTpDcmVhdG9yQ29udGFjdEluZm8KICAgIElwdGM0eG1wQ29yZTpDaVVybFdvcms9Imh0
dHA6Ly93d3cuZ2VudGxlZmFjZS5jb20iLz4KICAgPHBsdXNfMV86SW1hZ2VDcmVhdG9yPgogICAg
PHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBwbHVzXzFfOkltYWdlQ3JlYXRvck5hbWU9Imdl
bnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpJbWFnZUNyZWF0b3I+
CiAgIDxwbHVzXzFfOkNvcHlyaWdodE93bmVyPgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQog
ICAgICBwbHVzXzFfOkNvcHlyaWdodE93bmVyTmFtZT0iZ2VudGxlZmFjZS5jb20iLz4KICAgIDwv
cmRmOlNlcT4KICAgPC9wbHVzXzFfOkNvcHlyaWdodE93bmVyPgogIDwvcmRmOkRlc2NyaXB0aW9u
PgogPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KPD94cGFja2V0IGVuZD0iciI/Pq/JY+YAAAAZdEVY
dFNvZnR3YXJlAEFkb2JlIEltYWdlUmVhZHlxyWU8AAAAPHRFWHRBTFRUYWcAVGhpcyBpcyB0aGUg
aWNvbiBmcm9tIEdlbnRsZWZhY2UuY29tIGZyZWUgaWNvbnMgc2V0LiDYa+jEAAAARHRFWHRDb3B5
cmlnaHQAQ3JlYXRpdmUgQ29tbW9ucyBBdHRyaWJ1dGlvbiBOb24tQ29tbWVyY2lhbCBObyBEZXJp
dmF0aXZlc3vdsKAAAABFaVRYdERlc2NyaXB0aW9uAAAAAABUaGlzIGlzIHRoZSBpY29uIGZyb20g
R2VudGxlZmFjZS5jb20gZnJlZSBpY29ucyBzZXQuILwR+BoAAABIaVRYdENvcHlyaWdodAAAAAAA
Q3JlYXRpdmUgQ29tbW9ucyBBdHRyaWJ1dGlvbiBOb24tQ29tbWVyY2lhbCBObyBEZXJpdmF0aXZl
c1iCywUAAAFmSURBVHjazFIxbsJAEPTZkYwBIUNlkAUICmSJ4swL4h/kByFPyEvyjJTJD+4JuZQU
UNCQ7iwqCsCZsWxwIkLK5KRh17Ozy+3YlvXXx/lOxHEse73ec7fbFZvNRpObzWZzPD8FQfD+gVPV
29WH6XQq9/u9Am6B+5JnXnCKmosDoigaHg4HBfgQpoiPZY15wfnUUFvWBH/G47Fv27ZCyukp8mSx
WOjqP00mE3k8HqnxAY08WS6XqRgMBr4QQgF5M2KyWq30JcNGo5HMsiwfgqiBRIRh+IKmu/w6QsTr
9Vpfc73f73PIG3PE1xvsdiriWr++tt1uZ2HFs4kw5QFDNAfRoE6nI39qZo0aatnD3tzEdrvNnRSQ
+8Ddttvtl1VarZakV9wfUdMrY0x6EjSbzWGj0TBAVq/Xjed5p5swJ8caNdRevGKtVpOu6xogA1TJ
My84Q831b9txJL8JxHmFmxectP7d+RRgACFlurolLbQ/AAAAAElFTkSuQmCC";
$_IMAGES["mov"] = $_IMAGES["video"];
$_IMAGES["mp2"] = $_IMAGES["audio"];
$_IMAGES["mp3"] = $_IMAGES["audio"];
$_IMAGES["mp4"] = $_IMAGES["video"];
$_IMAGES["mp4a"] = $_IMAGES["audio"];
$_IMAGES["ogg"] = $_IMAGES["audio"];
$_IMAGES["flac"] = $_IMAGES["audio"];
$_IMAGES["mpeg"] = $_IMAGES["video"];
$_IMAGES["mpg"] = $_IMAGES["video"];
$_IMAGES["odg"] = $_IMAGES["vectorgraphics"];
$_IMAGES["odp"] = $_IMAGES["presentation"];
$_IMAGES["ods"] = $_IMAGES["spreadsheet"];
$_IMAGES["odt"] = $_IMAGES["textdocument"];
$_IMAGES["rtf"] = $_IMAGES["textdocument"];
$_IMAGES["pdf"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAKBmlUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOmRjPSJo
dHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0i
aHR0cDovL2lwdGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBs
dXNfMV89Imh0dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgICB4bWxuczp4bXA9
Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25z
LmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUu
Y29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgIHhtcFJpZ2h0czpNYXJrZWQ9IlRy
dWUiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMTEtMDEtMjVUMTM6NTU6MTMrMDE6MDAiCiAgIHht
cE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NzBDRDk0NTk4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIi
CiAgIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NzBDRDk0NTk4MjI4RTAxMTk4OUNDMEExQUQw
MkI1QzIiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo3MENEOTQ1OTgyMjhF
MDExOTg5Q0MwQTFBRDAyQjVDMiI+CiAgIDx4bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgIDxyZGY6
QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9ucyBB
dHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFsdD4K
ICAgPC94bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgPGRjOmNyZWF0b3I+CiAgICA8cmRmOlNlcT4K
ICAgICA8cmRmOmxpPkdlbnRsZWZhY2UgY3VzdG9tIHRvb2xiYXIgaWNvbnMgZGVzaWduPC9yZGY6
bGk+CiAgICA8L3JkZjpTZXE+CiAgIDwvZGM6Y3JlYXRvcj4KICAgPGRjOmRlc2NyaXB0aW9uPgog
ICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5XaXJlZnJhbWUg
bW9ubyB0b29sYmFyIGljb25zPC9yZGY6bGk+CiAgICA8L3JkZjpBbHQ+CiAgIDwvZGM6ZGVzY3Jp
cHRpb24+CiAgIDxkYzpzdWJqZWN0PgogICAgPHJkZjpCYWc+CiAgICAgPHJkZjpsaT5jdXN0b20g
aWNvbiBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPnRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgICA8cmRmOmxpPmN1c3RvbSBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+aW50ZXJmYWNl
IGRlc2lnbjwvcmRmOmxpPgogICAgIDxyZGY6bGk+dWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJk
ZjpsaT5ndWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjpsaT50YXNrYmFyIGljb25zPC9yZGY6
bGk+CiAgICA8L3JkZjpCYWc+CiAgIDwvZGM6c3ViamVjdD4KICAgPGRjOnJpZ2h0cz4KICAgIDxy
ZGY6QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9u
cyBBdHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFs
dD4KICAgPC9kYzpyaWdodHM+CiAgIDxJcHRjNHhtcENvcmU6Q3JlYXRvckNvbnRhY3RJbmZvCiAg
ICBJcHRjNHhtcENvcmU6Q2lVcmxXb3JrPSJodHRwOi8vd3d3LmdlbnRsZWZhY2UuY29tIi8+CiAg
IDxwbHVzXzFfOkltYWdlQ3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAg
cGx1c18xXzpJbWFnZUNyZWF0b3JOYW1lPSJnZW50bGVmYWNlLmNvbSIvPgogICAgPC9yZGY6U2Vx
PgogICA8L3BsdXNfMV86SW1hZ2VDcmVhdG9yPgogICA8cGx1c18xXzpDb3B5cmlnaHRPd25lcj4K
ICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgcGx1c18xXzpDb3B5cmlnaHRPd25lck5h
bWU9ImdlbnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpDb3B5cmln
aHRPd25lcj4KICAgPHhtcE1NOkhpc3Rvcnk+CiAgICA8cmRmOlNlcT4KICAgICA8cmRmOmxpCiAg
ICAgIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiCiAgICAgIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6
NzBDRDk0NTk4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIiCiAgICAgIHN0RXZ0OndoZW49IjIwMTEt
MDEtMjVUMTM6NTU6MTMrMDE6MDAiCiAgICAgIHN0RXZ0OmNoYW5nZWQ9Ii9tZXRhZGF0YSIvPgog
ICAgPC9yZGY6U2VxPgogICA8L3htcE1NOkhpc3Rvcnk+CiAgPC9yZGY6RGVzY3JpcHRpb24+CiA8
L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+8dh5/AAAABl0RVh0U29m
dHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAA8dEVYdEFMVFRhZwBUaGlzIGlzIHRoZSBpY29u
IGZyb20gR2VudGxlZmFjZS5jb20gZnJlZSBpY29ucyBzZXQuINhr6MQAAABEdEVYdENvcHlyaWdo
dABDcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRp
dmVze92woAAAAEVpVFh0RGVzY3JpcHRpb24AAAAAAFRoaXMgaXMgdGhlIGljb24gZnJvbSBHZW50
bGVmYWNlLmNvbSBmcmVlIGljb25zIHNldC4gvBH4GgAAAEhpVFh0Q29weXJpZ2h0AAAAAABDcmVh
dGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRpdmVzWILL
BQAAAPlJREFUeNqUk0sKgzAQhjNFd4JWcCEuBEFw642aG9iT9Ao9kbgUBIsguBDEhTsfaQKdYjEp
ZuCPk8eYL5kJEG5pmjoA8OKuQ87ZmOf5VTiGaBhjZNu2s8Fkv9FFNEVRjOu6EiH+IyqEfZXQDHSW
ZZHtRMuyfGInSZKMfx77BYBOHMdM4wikqir4Idhh0bqun7KgKIrUBGEYahE0TaMmaNtWShAEQcbT
LSfwfV+LoOs6UGWB9n0vJfA8T30HrutqEQzDAD8Dtm2zj26qID6X4boDgWVZWgTTNMG3lDELH1Ex
ieJ3c/9Xyl8C0zS1COZ5PtTBqPOc0XkLMACCe5mjmowuUwAAAABJRU5ErkJggg==";
$_IMAGES["php"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAALJ2lUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6cGhvdG9z
aG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOnhtcD0i
aHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMu
YWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5j
b20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgIHhtbG5zOmRjPSJodHRwOi8vcHVy
bC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0iaHR0cDovL2lw
dGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBsdXNfMV89Imh0
dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgIHBob3Rvc2hvcDpIZWFkbGluZT0i
VXNlciBpbnRlcmZhY2UgbWFrZSB1cCIKICAgeG1wUmlnaHRzOk1hcmtlZD0iVHJ1ZSIKICAgeG1w
Ok1ldGFkYXRhRGF0ZT0iMjAxMS0wMS0yNVQxMzo1NToxNSswMTowMCIKICAgeG1wTU06SW5zdGFu
Y2VJRD0ieG1wLmlpZDo5MUY2Qzk1QTgyMjhFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgeG1wTU06
RG9jdW1lbnRJRD0ieG1wLmRpZDpGREE0MjdENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAg
eG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOkZEQTQyN0Q1RTAyN0UwMTE5ODlDQzBB
MUFEMDJCNUMyIj4KICAgPHhtcFJpZ2h0czpVc2FnZVRlcm1zPgogICAgPHJkZjpBbHQ+CiAgICAg
PHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9u
LU5vbkNvbW1lcmNpYWwgbGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L3htcFJp
Z2h0czpVc2FnZVRlcm1zPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxy
ZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJzYXZlZCIKICAgICAgc3RFdnQ6aW5zdGFuY2VJRD0i
eG1wLmlpZDpGREE0MjdENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgICAgc3RFdnQ6d2hl
bj0iMjAxMS0wMS0yNFQxODozOTowMiswMTowMCIKICAgICAgc3RFdnQ6Y2hhbmdlZD0iL21ldGFk
YXRhIi8+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2
dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjkxRjZDOTVBODIyOEUwMTE5ODlDQzBBMUFEMDJCNUMyIgog
ICAgICBzdEV2dDp3aGVuPSIyMDExLTAxLTI1VDEzOjU1OjE1KzAxOjAwIgogICAgICBzdEV2dDpj
aGFuZ2VkPSIvbWV0YWRhdGEiLz4KICAgIDwvcmRmOlNlcT4KICAgPC94bXBNTTpIaXN0b3J5Pgog
ICA8ZGM6Y3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGk+R2VudGxlZmFjZSBjdXN0
b20gdG9vbGJhciBpY29ucyBkZXNpZ248L3JkZjpsaT4KICAgIDwvcmRmOlNlcT4KICAgPC9kYzpj
cmVhdG9yPgogICA8ZGM6ZGVzY3JpcHRpb24+CiAgICA8cmRmOkFsdD4KICAgICA8cmRmOmxpIHht
bDpsYW5nPSJ4LWRlZmF1bHQiPldpcmVmcmFtZSBtb25vIHRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgIDwvcmRmOkFsdD4KICAgPC9kYzpkZXNjcmlwdGlvbj4KICAgPGRjOnN1YmplY3Q+CiAgICA8
cmRmOkJhZz4KICAgICA8cmRmOmxpPmN1c3RvbSBpY29uIGRlc2lnbjwvcmRmOmxpPgogICAgIDxy
ZGY6bGk+dG9vbGJhciBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+Y3VzdG9tIGljb25zPC9y
ZGY6bGk+CiAgICAgPHJkZjpsaT5pbnRlcmZhY2UgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjps
aT51aSBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPmd1aSBkZXNpZ248L3JkZjpsaT4KICAg
ICA8cmRmOmxpPnRhc2tiYXIgaWNvbnM8L3JkZjpsaT4KICAgIDwvcmRmOkJhZz4KICAgPC9kYzpz
dWJqZWN0PgogICA8ZGM6cmlnaHRzPgogICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFu
Zz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uLU5vbkNvbW1lcmNpYWwg
bGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L2RjOnJpZ2h0cz4KICAgPElwdGM0
eG1wQ29yZTpDcmVhdG9yQ29udGFjdEluZm8KICAgIElwdGM0eG1wQ29yZTpDaVVybFdvcms9Imh0
dHA6Ly93d3cuZ2VudGxlZmFjZS5jb20iLz4KICAgPHBsdXNfMV86SW1hZ2VDcmVhdG9yPgogICAg
PHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBwbHVzXzFfOkltYWdlQ3JlYXRvck5hbWU9Imdl
bnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpJbWFnZUNyZWF0b3I+
CiAgIDxwbHVzXzFfOkNvcHlyaWdodE93bmVyPgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQog
ICAgICBwbHVzXzFfOkNvcHlyaWdodE93bmVyTmFtZT0iZ2VudGxlZmFjZS5jb20iLz4KICAgIDwv
cmRmOlNlcT4KICAgPC9wbHVzXzFfOkNvcHlyaWdodE93bmVyPgogIDwvcmRmOkRlc2NyaXB0aW9u
PgogPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KPD94cGFja2V0IGVuZD0iciI/Pq/JY+YAAAAZdEVY
dFNvZnR3YXJlAEFkb2JlIEltYWdlUmVhZHlxyWU8AAAAPHRFWHRBTFRUYWcAVGhpcyBpcyB0aGUg
aWNvbiBmcm9tIEdlbnRsZWZhY2UuY29tIGZyZWUgaWNvbnMgc2V0LiDYa+jEAAAARHRFWHRDb3B5
cmlnaHQAQ3JlYXRpdmUgQ29tbW9ucyBBdHRyaWJ1dGlvbiBOb24tQ29tbWVyY2lhbCBObyBEZXJp
dmF0aXZlc3vdsKAAAABFaVRYdERlc2NyaXB0aW9uAAAAAABUaGlzIGlzIHRoZSBpY29uIGZyb20g
R2VudGxlZmFjZS5jb20gZnJlZSBpY29ucyBzZXQuILwR+BoAAABIaVRYdENvcHlyaWdodAAAAAAA
Q3JlYXRpdmUgQ29tbW9ucyBBdHRyaWJ1dGlvbiBOb24tQ29tbWVyY2lhbCBObyBEZXJpdmF0aXZl
c1iCywUAAAFmSURBVHjazFIxbsJAEPTZkYwBIUNlkAUICmSJ4swL4h/kByFPyEvyjJTJD+4JuZQU
UNCQ7iwqCsCZsWxwIkLK5KRh17Ozy+3YlvXXx/lOxHEse73ec7fbFZvNRpObzWZzPD8FQfD+gVPV
29WH6XQq9/u9Am6B+5JnXnCKmosDoigaHg4HBfgQpoiPZY15wfnUUFvWBH/G47Fv27ZCyukp8mSx
WOjqP00mE3k8HqnxAY08WS6XqRgMBr4QQgF5M2KyWq30JcNGo5HMsiwfgqiBRIRh+IKmu/w6QsTr
9Vpfc73f73PIG3PE1xvsdiriWr++tt1uZ2HFs4kw5QFDNAfRoE6nI39qZo0aatnD3tzEdrvNnRSQ
+8Ddttvtl1VarZakV9wfUdMrY0x6EjSbzWGj0TBAVq/Xjed5p5swJ8caNdRevGKtVpOu6xogA1TJ
My84Q831b9txJL8JxHmFmxectP7d+RRgACFlurolLbQ/AAAAAElFTkSuQmCC";
$_IMAGES["png"] = $_IMAGES["image"];
$_IMAGES["tif"] = $_IMAGES["image"];
$_IMAGES["tiff"] = $_IMAGES["image"];
$_IMAGES["pps"] = $_IMAGES["presentation"];
$_IMAGES["ppsx"] = $_IMAGES["presentation"];
$_IMAGES["ppt"] = $_IMAGES["presentation"];
$_IMAGES["pptx"] = $_IMAGES["presentation"];
$_IMAGES["psd"] = $_IMAGES["graphics"];
$_IMAGES["rar"] = $_IMAGES["archive"];
$_IMAGES["rb"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAALJ2lUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6cGhvdG9z
aG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOnhtcD0i
aHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMu
YWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5j
b20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgIHhtbG5zOmRjPSJodHRwOi8vcHVy
bC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0iaHR0cDovL2lw
dGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBsdXNfMV89Imh0
dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgIHBob3Rvc2hvcDpIZWFkbGluZT0i
VXNlciBpbnRlcmZhY2UgbWFrZSB1cCIKICAgeG1wUmlnaHRzOk1hcmtlZD0iVHJ1ZSIKICAgeG1w
Ok1ldGFkYXRhRGF0ZT0iMjAxMS0wMS0yNVQxMzo1NToxNSswMTowMCIKICAgeG1wTU06SW5zdGFu
Y2VJRD0ieG1wLmlpZDozMEE5MDE1QjgyMjhFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgeG1wTU06
RG9jdW1lbnRJRD0ieG1wLmRpZDoxNjhCODhENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAg
eG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjE2OEI4OEQ1RTAyN0UwMTE5ODlDQzBB
MUFEMDJCNUMyIj4KICAgPHhtcFJpZ2h0czpVc2FnZVRlcm1zPgogICAgPHJkZjpBbHQ+CiAgICAg
PHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9u
LU5vbkNvbW1lcmNpYWwgbGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L3htcFJp
Z2h0czpVc2FnZVRlcm1zPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxy
ZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJzYXZlZCIKICAgICAgc3RFdnQ6aW5zdGFuY2VJRD0i
eG1wLmlpZDoxNjhCODhENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgICAgc3RFdnQ6d2hl
bj0iMjAxMS0wMS0yNFQxODozOTowMiswMTowMCIKICAgICAgc3RFdnQ6Y2hhbmdlZD0iL21ldGFk
YXRhIi8+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2
dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjMwQTkwMTVCODIyOEUwMTE5ODlDQzBBMUFEMDJCNUMyIgog
ICAgICBzdEV2dDp3aGVuPSIyMDExLTAxLTI1VDEzOjU1OjE1KzAxOjAwIgogICAgICBzdEV2dDpj
aGFuZ2VkPSIvbWV0YWRhdGEiLz4KICAgIDwvcmRmOlNlcT4KICAgPC94bXBNTTpIaXN0b3J5Pgog
ICA8ZGM6Y3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGk+R2VudGxlZmFjZSBjdXN0
b20gdG9vbGJhciBpY29ucyBkZXNpZ248L3JkZjpsaT4KICAgIDwvcmRmOlNlcT4KICAgPC9kYzpj
cmVhdG9yPgogICA8ZGM6ZGVzY3JpcHRpb24+CiAgICA8cmRmOkFsdD4KICAgICA8cmRmOmxpIHht
bDpsYW5nPSJ4LWRlZmF1bHQiPldpcmVmcmFtZSBtb25vIHRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgIDwvcmRmOkFsdD4KICAgPC9kYzpkZXNjcmlwdGlvbj4KICAgPGRjOnN1YmplY3Q+CiAgICA8
cmRmOkJhZz4KICAgICA8cmRmOmxpPmN1c3RvbSBpY29uIGRlc2lnbjwvcmRmOmxpPgogICAgIDxy
ZGY6bGk+dG9vbGJhciBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+Y3VzdG9tIGljb25zPC9y
ZGY6bGk+CiAgICAgPHJkZjpsaT5pbnRlcmZhY2UgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjps
aT51aSBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPmd1aSBkZXNpZ248L3JkZjpsaT4KICAg
ICA8cmRmOmxpPnRhc2tiYXIgaWNvbnM8L3JkZjpsaT4KICAgIDwvcmRmOkJhZz4KICAgPC9kYzpz
dWJqZWN0PgogICA8ZGM6cmlnaHRzPgogICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFu
Zz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uLU5vbkNvbW1lcmNpYWwg
bGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L2RjOnJpZ2h0cz4KICAgPElwdGM0
eG1wQ29yZTpDcmVhdG9yQ29udGFjdEluZm8KICAgIElwdGM0eG1wQ29yZTpDaVVybFdvcms9Imh0
dHA6Ly93d3cuZ2VudGxlZmFjZS5jb20iLz4KICAgPHBsdXNfMV86SW1hZ2VDcmVhdG9yPgogICAg
PHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBwbHVzXzFfOkltYWdlQ3JlYXRvck5hbWU9Imdl
bnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpJbWFnZUNyZWF0b3I+
CiAgIDxwbHVzXzFfOkNvcHlyaWdodE93bmVyPgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQog
ICAgICBwbHVzXzFfOkNvcHlyaWdodE93bmVyTmFtZT0iZ2VudGxlZmFjZS5jb20iLz4KICAgIDwv
cmRmOlNlcT4KICAgPC9wbHVzXzFfOkNvcHlyaWdodE93bmVyPgogIDwvcmRmOkRlc2NyaXB0aW9u
PgogPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KPD94cGFja2V0IGVuZD0iciI/PvP0DzcAAAAZdEVY
dFNvZnR3YXJlAEFkb2JlIEltYWdlUmVhZHlxyWU8AAAA4UlEQVR42qRSsQ3CMBC0LbcRlpIqUiQX
adLhDTISbMAGYQNGYAU2gC4lI8T0Scx9pKBYFNjmpdf/W7733b8Z+9O4MWbgnKsUsHPOynmeY8E3
eLtGOY5j7MPtNsppmhgkmL7vHzFdmqbZQ8Kd1XXtUgdIWEEMVtNan+BdaAPCeg0w0B38UFXVJbQB
K8vSk4D6Smfwn0zontwyIKOtYKjBElie5x8GyDuqi6IIkkB3PQbIXwhna+1RKaWRP7cAnPMvBlmW
Ja+RsCLhJ3rzWtYopWxjwcDsl18shBhQq0QS9i3AADUVZzeru1sfAAAAAElFTkSuQmCC";
$_IMAGES["sln"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAALJ2lUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6cGhvdG9z
aG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOnhtcD0i
aHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMu
YWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5j
b20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgIHhtbG5zOmRjPSJodHRwOi8vcHVy
bC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0iaHR0cDovL2lw
dGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBsdXNfMV89Imh0
dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgIHBob3Rvc2hvcDpIZWFkbGluZT0i
VXNlciBpbnRlcmZhY2UgbWFrZSB1cCIKICAgeG1wUmlnaHRzOk1hcmtlZD0iVHJ1ZSIKICAgeG1w
Ok1ldGFkYXRhRGF0ZT0iMjAxMS0wMS0yNVQxMzo1NToxNSswMTowMCIKICAgeG1wTU06SW5zdGFu
Y2VJRD0ieG1wLmlpZDozMEE5MDE1QjgyMjhFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgeG1wTU06
RG9jdW1lbnRJRD0ieG1wLmRpZDoxNjhCODhENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAg
eG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjE2OEI4OEQ1RTAyN0UwMTE5ODlDQzBB
MUFEMDJCNUMyIj4KICAgPHhtcFJpZ2h0czpVc2FnZVRlcm1zPgogICAgPHJkZjpBbHQ+CiAgICAg
PHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9u
LU5vbkNvbW1lcmNpYWwgbGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L3htcFJp
Z2h0czpVc2FnZVRlcm1zPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxy
ZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJzYXZlZCIKICAgICAgc3RFdnQ6aW5zdGFuY2VJRD0i
eG1wLmlpZDoxNjhCODhENUUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgICAgc3RFdnQ6d2hl
bj0iMjAxMS0wMS0yNFQxODozOTowMiswMTowMCIKICAgICAgc3RFdnQ6Y2hhbmdlZD0iL21ldGFk
YXRhIi8+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2
dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjMwQTkwMTVCODIyOEUwMTE5ODlDQzBBMUFEMDJCNUMyIgog
ICAgICBzdEV2dDp3aGVuPSIyMDExLTAxLTI1VDEzOjU1OjE1KzAxOjAwIgogICAgICBzdEV2dDpj
aGFuZ2VkPSIvbWV0YWRhdGEiLz4KICAgIDwvcmRmOlNlcT4KICAgPC94bXBNTTpIaXN0b3J5Pgog
ICA8ZGM6Y3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGk+R2VudGxlZmFjZSBjdXN0
b20gdG9vbGJhciBpY29ucyBkZXNpZ248L3JkZjpsaT4KICAgIDwvcmRmOlNlcT4KICAgPC9kYzpj
cmVhdG9yPgogICA8ZGM6ZGVzY3JpcHRpb24+CiAgICA8cmRmOkFsdD4KICAgICA8cmRmOmxpIHht
bDpsYW5nPSJ4LWRlZmF1bHQiPldpcmVmcmFtZSBtb25vIHRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgIDwvcmRmOkFsdD4KICAgPC9kYzpkZXNjcmlwdGlvbj4KICAgPGRjOnN1YmplY3Q+CiAgICA8
cmRmOkJhZz4KICAgICA8cmRmOmxpPmN1c3RvbSBpY29uIGRlc2lnbjwvcmRmOmxpPgogICAgIDxy
ZGY6bGk+dG9vbGJhciBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+Y3VzdG9tIGljb25zPC9y
ZGY6bGk+CiAgICAgPHJkZjpsaT5pbnRlcmZhY2UgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjps
aT51aSBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPmd1aSBkZXNpZ248L3JkZjpsaT4KICAg
ICA8cmRmOmxpPnRhc2tiYXIgaWNvbnM8L3JkZjpsaT4KICAgIDwvcmRmOkJhZz4KICAgPC9kYzpz
dWJqZWN0PgogICA8ZGM6cmlnaHRzPgogICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFu
Zz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uLU5vbkNvbW1lcmNpYWwg
bGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L2RjOnJpZ2h0cz4KICAgPElwdGM0
eG1wQ29yZTpDcmVhdG9yQ29udGFjdEluZm8KICAgIElwdGM0eG1wQ29yZTpDaVVybFdvcms9Imh0
dHA6Ly93d3cuZ2VudGxlZmFjZS5jb20iLz4KICAgPHBsdXNfMV86SW1hZ2VDcmVhdG9yPgogICAg
PHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBwbHVzXzFfOkltYWdlQ3JlYXRvck5hbWU9Imdl
bnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpJbWFnZUNyZWF0b3I+
CiAgIDxwbHVzXzFfOkNvcHlyaWdodE93bmVyPgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQog
ICAgICBwbHVzXzFfOkNvcHlyaWdodE93bmVyTmFtZT0iZ2VudGxlZmFjZS5jb20iLz4KICAgIDwv
cmRmOlNlcT4KICAgPC9wbHVzXzFfOkNvcHlyaWdodE93bmVyPgogIDwvcmRmOkRlc2NyaXB0aW9u
PgogPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KPD94cGFja2V0IGVuZD0iciI/PvP0DzcAAAAZdEVY
dFNvZnR3YXJlAEFkb2JlIEltYWdlUmVhZHlxyWU8AAAA4UlEQVR42qRSsQ3CMBC0LbcRlpIqUiQX
adLhDTISbMAGYQNGYAU2gC4lI8T0Scx9pKBYFNjmpdf/W7733b8Z+9O4MWbgnKsUsHPOynmeY8E3
eLtGOY5j7MPtNsppmhgkmL7vHzFdmqbZQ8Kd1XXtUgdIWEEMVtNan+BdaAPCeg0w0B38UFXVJbQB
K8vSk4D6Smfwn0zontwyIKOtYKjBElie5x8GyDuqi6IIkkB3PQbIXwhna+1RKaWRP7cAnPMvBlmW
Ja+RsCLhJ3rzWtYopWxjwcDsl18shBhQq0QS9i3AADUVZzeru1sfAAAAAElFTkSuQmCC";
$_IMAGES["sql"] = $_IMAGES["database"];
$_IMAGES["tar"] = $_IMAGES["archive"];
$_IMAGES["tgz"] = $_IMAGES["archive"];
$_IMAGES["txt"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAKBmlUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOmRjPSJo
dHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0i
aHR0cDovL2lwdGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBs
dXNfMV89Imh0dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgICB4bWxuczp4bXA9
Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25z
LmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUu
Y29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgIHhtcFJpZ2h0czpNYXJrZWQ9IlRy
dWUiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMTEtMDEtMjVUMTM6NTU6MTMrMDE6MDAiCiAgIHht
cE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RkNBN0E2NTk4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIi
CiAgIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RkNBN0E2NTk4MjI4RTAxMTk4OUNDMEExQUQw
MkI1QzIiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpGQ0E3QTY1OTgyMjhF
MDExOTg5Q0MwQTFBRDAyQjVDMiI+CiAgIDx4bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgIDxyZGY6
QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9ucyBB
dHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFsdD4K
ICAgPC94bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgPGRjOmNyZWF0b3I+CiAgICA8cmRmOlNlcT4K
ICAgICA8cmRmOmxpPkdlbnRsZWZhY2UgY3VzdG9tIHRvb2xiYXIgaWNvbnMgZGVzaWduPC9yZGY6
bGk+CiAgICA8L3JkZjpTZXE+CiAgIDwvZGM6Y3JlYXRvcj4KICAgPGRjOmRlc2NyaXB0aW9uPgog
ICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5XaXJlZnJhbWUg
bW9ubyB0b29sYmFyIGljb25zPC9yZGY6bGk+CiAgICA8L3JkZjpBbHQ+CiAgIDwvZGM6ZGVzY3Jp
cHRpb24+CiAgIDxkYzpzdWJqZWN0PgogICAgPHJkZjpCYWc+CiAgICAgPHJkZjpsaT5jdXN0b20g
aWNvbiBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPnRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgICA8cmRmOmxpPmN1c3RvbSBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+aW50ZXJmYWNl
IGRlc2lnbjwvcmRmOmxpPgogICAgIDxyZGY6bGk+dWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJk
ZjpsaT5ndWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjpsaT50YXNrYmFyIGljb25zPC9yZGY6
bGk+CiAgICA8L3JkZjpCYWc+CiAgIDwvZGM6c3ViamVjdD4KICAgPGRjOnJpZ2h0cz4KICAgIDxy
ZGY6QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9u
cyBBdHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFs
dD4KICAgPC9kYzpyaWdodHM+CiAgIDxJcHRjNHhtcENvcmU6Q3JlYXRvckNvbnRhY3RJbmZvCiAg
ICBJcHRjNHhtcENvcmU6Q2lVcmxXb3JrPSJodHRwOi8vd3d3LmdlbnRsZWZhY2UuY29tIi8+CiAg
IDxwbHVzXzFfOkltYWdlQ3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAg
cGx1c18xXzpJbWFnZUNyZWF0b3JOYW1lPSJnZW50bGVmYWNlLmNvbSIvPgogICAgPC9yZGY6U2Vx
PgogICA8L3BsdXNfMV86SW1hZ2VDcmVhdG9yPgogICA8cGx1c18xXzpDb3B5cmlnaHRPd25lcj4K
ICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgcGx1c18xXzpDb3B5cmlnaHRPd25lck5h
bWU9ImdlbnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpDb3B5cmln
aHRPd25lcj4KICAgPHhtcE1NOkhpc3Rvcnk+CiAgICA8cmRmOlNlcT4KICAgICA8cmRmOmxpCiAg
ICAgIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiCiAgICAgIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6
RkNBN0E2NTk4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIiCiAgICAgIHN0RXZ0OndoZW49IjIwMTEt
MDEtMjVUMTM6NTU6MTMrMDE6MDAiCiAgICAgIHN0RXZ0OmNoYW5nZWQ9Ii9tZXRhZGF0YSIvPgog
ICAgPC9yZGY6U2VxPgogICA8L3htcE1NOkhpc3Rvcnk+CiAgPC9yZGY6RGVzY3JpcHRpb24+CiA8
L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+6dhU4gAAABl0RVh0U29m
dHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAA8dEVYdEFMVFRhZwBUaGlzIGlzIHRoZSBpY29u
IGZyb20gR2VudGxlZmFjZS5jb20gZnJlZSBpY29ucyBzZXQuINhr6MQAAABEdEVYdENvcHlyaWdo
dABDcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRp
dmVze92woAAAAEVpVFh0RGVzY3JpcHRpb24AAAAAAFRoaXMgaXMgdGhlIGljb24gZnJvbSBHZW50
bGVmYWNlLmNvbSBmcmVlIGljb25zIHNldC4gvBH4GgAAAEhpVFh0Q29weXJpZ2h0AAAAAABDcmVh
dGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRpdmVzWILL
BQAAARFJREFUeNqUk8+phDAQxpPlCQqCIngQD14FQdYO9lWwLWgHdvJKcFvYDrYD7WARBA+CePDm
n+wEzENNspCBjxknmc8fg2IEkSSJjTF+Q2kjSRBCHmVZZuf+ZTtEy7LYICTQi+Z1XdM4jguhQVVV
g2SY6slqahJFUcEZ0JjnWaZq/wxGaRiGBWfwhYC+OTv1Ujb3szeQLO8G6QX6hUVfId9BN3aOWREE
AUEKUdc1lhFkTdM8REO+7+dA8bfv/RN4nqdE0LbtkYBumBF0XSckcF03hyQmcBxHiaDve3xoWJZF
NqWyITjL2T2OwDRNJYJxHI8EhmGQTVICXddzdo8j0DRNiWCaJu47GL79zqcYWPERYAAVTc6No+pu
KwAAAABJRU5ErkJggg==";
$_IMAGES["key"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAKBmlUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOmRjPSJo
dHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0i
aHR0cDovL2lwdGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBs
dXNfMV89Imh0dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgICB4bWxuczp4bXA9
Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25z
LmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUu
Y29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgIHhtcFJpZ2h0czpNYXJrZWQ9IlRy
dWUiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMTEtMDEtMjVUMTM6NTU6MTErMDE6MDAiCiAgIHht
cE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NDE2NDZCNTg4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIi
CiAgIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NDE2NDZCNTg4MjI4RTAxMTk4OUNDMEExQUQw
MkI1QzIiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo0MTY0NkI1ODgyMjhF
MDExOTg5Q0MwQTFBRDAyQjVDMiI+CiAgIDx4bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgIDxyZGY6
QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9ucyBB
dHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFsdD4K
ICAgPC94bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgPGRjOmNyZWF0b3I+CiAgICA8cmRmOlNlcT4K
ICAgICA8cmRmOmxpPkdlbnRsZWZhY2UgY3VzdG9tIHRvb2xiYXIgaWNvbnMgZGVzaWduPC9yZGY6
bGk+CiAgICA8L3JkZjpTZXE+CiAgIDwvZGM6Y3JlYXRvcj4KICAgPGRjOmRlc2NyaXB0aW9uPgog
ICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5XaXJlZnJhbWUg
bW9ubyB0b29sYmFyIGljb25zPC9yZGY6bGk+CiAgICA8L3JkZjpBbHQ+CiAgIDwvZGM6ZGVzY3Jp
cHRpb24+CiAgIDxkYzpzdWJqZWN0PgogICAgPHJkZjpCYWc+CiAgICAgPHJkZjpsaT5jdXN0b20g
aWNvbiBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPnRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgICA8cmRmOmxpPmN1c3RvbSBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+aW50ZXJmYWNl
IGRlc2lnbjwvcmRmOmxpPgogICAgIDxyZGY6bGk+dWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJk
ZjpsaT5ndWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjpsaT50YXNrYmFyIGljb25zPC9yZGY6
bGk+CiAgICA8L3JkZjpCYWc+CiAgIDwvZGM6c3ViamVjdD4KICAgPGRjOnJpZ2h0cz4KICAgIDxy
ZGY6QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9u
cyBBdHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFs
dD4KICAgPC9kYzpyaWdodHM+CiAgIDxJcHRjNHhtcENvcmU6Q3JlYXRvckNvbnRhY3RJbmZvCiAg
ICBJcHRjNHhtcENvcmU6Q2lVcmxXb3JrPSJodHRwOi8vd3d3LmdlbnRsZWZhY2UuY29tIi8+CiAg
IDxwbHVzXzFfOkltYWdlQ3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAg
cGx1c18xXzpJbWFnZUNyZWF0b3JOYW1lPSJnZW50bGVmYWNlLmNvbSIvPgogICAgPC9yZGY6U2Vx
PgogICA8L3BsdXNfMV86SW1hZ2VDcmVhdG9yPgogICA8cGx1c18xXzpDb3B5cmlnaHRPd25lcj4K
ICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgcGx1c18xXzpDb3B5cmlnaHRPd25lck5h
bWU9ImdlbnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpDb3B5cmln
aHRPd25lcj4KICAgPHhtcE1NOkhpc3Rvcnk+CiAgICA8cmRmOlNlcT4KICAgICA8cmRmOmxpCiAg
ICAgIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiCiAgICAgIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6
NDE2NDZCNTg4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIiCiAgICAgIHN0RXZ0OndoZW49IjIwMTEt
MDEtMjVUMTM6NTU6MTErMDE6MDAiCiAgICAgIHN0RXZ0OmNoYW5nZWQ9Ii9tZXRhZGF0YSIvPgog
ICAgPC9yZGY6U2VxPgogICA8L3htcE1NOkhpc3Rvcnk+CiAgPC9yZGY6RGVzY3JpcHRpb24+CiA8
L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+WbiOoQAAABl0RVh0U29m
dHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAA8dEVYdEFMVFRhZwBUaGlzIGlzIHRoZSBpY29u
IGZyb20gR2VudGxlZmFjZS5jb20gZnJlZSBpY29ucyBzZXQuINhr6MQAAABEdEVYdENvcHlyaWdo
dABDcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRp
dmVze92woAAAAEVpVFh0RGVzY3JpcHRpb24AAAAAAFRoaXMgaXMgdGhlIGljb24gZnJvbSBHZW50
bGVmYWNlLmNvbSBmcmVlIGljb25zIHNldC4gvBH4GgAAAEhpVFh0Q29weXJpZ2h0AAAAAABDcmVh
dGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRpdmVzWILL
BQAAATxJREFUeNqUkEFqg0AUhmdsDQRFRBJwWcSFK9Eb2BM0PUF7hB4hPUHbE6Q9QXMDcwNdumvW
gmSyLKjTf8okTK0TkgcfT9+8/71/hpITkaapi/RCKV0gu7LMOOdvyK9FUTCqE8dxfINUQOyOnWNI
CW6vdANms9knUoQmovCO2nPf96KegO9RB1EUJWL7sF5VFZXn4kpiATPGBnRdlwEyJAzDRJ7fyZp7
rRngam5WBEHA1HOdg82Yg8NW5ZuNOmjb9gGvT86I9b8u3/dXED/K3xIkGjFDX/rHwXw+X8HWQbwB
mUa8hfi+ruvt0YHneSukoVg0fgyclE3TrA+63wGO46i21c3pfr8vT76CZVlL27a5JJd5B5bnvCKZ
Tqc54EoWZOTcME0zB1+ACyaTyYJcEoZh5ICDHXgiF8aPAAMATjKr6paMjUQAAAAASUVORK5CYII=";
$_IMAGES["dll"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAALJ2lUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6cGhvdG9z
aG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOnhtcD0i
aHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMu
YWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5j
b20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgIHhtbG5zOmRjPSJodHRwOi8vcHVy
bC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0iaHR0cDovL2lw
dGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBsdXNfMV89Imh0
dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgIHBob3Rvc2hvcDpIZWFkbGluZT0i
VXNlciBpbnRlcmZhY2UgbWFrZSB1cCIKICAgeG1wUmlnaHRzOk1hcmtlZD0iVHJ1ZSIKICAgeG1w
Ok1ldGFkYXRhRGF0ZT0iMjAxMS0wMS0yNVQxMzo1NToxNCswMTowMCIKICAgeG1wTU06SW5zdGFu
Y2VJRD0ieG1wLmlpZDo3REQ1NEM1QTgyMjhFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgeG1wTU06
RG9jdW1lbnRJRD0ieG1wLmRpZDoyNTVCQzdENEUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAg
eG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjI1NUJDN0Q0RTAyN0UwMTE5ODlDQzBB
MUFEMDJCNUMyIj4KICAgPHhtcFJpZ2h0czpVc2FnZVRlcm1zPgogICAgPHJkZjpBbHQ+CiAgICAg
PHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9u
LU5vbkNvbW1lcmNpYWwgbGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L3htcFJp
Z2h0czpVc2FnZVRlcm1zPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxy
ZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJzYXZlZCIKICAgICAgc3RFdnQ6aW5zdGFuY2VJRD0i
eG1wLmlpZDoyNTVCQzdENEUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgICAgc3RFdnQ6d2hl
bj0iMjAxMS0wMS0yNFQxODozOTowMSswMTowMCIKICAgICAgc3RFdnQ6Y2hhbmdlZD0iL21ldGFk
YXRhIi8+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2
dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjdERDU0QzVBODIyOEUwMTE5ODlDQzBBMUFEMDJCNUMyIgog
ICAgICBzdEV2dDp3aGVuPSIyMDExLTAxLTI1VDEzOjU1OjE0KzAxOjAwIgogICAgICBzdEV2dDpj
aGFuZ2VkPSIvbWV0YWRhdGEiLz4KICAgIDwvcmRmOlNlcT4KICAgPC94bXBNTTpIaXN0b3J5Pgog
ICA8ZGM6Y3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGk+R2VudGxlZmFjZSBjdXN0
b20gdG9vbGJhciBpY29ucyBkZXNpZ248L3JkZjpsaT4KICAgIDwvcmRmOlNlcT4KICAgPC9kYzpj
cmVhdG9yPgogICA8ZGM6ZGVzY3JpcHRpb24+CiAgICA8cmRmOkFsdD4KICAgICA8cmRmOmxpIHht
bDpsYW5nPSJ4LWRlZmF1bHQiPldpcmVmcmFtZSBtb25vIHRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgIDwvcmRmOkFsdD4KICAgPC9kYzpkZXNjcmlwdGlvbj4KICAgPGRjOnN1YmplY3Q+CiAgICA8
cmRmOkJhZz4KICAgICA8cmRmOmxpPmN1c3RvbSBpY29uIGRlc2lnbjwvcmRmOmxpPgogICAgIDxy
ZGY6bGk+dG9vbGJhciBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+Y3VzdG9tIGljb25zPC9y
ZGY6bGk+CiAgICAgPHJkZjpsaT5pbnRlcmZhY2UgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjps
aT51aSBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPmd1aSBkZXNpZ248L3JkZjpsaT4KICAg
ICA8cmRmOmxpPnRhc2tiYXIgaWNvbnM8L3JkZjpsaT4KICAgIDwvcmRmOkJhZz4KICAgPC9kYzpz
dWJqZWN0PgogICA8ZGM6cmlnaHRzPgogICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFu
Zz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uLU5vbkNvbW1lcmNpYWwg
bGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L2RjOnJpZ2h0cz4KICAgPElwdGM0
eG1wQ29yZTpDcmVhdG9yQ29udGFjdEluZm8KICAgIElwdGM0eG1wQ29yZTpDaVVybFdvcms9Imh0
dHA6Ly93d3cuZ2VudGxlZmFjZS5jb20iLz4KICAgPHBsdXNfMV86SW1hZ2VDcmVhdG9yPgogICAg
PHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBwbHVzXzFfOkltYWdlQ3JlYXRvck5hbWU9Imdl
bnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpJbWFnZUNyZWF0b3I+
CiAgIDxwbHVzXzFfOkNvcHlyaWdodE93bmVyPgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQog
ICAgICBwbHVzXzFfOkNvcHlyaWdodE93bmVyTmFtZT0iZ2VudGxlZmFjZS5jb20iLz4KICAgIDwv
cmRmOlNlcT4KICAgPC9wbHVzXzFfOkNvcHlyaWdodE93bmVyPgogIDwvcmRmOkRlc2NyaXB0aW9u
PgogPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KPD94cGFja2V0IGVuZD0iciI/Ps8FVQIAAAAZdEVY
dFNvZnR3YXJlAEFkb2JlIEltYWdlUmVhZHlxyWU8AAABj0lEQVR42oRSO27CQBD1RoECIRQhUYD4
OFQUCGEuEHyDcAPnJFGOkBPgG5AbODfAQhRUOAiJEpGGgt/mvc3aWgXHrDSeN+OZnc9by8JxHKdP
PRgMAorpu3VEr9frCyGmUsoQWiXFGNqZzWZh5gX8dLvdKRSTP7V/CAnn87lzs4NOpxPECYvFQiXA
l1wIn5t1wf35fL5ypvkyR2i326oiZ1fO312EsN+AJ8D+crl8QdwY2IN/FEXRh+qg1Wr1UVEl6LYt
Az9p22s2mzbihtp+SEZYrVZho9Fw1ut1WK/XFYWXy+UdlZn8DX3VNjqwa7WaB7gTaXNVq1VpmKTU
3Ww2OyTZSJ4YnVp3aRegVf90OlkU4NHxeAwqlYqEntA2/vniv+2Wy2VF73a7FcBmR4+QiBTjn5va
QalUGnNhpBOYywuJqXVlypBxqR0Ui0VpLIx0jvb7/VehULBJa/zkk3fw9yDwmVRx29CvKSF8H19k
IfOV5XI5DyIp+Xw+iDH9mSwYbOz0vP7hcHCptZ1U/hFgACTi3/gUKqW9AAAAAElFTkSuQmCC";
$_IMAGES["ini"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAALJ2lUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6cGhvdG9z
aG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOnhtcD0i
aHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMu
YWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5j
b20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgIHhtbG5zOmRjPSJodHRwOi8vcHVy
bC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0iaHR0cDovL2lw
dGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBsdXNfMV89Imh0
dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgIHBob3Rvc2hvcDpIZWFkbGluZT0i
VXNlciBpbnRlcmZhY2UgbWFrZSB1cCIKICAgeG1wUmlnaHRzOk1hcmtlZD0iVHJ1ZSIKICAgeG1w
Ok1ldGFkYXRhRGF0ZT0iMjAxMS0wMS0yNVQxMzo1NToxNCswMTowMCIKICAgeG1wTU06SW5zdGFu
Y2VJRD0ieG1wLmlpZDo3REQ1NEM1QTgyMjhFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgeG1wTU06
RG9jdW1lbnRJRD0ieG1wLmRpZDoyNTVCQzdENEUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAg
eG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjI1NUJDN0Q0RTAyN0UwMTE5ODlDQzBB
MUFEMDJCNUMyIj4KICAgPHhtcFJpZ2h0czpVc2FnZVRlcm1zPgogICAgPHJkZjpBbHQ+CiAgICAg
PHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9u
LU5vbkNvbW1lcmNpYWwgbGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L3htcFJp
Z2h0czpVc2FnZVRlcm1zPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxy
ZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJzYXZlZCIKICAgICAgc3RFdnQ6aW5zdGFuY2VJRD0i
eG1wLmlpZDoyNTVCQzdENEUwMjdFMDExOTg5Q0MwQTFBRDAyQjVDMiIKICAgICAgc3RFdnQ6d2hl
bj0iMjAxMS0wMS0yNFQxODozOTowMSswMTowMCIKICAgICAgc3RFdnQ6Y2hhbmdlZD0iL21ldGFk
YXRhIi8+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2
dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjdERDU0QzVBODIyOEUwMTE5ODlDQzBBMUFEMDJCNUMyIgog
ICAgICBzdEV2dDp3aGVuPSIyMDExLTAxLTI1VDEzOjU1OjE0KzAxOjAwIgogICAgICBzdEV2dDpj
aGFuZ2VkPSIvbWV0YWRhdGEiLz4KICAgIDwvcmRmOlNlcT4KICAgPC94bXBNTTpIaXN0b3J5Pgog
ICA8ZGM6Y3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGk+R2VudGxlZmFjZSBjdXN0
b20gdG9vbGJhciBpY29ucyBkZXNpZ248L3JkZjpsaT4KICAgIDwvcmRmOlNlcT4KICAgPC9kYzpj
cmVhdG9yPgogICA8ZGM6ZGVzY3JpcHRpb24+CiAgICA8cmRmOkFsdD4KICAgICA8cmRmOmxpIHht
bDpsYW5nPSJ4LWRlZmF1bHQiPldpcmVmcmFtZSBtb25vIHRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgIDwvcmRmOkFsdD4KICAgPC9kYzpkZXNjcmlwdGlvbj4KICAgPGRjOnN1YmplY3Q+CiAgICA8
cmRmOkJhZz4KICAgICA8cmRmOmxpPmN1c3RvbSBpY29uIGRlc2lnbjwvcmRmOmxpPgogICAgIDxy
ZGY6bGk+dG9vbGJhciBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+Y3VzdG9tIGljb25zPC9y
ZGY6bGk+CiAgICAgPHJkZjpsaT5pbnRlcmZhY2UgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjps
aT51aSBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPmd1aSBkZXNpZ248L3JkZjpsaT4KICAg
ICA8cmRmOmxpPnRhc2tiYXIgaWNvbnM8L3JkZjpsaT4KICAgIDwvcmRmOkJhZz4KICAgPC9kYzpz
dWJqZWN0PgogICA8ZGM6cmlnaHRzPgogICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFu
Zz0ieC1kZWZhdWx0Ij5DcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uLU5vbkNvbW1lcmNpYWwg
bGljZW5zZTwvcmRmOmxpPgogICAgPC9yZGY6QWx0PgogICA8L2RjOnJpZ2h0cz4KICAgPElwdGM0
eG1wQ29yZTpDcmVhdG9yQ29udGFjdEluZm8KICAgIElwdGM0eG1wQ29yZTpDaVVybFdvcms9Imh0
dHA6Ly93d3cuZ2VudGxlZmFjZS5jb20iLz4KICAgPHBsdXNfMV86SW1hZ2VDcmVhdG9yPgogICAg
PHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBwbHVzXzFfOkltYWdlQ3JlYXRvck5hbWU9Imdl
bnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpJbWFnZUNyZWF0b3I+
CiAgIDxwbHVzXzFfOkNvcHlyaWdodE93bmVyPgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQog
ICAgICBwbHVzXzFfOkNvcHlyaWdodE93bmVyTmFtZT0iZ2VudGxlZmFjZS5jb20iLz4KICAgIDwv
cmRmOlNlcT4KICAgPC9wbHVzXzFfOkNvcHlyaWdodE93bmVyPgogIDwvcmRmOkRlc2NyaXB0aW9u
PgogPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KPD94cGFja2V0IGVuZD0iciI/Ps8FVQIAAAAZdEVY
dFNvZnR3YXJlAEFkb2JlIEltYWdlUmVhZHlxyWU8AAABj0lEQVR42oRSO27CQBD1RoECIRQhUYD4
OFQUCGEuEHyDcAPnJFGOkBPgG5AbODfAQhRUOAiJEpGGgt/mvc3aWgXHrDSeN+OZnc9by8JxHKdP
PRgMAorpu3VEr9frCyGmUsoQWiXFGNqZzWZh5gX8dLvdKRSTP7V/CAnn87lzs4NOpxPECYvFQiXA
l1wIn5t1wf35fL5ypvkyR2i326oiZ1fO312EsN+AJ8D+crl8QdwY2IN/FEXRh+qg1Wr1UVEl6LYt
Az9p22s2mzbihtp+SEZYrVZho9Fw1ut1WK/XFYWXy+UdlZn8DX3VNjqwa7WaB7gTaXNVq1VpmKTU
3Ww2OyTZSJ4YnVp3aRegVf90OlkU4NHxeAwqlYqEntA2/vniv+2Wy2VF73a7FcBmR4+QiBTjn5va
QalUGnNhpBOYywuJqXVlypBxqR0Ui0VpLIx0jvb7/VehULBJa/zkk3fw9yDwmVRx29CvKSF8H19k
IfOV5XI5DyIp+Xw+iDH9mSwYbOz0vP7hcHCptZ1U/hFgACTi3/gUKqW9AAAAAElFTkSuQmCC";
$_IMAGES["lib"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAKBmlUWHRYTUw6Y29tLmFkb2JlLnht
cAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQi
Pz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1Q
IENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPgog
PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50
YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6eG1wUmln
aHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIKICAgIHhtbG5zOmRjPSJo
dHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgIHhtbG5zOklwdGM0eG1wQ29yZT0i
aHR0cDovL2lwdGMub3JnL3N0ZC9JcHRjNHhtcENvcmUvMS4wL3htbG5zLyIKICAgIHhtbG5zOnBs
dXNfMV89Imh0dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iCiAgICB4bWxuczp4bXA9
Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25z
LmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUu
Y29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgIHhtcFJpZ2h0czpNYXJrZWQ9IlRy
dWUiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMTEtMDEtMjVUMTM6NTU6MTErMDE6MDAiCiAgIHht
cE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6M0Q2NDZCNTg4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIi
CiAgIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6M0Q2NDZCNTg4MjI4RTAxMTk4OUNDMEExQUQw
MkI1QzIiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDozRDY0NkI1ODgyMjhF
MDExOTg5Q0MwQTFBRDAyQjVDMiI+CiAgIDx4bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgIDxyZGY6
QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9ucyBB
dHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFsdD4K
ICAgPC94bXBSaWdodHM6VXNhZ2VUZXJtcz4KICAgPGRjOmNyZWF0b3I+CiAgICA8cmRmOlNlcT4K
ICAgICA8cmRmOmxpPkdlbnRsZWZhY2UgY3VzdG9tIHRvb2xiYXIgaWNvbnMgZGVzaWduPC9yZGY6
bGk+CiAgICA8L3JkZjpTZXE+CiAgIDwvZGM6Y3JlYXRvcj4KICAgPGRjOmRlc2NyaXB0aW9uPgog
ICAgPHJkZjpBbHQ+CiAgICAgPHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5XaXJlZnJhbWUg
bW9ubyB0b29sYmFyIGljb25zPC9yZGY6bGk+CiAgICA8L3JkZjpBbHQ+CiAgIDwvZGM6ZGVzY3Jp
cHRpb24+CiAgIDxkYzpzdWJqZWN0PgogICAgPHJkZjpCYWc+CiAgICAgPHJkZjpsaT5jdXN0b20g
aWNvbiBkZXNpZ248L3JkZjpsaT4KICAgICA8cmRmOmxpPnRvb2xiYXIgaWNvbnM8L3JkZjpsaT4K
ICAgICA8cmRmOmxpPmN1c3RvbSBpY29uczwvcmRmOmxpPgogICAgIDxyZGY6bGk+aW50ZXJmYWNl
IGRlc2lnbjwvcmRmOmxpPgogICAgIDxyZGY6bGk+dWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJk
ZjpsaT5ndWkgZGVzaWduPC9yZGY6bGk+CiAgICAgPHJkZjpsaT50YXNrYmFyIGljb25zPC9yZGY6
bGk+CiAgICA8L3JkZjpCYWc+CiAgIDwvZGM6c3ViamVjdD4KICAgPGRjOnJpZ2h0cz4KICAgIDxy
ZGY6QWx0PgogICAgIDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q3JlYXRpdmUgQ29tbW9u
cyBBdHRyaWJ1dGlvbi1Ob25Db21tZXJjaWFsIGxpY2Vuc2U8L3JkZjpsaT4KICAgIDwvcmRmOkFs
dD4KICAgPC9kYzpyaWdodHM+CiAgIDxJcHRjNHhtcENvcmU6Q3JlYXRvckNvbnRhY3RJbmZvCiAg
ICBJcHRjNHhtcENvcmU6Q2lVcmxXb3JrPSJodHRwOi8vd3d3LmdlbnRsZWZhY2UuY29tIi8+CiAg
IDxwbHVzXzFfOkltYWdlQ3JlYXRvcj4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAg
cGx1c18xXzpJbWFnZUNyZWF0b3JOYW1lPSJnZW50bGVmYWNlLmNvbSIvPgogICAgPC9yZGY6U2Vx
PgogICA8L3BsdXNfMV86SW1hZ2VDcmVhdG9yPgogICA8cGx1c18xXzpDb3B5cmlnaHRPd25lcj4K
ICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgcGx1c18xXzpDb3B5cmlnaHRPd25lck5h
bWU9ImdlbnRsZWZhY2UuY29tIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwvcGx1c18xXzpDb3B5cmln
aHRPd25lcj4KICAgPHhtcE1NOkhpc3Rvcnk+CiAgICA8cmRmOlNlcT4KICAgICA8cmRmOmxpCiAg
ICAgIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiCiAgICAgIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6
M0Q2NDZCNTg4MjI4RTAxMTk4OUNDMEExQUQwMkI1QzIiCiAgICAgIHN0RXZ0OndoZW49IjIwMTEt
MDEtMjVUMTM6NTU6MTErMDE6MDAiCiAgICAgIHN0RXZ0OmNoYW5nZWQ9Ii9tZXRhZGF0YSIvPgog
ICAgPC9yZGY6U2VxPgogICA8L3htcE1NOkhpc3Rvcnk+CiAgPC9yZGY6RGVzY3JpcHRpb24+CiA8
L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+2M4PKQAAABl0RVh0U29m
dHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAA8dEVYdEFMVFRhZwBUaGlzIGlzIHRoZSBpY29u
IGZyb20gR2VudGxlZmFjZS5jb20gZnJlZSBpY29ucyBzZXQuINhr6MQAAABEdEVYdENvcHlyaWdo
dABDcmVhdGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRp
dmVze92woAAAAEVpVFh0RGVzY3JpcHRpb24AAAAAAFRoaXMgaXMgdGhlIGljb24gZnJvbSBHZW50
bGVmYWNlLmNvbSBmcmVlIGljb25zIHNldC4gvBH4GgAAAEhpVFh0Q29weXJpZ2h0AAAAAABDcmVh
dGl2ZSBDb21tb25zIEF0dHJpYnV0aW9uIE5vbi1Db21tZXJjaWFsIE5vIERlcml2YXRpdmVzWILL
BQAAAXBJREFUeNqkUk1qg1AQjrG60CAuBEUklYAbIeAN6hFyg3qD9gbBE7Q9gekJmhvU3iCQpRBE
XCi4eGSRZew3IYrmp02p8DFv3sx8M/P5BoN/fty1gOd5Acdxc8Cu6zoFwtVqtfiRYDqdqjCzpvA0
uSHCcbler1lL4LouFT6j6AlWvWFyBqI32Nc78vb7/QtM8IfVqckcuG9XcBzHBytd+jcQxJg2TJIk
PhNxMpkQ0eOViRYofN9sNnFPRMuyaCRSXUXxIs/zdDwe28eJSMyUOmZZliLXxjlAjB0IicA0zajb
EcEliVQURdvJMAyfRAZmvYmak67rtPschV0NiOALeOhqAxK6D8uyPNdA07RfNaiqqq+Boig9Dbbb
baqqqn38VQcNqCNjLEVuT4MDy2g0ioC6gSzLH5Ik9X4n+XTfzaM6rptw+g7gtxqgq3/6Dna7XXy2
pCiKviAIEVBfQETxm94qz/P2cDiMgE+y5F/K+xZgAMGepBuEAlFhAAAAAElFTkSuQmCC";
$_IMAGES["wav"] = $_IMAGES["audio"];
$_IMAGES["wma"] = $_IMAGES["audio"];
$_IMAGES["wmv"] = $_IMAGES["video"];
$_IMAGES["xcf"] = $_IMAGES["graphics"];
$_IMAGES["xls"] = $_IMAGES["spreadsheet"];
$_IMAGES["xlsx"] = $_IMAGES["spreadsheet"];
$_IMAGES["xml"] = $_IMAGES["code"];
$_IMAGES["zip"] = $_IMAGES["archive"];

/***************************************************************************/
/*   HERE COMES THE CODE.                                                  */
/*   DON'T CHANGE UNLESS YOU KNOW WHAT YOU ARE DOING ;)                    */
/***************************************************************************/

//
// The class that displays images (icons and thumbnails)
//
class ImageServer
{
	//
	// Checks if an image is requested and displays one if needed
	//
	public static function showImage()
	{
		global $_IMAGES;
		if(isset($_GET['img']))
		{
			$mtime = gmdate('r', filemtime($_SERVER['SCRIPT_FILENAME']));
			$etag = md5($mtime.$_SERVER['SCRIPT_FILENAME']);

			if ((isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && $_SERVER['HTTP_IF_MODIFIED_SINCE'] == $mtime)
				|| (isset($_SERVER['HTTP_IF_NONE_MATCH']) && str_replace('"', '', stripslashes($_SERVER['HTTP_IF_NONE_MATCH'])) == $etag))
			{
				header('HTTP/1.1 304 Not Modified');
				return true;
			}
			else {
				header('ETag: "'.$etag.'"');
				header('Last-Modified: '.$mtime);
				header('Content-type: image/gif');
				if(strlen($_GET['img']) > 0 && isset($_IMAGES[$_GET['img']]))
					print base64_decode($_IMAGES[$_GET['img']]);
				else
					print base64_decode($_IMAGES["unknown"]);
			}
			return true;
		}
		else if(isset($_GET['thumb']))
		{
			if(strlen($_GET['thumb']) > 0 && EncodeExplorer::getConfig('thumbnails') == true)
			{
				ImageServer::showThumbnail($_GET['thumb']);
			}
			return true;
		}
		return false;
	}

	public static function isEnabledPdf()
	{
		if(class_exists("Imagick"))
			return true;
		return false;
	}

	public static function openPdf($file)
	{
		if(!ImageServer::isEnabledPdf())
			return null;

		$im = new Imagick($file.'[0]');
		$im->setImageFormat( "png" );
		$str = $im->getImageBlob();
		$im2 = imagecreatefromstring($str);
		return $im2;
	}

	//
	// Creates and returns a thumbnail image object from an image file
	//
	public static function createThumbnail($file)
	{
		if(is_int(EncodeExplorer::getConfig('thumbnails_width')))
			$max_width = EncodeExplorer::getConfig('thumbnails_width');
		else
			$max_width = 200;

		if(is_int(EncodeExplorer::getConfig('thumbnails_height')))
			$max_height = EncodeExplorer::getConfig('thumbnails_height');
		else
			$max_height = 200;

		if(File::isPdfFile($file))
			$image = ImageServer::openPdf($file);
		else
			$image = ImageServer::openImage($file);
		if($image == null)
			return;

		imagealphablending($image, true);
		imagesavealpha($image, true);

		$width = imagesx($image);
		$height = imagesy($image);

		$new_width = $max_width;
		$new_height = $max_height;
		if(($width/$height) > ($new_width/$new_height))
			$new_height = $new_width * ($height / $width);
		else
			$new_width = $new_height * ($width / $height);

		if($new_width >= $width && $new_height >= $height)
		{
			$new_width = $width;
			$new_height = $height;
		}

		$new_image = ImageCreateTrueColor($new_width, $new_height);
		imagealphablending($new_image, true);
		imagesavealpha($new_image, true);
		$trans_colour = imagecolorallocatealpha($new_image, 0, 0, 0, 127);
		imagefill($new_image, 0, 0, $trans_colour);

		imagecopyResampled ($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

		return $new_image;
	}

	//
	// Function for displaying the thumbnail.
	// Includes attempts at cacheing it so that generation is minimised.
	//
	public static function showThumbnail($file)
	{
		if(filemtime($file) < filemtime($_SERVER['SCRIPT_FILENAME']))
			$mtime = gmdate('r', filemtime($_SERVER['SCRIPT_FILENAME']));
		else
			$mtime = gmdate('r', filemtime($file));

		$etag = md5($mtime.$file);

		if ((isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && $_SERVER['HTTP_IF_MODIFIED_SINCE'] == $mtime)
			|| (isset($_SERVER['HTTP_IF_NONE_MATCH']) && str_replace('"', '', stripslashes($_SERVER['HTTP_IF_NONE_MATCH'])) == $etag))
		{
			header('HTTP/1.1 304 Not Modified');
			return;
		}
		else
		{
			header('ETag: "'.$etag.'"');
			header('Last-Modified: '.$mtime);
			header('Content-Type: image/png');
			$image = ImageServer::createThumbnail($file);
			imagepng($image);
		}
	}

	//
	// A helping function for opening different types of image files
	//
	public static function openImage ($file)
	{
		$size = getimagesize($file);
		switch($size["mime"])
		{
			case "image/jpeg":
				$im = imagecreatefromjpeg($file);
			break;
			case "image/gif":
				$im = imagecreatefromgif($file);
			break;
			case "image/png":
				$im = imagecreatefrompng($file);
			break;
			default:
				$im=null;
			break;
		}
		return $im;
	}
}

//
// The class for logging user activity
//
class Logger
{
	public static function log($message)
	{
		global $encodeExplorer;
		if(strlen(EncodeExplorer::getConfig('log_file')) > 0)
		{
			if(Location::isFileWritable(EncodeExplorer::getConfig('log_file')))
			{
				$message = "[" . date("Y-m-d h:i:s A", mktime()) . "] ".$message." (".$_SERVER["HTTP_USER_AGENT"].")\n";
				error_log($message, 3, EncodeExplorer::getConfig('log_file'));
			}
			else
				$encodeExplorer->setErrorString("log_file_permission_error");
		}
	}

	public static function logAccess($path, $isDir)
	{
		$message = $_SERVER['REMOTE_ADDR']." ".GateKeeper::getUserName()." accessed ";
		$message .= $isDir?"dir":"file";
		$message .= " ".$path;
		Logger::log($message);
	}

	public static function logQuery()
	{
		if(isset($_POST['log']) && strlen($_POST['log']) > 0)
		{
			Logger::logAccess($_POST['log'], false);
			return true;
		}
		else
			return false;
	}

	public static function logCreation($path, $isDir)
	{
		$message = $_SERVER['REMOTE_ADDR']." ".GateKeeper::getUserName()." created ";
		$message .= $isDir?"dir":"file";
		$message .= " ".$path;
		Logger::log($message);
	}

	public static function emailNotification($path, $isFile)
	{
		if(strlen(EncodeExplorer::getConfig('upload_email')) > 0)
		{
			//$message = "Wir möchten Sie wissen lassen, dass/ We want let you know, that [".GateKeeper::getUserName()."] ";
			//$message .= ($isFile?"eine neue Datei/ created a new file":"ein neues Verzeichnis/ created  new directory")." in Ihrer DropYet erstellte./ in your DropYet.\n\n";
			$message .= "Eine neue Datei wurde erstellt./ A new file was created.\n";
			$message .= "Pfad [path] : ".$path."\n";
			$message .= "IP: ".$_SERVER['REMOTE_ADDR']." | Device: ".$_SERVER["HTTP_USER_AGENT"]."\n\n";
			$message .= "Um diese Benachrichtigungen zu deaktivieren, lassen Sie einfach das E-Mail Feld in den Einstellungen frei.\nTo disable this notification, just keep the email field in the settings empty.\n";
			mail(EncodeExplorer::getConfig('upload_email'), "Aktivitätsbenachrichtigung/ Activity in your DropYet!", $message);
		}
	}
}

//
// The class controls logging in and authentication
//
class GateKeeper
{
	public static function init()
	{
		global $encodeExplorer;
		if(strlen(EncodeExplorer::getConfig("session_name")) > 0)
				session_name(EncodeExplorer::getConfig("session_name"));

		if(count(EncodeExplorer::getConfig("users")) > 0)
			session_start();
		else
			return;

		if(isset($_GET['logout']))
		{
			$_SESSION['ee_user_name'] = null;
			$_SESSION['ee_user_pass'] = null;
		}

		if(isset($_POST['user_pass']) && strlen($_POST['user_pass']) > 0)
		{
			if (EncodeExplorer::getConfig("md5_passwords") == false)
			{
				$password = $_POST['user_pass'];
			} else 
				$salt = "tXZlEmX0E2h0qr2knfDz";
				$password = hash('sha512', $salt . $_POST['user_pass']);
		
			if(GateKeeper::isUser((isset($_POST['user_name'])?$_POST['user_name']:""), $password))
			{
				$_SESSION['ee_user_name'] = isset($_POST['user_name'])?$_POST['user_name']:"";
				$_SESSION['ee_user_pass'] = $password;

				$addr  = $_SERVER['PHP_SELF'];
				$param = '';

				if(isset($_GET['m']))
					$param .= (strlen($param) == 0 ? '?m' : '&m');

				if(isset($_GET['s']))
					$param .= (strlen($param) == 0 ? '?s' : '&s');

				if(isset($_GET['dir']) && strlen($_GET['dir']) > 0)
				{
					$param .= (strlen($param) == 0 ? '?dir=' : '&dir=');
					$param .= urlencode($_GET['dir']);
				}
				header( "Location: ".$addr.$param);
			}
			else
				$encodeExplorer->setErrorString("wrong_pass");
		}
	}

	public static function isUser($userName, $userPass)
	{
		foreach(EncodeExplorer::getConfig("users") as $user)
		{
			if($user[1] == $userPass)
			{
				if(strlen($userName) == 0 || $userName == $user[0])
				{
					return true;
				}
			}
		}
		return false;
	}

	public static function isLoginRequired()
	{
		if(EncodeExplorer::getConfig("require_login") == false){
			return false;
		}
		return true;
	}

	public static function isUserLoggedIn()
	{
		if(isset($_SESSION['ee_user_name'], $_SESSION['ee_user_pass']))
		{
			if(GateKeeper::isUser($_SESSION['ee_user_name'], $_SESSION['ee_user_pass']))
				return true;
		}
		return false;
	}

	public static function isAccessAllowed()
	{
		if(!GateKeeper::isLoginRequired() || GateKeeper::isUserLoggedIn())
			return true;
		return false;
	}

	public static function isUploadAllowed(){
		if(EncodeExplorer::getConfig("upload_enable") == true && GateKeeper::isUserLoggedIn() == true && GateKeeper::getUserStatus() == "admin")
			return true;
		return false;
	}

	public static function isNewdirAllowed(){
		if(EncodeExplorer::getConfig("newdir_enable") == true && GateKeeper::isUserLoggedIn() == true && GateKeeper::getUserStatus() == "admin")
			return true;
		return false;
	}

	public static function isDeleteAllowed(){
		if(EncodeExplorer::getConfig("delete_enable") == true && GateKeeper::isUserLoggedIn() == true && GateKeeper::getUserStatus() == "admin")
			return true;
		return false;
	}

	public static function getUserStatus(){
		if(GateKeeper::isUserLoggedIn() == true && EncodeExplorer::getConfig("users") != null && is_array(EncodeExplorer::getConfig("users"))){
			foreach(EncodeExplorer::getConfig("users") as $user){
				if($user[0] != null && $user[0] == $_SESSION['ee_user_name'])
					return $user[2];
			}
		}
		return null;
	}

	public static function getUserName()
	{
		if(GateKeeper::isUserLoggedIn() == true && isset($_SESSION['ee_user_name']) && strlen($_SESSION['ee_user_name']) > 0)
			return $_SESSION['ee_user_name'];
		if(isset($_SERVER["REMOTE_USER"]) && strlen($_SERVER["REMOTE_USER"]) > 0)
			return $_SERVER["REMOTE_USER"];
		if(isset($_SERVER['PHP_AUTH_USER']) && strlen($_SERVER['PHP_AUTH_USER']) > 0)
			return $_SERVER['PHP_AUTH_USER'];
		return "an anonymous user";
	}

	public static function showLoginBox(){
		if(!GateKeeper::isUserLoggedIn() && count(EncodeExplorer::getConfig("users")) > 0)
			return true;
		return false;
	}
}

//
// The class for any kind of file managing (new folder, upload, etc).
//
class FileManager
{
	/* Obsolete code
	function checkPassword($inputPassword)
	{
		global $encodeExplorer;
		if(strlen(EncodeExplorer::getConfig("upload_password")) > 0 && $inputPassword == EncodeExplorer::getConfig("upload_password"))
		{
			return true;
		}
		else
		{
			$encodeExplorer->setErrorString("wrong_password");
			return false;
		}
	}
	*/
	function newFolder($location, $dirname)
	{
		global $encodeExplorer;
		if(strlen($dirname) > 0)
		{
			$forbidden = array(".", "/", "\\");
			for($i = 0; $i < count($forbidden); $i++)
			{
				$dirname = str_replace($forbidden[$i], "", $dirname);
			}

			if(!$location->uploadAllowed())
			{
				// The system configuration does not allow uploading here
				$encodeExplorer->setErrorString("upload_not_allowed");
			}
			else if(!$location->isWritable())
			{
				// The target directory is not writable
				$encodeExplorer->setErrorString("upload_dir_not_writable");
			}
			else if(!mkdir($location->getDir(true, false, false, 0).$dirname, EncodeExplorer::getConfig("new_dir_mode")))
			{
				// Error creating a new directory
				$encodeExplorer->setErrorString("new_dir_failed");
			}
			else if(!chmod($location->getDir(true, false, false, 0).$dirname, EncodeExplorer::getConfig("new_dir_mode")))
			{
				// Error applying chmod
				$encodeExplorer->setErrorString("chmod_dir_failed");
			}
			else
			{
				// Directory successfully created, sending e-mail notification
				Logger::logCreation($location->getDir(true, false, false, 0).$dirname, true);
				Logger::emailNotification($location->getDir(true, false, false, 0).$dirname, false);
			}
		}
	}

	function uploadFile($location, $userfile)
	{
		global $encodeExplorer;
		$name = basename($userfile['name']);
		if(get_magic_quotes_gpc())
			$name = stripslashes($name);

		$upload_dir = $location->getFullPath();
		$upload_file = $upload_dir . $name;

		if(function_exists("finfo_open") && function_exists("finfo_file"))
			$mime_type = File::getFileMime($userfile['tmp_name']);
		else
			$mime_type = $userfile['type'];

		$extension = File::getFileExtension($userfile['name']);

		if(!$location->uploadAllowed())
		{
			$encodeExplorer->setErrorString("upload_not_allowed");
		}
		else if(!$location->isWritable())
		{
			$encodeExplorer->setErrorString("upload_dir_not_writable");
		}
		else if(!is_uploaded_file($userfile['tmp_name']))
		{
			$encodeExplorer->setErrorString("failed_upload");
		}
		else if(is_array(EncodeExplorer::getConfig("upload_allow_type")) && count(EncodeExplorer::getConfig("upload_allow_type")) > 0 && !in_array($mime_type, EncodeExplorer::getConfig("upload_allow_type")))
		{
			$encodeExplorer->setErrorString("upload_type_not_allowed");
		}
		else if(is_array(EncodeExplorer::getConfig("upload_reject_extension")) && count(EncodeExplorer::getConfig("upload_reject_extension")) > 0 && in_array($extension, EncodeExplorer::getConfig("upload_reject_extension")))
		{
			$encodeExplorer->setErrorString("upload_type_not_allowed");
		}
		else if(!@move_uploaded_file($userfile['tmp_name'], $upload_file))
		{
			$encodeExplorer->setErrorString("failed_move");
		}
		else
		{
			chmod($upload_file, EncodeExplorer::getConfig("upload_file_mode"));
			Logger::logCreation($location->getDir(true, false, false, 0).$name, false);
			Logger::emailNotification($location->getDir(true, false, false, 0).$name, true);
		}
	}

	public static function delete_dir($dir) {
		if (is_dir($dir)) {
			$objects = scandir($dir);
			foreach ($objects as $object) {
				if ($object != "." && $object != "..") {
					if (filetype($dir."/".$object) == "dir")
						FileManager::delete_dir($dir."/".$object);
					else
						unlink($dir."/".$object);
				}
			}
			reset($objects);
			rmdir($dir);
		}
	}

	public static function delete_file($file){
		if(is_file($file)){
			unlink($file);
		}
	}

	//
	// The main function, checks if the user wants to perform any supported operations
	//
	function run($location)
	{
		if(isset($_POST['userdir']) && strlen($_POST['userdir']) > 0){
			if($location->uploadAllowed() && GateKeeper::isUserLoggedIn() && GateKeeper::isAccessAllowed() && GateKeeper::isNewdirAllowed()){
				$this->newFolder($location, $_POST['userdir']);
			}
		}

		if(isset($_FILES['userfile']['name']) && strlen($_FILES['userfile']['name']) > 0){
			if($location->uploadAllowed() && GateKeeper::isUserLoggedIn() && GateKeeper::isAccessAllowed() && GateKeeper::isUploadAllowed()){
				$this->uploadFile($location, $_FILES['userfile']);
			}
		}

		if(isset($_GET['del'])){
			if(GateKeeper::isUserLoggedIn() && GateKeeper::isAccessAllowed() && GateKeeper::isDeleteAllowed()){
				$split_path = Location::splitPath($_GET['del']);
				$path = "";
				for($i = 0; $i < count($split_path); $i++){
					$path .= $split_path[$i];
					if($i + 1 < count($split_path))
						$path .= "/";
				}
				if($path == "" || $path == "/" || $path == "\\" || $path == ".")
					return;

				if(is_dir($path))
					FileManager::delete_dir($path);
				else if(is_file($path))
					FileManager::delete_file($path);
			}
		}
	}
}

//
// Dir class holds the information about one directory in the list
//
class Dir
{
	var $name;
	var $location;

	//
	// Constructor
	//
	function Dir($name, $location)
	{
		$this->name = $name;
		$this->location = $location;
	}

	function getName()
	{
		return $this->name;
	}

	function getNameHtml()
	{
		return htmlspecialchars($this->name);
	}

	function getNameEncoded()
	{
		return rawurlencode($this->name);
	}

	//
	// Debugging output
	//
	function debug()
	{
		print("Dir name (htmlspecialchars): ".$this->getName()."\n");
		print("Dir location: ".$this->location->getDir(true, false, false, 0)."\n");
	}
}

//
// File class holds the information about one file in the list
//
class File
{
	var $name;
	var $location;
	var $size;
	//var $extension;
	var $type;
	var $modTime;

	//
	// Constructor
	//
	function File($name, $location)
	{
		$this->name = $name;
		$this->location = $location;

		$this->type = File::getFileType($this->location->getDir(true, false, false, 0).$this->getName());
		$this->size = File::getFileSize($this->location->getDir(true, false, false, 0).$this->getName());
		$this->modTime = filemtime($this->location->getDir(true, false, false, 0).$this->getName());
	}

	function getName()
	{
		return $this->name;
	}

	function getNameEncoded()
	{
		return rawurlencode($this->name);
	}

	function getNameHtml()
	{
		return htmlspecialchars($this->name);
	}

	function getSize()
	{
		return $this->size;
	}

	function getType()
	{
		return $this->type;
	}

	function getModTime()
	{
		return $this->modTime;
	}

	//
	// Determine the size of a file
	//
	public static function getFileSize($file)
	{
		$sizeInBytes = filesize($file);

		// If filesize() fails (with larger files), try to get the size from unix command line.
		if (EncodeExplorer::getConfig("large_files") == true || !$sizeInBytes || $sizeInBytes < 0) {
			$sizeInBytes=exec("ls -l '$file' | awk '{print $5}'");
		}
		return $sizeInBytes;
	}

	public static function getFileType($filepath)
	{
		/*
		 * This extracts the information from the file contents.
		 * Unfortunately it doesn't properly detect the difference between text-based file types.
		 *
		$mime_type = File::getMimeType($filepath);
		$mime_type_chunks = explode("/", $mime_type, 2);
		$type = $mime_type_chunks[1];
		*/
		return File::getFileExtension($filepath);
	}

	public static function getFileMime($filepath)
	{
		$fhandle = finfo_open(FILEINFO_MIME);
		$mime_type = finfo_file($fhandle, $filepath);
		$mime_type_chunks = preg_split('/\s+/', $mime_type);
		$mime_type = $mime_type_chunks[0];
		$mime_type_chunks = explode(";", $mime_type);
		$mime_type = $mime_type_chunks[0];
		return $mime_type;
	}

	public static function getFileExtension($filepath)
	{
		return strtolower(pathinfo($filepath, PATHINFO_EXTENSION));
	}

	//
	// Debugging output
	//
	function debug()
	{
		print("File name: ".$this->getName()."\n");
		print("File location: ".$this->location->getDir(true, false, false, 0)."\n");
		print("File size: ".$this->size."\n");
		print("File modTime: ".$this->modTime."\n");
	}

	function isImage()
	{
		$type = $this->getType();
		if($type == "png" || $type == "jpg" || $type == "gif" || $type == "jpeg")
			return true;
		return false;
	}

	function isPdf()
	{
		if(strtolower($this->getType()) == "pdf")
			return true;
		return false;
	}

	public static function isPdfFile($file)
	{
		if(File::getFileType($file) == "pdf")
			return true;
		return false;
	}

	function isValidForThumb()
	{
		if($this->isImage() || ($this->isPdf() && ImageServer::isEnabledPdf()))
			return true;
		return false;
	}
}

class Location
{
	var $path;

	//
	// Split a file path into array elements
	//
	public static function splitPath($dir)
	{
		$dir = stripslashes($dir);
		$path1 = preg_split("/[\\\\\/]+/", $dir);
		$path2 = array();
		for($i = 0; $i < count($path1); $i++)
		{
			if($path1[$i] == ".." || $path1[$i] == "." || $path1[$i] == "")
				continue;
			$path2[] = $path1[$i];
		}
		return $path2;
	}

	//
	// Get the current directory.
	// Options: Include the prefix ("./"); URL-encode the string; HTML-encode the string; return directory n-levels up
	//
	function getDir($prefix, $encoded, $html, $up)
	{
		$dir = "";
		if($prefix == true)
			$dir .= "./";
		for($i = 0; $i < ((count($this->path) >= $up && $up > 0)?count($this->path)-$up:count($this->path)); $i++)
		{
			$temp = $this->path[$i];
			if($encoded)
				$temp = rawurlencode($temp);
			if($html)
				$temp = htmlspecialchars($temp);
			$dir .= $temp."/";
		}
		return $dir;
	}

	function getPathLink($i, $html)
	{
		if($html)
			return htmlspecialchars($this->path[$i]);
		else
			return $this->path[$i];
	}

	function getFullPath()
	{
		return (strlen(EncodeExplorer::getConfig('basedir')) > 0?EncodeExplorer::getConfig('basedir'):dirname($_SERVER['SCRIPT_FILENAME']))."/".$this->getDir(true, false, false, 0);
	}

	//
	// Debugging output
	//
	function debug()
	{
		print_r($this->path);
		print("Dir with prefix: ".$this->getDir(true, false, false, 0)."\n");
		print("Dir without prefix: ".$this->getDir(false, false, false, 0)."\n");
		print("Upper dir with prefix: ".$this->getDir(true, false, false, 1)."\n");
		print("Upper dir without prefix: ".$this->getDir(false, false, false, 1)."\n");
	}


	//
	// Set the current directory
	//
	function init()
	{
		if(!isset($_GET['dir']) || strlen($_GET['dir']) == 0)
		{
			$this->path = $this->splitPath(EncodeExplorer::getConfig('starting_dir'));
		}
		else
		{
			$this->path = $this->splitPath($_GET['dir']);
		}
	}

	//
	// Checks if the current directory is below the input path
	//
	function isSubDir($checkPath)
	{
		for($i = 0; $i < count($this->path); $i++)
		{
			if(strcmp($this->getDir(true, false, false, $i), $checkPath) == 0)
				return true;
		}
		return false;
	}

	//
	// Check if uploading is allowed into the current directory, based on the configuration
	//
	function uploadAllowed()
	{
		if(EncodeExplorer::getConfig('upload_enable') != true)
			return false;
		if(EncodeExplorer::getConfig('upload_dirs') == null || count(EncodeExplorer::getConfig('upload_dirs')) == 0)
			return true;

		$upload_dirs = EncodeExplorer::getConfig('upload_dirs');
		for($i = 0; $i < count($upload_dirs); $i++)
		{
			if($this->isSubDir($upload_dirs[$i]))
				return true;
		}
		return false;
	}

	function isWritable()
	{
		return is_writable($this->getDir(true, false, false, 0));
	}

	public static function isDirWritable($dir)
	{
		return is_writable($dir);
	}

	public static function isFileWritable($file)
	{
		if(file_exists($file))
		{
			if(is_writable($file))
				return true;
			else
				return false;
		}
		else if(Location::isDirWritable(dirname($file)))
			return true;
		else
			return false;
	}
}

class EncodeExplorer
{
	var $location;
	var $dirs;
	var $files;
	var $sort_by;
	var $sort_as;
	var $mobile;
	var $logging;
	var $spaceUsed;
	var $lang;

	//
	// Determine sorting, calculate space.
	//
	function init()
	{
		$this->sort_by = "";
		$this->sort_as = "";
		if(isset($_GET["sort_by"], $_GET["sort_as"]))
		{
			if($_GET["sort_by"] == "name" || $_GET["sort_by"] == "size" || $_GET["sort_by"] == "mod")
				if($_GET["sort_as"] == "asc" || $_GET["sort_as"] == "desc")
				{
					$this->sort_by = $_GET["sort_by"];
					$this->sort_as = $_GET["sort_as"];
				}
		}
		if(strlen($this->sort_by) <= 0 || strlen($this->sort_as) <= 0)
		{
			$this->sort_by = "name";
			$this->sort_as = "desc";
		}


		global $_TRANSLATIONS;
		if(isset($_GET['lang'], $_TRANSLATIONS[$_GET['lang']]))
			$this->lang = $_GET['lang'];
		else
			$this->lang = EncodeExplorer::getConfig("lang");

		$this->mobile = false;
		if(EncodeExplorer::getConfig("mobile_enabled") == true)
		{
			if((EncodeExplorer::getConfig("mobile_default") == true || isset($_GET['m'])) && !isset($_GET['s']))
				$this->mobile = true;
		}

		$this->logging = false;
		if(EncodeExplorer::getConfig("log_file") != null && strlen(EncodeExplorer::getConfig("log_file")) > 0)
			$this->logging = true;
	}

	//
	// Read the file list from the directory
	//
	function readDir()
	{
		global $encodeExplorer;
		//
		// Reading the data of files and directories
		//
		if($open_dir = @opendir($this->location->getFullPath()))
		{
			$this->dirs = array();
			$this->files = array();
			while ($object = readdir($open_dir))
			{
				if($object != "." && $object != "..")
				{
					if(is_dir($this->location->getDir(true, false, false, 0)."/".$object))
					{
						if(!in_array($object, EncodeExplorer::getConfig('hidden_dirs')))
							$this->dirs[] = new Dir($object, $this->location);
					}
					else if(!in_array($object, EncodeExplorer::getConfig('hidden_files')))
						$this->files[] = new File($object, $this->location);
				}
			}
			closedir($open_dir);
		}
		else
		{
			$encodeExplorer->setErrorString("unable_to_read_dir");;
		}
	}

	//
	// A recursive function for calculating the total used space
	//
	function sum_dir($start_dir, $ignore_files, $levels = 1)
	{
		if ($dir = opendir($start_dir))
		{
			$total = 0;
			while ((($file = readdir($dir)) !== false))
			{
				if (!in_array($file, $ignore_files))
				{
					if ((is_dir($start_dir . '/' . $file)) && ($levels - 1 >= 0))
					{
						$total += $this->sum_dir($start_dir . '/' . $file, $ignore_files, $levels-1);
					}
					elseif (is_file($start_dir . '/' . $file))
					{
						$total += File::getFileSize($start_dir . '/' . $file) / 1024;
					}
				}
			}

			closedir($dir);
			return $total;
		}
	}

	function calculateSpace()
	{
		if(EncodeExplorer::getConfig('calculate_space_level') <= 0)
			return;
		$ignore_files = array('..', '.');
		$start_dir = getcwd();
		$spaceUsed = $this->sum_dir($start_dir, $ignore_files, EncodeExplorer::getConfig('calculate_space_level'));
		$this->spaceUsed = round($spaceUsed/1024, 3);
	}

	function sort()
	{
		if(is_array($this->files)){
			usort($this->files, "EncodeExplorer::cmp_".$this->sort_by);
			if($this->sort_as == "desc")
				$this->files = array_reverse($this->files);
		}

		if(is_array($this->dirs)){
			usort($this->dirs, "EncodeExplorer::cmp_name");
			if($this->sort_by == "name" && $this->sort_as == "desc")
				$this->dirs = array_reverse($this->dirs);
		}
	}

	function makeArrow($sort_by)
	{
		if($this->sort_by == $sort_by && $this->sort_as == "asc")
		{
			$sort_as = "desc";
			$img = "arrow_up";
		}
		else
		{
			$sort_as = "asc";
			$img = "arrow_down";
		}

		if($sort_by == "name")
			$text = $this->getString("file_name");
		else if($sort_by == "size")
			$text = $this->getString("size");
		else if($sort_by == "mod")
			$text = $this->getString("last_changed");

		return "<a href=\"".$this->makeLink(false, false, $sort_by, $sort_as, null, $this->location->getDir(false, true, false, 0))."\">
			$text <img style=\"border:0;\" alt=\"".$sort_as."\" src=\"?img=".$img."\" /></a>";
	}

	function makeLink($switchVersion, $logout, $sort_by, $sort_as, $delete, $dir)
	{
		$link = "?";
		if($switchVersion == true && EncodeExplorer::getConfig("mobile_enabled") == true)
		{
			if($this->mobile == false)
				$link .= "m&amp;";
			else
				$link .= "s&amp;";
		}
		else if($this->mobile == true && EncodeExplorer::getConfig("mobile_enabled") == true && EncodeExplorer::getConfig("mobile_default") == false)
			$link .= "m&amp;";
		else if($this->mobile == false && EncodeExplorer::getConfig("mobile_enabled") == true && EncodeExplorer::getConfig("mobile_default") == true)
			$link .= "s&amp;";

		if($logout == true)
		{
			$link .= "logout";
			return $link;
		}

		if(isset($this->lang) && $this->lang != EncodeExplorer::getConfig("lang"))
			$link .= "lang=".$this->lang."&amp;";

		if($sort_by != null && strlen($sort_by) > 0)
			$link .= "sort_by=".$sort_by."&amp;";

		if($sort_as != null && strlen($sort_as) > 0)
			$link .= "sort_as=".$sort_as."&amp;";

		$link .= "dir=".$dir;
		if($delete != null)
			$link .= "&amp;del=".$delete;
		return $link;
	}

	function makeIcon($l)
	{
		$l = strtolower($l);
		return "?img=".$l;
	}

	function formatModTime($time)
	{
		$timeformat = "".$timeform."";
		if(EncodeExplorer::getConfig("time_format") != null && strlen(EncodeExplorer::getConfig("time_format")) > 0)
			$timeformat = EncodeExplorer::getConfig("time_format");
		return date($timeformat, $time);
	}

	function formatSize($size)
	{
		$sizes = Array(' B', ' KB', ' MB', ' GB', ' TB', ' PB', ' EB');
		$y = $sizes[0];
		for ($i = 1; (($i < count($sizes)) && ($size >= 1024)); $i++)
		{
			$size = $size / 1024;
			$y  = $sizes[$i];
		}
		return round($size, 2)." ".$y;
	}

	//
	// Debugging output
	//
	function debug()
	{
		print("Explorer location: ".$this->location->getDir(true, false, false, 0)."\n");
		for($i = 0; $i < count($this->dirs); $i++)
			$this->dirs[$i]->output();
		for($i = 0; $i < count($this->files); $i++)
			$this->files[$i]->output();
	}

	//
	// Comparison functions for sorting.
	//

	public static function cmp_name($b, $a)
	{
		return strcasecmp($a->name, $b->name);
	}

	public static function cmp_size($a, $b)
	{
		return ($a->size - $b->size);
	}

	public static function cmp_mod($b, $a)
	{
		return ($a->modTime - $b->modTime);
	}

	//
	// The function for getting a translated string.
	// Falls back to english if the correct language is missing something.
	//
	public static function getLangString($stringName, $lang)
	{
		global $_TRANSLATIONS;
		if(isset($_TRANSLATIONS[$lang]) && is_array($_TRANSLATIONS[$lang])
			&& isset($_TRANSLATIONS[$lang][$stringName]))
			return $_TRANSLATIONS[$lang][$stringName];
		else if(isset($_TRANSLATIONS["en"]))// && is_array($_TRANSLATIONS["en"])
			//&& isset($_TRANSLATIONS["en"][$stringName]))
			return $_TRANSLATIONS["en"][$stringName];
		else
			return "Translation error";
	}

	function getString($stringName)
	{
		return EncodeExplorer::getLangString($stringName, $this->lang);
	}

	//
	// The function for getting configuration values
	//
	public static function getConfig($name)
	{
		global $_CONFIG;
		if(isset($_CONFIG, $_CONFIG[$name]))
			return $_CONFIG[$name];
		return null;
	}

	public static function setError($message)
	{
		global $_ERROR;
		if(isset($_ERROR) && strlen($_ERROR) > 0)
			;// keep the first error and discard the rest
		else
			$_ERROR = $message;
	}

	function setErrorString($stringName)
	{
		EncodeExplorer::setError($this->getString($stringName));
	}

	//
	// Main function, activating tasks
	//
	function run($location)
	{
		$this->location = $location;
		$this->calculateSpace();
		$this->readDir();
		$this->sort();
		$this->outputHtml();
	}

	public function printLoginBox()
	{
		?>
		<!--mobile-->
		<div id="login">
		<form enctype="multipart/form-data" action="<?php print $this->makeLink(false, false, null, null, null, ""); ?>" method="post">
		<?php
		if(GateKeeper::isLoginRequired())
		{
			$require_username = false;
			foreach(EncodeExplorer::getConfig("users") as $user){
				if($user[0] != null && strlen($user[0]) > 0){
					$require_username = true;
					break;
				}
			}
			if($require_username)
			{
			?>
			<!--<div><label for="user_name"><?php #print $this->getString("username"); ?>:</label>
			<input class="form-control" type="text" name="user_name" value="" id="user_name" placeholder="<?php #print $this->getString("login_username_plho"); ?>" /></div>
			<?php
			#}
			?><br>
			<div><label for="user_pass"><?php print $this->getString("password"); ?>:</label>
			<input class="form-control" type="password" name="user_pass" id="user_pass" placeholder="<?php #print $this->getString("login_password_plho"); ?>" /></div><br>
			<div><input class="btn btn-success btn-block" type="submit" value="<?php #print $this->getString("log_in"); ?>" class="button" /></div>
		</form>
		</div><br>-->
		<!--neu-->
		<?php include("config_user.php"); echo "<body background=\"".$backgrounddy."\">"?>
		<div id="login" class="modal-dialog" style="width:100%;">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="loginModal"><?php print $this->getString("log_in"); ?></h4>
          </div>
          <div class="modal-body">
                      <div class="well">
                          <form enctype="multipart/form-data" method="POST" action="<?php print $this->makeLink(false, false, null, null, null, ""); ?>">
                              <div class="form-group">
                                  <label for="username" class="control-label"><?php print $this->getString("username"); ?>:</label>
                                  <input type="text" class="form-control" id="user_name" name="user_name" required="" title="<?php print $this->getString("login_username_plho"); ?>" placeholder="<?php print $this->getString("login_username_plho"); ?>">
                                  <span class="help-block"></span>
                              </div>
							  <?php
								}
								?>
                              <div class="form-group">
                                  <label for="password" class="control-label"><?php print $this->getString("password"); ?>:</label>
                                  <input type="password" class="form-control" id="user_pass" name="user_pass" required="" title="<?php print $this->getString("login_password_plho"); ?>" placeholder="<?php print $this->getString("login_password_plho"); ?>">
                                  <span class="help-block"></span>
                              </div>
                              <button type="submit" class="btn btn-success btn-block"><?php print $this->getString("log_in"); ?></button>
                              <a target="_blank" href="https://dropyet.maximiliansixdorf.de/docs/" class="btn btn-default btn-block"><?php print $this->getString("supportdy"); ?></a>
                          </form>
              </div>
          </div>
      </div>
  </div>
 </body>
	<?php
		}
	}

	//
	// Printing the actual page
	//
	function outputHtml()
	{
		global $_ERROR;
		global $_START_TIME;
?>
<?php
if(GateKeeper::isUserLoggedIn()) 
    $dyf = "dyf"; 

    setcookie('DYFC', $dyf, time()+3600);
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $this->getConfig('lang'); ?>" lang="<?php print $this->getConfig('lang'); ?>">
<head>
<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="apple-touch-icon" sizes="57x57" href="fav/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="fav/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="fav/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="fav/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="fav/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="fav/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="fav/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="fav/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="fav/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="fav/android-chrome-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="fav/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="fav/favicon-194x194.png">
	<link rel="icon" type="image/png" sizes="16x16" href="fav/favicon-16x16.png">
	<link rel="manifest" href="fav/manifest.json">
	<?php
	require('config_user.php');
	if($barcolour == "primary")
		{
		$themecolor = "#337ab7";
		}		
	if($barcolour == "success")
		{
		$themecolor = "#5cb85c";
		}
	if($barcolour == "info")
		{
		$themecolor = "#5bc0de";
		}
	if($barcolour == "warning")
		{
		$themecolor = "#f0ad4e";
		}
	if($barcolour == "danger")
		{
		$themecolor = "#d9534f";
		}
	if($barcolour == "success progress-bar-striped active")
		{
		$themecolor = "#5cb85c";
		}
	if($barcolour == "primary progress-bar-striped active")
		{
		$themecolor = "#337ab7";
		}
	if($barcolour == "info progress-bar-striped active")
		{
		$themecolor = "#5bc0de";
		}
	if($barcolour == "warning progress-bar-striped active")
		{
		$themecolor = "#f0ad4e";
		}
	if($barcolour == "danger progress-bar-striped active")
		{
		$themecolor = "#d9534f";
		}
		?>
	<meta name="msapplication-TileColor" content="#900206">
	<meta name="msapplication-TileImage" content="fav/mstile-144x144.png">
	<?php print "<meta name=\"theme-color\" content=".$themecolor.">"?>
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=<?php print $this->getConfig('charset'); ?>">
<?php css(); ?>
<!-- <meta charset="<?php print $this->getConfig('charset'); ?>" /> -->
<?php
if(($this->getConfig('log_file') != null && strlen($this->getConfig('log_file')) > 0)
	|| ($this->getConfig('thumbnails') != null && $this->getConfig('thumbnails') == true && $this->mobile == false)
	|| (GateKeeper::isDeleteAllowed()))
{
?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function() {
<?php
	if(GateKeeper::isDeleteAllowed()){
?>
	$('td.del a').click(function(){
		var answer = confirm('<?php print $this->getString("aysywddy1"); ?> \'' + $(this).attr("data-name") + "\' <?php print $this->getString("aysywddy2"); ?>");
		return answer;
	});
<?php
	}
	if($this->logging == true)
	{
?>
		function logFileClick(path)
		{
			 $.ajax({
					async: false,
					type: "POST",
					data: {log: path},
					contentType: "application/x-www-form-urlencoded; charset=UTF-8",
					cache: false
				});
		}

		$("a.file").click(function(){
			logFileClick("<?php print $this->location->getDir(true, true, false, 0);?>" + $(this).html());
			return true;
		});
<?php
	}
	if(EncodeExplorer::getConfig("thumbnails") == true && $this->mobile == false)
	{
?>
		function positionThumbnail(e) {
			xOffset = 30;
			yOffset = 10;
			$("#thumb").css("left",(e.clientX + xOffset) + "px");

			diff = 0;
			if(e.clientY + $("#thumb").height() > $(window).height())
				diff = e.clientY + $("#thumb").height() - $(window).height();

			$("#thumb").css("top",(e.pageY - yOffset - diff) + "px");
		}

		$("a.thumb").hover(function(e){
			$("#thumb").remove();
			$("body").append("<div id=\"thumb\"><img src=\"?thumb="+ $(this).attr("href") +"\" alt=\"Preview\" \/><\/div>");
			positionThumbnail(e);
			$("#thumb").fadeIn("medium");
		},
		function(){
			$("#thumb").remove();
		});

		$("a.thumb").mousemove(function(e){
			positionThumbnail(e);
			});

		$("a.thumb").click(function(e){$("#thumb").remove(); return true;});
<?php
	}
?>
	});
//]]>
</script>
<?php
}
?>
<?php
include("config_user.php");
include("size.php");?>
<title><?php if(EncodeExplorer::getConfig('main_title') != null) print EncodeExplorer::getConfig('main_title'); ?></title>
<script type="text/javascript" src="<?php print $this->getString("js_url"); ?>"> </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/logo.css">
<style>
      .btn-file {
  position: relative;
  overflow: hidden;
}
.btn-file input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  min-width: 100%;
  min-height: 100%;
  font-size: 100px;
  text-align: right;
  filter: alpha(opacity=0);
  opacity: 0;
  background: red;
  cursor: inherit;
  display: block;
}
input[readonly] {
  background-color: white !important;
  cursor: text !important;
}
    </style>
	<?php
	  include("config_user.php");
	  echo "<script src=\"js/loadmore-".$barcolour.".js\"></script>";
	?>
<script src="js/bootstrap-progressbar.js"></script>
<script type="text/javascript">
        $(function () {
            $('#btnUpload').on("click", function () {
                var sizeInKb = parseFloat($('#fuUpload').prop("files")['0'].size / 1024).toFixed(2);
                var fileName = $('#fuUpload').prop("files")['0'].name;
                uploadProgress = $('#dvProgress').progressbarManager({
                    totalValue: sizeInKb,
                    initValue: '0kb',
                    animate: true,
                    stripe: true,
                    style: 'primary'
                });
                var chunk = 0;
                var uploading = setInterval(function () {
                    uploadProgress.setValue(chunk);
                    if (uploadProgress.isComplete()) {
                        clearInterval(uploading);
                        uploadProgress.style('success');
                    }
                    chunk += 500;
                }, 1800);
            });
        });
    </script>	
</head>
<body>
<div class="container">
<?php
include("config_user.php");
 echo "<nav class=\"navbar navbar-".$navbarcolour."\">";?>
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="css/logo.svg" alt="DropYet"></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php"><?php if(GateKeeper::isUserLoggedIn()) print $this->getString("filesdy"); ?><?php if(GateKeeper::isUserLoggedIn() == false) print $this->getString("log_in"); ?></a></li>
              <li><?php
if(GateKeeper::isUserLoggedIn())
	print "";?></li>
              <li><a target="_blank" href="https://dropyet.maximiliansixdorf.de/docs"><?php print $this->getString("supportdy"); ?></a></li>
              <?php
if(GateKeeper::isUserLoggedIn())
	print "<li class=\"dropdown\">
                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">".$this->getString("settings")."  <span class=\"caret\"></span></a>
                <ul class=\"dropdown-menu\">
                  <li><a href=\"#\" data-toggle=\"modal\" data-target=\"#einstellungen\">".$this->getString("settings_changedy")."</a></li>
                  <li><a href=\"#\" data-toggle=\"modal\" data-target=\"#security\">".$this->getString("security_menu")."</a></li>
				  <li><a href=\"#\" data-toggle=\"modal\" data-target=\"#log\">".$this->getString("log_menu")."</a></li>
				  <li><a target=\"popup\" onclick=\"window.open('', 'popup', 'width=580,height=750,scrollbars=no, toolbar=no,status=no,resizable=yes,menubar=no,location=no,directories=no,top=10,left=10')\"href=\"https://contact.tqsg.de".$this->getString("helpurl")."\">".$this->getString("submit_ideady")."</a></li>
				  <li><a href=\"#\" data-toggle=\"modal\" data-target=\"#ueber\">".$this->getString("ueber_menu")."</a></li>
				  <li role=\"separator\" class=\"divider\"></li>
                  <li class=\"dropdown-header\">".$this->getString("menuenc")."</li>
				  <li><a target=\"_blank\" href=\"https://macpaw.com/encrypto\">".$this->getString("encrypto")."</a></li>
				  <li><a target=\"_blank\" href=\"https://www.axcrypt.net\">".$this->getString("axcrypt")."</a></li>
				   <li class=\"dropdown-header\">".$this->getString("usefuldy")."</li>
                  <li><a target=\"_blank\" href=\"https://sh.tqsg.de".$this->getString("helpurl")."\">Shortlinks</a></li>
                  <li><a target=\"_blank\" href=\"https://qr.tqsg.de".$this->getString("helpurl")."\">QR-Codes</a></li>
                </ul>
              </li>";?>
			  <li><?php
								require('js/browser.php');
								$browser = new Browser();
								if( $browser->getBrowser() == Browser::BROWSER_IE && $browser->getVersion() >= 0 ) {
								echo '<a href="#" data-toggle="modal" data-target="#compatibility" style="color: red">'.$this->getString("comp_title").'</a>';
								}
								$browser = new Browser();
								if( $browser->getBrowser() == Browser::BROWSER_POCKET_IE && $browser->getVersion() >= 0 ) {
								echo '<a href="#" data-toggle="modal" data-target="#compatibility" style="color: red">'.$this->getString("comp_title").'</a>';
								}
								$browser = new Browser();
								if( $browser->getBrowser() == Browser::BROWSER_LYNX && $browser->getVersion() >= 0 ) {
								echo '<a href="#" data-toggle="modal" data-target="#compatibility" style="color: red">'.$this->getString("comp_title").'</a>';
								}
								$browser = new Browser();
								if( $browser->getBrowser() == Browser::BROWSER_SAFARI && $browser->getVersion() <= 7 ) {
								echo '<a href="#" data-toggle="modal" data-target="#compatibility" style="color: red">'.$this->getString("comp_title").'</a>';
								}
								$browser = new Browser();
								if( $browser->getBrowser() == Browser::BROWSER_CHROME && $browser->getVersion() <= 64 ) {
								echo '<a href="#" data-toggle="modal" data-target="#compatibility_old" style="color: red">'.$this->getString("comp_title").'</a>';
								}
								$browser = new Browser();
								if( $browser->getBrowser() == Browser::BROWSER_FIREFOX && $browser->getVersion() >= 0 ) { #58
								echo '<a href="#" data-toggle="modal" data-target="#compatibility_ff" style="color: red">'.$this->getString("comp_title").'</a>';
								}
								$browser = new Browser();
								if( $browser->getBrowser() == Browser::BROWSER_OPERA && $browser->getVersion() <= 50 ) {
								echo '<a href="#" data-toggle="modal" data-target="#compatibility_old" style="color: red">'.$this->getString("comp_title").'</a>';
								}
								$browser = new Browser();
								if( $browser->getBrowser() == Browser::BROWSER_UNKNOWN && $browser->getVersion() >= 0 ) {
								echo '<a href="#" data-toggle="modal" data-target="#compatibility" style="color: red">'.$this->getString("comp_title").'</a>';
								}
								$browser = new Browser();
								if( $browser->getBrowser() == Browser::BROWSER_EDGE && $browser->getVersion() <= 17 ) {
								echo '<a href="#" data-toggle="modal" data-target="#compatibility_old" style="color: red">'.$this->getString("comp_title").'</a>';
								}
								?>
								</li>
								<li>
								<?php
//UPDATER

$url = "https://dropyetapi.maximiliansixdorf.de/vercheck.txt";
$zipFile = "ver.php"; // Local Zip File Path
$zipResource = fopen($zipFile, "w");
// Get The Zip File From Server
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FAILONERROR, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_AUTOREFERER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER,true);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_FILE, $zipResource);
$page = curl_exec($ch);
if(!$page) {
 echo "<a href=\"#\" data-toggle=\"modal\" data-target=\"#evc\" style=\"color: red\">".$this->getString("evcwarn")."</a>";
}
curl_close($ch);

//UPDATER OVER
?>
</li>
<li>
<?php  
include("ver.php"); 
if(GateKeeper::isUserLoggedIn())
if (strcmp("2.4.6.4", $dyver) !== 0) { echo "<a href=\"#\" data-toggle=\"collapse\" data-target=\"#updateconf\" aria-expanded=\"false\" aria-controls=\"updateconf\" style=\"color: orange\">".$this->getString("newver")."</a>";}?>
</li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
			<form class="navbar-form navbar-right">
			 <?php
if(GateKeeper::isUserLoggedIn())
if($this->mobile == false)
{
	print "<a href=\"public/\" class=\"btn btn-success\">".$this->getString("private_modedy")." <span class=\"glyphicon glyphicon-lock\"></span></a>";}?>
<?php
if(GateKeeper::isUserLoggedIn())
if($this->mobile == true)
{
	print "&nbsp <a href=\"public/\" class=\"btn btn-success\"><span class=\"glyphicon glyphicon-lock\"></span></a>";}?>
             <?php
if(GateKeeper::isUserLoggedIn())
if($this->mobile == false)
{
	print "<a class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#uploaddy\">".$this->getString("multi_upl")." <span class=\"glyphicon glyphicon-plus\"></span></a></a>";}?>
	<?php
if(GateKeeper::isUserLoggedIn())
if($this->mobile == true)
{
	print "<a class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#uploaddy\"><span class=\"glyphicon glyphicon-plus\"></span></a></a>";}?>
			 <?php
if(GateKeeper::isUserLoggedIn())
if($this->mobile == false)
{
	print "<a class='btn btn-danger' href=\"".$this->makeLink(false, true, null, null, null, "")."\">".$this->getString("log_out")." <span class=\"glyphicon glyphicon-off\"></span></a>";}?>
	<?php
if(GateKeeper::isUserLoggedIn())
if($this->mobile == true)
{
	print "<a class='btn btn-danger' href=\"".$this->makeLink(false, true, null, null, null, "")."\"><span class=\"glyphicon glyphicon-off\"></span></a>";}?>
			 </form>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
	  <?php  
include("ver.php"); 
if(GateKeeper::isUserLoggedIn())
if (strcmp("2.4.6.4", $dyver) !== 0) { echo "<div class=\"collapse\" id=\"updateconf\">
		<div class=\"alert alert-info\" role=\"alert\">
			<p>".$this->getString("updone")." ".$dyver." ".$this->getString("updtwo")."</p><br>
<div class=\"btn-group\" role=\"group\"><a target=\"_blank\" href=\"update.php\" class=\"btn btn-success\">".$this->getString("updnow")."</a></div> <button type=\"button\" class=\"btn btn-warning pull-right\" data-toggle=\"collapse\" data-target=\"#updateconf\" aria-expanded=\"true\" aria-controls=\"updateconf\">".$this->getString("updlater")."</button>
		</div>
</div>";}?>
<?php
   if (isset($_POST["gesendet"]))
   {
      echo "<div class=\"alert alert-success\" role=\"alert\">".$this->getString("settings_alertdy")." <a href=\"index.php\">&#8634;</a></div>";
}
	?>
	  <?php
	  include("config_user.php");
	  echo "<div class=\"progress\">";
	  echo "<div class=\"progress-bar progress-bar-".$barcolour."\" role=\"progressbar\" aria-valuenow=\"100\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 100%\">";
      echo "<span class=\"sr-only\"></span>";
	  echo "</div>";
	  echo "</div>";?>
<?php
//
// Print the error (if there is something to print)
//
if(isset($_ERROR) && strlen($_ERROR) > 0)
{
	print "<div id=\"error\">".$_ERROR."</div>";
}
?>
<div id="frame">
<?php
if(EncodeExplorer::getConfig('show_top') == true)
{
?>
<div id="top">
	<a href="<?php print $this->makeLink(false, false, null, null, null, ""); ?>"><span><?php if(EncodeExplorer::getConfig('main_title') != null) print EncodeExplorer::getConfig('main_title'); ?></span></a>
<?php
if(EncodeExplorer::getConfig("secondary_titles") != null && is_array(EncodeExplorer::getConfig("secondary_titles")) && count(EncodeExplorer::getConfig("secondary_titles")) > 0 && $this->mobile == false)
{
	$secondary_titles = EncodeExplorer::getConfig("secondary_titles");
	print "<div class=\"subtitle\">".$secondary_titles[array_rand($secondary_titles)]."</div>\n";
}
?>
</div>
<?php
}

// Checking if the user is allowed to access the page, otherwise showing the login box
if(!GateKeeper::isAccessAllowed())
{
	$this->printLoginBox();
}
else
{
if($this->mobile == false && EncodeExplorer::getConfig("show_path") == true)
{
?>
<div class="breadcrumb">
<a href="?dir="><?php print $this->getString("root"); ?></a>
<?php
	for($i = 0; $i < count($this->location->path); $i++)
	{
		print "&#x2044; <a href=\"".$this->makeLink(false, false, null, null, null, $this->location->getDir(false, true, false, count($this->location->path) - $i - 1))."\">";
		print $this->location->getPathLink($i, true);
		print "</a>\n";
	}
?>
</div>
<?php
}
?>

<!-- START: List table -->
<table class="table">
<?php
if($this->mobile == false)
{
?>
<tr class="row one header">
	<td class="icon"> </td>
	<td class="name"><?php print $this->makeArrow("name");?></td>
	<td class="size"><?php print $this->makeArrow("size"); ?></td>
	<td class="changed"><?php print $this->makeArrow("mod"); ?></td>
	<?php if($this->mobile == false && GateKeeper::isDeleteAllowed()){?>
	<td class="del"><?php print EncodeExplorer::getString("del"); ?></td>
	<?php } ?>
</tr>
<?php
}
?>
<tr class="row two">
	<td class="icon"><img alt="dir" src="?img=directory" /></td>
	<td colspan="<?php print (($this->mobile == true?2:(GateKeeper::isDeleteAllowed()?4:3))); ?>" class="long">
		<a class="item" href="<?php print $this->makeLink(false, false, null, null, null, $this->location->getDir(false, true, false, 1)); ?>">...</a>
	</td>
</tr>
<?php
//
// Ready to display folders and files.
//
$row = 1;

//
// Folders first
//
if($this->dirs)
{
	foreach ($this->dirs as $dir)
	{
		$row_style = ($row ? "one" : "two");
		print "<tr class=\"row ".$row_style."\">\n";
		print "<td class=\"icon\"><img alt=\"dir\" src=\"?img=directory\" /></td>\n";
		print "<td class=\"name\" colspan=\"".($this->mobile == true?2:3)."\">\n";
		print "<a href=\"".$this->makeLink(false, false, null, null, null, $this->location->getDir(false, true, false, 0).$dir->getNameEncoded())."\" class=\"item dir\">";
		print $dir->getNameHtml();
		print "</a>\n";
		print "</td>\n";
		if($this->mobile == false && GateKeeper::isDeleteAllowed()){
			$browser = new Browser();
			if( $browser->getBrowser() == Browser::BROWSER_FIREFOX && $browser->getVersion() >= 0 ) {
			print "<td class=\"del\"><a data-name=\"".htmlentities($dir->getName())."\" href=\"".$this->makeLink(false, false, null, null, $this->location->getDir(false, true, false, 0).$dir->getNameEncoded(), $this->location->getDir(false, true, false, 0))."\">".$this->getString("delete_filedy")."<!--<img src=\"?img=del\" alt=\"Delete\" /></a></td>-->";
			}
			else
			{
			print "<td class=\"del\"><button type=\"button\" class=\"btn btn-danger btn-xs\"><a style=\"color: #ffffff\" data-name=\"".htmlentities($dir->getName())."\" href=\"".$this->makeLink(false, false, null, null, $this->location->getDir(false, true, false, 0).$dir->getNameEncoded(), $this->location->getDir(false, true, false, 0))."\">".$this->getString("delete_filedy")."<!--<img src=\"?img=del\" alt=\"Delete\" /></a></button></td>-->";	
			}
			}
		print "</tr>\n";
		$row =! $row;
	}
}

//
// Now the files
//
if($this->files)
{
	$count = 0;
	foreach ($this->files as $file)
	{
		$row_style = ($row ? "one" : "two");
		print "<tr class=\"row ".$row_style.(++$count == count($this->files)?" last":"")."\">\n";
		print "<td class=\"icon\"><img alt=\"".$file->getType()."\" src=\"".$this->makeIcon($file->getType())."\" /></td>\n";
		print "<td class=\"name\">\n";
		print "\t\t<a href=\"".$this->location->getDir(false, true, false, 0).$file->getNameEncoded()."\"";
		if(EncodeExplorer::getConfig('open_in_new_window') == true)
			print "target=\"_blank\"";
		print " class=\"item file";
		if($file->isValidForThumb())
			print " thumb";
		print "\">";
		print $file->getNameHtml();
		if($this->mobile == true)
		{
			print " <span class =\"size\">".$this->formatSize($file->getSize())."</span>";
		}
		print "</a>\n";
		print "</td>\n";
		if($this->mobile != true)
		{
			print "<td class=\"size\">".$this->formatSize($file->getSize())."</td>\n";
			print "<td class=\"changed\">".$this->formatModTime($file->getModTime())."</td>\n";
		}
		if($this->mobile == false && GateKeeper::isDeleteAllowed()){
								$browser = new Browser();
								if( $browser->getBrowser() == Browser::BROWSER_FIREFOX && $browser->getVersion() >= 0 ) {
								print "<td class=\"del\">
				<a data-name=\"".htmlentities($file->getName())."\" href=\"".$this->makeLink(false, false, null, null, $this->location->getDir(false, true, false, 0).$file->getNameEncoded(), $this->location->getDir(false, true, false, 0))."\">
					".$this->getString("delete_filedy")."<!--<img src=\"?img=del\" alt=\"Delete\" />-->
				</a>
			</td>";
								}
								else
								{
								print "<td class=\"del\">
				<button type=\"button\" class=\"btn btn-danger btn-xs\"><a style=\"color: #ffffff\" data-name=\"".htmlentities($file->getName())."\" href=\"".$this->makeLink(false, false, null, null, $this->location->getDir(false, true, false, 0).$file->getNameEncoded(), $this->location->getDir(false, true, false, 0))."\">
					".$this->getString("delete_filedy")."<!--<img src=\"?img=del\" alt=\"Delete\" />-->
				</a></button>
			</td>";	
								}
		}
		print "</tr>\n";
		$row =! $row;
	}
}


//
// The files and folders have been displayed
//
?>

</table>
<!-- END: List table -->
<?php
}
?>
</div>

<?php
if(GateKeeper::isAccessAllowed() && GateKeeper::showLoginBox()){
?>
<!-- START: Login area -->
<form enctype="multipart/form-data" method="post">
	<div id="login_bar">
	<?php print $this->getString("username"); ?>:
	<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">@</span><input type="text" class="form-control" name="user_name" value="" id="user_name" /></div>
	<?php print $this->getString("password"); ?>:
	<input type="password" name="user_pass" id="user_pass" />
	<input type="submit" class="submit" value="<?php print $this->getString("log_in"); ?>" />
	<div class="bar"></div>
	</div>
</form>
<!-- END: Login area -->
<?php
}

if(GateKeeper::isAccessAllowed() && $this->location->uploadAllowed() && (GateKeeper::isUploadAllowed() || GateKeeper::isNewdirAllowed()))
{
?>
<!-- START: Upload area -->
<div class="well">
<form enctype="multipart/form-data" method="post">
	<div id="upload">
		<?php
		if(GateKeeper::isNewdirAllowed()){
		?>
		<div id="newdir_container">
    <div class="input-group">
      <input name="userdir" type="text" class="form-control" placeholder="<?php print $this->getString("folder_namedy"); ?>" class="upload_dirname" maxlength="70"/>
      <span class="input-group-btn">
        <input type="submit" class="btn btn-default" value="<?php print $this->getString("make_directory"); ?>" />
      </span>
    </div><!-- /input-group --><!-- /.col-lg-6 -->
</div><!-- /.row -->
			<!--<input name="userdir" type="text" class="upload_dirname" />
			<input type="submit" value="<?php print $this->getString("make_directory"); ?>" />-->
		</div>
		<?php
		}
		if(GateKeeper::isUploadAllowed()){
		?>
		<div id="upload_container">
			<!--<input name="userfile" type="file" class="upload_file" />
			<input type="submit" value="<?//php print $this->getString("upload"); ?>" class="upload_sumbit" />-->
		</div>
		<div class="row">
  <div class="col-lg-6">
    <!--<div class="input-group">
      <!--<span class="input-group-btn">
        <input type="submit" class="btn btn-default" value="<?//php print $this->getString("upload"); ?>" class="upload_submit" />
      </span>-->
		<!--<input name="userfile" type="file" class="filestyle" data-placeholder="<//?php// print $this->getString("choose_filedy"); ?>" data-icon="false">--><!--<input type="submit" class="btn btn-default" value="<?//php print $this->getString("upload"); ?>" class="upload_sumbit" />-->
		 <!--</div>--><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
		<?php
		}
		?>
		<div class="bar"></div>
	</div>
</form>
</div>
<!-- END: Upload area -->
<?php
}

?>
<!-- START: Info area -->
<div id="info">
<ol class="breadcrumb"><li>
<?php
if(GateKeeper::isUserLoggedIn())
	print "<font color=\"gray\">$usernamedy</font> | ";?>
<?php
if(EncodeExplorer::getConfig("mobile_enabled") == true)
{
	print "<a href=\"".$this->makeLink(true, false, null, null, null, $this->location->getDir(false, true, false, 0))."\">\n";
	print ($this->mobile == true)?$this->getString("standard_version"):$this->getString("mobile_version")."\n";
	print "</a> | \n";
}
if(GateKeeper::isAccessAllowed() && $this->getConfig("calculate_space_level") > 0 && $this->mobile == false)
{
	print $this->getString("total_used_space").": ".$this->spaceUsed." MB | ";
}
if($this->mobile == false && $this->getConfig("show_load_time") == true)
{
	printf($this->getString("page_load_time")." | ", (microtime(TRUE) - $_START_TIME)*1000);
}
?>
<a target="_blank" href="https://dropyet.maximiliansixdorf.de">DropYet</a><?php
if(GateKeeper::isUserLoggedIn())
	print " | <font color=\"green\">".$this->getString("currently_private")." <span class=\"glyphicon glyphicon-lock\"></span></font> " ;?> | <a href="#" data-toggle="modal" data-target="#security"><?php print $this->getString("ssl_info"); ?></a><?php
								$cntfiles = $ar['count'] - 1;
								if(GateKeeper::isUserLoggedIn())
								print " | ".sizeFormat($ar['size'])." ".$this->getString("size_all")." ".$cntfiles." ".$this->getString("size_files")."";?></div>

<style>
.underliningcontent {
    border-bottom: 1px solid #e5e5e5;
}
</style>
<div class="underliningcontent"></div>
</li>
</ol>
<!-- END: Info area -->
<script type="text/javascript">
	$(function () {
		$("td.name").dblclick(function (e) {
			e.stopPropagation();
			var currentEle = $(this).children("a");
			var currentVal = currentEle.html();
			if ($("#NewName").length <= 0){
				updateVal(currentEle, currentVal);
			}
		});
	});
	
	function updateVal(currentEle, currentVal) {
		var is_file = 0;
		if(currentEle.hasClass('file')){
			is_file = 1;
		}
		var rnm_dir = currentEle.attr('href');
		rnm_dir = rnm_dir.replace('?dir=','');
		
		$(currentEle).parent().append('<input id="NewName" type="text" value="' + currentVal + '" />');
		$(currentEle).hide();
		$("#NewName").focus();
		
		$("#NewName").keyup(function (event) {
			if (event.keyCode == 13) {
				var n_name = $("#NewName").val();
				$('#NewName').remove();
				$.ajax({
					cache: false,
					type: 'GET',
					url: 'rename_files.php',
					data: {'rnm_dir':rnm_dir, 'is_file':is_file, 'new_name':n_name, 'function':'rename'},
					dataType: "json",
					success: function(response){
						if(!is_file){
							response.name = '?dir=' + response.name;
						}
						currentEle.attr('href', response.name);
						$(currentEle).html(n_name).show();
					},
					error: function (request, status, error) {
						$(currentEle).html('Error updating').show();
						alert(request.responseText);
					}
				});
			}
		}).blur(function () {
			$('#NewName').remove();
			$(currentEle).html(currentVal).show();
		});
	}
</script>
<script type="text/javascript" src="js/button.js"></script>
<script type="text/javascript" src="js/ometer.js"></script>
<script src="js/zxcvbn.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$("#StrengthProgressBar").zxcvbnProgressBar({ passwordInput: "#paswod" });
	});
	</script>
<div class="modal fade" id="einstellungen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php print $this->getString("settings"); ?></h4>
      </div>
      <div class="modal-body">
	  <center>
	  <div class="alert alert-warning" role="alert"><?php print $this->getString("settings_hint"); ?></div>
        <?php
if(GateKeeper::isUserLoggedIn())
{
 
   $file = "config_user.php";
   include("config_user.php");
 
echo "<form action=\"$PHP_SELF\" method=\"POST\">";
 
echo "<div class=\"input-group\">";
echo "<span class=\"input-group-addon\"\"><span class=\"glyphicon glyphicon-user\"></span></span></span>";
echo "<input class=\"form-control\" value=\"".$usernamedy."\" placeholder=\"".$this->getString("settings_usernamedy")."\" type=\"text\" name=\"usna\" maxlength=\"25\" required>";
echo "</div>";
echo "<BR>";

echo "<div class=\"input-group\">";
echo "<span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-lock\"></span></span>";
echo "<input class=\"form-control\" value=\"\" placeholder=\"".$this->getString("settings_passworddy")."\" type=\"password\"  id=\"paswod\" name=\"paswod\" disabled=\"disabled\" required>";
echo "<span class=\"input-group-addon\" id=\"basic-addon2\">".$this->getString("chng_paswod_chck")."</span>";
echo "<span class=\"input-group-addon\">";
echo "<input type=\"checkbox\" name=\"chng_paswod\" value=\"chng_paswodv\" aria-label=\"...\" onclick=\"var input = document.getElementById('paswod'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}\">";
echo "</span>";
echo "</div>";
echo "<BR>";
echo "<div class=\"progress\">";
echo "<div id=\"StrengthProgressBar\" class=\"progress-bar\"></div>";
echo "</div>";

echo "<div class=\"input-group\">";
echo "<span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-envelope\"></span></span>";
echo "<input class=\"form-control\" value=\"".$emaildy."\" placeholder=\"".$this->getString("settings_emaildy")."\" type=\"email\" name=\"email\">";
echo "</div>";
echo "<BR>";

if($log == "log/log.txt")
{	
	$chosen_log = $this->getString("log_activated");
}
else
{	
	$chosen_log = $this->getString("log_deactivated");
}

echo "<div class=\"input-group\">";
echo "<span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-book\"></span></span>";
echo "<select class=\"form-control\" value=\"".$log."\" id=\"logact\" name=\"logact\">
											<option value=\"".$log."\" selected>".$this->getString("log_state")." ".$chosen_log."</option>
											<option value=\"log/log.txt\">".$this->getString("log_enable")."</option>
											<option value=\"\">".$this->getString("log_disable")."</option>
										
											</select>";
echo "</div>";
echo "<BR>";


if($languagedy == "de")
{	
	$chosen_lang = "Deutsch";
}
elseif($languagedy == "en")
{	
	$chosen_lang = "English";
}
elseif($languagedy == "es")
{	
	$chosen_lang = "Español";
}
else
{
	$chosen_lang = "中國/ Chinese";
}

echo "<div class=\"input-group\">";
echo "<span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-flag\"></span></span>";
echo "<select class=\"form-control\" value=\"".$languagedy."\" id=\"lang\" name=\"lang\">
											<option value=\"".$languagedy."\" selected>".$chosen_lang." ".$this->getString("settings_languagedy")."</option>
											<option value=\"de\">Deutsch</option>
											<option value=\"en\">English</option>
											<option value=\"cn\">中文 (Chinese)</option>
											<option value=\"es\">Español</option>
											<option value=\"\" disabled>".$this->getString("settings_morelang")."</option>
										
											</select>";
echo "</div>";
echo "<BR>";


if($barcolour == "info")
{	
	$chosen_bcolor = $this->getString("settings_lightblue");
}
elseif($barcolour == "info progress-bar-striped active")
{	
	$chosen_bcolor = $this->getString("settings_lightblue_striped");
}
elseif($barcolour == "primary")
{
	$chosen_bcolor = $this->getString("settings_blue");
}
elseif($barcolour == "primary progress-bar-striped active")
{
	$chosen_bcolor = $this->getString("settings_blue_striped");
}
elseif($barcolour == "success")
{
	$chosen_bcolor = $this->getString("settings_green");
}
elseif($barcolour == "success progress-bar-striped active")
{
	$chosen_bcolor = $this->getString("settings_green_striped");
}
elseif($barcolour == "warning")
{
	$chosen_bcolor = $this->getString("settings_yellow");
}
elseif($barcolour == "warning progress-bar-striped active")
{
	$chosen_bcolor = $this->getString("settings_yellow_striped");
}
elseif($barcolour == "danger")
{
	$chosen_bcolor = $this->getString("settings_red");
}
elseif($barcolour == "danger progress-bar-striped active")
{
	$chosen_bcolor = $this->getString("settings_red_striped");
}

echo "<div class=\"input-group\">";
echo "<span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-tint\"></span></span>";
echo "<select class=\"form-control\" value=\"".$barcolour."\" id=\"col\" name=\"col\">
											<option value=\"".$barcolour."\" selected>".$chosen_bcolor." ".$this->getString("settings_choose")."</option>
											<option value=\"info\">".$this->getString("settings_lightblue")."</option>
											<option value=\"info progress-bar-striped active\">".$this->getString("settings_lightblue_striped")."</option>
											<option value=\"primary\">".$this->getString("settings_blue")."</option>
											<option value=\"primary progress-bar-striped active\">".$this->getString("settings_blue_striped")."</option>
											<option value=\"success\">".$this->getString("settings_green")."</option>
											<option value=\"success progress-bar-striped active\">".$this->getString("settings_green_striped")."</option>
											<option value=\"warning\">".$this->getString("settings_yellow")."</option>
											<option value=\"warning progress-bar-striped active\">".$this->getString("settings_yellow_striped")."</option>
											<option value=\"danger\">".$this->getString("settings_red")."</option>
											<option value=\"danger progress-bar-striped active\">".$this->getString("settings_red_striped")."</option>
										
											</select>";
echo "</div>";
echo "<BR>";


if($navbarcolour == "default")
{	
	$chosen_navcolor = $this->getString("settings_nav_white");
}
else
{	
	$chosen_navcolor = $this->getString("settings_nav_black");
}

echo "<div class=\"input-group\">";
echo "<span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-adjust\"></span></span>";
echo "<select class=\"form-control\" value=\"".$navbarcolour."\" id=\"navcol\" name=\"navcol\">
											<option value=\"".$navbarcolour."\" selected>".$chosen_navcolor." ".$this->getString("settings_choose_nav")."</option>
											<option value=\"default\">".$this->getString("settings_nav_white")."</option>
											<option value=\"inverse\">".$this->getString("settings_nav_black")."</option>
										
											</select>";
echo "</div>";
echo "<BR>";


if($timeform == "d.m.Y H:i:s")
{	
	$chosen_tform = $this->getString("langdeu");
}
elseif($timeform == "m/d/Y h:m:s a")
{	
	$chosen_tform = $this->getString("langeng");
}
elseif($timeform == "Y年m月d日 h点m分s秒 a")
{
	$chosen_tform = $this->getString("langchi");
}
elseif($timeform == "d-m-Y h:m:s")
{
	$chosen_tform = $this->getString("langes");
}

echo "<div class=\"input-group\">";
echo "<span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-time\"></span></span>";
echo "<select class=\"form-control\" value=\"".$timeform."\" id=\"tform\" name=\"tform\">
											<option value=\"".$timeform."\" selected>".$chosen_tform." ".$this->getString("tform")."</option>
											<option value=\"d.m.Y H:i:s\">".$this->getString("tformger")."</option>
											<option value=\"m/d/Y h:m:s a\">".$this->getString("tformeng")."</option>
											<option value=\"Y年m月d日 h点m分s秒 a\">".$this->getString("tformchi")."</option>
											<option value=\"d-m-Y h:m:s\">".$this->getString("tformes")."</option>
										
											</select>";
echo "</div>";
echo "<BR>";

if($backgrounddy == "img/bg1.jpg")
{	
	$chosen_bgdy = $this->getString("bg1");
}
elseif($backgrounddy == "img/bg2.jpg")
{	
	$chosen_bgdy = $this->getString("bg2");
}
elseif($backgrounddy == "img/bg3.jpg")
{
	$chosen_bgdy = $this->getString("bg3");
}
elseif($backgrounddy == "img/bg4.jpg")
{
	$chosen_bgdy = $this->getString("bg4");
}
elseif($backgrounddy == "img/bg5.jpg")
{
	$chosen_bgdy = $this->getString("bg5");
}
elseif($backgrounddy == "img/bg6.jpg")
{
	$chosen_bgdy = $this->getString("bg6");
}
elseif($backgrounddy == "img/bg7.jpg")
{
	$chosen_bgdy = $this->getString("bg7");
}
elseif($backgrounddy == "img/bg8.jpg")
{
	$chosen_bgdy = $this->getString("bg8");
}
elseif($backgrounddy == "img/bg9.jpg")
{
	$chosen_bgdy = $this->getString("bg9");
}
elseif($backgrounddy == "img/bg10.jpg")
{
	$chosen_bgdy = $this->getString("bg10");
}
elseif($backgrounddy == "https://source.unsplash.com/random/1920x1080")
{
	$chosen_bgdy = $this->getString("bgrandom");
}
elseif($backgrounddy == "")
{
	$chosen_bgdy = $this->getString("bgnone");
}

echo "<div class=\"input-group\">";
echo "<span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-picture\"></span></span>";
echo "<select class=\"form-control\" value=\"".$backgrounddy."\" id=\"bgdy\" name=\"bgdy\">
											<option value=\"".$backgrounddy."\" selected>".$chosen_bgdy." ".$this->getString("bgdy")."</option>
											<option value=\"img/bg1.jpg\">".$this->getString("bg1")."</option>
											<option value=\"img/bg2.jpg\">".$this->getString("bg2")."</option>
											<option value=\"img/bg3.jpg\">".$this->getString("bg3")."</option>
											<option value=\"img/bg4.jpg\">".$this->getString("bg4")."</option>
											<option value=\"img/bg5.jpg\">".$this->getString("bg5")."</option>
											<option value=\"img/bg6.jpg\">".$this->getString("bg6")."</option>
											<option value=\"img/bg7.jpg\">".$this->getString("bg7")."</option>
											<option value=\"img/bg8.jpg\">".$this->getString("bg8")."</option>
											<option value=\"img/bg9.jpg\">".$this->getString("bg9")."</option>
											<option value=\"img/bg10.jpg\">".$this->getString("bg10")."</option>
											<option value=\"https://source.unsplash.com/random/1920x1080\">".$this->getString("bgrandom")."</option>
											<option value=\"\">".$this->getString("bg_none")."</option>
											</select>";
echo "</div>";
echo "<BR>";

echo "<br>"; 
echo "<BR>";

if ($_POST['chng_paswod'] == 'chng_paswodv')
{	

$salt = "tXZlEmX0E2h0qr2knfDz";

   if (isset($_POST["gesendet"]))
   {
   $email = $_POST['email'];
   $usna = $_POST['usna'];
   $paswod = $_POST['paswod'];
   $md5paswod = hash('sha512', $salt . $paswod);
   $lang = $_POST['lang'];
   $col = $_POST['col'];
   $navcol = $_POST['navcol'];
   $tform = $_POST['tform'];
   $bgdy = $_POST['bgdy'];
   $logact = $_POST['logact'];
 
      $fp=fopen($file, "w");
      fwrite($fp,"<?php \n");
      fwrite($fp,"\n");
      fwrite($fp,"\$usernamedy = \"".$usna."\";\n");
      fwrite($fp,"\$passworddy = \"".$md5paswod."\";\n");
	  fwrite($fp,"\$emaildy = \"".$email."\";\n");
	  fwrite($fp,"\$languagedy = \"".$lang."\";\n");
	  fwrite($fp,"\$barcolour = \"".$col."\";\n");
	  fwrite($fp,"\$navbarcolour = \"".$navcol."\";\n");
	  fwrite($fp,"\$timeform = \"".$tform."\";\n");
	  fwrite($fp,"\$backgrounddy = \"".$bgdy."\";\n");
	  fwrite($fp,"\$log = \"".$logact."\";\n");
      fwrite($fp,"\n");
      fwrite($fp,"?>");
      fclose($fp);
      echo "<div class=\"alert alert-success\" role=\"alert\">".$this->getString("settings_alertdy")."</div>";
	}
	  
}
else
{
	if (isset($_POST["gesendet"]))
   {
   $email = $_POST['email'];
   $usna = $_POST['usna'];
   $paswod = $passworddy;
   $lang = $_POST['lang'];
   $col = $_POST['col'];
   $navcol = $_POST['navcol'];
   $tform = $_POST['tform'];
   $bgdy = $_POST['bgdy'];
   $logact = $_POST['logact'];
 
      $fp=fopen($file, "w");
      fwrite($fp,"<?php \n");
      fwrite($fp,"\n");
      fwrite($fp,"\$usernamedy = \"".$usna."\";\n");
      fwrite($fp,"\$passworddy = \"".$paswod."\";\n");
	  fwrite($fp,"\$emaildy = \"".$email."\";\n");
	  fwrite($fp,"\$languagedy = \"".$lang."\";\n");
	  fwrite($fp,"\$barcolour = \"".$col."\";\n");
	  fwrite($fp,"\$navbarcolour = \"".$navcol."\";\n");
	  fwrite($fp,"\$timeform = \"".$tform."\";\n");
	  fwrite($fp,"\$backgrounddy = \"".$bgdy."\";\n");
	  fwrite($fp,"\$log = \"".$logact."\";\n");
      fwrite($fp,"\n");
      fwrite($fp,"?>");
      fclose($fp);
      echo "<div class=\"alert alert-success\" role=\"alert\">".$this->getString("settings_alertdy")."</div>";
	  mail($emaildy,"".$this->getString("settmailtitle")."","".$this->getString("settmailmsg")."");
	}	
}
} 
?>
</center>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" name="gesendet" value="<?php print $this->getString("settings_savedy"); ?>"></form> <button type="button" class="btn btn-primary" data-dismiss="modal"><?php print $this->getString("close_modaldy"); ?></button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="uploaddy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php print $this->getString("multi_upl"); ?></h4>
      </div>
      <div class="modal-body">
        <!-- -->
		<div class="well">
<form enctype="multipart/form-data" method="post">
	<div id="upload">
		<?php
		if(GateKeeper::isNewdirAllowed()){
		?>
		<div id="upload_container">
			<!--<input name="userfile" type="file" class="upload_file" />
			<input type="submit" value="<?php print $this->getString("upload"); ?>" class="upload_sumbit" />-->
		</div>
		<center>
    <div class="input-group">
		 <input name="userfile" id="fuUpload" type="file" class="filestyle" data-placeholder="<?php print $this->getString("choose_filedy"); ?>" data-icon="false"><!--<input type="submit" class="btn btn-default" value="<?php print $this->getString("upload"); ?>" class="upload_sumbit" />-->
		 </div><!-- /input-group --><!-- /.col-lg-6 -->
		 <br>
        <div id="dvProgress" min-width: 2em;">
		</div>
		<?php
		}
		?>
		<div class="bar"></div>
	</div>
</div></center>
		<!-- -->
      </div>
      <div class="modal-footer">
        <input type="submit" name="btnUpload" id="btnUpload" class="btn btn-success" value="<?php print $this->getString("upload"); ?>" class="upload_submit" /></form> <button type="button" class="btn btn-primary" data-dismiss="modal"><?php print $this->getString("ueber_close"); ?></button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ueber" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h4 class="modal-title" id="myModalLabel"><?php print $this->getString("ueber_title"); ?></h4></center>
      </div>
      <div class="modal-body">
		<center><img src="css/logo.svg" alt="DropYet"
			class="ueber-logo"
			alt="DropYet"/>
			<style>
			.ueber-logo {
			width: 70%;
			height: auto;
			}
			</style></center><hr><center>
        © 2013 - 2020 <?php print $this->getString("about_by"); ?> <a target="_blank" href="https://www.maximiliansixdorf.de">Maximilian Sixdorf</a><br><br>
		<?php print $this->getString("about_under"); ?> <a href="#" data-toggle="modal" data-target="#license">GNU General Public <?php print $this->getString("about_license"); ?> version 3.0 (GPLv3)</a><br><br>
		<div class="well well-sm"><?php  
include("ver.php"); 
if(GateKeeper::isUserLoggedIn())
if (strcmp("2.4.6.4", $dyver) !== 0) { echo "<span style=\"color: orange\" class=\"glyphicon glyphicon-info-sign\"></span>";} else { echo "<span class=\"glyphicon glyphicon-info-sign\"></span>"; }?> <?php print $this->getString("currinst"); ?> 2.4.6.4 "Space Invader" | <?php print $this->getString("latestver"); ?> <?php include("ver.php"); echo $dyver;?> | <?php $version = phpversion(); echo "PHP "; print $version; ?></div></center>
		<center><?php
								$browser = new Browser();
								if( $browser->getBrowser() == Browser::BROWSER_EDGE && $browser->getVersion() <= 17 ) {
								echo '<br><div class="alert alert-warning" role="alert"><span class="glyphicon glyphicon-info-sign"></span> '.$this->getString("comp_edge").'</div>';
								}
								?>
								<div class="btn-group btn-group-justified" role="group" aria-label="...">
		<div class="btn-group" role="group"><a target="_blank" href="https://dropyet.maximiliansixdorf.de/" class="btn btn-default btn-block" ><?php print $this->getString("infody"); ?></a></div>
		<div class="btn-group" role="group"><a target="_blank" href="https://dropyet.maximiliansixdorf.de/docs/" class="btn btn-default btn-block"><?php print $this->getString("supportdy"); ?></a></div>
		<div class="btn-group" role="group"><a target="popup"  class="btn btn-default btn-block" onclick="window.open('', 'popup', 'width=580,height=750,scrollbars=no, toolbar=no,status=no,resizable=yes,menubar=no,location=no,directories=no,top=10,left=10')"href="https://contact.tqsg.de"><?php print $this->getString("contactdy"); ?></a></div>
		<?php  
include("ver.php"); 
if(GateKeeper::isUserLoggedIn())
if (strcmp("2.4.6.4", $dyver) !== 0) { echo "<div class=\"btn-group\" role=\"group\"><a target=\"_blank\" href=\"update.php\" class=\"btn btn-primary btn-block\" >".$this->getString("dyupdate")."</a></div>";} else { echo "<div class=\"btn-group\" role=\"group\"><a target=\"_blank\" href=\"#\" class=\"btn btn-primary btn-block disabled\" >".$this->getString("updno")."</a></div>";} ?>
		</div>
		</center><hr>
		<center><?php print $this->getString("about_ty"); ?></center><br><br>
		<table style="text-align: left; width: 100%;" border="0"
		cellpadding="2" cellspacing="2">
		<tbody>
		<tr>
		<td><a target="_blank" href="http://getbootstrap.com/">Bootstrap</a></td>
		<td align="undefined" valign="undefined"><a target="_blank" href="https://jquery.com/">jQuery</a></td>
		</tr>
		<tr>
		<td align="undefined" valign="undefined"><a target="_blank" href="http://marekrei.com/">Marek Rei (Encode Explorer)</a></td>
		<td align="undefined" valign="undefined"><a target="_blank" href="http://stackoverflow.com/questions/26807524/twitter-bootstrap-3-modal-with-scrollable-body">Sebsemillia (Scrollable Modal)</a></td>
		</tr>
		<tr>
		<td align="undefined" valign="undefined"><a target="_blank" href="http://codepen.io/bootstrapped/">Bryan Willis (Navbar Logo)</a></td>
		<td align="undefined" valign="undefined"><a target="_blank" href="http://php.net/">php.net</a></td>
		</tr>
		<tr>
		<td align="undefined" valign="undefined"><a target="_blank" href="http://chrisschuld.com/">Chris Schuld (Browser Database)</a></td>
		<td align="undefined" valign="undefined"><a target="_blank" href="https://www.gentleface.com/free_icon_set.html">Gentleface Icons</a></td>
		</tr>
		<tr>
		<td align="undefined" valign="undefined"><a target="_blank" href="https://www.tutorialrepublic.com/faq/how-to-add-icons-to-input-submit-button-in-bootstrap.php">Icon in input</a></td>
		<td align="undefined" valign="undefined"><a target="_blank" href="http://www.f-thies.de/webdesign/tutorials/aufbau-einer-multilingualen-website/">Install language system</a></td>
		</tr>
		<tr>
		<td align="undefined" valign="undefined"><a target="_blank" href="https://www.unsplash.com">Unsplash (Background Images)</a></td>
		<td align="undefined" valign="undefined"><a target="_blank" href="http://martinw.net/zxcvbn-bootstrap-strength-meter/">Martin W. (password strength meter)</a></td>
		</tr>
		</tbody>
		</table>
		<br>
		<center>
		<?php print $this->getString("cn_trans"); ?><br>
		<?php print $this->getString("about_mm"); ?>
		</center>		
		<hr><center>
		<?php
								if(GateKeeper::isUserLoggedIn())
								$abcntfiles = $ar['count'] - 1;
								print "<div class=\"well well-sm\">".sizeFormat($ar['size'] + $puar['size'])." ".$this->getString("size_all")." ".($abcntfiles + $puar['count'])." ".$this->getString("size_files")." ".$this->getString("and")." ".($ar['dircount'] + $puar['dircount'])." ".$this->getString("size_dirs")."</div>";?>
	    <?php
			if(GateKeeper::isUserLoggedIn())
			$spaceall = $ar['size'] + $puar['size'];
			$percentprivate = $ar['size'] * 100 / $spaceall;
			$percentprivateround = round($percentprivate);
			//echo $percentprivateround;
			
			$percentpublic = $puar['size'] * 100 / $spaceall;
			$percentpublicround = round($percentpublic);
			//echo $percentpublicround;
	  ?>
		<div class="progress">
  <?php if(GateKeeper::isUserLoggedIn()) echo"<div class=\"progress-bar progress-bar-success\" style=\"width: ".$percentprivateround."%\">";?>
    <?php if(GateKeeper::isUserLoggedIn()) echo $percentprivateround;?>% <?php print $this->getString("percent_private"); ?>
  </div>
  <?php if(GateKeeper::isUserLoggedIn()) echo"<div class=\"progress-bar progress-bar-warning\" style=\"width: ".$percentpublicround."%\">";?>
    <?php if(GateKeeper::isUserLoggedIn()) echo $percentpublicround;?>% <?php print $this->getString("percent_public"); ?>
  </div>
</div>
	  </center></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php print $this->getString("ueber_close"); ?></button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="security" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php print $this->getString("security_title"); ?></h4>
      </div>
      <div class="modal-body">
	  <center>
	  <div class="alert alert-info" role="alert"><?php print $this->getString("security_recommendation"); ?></div><hr>
        <?php
		$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		$host     = $_SERVER['HTTP_HOST'];
		$script   = $_SERVER['SCRIPT_NAME'];
		$params   = $_SERVER['QUERY_STRING'];
 
		$server = $protocol . $host . $script . '?' . $params;
		
		print $this->getString("security_pone");
  
		if($protocol == "https://") 
		{
		echo '<span style="color: rgb(0, 153, 0);">'.$this->getString("security_ssl").'</span><br><br><font color="green"><span style="font-size:7em;" class="glyphicon glyphicon-lock"></span></font><br>';
		}
		else
		{		
		echo '<span style="color: rgb(204, 0, 0);">'.$this->getString("security_nossl").'</span><br><br><div class="alert alert-danger" role="alert">'.$this->getString("security_sslrec").'</div><font color="red"><span style="font-size:7em;" class="glyphicon glyphicon-exclamation-sign"></span></font><br>';
		}
		?>
		<br>
		<hr>
		<!--<?php
		if(GateKeeper::isUserLoggedIn())
{
		echo "<hr><div class=\"well well-sm\"><a href=\"#\" data-toggle=\"modal\" data-target=\"#passwordcheck\">".$this->getString("pw_warn_title")."</a></div>";
		}
		?>-->
		<!--<?php
		if(GateKeeper::isUserLoggedIn())
{
		$pwlength = strlen($passworddy);
		
		if($pwlength <= "5")
		{
		echo "<div class=\"progress\"><div class=\"progress-bar progress-bar-danger\" role=\"progress-bar\" aria-valuenow=\"100\" style=\"width: 100%;\">".$this->getString("pw_warn_short")."</div></div>";
		}
		elseif($pwlength <= "8")
		{
		echo "<div class=\"progress\"><div class=\"progress-bar progress-bar-warning\" role=\"progress-bar\" aria-valuenow=\"100\" style=\"width: 100%;\">".$this->getString("pw_warn_enough")."</div></div>";
		}
		elseif($pwlength <= "12")
		{
		echo "<div class=\"progress\"><div class=\"progress-bar progress-bar-warning\" role=\"progress-bar\" aria-valuenow=\"100\" style=\"width: 100%;\">".$this->getString("pw_warn_middle")."</div></div>";
		}
		elseif($pwlength <= "15")
		{
		echo "<div class=\"progress\"><div class=\"progress-bar progress-bar-success\" role=\"progress-bar\" aria-valuenow=\"100\" style=\"width: 100%;\">".$this->getString("pw_warn_good")."</div></div>";
		}
		elseif($pwlength <= "20")
		{
		echo "<div class=\"progress\"><div class=\"progress-bar progress-bar-success\" role=\"progress-bar\" aria-valuenow=\"100\" style=\"width: 100%;\">".$this->getString("pw_warn_vgood")."</div></div>";
		}
		elseif($pwlength > "20")
		{
		echo "<div class=\"progress\"><div class=\"progress-bar progress-bar-success\" role=\"progress-bar\" aria-valuenow=\"100\" style=\"width: 100%;\">".$this->getString("pw_warn_wow")."</div></div>";
		}
		}
		?>
		<?php
		if(GateKeeper::isUserLoggedIn())
		{
		$sonderzeichen = '#[-@!éèà$%&.,?*]#';
		if( preg_match($sonderzeichen, $passworddy) ) {
		echo "<div class=\"progress\"><div class=\"progress-bar progress-bar-success\" role=\"progress-bar\" aria-valuenow=\"100\" style=\"width: 100%;\">".$this->getString("pw_warn_special")."</div></div>";
		}
		else
		{
		echo "<div class=\"progress\"><div class=\"progress-bar progress-bar-warning\" role=\"progress-bar\" aria-valuenow=\"100\" style=\"width: 100%;\">".$this->getString("pw_warn_nospecial")."</div></div>";
		}}
		?>
		<?php
		if(GateKeeper::isUserLoggedIn())
		{
		$gb = '#[ABCDEFGHIJKLMNOPQRSTUVWXYZ]#';
		if( preg_match($gb, $passworddy) ) {
		echo "<div class=\"progress\"><div class=\"progress-bar progress-bar-success\" role=\"progress-bar\" aria-valuenow=\"100\" style=\"width: 100%;\">".$this->getString("pw_warn_capital")."</div></div>";
		}
		else
		{
		echo "<div class=\"progress\"><div class=\"progress-bar progress-bar-warning\" role=\"progress-bar\" aria-valuenow=\"100\" style=\"width: 100%;\">".$this->getString("pw_warn_nobig")."</div></div>";
		}}
		?>
		<?php
		if(GateKeeper::isUserLoggedIn())
		{
		$kb = '#[abcdefghijklmnopqrstuvwxyz]#';
		if( preg_match($kb, $passworddy) ) {
		echo "<div class=\"progress\"><div class=\"progress-bar progress-bar-success\" role=\"progress-bar\" aria-valuenow=\"100\" style=\"width: 100%;\">".$this->getString("pw_warn_normal")."</div></div>";
		}
		else
		{
		echo "<div class=\"progress\"><div class=\"progress-bar progress-bar-warning\" role=\"progress-bar\" aria-valuenow=\"100\" style=\"width: 100%;\">".$this->getString("pw_warn_nosmall")."</div></div>";
		}}
		?>
		<?php
		if(GateKeeper::isUserLoggedIn())
		{
		$zb = '#[0123456789]#';
		if( preg_match($zb, $passworddy) ) {
		echo "<div class=\"progress\"><div class=\"progress-bar progress-bar-success\" role=\"progress-bar\" aria-valuenow=\"100\" style=\"width: 100%;\">".$this->getString("pw_warn_nums")."</div></div>";
		}
		else
		{
		echo "<div class=\"progress\"><div class=\"progress-bar progress-bar-warning\" role=\"progress-bar\" aria-valuenow=\"100\" style=\"width: 100%;\">".$this->getString("pw_warn_nonums")."</div></div>";
		}}
		?>
		<?php
		if(GateKeeper::isUserLoggedIn())
		{
		$username_in_pw = $usernamedy;
		$pos = strpos($passworddy, $username_in_pw);
		if ($pos === false)
		{
		echo "<div class=\"progress\"><div class=\"progress-bar progress-bar-success\" role=\"progress-bar\" aria-valuenow=\"100\" style=\"width: 100%;\">".$this->getString("pw_warn_nouser")."</div></div>";
		}
		else
		{
		echo "<div class=\"progress\"><div class=\"progress-bar progress-bar-warning\" role=\"progress-bar\" aria-valuenow=\"100\" style=\"width: 100%;\">".$this->getString("pw_warn_user")."</div></div>";
		}}
		?>-->
		<div class="alert alert-warning" role="alert"><?php print $this->getString("gone_pw_chck"); ?></div>
		</center>
      </div>
      <div class="modal-footer">
	  <?php
		$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		$host     = $_SERVER['HTTP_HOST'];
		$script   = $_SERVER['SCRIPT_NAME'];
		$params   = $_SERVER['QUERY_STRING'];
 
		$server = $protocol . $host . $script . '?' . $params;
  
		if($protocol == "https://") 
		{
		echo "<button type=\"button\" class=\"btn btn-success\" data-dismiss=\"modal\">".$this->getString("security_close")."";
		}
		else
		{		
		echo "<button type=\"button\" class=\"btn btn-warning\" data-dismiss=\"modal\">".$this->getString("security_close")."";
		}
		?>
      </div>
    </div>
  </div>
</div>

<form action="<?php $PHP_SELF; ?>" method="post">
<?php 
if(GateKeeper::isUserLoggedIn())
{
if(isset($_POST['send_log']))
{
	$filename = 'log.txt';
    $path = 'log';
    $file = $path . "/" . $filename;

    $mailto = $emaildy;
    $subject = $this->getString("log_subject");
    $message = $this->getString("log_message");

    $content = file_get_contents($file);
    $content = chunk_split(base64_encode($content));

    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (RFC)
    $eol = "\r\n";

    // main header (multipart mandatory)
    $headers = "From: DropYet" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;

    // message
    $body = "--" . $separator . $eol;
    $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
    $body .= "Content-Transfer-Encoding: 8bit" . $eol;
    $body .= $message . $eol;

    // attachment
    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol;
    $body .= $content . $eol;
    $body .= "--" . $separator . "--";

    //SEND Mail
    if (mail($mailto, $subject, $body, $headers)) {
        $log_sent = "<center><div class=\"alert alert-success\" role=\"alert\">".$this->getString("log_mailsent")."</div></center>"; // or use booleans here
    } else {
        $log_failed = "<center><div class=\"alert alert-danger\" role=\"alert\">".$this->getString("log_mailfailed")."</div></center>";
        print_r( error_get_last() );
    }
}}
?>
<style type="text/css">
    .bs-example{
    	margin: 20px;
    }
    .icon-input-btn{
        display: inline-block;
        position: relative;
    }
    .icon-input-btn input[type="submit"]{
        padding-left: 2em;
    }
    .icon-input-btn .glyphicon{
        display: inline-block;
        position: absolute;
        left: 0.65em;
        top: 30%;
    }
</style>
<script type="text/javascript">
$(document).ready(function(){
	$(".icon-input-btn").each(function(){
        var btnFont = $(this).find(".btn").css("font-size");
        var btnColor = $(this).find(".btn").css("color");
		$(this).find(".glyphicon").css("font-size", btnFont);
        $(this).find(".glyphicon").css("color", btnColor);
        if($(this).find(".btn-xs").length){
            $(this).find(".glyphicon").css("top", "24%");
        }
	}); 
});
</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
<div class="modal fade" id="log" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php print $this->getString("logprv_title"); ?></h4>
      </div>
      <div class="modal-body">
	  <?php print $log_sent; ?>
	  <?php print $log_failed; ?>
        <?php
if(GateKeeper::isUserLoggedIn())
	{
	$zitate = file("log/log.txt");
	for($i=0;$i < count($zitate); $i++){
	echo $i.": ".$zitate[$i]."<br><br>";
}}
	?>
		
	  </div>
      <div class="modal-footer">
<div class="row"><?php if(empty($emaildy))
	{
	echo "<div class=\"col-sm-6 text-left\"><input type=\"submit\" class=\"btn btn-info\" value=\"".$this->getString("log_deac_btn")."\" type=\"hidden\" name=\"send_log\" value=\"1\" disabled/></form></div>";
	} 
	else 
	{
	echo "<div class=\"col-sm-6 text-left\"><span class=\"icon-input-btn\"><span class=\"glyphicon glyphicon-send\"></span><input type=\"submit\" class=\"btn btn-info\" value=\"".$this->getString("log_send_btn")."\" type=\"hidden\" name=\"send_log\" value=\"1\" /></span></form></div>";
	}
	?> <div class="col-sm-6 text-right"><a href="?dellogpriv=1" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>  <?php print $this->getString("clearlog"); ?></a> <button type="button" class="btn btn-primary" data-dismiss="modal"><?php print $this->getString("log_close"); ?></button></div></div>
      <?php
	if(GateKeeper::isUserLoggedIn())
	{
		if(isset($_GET['dellogpriv']))
		{
			unlink("log/log.txt");
		}}
?>
	  </div>
    </div>
  </div>
</div>

<div class="modal fade" id="license" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php print $this->getString("license"); ?></h4>
      </div>
      <div class="modal-body">
	<?php
$zitate = file_get_contents('LICENSE');
echo nl2br($zitate);
	?>
		
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php print $this->getString("log_close"); ?></button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="compatibility" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php print $this->getString("comp_title"); ?></h4>
      </div>
      <div class="modal-body">
	  <center>
		<?php print $this->getString("comp"); ?><br><br>
		<a href="https://www.google.de/chrome/browser/desktop/" target="_blank">Download Chrome</a> | <a href="http://www.opera.com/de/computer" target="_blank">Download Opera</a>
		</center>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php print $this->getString("log_close"); ?></button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="compatibility_old" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php print $this->getString("comp_title"); ?></h4>
      </div>
      <div class="modal-body">
	  <center>
		<?php print $this->getString("comp_old"); ?><br><br>
		</center>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php print $this->getString("log_close"); ?></button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="compatibility_ff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php print $this->getString("comp_title"); ?></h4>
      </div>
      <div class="modal-body">
	  <center>
		<?php print $this->getString("comp_ff"); ?><br><br>
		</center>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php print $this->getString("log_close"); ?></button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="evc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php print $this->getString("evctitle"); ?></h4>
      </div>
      <div class="modal-body">
	  <center>
		<?php print $this->getString("evctext"); ?><br><br>
		</center>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php print $this->getString("log_close"); ?></button>
      </div>
    </div>
  </div>
</div>

<!--<div class="modal fade" id="passwordcheck" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php print $this->getString("pw_warn_title"); ?></h4>
      </div>
      <div class="modal-body">
	  <center>
		<?php print $this->getString("pw_warn_info"); ?><br><br>
		</center>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php print $this->getString("log_close"); ?></button>
      </div>
    </div>
  </div>
</div>-->


</body>
</html>

<?php
	}
}

//
// This is where the system is activated.
// We check if the user wants an image and show it. If not, we show the explorer.
//
$encodeExplorer = new EncodeExplorer();
$encodeExplorer->init();

GateKeeper::init();

if(!ImageServer::showImage() && !Logger::logQuery())
{
	$location = new Location();
	$location->init();
	if(GateKeeper::isAccessAllowed())
	{
		Logger::logAccess($location->getDir(true, false, false, 0), true);
		$fileManager = new FileManager();
		$fileManager->run($location);
	}
	$encodeExplorer->run($location);
}
?>