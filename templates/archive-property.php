<?php get_header(); ?>

<style>

.property-collection-container {

  max-width: 1200px;
  margin: 40px auto;
  background-color: #F7F7F7;
  display: grid;
  grid-template-columns: 3fr 7fr;
  gap: 30px;

}

.property-collection-sidebar {

  background-color: #F2F2F2;

}

.property-collection-list-header {

  display: flex;
  justify-content: space-between;
  margin: 30px 0;

}

.property-collection-list-item {

  display: flex;
  font-size: 14px;
  background: #FFFFFF;
  border-radius: 20px;
  padding: 25px;
  margin: 40px 0;
  gap: 30px;

}

.meta-property-type {

  color: #ADAFBE;
  font-size: 18px;
  margin: 0 0 6px 0;

}

.meta-property-title {

  color: #3D3E46;
  font-size: 26px;
  margin: 6px 0;
  font-weight: 800;

}

.meta-property-location {

  color: #ADAFBE;
  font-size: 14px;
  margin: 6px 0;

}

.sapr-property-data-label {

  background-color: #DEE0EB;
  padding: 4px 6px;

}

.sapr-property-data-value {

  background-color: #F6F6FA;
  padding: 4px 6px;

}

</style>

<div class="property-collection-container" style="margin-top: 120px;">

  <div class="property-collection-sidebar"></div>

  <div class="property-collection-listings">

    <section class="property-collection-list-header">

      <h4>Showing 1–10 of 13 results</h4>
      <div>
        <span>Sort by: </span>
        <select></select>
      </div>

    </section>

    <?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : ?>

      <?php

        the_post();
        $post = get_post();

        $meta = get_post_meta( $post->ID );

        $bathrooms = $meta['bathrooms'][0];
        $bedrooms  = $meta['bedrooms'][0];
        $city      = $meta['city'][0];
        $state     = $meta['state'][0];

        $featuredImage = get_the_post_thumbnail( $post->ID );

        $property_types = get_the_terms( $post->ID, 'property_type' );

      ?>

      <div class="property-collection-list-item">

        <div style="max-width: 200px;">
          <?php print $featuredImage; ?>
        </div>

        <div>

          <?php

            if( !empty( $property_types )) {

              print '<h5 class="meta-property-type">' . $property_types[0]->name . '</h5>';

            }

          ?>

          <h2 class="meta-property-title"><?php print $post->post_title; ?></h2>

          <h5 class="meta-property-location"><?php print $city . ', ' . $state; ?></h5>

          <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 0; max-width: 600px;">

            <div class="sapr-property-data-label">Bedrooms</div>
            <div class="sapr-property-data-value"><?php print $bedrooms; ?></div>

            <div class="sapr-property-data-label">Bathrooms</div>
            <div class="sapr-property-data-value"><?php print $bathrooms; ?></div>

          </div>

          <a href="<?php print the_permalink() ?>">View Property</a>

        </div>

      </div>

    <?php endwhile; ?>

  <?php endif; ?>

  </div>

</div>

<?php get_footer(); ?>
