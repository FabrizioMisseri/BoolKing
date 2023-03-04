<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = ['Wi-fi','Piscina','Posto macchina','Portineria','Sauna','Vista mare','Jacuzi','Pet','Lavatrice','Cucina','Asciugacapelli','Tv','Camino','Palestra','Postazione di lavoro','Colazione'];

        foreach ($services as $service) {
            $new_service = new Service();
            $new_service->name = $service;
            $new_service->save();
        }
    }
}
