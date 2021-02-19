<?php

namespace Concrete\Package\UserReport\Controller\SinglePage\Dashboard\Users;

use A3020\UserReport\View\Chart\UsersActivity;
use A3020\UserReport\View\Chart\UsersCreated;
use A3020\UserReport\View\GeneralStatistics;
use A3020\UserReport\View\UserGroups;
use A3020\UserReport\View\UserLastOnline;
use A3020\UserReport\View\UserLocales;
use Concrete\Core\Asset\AssetList;
use Concrete\Core\Page\Controller\DashboardPageController;

final class UserReport extends DashboardPageController
{
    public function view()
    {
        // Charts
        $this->set('usersCreatedChart', $this->app->make(UsersCreated::class)->view());
        $this->set('usersActivityChart', $this->app->make(UsersActivity::class)->view());

        // Other statistics
        $this->set('generalStatistics', $this->app->make(GeneralStatistics::class)->view());
        $this->set('userGroups', $this->app->make(UserGroups::class)->view());
        $this->set('userLocales', $this->app->make(UserLocales::class)->view());
        $this->set('usersLastOnline', $this->app->make(UserLastOnline::class)->view());
    }

    public function on_before_render()
    {
        parent::on_before_render();

        $al = AssetList::getInstance();

        $al->register('javascript', 'page_report/chart', 'js/Chart.bundle.min.js', [], 'page_report');
        $al->register('javascript', 'page_report/datatables', 'js/datatables.min.js', [], 'page_report');
        $this->requireAsset('javascript', 'page_report/chart');
        $this->requireAsset('javascript', 'page_report/datatables');

        $al->register('css', 'page_report/summary', 'css/summary.css', [], 'page_report');
        $al->register('css', 'page_report/datatables', 'css/datatables.css', [], 'page_report');
        $this->requireAsset('css', 'page_report/summary');
        $this->requireAsset('css', 'page_report/datatables');
    }
}
