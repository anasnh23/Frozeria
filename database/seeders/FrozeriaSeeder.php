<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FrozeriaSeeder extends Seeder
{
    public function run(): void
    {
        $categories = collect([
            ['name' => 'Ayam', 'description' => 'Produk berbahan dasar ayam beku.', 'created_at' => '2026-01-01'],
            ['name' => 'Seafood', 'description' => 'Produk makanan laut beku.', 'created_at' => '2026-01-01'],
            ['name' => 'Sapi', 'description' => 'Produk olahan daging sapi beku.', 'created_at' => '2026-01-05'],
            ['name' => 'Sayuran', 'description' => 'Sayuran beku siap olah.', 'created_at' => '2026-01-10'],
            ['name' => 'Siap saji', 'description' => 'Makanan beku siap goreng atau panaskan.', 'created_at' => '2026-01-12'],
        ])->mapWithKeys(function ($category) {
            $createdAt = Carbon::parse($category['created_at']);

            $model = Category::create([
                'nama' => $category['name'],
                'deskripsi' => $category['description'],
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ]);

            return [$category['name'] => $model->id];
        });

        $products = [
            ['Ayam nugget crispy', 'Ayam', 120, 'pcs', 35000, 28000, '500 gram', 'Rak A-3', 'Nugget ayam dengan lapisan tepung crispy, cocok untuk camilan atau bekal. Tersedia dalam kemasan 500 gr berisi +/-20 pcs.'],
            ['Sosis sapi premium', 'Sapi', 15, 'pack', 28000, 22000, '450 gram', 'Rak B-2', 'Sosis sapi premium untuk sarapan dan bekal.'],
            ['Dim sum udang', 'Seafood', 0, 'box', 45000, 36000, '20 pcs', 'Freezer C-1', 'Dim sum udang siap kukus dengan kulit tipis.'],
            ['Bakso urat sapi', 'Sapi', 60, 'pack', 22000, 17000, '500 gram', 'Rak B-1', 'Bakso urat sapi untuk sup dan bakso kuah.'],
            ['Edamame beku', 'Sayuran', 0, 'pack', 18000, 13000, '500 gram', 'Rak D-1', 'Edamame beku siap rebus.'],
            ['Chicken karaage', 'Ayam', 35, 'pack', 42000, 34000, '500 gram', 'Rak A-1', 'Ayam karaage marinasi siap goreng.'],
            ['Nugget stick keju', 'Ayam', 18, 'pack', 32000, 25000, '450 gram', 'Rak A-2', 'Nugget stick dengan isian keju.'],
            ['Chicken wings spicy', 'Ayam', 22, 'pack', 39000, 31000, '500 gram', 'Rak A-4', 'Sayap ayam bumbu pedas.'],
            ['Ayam popcorn', 'Ayam', 75, 'pack', 36000, 29000, '500 gram', 'Rak A-2', 'Potongan ayam kecil berbumbu.'],
            ['Kaki naga ayam', 'Ayam', 16, 'pack', 30000, 24000, '400 gram', 'Rak A-5', 'Olahan ayam berbentuk kaki naga.'],
            ['Shrimp roll', 'Seafood', 28, 'pack', 40000, 32000, '450 gram', 'Freezer C-2', 'Shrimp roll siap goreng.'],
            ['Fish roll', 'Seafood', 42, 'pack', 34000, 27000, '500 gram', 'Freezer C-2', 'Fish roll gurih untuk lauk.'],
            ['Cumi ring tepung', 'Seafood', 14, 'pack', 52000, 42000, '500 gram', 'Freezer C-3', 'Cumi ring berbalut tepung.'],
            ['Udang kupas', 'Seafood', 25, 'pack', 68000, 56000, '500 gram', 'Freezer C-4', 'Udang kupas beku siap masak.'],
            ['Crab stick', 'Seafood', 58, 'pack', 26000, 20000, '250 gram', 'Freezer C-1', 'Crab stick untuk suki dan salad.'],
            ['Dori fillet', 'Seafood', 19, 'pack', 48000, 39000, '500 gram', 'Freezer C-4', 'Fillet ikan dori beku.'],
            ['Beef patty original', 'Sapi', 33, 'pack', 55000, 44000, '6 pcs', 'Rak B-4', 'Patty burger daging sapi.'],
            ['Beef slice yakiniku', 'Sapi', 21, 'pack', 72000, 61000, '500 gram', 'Rak B-5', 'Irisan sapi tipis untuk yakiniku.'],
            ['Kornet sapi beku', 'Sapi', 0, 'pack', 30000, 24000, '450 gram', 'Rak B-3', 'Kornet sapi beku untuk tumisan.'],
            ['Smoked beef slice', 'Sapi', 45, 'pack', 42000, 34000, '250 gram', 'Rak B-2', 'Irisan smoked beef untuk roti.'],
            ['Rolade sapi', 'Sapi', 17, 'pack', 27000, 21000, '450 gram', 'Rak B-1', 'Rolade sapi siap goreng.'],
            ['Brokoli beku', 'Sayuran', 65, 'pack', 24000, 18000, '500 gram', 'Rak D-2', 'Brokoli beku siap tumis.'],
            ['Mixed vegetables', 'Sayuran', 90, 'pack', 21000, 16000, '500 gram', 'Rak D-3', 'Campuran wortel, buncis, dan jagung.'],
            ['Jagung pipil beku', 'Sayuran', 11, 'pack', 19000, 14000, '500 gram', 'Rak D-1', 'Jagung pipil beku siap olah.'],
            ['Kentang shoestring', 'Siap saji', 110, 'pack', 31000, 24000, '1 kg', 'Rak E-1', 'Kentang goreng potongan shoestring.'],
            ['Kentang crinkle cut', 'Siap saji', 47, 'pack', 33000, 26000, '1 kg', 'Rak E-2', 'Kentang goreng bentuk crinkle.'],
            ['Pizza mini frozen', 'Siap saji', 13, 'box', 44000, 35000, '4 pcs', 'Rak E-4', 'Pizza mini siap panggang.'],
            ['Roti maryam', 'Siap saji', 38, 'pack', 26000, 20000, '5 pcs', 'Rak E-3', 'Roti maryam beku siap panaskan.'],
            ['Kebab mini', 'Siap saji', 0, 'box', 39000, 30000, '10 pcs', 'Rak E-5', 'Kebab mini isi daging.'],
        ];

        foreach ([
            ['Chicken cordon bleu', 'Ayam', 26], ['Ayam giling beku', 'Ayam', 54], ['Nugget alfabet', 'Ayam', 72],
            ['Bakso ikan', 'Siap saji', 41], ['Tempura udang', 'Siap saji', 24], ['Otak-otak ikan', 'Siap saji', 62],
            ['Beef teriyaki slice', 'Sapi', 29], ['Daging giling sapi', 'Sapi', 31], ['Bakso sapi mini', 'Sapi', 88],
            ['Wortel dadu beku', 'Sayuran', 57], ['Buncis potong beku', 'Sayuran', 43], ['Bayam beku', 'Sayuran', 34],
            ['Siomay ayam', 'Ayam', 52], ['Pempek frozen', 'Siap saji', 37], ['Cireng isi', 'Siap saji', 64],
            ['Risoles mayo', 'Ayam', 12], ['Lumpia ayam', 'Ayam', 49], ['Scallop ikan', 'Seafood', 66],
            ['Tahu bakso sapi', 'Siap saji', 27],
        ] as [$name, $category, $stock]) {
            $products[] = [$name, $category, $stock, 'pack', 25000 + ($stock * 100), 18000 + ($stock * 80), '500 gram', 'Rak Cadangan', $name . ' berkualitas untuk kebutuhan stok toko.'];
        }

        foreach ($products as [$name, $category, $stock, $unit, $sellingPrice, $purchasePrice, $weightSize, $location, $description]) {
            Product::create([
                'kategori_id' => $categories[$category],
                'nama_barang' => $name,
                'jumlah_stok' => $stock,
                'stok_minimum' => 20,
                'satuan' => $unit,
                'harga_jual' => $sellingPrice,
                'harga_beli' => $purchasePrice,
                'berat_ukuran' => $weightSize,
                'lokasi_simpan' => $location,
                'deskripsi' => $description,
            ]);
        }
    }
}
