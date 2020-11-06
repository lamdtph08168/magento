<?php
 
namespace Ecentura\Konichiwa\Model;
 
class Pro extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('Ecentura\Konichiwa\Model\ResourceModel\Pro');
    }
}