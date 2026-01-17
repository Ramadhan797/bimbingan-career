<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tiket;
use App\Models\Order;
use App\Models\DetailOrder;
use Illuminate\Http\Request;

class EventUserController extends Controller
{
    public function index()
    {
        $events = Event::with('kategoris')->get();
        return view('events.index', compact('events'));
    }

    public function show(Event $event)
    {
        $event->load('kategoris', 'tikets');
        return view('events.show', compact('event'));
    }

    public function myOrders()
    {
        $orders = Order::with(['event', 'detailOrders.tiket'])
            ->where('user_id', auth()->id())
            ->orderBy('order_date', 'desc')
            ->get();

        return view('user.orders', compact('orders'));
    }
}
