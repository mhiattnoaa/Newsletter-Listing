# Newsletter Listing
Newsletter Listing for The Newsletter Plugin for WordPress

Author: [Melissa Hiatt](mailto:melissa.hiatt@noaa.gov)

Plugin: [The Newsletter Plugin](https://www.thenewsletterplugin.com/) 

This is a php script that will pull published newsletters from The Newsletter Plugin on your WordPress site via a shortcode.
Feel free to modify as you see fit for your application.

The script uses on the WordPress REST API endpoint, with a JSON output.

Instructions
----------

1. This script will only work if you have the Newsletter API installed and activated on your site.
You can install this through the Addons Manager in the "Tools" section.

2. Copy and paste the newsletterPluginListing.php code into WPCode or your preferred code plugin and set it to run on the frontend or specific to a page

3. Insert the shortcode [newsletterList] to display the 10 most recent newsletters

Attributes
--------- 
 __per_page__
 
*Integer* - Number of items per page. eg [newsletterList per_page=5] will show five listings. Defaults to 10.
 
 __page__
 
*Integer* - Current page to show. eg. [newsletterList per_page=5 page=2] will show the 6th-10th latest newsletters. Defaults to 1.

__year__

*Boolean - true | false* - Separates the newsletters by year. Defaults to false.


Notes
--------
The basic output is a list. You will need to edit your CSS to match your theme.
If "year" is selected. The list will be wrapped in a <div> container.
