<?php
/**
 * See LICENSE.txt for license details.
 */

namespace MageWare\SmtpMailer\Model;

class TransportInterfaceFactory extends \Magento\Framework\Mail\TransportInterfaceFactory
{
    /**
     * @var \MageWare\SmtpMailer\Model\Config
     */
    protected $config;

    /**
     * Factory constructor
     *
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     * @param \MageWare\SmtpMailer\Model\Config $config
     * @param string $instanceName
     */
    public function __construct(
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \MageWare\SmtpMailer\Model\Config $config,
        $instanceName = 'Magento\Framework\Mail\TransportInterface'
    ) {
        parent::__construct($objectManager, $instanceName);

        $this->config = $config;
    }

    /**
     * Create class instance with specified parameters
     *
     * @param array $data
     * @return \Magento\Framework\Mail\TransportInterface
     */
    public function create(array $data = [])
    {
        if ($this->config->isEnabled()) {
            return $this->_objectManager->create(
                'MageWare\SmtpMailer\Model\Transport', [
                    'host' => $this->config->getHost(),
                    'config' => $this->config->getConfig()
                ]
            );
        }
        return $this->_objectManager->create($this->_instanceName, $data);
    }
}
