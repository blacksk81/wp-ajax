
	// after switch activa el hook al activar el tema
	add_action('after_switch_theme', 'feed_back_datebase');

	function feed_back_datebase(){

		//variable global
		global $wpdb;

		//buscar en functions define
		$table_feed = SITE_RATING_TABLE_FEED;

		// se agrega en ajax.php como get_option 1.1
		update_option('theme_table_feed', $tabla_feed);

		//crea la tabla con sus campos
		$charset_collate = $wpdb->get_charset_collate();
		$sql = "CREATE TABLE $table_feed(
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		busqueda_web varchar(55) not null,
		claridad_web varchar(55) not null,
		gusta_sitio1 varchar(55) not null,
		gusta_sitio2 varchar(55) not null,
		nogusta1 varchar(55) not null,
		nogusta2 varchar(55) not null,
		opinion_feed varchar(55) not null,
		primary key (id)
		) $charset_collate;";

		//Mantelo siempre asi...
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );		


	}
