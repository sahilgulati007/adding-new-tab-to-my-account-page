add_action('p18a_request_front', function(){

                $additionalurl = "OBLIGO?\$select=ORD_DEBIT,DOC_DEBIT,ACC_DEBIT,CHEQUE_DEBIT,CREDIT,MAX_CREDIT,CREDIT_REST,OBLIGO,MAX_OBLIGO,OBLIGO_REST&\$filter=CUSTNAME eq '000168'";

                $response = $this->makeRequest("GET", $additionalurl, $args, true);
                $data = json_decode($response['body']);
                echo "<table>";
                foreach ($data->value as $key => $value){
                	foreach ($value as $key1 => $value1){
	                	echo "<tr>";
	                	echo "<td>".$key1."</td><td>".$value1."</td>";
	                 echo "</tr>";
             		}
                }
                echo "</table>";

            });

            
            
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
                do_action('p18a_request_front');?>

                </div>

                <?php
                
            });
