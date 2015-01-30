<?php
/**
 * The MetaModels extension allows the creation of multiple collections of custom items,
 * each with its own unique set of selectable attributes, with attribute extendability.
 * The Front-End modules allow you to build powerful listing and filtering of the
 * data in each collection.
 *
 * PHP version 5
 *
 * @package     MetaModels
 * @subpackage  AttributeText
 * @author      Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @author      Andreas Isaak <info@andreas-isaak.de>
 * @author      Christopher Boelter <christopher@boelter.eu>
 * @copyright   The MetaModels team.
 * @license     LGPL.
 * @filesource
 */

namespace MetaModels\Attribute\Text;

use MetaModels\Attribute\BaseSimple;

/**
 * This is the MetaModelAttribute class for handling text fields.
 *
 * @package    MetaModels
 * @subpackage AttributeText
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 */
class Text extends BaseSimple
{
    /**
     * {@inheritdoc}
     */
    public function getSQLDataType()
    {
        return 'varchar(255) NOT NULL default \'\'';
    }

    /**
     * {@inheritdoc}
     */
    public function getAttributeSettingNames()
    {
        return array_merge(parent::getAttributeSettingNames(), array(
            'isunique',
            'searchable',
            'filterable',
            'mandatory',
            'decodeEntities',
            'trailingSlash',
            'spaceToUnderscore',
            'rgxp'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getFieldDefinition($arrOverrides = array())
    {
        $arrFieldDef              = parent::getFieldDefinition($arrOverrides);
        $arrFieldDef['inputType'] = 'text';

        if ($arrOverrides['rgxp']) {
            $arrFieldDef['eval']['rgxp'] = $arrOverrides['rgxp'];
        }

        return $arrFieldDef;
    }
}
