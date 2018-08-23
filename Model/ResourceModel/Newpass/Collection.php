<?php
namespace Godogi\Forcenewpassword\Model\ResourceModel\Newpass;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
	public function _construct()
	{
		$this->_init(
			'Godogi\Forcenewpassword\Model\Newpass', 
			'Godogi\Forcenewpassword\Model\ResourceModel\Newpass'
		);
	}
}