<?php
/**
 * @author MageBild Team
 * @copyright Copyright (c) 2019 Magebild
 * @package Magebild_Base
 */

namespace Magebild\Base\Block\Adminhtml;

use Magebild\Base\Model\ModuleListProcessor;
use Magento\Framework\Data\Form\Element\AbstractElement;

/**
 * Class Extensions
 *
 * @package Magebild\Base\Block\Adminhtml
 */
class Extensions extends \Magento\Config\Block\System\Config\Form\Field
{
    protected $_template = 'Magebild_Base::modules.phtml';

    /**
     * @var ModuleListProcessor $moduleListProcessor
     */
    protected $moduleListProcessor;

    /**
     * Extensions constructor.
     *
     * @param ModuleListProcessor $moduleListProcessor
     * @param \Magento\Backend\Block\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magebild\Base\Model\ModuleListProcessor $moduleListProcessor,
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    ) {
        parent::__construct(
            $context,
            $data
        );
        $this->moduleListProcessor = $moduleListProcessor;
    }

    /**
     * Implementation
     *
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        return $this->toHtml();
    }

    /**
     * Get module list
     *
     * @return array
     */
    public function getModuleList()
    {
        return $this->moduleListProcessor->getModuleList();
    }
}
