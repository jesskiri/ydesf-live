# Deborah Changelog

## 1.1.9 - 02 Jan 2017

* CSS fix for Gravity Forms submit button movement  

### Files Modified
* /style.css        

---

## 1.1.7 - 11 Mar 2016

* Change Genesis Simple Sidebar related logic to be compatible with Genesis 2.2.7   

### Files Modified
* /style.css (version number only)    
* /style-rtl.css (version number only)  
* /lib/structure/sidebar.php        

---

## 1.1.6 - 11 Jan 2016

* CSS fix to accomodate WordPress comment form changes   

### Files Modified
* /style.css    
* /style-rtl.css        

---

## 1.1.5 - 14 Dec 2015

* Add Genesis 2.2+ Accessiblity features  
* Fix for update script in some server environments  
* Switch to built-in Geneis mobile viewport tag   

### Files Modified
* /style.css    
* /style-rtl.css   
* /functions.php  
* /languages/*  
* /lib/init.php  
* /lib/functions/update.php       

---

## 1.1.4 - 24 Aug 2015

* Now fully compatible with the WPML plugin  
* Fix for widget compatibility with WordPress 4.3  
* Updated Soliloquy install script  
* Added missing strings to text domain  
* Enable Soliloquy captions on mobile devices   
* Removed unused code and files  
* Various minor bug fixes       

### Files Modified
* /style.css    
* /style-rtl.css   
* /functions.php  
* /wpml-config.xml (new file added)  
* /languages/*  
* /lib/admin/deborah-theme-settings.php  
* /lib/js/modernizr.min.js (file removed)    
* /lib/plugins/class-tgm-plugin-activation.php  
* /lib/plugins/plugin.php  
* /lib/widgets/call-to-action.php  
* /lib/widgets/wsm-featured-page.php  
* /lib/widgets/wsm-featured-post.php  
* /lib/widgets/wsm-sidebar-button.php      

---

## 1.1.3 - 17 July 2015

* Fix for comment form submit button  
* Fix Google font import with SSL  
* Changed comment form for placeholders without script  
* Switched to using new Gravity Forms built-in placeholder method 
* Removed rem units from style sheet for simplicity     

### Files Modified
* /style.css    
* /style-rtl.css   
* /languages/*  
* /lib/init.php  
* /lib/functions/gforms-placeholder.php (file removed)  
* /lib/plugins/class-tgm-plugin-activation.php  
* /lib/plugins/plugin.php  
* /lib/structure/comment-form.php    

---

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
