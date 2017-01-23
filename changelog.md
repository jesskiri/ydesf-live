# Deborah Changelog

## 1.1.2 - 26 Nov 2014
* Added strings to text domain for translation  
* Fixed bug in text domain designation  
* Removed unused files    

### Files Modified
* /style.css (version number only)  
* /style-rtl.css (version number only)  
* /languages/deborah.pot  
* /languages/en_US.po  
* /langueges/en_US.mo  
* /lib/admin/deborah-theme-settings.php  
* /lib/metabox/ (unused directory and files removed)  
* /lib/structure/header.php  
* /lib/widgets/call-to-action.php  
* /lib/widgets/wsm-featured-page.php  
* /lib/widgets/wsm-featured-post.php  
* /lib/widgets/wsm-sidebar-button.php  

---

## 1.1.1 - 13 Nov 2014
* Bug fix for imported fonts  

### Files Modified
* /style.css  
* /style-rtl.css   

---

## 1.1.0 - 12 November 2014
* Added internationalization (i18n) support by wrapping all front-end facing text strings in a translation function  
* Added text domain in style.css and loaded text domain in functions.php  
* Added .pot file as basis for translations  
* Add .rtl stylesheet to be conditionally enqueued (instead of style.css) when WordPress language is set to an RTL script  

### Files Modified
* /style.css  
* /style-rtl.css (new file added)  
* /functions.php  
* /languages/*.pot (new directory and file added)  

---

## 1.0.5 - 14 Oct 2014
* Fix Gravity Forms placeholder script to work properly with multiple forms on same page
* Fix multiple instances of social icons on product pages

### Files Modified
* /style.css (version number only)
* /exchange/functions.php
* /lib/functions/gforms-placeholder.php

---

## 1.0.4 - 03 Oct 2014
* Fix bug in Gravity Forms Placeholder script
* Update plugin activation code to use remote location for Soliloquy install
* Removed depreciated function in theme update notification
* Mobile Menu bug fix
* Breadcrumb bug fix

### Files Modified
* /style.css (version number only)
* /functions.php
* /lib/functions/gforms-placeholder.php
* lib/functions/mobilemenu.php
* /lib/functions/update.php
* /lib/plugins/plugins.php
* /lib/plugins/class-tgm-plugin-activation.php
* /lib/plugins/packaged/ (dirctory removed)
* /lib/plugins/packaged/soliloquy.zip  (file removed)

---

## 1.0.3 - 05 Sept 2014
* Fix Gravity Forms placeholder script to deconflict with Soliloquy in WordPress 4.0
* Improved cache handling of theme updates
* Update Soliloquy to 2.3.5

### Files Modified
* /style.css (version number only)
* /lib/init.php
* /lib/functions/gforms-placeholder.php
* /lib/plugins/packaged/soliloquy.zip

---

## 1.0.2 - 15 Aug 2014
* Fix typo in Gravity Forms placeholder setting instructions
* Update packaged Soliloquy version to 2.3.4

### Files Modified
* /style.css (version number only)
* /lib/plugins/packaged/soliloquy.zip

---

## 1.0.1 - 12 Jun 2014
* Fix bug created by latest version of The Events Calendar in their Events List widget
* Change for new Soliloquy license key API
* Update packaged Soliloquy version to 2.3.3

### Files Modified
* /style.css
* /lib/init.php
* /lib/plugins/packaged/soliloquy.zip

---

# 1.0.0 03 June 2014
* Initial theme release