<?php

namespace Ergo\Airdrop\Models;


use Illuminate\Support\Facades\Log;

class ParticipantImport extends \Backend\Models\ImportModel
{
    /**
     * @var array The rules to be applied to the data.
     */
    public $rules = [];

    public function importData($results, $sessionKey = null)
    {
        Log::info('Import Start');
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