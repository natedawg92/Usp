<?php

namespace NathanDay\Usp\Block\Adminhtml\Block\Edit;

use Magento\Backend\Block\Widget\Context;
use NathanDay\Usp\Api\BlockRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class GenericButton
 */
class GenericButton
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var BlockRepositoryInterface
     */
    protected $blockRepository;

    /**
     * @param Context $context
     * @param BlockRepositoryInterface $blockRepository
     */
    public function __construct(
        Context $context,
        BlockRepositoryInterface $blockRepository
    ) {
        $this->context = $context;
        $this->blockRepository = $blockRepository;
    }

    /**
     * Return USP block ID
     *
     * @return int|null
     */
    public function getBlockId()
    {
        try {
            return $this->blockRepository->getById(
                $this->context->getRequest()->getParam('block_id')
            )->getId();
        } catch (NoSuchEntityException $e) {
        }
        return null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
