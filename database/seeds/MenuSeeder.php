<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;
class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * @Tips
         * 按照下面格式写
         *
         */
        $menus = [
            ['id' => 1, 'parent_id' => 0, 'name' => '首页', 'url' => '/manage', 'icon' => 'home'],
            ['id' => 2, 'parent_id' => 0, 'name' => '用户管理', 'url' => '/manage/member/index', 'icon' => 'user'],
        ];
        Menu::truncate();
        $this->saveMenus($menus);

    }
    /**
     * @param $menus
     */
    protected function saveMenus($menus)
    {
        foreach ($menus as $key => $item) {
            $menuIns = new Menu();
            foreach ($item as $field => $value) {
                $menuIns->$field = $value;
            }
            $menuIns->save();
        }
    }

}