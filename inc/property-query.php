<?php

/* Functional programming API for Property Queries. */

/* Fetch All
 * fetchAll( $limit )
 * Returns array list of property posts or false if none found.
 */
function sapr_fetch_all_properties( $limit = 25 ) {

  $posts = get_posts( array(

    'post_type'   => 'property',
    'numberposts' => $limit

  ));

  if( empty( $posts )) { return false; }

  return $posts;

}
