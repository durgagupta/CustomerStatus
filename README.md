# Mage2 Module Ace CustomerStatus

    ``ace/module-customerstatus``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities


## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Ace`
 - Enable the module by running `php bin/magento module:enable Ace_CustomerStatus`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require ace/module-customerstatus`
 - enable the module by running `php bin/magento module:enable Ace_CustomerStatus`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration
    composer config repositories.ace-customerstatus git https://github.com/durgagupta/CustomerStatus.git
    composer require ace/module-customerstatus:dev-master


## Specifications

 - Plugin
	- aroundAuthenticate - Magento\Customer\Model\AccountManagement > Ace\CustomerStatus\Plugin\Frontend\Magento\Customer\Model\AccountManagement


## Attributes

 - Customer - Customer Status (customer_status)
 
![Drag Racing](Dragster.jpg)
