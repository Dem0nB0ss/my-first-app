<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product; // 👈 Import Model Product


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    //     $products = [
    //         'Bàn phím cơ Akko',
    //         'Bàn phím cơ Keychron K8',
    //         'Bàn phím cơ DareU EK87',
    //         'Bàn phím Logitech MX Keys',
    //         'Chuột Logitech G102',
    //         'Chuột Logitech G304',
    //         'Chuột Razer DeathAdder',
    //         'Chuột SteelSeries Rival 3',
    //         'Chuột Corsair Harpoon',
    //         'Tai nghe HyperX Cloud II',
    //         'Tai nghe Logitech G435',
    //         'Tai nghe Sony WH-1000XM5',
    //         'Tai nghe JBL Tune 760',
    //         'Tai nghe Apple AirPods Pro',
    //         'Loa Bluetooth JBL Flip 6',
    //         'Loa Harman Kardon Onyx',
    //         'Loa Marshall Emberton',
    //         'Màn hình Dell 24 inch',
    //         'Màn hình Dell UltraSharp 27 inch',
    //         'Màn hình LG UltraGear 27',
    //         'Màn hình Samsung Odyssey G5',
    //         'Màn hình ASUS TUF Gaming',
    //         'Laptop Dell Inspiron 15',
    //         'Laptop ASUS Vivobook',
    //         'Laptop Acer Aspire 7',
    //         'Laptop Lenovo ThinkPad E14',
    //         'Laptop HP Pavilion',
    //         'Laptop MSI Gaming GF63',
    //         'Laptop MacBook Air M3',
    //         'Laptop MacBook Pro M4',
    //         'CPU Intel Core i5-14600K',
    //         'CPU Intel Core i7-14700K',
    //         'CPU AMD Ryzen 5 7600',
    //         'CPU AMD Ryzen 7 7800X3D',
    //         'Mainboard ASUS B760',
    //         'Mainboard MSI B650',
    //         'Mainboard Gigabyte Z790',
    //         'RAM Kingston Fury 16GB',
    //         'RAM Corsair Vengeance 32GB',
    //         'RAM G.Skill Trident Z 16GB',
    //         'SSD Samsung 990 Pro 1TB',
    //         'SSD Kingston NV2 1TB',
    //         'SSD WD Black SN850X',
    //         'HDD Seagate 2TB',
    //         'Nguồn Corsair RM750',
    //         'Nguồn Cooler Master 650W',
    //         'Case NZXT H5 Flow',
    //         'Case Lian Li Lancool',
    //         'VGA RTX 4060',
    //         'VGA RTX 4070 Super',
    //         'VGA RTX 4080',
    //         'VGA RX 7700 XT',
    //         'VGA RX 7800 XT',
    //         'Webcam Logitech C920',
    //         'Micro HyperX SoloCast',
    //         'Micro Blue Yeti',
    //         'Ổ cứng SSD Crucial 500GB',
    //         'Ổ cứng SSD Samsung 2TB',
    //         'USB Kingston 64GB',
    //         'USB SanDisk 128GB',
    //         'Router TP-Link AX55',
    //         'Router ASUS RT-AX58U',
    //         'Switch TP-Link 8 Port',
    //         'Máy in Canon LBP2900',
    //         'Máy in HP LaserJet',
    //         'Máy quét Epson V39',
    //         'Camera Logitech Brio',
    //         'Camera IP Ezviz',
    //         'Bộ phát Wifi Mercusys',
    //         'Bộ lưu điện APC 650VA',
    //         'Bàn Gaming E-Dra',
    //         'Ghế Gaming DXRacer',
    //         'Ghế Công Thái Học Sihoo',
    //         'Giá đỡ Laptop',
    //         'Đế tản nhiệt Laptop',
    //         'Sạc Anker 65W',
    //         'Sạc Ugreen 100W',
    //         'Cáp Type-C Ugreen',
    //         'Cáp HDMI 2.1',
    //         'Dock chuyển đổi USB-C',
    //         'Apple Magic Mouse',
    //         'Apple Magic Keyboard',
    //         'iPad Air M3',
    //         'iPad Pro M4',
    //         'Apple Pencil Pro',
    //         'Samsung Galaxy Tab S10',
    //         'Điện thoại iPhone 17',
    //         'Samsung Galaxy S26',
    //         'Xiaomi 16 Pro',
    //         'OPPO Find X9',
    //         'Google Pixel 10',
    //         'Đồng hồ Apple Watch Series 12',
    //         'Samsung Galaxy Watch 9',
    //         'Vòng đeo Mi Band 11',
    //         'Pin dự phòng Anker 20000mAh',
    //         'Pin dự phòng Xiaomi 10000mAh',
    //         'Ổ cắm thông minh Xiaomi',
    //         'Đèn LED thông minh Philips Hue',
    //         'Camera hành trình 70Mai',
    //         'Drone DJI Mini 5',
    //         'Máy chiếu Epson X06',
    //         'Máy chiếu ViewSonic PA503',
    //     ];

    //     foreach ($products as $product) {
    //         Product::create([
    //             'name' => $product,
    //             'category_id' => rand(1, 3),
    //             'price' => rand(200000, 20000000),
    //             'stock' => rand(5, 100),
    //         ]);
    //     }


    // Product::factory()->count(100)->create();

    $products = []; 
    for ($i = 1; $i <= 20; $i++) { 
        $products[] = [ 
            'name' => 'Product ' . $i, 
            'category_id' => fake()->numberBetween(1,3),
            'description' => 'Description for product ' . $i, 
            'price' => fake()->randomFloat(2, 10, 1000), 
            'quantity' => fake()->numberBetween(0, 100), 
            'image' => 'storage/app/public/products/' . $i . '.jpg', 
            'status' => fake()->boolean(90), 
            'created_at' => now(), 
            'updated_at' => now(), 
        ]; 
    } 
    
    DB::table('products')->insert($products); 

    }
}
