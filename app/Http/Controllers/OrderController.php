<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use DataTables;

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

    public function orderList()
    {
        return view('admin.order.list');
    }
    public function orderDataTable()
    {
        $data = Order::latest()->get();
        return Datatables::of($data)
            ->addColumn('username', function ($row) {
                $type = $row->user_id == 0 ? "<br><span class='badge badge-danger'>Guest</span>" : "";
                return $row->firstname . " " . $row->lastname . $type;
            })
            ->addColumn('order_at', function ($row) {
                return $row->created_at->diffForHumans();
            })
            ->addColumn('action', function ($row) {
                return "<span>Hello</span>";
            })
            ->editColumn('total', function ($row) {
                return "$" . $row->total . "";
            })
            ->editColumn('status', function ($row) {
                if ($row->status == 0) {
                    return "<span class='badge badge-warning'>Pending</span>";
                } else if ($row->status == 1) {
                    return "<span class='badge badge-success'>Confirmed</span>";
                }
                if ($row->status == 2) {
                    return "<span class='badge badge-danger'>Canceled</span>";
                }
            })
            ->addColumn('action', function ($row) {
                return "<span>Hello</span>";
            })->rawColumns(['action'])
            ->escapeColumns([])
            ->make(true);
    }
}
