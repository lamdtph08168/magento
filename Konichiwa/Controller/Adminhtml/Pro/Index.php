<?php
 
namespace Ecentura\Konichiwa\Controller\Adminhtml\Pro;
 
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;
 
class Index extends Action
{
    protected $_pageFactory;
 
    public function __construct(Action\Context $context, PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }
 
    public function execute()
    {
        $resultPage = $this->_pageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('List Products'));
        return $resultPage;
    }
}