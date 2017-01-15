<?php
/**
 * See LICENSE.txt for license details.
 */

namespace MageWare\SmtpMailer\Model;

class Config
{
    const XML_PATH_ENABLED = 'mageware_smtpmailer/transactional/enabled';
    const XML_PATH_SECURITY = 'mageware_smtpmailer/transactional/security';
    const XML_PATH_HOST = 'mageware_smtpmailer/transactional/host';
    const XML_PATH_PORT = 'mageware_smtpmailer/transactional/port';
    const XML_PATH_AUTH = 'mageware_smtpmailer/transactional/auth';
    const XML_PATH_USERNAME = 'mageware_smtpmailer/transactional/username';
    const XML_PATH_PASSWORD = 'mageware_smtpmailer/transactional/password';

    /**
     * @var array
     */
    protected $storeStack;

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->storeStack = [];
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @param int $store
     * @return \MageWare\SmtpMailer\Model\Config
     */
    public function pushStore($store)
    {
        array_push($this->storeStack, $store);

        return $this;
    }

    /**
     * @return int|null
     */
    public function popStore()
    {
        return array_pop($this->storeStack);
    }

    /**
     * @return int|null
     */
    public function peekStore()
    {
        return end($this->storeStack);
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_ENABLED,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $this->peekStore()
        );
    }

    /**
     * @return string
     */
    public function getSecurity()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_SECURITY,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $this->peekStore()
        );
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_HOST,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $this->peekStore()
        );
    }

    /**
     * @return string
     */
    public function getPort()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_PORT,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $this->peekStore()
        );
    }

    /**
     * @return string
     */
    public function getAuth()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_AUTH,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $this->peekStore()
        );
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_USERNAME,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $this->peekStore()
        );
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_PASSWORD,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $this->peekStore()
        );
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        $config = [];
        if ($port = $this->getPort()) {
            $config['port'] = $port;
        }
        if ($ssl = $this->getSecurity()) {
            $config['ssl'] = $ssl;
        }
        if ($auth = $this->getAuth()) {
            $config['auth'] = $auth;
            if ($username = $this->getUsername()) {
                $config['username'] = $username;
            }
            if ($password = $this->getPassword()) {
                $config['password'] = $password;
            }
        }
        return $config;
    }
}
