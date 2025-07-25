# Magebild_Base

## Description

Base module for any Magebild developed module. This would create a common admin menu and ACL

## How to use
Add this module as a dependency in your `composer.json` file

```
"require": {
         "magebild/module-base": "^1.0",
         ..
         },
```
## system.xml

Attach your menu sections to the `magebild` tab

```
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:module:Magento_Config:etc/system_file.xsd">
    <system>
        <tab id="magebild" translate="label" sortOrder="10">
            <label>Magebild Extensions</label>
        </tab>
    </system>
</config>
```

## menu.xml

Attach your menu and shortcuts to the system configuration

```
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:module:Magento_Backend:etc/menu.xsd">
    <menu>
         <add id="Magebild::menu" title="Magebild" module="Magebild_Base" sortOrder="10" resource="Magebild_Base::menu"/>
         <add id="Magebild::features" title="Features" module="Magebild_Base" parent="Magebild::menu" sortOrder="1" resource="Magebild_Base::features"/>
         <add id="Magebild::integration" title="Integrations" module="Magebild_Base" parent="Magebild::menu" sortOrder="1" resource="Magebild_Base::integration"/>
         <add id="Magebild::others" title="Others" module="Magebild_Base" parent="Magebild::menu" sortOrder="2" resource="Magebild_Base::others"/>
    </menu>
</config>
```

## Changelog


## Compatibility

- Magento 2.4 :heavy_check_mark:
- Magento 2.3 :heavy_check_mark:
- Magento 2.2 :heavy_check_mark:
