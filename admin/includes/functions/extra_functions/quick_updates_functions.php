<?php
/**
 * @package admin
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: copy_to_confirm.php 3380 2006-04-06 05:12:45Z drbyte $
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}
   
function install_quick_updates() {
	global $db;
		$db->Execute("INSERT INTO ".TABLE_CONFIGURATION_GROUP." VALUES ('', 'Quick Updates', 'Quick Updates Configuration', '1', '1')");
		$group_id = mysql_insert_id();
		$db->Execute("UPDATE ".TABLE_CONFIGURATION_GROUP." SET sort_order = ".$group_id." WHERE configuration_group_id = ".$group_id);
if (function_exists('zen_register_admin_page')) {
    if (!zen_page_key_exists('quick_updates_config')) {
        	zen_register_admin_page('quick_updates_config', 'BOX_CATALOG_QUICK_UPDATES','FILENAME_CONFIGURATION', 'gID='.$group_id, 'configuration', 'Y', 103);
    }
}
		$db->Execute("INSERT INTO ".TABLE_CONFIGURATION."  VALUES 
		(NULL, 'Display the Product ID', 'QUICKUPDATES_DISPLAY_ID', 'true', 'Enable/Disable displaying the Product ID <br /><br />(Default value = True)',".$group_id.", '5', NULL, NOW(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),'), 
		(NULL, 'Display the Product Thumbnail', 'QUICKUPDATES_DISPLAY_THUMBNAIL', 'true', 'Enable/Disable displaying the Product Thumbnail <br /><br />(Default value = True)',".$group_id.", '10', NULL, NOW(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),'),
		(NULL, 'Set Thumbnail Width', 'QUICKUPDATES_DISPLAY_THUMBNAIL_WIDTH', '50', 'Enter the width for the product image thumbnail. DO NOT enter px or em. <br /><br />(Default value is 50)',".$group_id.", '15', NULL, NOW(), NULL, NULL),
		(NULL, 'Set Thumbnail Height', 'QUICKUPDATES_DISPLAY_THUMBNAIL_HEIGHT', '50', 'Enter the height for the product image thumbnail. DO NOT enter px or em. <br /><br />(Default value is 50)',".$group_id.", '20', NULL, NOW(), NULL, NULL),
		(NULL, 'Display & Modify the Product Model Number', 'QUICKUPDATES_MODIFY_MODEL', 'true', 'Enable/Disable display and modifiying the Product Model <br /><br />(Default value = True)', ".$group_id.", '25', NULL, NOW(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),'),
		(NULL, 'Display & Modify the Product Name',  'QUICKUPDATES_MODIFY_NAME', 'true', 'Enable/Disable display and modifiying the Product Name <br /><br />(Default value = True)',".$group_id.", '30', NULL, NOW(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),'),
		(NULL, 'Display & Modify the Product Description', 'QUICKUPDATES_MODIFY_DESCRIPTION', 'true', 'Enable/Disable display and modifying the Product Description <br /><br />(Default value = True)', ".$group_id.", '35', NULL, NOW(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),'),
		(NULL, 'Activate Product Description Popup Edit', 'QUICKUPDATES_MODIFY_DESCRIPTION_POPUP', 'false', 'Enable/Disable using popup edit link to edit product description. <br /><br />You MUST enable the product description display for this feature to work and display correctly. <br /><br />(Default value = False)', ".$group_id.", '40', NULL, NOW(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),'),
		(NULL, 'Display & Modify the Product Status', 'QUICKUPDATES_MODIFY_STATUS', 'true', 'Enable/Disable display and modifying the Product Status <br /><br />(Default value = True)',".$group_id.", '45',  NULL, NOW(), NULL,  'zen_cfg_select_option(array(\"true\", \"false\"),'),
		(NULL, 'Display & Modify the Product Weight', 'QUICKUPDATES_MODIFY_WEIGHT', 'true', 'Enable/Disable display and modifiying the Product Weight <br /><br />(Default value = True)',".$group_id.", '50',  NULL, NOW(), NULL,  'zen_cfg_select_option(array(\"true\", \"false\"),'),
		(NULL, 'Display & Modify the Product Inventory Quantity', 'QUICKUPDATES_MODIFY_QUANTITY', 'true', 'Enable/Disable display and modifiying the Product Inventory Quantity <br /><br />(Default value = True)',".$group_id.", '55',  NULL, NOW(), NULL,  'zen_cfg_select_option(array(\"true\", \"false\"),'),
		(NULL, 'Display & Modify the Product Manufacturer', 'QUICKUPDATES_MODIFY_MANUFACTURER', 'false', 'Enable/Disable display and modifiying the Product Manufacturer <br /><br />(Default value = False)', ".$group_id.", '60',  NULL, NOW(), NULL,  'zen_cfg_select_option(array(\"true\", \"false\"),'),
		(NULL, 'Display & Modify the Product Tax Class', 'QUICKUPDATES_MODIFY_TAX', 'false', 'Enable/Disable display and modifiying the Product Tax Class <br /><br />(Default value = False)', ".$group_id.", '65', NULL, NOW(), NULL,  'zen_cfg_select_option(array(\"true\", \"false\"),'),
		(NULL, 'Display & Modify the Product Category', 'QUICKUPDATES_MODIFY_CATEGORY', 'true',  'Enable/Disable display and modifiying the Product Category <br /><br />(Default value = True)',".$group_id.", '70', NULL, NOW(), NULL,  'zen_cfg_select_option(array(\"true\", \"false\"),'),
		(NULL, 'Display & Modify the Product Sort Order', 'QUICKUPDATES_MODIFY_SORT_ORDER', 'true', 'Enable/Disable display and modifiying of the products sort order <br /><br />(Default value = True)',".$group_id.", '75', NULL, NOW(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),'),
		(NULL, 'Activate Display of Product Price with Tax Included on Hover',  'QUICKUPDATES_DISPLAY_TVA_OVER', 'false', 'Enable/Disable the display of the product price with all tax included when you hover your mouse over a product <br /><br />(Default value = False)', ".$group_id.", '80', NULL, NOW(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),'),
		(NULL, 'Display Link to Product Info Page',  'QUICKUPDATES_DISPLAY_PREVIEW','false', 'Enable/Disable the display of the link to the products info page. Product info page will open in a new window/tab. <br /><br />(Default value = False)', ".$group_id.", '85', NULL, NOW(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),'),
		(NULL, 'Display Link to Product Edit Page', 'QUICKUPDATES_DISPLAY_EDIT','true','Enable/Disable the display of the link to the product edit page. Product edit page will open in a new window/tab. <br /><br />(Default value = True)', ".$group_id.", '90', NULL, NOW(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),'),
		(NULL, 'Activate/Deactivate Commercial Margin',  'QUICKUPDATES_ACTIVATE_COMMERCIAL_MARGIN', 'true','Do you want that the commercial margin functions to be activated? <br /><br />(Default value = True)',".$group_id.", '95', NULL, NOW(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),') ");
}

function remove_quick_updates() {
	global $db;
		$sql = "SELECT configuration_group_id FROM ".TABLE_CONFIGURATION_GROUP." WHERE configuration_group_title = 'Quick Updates' LIMIT 1";
		$result = mysql_query($sql);;
		if (mysql_num_rows($result)) { 
			$group_id =  mysql_fetch_array($result);
			$db->Execute("DELETE FROM ".TABLE_CONFIGURATION." WHERE configuration_group_id = ".$group_id[0]);
			$db->Execute("DELETE FROM ".TABLE_CONFIGURATION_GROUP." WHERE configuration_group_id = ".$group_id[0]);
			$db->Execute("DELETE FROM ".TABLE_ADMIN_PAGES." WHERE page_key = 'quick_updates_catalog'");
			$db->Execute("DELETE FROM ".TABLE_ADMIN_PAGES." WHERE page_key = 'quick_updates_config'");
		}
}