<?php

namespace NathanDay\Usp\Model\Template;

/**
 * Filter provider model
 */
class FilterProvider
{
    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager;

    /**
     * @var string
     */
    protected $_blockFilter;

    /**
     * @var array
     */
    protected $_instanceList;

    /**
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     * @param string $blockFilter
     */
    public function __construct(
        \Magento\Framework\ObjectManagerInterface $objectManager,
        $blockFilter = Filter::class
    ) {
        $this->_objectManager = $objectManager;
        $this->_blockFilter = $blockFilter;
    }

    /**
     * @param string $instanceName
     * @return \Magento\Framework\Filter\Template
     * @throws \Exception
     */
    protected function _getFilterInstance($instanceName)
    {
        if (!isset($this->_instanceList[$instanceName])) {
            $instance = $this->_objectManager->get($instanceName);

            if (!$instance instanceof \Magento\Framework\Filter\Template) {
                throw new \Exception('Template filter ' . $instanceName . ' does not implement required interface');
            }
            $this->_instanceList[$instanceName] = $instance;
        }

        return $this->_instanceList[$instanceName];
    }

    /**
     * @return \Magento\Framework\Filter\Template
     */
    public function getBlockFilter()
    {
        return $this->_getFilterInstance($this->_blockFilter);
    }
}
