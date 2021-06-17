<?php namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\Field;
use App\Models\City;
use App\Models\Membership;
use App\Models\Variable;
use App\Models\UserCard;
use App\Models\WebActions;
use App\Models\Coupon;
use App\Helper\JawalyHelper;
use App\Helper\MailHelper;
use Illuminate\Http\Request;
use DataTables;


class OrderControllers extends Controller {

    use \TraitsFunc;

    public function index(Request $request)
    {   
        if($request->ajax()){
            $data = Order::dataList();
            return Datatables::of($data['data'])->make(true);
        }
        $data['title'] = 'الطلبات';
        $data['name'] = 'order';
        $data['url'] = 'orders';
        $data['categories'] = [];
        $data['fields'] = Field::dataList(1)['data'];
        $data['cities'] = City::dataList(1)['data'];
        $data['memberships'] = Membership::dataList(1)['data'];
        return view('Order.Views.index')->with('data',(object) $data);
    }

    public function edit($id) {
        $id = (int) $id;

        $menuObj = Order::getOne($id);
        if($menuObj == null) {
            return Redirect('404');
        }

        $data['data'] = Order::getData($menuObj);
        $data['fields'] = Field::dataList(1)['data'];
        $data['cities'] = City::dataList(1)['data'];
        $data['memberships'] = Membership::dataList(1)['data'];
        $data['availableCoupons'] = Coupon::availableCoupons();
        return view('Order.Views.edit')->with('data', (object) $data);      
    }

    public function update($id) {
        $id = (int) $id;
        $input = \Request::all();

        $menuObj = Order::getOne($id);

        if($menuObj == null) {
            return Redirect('404');
        }

        $menuObj->name = $input['name'];
        $menuObj->email = $input['email'];
        $menuObj->phone = $input['phone'];
        $menuObj->card_name = $input['card_name'];
        $menuObj->gender = $input['gender'];
        $menuObj->field_id = $input['field_id'];
        $menuObj->city_id = $input['city_id'];
        $menuObj->membership_id = $input['membership_id'];
        $menuObj->brief = $input['brief'];
        $menuObj->coupon = $input['coupon'];
        $menuObj->status = $input['status'];
        $menuObj->updated_at = DATE_TIME;
        $menuObj->updated_by = USER_ID;
        $menuObj->save();

        $menuObj->Details()->update([
            'facebook' => $input['facebook'],
            'twitter' => $input['twitter'],
            'instagram' => $input['instagram'],
            'youtube' => $input['youtube'],
            'snapchat' => $input['snapchat'],
        ]);

        WebActions::newType(2,'Order');
        \Session::flash('success', "تنبيه! تم التعديل بنجاح");
        return \Redirect::back()->withInput();
    }

    public function softDelete(Request $request) {
        $menuObj = Order::whereIn('id',$request->data)->update(['deleted_at'=>DATE_TIME,'deleted_by'=>USER_ID]);
        WebActions::newType(3,'Order');
        $data['status'] = \TraitsFunc::SuccessResponse("تم الحذف بنجاح");
        return response()->json($data);
    }

    public function changeStatus($status,Request $request) {
        $status = (int) $status;
        if(!in_array($status, [1,2,3,4,5,6,7])){
            $data['status'] = \TraitsFunc::ErrorMessage("يرجي مراجعة البيانات");
            return response()->json($data);
        }
        $menuObj = Order::whereIn('id',$request->data)->update(['status'=>$status,'updated_at'=>DATE_TIME,'updated_by'=>USER_ID]);
        WebActions::newType(2,'Order');
        $data['status'] = \TraitsFunc::SuccessResponse("تم التعديل بنجاح");
        return response()->json($data);
    }

    public function delete($id) {
        $id = (int) $id;
        $menuObj = Order::getOne($id);
        WebActions::newType(3,'Order');
        return \Helper::globalDelete($menuObj);
    }

