<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => '1',
                'barang_kode' => 'MNM01',
                'barang_nama' => 'Coca-cola',
                'harga_beli' => '5000',
                'harga_jual' => '7000',
                'created_at' => now(),
            ],
            [
                'kategori_id' => '1',
                'barang_kode' => 'MNM02',
                'barang_nama' => 'Club',
                'harga_beli' => '2000',
                'harga_jual' => '3000',
                'created_at' => now(),
            ],
            [
                'kategori_id' => '1',
                'barang_kode' => 'MNM03',
                'barang_nama' => 'Fanta',
                'harga_beli' => '4000',
                'harga_jual' => '7000',
                'created_at' => now(),
            ],
            [
                'kategori_id' => '1',
                'barang_kode' => 'MNM04',
                'barang_nama' => 'Air Mineral',
                'harga_beli' => '2000',
                'harga_jual' => '3500',
                'created_at' => now(),
            ],
            [
                'kategori_id' => '1',
                'barang_kode' => 'MNM05',
                'barang_nama' => 'Teh Pucuk',
                'harga_beli' => '2000',
                'harga_jual' => '4000',
                'created_at' => now(),
            ],
            [
                'kategori_id' => '2',
                'barang_kode' => 'MKN01',
                'barang_nama' => 'Onigiri',
                'harga_beli' => '8000',
                'harga_jual' => '11000',
                'created_at' => now(),
            ],
            [
                'kategori_id' => '2',
                'barang_kode' => 'MKN02',
                'barang_nama' => 'Roti Coklat',
                'harga_beli' => '4500',
                'harga_jual' => '7000',
                'created_at' => now(),
            ],
            [
                'kategori_id' => '2',
                'barang_kode' => 'MKN03',
                'barang_nama' => 'Pisang',
                'harga_beli' => '7000',
                'harga_jual' => '15000',
                'created_at' => now(),
            ],
            [
                'kategori_id' => '2',
                'barang_kode' => 'MKN04',
                'barang_nama' => 'Sushi',
                'harga_beli' => '10000',
                'harga_jual' => '15000',
                'created_at' => now(),
            ],
            [
                'kategori_id' => '2',
                'barang_kode' => 'MK05',
                'barang_nama' => 'Kimchi',
                'harga_beli' => '20000',
                'harga_jual' => '27000',
                'created_at' => now(),
            ],
            [
                'kategori_id' => '3',
                'barang_kode' => 'SNC01',
                'barang_nama' => 'Chitato',
                'harga_beli' => '5000',
                'harga_jual' => '8000',
                'created_at' => now(),
            ],
            [
                'kategori_id' => '3',
                'barang_kode' => 'SNC02',
                'barang_nama' => 'Beng-beng',
                'harga_beli' => '3000',
                'harga_jual' => '5000',
                'created_at' => now(),
            ],
            [
                'kategori_id' => '3',
                'barang_kode' => 'SNC03',
                'barang_nama' => 'SilverQueen',
                'harga_beli' => '13000',
                'harga_jual' => '20000',
                'created_at' => now(),
            ],
            [
                'kategori_id' => '3',
                'barang_kode' => 'SNC04',
                'barang_nama' => 'Qtela',
                'harga_beli' => '10000',
                'harga_jual' => '16000',
                'created_at' => now(),
            ],
            [
                'kategori_id' => '3',
                'barang_kode' => 'SNC05',
                'barang_nama' => 'Better',
                'harga_beli' => '2000',
                'harga_jual' => '3500',
                'created_at' => now(),
            ],
            [
                'kategori_id' => '4',
                'barang_kode' => 'SBK01',
                'barang_nama' => 'Minyak',
                'harga_beli' => '13000',
                'harga_jual' => '18000',
                'created_at' => now(),
            ],
            [
                'kategori_id' => '4',
                'barang_kode' => 'SBK02',
                'barang_nama' => 'Mie Goreng',
                'harga_beli' => '1000',
                'harga_jual' => '2500',
                'created_at' => now(),
            ],
            [
                'kategori_id' => '4',
                'barang_kode' => 'SBK03',
                'barang_nama' => 'Beras',
                'harga_beli' => '16000',
                'harga_jual' => '24000',
                'created_at' => now(),
            ],
            [
                'kategori_id' => '4',
                'barang_kode' => 'SBK04',
                'barang_nama' => 'Gula',
                'harga_beli' => '12000',
                'harga_jual' => '16000',
                'created_at' => now(),
            ],
            [
                'kategori_id' => '4',
                'barang_kode' => 'SBK05',
                'barang_nama' => 'Garam',
                'harga_beli' => '10000',
                'harga_jual' => '14000',
                'created_at' => now(),
            ],
            [
                'kategori_id' => '5',
                'barang_kode' => 'ALT01',
                'barang_nama' => 'Buku',
                'harga_beli' => '3000',
                'harga_jual' => '5000',
                'created_at' => now(),
            ],
            [
                'kategori_id' => '5',
                'barang_kode' => 'ALT02',
                'barang_nama' => 'Pensil',
                'harga_beli' => '1500',
                'harga_jual' => '3000',
                'created_at' => now(),
            ],
            [
                'kategori_id' => '5',
                'barang_kode' => 'ALT03',
                'barang_nama' => 'Penggaris',
                'harga_beli' => '2000',
                'harga_jual' => '5000',
                'created_at' => now(),
            ],
            [
                'kategori_id' => '5',
                'barang_kode' => 'ALT04',
                'barang_nama' => 'Tempat Pensil',
                'harga_beli' => '15000',
                'harga_jual' => '22000',
                'created_at' => now(),
            ],
            [
                'kategori_id' => '5',
                'barang_kode' => 'ALT05',
                'barang_nama' => 'Penghapus',
                'harga_beli' => '2500',
                'harga_jual' => '5000',
                'created_at' => now(),
            ],
        ];
        DB::table('m_barang')->insert($data);
    }
}
