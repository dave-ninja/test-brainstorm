<?php

if (!function_exists('ninja_global_vars')) {
	/*
	 * CUSTOM GLOBAL VARIABLES
	 */
	function ninja_global_vars() {
		global $ninja;
		$ninja['tpl_dir']       = get_template_directory();
		$ninja['tpl_dir_uri']   = get_template_directory_uri();
		$ninja['style_dir']     = get_stylesheet_directory();
		$ninja['style_dir_uri'] = get_stylesheet_directory_uri();
		$ninja['upload_dir']    = wp_upload_dir();
		$ninja['home_url']      = get_home_url();

	}

	add_action( 'parse_query', 'ninja_global_vars' );
	/*
	 * USE CUSTOM GLOBAL VARIABLES
	 */
	/*if( $GLOBALS['ninja']['tpl_dir_uri'] ) {

	}*/
}

if (!function_exists('dd')) {
	function dd( ...$data ) {
		foreach ( $data as $item ) {
			echo "<pre style='padding: 0 1rem'>";
			print_r( $item );
			echo "</pre>";
			echo "<hr />";
		}
		wp_die( '/* ------- end dd function ------- */' );
	}
}

if (!function_exists('dump')) {
	function dump( ...$data ) {
		foreach ( $data as $item ) {
			echo "<pre style='padding: 0 1rem'>";
			print_r( $item );
			echo "</pre>";
			echo "<hr />";
		}
	}
}

if (!function_exists('get_youtube_video_id_from_url')) {
	function get_youtube_video_id_from_url( $url ) {
		preg_match( '~watch\?v=([a-zA-Z0-9_-]*)~', $url, $video_id );

		return $video_id[1];
	}
}

if (!function_exists('get_video_embed_code_by_url')) {
	function get_video_embed_code_by_url( $url ) {
		if ( preg_match( '~youtube\.com~', $url ) ) {
			return '<iframe width="100%" src="https://www.youtube.com/embed/' . get_youtube_video_id_from_url( $url ) . '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
		} else {
			preg_match( '~(\d+)~', $url, $video_id );

			return '<iframe src="https://player.vimeo.com/video/' . $video_id[1] . '" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
		}
	}
}

if (!function_exists('get_attachment_src')) {
	function get_attachment_src( $att_id, $size = 'full-hd' ) {
		if ( wp_attachment_is_image( $att_id ) ) {
			$att = wp_get_attachment_image_src( $att_id, $size );

			return $att[0];
		}

		return wp_get_attachment_url( $att_id );
	}
}

if (!function_exists('get_template_part_with_params')) {
	function get_template_part_with_params( $path, array $params = array() ) {
		extract( $params );
		include( locate_template( $path . '.php' ) );
	}
}

if (!function_exists('get_page_by_template')) {
	function get_page_by_template( $template ) {
		$page = get_posts( array(
				'post_type'   => 'any',
				'numberposts' => 1,
				'meta_key'    => '_wp_page_template',
				'meta_value'  => $template
			) );

		if ( $page ) {
			return $page[0];
		}
	}
}

if (!function_exists('get_page_link_by_template')) {
	function get_page_link_by_template( $template ) {
		$page = get_page_by_template( $template );
		if ( $page ) {
			return get_permalink( $page->ID );
		}
	}
}

if (!function_exists('convert_phone_for_link')) {
	function convert_phone_for_link( $phone ) {
		return preg_replace( '~[^0-9]~', '', $phone );
	}
}

if (!function_exists('ninjaPosts')) {
	function ninjaPosts($post_type = [], $post_status = ['publish'], $numberposts = -1, $category = 0, $orderBy = 'date', $order = 'DESC', $include = [], $exclude = [], $meta_key = '', $meta_value = '', $suppress_filters = true ) {
		return get_posts( array(
			'numberposts' => $numberposts,
			'category'    => $category,
			'orderby'     => $orderBy,
			'order'       => $order,
			'include'     => $include,
			'exclude'     => $exclude,
			'meta_key'    => $meta_key,
			'meta_value'  => $meta_value,
			'post_type'   => $post_type,
			'post_status' => $post_status,
			'suppress_filters' => $suppress_filters,
		) );
	}
}

if (!function_exists('ninjaInsert')) {
	function ninjaInsert($tableName = '', $data = [], $format = []) {
		global $wpdb;
		$table = $wpdb->prefix.$tableName;
		$wpdb->insert($table,$data,$format);
		return $wpdb->insert_id;
	}
}

if (!function_exists('ninjaSelect')) {
	function ninjaSelect($tableName = '', $data = '*', $where = [], $limit = null, $type = OBJECT) {
		$where_str = '1 = 1';
		if(!empty($where)) {
			foreach($where as $key => $val) {
				$where_str .= " AND `".$key."` = '$val'";
			}
		}
		global $wpdb;
		if(!is_null($limit)) $limit = " LIMIT ".$limit;
		return $wpdb->get_results( "SELECT {$data} FROM {$wpdb->prefix}$tableName WHERE {$where_str} {$limit}", $type );
	}
}

