<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\OrderModel;
use App\Models\ReviewModel;

class UsersController extends Controller
{
    public function showUsers(Request $request)
    {
        //вывод всех данных пользователей
        $users = User::all();
        $reviews = ReviewModel::all();
        $orderData = OrderModel::all();
        $user = $request->user();
        $searchQuery = $request->input('search');

        //количество заказов для каждого заказчика
        $customers = User::role('customer')
            ->leftJoin('orders', 'users.login', '=', 'orders.login') //присоединение таблицы заказов
            ->select('users.*', DB::raw('COUNT(orders.login) as orders_count')) //подсчет пользователей и заказов
            ->groupBy('users.login') //групировка результатов по почте пользователя
            ->get();

        $transporters = User::role('transporter')
            ->leftJoin('orders', 'users.id', '=', 'orders.id_transporter') //присоединение таблицы заказов
            ->select('users.*', DB::raw('COUNT(orders.id_transporter) as orders_count')) //подсчет перевозчиков и заказов
            ->groupBy('users.id') //группировка результатов по ID пользователя
            ->get();

        //поиск из введенных данных
        if (empty($searchQuery)) {
            //запрос пустой - вывод всех заказов
            $users = User::all();
            $reviews = ReviewModel::all();
            $orders = OrderModel::all();
        } else {

            //таблица пользователей
            $users = User::where('surname', 'like', "%$searchQuery%")
                ->orWhere('name', 'like', "%$searchQuery%")
                ->orWhere('patronymic', 'like', "%$searchQuery%")
                ->orWhere('role', 'like', "%$searchQuery%")
                ->orWhere('login', 'like', "%$searchQuery%")
                ->orWhere('phone', 'like', "%$searchQuery%")
                ->orWhere('id', 'like', "%$searchQuery%")
                ->get();
            //таблица отзывов
            $reviews = ReviewModel::where('user_id', 'like', "%$searchQuery%")
                ->orWhere('transporter_id', 'like', "%$searchQuery%")
                ->orWhere('content', 'like', "%$searchQuery%")
                ->orWhere('rating', 'like', "%$searchQuery%")
                ->orWhere('id', 'like', "%$searchQuery%")
                ->get();
            //таблица заказов
            $orderData = OrderModel::where('login', 'like', "%$searchQuery%")
                ->orWhere('surname', 'like', "%$searchQuery%")
                ->orWhere('name', 'like', "%$searchQuery%")
                ->orWhere('patronymic', 'like', "%$searchQuery%")
                ->orWhere('cargo_type', 'like', "%$searchQuery%")
                ->orWhere('cargo_describe', 'like', "%$searchQuery%")
                ->orWhere('load_place', 'like', "%$searchQuery%")
                ->orWhere('unload_place', 'like', "%$searchQuery%")
                ->orWhere('created_at', 'like', "%$searchQuery%")
                ->orWhere('accepted_at', 'like', "%$searchQuery%")
                ->orWhere('payable_at', 'like', "%$searchQuery%")
                ->orWhere('departing_at', 'like', "%$searchQuery%")
                ->orWhere('delivered_at', 'like', "%$searchQuery%")
                ->orWhere('ready_date', 'like', "%$searchQuery%")
                ->orWhere('weight', 'like', "%$searchQuery%")
                ->orWhere('truck_type', 'like', "%$searchQuery%")
                ->orWhere('status', 'like', "%$searchQuery%")
                ->orWhere('id', 'like', "%$searchQuery%")
                ->get();
        }

        //все данные на странице администратора
        return view('administrator.settings', compact('users', 'customers', 'transporters', 'searchQuery', 'reviews', 'orderData'));
    }

    //обновление роли пользователя
    public function updateRole(Request $request, $id)
    {
        // Валидация роли
        $validated = $request->validate([
            'role' => 'required|string|in:magister,administrator,transporter,customer',
        ]);

        // Найти пользователя
        $user = User::findOrFail($id);

        // Удалить старую роль
        $user->roles()->detach();

        // Назначить новую роль
        $role = \Spatie\Permission\Models\Role::where('name', $validated['role'])->firstOrFail();
        $user->assignRole($role);

        // Обновить роль в таблице users (если у вас есть такое поле)
        $user->role = $validated['role'];
        $user->save();

        return redirect()->back()->with('success', 'Роль пользователя успешно обновлена.');
    }

    //обновление доступа пользователя
    public function updateStatus(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users->status = $request->status;
        $users->save();

        return redirect()->back();
    }

    //просмотр профиля пользователя
    public function profile($id)
    {
        $user = User::findOrFail($id);
        $orderData = OrderModel::all();

        //заказчики
        $customers = User::role('customer')
            ->leftJoin('orders', 'users.login', '=', 'orders.login') //присоединение таблицы заказов
            ->select('users.*', DB::raw('COUNT(orders.login) as orders_count')) //подсчет пользователей и заказов
            ->groupBy('users.login') //групировка результатов по почте пользователя
            ->get();

        //перевозчики
        $transporters = User::role('transporter')
            ->leftJoin('orders', 'users.id', '=', 'orders.id_transporter') //присоединение таблицы заказов
            ->select('users.*', DB::raw('COUNT(orders.id_transporter) as orders_count')) //подсчет перевозчиков и заказов
            ->groupBy('users.id') //группировка результатов по идентификатору пользователя
            ->get();

        //получение отзывов для перевозчика
        if ($user->role === 'transporter') {
            $reviews = ReviewModel::where('transporter_id', $id)->get();
            $averageRating = ReviewModel::where('transporter_id', $id)->avg('rating');
            //если отзывов нет
        } else {
            $reviews = [];
            $averageRating = null;
        }

        return view('user.profile', compact('user', 'customers', 'transporters', 'reviews', 'averageRating'));
    }

    //функция удаления заказа
    public function delete($id)
    {
        $orderData = OrderModel::findOrFail($id);
        $orderData->delete();
        return redirect()->back();
    }

    //функция удаления пользователя
    public function remove($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->back();
    }

    //функция удаления отзыва
    public function clear($id)
    {
        $reviews = ReviewModel::findOrFail($id);
        $reviews->delete();
        return redirect()->back();
    }
}
