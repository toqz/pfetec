=== eCommerce Feeder ===
Contributors: analogrithems
Donate link: http://www.analogrithems.com/rant/portfolio/wordpress-ecommerce-data-feeder/
Tags: WP eCommerce, Migration Tools, Import, Export
Requires at least: 3.2.1
Tested up to: 3.3.1
Stable tag: trunk

WP eCommerce Feeder plugin used to import and export data for products, customers and order history.

== Description ==

This is a plugin for Wordpress e-Commerce <http://getshopped.org/>

It provides some advanced functionality to really help people get up and going quickly with Wordpress eCommerce. It allows you to do mass imports of products, users and orders.  Or perhaps you want to pull the data back out.  Well the export can do that for you.  You have the choice of working with any of the following formats
	* CSV
	* XML
	* SQL


This plugin has many uses such as migrating from an old outdated ecommerce cart like oscommerce or zencart over to Wordpress ecommerce.
This plugin even implements RPC XML so you can access your orders, products and user information via a nice easy to use XML api.
New API’s are being added to support common Order Management Solutions.  If you have an order management system you would like integrated with Wordpress ecommerce be sure to contact be at the site below.
See the full documentation at http://www.analogrithems.com/rant/portfolio/wordpress-ecommerce-data-feeder/

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload `ecommerce-feeder` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= Where is the program? =

Look under Tools in the Dashboard for eCommerce Feeder.

= What is the format for the CSV, XML, SQL etc? =

See http://www.analogrithems.com/rant/portfolio/wordpress-ecommerce-data-feeder/  
it has information on the formats, field names & column headings

= Something is not working what do I do? =
www.analogrithems.com/rant/forums/topic/ecommerce-feeder/


== Screenshots ==

1. The simple clean interface located under Tools

== Changelog ==

= 0.3.5 =
* Another attempt to correct UTF 8 issues
* Updated category code to make it work with more than one category like images and tags

= 0.3.4 =
* Update users import to filter non-utf8 data and give proper responses to imorter job
* Fixed limit on user import to respect ajax lumping

= 0.3.3 =
* Fixed bug with non-UTF8 data breaking imports

= 0.3.2 =
* Updated to support new WP 3.3 changes and fixed a variant bug

= 0.1 =
* Inital version allows for XML, CSV SQL import.  XML & CSV export