if (!function_exists('ninjaUpdate')) {
	function ninjaUpdate($table, $data, $where) {
		global $wpdb;
		if ( ! is_array( $data ) || ! is_array( $where ) )
			return false;
		$SET = $WHERE = [];
		// SET
		foreach ( $data as $field => $value ) {
			$field = sanitize_key( $field );
			if ( is_null( $value ) ) {
				$SET[] = "`$field` = NULL";
				continue;
			}
			$SET[] = $wpdb->prepare( "`$field` = %s", $value );
		}
		// WHERE
		foreach ( $where as $field => $value ) {
			$field = sanitize_key( $field );
			if ( is_null( $value ) ) {
				$WHERE[] = "`$field` IS NULL";
				continue;
			}
			if( is_array($value) ) {
				foreach( $value as & $val ){
					$val = $wpdb->prepare( "%s", $val );
				}
				unset( $val );
				$WHERE[] = "`$field` IN (". implode(',', $value) .")";
			} else
				$WHERE[] = $wpdb->prepare( "`$field` = %s", $value );
		}
		$sql = "UPDATE `{$wpdb->prefix}$table` SET ". implode( ', ', $SET ) ." WHERE ". implode( ' AND ', $WHERE );
		return $wpdb->query( $sql );
	}
}

function setup_phpmailer_init( $phpmailer ) {
    $phpmailer->From = 'info@children.am';
    $phpmailer->FromName = 'Admit NY';
    $phpmailer->Host = 'smtp.zoho.com'; // for example, smtp.mailtrap.io
    $phpmailer->Port = 587; // set the appropriate port: 465, 2525, etc.
    $phpmailer->Username = 'info@children.am'; // your SMTP username
    $phpmailer->Password = 'Planet517715!$&@'; // your SMTP password
    $phpmailer->SMTPAuth = true;
    $phpmailer->SMTPSecure = 'tls'; // preferable but optional
    $phpmailer->IsSMTP();
} add_action( 'phpmailer_init', 'setup_phpmailer_init' );
// Theme-specific functions here

add_action('wp_ajax_my_repeater_show_more', 'my_repeater_show_more');
add_action('wp_ajax_nopriv_my_repeater_show_more', 'my_repeater_show_more');
function my_repeater_show_more() {
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'my_repeater_field_nonce')) exit;

    if (!isset($_POST['post_id']) || !isset($_POST['offset'])) return;

    $show = 3;
    $start = $_POST['offset'];
    $end = $start+$show;
    $post_id = $_POST['post_id'];
    $fields = get_fields($post_id);
    $sections = $fields['sections'];

    ob_start();

    $total = count($sections);
    $count = 0;
    foreach ( $sections as $section ) {

        if ($count < $start) {
            $count++;
            continue;
        }

        if($section['background_image'] == "yes") : ?>
            <div class="bg-image">
                <img src="<?=$section['image']?>" alt="image">
            </div>
        <?php endif;?>

        <div class="block">
            <?php if(!empty($section['item'])):
                foreach($section['item'] as $item) : ?>
                <div class="item" style="background-color: <?php echo $item['background_color']; ?>">
                    <p><?php echo $item['text']; ?></p>
                    <strong>— <?php echo $item['title']; ?></strong>
                </div>
                <?php endforeach;
            endif;?>
        </div>

        <?php $count++; if ($count == $end) break;
    }

    $content = ob_get_clean();

    $more = false;

    if ($total > $count) $more = true;
    echo json_encode(array('content' => $content, 'more' => $more, 'offset' => $end));
    exit;
}

add_action('wp_ajax_newsletter', 'newsletter');
add_action('wp_ajax_nopriv_newsletter', 'newsletter');
function newsletter() {
    if(isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
        $to = get_option('admin_email');
        $subject = "NewsLetter Subscriber";
        $headers = 'From: '. $email . "\r\n" .
            'Reply-To: ' . $email . "\r\n";
        $sent = wp_mail($to, $subject, 'Thank Your New Subscriber '.$email, $headers);
        if($sent) {
            $newsletter = array(
                'post_type'     => '_newsletter',
                'post_title'    => wp_strip_all_tags( $email ),
                'post_status'   => 'publish',
            );
            wp_insert_post( $newsletter );
            echo 'oks';
        }
    } wp_die();
}

function admin_post_list_add_export_button( $which ) {
    global $typenow;

    if ( '_newsletter' === $typenow && 'top' === $which ) : ?>
        <input type="submit" name="export_all_newsletters" class="button button-primary" value="<?php _e('Export All Newsletters'); ?>" />
    <?php endif ;
} add_action( 'manage_posts_extra_tablenav', 'admin_post_list_add_export_button', 20, 1 );

function func_export_all_newsletters() {
    if(isset($_GET['export_all_newsletters'])) {
        $args = array(
            'post_type' => '_newsletter',
            'post_status' => 'publish',
            'posts_per_page' => -1,
        );

        global $post;
        $arr_post = get_posts($args);

        if ($arr_post) {
            header('Content-type: text/csv');
            header('Content-Disposition: attachment; filename="newsletters.csv"');
            header('Pragma: no-cache');
            header('Expires: 0');
            $file = fopen('php://output', 'w');
            fputcsv($file, array('Email'));
            foreach ($arr_post as $post) {
                setup_postdata($post);
                fputcsv($file, array(get_the_title()));
            }
            exit();
        }
    }
} add_action( 'init', 'func_export_all_newsletters' );

