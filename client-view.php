<?php
/*
Plugin Name: Client View
Description: View data from the 'form_data' database table on the WordPress dashboard with pagination.
Version: 1.3
Author: Akashdeep Singh
*/

function display_client_data() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'form_data';
    $per_page = 10; // Number of records per page
    $page = isset($_GET['page']) ? absint($_GET['page']) : 1;
    $offset = ($page - 1) * $per_page;

    $results = $wpdb->get_results(
        $wpdb->prepare("SELECT * FROM $table_name LIMIT %d OFFSET %d", $per_page, $offset),
        OBJECT
    );

    echo '<div class="wrap">';
    echo '<h2>Client Data</h2>';
    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Company Name</th><th>Job Title</th><th>Country</th><th>Message</th></tr></thead>';
    echo '<tbody>';

    foreach ($results as $row) {
        echo '<tr>';
        echo '<td>' . esc_html($row->id) . '</td>';
        echo '<td>' . esc_html($row->first_name) . '</td>';
        echo '<td>' . esc_html($row->last_name) . '</td>';
        echo '<td>' . esc_html($row->email) . '</td>';
        echo '<td>' . esc_html($row->company_name) . '</td>';
        echo '<td>' . esc_html($row->job_title) . '</td>';
        echo '<td>' . esc_html($row->country) . '</td>';
        echo '<td>' . esc_html($row->message) . '</td>';
        echo '</tr>';
    }

    echo '</tbody></table>';
    echo '</div>';

    // Pagination
    $total_rows = $wpdb->get_var("SELECT COUNT(*) FROM $table_name");
    $total_pages = ceil($total_rows / $per_page);

    if ($total_pages > 1) {
        echo '<div class="pagination">';
        echo paginate_links(array(
            'base' => add_query_arg('page', '%#%'),
            'format' => '',
            'prev_text' => __('&laquo; Previous'),
            'next_text' => __('Next &raquo;'),
            'total' => $total_pages,
            'current' => $page,
        ));
        echo '</div>';
    }
}

function add_client_menu_page() {
    add_menu_page(
        'Client View',
        'Client View',
        'manage_options',
        'client-view',
        'display_client_data'
    );
}

add_action('admin_menu', 'add_client_menu_page');
