<?php
namespace Drupal\qr_code\Controller;
use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output;

class QrCodeController {
  public function qrcodeIcon() {
    $qrCode = new QrCode('Lorem ipsum sit dolor');
    $output = new Output\Png();
    $data = $output->output($qrCode, 100, [255, 255, 255], [0, 0, 0]);
    file_put_contents('filename.png', $data);

    // Echo a SVG file, 100 px wide, black on white.
    // Colors can be specified in SVG-compatible formats
    $output = new Output\Svg();
    $svgOutput = $output->output($qrCode, 100, 'white', 'black');
    return $svgOutput;
  }
}
