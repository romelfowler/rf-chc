<?php  /*
<pre>
    <?php
    $aa = get_option('theme_mods_eightmedi-pro');
    $aa = serialize($aa);
    $aa = base64_encode($aa);
    var_dump($aa);

    ?>
</pre>

<pre>
    <?php
    $aa = get_option('sidebars_widgets');
    $aa = serialize($aa);
    $aa = base64_encode($aa);
    var_dump($aa);

    ?>
</pre>

<pre>
    <?php
    global $wpdb;
    $results = $wpdb->get_results( 'SELECT * FROM `sdgwp_options` WHERE `option_name` LIKE "widget_%"' );
    
    $aaa = serialize($results);
    
    $all_sidebar_widget_code = base64_encode($aaa);
    var_dump($all_sidebar_widget_code);

    ?>
</pre>
<?php */
?>