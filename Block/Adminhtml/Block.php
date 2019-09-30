<?php

namespace NathanDay\Usp\Block\Adminhtml;

/**
 * Adminhtml USP blocks content block
 */
class Block extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_blockGroup = 'NathanDay_Usp';
        $this->_controller = 'adminhtml_block';
        $this->_headerText = __('Static Blocks');
        $this->_addButtonLabel = __('Add New Block');
        parent::_construct();
    }
}
