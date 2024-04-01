<?php

namespace App\Console\Commands;

use App\Services\OnetOccupationListSync;
use Illuminate\Console\Command;

class RefreshOccupationList extends Command
{
    protected $signature = 'refresh:occupation_list';

    protected $description = 'Refresh ONet Occupation List';

    public function __construct(private OnetOccupationListSync $onetOccupationListSync)
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->comment('Pulling occupations from ONet');
        $occupations = $this->onetOccupationListSync->list();
        $this->info('Pulled occupations, count: ' . count($occupations));

        $this->comment('Writing to app/onet_occupations.json');
        $res = $this->onetOccupationListSync->writeToFile($occupations);

        if ($res === false) {
            $this->error('Error on writing to onet_occupations.json');
            return;
        }

        $this->info('onet_occupations.json has been refreshed successfully');
    }
}
