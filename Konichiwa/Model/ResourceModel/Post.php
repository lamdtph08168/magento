<?php
 
namespace Ecentura\Konichiwa\Model\ResourceModel;
 
class Post extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('ecentura_konichiwa_cate', 'cate_id');
    }
}