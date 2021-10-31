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

.property-collection-listings {

  padding-right: 30px;

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

.property-collection-list-item svg {

  width: 40px;
  height: 40px;
  fill: #868BB7;
  border-radius: 6px;
  background-color: #DEE0EB;
  padding: 8px;

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

.meta-property-data-inline {

  display: flex;
  width: 100%;
  margin: 20px 0;
  gap: 20px;
  align-items: center;

}

.sapr-property-data-label {

  /* background-color: #DEE0EB; */
  margin: 0;

}

.sapr-property-data-label i {

  font-size: 16px;
  line-height: 16px;
  vertical-align: middle;

}

.sapr-property-data-value {

  background-color: #F6F6FA;
  padding: 4px 6px;

}

.property-main-image {

  min-width: 285px;
  width: 285px;
  height: 200px;
  overflow: hidden;

}

.property-main-image img {

  object-fit: cover;
  width: 285px;
  height: 200px;
  border-radius: 6px;

}

.sapr-property-price {

  font-size: 28px;
  color: #868BB7;

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

        $bathrooms  = $meta['bathrooms'][0];
        $bedrooms   = $meta['bedrooms'][0];
        $city       = $meta['city'][0];
        $state      = $meta['state'][0];
        $price      = $meta['price'][0];
        $floorspace = $meta['floorspace'][0];

        $featuredImage = get_the_post_thumbnail( $post->ID );

        $property_types = get_the_terms( $post->ID, 'property_type' );

      ?>

      <div class="property-collection-list-item">

        <div class="property-main-image">
          <?php print $featuredImage; ?>
        </div>

        <div style="width: 100%; position: relative;">

          <div style="position: absolute; top: 0; right: 0;">

            <a href="<?php the_permalink(); ?>">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M313.941 216H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12h301.941v46.059c0 21.382 25.851 32.09 40.971 16.971l86.059-86.059c9.373-9.373 9.373-24.569 0-33.941l-86.059-86.059c-15.119-15.119-40.971-4.411-40.971 16.971V216z"/></svg>
            </a>

          </div>

          <?php

            if( !empty( $property_types )) {

              print '<h5 class="meta-property-type">' . $property_types[0]->name . '</h5>';

            }

          ?>

          <h2 class="meta-property-title">
            <a href="<?php the_permalink(); ?>">
              <?php print $post->post_title; ?>
            </a>
          </h2>

          <h5 class="meta-property-location"><?php print $city . ', ' . $state; ?></h5>

          <div class="meta-property-data-inline">

            <div class="sapr-property-data-label">
              <i class="flaticon-bed"></i> Bedrooms <?php print $bedrooms; ?>
            </div>

            <div class="sapr-property-data-label">
              <i class="flaticon-shower"></i> Bathrooms <?php print $bathrooms; ?>
            </div>

            <div class="sapr-property-data-label">
              <i class="flaticon-ruler"></i> <?php print $floorspace . ' sqft.'; ?>
            </div>

          </div>

          <div class="sapr-property-price">
            <?php print '$' . number_format( $price, 0 ); ?>
          </div>

        </div>

      </div>

    <?php endwhile; ?>

  <?php endif; ?>

  </div>

</div>

<?php get_footer(); ?>
