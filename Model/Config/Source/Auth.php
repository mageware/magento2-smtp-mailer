<?php
/**
 * See LICENSE.txt for license details.
 */

namespace MageWare\SmtpMailer\Model\Config\Source;

class Auth implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            [
                'value' => '',
                'label' => 'None'
            ],
            [
                'value' => 'plain',
                'label' => 'PLAIN'
            ],
            [
                'value' => 'login',
                'label' => 'LOGIN'
            ],
            [
                'value' => 'crammd5',
                'label' => 'CRAM-MD5'
            ]
        ];
    }
}
