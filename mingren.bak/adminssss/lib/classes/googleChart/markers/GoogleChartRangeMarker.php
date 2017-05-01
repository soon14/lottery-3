
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */

/** @file
 * This file is part of Google Chart PHP library.
 *
 * Copyright (c) 2010 Rémi Lanvin <remi@cloudconnected.fr>
 *
 * Licensed under the MIT license.
 *
 * For the full copyright and license information, please view the LICENSE file.
 */

include_once dirname(__FILE__).'/../GoogleChartMarker.php';

/**
 * A Range marker.
 *
 * This class implement Range Markers feature (@c chm).
 *
 * @par Example
 *
 *
 * @see GoogleChartMarker
 * @see http://code.google.com/apis/chart/docs/chart_params.html#gcharts_range_markers
 */
class GoogleChartRangeMarker extends GoogleChartMarker
{
	/**
	 * Compute the parameter value.
	 *
	 * @note For internal use only.
	 * @param $index (int) index of the data serie.
	 * @return string
	 */
	public function compute($index)
	{
		
	}
}
