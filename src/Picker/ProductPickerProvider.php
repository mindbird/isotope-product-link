<?php

namespace Mindbird\Isotope\ProductLink\Picker;

use Contao\CoreBundle\Picker\AbstractPickerProvider;
use Contao\CoreBundle\Picker\DcaPickerProviderInterface;
use Contao\CoreBundle\Picker\PickerConfig;

class ProductPickerProvider extends AbstractPickerProvider implements DcaPickerProviderInterface {

    /**
     * Returns the routing parameters for the back end picker.
     *
     * @param PickerConfig|null $config
     *
     * @return array
     */
    protected function getRouteParameters(PickerConfig $config = null)
    {
        return ['do' => 'iso_products'];
    }

    /**
     * Returns the DCA table for this provider.
     *
     * @return string
     */
    public function getDcaTable()
    {
        return 'tl_isotope_products';
    }

    /**
     * Returns the attributes for the DataContainer.
     *
     * @param PickerConfig $config
     *
     * @return array
     */
    public function getDcaAttributes(PickerConfig $config)
    {
        $value = $config->getValue();
        $attributes = ['fieldType' => 'radio'];

        if ('iso_products' === $config->getContext()) {
            if ($fieldType = $config->getExtra('fieldType')) {
                $attributes['fieldType'] = $fieldType;
            }

            if ($value) {
                $attributes['value'] = array_map('intval', explode(',', $value));
            }

            return $attributes;
        }

        if ($value && false !== strpos($value, '{{link_url::')) {
            $attributes['value'] = str_replace(['{{link_url::', '}}'], '', $value);
        }

        return $attributes;
    }

    /**
     * Converts the DCA value for the picker selection.
     *
     * @param PickerConfig $config
     * @param mixed $value
     *
     * @return mixed
     */
    public function convertDcaValue(PickerConfig $config, $value)
    {
        if ('iso_products' === $config->getContext()) {
            return (int) $value;
        }

        return '{{link_url::'.$value.'}}';
    }

    /**
     * Returns the unique name for this picker.
     *
     * @return string
     */
    public function getName()
    {
        return 'isotopeProductPicker';
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
        return in_array($context, ['iso_products', 'link'], true) && $this->getUser()->hasAccess('iso_products', 'modules');
    }

    /**
     * Returns whether the picker supports the given value.
     *
     * @param PickerConfig $config
     *
     * @return bool
     */
    public function supportsValue(PickerConfig $config)
    {
        if ('iso_products' === $config->getContext()) {
            return is_numeric($config->getValue());
        }

        return false !== strpos($config->getValue(), '{{link_url::');
    }
}