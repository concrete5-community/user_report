<?php

namespace A3020\UserReport\View;

use Concrete\Core\Application\ApplicationAwareInterface;
use Concrete\Core\Application\ApplicationAwareTrait;
use Concrete\Core\View\View;

class UserLastOnline implements ApplicationAwareInterface
{
    use ApplicationAwareTrait;

    public function view()
    {
        $view = new View('user_last_online');
        $view->setPackageHandle('user_report');

        $view->addScopeItems([
            'dh' => $this->app->make('helper/date'),
            'users' => $this->app->make(\A3020\UserReport\Statistics\UserLastOnline::class)->get(),
        ]);

        return $view->render();
    }
}
