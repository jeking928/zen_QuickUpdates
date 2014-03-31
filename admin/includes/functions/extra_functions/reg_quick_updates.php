<?php
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}
// Remove old Quick Updates Admin page registration. Corrected page registration follows 
// (note the spaces and sentance format are replaced with the proper page_key format)
    zen_deregister_admin_pages('Quick Updates');

if (function_exists('zen_register_admin_page')) {
    if (!zen_page_key_exists('quick_updates_catalog')) {
        zen_register_admin_page('quick_updates_catalog', 'BOX_CATALOG_QUICK_UPDATES','FILENAME_QUICK_UPDATES', '', 'catalog', 'Y', 104);
    }
}
?>