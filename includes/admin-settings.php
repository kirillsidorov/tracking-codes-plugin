<?php
// Add admin menu
function tracking_codes_add_admin_menu() {
    add_options_page(
        'Tracking Codes Settings',
        'Tracking Codes',
        'manage_options',
        'tracking-codes',
        'tracking_codes_settings_page'
    );
}

// Render settings page
function tracking_codes_settings_page() {
    ?>
    <div class="wrap">
        <h1>Tracking Codes Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('tracking_codes_settings_group');
            do_settings_sections('tracking-codes');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Register settings
function tracking_codes_register_settings() {
    register_setting('tracking_codes_settings_group', 'tracking_codes_settings');

    add_settings_section(
        'tracking_codes_section',
        'Tracking Codes',
        null,
        'tracking-codes'
    );

    $fields = [
        'ga4' => 'Google Analytics 4 (GA4) ID',
        'gtm' => 'Google Tag Manager (GTM) ID',
        'facebook_ads' => 'Facebook Ads Pixel ID',
        'google_ads' => 'Google Ads Conversion ID',
        'microsoft_ads' => 'Microsoft Ads Tracking ID',
        'ahrefs_analytics' => 'Ahrefs Web Analytics ID',
    ];

    foreach ($fields as $key => $label) {
        // Input field for the ID
        add_settings_field(
            $key,
            $label,
            function () use ($key, $label) {
                $options = get_option('tracking_codes_settings');
                $id_value = isset($options[$key]) ? esc_attr($options[$key]) : '';
                $enabled = isset($options[$key . '_enabled']) && $options[$key . '_enabled'] == 'on';

                // Text input for the ID
                echo "<input type='text' name='tracking_codes_settings[$key]' value='$id_value' class='regular-text'>";

                // Checkbox to enable/disable
                echo "<label style='margin-left: 10px;'>
                        <input type='checkbox' name='tracking_codes_settings[$key" . "_enabled]' " . ($enabled ? 'checked' : '') . ">
                        Enable
                      </label>";
            },
            'tracking-codes',
            'tracking_codes_section'
        );
    }
}
add_action('admin_init', 'tracking_codes_register_settings');
