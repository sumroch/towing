<?php

namespace Tests\Feature\Public;

use App\Domain\MasterData\Entities\Store;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class OrderTest extends TestCase
{
    protected function loginUser($username = 'manager', $password = '12345')
    {
        $response = $this->postJson('/api/login', [
            'username' => $username,
            'password' => $password,
        ]);
        $this->assertAuthenticated();
        return $response;
    }
    public function test_get_data_show_order_on_store()
    {
        $this->loginUser();
        $response = $this->get('/api/public/edit-store/1');

        $response->assertOk();
    }
    public function test_store_data_order()
    {
        $this->loginUser();
        $response = $this->postJson('/api/public/order', [
            'car_name'          => 'BRV',
            'number_plate'      => '熊谷 580 わ 1723',
            'number_body'       => 'JAYKZE81SCJ154011',
            'car_color'         => 'ブラック系',
            'car_category'      => '新車',
            'memo'              => 'kondisi mobilnya masih bagus',
            'date'              => '2025/02/10',
            'pic_1'             => 'Andre',
            'pic_2'             => 'Anwar',
            'store_origin'      => '1',
            'store_destination' => '1',
            'status'            => 'READ',
        ]);

        $response->assertOk();
    }
    public function test_store_data_order_with_invalid_credentials()
    {
        $this->loginUser();
        $response = $this->postJson('/api/public/order', [
            'car_name'          => '',
            'number_plate'      => '熊谷 580 わ 1723',
            'number_body'       => 'JAYKZE81SCJ154011',
            'car_color'         => 'ブラック系',
            'car_category'      => '新車',
            'memo'              => 'kondisi mobilnya masih bagus',
            'date'              => '2025/02/10',
            'pic_1'             => 'Andre',
            'pic_2'             => 'Anwar',
            'store_origin'      => '1',
            'store_destination' => '1',
            'status'            => 'ready',
        ]);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['car_name']);
    }
    public function test_update_data_order_on_store()
    {
        $this->loginUser();
        $response = $this->putJson('/api/public/order-store/1', [
            'car_name'          => 'HRV',
            'number_plate'      => '熊谷 580 わ 1723',
            'number_body'       => 'JAYKZE81SCJ154011',
            'car_color'         => 'ブラック系',
            'car_category'      => '新車',
            'memo'              => 'kondisi mobilnya masih bagus',
            'date'              => '2025/02/10',
            'pic_1'             => 'Andre',
            'pic_2'             => 'Anwar',
            'store_origin'      => '1',
            'store_destination' => '1',
            'status'            => 'unready',
        ]);
        $response->assertOk();
    }
    public function test_update_data_order_on_store_with_invalid_credentials()
    {
        $this->loginUser();
        $response = $this->putJson('/api/public/order-store/1', [
            'car_name'          => '',
            'number_plate'      => '熊谷 580 わ 1723',
            'number_body'       => 'JAYKZE81SCJ154011',
            'car_color'         => 'ブラック系',
            'car_category'      => '新車',
            'memo'              => 'kondisi mobilnya masih bagus',
            'date'              => '2025/02/10',
            'pic_1'             => 'Andre',
            'pic_2'             => 'Anwar',
            'store_origin'      => '1',
            'store_destination' => '1',
            'status'            => 'unready',
        ]);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['car_name']);
    }
    public function test_update_order()
    {
        $this->loginUser();
        $response = $this->putJson('/api/public/order/1', [
            'car_name'          => 'HRV',
            'number_plate'      => '熊谷 580 わ 1723',
            'number_body'       => 'JAYKZE81SCJ154011',
            'car_color'         => 'ブラック系',
            'car_category'      => '新車',
            'memo'              => 'kondisi mobilnya masih bagus',
            'date'              => '2025/02/10',
            'pic_1'             => 'Andre',
            'pic_2'             => 'Anwar',
            'store_origin'      => '1',
            'store_destination' => '1',
            'status'            => 'ready',
        ]);
        $response->assertOk();
    }
    public function test_update_order_with_invalid_credentials()
    {
        $this->loginUser();
        $response = $this->putJson('/api/public/order/1', [
            'car_name'          => '',
            'number_plate'      => '熊谷 580 わ 1723',
            'number_body'       => 'JAYKZE81SCJ154011',
            'car_color'         => 'ブラック系',
            'car_category'      => '新車',
            'memo'              => 'kondisi mobilnya masih bagus',
            'date'              => '2025/02/10',
            'pic_1'             => 'Andre',
            'pic_2'             => 'Anwar',
            'store_origin'      => '1',
            'store_destination' => '1',
            'status'            => 'ready',
        ]);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['car_name']);
    }
    public function test_store_history()
    {
        $this->loginUser();
        $response = $this->getJson('/api/public/store-history');
        $response->assertOk();
    }

    //order
    public function test_get_data_order()
    {
        $this->loginUser();
        $response = $this->getJson('/api/public/order/1');
        $response->assertOk();
    }
    public function test_update_order_confirm()
    {
        $this->loginUser();
        $response = $this->putJson('/api/public/order-confirm/1', [
            'car_name'          => 'HRV',
            'number_plate'      => '熊谷 580 わ 1723',
            'number_body'       => 'JAYKZE81SCJ154011',
            'car_color'         => 'ブラック系',
            'car_category'      => '新車',
            'memo'              => 'kondisi mobilnya masih bagus',
            'date'              => '2025-02-10',
            'pic_1'             => 'Andre',
            'pic_2'             => 'Anwar',
            'store_origin'      => '1',
            'store_destination' => '1',
            'status'            => 'confirmed',
            'date_confirm'      => '2025-02-10',
            'time_confirm'      => '08:00 - 11:00'
        ]);
        $response->assertOk();
    }
    public function test_update_order_confirm_with_invalid_credentials()
    {
        $this->loginUser();
        $response = $this->putJson('/api/public/order-confirm/1', [
            'car_name'          => '',
            'number_plate'      => '熊谷 580 わ 1723',
            'number_body'       => 'JAYKZE81SCJ154011',
            'car_color'         => 'ブラック系',
            'car_category'      => '新車',
            'memo'              => 'kondisi mobilnya masih bagus',
            'date'              => '2025-02-10',
            'pic_1'             => 'Andre',
            'pic_2'             => 'Anwar',
            'store_origin'      => '1',
            'store_destination' => '1',
            'status'            => 'confirmed',
            'date_confirm'      => '2025-02-10',
            'time_confirm'      => '08:00 - 11:00'
        ]);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors('car_name');
    }

    //driver
    public function test_get_data_driver_order_list()
    {
        $this->loginUser();
        $response = $this->getJson('/api/public/driver-order-list');
        $response->assertOk();
    }
    public function test_get_data_show_driver_order()
    {
        $this->loginUser();
        $response = $this->getJson('/api/public/driver-order/1');
        $response->assertOk();
    }
    public function test_update_order_driver_confirm()
    {
        $this->loginUser();
        $response = $this->putJson('/api/public/driver-order/1', [
            'car_name'          => 'HRV',
            'number_plate'      => '熊谷 580 わ 1723',
            'number_body'       => 'JAYKZE81SCJ154011',
            'car_color'         => 'ブラック系',
            'car_category'      => '新車',
            'memo'              => 'kondisi mobilnya masih bagus',
            'date'              => '2025-02-10',
            'pic_1'             => 'Andre',
            'pic_2'             => 'Anwar',
            'store_origin'      => '1',
            'store_destination' => '1',
            'status'            => 'confirmed',
            'date_confirm'      => '2025-02-10',
            'time_confirm'      => '08:00 - 11:00',
            'driver_id'         => '1',
        ]);
        $response->assertOk();
    }
    public function test_update_order_driver_confirm_with_invalid_credentials()
    {
        $this->loginUser();
        $response = $this->putJson('/api/public/driver-order/1', [
            'car_name'          => '',
            'number_plate'      => '熊谷 580 わ 1723',
            'number_body'       => 'JAYKZE81SCJ154011',
            'car_color'         => 'ブラック系',
            'car_category'      => '新車',
            'memo'              => 'kondisi mobilnya masih bagus',
            'date'              => '2025-02-10',
            'pic_1'             => 'Andre',
            'pic_2'             => 'Anwar',
            'store_origin'      => '1',
            'store_destination' => '1',
            'status'            => 'confirmed',
            'date_confirm'      => '2025-02-10',
            'time_confirm'      => '08:00 - 11:00',
            'driver_id'         => '1',
        ]);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors('car_name');
    }
    public function test_driver_history()
    {
        $this->loginUser();
        $response = $this->getJson('/api/public/driver-history');
        $response->assertOk();
    }

    // supporting data
    public function test_get_data_store()
    {
        $this->loginUser();
        $response = $this->getJson('/api/public/data-store');
        $response->assertOk();
    }
    public function test_get_data_role()
    {
        $this->loginUser();
        $response = $this->getJson('/api/admin/data-role');
        $response->assertOk();
    }

    //delete
    public function test_delete_order()
    {
        $this->loginUser();
        $response = $this->delete('api/public/order/2');
        $response->assertOk();
    }
    public function test_delete_order_with_invalid_credentials()
    {
        $this->loginUser();
        $response = $this->delete('api/public/order/1221');
        $response->assertStatus(404);
    }
}