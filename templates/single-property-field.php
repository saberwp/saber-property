<?php

get_header();

//var_dump( $post );

$meta = get_post_meta( $post->ID );

var_dump( $meta );

get_footer();

?>
