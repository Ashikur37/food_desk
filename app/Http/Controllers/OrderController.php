<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderLine;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\URL;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function viewOrder(Order $order)
    {
        return view('admin.order.view', compact('order'));
    }
    public function orderList()
    {
        return view('admin.order.list');
    }
    public function updateOrder(Order $order)
    {
    }
    public function updateOrderStatus(Order $order, $status)
    {
        $order->update([
            "status" => $status
        ]);
        return redirect()->route('orderList')->with('success', 'Order status updated successfully');
    }
    public function updateOrderPickup(Order $order, Request $request)
    {
        $order->date = $request->date;
        $order->hour = $request->hour;
        $order->minute = $request->minute;
        $order->save();

        return redirect()->route('editOrder', $order->id)->with('success', 'Order Pickup time updated successfully');
    }
    public function editOrder(Order $order)
    {
        return view('admin.order.edit', compact('order'));
    }
    public function deleteOrder(Order $order)
    {
        $order->delete();
        return redirect()->back()->with('success', 'Order deleted successfully');
    }
    public function printOrder(Order $order)
    {
        return view('admin.order.print', compact('order'));
    }
    public function orderDataTable(Request $request)
    {

        $data = Order::latest()->get();
        if ($request->from || $request->to) {
            $data = Order::whereBetween('created_at', [$request->from, $request->to])->get();
        } else {
            $data = Order::latest()->get();
        }
        return Datatables::of($data)
            ->addColumn('check', function ($row) {
                return "<input type='checkbox' class='chk' value='" . $row->id . "'>";
            })
            ->addColumn('delivery_time', function ($row) {
                return $row->date->format('D m/d') . " on " . $row->hour . ":" . $row->minute;
            })
            ->addColumn('username', function ($row) {
                $type = $row->user_id == 0 ? "<br><span class='badge badge-danger'>Guest</span>" : "";
                return $row->firstname . " " . $row->lastname . $type;
            })
            ->addColumn('order_at', function ($row) {
                return $row->created_at->format('d/m/Y');
            })
            ->addColumn('action', function ($row) {
                return "<div class='btn btn-group'><a href='" . route('printOrder', $row->id) . "' class='btn btn-sm btn-primary'><i class='fas fa-print'></i></a><a href='" . route('editOrder', $row->id) . "' class='btn btn-sm btn-warning'><i class='fas fa-edit'></i></a><a onclick='return confirm(" . '"Are you sure to delete?"' . ")' href='" . route('deleteOrder', $row->id) . "' class='btn btn-sm btn-danger'><i class='fas fa-trash'></i></a></div>";
            })
            ->editColumn('total', function ($row) {
                return "$" . $row->total . "";
            })
            ->editColumn('status', function ($row) {
                $pending = $row->status == 0 ? "selected" : "";
                $confirm = $row->status == 1 ? "selected" : "";

                $option = '<select  class="form-control">
                    <option value="0" ' . $pending . '  >Pending</option>
                    <option value="1" ' . $confirm . ' >Confirm</option>
                </select><button onclick="changeStatus(' . $row->id . ',this.parentElement.children[0].value)" class="btn btn-block my-2 btn-sm btn-primary">Update</button>';
                return $option;
            })
            ->rawColumns(['action'])
            ->escapeColumns([])
            ->make(true);
    }
    public function updateOrderLine(OrderLine $orderLine, Request $request)
    {
        $order = $orderLine->order;
        $quantity = $request->quantity;
        if ($orderLine->product->sell_product_option == "per_unit") {
            $price = $orderLine->product->price_per_unit * $orderLine->quantity;
            $newPrice = $orderLine->product->price_per_unit * $quantity;
        } elseif ($orderLine->product->sell_product_option == "weight_wise") {
            $price = $orderLine->product->price_weight * $orderLine->quantity;
            $newPrice = $orderLine->product->price_weight * $quantity;
        } else {
            $price = $orderLine->product->price_per_person * $orderLine->quantity;
            $newPrice = $orderLine->product->price_per_person * $quantity;
        }
        $order->total = $order->total +   $newPrice - $price;
        $order->save();
        $orderLine->quantity = $quantity;
        $orderLine->save();
        return redirect()->route('editOrder', $order->id)->with('success', 'Item updated successfully');
    }
    public function deleteOrderLine(OrderLine $orderLine)
    {
        $order = $orderLine->order;
        if ($orderLine->product->sell_product_option == "per_unit") {
            $price = $orderLine->product->price_per_unit * $orderLine->quantity;
        } elseif ($orderLine->product->sell_product_option == "weight_wise") {
            $price = $orderLine->product->price_weight * $orderLine->quantity;
        } else {
            $price = $orderLine->product->price_per_person * $orderLine->quantity;
        }
        $order->total = $order->total - $price;
        $order->save();
        $orderLine->delete();
        return redirect()->route('editOrder', $order->id)->with('success', 'Item deleted successfully');
    }
}
