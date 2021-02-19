<?php

namespace A3020\UserReport\View\Chart;

use Concrete\Core\Application\ApplicationAwareInterface;
use Concrete\Core\Application\ApplicationAwareTrait;
use Concrete\Core\View\View;

class UsersActivity implements ApplicationAwareInterface
{
    use ApplicationAwareTrait;

    public function view()
    {
        $view = new View('chart/users_activity');
        $view->setPackageHandle('user_report');

        $results = $this->app->make(\A3020\UserReport\Statistics\UsersActivity::class)->get();

        $view->addScopeItems([
            'results' => $results,
            'data' => $this->getData($results),
        ]);

        return $view->render();
    }

    /**
     * @param \A3020\UserReport\Result\UsersCreatedResult[] $results
     *
     * @return array
     */
    private function getData(array $results)
    {
        $data = [];
        foreach ($results as $result) {
            $data[] = [
                'year' => $result->getYear(),
                'month' => $result->getMonth(),
                'users' => $result->getNumberOfUsers(),
            ];
        }

        return $data;
    }
}
