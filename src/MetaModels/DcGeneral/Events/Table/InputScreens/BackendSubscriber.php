<?php
/**
 * The MetaModels extension allows the creation of multiple collections of custom items,
 * each with its own unique set of selectable attributes, with attribute extendability.
 * The Front-End modules allow you to build powerful listing and filtering of the
 * data in each collection.
 *
 * PHP version 5
 *
 * @package    AttributeText
 * @subpackage Core
 * @author     Christopher Boelter <christopher@boelter.eu>
 * @copyright  The MetaModels team.
 * @license    LGPL.
 * @filesource
 */

namespace MetaModels\DcGeneral\Events\Table\InputScreens;

use ContaoCommunityAlliance\DcGeneral\Contao\View\Contao2BackendView\Event\GetPropertyOptionsEvent;
use MetaModels\DcGeneral\Events\BaseSubscriber;

/**
 * Handles event operations on tl_metamodel_dcasetting.
 */
class BackendSubscriber extends BaseSubscriber
{
    /**
     * Register all listeners to handle creation of a data container.
     *
     * @return void
     */
    protected function registerEventsInDispatcher()
    {
        $this
            ->addListener(
                GetPropertyOptionsEvent::NAME,
                array($this, 'getRgxpOptions')
            );
    }

    /**
     * Retrieve the options for the attributes.
     *
     * @param GetPropertyOptionsEvent $event The event.
     *
     * @return void
     */
    public function getRgxpOptions(GetPropertyOptionsEvent $event)
    {
        if (($event->getEnvironment()->getDataDefinition()->getName() !== 'tl_metamodel_dcasetting')
            || ($event->getPropertyName() !== 'rgxp')) {
            return;
        }

        $options = array(
            'alnum'    => 'alnum',
            'alpha'    => 'alpha',
            'digit'    => 'digit',
            'email'    => 'email',
            'emails'   => 'emails',
            'extnd'    => 'extnd',
            'friendly' => 'friendly',
            'phone'    => 'phone',
        );

        $event->setOptions($options);
    }
}
