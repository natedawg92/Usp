<?php

namespace NathanDay\Usp\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class Numbers implements OptionSourceInterface
{
    const NUMBER_STRINGS = [
        1 => 'One',
        2 => 'Two',
        3 => 'Three',
        4 => 'Four',
        5 => 'Five',
        6 => 'Six',
        7 => 'Seven',
        8 => 'Eight',
    ];

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        $optionArray = [];

        foreach (self::NUMBER_STRINGS as $key => $value) {
            $optionArray[] = ['value' => $key,  'label' => __($value)];
        }

        return $optionArray;
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        $array = [];

        foreach (self::NUMBER_STRINGS as $key => $value) {
            $array[$key] = __($value);
        }

        return $array;
    }
}
