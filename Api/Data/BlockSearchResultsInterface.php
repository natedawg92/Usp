<?php

namespace NathanDay\Usp\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface for USP block search results.
 * @api
 * @since 100.0.2
 */
interface BlockSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get blocks list.
     *
     * @return \NathanDay\Usp\Api\Data\BlockInterface[]
     */
    public function getItems();

    /**
     * Set blocks list.
     *
     * @param \NathanDay\Usp\Api\Data\BlockInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
