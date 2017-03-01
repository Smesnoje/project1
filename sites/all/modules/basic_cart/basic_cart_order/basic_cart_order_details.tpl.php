<?php
/**
 * @file
 * basic_cart_order_details.tpl.php
 */

?>
<p><?php print l(t('&laquo; Back to order list'), 'admin/structure/orders', array('html' => TRUE)); ?></p>
<table class="basic-cart-order-details" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td class="basic-cart-order-label"><?php print t('Ime'); ?>:</td>
    <td class="basic-cart-order-value"><?php print $name; ?></td>
  </tr>
  <tr>
    <td class="basic-cart-order-label"><?php print t('Mejl'); ?>:</td>
    <td class="basic-cart-order-value"><?php print $email; ?></td>
  </tr>
  <tr>
    <td class="basic-cart-order-label"><?php print t('Telefon'); ?>:</td>
    <td class="basic-cart-order-value"><?php print $phone; ?></td>
  </tr>
  <tr>
    <td class="basic-cart-order-label"><?php print t('Adresa'); ?>:</td>
    <td class="basic-cart-order-value">
      <?php print $address; ?><br />
      <?php print $zipcode; ?> <?php print $city; ?>
    </td>
  </tr>
  <tr>
    <td class="basic-cart-order-label"><?php print t('datum'); ?>:</td>
    <td class="basic-cart-order-value"><?php print date('d-m-Y G:i', $timestamp); ?></td>
  </tr>
  <tr>
    <td class="basic-cart-order-label" colspan="2"><?php print t('Poruka'); ?>:</td>
  </tr>
  <tr>
    <td class="basic-cart-order-value" colspan="2"><?php print $message; ?></td>
  </tr>
  <tr>
    <td class="basic-cart-order-label" colspan="2"><?php print t('Produkti'); ?>:</td>
  </tr>
  <?php foreach ($products as $product): ?>
  <tr>
    <td class="basic-cart-order-value" colspan="2">
      <?php print l($product->title, 'node/' . $product->nid); ?>
      <span class="basic-cart-order-product-price">
        <?php print $product->basic_cart_quantity; ?> x <strong><?php print $product->price; ?></strong>
      </span>
    </td>
  </tr>
  <?php endforeach; ?>
  <tr>
    <td colspan="2" class="basic-cart-order-label">
      <span class="basic-cart-order-total-price">
        <?php print t('Cena'); ?>: <?php print $total_price; ?>
      </span>
      <?php if (!empty ($vat)): ?>
        <br />
        <span class="basic-cart-order-vat">
          <?php print t('Total VAT'); ?>: <?php print $vat; ?>
        </span>
      <?php endif; ?>
    </td>
  </tr>
</table>
