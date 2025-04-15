<?php

namespace Themestar\LoginCustom\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\UrlInterface;


class Data extends AbstractHelper
{
    const XML_PATH_LOGO = 'logincustom/general/logo';  // Path for logo setting
    const XML_PATH_ENABLED = 'logincustom/general/enable'; // Path for enable setting
    const XML_PATH_BACKGROUND_IMAGE = 'logincustom/general/background_image'; // Path to background image config
    const XML_PATH_CUSTOM_CSS = 'logincustom/general/custom_css';  // Custom CSS XML path
    const XML_PATH_COPYRIGHT = 'logincustom/general/copyright';  // Custom CSS XML path

    
      /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlBuilder;

    /**
     * Data constructor.
     *
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Framework\UrlInterface $urlBuilder
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        UrlInterface $urlBuilder
    ) {
        parent::__construct($context);
        $this->urlBuilder = $urlBuilder;
    }

      /**
     * Get the logo URL from the configuration
     *
     * @return string|null
     */
    public function getLogoUrl()
    {
        $logoPath = $this->scopeConfig->getValue(self::XML_PATH_LOGO, ScopeInterface::SCOPE_STORE);
        return $logoPath ? $this->urlBuilder->getBaseUrl(['_type' => \Magento\Framework\UrlInterface::URL_TYPE_MEDIA]) . 'logincustom/logo/' . $logoPath : null;
    }

    /**
     * Check if the module is enabled
     *
     * @return bool
     */
    public function isModuleEnabled()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_ENABLED, ScopeInterface::SCOPE_STORE);
    }
    
     public function getCopyrightText()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_COPYRIGHT, ScopeInterface::SCOPE_STORE);
    }

   /**
     * Get the background image URL from the configuration
     *
     * @return string|null
     */
    public function getBackgroundImageUrl()
    {
        $backgroundImagePath = $this->scopeConfig->getValue(self::XML_PATH_BACKGROUND_IMAGE, ScopeInterface::SCOPE_STORE);
        return $backgroundImagePath ? $this->urlBuilder->getBaseUrl(['_type' => \Magento\Framework\UrlInterface::URL_TYPE_MEDIA]) . 'logincustom/background/' . $backgroundImagePath : null;
    }

    /**
     * Get custom CSS from config
     *
     * @return string
     */
    public function getCustomCss()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_CUSTOM_CSS, ScopeInterface::SCOPE_STORE);
    }
}
