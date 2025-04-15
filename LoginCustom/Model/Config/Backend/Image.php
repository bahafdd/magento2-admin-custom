<?php

namespace Themestar\LoginCustom\Model\Config\Backend;

use Magento\Config\Model\Config\Backend\Image as BackendImage;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Filesystem;
use Magento\MediaStorage\Model\File\UploaderFactory;

class Image extends BackendImage
{   
    const UPLOAD_DIR = 'logincustom/logo';
    
    

    /**
     * Allowed file extensions
     *
     * @return string[]
     */
    protected function _getAllowedExtensions()
    {
        return ['jpg', 'jpeg', 'gif', 'png', 'svg'];
    }

    /**
     * Return path to the directory for uploaded files
     *
     * @return string
     * @throws LocalizedException
     */
    protected function _getUploadDir()
    {
        return $this->_mediaDirectory->getAbsolutePath($this->_appendScopeInfo(self::UPLOAD_DIR));
    }

    /**
     * Determines whether scope info is added to the upload directory path
     *
     * @return bool
     */
    protected function _addWhetherScopeInfo()
    {
        return true;
    }

    /**
     * Logic to handle image file upload and delete old images if necessary
     *
     * @return $this
     * @throws LocalizedException
     */
    public function beforeSave()
    {
        $value = $this->getValue();
        $deleteFlag = is_array($value) && !empty($value['delete']);

        // Delete old file if needed
        if ($deleteFlag || $this->getTmpFileName()) {
            $oldImagePath = $this->_mediaDirectory->getAbsolutePath(self::UPLOAD_DIR . '/' . $this->getOldValue());
            if ($this->getOldValue() && $this->_mediaDirectory->isExist($oldImagePath)) {
                $this->_mediaDirectory->delete($oldImagePath);
            }
        }

        return parent::beforeSave();
    }

    /**
     * Get the temporary file name
     *
     * @return string|null
     */
    protected function getTmpFileName()
    {
        if (isset($_FILES['groups']['tmp_name'][$this->getGroupId()]['fields'][$this->getField()]['value'])) {
            return $_FILES['groups']['tmp_name'][$this->getGroupId()]['fields'][$this->getField()]['value'];
        }
        return null;
    }

    /**
     * Helper to check if the temporary file is available
     *
     * @param array $value
     * @return bool
     */
    private function isTmpFileAvailable($value)
    {
        return is_array($value) && isset($value['tmp_name']);
    }

    /**
     * Get uploaded image name from the $_FILES array
     *
     * @param array $value
     * @return string
     */
    private function getUploadedImageName($value)
    {
        return is_array($value) && isset($value['name']) ? $value['name'] : '';
    }
}

