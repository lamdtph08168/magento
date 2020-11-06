<?php
 
namespace Ecentura\Konichiwa\Model\ResourceModel\Post;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'cate_id';
 
    protected function _construct()
    {
        $this->_init('Ecentura\Konichiwa\Model\Post', 'Ecentura\Konichiwa\Model\ResourceModel\Post');
    }
}