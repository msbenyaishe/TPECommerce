<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // 📱 Phones
            [
                'nom' => 'Samsung Galaxy S25 FE',
                'prix' => 700,
                'categorie' => 'Phones',
                'image' => 'https://images.samsung.com/is/image/samsung/p6pim/n_africa/sm-s731bzkvmwd/gallery/n-africa-galaxy-s25-fe-sm-s731-sm-s731bzkvmwd-548746304?$Q90_1248_936_F_PNG$',
                'solde' => 0,
            ],
            [
                'nom' => 'iPhone 17 Pro',
                'prix' => 1099,
                'categorie' => 'Phones',
                'image' => 'https://istyle.ma/cdn/shop/files/IMG-18064329_m_jpeg_1_9fdfedc9-6392-46f2-a032-dd53e151cfc4.jpg?v=1757469703',
                'solde' => 0,
            ],
            [
                'nom' => 'Samsung Galaxy S25 Ultra',
                'prix' => 1200,
                'categorie' => 'Phones',
                'image' => 'https://images.samsung.com/is/image/samsung/p6pim/lb/2501/gallery/lb-galaxy-s25-s938-534365-sm-s938bzbpmea-544789381',
                'solde' => 0,
            ],
            [
                'nom' => 'Samsung Galaxy A56 5G',
                'prix' => 449.99,
                'categorie' => 'Phones',
                'image' => 'https://images.samsung.com/is/image/samsung/p6pim/sa_en/sm-a566bzkwmea/gallery/sa-en-galaxy-a56-5g-sm-a566-sm-a566bzkwmea-545488270?$Q90_1248_936_F_PNG$',
                'solde' => 0,
            ],
            [
                'nom' => 'iPhone 17 Pro max',
                'prix' => 1399,
                'categorie' => 'Phones',
                'image' => 'https://universdigital.com/cdn/shop/files/iphone-17-pro-max-6615174.jpg?v=1761262735&width=1445',
                'solde' => 0,
            ],
            [
                'nom' => 'Samsung Galaxy S25+',
                'prix' => 999.99,
                'categorie' => 'Phones',
                'image' => 'https://images.samsung.com/is/image/samsung/p6pim/nz/2501/gallery/nz-galaxy-s25-s936-534115-sm-s936bzrcxnz-544793736?$720_576_JPG$',
                'solde' => 0,
            ],

            // 💻 Laptops
            [
                'nom' => 'Dell Inspiron 16 7640 2-in-1',
                'prix' => 1300,
                'categorie' => 'Laptops',
                'image' => 'https://m.media-amazon.com/images/I/51fpCMmuoML.jpg',
                'solde' => 0,
            ],
            [
                'nom' => 'Samsung Galaxy Book5 Pro 360',
                'prix' => 1600,
                'categorie' => 'Laptops',
                'image' => 'https://images.samsung.com/is/image/samsung/p6pim/uk/np750qha-ka3uk/gallery/uk-galaxy-book5-360-15-inch-np750-533848-np750qha-ka3uk-544642564?$Q90_1248_936_F_PNG$',
                'solde' => 0,
            ],
            [
                'nom' => 'MacBook Pro M3 Max',
                'prix' => 3199,
                'categorie' => 'Laptops',
                'image' => 'https://store.storeimages.cdn-apple.com/1/as-images.apple.com/is/mbp14-spaceblack-select-202410?wid=904&hei=840&fmt=jpeg&qlt=90&.v=YnlWZDdpMFo0bUpJZnBpZjhKM2M3VGhTSEZFNjlmT2xUUDNBTjljV1BxWVk4UDMvOWNCVUEyZk1VN2FtQlpZWXZvdUZlR0V0VUdJSjBWaDVNVG95Yk15Y0c3T3Y4UWZwZExHUFdTUC9lN28',
                'solde' => 0,
            ],

            // 🎧 Accessories
            [
                'nom' => 'Logitech MX Master 3S',
                'prix' => 140,
                'categorie' => 'Accessories',
                'image' => 'https://resource.logitech.com/c_fill,q_auto,f_auto,dpr_1.0/d_transparent.gif/content/dam/logitech/en/products/mice/mx-master-3s/2025-update/mx-master-3s-bluetooth-edition-top-view-graphite-new-1.png',
                'solde' => 0,
            ],
            [
                'nom' => 'Bose SoundLink Micro Bluetooth Speaker',
                'prix' => 89,
                'categorie' => 'Accessories',
                'image' => 'https://assets.bosecreative.com/transform/ecc6a491-5cb2-4fa2-8584-5e5a4aeb7296/SLMC_CC_001_RGB?io=width:816,height:667,transform:fit&io=width:816,height:667,transform:fit',
                'solde' => 0,
            ],
            [
                'nom' => 'Samsung Galaxy Buds 3',
                'prix' => 149,
                'categorie' => 'Accessories',
                'image' => 'https://media.electroplanet.ma/media/catalog/product/cache/fe7218fa206f7a550a07f49b9ea052d6/3/0/3043516_1.png',
                'solde' => 0,
            ],

            // 🧩 Components
            [
                'nom' => 'Samsung SSD 980 M.2 PCIe NVMe 1TB',
                'prix' => 110,
                'categorie' => 'Components',
                'image' => 'https://www.ultrapc.ma/16764-large_default/samsung-ssd-980-m2-pcie-nvme-1tb.jpg',
                'solde' => 0,
            ],
            [
                'nom' => 'Asus Laptop Fan',
                'prix' => 60,
                'categorie' => 'Components',
                'image' => 'https://5.imimg.com/data5/ZB/GQ/HY/SELLER-98115099/laptop-cpu-fan.jpg',
                'solde' => 0,
            ],
            [
                'nom' => 'Dell Laptop Charger 65W USB Type C',
                'prix' => 40,
                'categorie' => 'Components',
                'image' => 'https://wpsitesdata.blob.core.windows.net/pctintas/Cargador-USB-C-Dell-65W-Original-Carga-Rapida-Proteccion-Smart-1.webp',
                'solde' => 0,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['nom' => $product['nom']],
                $product
            );
        }
    }
}
