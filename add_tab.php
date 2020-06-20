          
            
            add_action('init', function() {
                add_rewrite_endpoint('Obligo', EP_ROOT | EP_PAGES);
            });
            function my_custom_flush_rewrite_rules() {
				add_rewrite_endpoint( 'Obligo', EP_ROOT | EP_PAGES );
				flush_rewrite_rules();
			}

			register_activation_hook( __FILE__, 'my_custom_flush_rewrite_rules' );
			register_deactivation_hook( __FILE__, 'my_custom_flush_rewrite_rules' );
            add_filter('woocommerce_account_menu_items', function($items) {
                //$logout = $items['customer-logout'];
                //unset($items['customer-logout']);
                $items['Obligo'] = __('Obligo', 'woo');
                //$items['customer-logout'] = $logout;
                return $items;
            });

            add_action('woocommerce_account_Obligo_endpoint', function() {

                 ?>

                <div class="woocommerce-MyAccount-content">

                    <p>Obligo</p>
                    <?php
                do_action('here');?>

                </div>

                <?php
                
            });


https://github.com/woocommerce/woocommerce/wiki/Customising-account-page-tabs
