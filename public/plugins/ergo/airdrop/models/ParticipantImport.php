<?php

namespace Ergo\Airdrop\Models;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Ergo\Airdrop\Models\Participant;

class ParticipantImport extends \Backend\Models\ImportModel
{
    /**
     * @var array The rules to be applied to the data.
     */
    public $rules = [];

    public function importData($results, $sessionKey = null)
    {
        Db::table((new Participant)->getTable())->truncate();
        foreach ($results as $row => $data) {
            try {
                $participant = new Participant;
                $participant->fill($data);
                $participant->save();

                $this->logCreated();
            }
            catch (\Exception $ex) {
                $this->logError($row, $ex->getMessage());
            }

        }
    }
}