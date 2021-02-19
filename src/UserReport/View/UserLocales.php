<?php

namespace A3020\UserReport\View;

use Concrete\Core\Application\ApplicationAwareInterface;
use Concrete\Core\Application\ApplicationAwareTrait;
use Concrete\Core\View\View;

class UserLocales implements ApplicationAwareInterface
{
    use ApplicationAwareTrait;

    public function view()
    {
        $view = new View('user_locales');
        $view->setPackageHandle('user_report');

        $view->addScopeItems([
            'locales' => $this->app->make(\A3020\UserReport\Statistics\UserLocales::class)->get(),
        ]);

        return $view->render();
    }
}
