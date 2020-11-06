<?php
 
namespace Ecentura\Konichiwa\Model\ResourceModel;
 
class Pro extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('ecentura_konichiwa_products', 'id');
    }
}