<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
           [
        	[
            'name' => 'Đồng hồ seiko SNDF95P1 nam pin dây da',
            'price' => '4509000',
            'priceSale' => '10',
             'quantity' => '20',
            'description' => 'Là một trong những sản phẩm có xuất xứ từ đất nước Nhật Bản, sở hữu cho mình những thiết kế hết sức đặc biệt, sang trọng và lịch lãm. Cùng với đó là kết hợp với những linh kiện chất lượng và cao cấp bậc nhất, đã tạo nên một siêu phẩm Seiko đẳng cấp, cuốn hút mang phong cách trẻ trung hiện đại. Bộ máy bền bỉ, với thiết kế đường nét tinh xảo đã khiến cho những chiếc đồng hồ trở thành tâm điểm rất nóng hổi và niềm khao khát của biết bao bạn nam ngày nay. Đặc biệt không thể không kể tới đồng hồ Seiko SNDF95P1.',
            'category_id' => '1',
            'created_at'=>new Datetime(),

        ],
        [
            'name' => 'Đồng hồ seiko SNDF95P1 nam pin dây da',
            'price' => '4509000',
            'priceSale' => '10',
             'quantity' => '20',
            'description' => 'Là một trong những sản phẩm có xuất xứ từ đất nước Nhật Bản, sở hữu cho mình những thiết kế hết sức đặc biệt, sang trọng và lịch lãm. Cùng với đó là kết hợp với những linh kiện chất lượng và cao cấp bậc nhất, đã tạo nên một siêu phẩm Seiko đẳng cấp, cuốn hút mang phong cách trẻ trung hiện đại. Bộ máy bền bỉ, với thiết kế đường nét tinh xảo đã khiến cho những chiếc đồng hồ trở thành tâm điểm rất nóng hổi và niềm khao khát của biết bao bạn nam ngày nay. Đặc biệt không thể không kể tới đồng hồ Seiko SNDF95P1.',
            'category_id' => '1',
             'created_at'=>new Datetime(),

        ],
        [
            'name' => 'Đồng hồ seiko SNDF95P1 nam pin dây da',
            'price' => '4509000',
            'priceSale' => '10',
             'quantity' => '20',
            'description' => 'Là một trong những sản phẩm có xuất xứ từ đất nước Nhật Bản, sở hữu cho mình những thiết kế hết sức đặc biệt, sang trọng và lịch lãm. Cùng với đó là kết hợp với những linh kiện chất lượng và cao cấp bậc nhất, đã tạo nên một siêu phẩm Seiko đẳng cấp, cuốn hút mang phong cách trẻ trung hiện đại. Bộ máy bền bỉ, với thiết kế đường nét tinh xảo đã khiến cho những chiếc đồng hồ trở thành tâm điểm rất nóng hổi và niềm khao khát của biết bao bạn nam ngày nay. Đặc biệt không thể không kể tới đồng hồ Seiko SNDF95P1.',
            'category_id' => '1',
             'created_at'=>new Datetime(),

        ],
        [
            'name' => 'Đồng hồ seiko SNDF95P1 nam pin dây da',
            'price' => '4509000',
            'priceSale' => '10',
             'quantity' => '20',
            'description' => 'Là một trong những sản phẩm có xuất xứ từ đất nước Nhật Bản, sở hữu cho mình những thiết kế hết sức đặc biệt, sang trọng và lịch lãm. Cùng với đó là kết hợp với những linh kiện chất lượng và cao cấp bậc nhất, đã tạo nên một siêu phẩm Seiko đẳng cấp, cuốn hút mang phong cách trẻ trung hiện đại. Bộ máy bền bỉ, với thiết kế đường nét tinh xảo đã khiến cho những chiếc đồng hồ trở thành tâm điểm rất nóng hổi và niềm khao khát của biết bao bạn nam ngày nay. Đặc biệt không thể không kể tới đồng hồ Seiko SNDF95P1.',
            'category_id' => '1',
             'created_at'=>new Datetime(),

        ],
    ]
    );
    }
}
