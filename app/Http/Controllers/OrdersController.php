<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderModel;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    //вывод заказов основанных на роли пользователя и поисковом запросе
    public function showOrders(Request $request)
    {
        //вывод всех заказов
        $user = $request->user();
        $orderData = OrderModel::all();

        //заказчик
        if ($user->hasRole('customer')) {

            //поиск из введенных данных
            $searchQuery = $request->input('search');

            //вывод заказов для заказчика
            $userOrders = OrderModel::where('login', $user->login);

            //запрос пустой - вывод всех заказов заказчика
            if (!empty($searchQuery)) {
                $userOrders->where(function ($query) use ($searchQuery) {
                    $query->where('id', 'like', "%$searchQuery%")
                        ->orWhere('cargo_type', 'like', "%$searchQuery%")
                        ->orWhere('cargo_describe', 'like', "%$searchQuery%")
                        ->orWhere('weight', 'like', "%$searchQuery%")
                        ->orWhere('load_place', 'like', "%$searchQuery%")
                        ->orWhere('unload_place', 'like', "%$searchQuery%")
                        ->orWhere('truck_type', 'like', "%$searchQuery%")
                        ->orWhere('status', 'like', "%$searchQuery%");
                });
            }
            //отфильтрованные заказы на странице заказчику
            $userOrders = $userOrders->orderBy('created_at', 'desc')->paginate(10);

            return view('customer.orders', compact('userOrders'));
        } elseif ($user->hasRole('transporter')) {

            //непринятые заказы со статусом ожидание
            $orderData = OrderModel::where('status', 'processing')->get();

            //поиск из введенных данных
            $searchQuery = $request->input('search');

            //перевозчик
            if (empty($searchQuery)) {
                //запрос пустой - вывод всех заказов
                $orders = OrderModel::where('status', 'processing');
            } else {

                $orderData = OrderModel::where('id', 'like', "%$searchQuery%")
                    ->orWhere('id_customer', 'like', "%$searchQuery%")
                    ->orWhere('cargo_type', 'like', "%$searchQuery%")
                    ->orWhere('cargo_describe', 'like', "%$searchQuery%")
                    ->orWhere('weight', 'like', "%$searchQuery%")
                    ->orWhere('ready_date', 'like', "%$searchQuery%")
                    ->orWhere('load_place', 'like', "%$searchQuery%")
                    ->orWhere('unload_place', 'like', "%$searchQuery%")
                    ->orWhere('truck_type', 'like', "%$searchQuery%")
                    ->get();
            }

            //все заказы на странице перевозчику
            return view('transporter.orders', compact('orderData', 'searchQuery'));
        }
    }

    //принятые перевозчиком заказы
    public function workOrders(Request $request)
    {
        //вывод всех пользователей и их заказов
        $user = $request->user();
        $orderData = OrderModel::all();

        if ($user->hasRole('transporter')) {

            //принятые заказы не со статусом ожидание
            $orderData = OrderModel::where('status', '!=', 'processing')->get();

            //поиск из введенных данных
            $searchQuery = $request->input('search');

            //перевозчик
            if (empty($searchQuery)) {
                //запрос пустой - вывод всех заказов
                $orders = OrderModel::where('status', '!=', 'processing');
            } else {

                $orderData = OrderModel::where('id', 'like', "%$searchQuery%")
                    ->orWhere('id_customer', 'like', "%$searchQuery%")
                    ->orWhere('cargo_type', 'like', "%$searchQuery%")
                    ->orWhere('cargo_describe', 'like', "%$searchQuery%")
                    ->orWhere('weight', 'like', "%$searchQuery%")
                    ->orWhere('ready_date', 'like', "%$searchQuery%")
                    ->orWhere('load_place', 'like', "%$searchQuery%")
                    ->orWhere('unload_place', 'like', "%$searchQuery%")
                    ->orWhere('truck_type', 'like', "%$searchQuery%")
                    ->orWhere('status', 'like', "%$searchQuery%")
                    ->get();
            }

            //все заказы на странице перевозчику
            return view('transporter.inwork', compact('orderData', 'searchQuery'));
        }
    }

    //корзина удаленных заказов
    public function trashOrders(Request $request)
    {
        //вывод всех заказов
        $user = $request->user();
        $orderData = OrderModel::all();

        //заказчик
        if ($user->hasRole('customer')) {

            //поиск из введенных данных
            $searchQuery = $request->input('search');

            //вывод заказов для заказчика
            $userOrders = OrderModel::where('login', $user->login);

            //запрос пустой - вывод всех заказов заказчика
            if (!empty($searchQuery)) {
                $userOrders->where(function ($query) use ($searchQuery) {
                    $query->where('id', 'like', "%$searchQuery%")
                        ->orWhere('cargo_type', 'like', "%$searchQuery%")
                        ->orWhere('cargo_describe', 'like', "%$searchQuery%")
                        ->orWhere('weight', 'like', "%$searchQuery%")
                        ->orWhere('load_place', 'like', "%$searchQuery%")
                        ->orWhere('unload_place', 'like', "%$searchQuery%")
                        ->orWhere('truck_type', 'like', "%$searchQuery%")
                        ->orWhere('status', 'like', "%$searchQuery%");
                });
            }

            $userOrders = $userOrders->get();
            //все заказы на странице корзины
            return view('customer.trash', compact('userOrders'));
        }
    }

    //функция статуса заказа ожидание
    public function processing($id)
    {
        $order = OrderModel::findOrFail($id);
        $order->status = 'processing';
        $order->save();
        return redirect()->back();
    }

    //функция статуса заказа принят
    public function accepted($id)
    {
        $order = OrderModel::findOrFail($id);
        if ($order->status === 'processing') {
            $order->status = 'accepted';
            $order->accepted_at = now(); //дата изменения
            $order->id_transporter = Auth::id(); //присвоение номера перевозчика
            $order->save();
        }
        return redirect()->back();
    }

    //функция статуса заказа оплачен
    public function payable($id)
    {
        $order = OrderModel::findOrFail($id);
        if ($order->status === 'agreed') {
            $order->status = 'payable';
            $order->payable_at = now(); //дата изменения
            $order->save();
        }
        return redirect()->back();
    }

    //функция статуса заказа отправлен
    public function departing($id)
    {
        $order = OrderModel::findOrFail($id);
        if ($order->status === 'payable') {
            $order->status = 'departing';
            $order->departing_at = now(); //дата изменения
            $order->save();
        }
        return redirect()->back();
    }

    //функция статуса заказа доставлен
    public function delivered($id)
    {
        $order = OrderModel::findOrFail($id);
        if ($order->status === 'departing') {
            $order->status = 'delivered';
            $order->delivered_at = now(); //дата изменения
            $order->save();
        }
        return redirect()->back();
    }

    //функция статуса заказа удален
    public function deleted($id)
    {
        $order = OrderModel::findOrFail($id);
        $order->status = 'deleted';
        $order->save();
        return redirect()->back();
    }

    //просмотр заказа
    public function show($id, Request $request)
    {
        $user = $request->user();

        // Получение заказа по ID
        $order = OrderModel::findOrFail($id);

        return view('show', compact('order'));
    }

    // создание предложения цены от перевозчика
    public function createOffer($id, Request $request)
    {
        $order = OrderModel::findOrFail($id);

        $order->update([
            'cost' => $request->cost,
        ]);

        return redirect()->route('orders.show', $order->id);
    }

    // принятие предложения заказчиком
    public function agreedOffer($id)
    {
        $order = OrderModel::findOrFail($id);

        $order->update([
            'status' => 'agreed',
            'agreed_at' => now(), //дата изменения
        ]);

        return redirect()->route('orders.show', $order->id);
    }

    //удаление заказа
    public function destroy($id)
    {
        $orderData = OrderModel::findOrFail($id);
        $orderData->delete();
        return redirect()->back();
    }
}
