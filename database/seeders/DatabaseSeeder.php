<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\ServiceRequest;
use App\Models\Diagnostic;
use App\Models\Repair;
use App\Models\RepairPart;
use App\Models\Part;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Korisnici
        $klijent1 = User::updateOrCreate(['email' => 'klijent@tahoservis.com'], [
            'name'     => 'Jovan',
            'surname'  => 'Petrović',
            'password' => Hash::make('password123'),
            'phone'    => '+381 60 111 2233',
            'role'     => 'klijent',
        ]);

        $klijent2 = User::updateOrCreate(['email' => 'ana@tahoservis.com'], [
            'name'     => 'Ana',
            'surname'  => 'Ković',
            'password' => Hash::make('password123'),
            'phone'    => '+381 60 222 3344',
            'role'     => 'klijent',
        ]);

        $serviser = User::updateOrCreate(['email' => 'serviser@tahoservis.com'], [
            'name'     => 'Marko',
            'surname'  => 'Nikolić',
            'password' => Hash::make('password123'),
            'phone'    => '+381 60 333 4455',
            'role'     => 'serviser',
        ]);

        User::updateOrCreate(['email' => 'dimi@gmail.com'], [
            'name'     => 'Dimitrije',
            'surname'  => 'Riznic',
            'password' => Hash::make('password123'),
            'phone'    => '+381 233 5592',
            'role'     => 'serviser',
        ]);

        User::updateOrCreate(['email' => 'admin@tahoservis.com'], [
            'name'     => 'Admin',
            'surname'  => 'Tahoshop',
            'password' => Hash::make('password123'),
            'phone'    => '+381 60 999 8877',
            'role'     => 'administrator',
        ]);

        // Vozila
        $vozilo1 = Vehicle::firstOrCreate(['registration' => 'BG-123-AB'], [
            'user_id' => $klijent1->id, 'brand' => 'Volkswagen', 'model' => 'Transporter',
        ]);

        $vozilo2 = Vehicle::firstOrCreate(['registration' => 'NS-456-CD'], [
            'user_id' => $klijent1->id, 'brand' => 'Mercedes', 'model' => 'Sprinter',
        ]);

        $vozilo3 = Vehicle::firstOrCreate(['registration' => 'BG-789-EF'], [
            'user_id' => $klijent2->id, 'brand' => 'Ford', 'model' => 'Transit',
        ]);

        $vozilo4 = Vehicle::firstOrCreate(['registration' => 'KG-321-GH'], [
            'user_id' => $klijent2->id, 'brand' => 'Iveco', 'model' => 'Daily',
        ]);

        // Delovi
        $deo1 = Part::firstOrCreate(['code' => 'SB-001'], ['name' => 'Senzor brzine',      'supplier' => 'VDO',        'quantity' => 8]);
        $deo2 = Part::firstOrCreate(['code' => 'PT-002'], ['name' => 'Plomba tahografa',   'supplier' => 'Siemens',    'quantity' => 25]);
        $deo3 = Part::firstOrCreate(['code' => 'KT-003'], ['name' => 'Konektor tahografa', 'supplier' => 'VDO',        'quantity' => 2]);
        $deo4 = Part::firstOrCreate(['code' => 'BT-004'], ['name' => 'Baterija tahografa', 'supplier' => 'Bosch',      'quantity' => 5]);
        $deo5 = Part::firstOrCreate(['code' => 'ST-005'], ['name' => 'Štampač tahografa',  'supplier' => 'Stoneridge', 'quantity' => 1]);

        if (ServiceRequest::count() > 0) {
            return;
        }

        // STATUS: zakazano
        ServiceRequest::create([
            'user_id'         => $klijent1->id,
            'vehicle_id'      => $vozilo1->id,
            'serviser_id'     => null,
            'tachograph_type' => 'digitalni',
            'description'     => 'Tahograf ne beleži brzinu ispravno.',
            'desired_date'    => now()->addDays(3),
            'phone'           => '+381 60 111 2233',
            'status'          => 'zakazano',
        ]);

        ServiceRequest::create([
            'user_id'         => $klijent2->id,
            'vehicle_id'      => $vozilo3->id,
            'serviser_id'     => null,
            'tachograph_type' => 'analogni',
            'description'     => 'Redovna kalibracija tahografa.',
            'desired_date'    => now()->addDays(5),
            'phone'           => '+381 60 222 3344',
            'status'          => 'zakazano',
        ]);

        // STATUS: zavrsena_dijagnostika
        $sr3 = ServiceRequest::create([
            'user_id'         => $klijent1->id,
            'vehicle_id'      => $vozilo2->id,
            'serviser_id'     => $serviser->id,
            'tachograph_type' => 'digitalni',
            'description'     => 'Istek kalibracije tahografa.',
            'desired_date'    => now()->subDays(1),
            'phone'           => '+381 60 111 2233',
            'status'          => 'zavrsena_dijagnostika',
        ]);

        Diagnostic::create([
            'service_request_id'  => $sr3->id,
            'problem_description' => 'Tahograf nije kalibrisan u poslednjih 2 godine.',
            'diagnostic_results'  => 'Senzor brzine pokazuje odstupanja od 5%.',
            'recommended_work'    => 'Zamena senzora brzine i kalibracija.',
        ]);

        // STATUS: zavrsena_dijagnostika
        $sr4 = ServiceRequest::create([
            'user_id'         => $klijent2->id,
            'vehicle_id'      => $vozilo4->id,
            'serviser_id'     => $serviser->id,
            'tachograph_type' => 'analogni',
            'description'     => 'Štampač ne štampa ispravno.',
            'desired_date'    => now()->subDays(2),
            'phone'           => '+381 60 222 3344',
            'status'          => 'zavrsena_dijagnostika',
        ]);

        Diagnostic::create([
            'service_request_id'  => $sr4->id,
            'problem_description' => 'Papirna traka se zaglavljivala tokom štampanja.',
            'diagnostic_results'  => 'Štampač tahografa oštećen.',
            'recommended_work'    => 'Zamena štampača tahografa.',
        ]);

        // STATUS: zavrseno
        $sr5 = ServiceRequest::create([
            'user_id'         => $klijent1->id,
            'vehicle_id'      => $vozilo1->id,
            'serviser_id'     => $serviser->id,
            'tachograph_type' => 'digitalni',
            'description'     => 'Zamena konektora tahografa.',
            'desired_date'    => now()->subDays(10),
            'phone'           => '+381 60 111 2233',
            'status'          => 'zavrseno',
        ]);

        Diagnostic::create([
            'service_request_id'  => $sr5->id,
            'problem_description' => 'Konektor tahografa fizički oštećen.',
            'diagnostic_results'  => 'Potvrđena neispravnost konektora.',
            'recommended_work'    => 'Zamena konektora tahografa.',
        ]);

        $repair1 = Repair::create([
            'service_request_id' => $sr5->id,
            'work_done'          => 'Zamenjen konektor tahografa. Izvršena kalibracija i testiranje.',
            'seal_number'        => 'PL-2026-00101',
        ]);

        RepairPart::create([
            'repair_id'     => $repair1->id,
            'part_id'       => $deo3->id,
            'quantity_used' => 1,
        ]);

        // STATUS: zavrseno
        $sr6 = ServiceRequest::create([
            'user_id'         => $klijent2->id,
            'vehicle_id'      => $vozilo3->id,
            'serviser_id'     => $serviser->id,
            'tachograph_type' => 'analogni',
            'description'     => 'Redovni servis i plombiranje.',
            'desired_date'    => now()->subDays(15),
            'phone'           => '+381 60 222 3344',
            'status'          => 'zavrseno',
        ]);

        Diagnostic::create([
            'service_request_id'  => $sr6->id,
            'problem_description' => 'Redovni pregled po zahtevu klijenta.',
            'diagnostic_results'  => 'Sve u ispravnom stanju, potrebno samo plombiranje.',
            'recommended_work'    => 'Plombiranje tahografa.',
        ]);

        $repair2 = Repair::create([
            'service_request_id' => $sr6->id,
            'work_done'          => 'Izvršeno plombiranje tahografa. Zamenjena baterija.',
            'seal_number'        => 'PL-2026-00102',
        ]);

        RepairPart::create([
            'repair_id'     => $repair2->id,
            'part_id'       => $deo2->id,
            'quantity_used' => 2,
        ]);

        RepairPart::create([
            'repair_id'     => $repair2->id,
            'part_id'       => $deo4->id,
            'quantity_used' => 1,
        ]);
    }
}