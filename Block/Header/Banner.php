<?php

namespace NathanDay\Usp\Block\Header;

use Magento\Framework\View\Element\Template;
use NathanDay\Usp\Model\ResourceModel\Block\CollectionFactory as BlockCollectionFactory;
use Magento\Store\Model\ScopeInterface;

class Banner extends Template
{
    const CONFIG_PATH_PREFIX = 'usp_config/general/';
    const CONFIG_ENABLE = self::CONFIG_PATH_PREFIX . 'enable';
    const CONFIG_COUNT = self::CONFIG_PATH_PREFIX . 'count';
    const CONFIG_BLOCKS_S = self::CONFIG_PATH_PREFIX . 'blocks_s';
    const CONFIG_BLOCKS_M = self::CONFIG_PATH_PREFIX . 'blocks_m';
    const CONFIG_BLOCKS_L = self::CONFIG_PATH_PREFIX . 'blocks_l';
    const CONFIG_BLOCKS_XL = self::CONFIG_PATH_PREFIX . 'blocks_xl';

    const BREAKPOINTS = [
        's' => self::CONFIG_BLOCKS_S,
        'm'=> self::CONFIG_BLOCKS_M,
        'l' => self::CONFIG_BLOCKS_L,
        'xl' => self::CONFIG_BLOCKS_XL,
    ];

    /** @var BlockCollectionFactory */
    protected $blockCollectionFactory;

    public function __construct(
        Template\Context $context,
        BlockCollectionFactory $blockCollectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);

        $this->blockCollectionFactory = $blockCollectionFactory;
    }

    public function getUspBlocks($pageSize = null)
    {
        if (!$pageSize) {
            $pageSize = $this->getConfig(self::CONFIG_COUNT);
        }

        return $this->blockCollectionFactory->create()
            ->addStoreFilter($this->_storeManager->getStore()->getId())
            ->addFieldToFilter('is_active', 1)
            ->setPageSize($pageSize);
    }

    public function getConfig($path, $scope = null, $scopeCode = null)
    {
        $scope = $scope?: ScopeInterface::SCOPE_STORE;
        $scopeCode = $scopeCode?: $this->_storeManager->getStore()->getCode();

        return $this->_scopeConfig->getValue($path, $scope, $scopeCode);

    }

    public function getCssClasses()
    {
        $cssClasses = '';
        $slides = $this->getConfig(self::CONFIG_COUNT);

        foreach (self::BREAKPOINTS as $breakpoint => $path) {
            $cssClasses .= 'usp-' . $breakpoint . '-' . $slides . '-' . $this->getConfig($path) . ' ';
        }

        return $cssClasses;
    }
}