<?php
 
namespace Ecentura\Konichiwa\Controller\Adminhtml\Pro;
 
use Magento\Backend\App\Action;
use Ecentura\Konichiwa\Model\ProFactory;
use Magento\Backend\Model\View\Result\RedirectFactory;

 
class Save extends Action
{
    private $resultRedirect;
    private $proFactory;
 
    public function __construct(
        Action\Context $context,
        ProFactory $proFactory,
        RedirectFactory $redirectFactory
    )
    {
        parent::__construct($context);
        $this->proFactory = $proFactory;  
        $this->resultRedirect = $redirectFactory;
    }
 
    public function execute()
    {
    
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data['id']) ? $data['id'] : null;
 
        $newData = [
            'name' => $data['name'],
            'client' => $data['client'],
            'project' => $data['project'],
            'skill' => $data['skill'],
            'status' => $data['status'],    
            'content' => $data['content'],
           
           

        ];
 
        $pro = $this->proFactory->create();
        if ($id) {
            $pro->load($id);
            $this->getMessageManager()->addSuccessMessage(__('Edit thành công'));
        } else {
            $this->getMessageManager()->addSuccessMessage(__('Save thành công.'));
        }
        try{
            $pro->addData($newData);
            $pro->save();
            return $this->resultRedirect->create()->setPath('konichiwa/pro/index');
        }catch (\Exception $e){
            $this->getMessageManager()->addErrorMessage(__('Save thất bại.'));
        }
    }
}