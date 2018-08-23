<?php
namespace Godogi\Forcenewpassword\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $_newpassFactory;
	private $logger;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Godogi\Forcenewpassword\Model\NewpassFactory $newpassFactory,
		\Psr\Log\LoggerInterface $logger)
	{
		$this->_pageFactory = $pageFactory;
		$this->_newpassFactory = $newpassFactory;
		$this->logger = $logger;
		return parent::__construct($context);
	}

	public function execute()
	{
		try {
       	echo '1<br>';
       	$newPass = $this->_newpassFactory->create();
        	$collection = $newPass->getCollection();
			/*
			foreach($collection as $item){
				echo "<pre>";
				print_r($item->getData());
				echo "</pre>";
			}
			*/
			
			echo '2';
    	}catch (\Exception $e) {
        	echo 'OOO';
        	$this->logger->critical($e->getMessage());
        	print_r($e->getMessage());
    	}catch (\Error $e) {
        	echo '111';
    	}
		
	}
}
