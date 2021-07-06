<?php 
namespace App\Http\Traits;

use App\Models\Wishlist as WS;
/**
 * 
 */
trait Wishlist
{
    public function addWish($id)
    {
        try {
            WS::create([
                'user_id' => auth()->user()->id,
                'product_id' => $id,
            ]);
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'success',
            'title' => 'Produk telah ditambah ke wishlist']);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Produk gagal ditambah ke wishlist']);
        }
    }
    public function removeWish($id)
    {
        try {
            WS::where([
                ['user_id', auth()->user()->id],
                ['product_id', $id],
            ])->delete();
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'success',
            'title' => 'Produk telah dihapus dari wishlist']);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Produk gagal dihapus dari wishlist']);
        }
    }
}

?>