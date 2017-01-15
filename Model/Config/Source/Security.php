<?php
/**
 * See LICENSE.txt for license details.
 */

namespace MageWare\SmtpMailer\Model\Config\Source;

class Security implements \Magento\Framework\Option\ArrayInterface
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
                'value' => 'ssl',
                'label' => 'SSL'
            ],
            [
                'value' => 'tls',
                'label' => 'TLS'
            ]
        ];
    }
}
