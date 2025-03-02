<?php

namespace NathanDay\Usp\Model\ResourceModel\Block\Relation\Store;

use NathanDay\Usp\Model\ResourceModel\Block;
use Magento\Framework\EntityManager\Operation\ExtensionInterface;

/**
 * Class ReadHandler
 */
class ReadHandler implements ExtensionInterface
{
    /**
     * @var Block
     */
    protected $resourceBlock;

    /**
     * @param Block $resourceBlock
     */
    public function __construct(
        Block $resourceBlock
    ) {
        $this->resourceBlock = $resourceBlock;
    }

    /**
     * @param object $entity
     * @param array $arguments
     * @return object
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function execute($entity, $arguments = [])
    {
        if ($entity->getId()) {
            $stores = $this->resourceBlock->lookupStoreIds((int)$entity->getId());
            $entity->setData('store_id', $stores);
            $entity->setData('stores', $stores);
        }
        return $entity;
    }
}
