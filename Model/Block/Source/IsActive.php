<?php

namespace NathanDay\Usp\Model\Block\Source;

use Magento\Framework\Data\OptionSourceInterface;
use NathanDay\Usp\Model\Block as UspBlock;

/**
 * Class IsActive
 */
class IsActive implements OptionSourceInterface
{
    /**
     * @var UspBlock
     */
    protected $uspBlock;

    /**
     * Constructor
     *
     * @param UspBlock $uspBlock
     */
    public function __construct(UspBlock $uspBlock)
    {
        $this->uspBlock = $uspBlock;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $availableOptions = $this->uspBlock->getAvailableStatuses();
        $options = [];
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}
