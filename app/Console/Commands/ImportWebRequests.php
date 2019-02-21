<?php

namespace App\Console\Commands;

use App\Repositories\Interfaces\ICountryRepository;
use App\Repositories\Interfaces\IResponseTypeRepository;
use App\Repositories\Interfaces\IWebRequestRepository;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportWebRequests extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'web-request:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    /**
     * @var IWebRequestRepository
     */
    private $repository;

    /**
     * @var IResponseTypeRepository
     */
    private $response_type_repository;

    /**
     * @var ICountryRepository
     */
    private $country_repository;

    /**
     * ImportWebRequests constructor.
     * @param IWebRequestRepository $repository
     * @param IResponseTypeRepository $response_type_repository
     * @param ICountryRepository $country_repository
     */
    public function __construct(IWebRequestRepository $repository, IResponseTypeRepository $response_type_repository, ICountryRepository $country_repository) {
        parent::__construct();

        $this->repository               = $repository;
        $this->response_type_repository = $response_type_repository;
        $this->country_repository       = $country_repository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {

        $filepath = storage_path() . '/app/testdata.csv';

        Excel::load($filepath, function ($reader) {

            $records = $reader->get();

            $data = [];
            foreach ($records as $record) {

                $response_type = $this->response_type_repository->findByField('code', $record->response_type);
                $country       = $this->country_repository->findByField('name', $record->country_of_origin);

                $data[] = [
                    'ip'               => $record->ip,
                    'response_type_id' => $response_type->id,
                    'response_time'    => $record->response_time,
                    'country_id'       => $country->id,
                    'path'             => $record->path
                ];
            }

            $this->repository->insert($data);
        });
    }
}
