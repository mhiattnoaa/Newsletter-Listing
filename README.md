# Newsletter Listing for The Newsletter Plugin
Newsletter Listing for The Newsletter Plugin for WordPress

Author: [Melissa Hiatt](mailto:melissa.hiatt@noaa.gov)

Plugin: [The Newsletter Plugin](https://www.thenewsletterplugin.com/) 

The Newsletter Plugin currently does not have a way to automatically list published/sent newsletters. This is php script that will pull published newsletters on your WordPress site via a shortcode.
Feel free to modify as you see fit for your application.

The script uses on the WordPress REST API endpoint, with a JSON output.

Instructions
----------

1. This script will only work if you have the Newsletter API installed and activated on your site.
You can install this through the Addons Manager in the "Tools" section. For more documentation see:
https://www.thenewsletterplugin.com/documentation/developers/newsletter-api-2-authentication/

3. Copy and paste the newsletterPluginListing.php code into WPCode or your preferred coding plugin and set it to run on the frontend or specific to a page

4. Insert the shortcode [newsletterList] to display the 10 most recent newsletters or see the attributes below to customize the output.

Attributes
--------- 
 __per_page__
 
*Integer* - Number of items per page. eg [newsletterList per_page=5] will show five listings. Defaults to 10.
 
 __page__
 
*Integer* - Current page to show. eg. [newsletterList per_page=5 page=2] will show the 6th-10th latest newsletters. Defaults to 1.

__year__

*Boolean - true | false* - Separates the newsletters by year. eg. [newsletterList year="true"] Defaults to false.


Notes
--------
The basic output is a list. You will need to edit your CSS to match your theme.
If "year" is selected. The list will be wrapped in a <div> container.


HTML Output
--------

With year="false"

```html
<ul class="newsletter_list">
 <li><a href="https://oceanacidification.noaa.gov/na?id=7" target="_blank">OAP Ocean Outlook - Summer 2025 Newsletter</a></li>
 <li><a href="https://oceanacidification.noaa.gov/na?id=4" target="_blank">OAP Ocean Outlook - Spring 2025 Newsletter</a></li>
 <li><a href="https://oceanacidification.noaa.gov/na?id=2" target="_blank">OAP Ocean Outlook - Fall 2024 Newsletter</a></li>
</ul>
```

With year="true"

```html
<div class="newsletter_year">
 <h3>2025</h3>
 <ul class="newsletter_list">
  <li><a href="https://oceanacidification.noaa.gov/na?id=7" target="_blank">OAP Ocean Outlook - Summer 2025 Newsletter</a></li>
  <li><a href="https://oceanacidification.noaa.gov/na?id=4" target="_blank">OAP Ocean Outlook - Spring 2025 Newsletter</a></li>
</ul>
</div>
<div class="newsletter_year">
 <h3>2024</h3>
 <ul class="newsletter_list">
  <li><a href="https://oceanacidification.noaa.gov/na?id=2" target="_blank">OAP Ocean Outlook - Fall 2024 Newsletter</a></li>
 </ul>
</div>
```



