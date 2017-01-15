<?php
/**
 * See LICENSE.txt for license details.
 */

namespace MageWare\SmtpMailer\Model\Newsletter;

class Config extends \MageWare\SmtpMailer\Model\Config
{
    const XML_PATH_TRANSACTIONAL = 'mageware_smtpmailer/nontransactional/transactional';
    const XML_PATH_ENABLED = 'mageware_smtpmailer/nontransactional/enabled';
    const XML_PATH_SECURITY = 'mageware_smtpmailer/nontransactional/security';
    const XML_PATH_HOST = 'mageware_smtpmailer/nontransactional/host';
    const XML_PATH_PORT = 'mageware_smtpmailer/nontransactional/port';
    const XML_PATH_AUTH = 'mageware_smtpmailer/nontransactional/auth';
    const XML_PATH_USERNAME = 'mageware_smtpmailer/nontransactional/username';
    const XML_PATH_PASSWORD = 'mageware_smtpmailer/nontransactional/password';

    /**
     * @return bool
     */
    public function isTransactional()
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_TRANSACTIONAL,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $this->peekStore()
        );
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        if ($this->isTransactional()) {
            return parent::isEnabled();
        }

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
        if ($this->isTransactional()) {
            return parent::getSecurity();
        }

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
        if ($this->isTransactional()) {
            return parent::getHost();
        }

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
        if ($this->isTransactional()) {
            return parent::getPort();
        }

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
        if ($this->isTransactional()) {
            return parent::getAuth();
        }

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
        if ($this->isTransactional()) {
            return parent::getUsername();
        }

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
        if ($this->isTransactional()) {
            return parent::getPassword();
        }

        return $this->scopeConfig->getValue(
            self::XML_PATH_PASSWORD,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $this->peekStore()
        );
    }
}
