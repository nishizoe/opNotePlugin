<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * opNoteHelper.
 *
 * @package    OpenPNE
 * @subpackage opNotePlugin
 * @author     kao <kao@laboritan.com>
 */
function remove_assets()
{
  $response = sfContext::getInstance()->getResponse();
  $stylesheets = $response->getStylesheets();
  foreach ($stylesheets as $file => $opt)
  {
    $response->removeStylesheet($file);
  }

  $javascripts = $response->getJavascripts();
  foreach ($javascripts as $file => $opt)
  {
    $response->removeJavascript($file);
  }
}
