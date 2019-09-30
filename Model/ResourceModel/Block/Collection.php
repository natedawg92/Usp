<?php

namespace NathanDay\Usp\Model\ResourceModel\Block;

use NathanDay\Usp\Api\Data\BlockInterface;
use \NathanDay\Usp\Model\ResourceModel\AbstractCollection;

/**
 * USP Block Collection
 */
class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'block_id';

    /**
     * Event prefix
     *
     * @var string
     */
    protected $_eventPrefix = 'usp_block_collection';

    /**
     * Event object
     *
     * @var string
     */
    protected $_eventObject = 'block_collection';

    /**
     * Perform operations after collection load
     *
     * @return Collection
     * @throws \Exception
     */
    protected function _afterLoad() : self
    {
        $entityMetadata = $this->metadataPool->getMetadata(BlockInterface::class);

        $this->performAfterLoad('usp_block_store', $entityMetadata->getLinkField());

        return parent::_afterLoad();
    }

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\NathanDay\Usp\Model\Block::class, \NathanDay\Usp\Model\ResourceModel\Block::class);
        $this->_map['fields']['store'] = 'store_table.store_id';
        $this->_map['fields']['block_id'] = 'main_table.block_id';
    }

    /**
     * Returns pairs block_id - title
     *
     * @return array
     */
    public function toOptionArray() : array
    {
        return $this->_toOptionArray('block_id', 'title');
    }

    /**
     * Add filter by store
     *
     * @param int|array|\Magento\Store\Model\Store $store
     * @param bool $withAdmin
     * @return $this
     */
    public function addStoreFilter($store, $withAdmin = true) : self
    {
        $this->performAddStoreFilter($store, $withAdmin);

        return $this;
    }

    /**
     * Join store relation table if there is store filter
     *
     * @return void
     * @throws \Exception
     */
    protected function _renderFiltersBefore() : void
    {
        $entityMetadata = $this->metadataPool->getMetadata(BlockInterface::class);
        $this->joinStoreRelationTable('usp_block_store', $entityMetadata->getLinkField());
    }
}
