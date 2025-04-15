<?php

namespace Themestar\LoginCustom\Block;

use Magento\Backend\Block\Template;
use Themestar\LoginCustom\Helper\Data as LoginCustomHelper;

class Header extends Template
{
    /**
     * @var LoginCustomHelper
     */
    protected $helper;

    /**
     * Constructor
     *
     * @param \Magento\Backend\Block\Template\Context $context
     * @param LoginCustomHelper $helper
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        LoginCustomHelper $helper,
        array $data = []
    ) {
        $this->helper = $helper; // Assign the injected helper
        parent::__construct($context, $data); // Call parent constructor
    }

    /**
     * Get the helper instance
     *
     * @return LoginCustomHelper
     */
    public function getHelper()
    {
        return $this->helper;
    }

    /**
     * Get the URL of the custom logo
     *
     * @return string
     */
    public function getLogoUrl()
    {
        return $this->helper->getLogoUrl();
    }

    /**
     * Get the background image URL
     *
     * @return string
     */
    public function getBackgroundImageUrl()
    {
        return $this->helper->getBackgroundImageUrl();
    }

    /**
     * Get the custom CSS
     *
     * @return string
     */
    public function getCustomCss()
    {
        return $this->helper->getCustomCss();
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

    /**
     * Get the URL for the admin home page
     *
     * @return string
     */
    public function getHomePageUrl()
    {
        return $this->getUrl('admin/dashboard/index');
    }
}
