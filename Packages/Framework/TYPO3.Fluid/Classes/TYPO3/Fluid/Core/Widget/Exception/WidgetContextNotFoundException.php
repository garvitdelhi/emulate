<?php
namespace TYPO3\Fluid\Core\Widget\Exception;

/*
 * This script belongs to the TYPO3 Flow package "TYPO3.Fluid".           *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\Fluid\Core\Widget;

/**
 * An exception if no widget context could be found inside the AjaxWidgetContextHolder.
 */
class WidgetContextNotFoundException extends Widget\Exception {
}
