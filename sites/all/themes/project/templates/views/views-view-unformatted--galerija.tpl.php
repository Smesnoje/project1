<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<script src="https://unpkg.com/isotope-layout@3.0/dist/isotope.pkgd.min.js"></script>
<script>
jQuery(function ($) {


  // init Isotope
  var $grid = $('.grid').isotope({
    itemSelector: '.grid-item'
  });
  // store filter for each group
  var filters = {};

  $('.filters ').on( 'click', 'button', function() {

    var $this = $(this);
    // get group key
    var $buttonGroup = $this.parents('.button-group');
    var filterGroup = $buttonGroup.attr('data-filter-group');
    // set filter for group
    filters[ filterGroup ] = $this.attr('data-filter');
    // combine filters
    var filterValue = concatValues( filters );
    // set filter for Isotope
    $grid.isotope({ filter: filterValue });
  });

  // change is-checked class on buttons
  $('.button-group').each( function( i, buttonGroup ) {
    var $buttonGroup = $( buttonGroup );
    $buttonGroup.on( 'click', 'button', function() {
      $buttonGroup.find('.is-checked').removeClass('is-checked');
      $( this ).addClass('is-checked');
    });
  });

  // flatten object by concatting values
  function concatValues( obj ) {
    var value = '';
    for ( var prop in obj ) {
      value += obj[ prop ];
    }
    return value;
  }

 });
</script>
<div class="filters">
<div class="button-group" data-filter-group="kategorija">
  <button data-filter="">Sve</button>
  <button data-filter=".Haljine">Haljine</button>
  <button data-filter=".Košulje">Košulje</button>
  <button data-filter=".Tunike">Tunike</button>
  <button data-filter=".Bluze">Bluze</button>
  <button data-filter=".Blejzeri">Blejzeri</button>
  <button data-filter=".Pantalone">Pantalone</button>
  <button data-filter=".Suknje">Suknje</button>
</div>
</div>


  <div class="grid" data-isotope='{ "itemSelector": ".grid-item", "layoutMode": "fitRows" }'>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
  <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
    <?php print $row; ?>
  </div>
<?php endforeach; ?>
</div>
</div>
