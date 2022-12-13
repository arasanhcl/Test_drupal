<?php
/**
 * @file
 * Contains \Drupal\article\Plugin\Block\XaiBlock.
 */

namespace Drupal\qr_code\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\qr_code\Controller\QrCodeController;
use Drupal\Core\Url;


/**
 * Provides a 'article' block.
 *
 * @Block(
 *   id = "qr_code",
 *   admin_label = @Translation("Qr code block"),
 *   category = @Translation("Custom qr code example")
 * )
 */
class Qrcode extends BlockBase {

  /**
   * {@inheritdoc}
   */

   public function build() {
     $controller_variable = new QrCodeController;
     $rendering_in_block = $controller_variable->qrcodeIcon();
     $node = \Drupal::routeMatch()->getParameter('node');
      if ($node instanceof \Drupal\node\NodeInterface) {
        // You can get nid and anything else you need from the node object.
        $nid = $node->id();
        $mylink = Url::fromUri($node->field_app_purchase_link->uri)->toString();
      }
      $service = \Drupal::service('qr_code.test');
      $random_number = $service->get_number();
     $return_content =  [
        '#theme' => 'qr_code_page',
        '#qr_code_block' => $rendering_in_block,
        '#field_app_purchase_link' => $mylink,
        '#random_number' => $random_number,
      ];
    return $return_content;
  }
}
