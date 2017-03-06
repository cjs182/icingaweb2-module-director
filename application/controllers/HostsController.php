<?php

namespace Icinga\Module\Director\Controllers;

use Icinga\Module\Director\Restriction\BetaHostgroupRestriction;
use Icinga\Module\Director\Tables\IcingaHostTable;
use Icinga\Module\Director\Web\Controller\ObjectsController;

class HostsController extends ObjectsController
{
    protected $multiEdit = array(
        'imports',
        'groups',
        'disabled'
    );

    protected function checkDirectorPermissions()
    {
        $this->assertPermission('director/hosts');
    }

    /**
     * @param IcingaHostTable $table
     */
    protected function applyTableFilters($table)
    {
        $table->addObjectRestriction(
            new BetaHostgroupRestriction($this->db(), $this->Auth())
        );
    }
}
