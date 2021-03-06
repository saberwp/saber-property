<?php

get_header();

//var_dump( $post );

$meta = get_post_meta( $post->ID );

$bathrooms = $meta['bathrooms'][0];
$bedrooms  = $meta['bedrooms'][0];
$city      = $meta['city'][0];
$zipcode   = $meta['zipcode'][0];

$featuredImage = get_the_post_thumbnail( $post->ID );
$property_types = get_the_terms( $post->ID, 'property_type' );

//var_dump( $featuredImage );
// var_dump( $meta );

?>

<div style="max-width: 1200px; margin: 40px auto;">

  <div class="property-single-container">

    <?php

      if( !empty( $property_types )) {

        print '<h3>' . $property_types[0]->name . '</h3>';

      }

    ?>

    <h5><?php print $city; ?></h5>
    <h2><?php print $post->post_title; ?></h2>
    <div style="max-width: 400px;">
      <?php print $featuredImage; ?>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 2fr; max-width: 600px;">

      <div>Zipcode</div>
      <div><?php print $zipcode; ?></div>

      <div>Bedrooms</div>
      <div><?php print $bedrooms; ?></div>

      <div>Bathrooms</div>
      <div><?php print $bathrooms; ?></div>

    </div>

    <a href="<?php print site_url('properties'); ?>">View All Properties</a>

  </div>

</div>

<?php

get_footer();

?>
