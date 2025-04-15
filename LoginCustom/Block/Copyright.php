<?php

namespace Themestar\LoginCustom\Block;

use Magento\Backend\Block\Page\Copyright as MagentoCopyright;
use Themestar\LoginCustom\Helper\Data as LoginCustomHelper;

class Copyright extends MagentoCopyright
{
    protected $helper;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        LoginCustomHelper $helper,
        array $data = []
    ) {
        $this->helper = $helper;
        parent::__construct($context, $data);
    }


    public function getCopyrightText()
    {
        // Return the raw HTML from the helper
        return $this->helper->getCopyrightText();
    }
    
      /**
     * Check if the module is enabled
     *
     * @return bool
     */
    public function isModuleEnabled()
    {
        return $this->helper->isModuleEnabled();
    }
}