<?php 
namespace App\Http\Traits;

use Illuminate\Support\Str;
use App\Models\OrderRequest;

trait CreateOrderRequests { 

    public function createRequest($data)
    {
        try {
            $create = OrderRequest::create([
                'uuid' => Str::uuid(),
                'product_id' => $data['id'],
                'customer_id' => auth()->user()->id,
                'seller_id' => $data['seller_id'],
                'location_id' => $data['location_id'] ?? null,
                'title' => $data['title'],
                'description' => $data['job_description'],
                'max_return' => $data['max_return'],
                'is_meet_seller' => $data['is_meet_seller'] ?? false,
                'price' => $data['price'],
                'due_at' => $data['contract_end'],
                'meet_at' => $data['meet_date'] . ' ' . $data['meet_time'],
                'status' => OrderRequest::IS_REQUESTED,
            ]);
            return redirect(url('chats/' . $create['uuid']));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
?>