Contribution:  Quick Updates
Original Author: Paul Mathot (paulm @ zen-cart.com/forum)
Updated by: C Jones (overthehillweb.com)
Download: http://www.zen-cart.com/downloads.php?do=file&id=26

License: under the GPL - See attached License for info.
Support Thread: http://www.zen-cart.com/showthread.php?41886-Quick-Updates-plugin-support
Origninal osCommerce contribution by : by Mathieu (contact@mathieueylert.com)
Converted by : www.portali.co.nz
Cleared by: Andrew Berezin andrew@eCommerce-service.com

- V2.07 IS NOT backwards compatible. (Requires Zen Cart v1.5.x)

========================================================

WHAT DOES THIS MODULE DO?

Quick Updates is an administration component for the Zencart eCommerce system. 
It enables you to edit and update multiple products via one screen. 

Features include: 

- Presents all of your products and prices into a "form" which is then updatable all in one go. 
- Allows you to select products based on Category or Manufacturer. 
- Allows you to globally increase or decrease the price for a range of products. 
- Preview the changes before committing 
- Configuration options to select which fields to display on the form
- Allows you to copy products very quickly
========================================================

FILES TO OVER-RIDE

none

========================================================

File Modifications:

None.

========================================================

Database Modifications:

New configuration entries added to the zen_configuration table if you want 
to be able to edit which fields are displayed.

========================================================

INSTALLATION:
1. Rename the "YOUR_ADMIN" folder to match the name of your admin folder
2. Copy/FTP the files and directories in the zencart_root folder to the root of 
   your Zen Cart installation, making sure to preserve the file structure.
2. Go to "Catalog->Quick Updates" in your Zen Cart administration area. 
   Click the "Install" link at top of screen.

========================================================

UPGRADE FROM V2.06 TO V2.07:
1. Go to "Catalog->Quick Updates" in your Zen Cart administration area.
2. Click the uninstall link
3. Rename the "YOUR_ADMIN" folder to match the name of your admin folder
4. Copy/FTP the v2.07 files and directories in the zencart_root folder to the root of 
   your Zen Cart installation, making sure to preserve the file structure.
5. Delete the following files:
	~ YOUR_ADMIN\includes\extra_datafiles\quick_updates.php
	~ YOUR_ADMIN\includes\languages\english\extra_definitions\quick_updates.php
	~ YOUR_ADMIN\includes\boxes\extra_boxes\quick_update_catalog_dhtml.php
6. Go to "Catalog->Quick Updates" in your Zen Cart administration area.
7. Click the "Install" link at top of screen.

========================================================

USAGE:
1) Always backup your database before doing any updates!

2) Just try it

========================================================

NOTES:
1) Also take a look at admin/includes/extra_configures/quick_updates.php, some setting have been added to this (some of which should be moved to the admin some day..)

2) The CSS Popups do not work well in IE6, and probably never will. It's caused by IE6 bugs\flaws. If you think you really *have* to use IE6 for some reason you probably better switch "Use popup edit" to false (quick_updates admin setting).
The recommended browser to use is Firefox. But I have done a quick test with IE7, and the CSS popups seems to look ok in IE7 as well.

3) To make the products_purchase_price and margin feature work "products_purchase_price" (i.e. DECIMAL 15,4) and "products_margin" (i.e. DECIMAL 15,2) need to be added to your products tabel.

KNOWN BUGS:
(C Jones 11-29-2013) While making the v2.07 changes/updates, a few things that need addressing with this module were discovered. I can't address/fix these items (above my skill level to fix), but they are worth noting here.
    1. The popup edit feature is nice, but possibly over engineered.. The display of the store side view product description is wholly unnecessary IMHO. a simply edit button to open the popup window is really all that's needed for this feature.. Even IF the store side view of the product description is a feature that most users desire, it should be an admin configurable item to turn on/off the product description display AND it needs work as it certainly doesn't work consistently in my testing.. MANY of my clients product descriptions when the popup edit feature is turned on either did not display at all or only partially displayed.. (for example the last line of the product description is the ONLY thing you see) I won't even begin to cover the CSS conflicts that occur because of classes and IDs from the product description sharing the same names as this mods classes and IDs..
    2. The editor dropdown doesn't work.. In my testing, it defaults to CKEditor (my client's default editor), yet the editor doesn't render for the product description field (which is where I'd expect to see it). Tried forcing the editor change by changing to the text editor and then changing back to CK Editor.. still no dice..
    3. The back button on the product preview page SHOULD return you back to the Quick Updates product list.. Instead you are returned to the catalog product list.. 

