SET @configuration_group_id=0;
SELECT @configuration_group_id:=configuration_group_id
FROM configuration
WHERE configuration_key= 'ZEN_QUICKUPDATES_VERSION'
LIMIT 1;
DELETE FROM configuration WHERE configuration_group_id = @configuration_group_id;
DELETE FROM configuration_group WHERE configuration_group_id = @configuration_group_id;

DELETE FROM admin_pages WHERE page_key = 'quick_updates_catalog';
DELETE FROM admin_pages WHERE page_key = 'quick_updates_config';

