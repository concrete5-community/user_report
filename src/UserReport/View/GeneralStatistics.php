<?php

namespace A3020\UserReport\View;

use A3020\UserReport\Statistics\General;
use Concrete\Core\Application\ApplicationAwareInterface;
use Concrete\Core\Application\ApplicationAwareTrait;
use Concrete\Core\Database\Connection\Connection;
use Concrete\Core\View\View;

class GeneralStatistics implements ApplicationAwareInterface
{
    use ApplicationAwareTrait;

    /** @var Connection */
    private $db;

    /** @var General */
    private $statistics;

    /**
     * @param Connection $db
     * @param General $statistics
     */
    public function __construct(Connection $db, General $statistics)
    {
        $this->db = $db;
        $this->statistics = $statistics;
    }

    public function view()
    {
        $view = new View('general_statistics');
        $view->setPackageHandle('user_report');

        $view->addScopeItems([
            'totalUsers' => $this->statistics->getTotalUsers(),
            'totalActive' => $this->statistics->getTotalActive(),
            'totalInactive' => $this->statistics->getTotalInactive(),
            'totalValidated' => $this->statistics->getTotalValidated(),
            'totalNotValidated' => $this->statistics->getTotalNotValidated(),
            'totalGroups' => $this->statistics->getTotalGroups(),
            'totalGroupSets' => $this->statistics->getTotalGroupSets(),
        ]);

        return $view->render();
    }
}
