<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

$PATH_tika = t3lib_extMgm::extPath($_EXTKEY);

$tikaConfiguration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['tika']);
$requiredExecutable = '';
if ($tikaConfiguration['extractor'] == 'tika') {
	$requiredExecutable = 'java';
}

	// meta data extraction service
t3lib_extMgm::addService($_EXTKEY, 'metaExtract', 'tx_tika_metaExtract', array(
	'title'       => 'Tika meta data extraction',
	'description' => 'Uses Apache Tika to extract meta data.',

	'subtype'     => 'aiff,au,bmp,doc,docx,epub,flv,gif,htm,html,image:exif,jpg,jpeg,mid,mp3,msg,odf,odt,pdf,png,ppt,pptx,rtf,svg,sxw,tgz,tiff,txt,wav,xls,xlsx,xml,zip',

	'available'   => FALSE,
	'priority'    => 100,
	'quality'     => 80,

	'os'          => '',
	'exec'        => $requiredExecutable,

	'className'   => 'ApacheSolrForTypo3\\Tika\\Service\\MetaDataExtractionService',
));

	// text extraction service
t3lib_extMgm::addService($_EXTKEY, 'textExtract', 'tx_tika_textExtract', array(
	'title'       => 'Tika text extraction',
	'description' => 'Uses Apache Tika to extract text from files.',

	'subtype'     => 'doc,docx,epub,htm,html,msg,odf,odt,pdf,ppt,pptx,rtf,sxw,tgz,txt,xls,xlsx,xml,zip',

	'available'   => FALSE,
	'priority'    => 60,
	'quality'     => 80,

	'os'          => '',
	'exec'        => $requiredExecutable,

	'className'   => 'ApacheSolrForTypo3\\Tika\\Service\\TextExtractionService',
));

	// language detection service
t3lib_extMgm::addService($_EXTKEY, 'textLang', 'tx_tika_textLang', array(
	'title'       => 'Tika language detection',
	'description' => 'Uses Apache Tika to detect a document\'s language.
						Currently supports Danish, Dutch, English, Finnish,
						French, German, Italian, Portuguese, Spanish,
						and Swedish',

	'subtype'     => '',

	'available'   => FALSE,
	'priority'    => 60,
	'quality'     => 60,

	'os'          => '',
	'exec'        => $requiredExecutable,

	'className'   => 'ApacheSolrForTypo3\\Tika\\Service\\LanguageDetectionService',
));

?>