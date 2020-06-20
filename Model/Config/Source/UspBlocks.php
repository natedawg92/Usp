<?php

namespace NathanDay\Usp\Model\Config\Source;

use NathanDay\Usp\Model\ResourceModel\Block\CollectionFactory;
use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class Block
 */
class UspBlocks implements OptionSourceInterface
{
    /**
     * @var array
     */
    private $options;

    /**
     * @var \NathanDay\Usp\Model\ResourceModel\Block\CollectionFactory
     */
    private $collectionFactory;

    /**
     * @param \NathanDay\Usp\Model\ResourceModel\Block\CollectionFactory $collectionFactory
     */
    public function __construct(
        CollectionFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function toOptionArray()
    {
        if (!$this->options) {
            $this->options = $this->collectionFactory->create()
                ->addIsActiveFilter()
                ->toOptionIdArray();
        }

        return $this->options;
    }
}
