<?php
namespace Godogi\Forcenewpassword\Observer;

use Magento\Framework\Event\ObserverInterface;

class PasswordUpdated implements ObserverInterface
{
		protected $_newpassFactory;

    	/**
     	* Customer session
     	*
     	* @var \Magento\Customer\Model\Session
     	*/
    	protected $_customerSession;
    	
    	/**
     	* @var \Magento\Framework\App\Response\RedirectInterface
     	*/
    	protected $_redirect;
	
		public function __construct(
    		\Godogi\Forcenewpassword\Model\NewpassFactory $newpassFactory,
      	\Magento\Customer\Model\Session $customerSession
		)
		{
    		$this->_newpassFactory = $newpassFactory;
    		$this->_customerSession = $customerSession;
		}

    	public function execute(\Magento\Framework\Event\Observer $observer)
    	{
    			$customer = $this->_customerSession->getCustomer();
    			$costomerId = $customer->getId();
				
    			$newPassC = $this->_newpassFactory->create();
    			$collection = $newPassC->getCollection();
        	
        		$passwordUpdated = 0;
				foreach($collection as $item){
					if($item->getCustomerId() == $costomerId){
						if($item->getPasswordUpdated()){
						}else{
							$newPass = $this->_newpassFactory->create()->load($item->getEntityId());
        					$newPass->setPasswordUpdated(true);
        					$newPass->save();			
						}
					}
				}
            return $this; //if in allowed actions do nothing.
		}
}