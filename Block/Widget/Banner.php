<?php

namespace NathanDay\Usp\Block\Widget;

use Magento\Framework\Data\Collection;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;
use NathanDay\Usp\Model\ResourceModel\Block\CollectionFactory;
use NathanDay\Usp\Model\ResourceModel\Block\Collection as UspBlockCollection;

class Banner extends Template implements BlockInterface
{
    /** @var string $_template */
    protected $_template = "widget/banner.phtml";

    /** @var UspBlockCollection $uspBlocks */
    protected $uspBlocks;

    const BREAKPOINTS = [
        's' => 'mobile',
        'm'=> 'tablet',
        'l' => 'desktop',
        'xl' => 'large_desktop',
    ];
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    public function __construct(Template\Context $context, CollectionFactory $collectionFactory, array $data = [])
    {
        parent::__construct($context, $data);
        $this->collectionFactory = $collectionFactory;
    }

    public function getUspBlocks() : UspBlockCollection
    {
        if (!isset($this->uspBlocks)) {
            $this->uspBlocks = $this->collectionFactory->create()
                ->addIsActiveFilter()
                ->filterByIdentifier(explode(',', $this->getUspBlockIds()))
                ->setOrder('sort_order', Collection::SORT_ORDER_DESC);
        }

        return $this->uspBlocks;
    }

    public function getCssClasses() : string
    {
        $cssClasses = '';
        $count = $this->getUspBlocks()->count();

        foreach (self::BREAKPOINTS as $breakpoint => $viewport) {
            $cssClasses .= ' usp-' . $breakpoint . '-' . $count . '-' . $this->getData($viewport);
        }

        return trim($cssClasses);
    }
}
