// define el nombre que se crea la tabla de la base de datos
  define('SITE_RATING_TABLE_FEED', $wpdb->prefix.'feed_back');
  
  // heme_feedback_form viene del action del script.php 
	// wp_ajax_norpiv = publico
	// wp_ajax_ = priva
	add_action( 'wp_ajax_nopriv_theme_feedback_form', 'ajax_feedback' );
	add_action( 'wp_ajax_theme_feedback_form', 'ajax_feedback' );

	function ajax_feedback ()
	{

		//Si no es local klskdkdkdkdk dsfsef
		if ( ( $_SERVER['SERVER_ADDR'] != '127.0.0.1' ) && ( $_SERVER['SERVER_ADDR'] != '::1' ) ) {
			session_start();//Al ser bbvaGP es necesario para que funcione correctamente
		}

		// las variable reci
		$busqueda_web = intval( $_POST['busqueda_web'] );
		$claridad_web = intval( $_POST['claridad_web'] );
		$gusta_sitio1 = sanitize_text_field( $_POST['gusta_sitio1'] );
		$gusta_sitio2 = sanitize_text_field( $_POST['gusta_sitio2'] );
		$nogusta1 = sanitize_text_field( $_POST['nogusta1'] );
		$nogusta2 = sanitize_text_field( $_POST['nogusta2'] );
		$opinion_feed = sanitize_text_field( $_POST['opinion_feed'] );

		//sanitiza_text_field = para que no deje ejecutar script

		// viene de la table_valoration.php 1.1
		$table_feed = get_option('theme_table_feed');

		global $wpdb;
		$succeses = $wpdb->insert($table_feed, array('busqueda_web'=> $busqueda_web,'claridad_web'=> $claridad_web,'gusta_sitio1'=> $gusta_sitio1,'gusta_sitio2'=> $gusta_sitio2,'nogusta1'=> $nogusta1,'nogusta2'=> $nogusta2,'opinion_feed'=>$opinion_feed), array('%d','%d','%s','%s','%s','%s','%s',));

		wp_send_json($succeses);

	}
