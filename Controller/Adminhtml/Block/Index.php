<?php

namespace NathanDay\Usp\Controller\Adminhtml\Block;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\Model\View\Result\Page\Interceptor as PageInterceptor;

class Index extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'NathanDay_Usp::block';

    /** @var PageFactory */
    protected $resultPageFactory;

    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Default USP Grid View
     */
    public function execute()
    {
        /** @var PageInterceptor $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('USP Blocks'));

        return $resultPage;
    }
}