    public function fastEdit() {
        $input = \Request::all();
        foreach ($input['data'] as $item) {
            $col = $item[1];
            $menuObj = Order::getOne($item[0]);
            if($col == 'status' && $item[2] == 2){
                $key = base64_encode('order-'.$menuObj->id);
                $message = 'تم الموافقة علي طلبكم وهذا رابط استكمال التسجيل : '.config('app.FRONT_URL').'complete/'.$key;
                JawalyHelper::sendSMS($menuObj->phone,$message);
            }
            $menuObj->$col = $item[2];
            $menuObj->updated_at = DATE_TIME;
            $menuObj->updated_by = USER_ID;
            $menuObj->save();
        }

        WebActions::newType(4,'Order');
        return \TraitsFunc::SuccessResponse('تم التعديل بنجاح');
    }

    public function status($id,$status)
    {
        $id = (int) $id;
        $status = (int) $status;

        $menuObj = Order::getOne($id);
        if($menuObj == null || !in_array($status, [2,3])) {
            return Redirect('404');
        }

        if($status == 2){
            $key = base64_encode('order-'.$menuObj->id);
            $message = 'تم الموافقة علي طلبكم وهذا رابط استكمال التسجيل : '.config('app.FRONT_URL').'complete/'.$key;
            // dd($message);
            JawalyHelper::sendSMS($menuObj->phone,$message);
        }

        $menuObj->status = $status;
        $menuObj->save();
        \Session::flash('success','تم التعديل بنجاح');
        return redirect()->back();
    }

    public function charts() {
        $input = \Request::all();
        $now = date('Y-m-d');
        $start = $now;
        $end = $now;
        $date = null;
        if(isset($input['from']) && !empty($input['from']) && isset($input['to']) && !empty($input['to'])){
            $start = $input['from'].' 00:00:00';
            $end = $input['to'].' 23:59:59';
            $date = 1;
        }

        $addCount = WebActions::getByDate($date,$start,$end,1,'Order')['count'];
        $editCount = WebActions::getByDate($date,$start,$end,2,'Order')['count'];
        $deleteCount = WebActions::getByDate($date,$start,$end,3,'Order')['count'];
        $fastEditCount = WebActions::getByDate($date,$start,$end,4,'Order')['count'];

        $data['chartData1'] = $this->getChartData($start,$end,1,'Order');
        $data['chartData2'] = $this->getChartData($start,$end,2,'Order');
        $data['chartData3'] = $this->getChartData($start,$end,4,'Order');
        $data['chartData4'] = $this->getChartData($start,$end,3,'Order');
        $data['counts'] = [$addCount , $editCount , $deleteCount , $fastEditCount];
        $data['title'] = 'الطلبات';
        $data['miniTitle'] = 'الطلبات';
        $data['url'] = 'orders';

        return view('TopMenu.Views.charts')->with('data',(object) $data);
    }

    public function getChartData($start=null,$end=null,$type,$moduleName){
        $input = \Request::all();
        
        if(isset($input['from']) && !empty($input['from']) && isset($input['to']) && !empty($input['to'])){
            $start = $input['from'];
            $end = $input['to'];
        }

        $datediff = strtotime($end) - strtotime($start);
        $daysCount = round($datediff / (60 * 60 * 24));
        $datesArray = [];
        $datesArray[0] = $start;

        if($daysCount > 2){
            for($i=0;$i<$daysCount;$i++){
                $datesArray[$i] = date('Y-m-d',strtotime($start.'+'.$i."day") );
            }
            $datesArray[$daysCount] = $end;  
        }else{
            for($i=1;$i<24;$i++){
                $datesArray[$i] = date('Y-m-d H:i:s',strtotime($start.'+'.$i." hour") );
            }
        }

        $chartData = [];
        $dataCount = count($datesArray);

        for($i=0;$i<$dataCount;$i++){
            if($dataCount == 1){
                $count = WebActions::where('type',$type)->where('module_name',$moduleName)->where('created_at','>=',$datesArray[0].' 00:00:00')->where('created_at','<=',$datesArray[0].' 23:59:59')->count();
            }else{
                if($i < count($datesArray)){
                    $count = WebActions::where('type',$type)->where('module_name',$moduleName)->where('created_at','>=',$datesArray[$i].' 00:00:00')->where('created_at','<=',$datesArray[$i].' 23:59:59')->count();
                }
            }
            $chartData[0][$i] = $datesArray[$i];
            $chartData[1][$i] = $count;
        }
        return $chartData;
    }

}
