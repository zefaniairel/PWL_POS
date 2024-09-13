<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
           [
            'supplier_kode' => 'SUP1',
            'supplier_nama'=> 'Supplier A',
            'supplier_alamat' => 'Jl. Dipenogoro',
            'created_at' => now(),
           ],
           [
            'supplier_kode' => 'SUP2',
            'supplier_nama'=> 'Supplier B',
            'supplier_alamat' => 'Jl. Panderman',
            'created_at' => now(),
           ],
           [
            'supplier_kode' => 'SUP3',
            'supplier_nama'=> 'Supplier C',
            'supplier_alamat' => 'Jl. Mawar',
            'created_at' => now(),
           ],
        ];
        DB::table('m_supplier')->insert($data);
    }
}
