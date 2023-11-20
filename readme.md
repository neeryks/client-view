# WordPress Client View Plugin

This WordPress plugin, named "Client View," allows you to view data from the 'form_data' database table on the WordPress dashboard with pagination.

## Installation

1. **Download the plugin zip file.**
2. **Upload the zip file via the WordPress admin dashboard or extract it into your WordPress plugins directory.**

## Plugin Details

- **Plugin Name:** Client View
- **Description:** View data from the 'form_data' database table on the WordPress dashboard with pagination.
- **Version:** 1.3
- **Author:** Akashdeep Singh

## Usage

1. **Accessing Client View:**
   - Once the plugin is activated, a new menu item "Client View" will appear in the WordPress admin dashboard.

2. **Client Data Display:**
   - Clicking on "Client View" will display a table containing the data from the 'form_data' database table.
   - The data is displayed in a paginated table format, with 10 records per page.

3. **Table Columns:**
   - The table includes the following columns: ID, First Name, Last Name, Email, Company Name, Job Title, Country, Message.

4. **Pagination:**
   - If the total number of records exceeds 10, pagination links will appear at the bottom of the table for easy navigation.

## Code Overview

The plugin consists of two main functions:

1. **`display_client_data()`**
   - Fetches data from the 'form_data' table using WordPress `$wpdb` class.
   - Displays the data in a formatted table on the WordPress admin dashboard.
   - Implements pagination for easy navigation through records.

2. **`add_client_menu_page()`**
   - Adds a menu page to the WordPress admin dashboard titled "Client View."
   - Calls the `display_client_data()` function to display data when the menu page is accessed.

## Note

- Ensure that the 'form_data' table exists in your WordPress database, and it contains the required columns.
- This plugin assumes the existence of a 'form_data' table with columns: ID, First Name, Last Name, Email, Company Name, Job Title, Country, Message.

Feel free to customize the plugin according to your specific database structure and requirements.

**Happy exploring your client data on the WordPress dashboard!**
