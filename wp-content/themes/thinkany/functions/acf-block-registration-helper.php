<?php

	function sync_block($layout_name, $sub_fields) {

		$tdir = get_template_directory();

		// check for general modules folder
		if ( !file_exists( $tdir . '/blocks' ) ) {
			mkdir($tdir . '/blocks');
		}

		// check for specific module folder
		if ( !file_exists( $tdir . '/blocks/' . $layout_name ) ) {
			mkdir($tdir . '/blocks/' . $layout_name);
		}

		// check all 4 subfiles exist:
		if ( !file_exists( $tdir . '/blocks/' . $layout_name . '/' . $layout_name . '.php' ) ) {

			$fh = fopen($tdir . '/blocks/' . $layout_name . '/' .$layout_name.'.php', 'w');
			$file_contents =
"<?php
// Block: " . $layout_name .
"//
\$blockFields = get_fields();

if ( \$blockFields['section_id'] == null) :
    \$id = \$block['id'];
else :
    \$id = \$blockFields['section_id'];
endif;

\$className = 'sec sec--".$layout_name."';
?>

<section id=\"<?php echo \$id; ?>\" class=\"<?php echo esc_attr(\$className); ?>\">
	<div class=\"container\">

	</div>
</section>";
						fwrite($fh, $file_contents);
						fclose($fh);
					}
					if ( !file_exists( $tdir . '/blocks/' . $layout_name . '/' . $layout_name . '.scss' ) ) {

						$fh = fopen($tdir . '/blocks/' . $layout_name . '/' .$layout_name.'.scss', 'w');
						$file_contents =
".sec--".$layout_name." {

}";
			fwrite($fh, $file_contents);
			fclose($fh);

		}

		$js_class_name = str_replace('_', ' ', $layout_name);
		$js_class_name = ucwords($js_class_name);
		$js_class_name = str_replace(' ', '', $js_class_name);

		if ( !file_exists( $tdir . '/blocks/' . $layout_name . '/' . $js_class_name . '.js' ) ) {
			$fh = fopen($tdir . '/blocks/' . $layout_name . '/' .$js_class_name.'.js', 'w');

			$file_contents =

"var ta".str_replace('-','',$js_class_name)." = (function() {
    'use strict';

    // var;

    function init() {

        events();
    }

    function events() {

    }

    return {
        init:init
    };
}());";
			fwrite($fh, $file_contents);
			fclose($fh);

		}

	}


	function sync_blocks() {

	    // get acf version
	    $json_location = acf_get_setting('load_json');
		$json_location = $json_location[0];

		// scan json director
		$files = scandir($json_location);

		// parse json files
		foreach ( $files as $file ) {

			switch ( $file ) {

				case '.':
				case '..':
					break;

				default:

					if ( strpos($file, 'json') !== false ) {
						$file_contents = json_decode(file_get_contents($json_location.'/'.$file));

						if ( ( strpos( $file_contents->title, 'Block -' ) !== 0 ) || strpos( $file_contents->title, 'Block -' ) === false ) { continue 2; }
                        if (!$file_contents->fields) { continue 2; }
                        
                        $shortName = strtolower( str_replace( 'Block - ', '', $file_contents->title ) );
                        $shortName = str_replace( [' &',' +','&','+'], '', $shortName );
                        $shortName = str_replace( ' ', '-', $shortName );

						foreach( $file_contents->fields as $items ) {
                            
							//if( strpos($items->name, 'Block -') || strpos($items->name, 'block -') ) {
								if($items){
									foreach ( $items as $key => $item ) {
										sync_block($shortName, $item);
									}
								}
							//}
						}

					}

					break;

			}

		}

	}

	add_action('acf/field_group/admin_head', 'sync_blocks', 20);
