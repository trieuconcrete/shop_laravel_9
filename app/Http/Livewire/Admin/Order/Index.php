<?php

namespace App\Http\Livewire\Admin\Order;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $orderId, $order, $order_from, $order_to, $status_message, $order_status;
    protected $orders, $queryString = [];

    public function searchOrder()
    {
        $this->queryString = array_merge([
            'order_from' => ['except' => ''],
            'order_to' => ['except' => ''],
            'status_message' => ['except' => '', 'as' => 'status']
        ], $this->queryString);
    }

    public function resetSearchForm()
    {
        $this->order_from = null;
        $this->order_to = null;
        $this->status_message = null;
        $this->queryString = array_merge([
            'order_from' => ['except' => ''],
            'order_to' => ['except' => ''],
            'status_message' => ['except' => '', 'as' => 'status']
        ], $this->queryString);
    }

    public function updateOrderStatus($orderId)
    {
        Order::where('id', $orderId)->update(['status_message' => $this->order_status]);
        $this->dispatchBrowserEvent('message', [
            'text' => 'Order Status Updated Successfully',
            'type' => 'success',
            'status' => 200
        ]);
    }

    public function orderDetailModel($orderId)
    {
        $this->orderId = $orderId;
        $this->order = Order::with('orderItems', 'orderItems.product')->where([
            'id' => $this->orderId,
            'user_id' => auth()->user()->id
        ])->first();
        $this->order_status =  $this->order->status_message;
    }

    public function render()
    {
        $this->orders = Order::with('orderItems')
        ->when($this->status_message, function($query) {
            $query->where('status_message', $this->status_message);
        })
        ->when($this->order_from, function($query) {
            $query->whereDate('created_at', '>=', $this->order_from);
        })
        ->when($this->order_to, function($query) {
            $query->whereDate('created_at', '<=', $this->order_to);
        })
        ->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.order.index', [
            'orders' => $this->orders
        ]);
    }
}