FEATURES THAT ARE NOT WELL DOCUMENTED:
I know that if I want to do a mass price increase that I have to activate the "Activate/Deactivate Commercial Margin". However this setting appears to do more, and it is not clear on what that is.. NO WHERE in this documentation is it clear what the "commercial margin" feature is or what it is supposed to "do". The help tip when I hover over the information icon in the UI shows this tip:
"Modify by commercial margin, if you check this box, your products will be stroked at the rates given. To stroke to 25%, means that the price is marked up of 33%"

The readme cryptically states:
"3) To make the products_purchase_price and margin feature work "products_purchase_price" (i.e. DECIMAL 15,4) and "products_margin" (i.e. DECIMAL 15,2) need to be added to your products tabel."

What EXACTLY does this all mean?? What is the purpose of this feature?? 

There is also code which appears to support wholesale pricing fields and NO WHERE in this readme is this functionality explained.
========================================================

History:
v2.07 by C Jones (overthehillweb.com)
~ Fixed the installer files and corrected the admin page registration code.
~ Correct typos, inconsistent punctuation, inconsistent capitalization usage, and the use of some very awkward grammar in the admin config settings
~ Re-ordered some of the configuration items to a more logical order (for example: moved the popup description edit next to the description on/off setting)
~ Added better instructions in the configuration setting for the popup edit to WARN shopowners that you should not activate the popup edit without activating the description display. (activating one without the other shifts the column headings so they do not match the data column)
~ There is a missing heading column when the description is turned off. Fixed code so that the column headings correctly display when the description display setting is set to false (last column heading is missing)
~ Dropped ALL support for Zen Cart v1.3.x. If you are running versions of Zen Cart prior to v1.5.x, you should install v2.06a
~ LOTS of cleanup of the look of the layout as follows:
    + Fixed the product description layout so it STOPS pushing the entire layout off the screen (there is a no-wrap style in the stylesheet)
    + Removed hardcoded text alignment from EVERYWHERE (if needed text alignment/layout/styling should be done in the stylesheet)..
      frankly all of that hardcoded text centering did not look good and made the overall layout look dated
    + Removed a LOT of odd settings from the stylesheet (right alignment of the product description input field for example WTH???)
    + Added IDs and classes to support some of the layout corrections I made 

v2.06a by Chadderuski
added missing popup_text_edit.php

v2.06 by Chadderuski
Updated to support zencart 1.5. Added functions to automatically register admin pages and configuration pages.


v2.05 by Francois de Wet
Fixed quick_updates.php & includes\extra_configures\quick_updates.php to point correctly to the online catelog

quick_updates.php Line 794:

Changed DIR_WS_CATALOG to DIR_WS_CATALOG_IMAGES

includes\extra_configures\quick_updates.php Line 12:

Changed DIR_WS_CATALOG to HTTP_CATALOG_SERVER . DIR_WS_CATALOG

v2.04 by Paul Mathot
moved zen_get_category_tree from while loop (saving lots and lots of queries, depending on circumstances)

open admin/quick_updates.php for editting and:

replace all (2 instances?):
zen_get_category_tree()

by:
$quick_updates_category_tree

and after:
// eof get manufacturers

add:
// bof get category_tree
$quick_updates_category_tree = zen_get_category_tree();
// eof get category_tree

v2.03 by Paul Mathot

a) Concerning the products copier and invalid (non existing) products:

1)includes/functions/extra_fucntions/quick_copy.php
Added basic protection to the quick copy function so it wont copy invalid products (exit() on invalid id)

2) Changed admin/quick_updates.php 
Now it will show an error message when trying to copy an invalid product. And if the default "Copy product" is set to an invalid products_id the copier dropdown wont show this invalid product as option anymore

b) Other fixes:

1) Corrected view/edit link to show correct cPath (minor issue, admin/quick_updates.php)
2) Corrected spelling error in sql file (should have been corrected before, but somehow it slipped back??). Only use this updated sql file if the thumbnails don't show even if enabled in the quick updtes settings.
3) Corrected sort by manufacturer (now sorts on manufacturers_name i.s.o. manufacturers_id)
4) added QUICKUPDATES_MODIFY_PURCHASE_AND_MARGIN definition to configure file (admin/includes/extra_configures/quick_updates.php)

v2.0 by Paul Mathot
1) Renamed version to 2.0
2) Added links to products_price_manager.php for each product
3) Fixed several issues with "Value or rate" markup feature.
4) Removed the need to send $_POST['update_price'][] = 'yes' on every price update

Changed files (since november-27th version):
admin\quick_updates.php
admin\includes\stylesheet_quick_updates.css
admin\includes\languages\english\quick_updates.php

(no sql changes)

v-november-27th-2006 by Paul Mathot
1) converted all remaining <inputs> to zen_draw_input_field()'s
2) added quotes to database input/update fields (script crashed on comma input)
3) moved some config settings from admin/quick_updates to config files (to extra_configures/ and extra_datafiles/)

