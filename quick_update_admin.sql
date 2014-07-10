SELECT @t4:=configuration_group_id 
FROM configuration_group
WHERE configuration_group_title= 'Quick Updates';
DELETE FROM configuration WHERE configuration_group_id = @t4;
DELETE FROM configuration_group WHERE configuration_group_id = @t4;

INSERT INTO configuration_group (configuration_group_title, configuration_group_description, sort_order, visible) VALUES 
('Quick Updates', 'Set Quick Updates Options', '1', '1');

UPDATE configuration_group SET sort_order = last_insert_id() WHERE configuration_group_id = last_insert_id();

SELECT @t4:=configuration_group_id
FROM configuration_group
WHERE configuration_group_title= 'Quick Updates';

INSERT INTO configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES
('Display the Product ID','QUICKUPDATES_DISPLAY_ID','true','Enable/Disable displaying the Product ID <br /><br />(Default value = True)', @t4, 5, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
('Display the Product Thumbnail','QUICKUPDATES_DISPLAY_THUMBNAIL','true','Enable/Disable displaying the Product Thumbnail <br /><br />(Default value = True)', @t4, 10, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
('Set Thumbnail Width','QUICKUPDATES_DISPLAY_THUMBNAIL_WIDTH','50','Enter the width for the product image thumbnail. DO NOT enter px or em. <br /><br />(Default value is 50)',@t4,15, NOW(), NOW(), NULL, NULL),
('Set Thumbnail Height','QUICKUPDATES_DISPLAY_THUMBNAIL_HEIGHT','50','Enter the height for the product image thumbnail. DO NOT enter px or em. <br /><br />(Default value is 50)',@t4,20, NOW(), NOW(), NULL, NULL),
('Display & Modify the Product Model Number','QUICKUPDATES_MODIFY_MODEL','true','Enable/Disable display and modifiying the Product Model <br /><br />(Default value = True)', @t4, 25, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
('Display & Modify the Product Name','QUICKUPDATES_MODIFY_NAME','true','Enable/Disable display and modifiying the Product Name <br /><br />(Default value = True)', @t4, 30, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
('Display & Modify the Product Description','QUICKUPDATES_MODIFY_DESCRIPTION','true','Enable/Disable display and modifying the Product Description <br /><br />(Default value = True)',@t4,35,NULL,'2013-11-30 09:22:31',NULL,'zen_cfg_select_option(array(\"true\", \"false\"),','General'),
('Activate Product Description Popup Edit','QUICKUPDATES_MODIFY_DESCRIPTION_POPUP','false','Enable/Disable using popup edit link to edit product description. <br /><br />You MUST enable the product description display for this feature to work and display correctly. <br /><br />(Default value = False)',@t4,40,NULL,'2013-11-30 09:22:31',NULL,'zen_cfg_select_option(array(\"true\", \"false\"),','General'),
('Display & Modify the Product Status','QUICKUPDATES_MODIFY_STATUS','true','Enable/Disable display and modifying the Product Status <br /><br />(Default value = True)', @t4, 45, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
('Display & Modify the Product Weight','QUICKUPDATES_MODIFY_WEIGHT','true','Enable/Disable display and modifiying the Product Weight <br /><br />(Default value = True)', @t4, 50, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
('Display & Modify the Product Inventory Quantity','QUICKUPDATES_MODIFY_QUANTITY','true','Enable/Disable display and modifiying the Product Inventory Quantity <br /><br />(Default value = True)', @t4, 55, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
('Display & Modify the Product Manufacturer','QUICKUPDATES_MODIFY_MANUFACTURER','false','Enable/Disable display and modifiying the Product Manufacturer <br /><br />(Default value = False)', @t4, 60, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
('Display & Modify the Product Tax Class','QUICKUPDATES_MODIFY_TAX','false','Enable/Disable display and modifiying the Product Tax Class <br /><br />(Default value = False)', @t4,65 NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
('Display & Modify the Product Category','QUICKUPDATES_MODIFY_CATEGORY','true','Enable/Disable display and modifiying the Product Category <br /><br />(Default value = True)',@t4, 70, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
('Display & Modify the Product Sort Order','QUICKUPDATES_MODIFY_SORT_ORDER','true','Enable/Disable display and modifiying of the products sort order <br /><br />(Default value = True)',@t4, 75, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
('Activate Display of Product Price with Tax Included on Hover','QUICKUPDATES_DISPLAY_TVA_OVER','false','Enable/Disable the display of the product price with all tax included when you hover your mouse over a product <br /><br />(Default value = False)',@t4, 80, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
('Display Link to Product Info Page','QUICKUPDATES_DISPLAY_PREVIEW','false','Enable/Disable the display of the link to the products info page. Product info page will open in a new window/tab. <br /><br />(Default value = False)', @t4, 85, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
('Display Link to Product Edit Page','QUICKUPDATES_DISPLAY_EDIT','true','Enable/Disable the display of the link to the product edit page. Product edit page will open in a new window/tab. <br /><br />(Default value = True)', @t4, 90, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),'),
('Activate/Deactivate Commercial Margin','QUICKUPDATES_ACTIVATE_COMMERCIAL_MARGIN','true','Do you want that the commercial margin functions to be activated? <br /><br />(Default value = True)', @t4, 95, NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),');

INSERT  into zen_admin_pages (page_key,language_key,main_page,page_params,menu_key,display_on_menu,sort_order) VALUES 
('quick_updates_config','BOX_CONFIGURATION_QUICK_UPDATES','FILENAME_CONFIGURATION',CONCAT('gID=',@t4),'configuration','Y',104),
('quick_updates_catalog','BOX_CATALOG_QUICK_UPDATES','FILENAME_QUICK_UPDATES','','catalog','Y',105),
('quick_updates_popup_file_select','BOX_CATALOG_QUICK_UPDATES_POPUP_FS', 'FILENAME_POPUP_FILE_SELECT','', 'catalog', 'N',106),
('quick_updates_popup_text_edit','BOX_CATALOG_QUICK_UPDATES_POPUP_TE', 'FILENAME_POPUP_TEXT_EDIT','', 'catalog', 'N',107);