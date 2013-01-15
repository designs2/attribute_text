<?php

$GLOBALS['TL_DCA']['tl_metamodel_dcasetting']['metasubselectpalettes']['attr_id']['text'] =
array
(
    'presentation' => array(
        'tl_class', 
    ),
    'functions'  => array(
        'mandatory',
        'allowHtml',
		'preserveTags',
		'decodeEntities',
		'trailingSlash',
		'spaceToUnderscore',	
    ),
	'overview' => array(		
		'filterable',
		'searchable',
		'sortable',
		'flag'
	)
);

?>