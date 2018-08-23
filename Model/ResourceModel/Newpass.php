<?php
namespace Godogi\Forcenewpassword\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Newpass extends AbstractDb
{
	public function _construct()
	{
		$this->_init('godogi_forcenewpassword', 'entity_id');
	}
	
}
