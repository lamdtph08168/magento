<?php
 
namespace Ecentura\Konichiwa\Setup;
 
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
 
class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
        $installer = $setup;
 
        $installer->startSetup();
//category
        if(version_compare($context->getVersion(), '1.0.9', '<')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('ecentura_konichiwa_cate')
            )
                ->addColumn(
                    'cate_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'nullable' => false,
                        'primary' => true,
                        'unsigned' => true,
                    ],
                    'Cate ID'
                )
                ->addColumn(
                    'name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    ['nullable => false'],
                    'Cate Name'
                )
                
 
               
                ->setComment('Post Table');
            $installer->getConnection()->createTable($table);
 
            $installer->getConnection()->addIndex(
                $installer->getTable('ecentura_konichiwa_cate'),
                $setup->getIdxName(
                    $installer->getTable('ecentura_konichiwa_cate'),
                    ['name'],
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                ),
                ['name'],
                \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
            );
        }
//product
        if(version_compare($context->getVersion(), '1.0.9', '<')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('ecentura_konichiwa_products')
            )
                ->addColumn(
                    'id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'nullable' => false,
                        'primary' => true,
                        'unsigned' => true,
                    ],
                    'Products ID'
                )
                ->addColumn(
                    'name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    ['nullable => false'],
                    'Product Name'
                )
                ->addColumn(
                    'thumbnail',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    '64k',
                    [],
                    'Post Thumbnail'
                )
                ->addColumn(
                    'image',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    '64k',
                    [],
                    'Post Image'
                )
                ->addColumn(
                    'client',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    [],
                    'Post Client'
                )
                ->addColumn(
                    'project',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    '64k',
                    [],
                    'Post Project'
                )
                ->addColumn(
                    'skill',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    '64k',
                    [],
                    'Post Skill'
                )
                ->addColumn(
                    'status',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    1,
                    [],
                    'Post Status'
                )
                ->addColumn(
                    'content',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    '64k',
                    [],
                    'Post Post Content'
                )
                ->addColumn(
                    'comment',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    '64k',
                    [],
                    'Post Comment'
                )
                ->addColumn(
                    'cate_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [],
                    'Products ID'
                )
                
                
 
               
                ->setComment('Post Table');
            $installer->getConnection()->createTable($table);
 
            $installer->getConnection()->addIndex(
                $installer->getTable('ecentura_konichiwa_products'),
                $setup->getIdxName(
                    $installer->getTable('ecentura_konichiwa_products'),
                    ['name', 'thumbnail', 'image','client', 'project', 'skill','content', 'comment'],
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                ),
                ['name', 'thumbnail', 'image','client', 'project', 'skill','content','comment'],
                \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
            );
        }
        $installer->endSetup();
    }
}