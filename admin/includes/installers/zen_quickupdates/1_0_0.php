<?php
// use $configuration_group_id where needed
$zc150 = (PROJECT_VERSION_MAJOR > 1 || (PROJECT_VERSION_MAJOR == 1 && substr(PROJECT_VERSION_MINOR, 0, 3) >= 5));
if ($zc150) { // continue Zen Cart 1.5.0
  // clear all previous installation / configuration when modules was not yet using zencart_autoinstaller 
  $sql = "SELECT configuration_group_id FROM ".TABLE_CONFIGURATION_GROUP." WHERE configuration_group_title = 'Quick Updates' LIMIT 1";
  $result = mysql_query($sql);
  if (mysql_num_rows($result)) { 
    $configuration_group_id =  mysql_fetch_array($result);
    $db->Execute("DELETE FROM ".TABLE_CONFIGURATION." WHERE configuration_group_id = ".$configuration_group_id[0]);
    $db->Execute("DELETE FROM ".TABLE_CONFIGURATION_GROUP." WHERE configuration_group_id = ".$configuration_group_id[0]);
    $db->Execute("DELETE FROM ".TABLE_ADMIN_PAGES." WHERE page_key = 'quick_updates_catalog'");
    $db->Execute("DELETE FROM ".TABLE_ADMIN_PAGES." WHERE page_key = 'quick_updates_config'");
  }


  if (!zen_page_key_exists('quick_updates_config')) {
    if ((int)$configuration_group_id > 0) {
      zen_register_admin_page('quick_updates_config',
      'BOX_CATALOG_QUICK_UPDATES', 
      'FILENAME_CONFIGURATION',
      'gID=' . $configuration_group_id, 
      'configuration', 
      'Y',
      $configuration_group_id);

      zen_register_admin_page('quick_updates_catalog', 'BOX_CATALOG_QUICK_UPDATES','FILENAME_QUICK_UPDATES', '', 'catalog', 'Y', 104);

      $messageStack->add('Enabled Zen Quick Updates Configuration Menu.', 'success');
    }
  }

   // add configuration group 
  $db->Execute("INSERT INTO ".TABLE_CONFIGURATION."  VALUES 
  (NULL, 'Display the Product ID', 'QUICKUPDATES_DISPLAY_ID', 'true', 'Enable/Disable displaying the Product ID <br /><br />(Default value = True)',".$configuration_group_id.", '5', NULL, NOW(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),'), 
  (NULL, 'Display the Product Thumbnail', 'QUICKUPDATES_DISPLAY_THUMBNAIL', 'true', 'Enable/Disable displaying the Product Thumbnail <br /><br />(Default value = True)',".$configuration_group_id.", '10', NULL, NOW(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),'),
  (NULL, 'Set Thumbnail Width', 'QUICKUPDATES_DISPLAY_THUMBNAIL_WIDTH', '50', 'Enter the width for the product image thumbnail. DO NOT enter px or em. <br /><br />(Default value is 50)',".$configuration_group_id.", '15', NULL, NOW(), NULL, NULL),
  (NULL, 'Set Thumbnail Height', 'QUICKUPDATES_DISPLAY_THUMBNAIL_HEIGHT', '50', 'Enter the height for the product image thumbnail. DO NOT enter px or em. <br /><br />(Default value is 50)',".$configuration_group_id.", '20', NULL, NOW(), NULL, NULL),
  (NULL, 'Display & Modify the Product Model Number', 'QUICKUPDATES_MODIFY_MODEL', 'true', 'Enable/Disable display and modifiying the Product Model <br /><br />(Default value = True)', ".$configuration_group_id.", '25', NULL, NOW(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),'),
  (NULL, 'Display & Modify the Product Name',  'QUICKUPDATES_MODIFY_NAME', 'true', 'Enable/Disable display and modifiying the Product Name <br /><br />(Default value = True)',".$configuration_group_id.", '30', NULL, NOW(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),'),
  (NULL, 'Display & Modify the Product Description', 'QUICKUPDATES_MODIFY_DESCRIPTION', 'true', 'Enable/Disable display and modifying the Product Description <br /><br />(Default value = True)', ".$configuration_group_id.", '35', NULL, NOW(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),'),
  (NULL, 'Display & Modify the Product Status', 'QUICKUPDATES_MODIFY_STATUS', 'true', 'Enable/Disable display and modifying the Product Status <br /><br />(Default value = True)',".$configuration_group_id.", '45',  NULL, NOW(), NULL,  'zen_cfg_select_option(array(\"true\", \"false\"),'),
  (NULL, 'Display & Modify the Product Weight', 'QUICKUPDATES_MODIFY_WEIGHT', 'true', 'Enable/Disable display and modifiying the Product Weight <br /><br />(Default value = True)',".$configuration_group_id.", '50',  NULL, NOW(), NULL,  'zen_cfg_select_option(array(\"true\", \"false\"),'),
  (NULL, 'Display & Modify the Product Inventory Quantity', 'QUICKUPDATES_MODIFY_QUANTITY', 'true', 'Enable/Disable display and modifiying the Product Inventory Quantity <br /><br />(Default value = True)',".$configuration_group_id.", '55',  NULL, NOW(), NULL,  'zen_cfg_select_option(array(\"true\", \"false\"),'),
  (NULL, 'Display & Modify the Product Manufacturer', 'QUICKUPDATES_MODIFY_MANUFACTURER', 'false', 'Enable/Disable display and modifiying the Product Manufacturer <br /><br />(Default value = False)', ".$configuration_group_id.", '60',  NULL, NOW(), NULL,  'zen_cfg_select_option(array(\"true\", \"false\"),'),
  (NULL, 'Display & Modify the Product Tax Class', 'QUICKUPDATES_MODIFY_TAX', 'false', 'Enable/Disable display and modifiying the Product Tax Class <br /><br />(Default value = False)', ".$configuration_group_id.", '65', NULL, NOW(), NULL,  'zen_cfg_select_option(array(\"true\", \"false\"),'),
  (NULL, 'Display & Modify the Product Category', 'QUICKUPDATES_MODIFY_CATEGORY', 'true',  'Enable/Disable display and modifiying the Product Category <br /><br />(Default value = True)',".$configuration_group_id.", '70', NULL, NOW(), NULL,  'zen_cfg_select_option(array(\"true\", \"false\"),'),
  (NULL, 'Display & Modify the Product Sort Order', 'QUICKUPDATES_MODIFY_SORT_ORDER', 'true', 'Enable/Disable display and modifiying of the products sort order <br /><br />(Default value = True)',".$configuration_group_id.", '75', NULL, NOW(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),'),
  (NULL, 'Activate Display of Product Price with Tax Included on Hover',  'QUICKUPDATES_DISPLAY_TVA_OVER', 'false', 'Enable/Disable the display of the product price with all tax included when you hover your mouse over a product <br /><br />(Default value = False)', ".$configuration_group_id.", '80', NULL, NOW(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),'),
  (NULL, 'Display Link to Product Info Page',  'QUICKUPDATES_DISPLAY_PREVIEW','false', 'Enable/Disable the display of the link to the products info page. Product info page will open in a new window/tab. <br /><br />(Default value = False)', ".$configuration_group_id.", '85', NULL, NOW(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),'),
  (NULL, 'Display & Modify Product Attribute Prices',  'QUICK_UPDATES_MODIFY_PRODUCT_ATTRIBUTES_PRICE','true', 'Enable/Disable the display and modifying the Product Attribute Prices. <br /><br />(Default value = True)', ".$configuration_group_id.", '90', NULL, NOW(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),'),
  (NULL, 'Display Link to Product Edit Page', 'QUICKUPDATES_DISPLAY_EDIT','true','Enable/Disable the display of the link to the product edit page. Product edit page will open in a new window/tab. <br /><br />(Default value = True)', ".$configuration_group_id.", '95', NULL, NOW(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),'),
  (NULL, 'Activate/Deactivate Commercial Margin',  'QUICKUPDATES_ACTIVATE_COMMERCIAL_MARGIN', 'true','Do you want that the commercial margin functions to be activated? <br /><br />(Default value = True)',".$configuration_group_id.", '95', NULL, NOW(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),')");


}
