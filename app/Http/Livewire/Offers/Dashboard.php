<?php

namespace App\Http\Livewire\Offers;

use Livewire\Component;
use App\Models\Location;
use App\Http\Traits\Cart;
use App\Models\OrderRequest;
use App\Http\Traits\CreateOrderRequests;

class Dashboard extends Component
{
    use Cart, CreateOrderRequests;
    public $data = array();
    public $namaproject;
    public $price;
    public $contract_end;
    public $meet_date;
    public $meet_time;
    public $meet_location;
    public $city;
    public $village;
    public $state;
    public $addr_name;
    public $district;
    public $latitude;
    public $longitude;
    public $country;
    public $job_description;
    public $meetSeller;
    public $location;
    public $orderreq;
    public $order;
    public $isMuted = false;

    protected $listeners = ["fetchOrderReq", "updateDbRequest", "selectProduct", "saveToSession", "updateLocation", "updateOrderRequest"];

    public function selectProduct($cartDetail)
    {
        $this->namaproject = $cartDetail['title'];
        $this->price = $cartDetail['price'];
        $this->meetSeller = $cartDetail['is_meet_seller'];
        $this->meet_date = $cartDetail['meet_date'];
        $this->meet_time = $cartDetail['meet_time'];
        $this->contract_end = $cartDetail['contract_end'];
        $this->job_description = $cartDetail['job_description'];
        $this->location = Location::where('id', $cartDetail['meet_location'])->first();
        $this->meet_location = $this->location['address'];
        if($this->meetSeller) {
            $this->dispatchBrowserEvent('maps:load');
        }
    }

    public function fetchOrderReq($data)
    {
        $this->orderreq = $data;
        $this->namaproject = $data['title'];
        $this->meetSeller = $data['is_meet_seller'];
        $this->price = $data['price'];
        $this->meet_date = explode('T', $data['meet_at'])[0] ?? '';
        $this->meet_time = explode('T',explode('.', $data['meet_at'])[0])[1] ?? '';
        $this->job_description = $data['description'];
        $this->location = Location::where('id', $data['location_id'])->first();
        $this->meet_location = $this->location['address'];
        $this->contract_end = explode('T', $data['due_at'])[0];
        if($this->meetSeller) {
            $this->dispatchBrowserEvent('maps:load');
        }
    }

    public function updateDbRequest() {
        $data = array(
            "id" => $this->orderreq['id'],
            "location_id" => $this->orderreq['location_id'],
            "title" => $this->namaproject,
            "job_description" => $this->job_description,
            "is_meet_seller" => $this->meetSeller,
            "price" => $this->price,
            "contract_end" => $this->contract_end ?? now()->addDays(10)->format('Y-m-d H:i:s'),
            "meet_date" => $this->meet_date ?? now()->addDays(10)->format('Y-m-d'),
            "meet_time" => $this->meet_time ?? now()->addDays(10)->format('H:i:s'),
            "meet_location" => $this->meet_location,
            "addr_name" => $this->addr_name,
            "village" => $this->village,
            "district" => $this->district,
            "city" => $this->city,
            "state" => $this->state,
            "country" => $this->country,
            "latitude" => $this->latitude,
            "longitude" => $this->longitude,
        );
        $this->updateRequest($data);
    }

    public function mount($mute, $data = null)
    {
        $this->isMuted = $mute;
        $this->order = $data;
        $this->namaproject = $data['requests']['title'];
        $this->meetSeller = $data['requests']['is_meet_seller'];
        $this->meet_date = explode(' ', $data['requests']['meet_at'])[0] ?? '';
        $this->meet_time = explode(' ', $data['requests']['meet_at'])[1] ?? '';
        $this->job_description = $data['requests']['description'];
        $this->location = Location::where('id', $data['requests']['location_id'])->first();
        $this->meet_location = $this->location['address'];
        $this->contract_end = explode(' ', $data['requests']['due_at'])[0];
        if($this->meetSeller) {
            $this->dispatchBrowserEvent('maps:load');
        }
    }

    public function updatedMeetSeller()
    {
        if($this->meetSeller) {
            $this->dispatchBrowserEvent('maps:load');
        }
    }

    public function updateLocation($data)
    {
        foreach ($data as $key => $value) {
            $this->addr_name = $value['name'];
            $this->meet_location = $value['address'];
            $this->village = $value['village'];
            $this->district = $value['district'];
            $this->city = $value['city'];
            $this->state = $value['state'];
            $this->country = $value['country'];
            $this->latitude = $value['latitude'];
            $this->longitude = $value['longitude'];
        }
    }

    public function updateOrderRequest()
    {

        $data = array(
            "id" => $this->order['requests']['id'],
            "location_id" => $this->order['requests']['location_id'],
            "title" => $this->namaproject,
            "job_description" => $this->job_description,
            "is_meet_seller" => $this->meetSeller,
            "contract_end" => $this->contract_end,
            "meet_date" => $this->meet_date,
            "meet_time" => $this->meet_time,
            "meet_location" => $this->meet_location,
            "addr_name" => $this->addr_name,
            "village" => $this->village,
            "district" => $this->district,
            "city" => $this->city,
            "state" => $this->state,
            "country" => $this->country,
            "latitude" => $this->latitude,
            "longitude" => $this->longitude,
        );
        $this->updateOrder($data);
    }

    public function saveToSession($id)
    {
            if(empty($this->contract_end) || empty($this->namaproject)) {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Form belum lengkap']);
        } else {
            $data = array(
                "title" => $this->namaproject,
                "job_description" => $this->job_description,
                "price" => $this->price,
                "is_meet_seller" => $this->meetSeller,
                "contract_end" => $this->contract_end ?? now()->addDays(10),
                "meet_date" => $this->meet_date,
                "meet_time" => $this->meet_time,
                "meet_location" => $this->meet_location,
                "addr_name" => $this->addr_name,
                "village" => $this->village,
                "district" => $this->district,
                "city" => $this->city,
                "state" => $this->state,
                "country" => $this->country,
                "latitude" => $this->latitude,
                "longitude" => $this->longitude,
            );
            $this->update($id, $data);
            $this->emit("updateCart");
        }
    }

    public function render()
    {
        return view('livewire.offers.dashboard');
    }
}
