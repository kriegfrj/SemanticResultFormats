<?php
/**
 * Settings file for the Semantic Result Formats extension.
 * https://www.mediawiki.org/wiki/Extension:Semantic_Result_Formats
 * 
 * NOTE: Do not use this file as entry point, use SemanticresultFormats.php instead.
 *
 * @file SRF_Settings.php
 * @ingroup SemanticResultFormats
 * 
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 * @author Daniel Werner < danweetz@web.de >
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

if ( !defined( 'SRF_VERSION' ) ) {
	require_once dirname( __FILE__ ) . '/SemanticResultFormats.php';
}

// The formats you want to be able to use.
// See the INSTALL file or this url for more info: https://www.mediawiki.org/wiki/Extension:Semantic_Result_Formats#Installation
$srfgFormats = array(
	'icalendar',
	'vcard',
	'bibtex',
	'calendar',
	'eventcalendar',
	'eventline',
	'timeline',
	'outline',
	'gallery',
	'jqplotchart',
	'jqplotseries',
	'sum',
	'average',
	'min',
	'max',
	'median',
	'product',
	'tagcloud',
	'valuerank',
	'array',
	'tree',
	'ultree',
	'oltree',
	'd3chart',
	'latest',
	'earliest',
	'filtered',
	'slideshow', 
	'timeseries',
	'sparkline',
	'listwidget',
	'pagewidget',
	'dygraphs',

	// Boilerplate
	// Enable access to the format identifier
	// 'boilerplate',

	// Disabled by default
	
	// This format can influence performance during execution due to potential
	// large number of incoming properties assigned to each selected entity
	// @see Help:Incoming format
	// 'incoming',

	// Still in alpha:
	// 'jitgraph', // Several issues need to be fixed before this can be enabled, most notably it does not work properly with the RL.

	// Disabled by default sicne they contact external sites:
	// 'googlebar',
	// 'googlepie',

	// Unstable/broken:
	// 'exhibit',
);

// load hash format only if HashTables extension is initialised, otherwise 'Array' format is enough
// FIXME: According to the INSTALL file only formats should be enabled, that "do not require further software to be installed (besides SMW)"
if(	array_key_exists( 'ExtHashTables', $wgAutoloadClasses ) && defined( 'ExtHashTables::VERSION' )
	&& version_compare( ExtHashTables::VERSION, '0.999', '>=' )
	|| isset( $wgHashTables ) // Version < 1.0 alpha
) {
	$srfgFormats[] = 'hash';
}

// Used for Array and Hash formats.
// Allows value as string or object instances of Title or Article classes or an array
// where index 0 is the page title and 1 is the namespace-index (by default NS_MAIN)
// also allows defining optional template-arguments by index 'args' as array where a
// key represents an argument name and a keys associated value an argument value.
$srfgArraySep = ', ';
$srfgArrayPropSep = '<PROP>';
$srfgArrayManySep = '<MANY>';
$srfgArrayRecordSep = '<RCRD>';
$srfgArrayHeaderSep = ' ';

/**
 * Used if Array|Hash result format is not used inline and the standard config values
 * defined in LocalSettings.php can not be used because they are page references which
 * can only be evaluated in inline queries
 * 
 * @var Array
 */
$srfgArraySepTextualFallbacks = array (
	'sep'       => $srfgArraySep,
	'propsep'   => $srfgArrayPropSep,
	'manysep'   => $srfgArrayManySep,
	'recordsep' => $srfgArrayRecordSep,
	'headersep' => $srfgArrayHeaderSep
);

// $srfgColorScheme
// Color schems are used among v1.8 jqPlot, and other printers if change
// those settings please ensure that the content of themes.js has to be 
// altered as well
$srfgColorScheme = array ( 'cc124', 'cc128', 'cc129', 'cc173', 'cc210', 'cc252', 'cc267', 'cc294' , 'cc303', 'cc327', 'ylgn','ylgnbu','gnbu','bugn','pubugn','pubu','bupu', 'rdpu','purd','orrd','ylorrd','ylorbr','purples', 'blues','greens','oranges','reds','greys','puor','brbg','prgn','piyg','rdbu','rdgy','rdylbu','spectral','rdylgn' );
