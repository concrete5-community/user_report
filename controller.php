<?php

namespace Concrete\Package\UserReport;

use A3020\UserReport\Installer;
use Concrete\Core\Package\Package;
use Concrete\Core\Support\Facade\Package as PackageFacade;

/**
 * @copyright A3020
 * @see https://a3020.com
 */
class Controller extends Package
{
    protected $pkgHandle = 'user_report';
    protected $appVersionRequired = '8.0.0';
    protected $pkgVersion = '0.9.0';
    protected $pkgAutoloaderRegistries = [
        'src/UserReport' => '\A3020\UserReport',
    ];

    public function getPackageName()
    {
        return t('User Report');
    }

    public function getPackageDescription()
    {
        return t('Display user related statistics.');
    }

    public function install()
    {
        $pkg = parent::install();

        $installer = $this->app->make(Installer::class);
        $installer->install($pkg);
    }

    public function upgrade()
    {
        parent::upgrade();

        $pkg = PackageFacade::getByHandle($this->pkgHandle);

        $installer = $this->app->make(Installer::class);
        $installer->install($pkg);
    }
}
