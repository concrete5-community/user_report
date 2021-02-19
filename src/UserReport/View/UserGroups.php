<?php

namespace A3020\UserReport\View;

use Concrete\Core\Application\ApplicationAwareInterface;
use Concrete\Core\Application\ApplicationAwareTrait;
use Concrete\Core\View\View;

class UserGroups implements ApplicationAwareInterface
{
    use ApplicationAwareTrait;

    public function view()
    {
        $view = new View('user_groups');
        $view->setPackageHandle('user_report');

        $view->addScopeItems([
            'groups' => $this->app->make(\A3020\UserReport\Statistics\UserGroups::class)->get(),
        ]);

        return $view->render();
    }
}