Note: some configures should actually be moved to the quick_updates admin settings sql in a next version.

Changed files (since the november-25th version) are:

admin/quick_updates.php
admin/includes/extra_configures/quick_updates.php
admin/includes/extra_datafiles/quick_updates.php

(so no sql changes again)

v-november-19th-2006 by Paul Mathot
1) New fix for categories issues. Added quick master_categories_id updates.
2) Several small fixes
3) Saves page number (in some cases)
4) Added links to products_to_categories.php manager
(to update overwrite your old files, no changes to the sql since previous version)

v-november-16th-2006 by Paul Mathot
1) Added column for wholesale price (= totally untested!)
2) Added quick copy: quickly copy one or more products as new products, and one click repeated copy.
3) Fixed multilinked categories problems and main_categories_id issue. 
4) And added link to products_to_categories
5) Fixed page dropdown selection
6) Several other changes and code fixes
(to update overwrite your old files, no changes to the sql since previous version)

v-oktober18th-2006 by Paul Mathot
Added link to shop in products_id column (does not support products_type yet)

(look for QUICKUPDATES_DISPLAY_ID_INFO in code)

2006-10-18: Updated by Paul Mathot

1) Improved margin calculation feature (margin is updated by price ex and price inc, as well as by purchase price now).

2) Added CSS popup for products description (and modified code so that the normal descriptions are hidden when the editor popup feature is enabled).
(Tmho the descriptions do not need to be visible in that case, and displaying the descriptions clutters the screen)

3) Moved CSS, and js for tax and margin calculations, to separate files.

4) Added zen_update_price() function, to fix price sorting

5) Made products price for products with special price editable (was disabled), and added color to the input fields as "Specials" warning.

6) Colored "margin" input backgound light gray, to indicate that it's not ment for editting (disabling the field would interfere with updating it).

Note: Tested in Firefox only (but I hope/think it will work fine in IE too). 

v1.3.6 13.10.2006 5:03
1. Rename files:
/admin/includes/extra_datafiles/qucik_updates_filenames.php -> /admin/includes/extra_datafiles/quick_updates.php
/admin/includes/languages/english/extra_definitions/quick_update_english.php -> /admin/includes/languages/english/extra_definitions/quick_update.php
2. Add some edit features;
3. Add sort order column.

v"1.5"  Paul Mathot www.zen-cart.nl & www.beterelektro.nl

1.) Added purchase price and margin (commented with "// added for products_purchase_price and margin")
To make this products_purchase_price feature work "products_purchase_price" (i.e. DECIMAL 15,4) and "products_margin" (i.e. DECIMAL 15,2) need to be added to your products tabel.
The margin is calculated by js, and stored to the database (enables sorting on margin).

2.) Moved several inline styles and depricated styling to in document CSS

3.) Several minor corrections  

// bof v1.4 2006.09.21 Paul Mathot www.zen-cart.nl & www.beterelektro.nl

Added code to calculate prices on price including tax (javascript upgraded for calculations on products_id by Joop Buis The Netherlands)
+Some minor corrections

Also added preparations (so it is not functional yet!) for adding purchase price and margin (commented with "// add for products_purchase_price and margin")
To make this products_purchase_price feature work at least "products_purchase_price" and "products_margin" need to be added to your products tabel, and outcommented lines in the code need to be enabled by removing the comment tags.
// eof v1.4

v1.3.3 04.09.2006 18:15 Andrew Berezin andrew@eCommerce-service.com
Add Category Modify
v1.3.2 31.08.2006 16:52 Andrew Berezin andrew@eCommerce-service.com
Add:
Display Products ID
Display Products Trumbnail
v1.3.1 22.08.2006 19:16 Andrew Berezin andrew@eCommerce-service.com

01FEB2005 - Initial Release
31MAR2005 - Changed to utilise Zencart 1.2.4 overrides.
Version 1.2
Portali - shane.gibson@portali.co.nz
Merlin - merlin@realm-of-merlin.com
Version 1.1
Portali - shane.gibson@portali.co.nz
Version 1.0
Portali - shane.gibson@portali.co.nz
Original osCommerce
   v2.0 Released under the GNU General Public License
     by GniDhal (fx@geniehalles.com)
     from an original script contributed by Burt (burt@xwww.co.uk)
         and by Henri Bredehoeft (hrb@nermica.net)
   v2.1 Released under the GNU General Public License
     by GniDhal (fx@geniehalles.com)
   v2.2 by Mathieu (contact@mathieueylert.com)
   v2.3 by Mathieu (contact@mathieueylert.com)
   v2.4 by Mathieu (contact@mathieueylert.com)
   v2.4 repack by pcwehle (info@pcwehle.de)
   v2.5 repack by Expert (expert@imeyil.com)