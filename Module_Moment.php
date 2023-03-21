<?php
namespace GDO\Moment;

use GDO\Core\GDO_Module;

/**
 * Moment.js bindings for gdo6.
 *
 * @author gizmore
 */
final class Module_Moment extends GDO_Module
{

	public int $priority = 15;

	public function onLoadLanguage(): void { $this->loadLanguage('lang/moment'); }

	public function onIncludeScripts(): void
	{
		$min = $this->cfgMinAppend();

		$this->addBowerJS("moment/min/moment-with-locales$min.js");
		$this->addBowerJS("moment-timezone/builds/moment-timezone-with-data$min.js");
		$this->addJS('js/gdo6-moment.js');
	}

	/**
	 * Convert a PHP date format to moment.js format.
	 *
	 * @author https://stackoverflow.com/a/30192680/13599483
	 *
	 * @param string $format
	 *
	 * @return string
	 */
	public function convertFormat($format)
	{
		$replacements = [
			'd' => 'DD',
			'D' => 'ddd',
			'j' => 'D',
			'l' => 'dddd',
			'N' => 'E',
			'S' => 'o',
			'w' => 'e',
			'z' => 'DDD',
			'W' => 'W',
			'F' => 'MMMM',
			'm' => 'MM',
			'M' => 'MMM',
			'n' => 'M',
			't' => '', // no equivalent
			'L' => '', // no equivalent
			'o' => 'YYYY',
			'Y' => 'YYYY',
			'y' => 'YY',
			'a' => 'a',
			'A' => 'A',
			'B' => '', // no equivalent
			'g' => 'h',
			'G' => 'H',
			'h' => 'hh',
			'H' => 'HH',
			'i' => 'mm',
			's' => 'ss',
			'u' => 'SSS',
			'e' => 'zz', // deprecated since version 1.6.0 of moment.js
			'I' => '', // no equivalent
			'O' => '', // no equivalent
			'P' => '', // no equivalent
			'T' => '', // no equivalent
			'Z' => '', // no equivalent
			'c' => '', // no equivalent
			'r' => '', // no equivalent
			'U' => 'X',
		];
		return strtr($format, $replacements);
	}

}
