<?php
/**
 * Filename: StoreRepository.php
 * Description: This Repository is used to helps the update functions foe store table
 * Author: Muthu Velan
 * Date: 25-09-2024
 * Version: 1.0
 */
namespace App\Repositories;

use App\Models\Store;

class StoreRepository
{
    public function getAllStores()
    {
        return Store::all();
    }

    public function createStore($data)
    {
        return Store::create($data);
    }

    public function findStoreById($id)
    {
        return Store::findOrFail($id);
    }

    public function updateStore($id, $data)
    {
        $store = Store::findOrFail($id);
        $store->update($data);
        return $store;
    }

    public function deleteStore($id)
    {
        return Store::destroy($id);
    }
}
