<?php namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use App\Models\Variable;

use DataTables;


class PaymentControllers extends Controller {

    use \TraitsFunc;

    public function index()
    {   
        // if($request->ajax()){
        //     $data = Variable::dataList();
        //     return Datatables::of($data['data'])->make(true);
        // }
        // $data['title'] = 'الطلبات';
        // $data['name'] = 'order';
        // $data['url'] = 'ATAdmin/orders';

        
        // $data['variables'] = Variable::dataList(1)['data'];
        return view('Payment.Views.index');
    }

        

}
