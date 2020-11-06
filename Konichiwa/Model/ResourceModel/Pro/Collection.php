<?php
 
namespace Ecentura\Konichiwa\Model\ResourceModel\Pro;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
 
    protected function _construct()
    {
        $this->_init('Ecentura\Konichiwa\Model\Pro', 'Ecentura\Konichiwa\Model\ResourceModel\Pro');
    }
}