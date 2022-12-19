<?php

/**
 * @file
 * Contains \Drupal\react\Plugin\Block\.
 */

namespace Drupal\react\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'article' block.
 *
 * @Block(
 *   id = "react_block",
 *   admin_label = @Translation("react block"),
 *   category = @Translation("react block code example")
 * )
 */
class ReactExampleBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];

    $build[] = [
      '#type' => 'container',
      '#attributes' => [
        'id' => 'root',
      ],
      '#attached' => [
        'library' => [
          'react/react_app',
        ],
      ],
    ];

    return $build;
  }

}
