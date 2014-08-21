<?php if (!defined('APPLICATION')) exit();
/**
 * @copyright Copyright 2008, 2009 Vanilla Forums Inc.
 * @license http://www.opensource.org/licenses/gpl-2.0.php GPLv2
 * @author Jordan Jones <mister_fix@mc-gc.net>
 */

$PluginInfo['MCHeads Minecraft avatars'] = array(
   'Name' => 'MCHeads Minecraft avatars',
   'Description' => "Sets your default profile picture as your minecraft avatar.",
   'Version' => '1.0.0',
   'RequiredApplications' => array('Vanilla' => '2.0.18'),
   'Author' => 'Jordan Jones',
   'AuthorEmail' => 'Mister_Fix@mc-gc.net',
   'AuthorUrl' => 'http://vanillaforums.org/profile/Mister_Fix',
   'RequiredTheme' => FALSE,
   'HasLocale' => FALSE,
   'MobileFriendly' => TRUE,
);

class VanilliconPlugin extends Gdn_Plugin {
   public function ProfileController_AfterAddSideMenu_Handler($Sender, $Args) {
      if (!$Sender->User->Photo) {
         $UserName = GetValue('Name', $Sender->User);
         $Sender->User->Photo = 'http://mc-heads.net/avatar/'.$UserName;
      }
   }
}

if (!function_exists('UserPhotoDefaultUrl')) {
   function UserPhotoDefaultUrl($User, $Options = array()) {
      $UserName = GetValue('Name', $User);
      $PhotoUrl = 'http://mc-heads.net/avatar/'.$UserName;
      return $PhotoUrl;
   }
}
