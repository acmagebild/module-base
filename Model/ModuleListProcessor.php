<?php
/**
 * @author MageBild Team
 * @copyright Copyright (c) 2019 Magebild
 * @package Magebild_Base
 */

namespace Magebild\Base\Model;

/**
 * Class ModuleListProcessor
 *
 * @package Magebild\Base\Model
 */
class ModuleListProcessor
{
    /**
     * @var \Magento\Framework\Module\ModuleListInterface $moduleList
     */
    protected $moduleList;

    /**
     * @var \Magento\Framework\Module\PackageInfoFactory $packageInfoFactory
     */
    protected $packageInfoFactory;

    /**
     * @var array $modules
     */
    protected $modules;

    /**
     * ModuleListProcessor constructor.
     *
     * @param \Magento\Framework\Module\ModuleListInterface $moduleList
     * @param \Magento\Framework\Module\PackageInfoFactory $packageInfoFactory
     */
    public function __construct(
        \Magento\Framework\Module\ModuleListInterface $moduleList,
        \Magento\Framework\Module\PackageInfoFactory $packageInfoFactory
    ) {
        $this->moduleList = $moduleList;
        $this->packageInfoFactory = $packageInfoFactory;
    }

    /**
     * Get Magebild modules
     *
     * @return array
     */
    public function getModuleList()
    {
        if ($this->modules !== null) {
            return $this->modules;
        }
        $modules = $this->moduleList->getNames();
        $packageInfo = $this->packageInfoFactory->create();
        sort($modules);
        foreach ($modules as $moduleName) {
            if ($moduleName === 'Magebild_Base' || strpos($moduleName, 'Magebild_') === false) {
                continue;
            }
            $this->modules[] = [
                'name' => str_replace('_', ' ', $moduleName),
                'version' => $packageInfo->getVersion($moduleName)
            ];
        }
        return $this->modules;
    }
}
