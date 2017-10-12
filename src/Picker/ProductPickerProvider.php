<?php

use Contao\CoreBundle\Picker\AbstractPickerProvider;
use Contao\CoreBundle\Picker\DcaPickerProviderInterface;

class ProductPickerProvider extends AbstractPickerProvider implements DcaPickerProviderInterface {

    /**
     * Returns the routing parameters for the back end picker.
     *
     * @param \Contao\CoreBundle\Picker\PickerConfig|null $config
     *
     * @return array
     */
    protected function getRouteParameters(\Contao\CoreBundle\Picker\PickerConfig $config = null)
    {
        // TODO: Implement getRouteParameters() method.
    }

    /**
     * Returns the DCA table for this provider.
     *
     * @return string
     */
    public function getDcaTable()
    {
        // TODO: Implement getDcaTable() method.
    }

    /**
     * Returns the attributes for the DataContainer.
     *
     * @param \Contao\CoreBundle\Picker\PickerConfig $config
     *
     * @return array
     */
    public function getDcaAttributes(\Contao\CoreBundle\Picker\PickerConfig $config)
    {
        // TODO: Implement getDcaAttributes() method.
    }

    /**
     * Converts the DCA value for the picker selection.
     *
     * @param \Contao\CoreBundle\Picker\PickerConfig $config
     * @param mixed $value
     *
     * @return mixed
     */
    public function convertDcaValue(\Contao\CoreBundle\Picker\PickerConfig $config, $value)
    {
        // TODO: Implement convertDcaValue() method.
    }

    /**
     * Returns the unique name for this picker.
     *
     * @return string
     */
    public function getName()
    {
        return 'productPicker';
    }

    /**
     * Returns whether the picker supports the given context.
     *
     * @param string $context
     *
     * @return bool
     */
    public function supportsContext($context)
    {
        print 'supportsContext';
        var_dump($context);
        // TODO: Implement supportsContext() method.
    }

    /**
     * Returns whether the picker supports the given value.
     *
     * @param \Contao\CoreBundle\Picker\PickerConfig $config
     *
     * @return bool
     */
    public function supportsValue(\Contao\CoreBundle\Picker\PickerConfig $config)
    {
        // TODO: Implement supportsValue() method.
    }
}