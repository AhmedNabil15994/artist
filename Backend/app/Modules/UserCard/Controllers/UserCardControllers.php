<?php namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\UserCard;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;
use App\Models\UserMember;
use App\Models\Membership;
use App\Models\Field;
use App\Models\WebActions;
use App\Models\UserRequest;
use App\Models\Variable;
use Illuminate\Http\Request;
use DataTables;
use App\Helper\JawalyHelper;
use App\Helper\MailHelper;
use PDF;

class UserCardControllers extends Controller {

    use \TraitsFunc;

    protected function validateUpdateObject($input){
        $rules = [
            'identity_no' => 'required',
            'identity_end_date' => 'required',
            'membership_id' => 'required',
            'status' => 'required',
        ];

        $message = [
            'identity_no.required' => 'يرجي ادخال رقم الهوية',
            'identity_end_date.required' => "يرجي ادخال تاريخ الميلاد",
            'membership_id.required' => "يرجي اختيار العضوية",
            'status.required' => "يرجي اختيار الحالة",
        ];

        $validate = \Validator::make($input, $rules, $message);

        return $validate;
    }

    protected function validateObject($input){
        $rules = [
            'user_id' => 'required',
            'membership_id' => 'required',
        ];

        $message = [
            'user_id.required' => 'يرجي اختيار المستخدم',
            'membership_id.required' => "يرجي اختيار نوع العضوية",
        ];

        $validate = \Validator::make($input, $rules, $message);

        return $validate;
    }

    public function index(Request $request){  
        if($request->ajax()){
            $data = UserCard::dataList();
            return Datatables::of($data['data'])->make(true);
        }
        $data['memberships'] = Membership::dataList(1)['data'];
        return view('UserCard.Views.index')->with('data', (object) $data);
    }

    public function delete($id) {
        $id = (int) $id;
        $menuObj = UserCard::getOne($id);
        Order::NotDeleted()->where('id',$menuObj->order_id)->update(['status'=>3]);
        WebActions::newType(3,'UserCard');
        return \Helper::globalDelete($menuObj);
    }

    public function printCard($id) {
        $id = (int) $id;
        $menuObj = UserCard::getOne($id);
        if(!$menuObj){
            return redirect(404);
        }
        $data['data'] = UserCard::getData($menuObj);
        $data['data']->order = Order::getData($menuObj->Order);

        $pdf = PDF::loadView('UserCard.Views.print', $data)
                ->setPaper('a4', 'landscape')
                ->setOption('margin-bottom', '0mm')
                ->setOption('margin-top', '0mm')
                ->setOption('margin-right', '0mm')
                ->setOption('margin-left', '0mm');

        return $pdf->download('MemberShip.pdf');
    }

    public function viewCard($id) {
        $id = (int) $id;
        $menuObj = UserCard::getOne($id);
        if(!$menuObj){
            return redirect(404);
        }
        $data['data'] = UserCard::getData($menuObj);
        $data['data']->order = Order::getData($menuObj->Order);
        return view('UserCard.Views.view')->with('data',  (object) $data['data']);
    }  

    public function edit($id) {
        $id = (int) $id;
        $menuObj = UserCard::getOne($id);
        if(!$menuObj){
            return redirect(404);
        }
        $data['data'] = UserCard::getData($menuObj);
        $data['data']->order = Order::getData($menuObj->Order);
        $data['data']->allmemberships = Membership::dataList(1)['data'];
        $data['data']->fields = Field::dataList(1)['data'];
        return view('UserCard.Views.edit')->with('data',  (object) $data['data']);
    }

    public function update($id){
        $id = (int) $id;
        $input = \Request::all();

        $menuObj = UserCard::getOne($id);
        if(!$menuObj){
            return redirect(404);
        }

        $validate = $this->validateUpdateObject($input);
        if($validate->fails()){
            \Session::flash('error', $validate->messages()->first());
            return redirect()->back();
        }

        if(isset($input['deliver_no']) && !empty($input['deliver_no'])){
            $menuObj->deliver_no = $input['deliver_no'];
        }

        if(isset($input['membership_id']) && !empty($input['membership_id'])){
            $menuObj->membership_id = $input['membership_id'];
        }

        if(isset($input['status']) && !empty($input['status'])){
            $menuObj->status = $input['status'];
        }

        $menuObj->save();
        
        $orderDetailsObj = OrderDetails::where('order_id',$menuObj->order_id)->first();

        if(isset($input['identity_no']) && !empty($input['identity_no'])){
            $orderDetailsObj->identity_no = $input['identity_no'];
        }

        if(isset($input['identity_end_date']) && !empty($input['identity_end_date'])){
            $orderDetailsObj->identity_end_date = $input['identity_end_date'];
        }

        $orderDetailsObj->save();

        $orderObj = Order::find($menuObj->order_id);
        if(isset($input['card_name']) && !empty($input['card_name'])){
            $orderObj->name = $input['card_name'];
            $orderObj->save();
        }    

        if(isset($input['name']) && !empty($input['name'])){
            $orderObj->name = $input['name'];
            $orderObj->save();
        } 

        if(isset($input['field_id']) && !empty($input['field_id'])){
            $orderObj->field_id = $input['field_id'];
            $orderObj->save();
        }           

        // Order Details
        //identity_image
        //image

        WebActions::newType(4,'UserCard');
        Session::flash('success','تم الحفظ بنجاح');
        return redirect()->back()->withInput();
    }


    public function uploadImage(Request $request,$id=false){
        \Session::put('identity_image', '');
        \Session::put('image', '');
        \Session::put('transfer_image', '');
        $userCardObj = UserCard::find($id);
        if ($request->hasFile('file')) {
            $files = $request->file('file');
            $images = self::addImage($files,$userCardObj->order_id,'identity_image');
            if ($images == false) {
                return \TraitsFunc::ErrorMessage("حدث مشكلة في رفع الملفات");
            }
            \Session::put('identity_image',$images);
            return \TraitsFunc::SuccessResponse('تم رفع الصورة بنجاح');
        }

        if ($request->hasFile('file2')) {
            $files = $request->file('file2');
            $images = self::addImage($files,$userCardObj->order_id,'image');
            if ($images == false) {
                return \TraitsFunc::ErrorMessage("حدث مشكلة في رفع الملفات");
            }
            \Session::put('image',$images);
            return \TraitsFunc::SuccessResponse('تم رفع الصورة بنجاح');
        }

        if ($request->hasFile('file3')) {
            $files = $request->file('file3');
            $images = self::addImage($files,$userCardObj->order_id,'transfer_image');
            if ($images == false) {
                return \TraitsFunc::ErrorMessage("حدث مشكلة في رفع الملفات");
            }
            \Session::put('transfer_image',$images);
            return \TraitsFunc::SuccessResponse('تم رفع الصورة بنجاح');
        }
    }

    public function addImage($images,$nextID=false,$type) {
        $userCardObj = UserCard::find($nextID);
        $menuObj = OrderDetails::where('order_id',$userCardObj->order_id)->first();
        
        $fileName = \ImagesHelper::UploadImage('orders', $images, $userCardObj->order_id);
       
        if($fileName == false){
            return false;
        }


        $menuObj->$type = $fileName;
        $menuObj->save();
        
        return 1;        
    }

    public function deleteImage($id){
        $id = (int) $id;
        $input = \Request::all();
        $userCardObj = UserCard::find($id);

        $menuObj = OrderDetails::where('order_id',$userCardObj->order_id)->first();

        if($menuObj == null) {
            return \TraitsFunc::ErrorMessage("هذه الصفحة غير موجودة");
        }

        $type = $input['type'];
        $menuObj->$type = '';
        $menuObj->save();

        return \TraitsFunc::SuccessResponse('تم حذف الصورة بنجاح');
    }

     public function newMember(){
        $input = \Request::all();
        $id = $input['id'];
        $deliver_no = $input['deliver_no'];
        $orderObj = Order::getOne($id);
            
        $start_date = now()->format('Y-m-d');
        $end_date = date("Y-m-d", strtotime(now()->format('Y-m-d'). " + 1 year"));
        $menuObj = UserCard::NotDeleted()->where('order_id',$id)->first();
        if(!$menuObj){
            $menuObj = new UserCard;
            $menuObj->code = UserCard::getNewCode();
        }
        $menuObj->order_id = $orderObj->id;
        $menuObj->membership_id = $orderObj->membership_id;
        $menuObj->deliver_no = $input['deliver_no'];
        $menuObj->start_date = $start_date;
        $menuObj->end_date = $end_date;
        $menuObj->status = 1;
        $menuObj->sort = UserCard::newSortIndex();
        $menuObj->created_at = DATE_TIME;
        $menuObj->created_by = USER_ID;
        $menuObj->save();

        $message = 'تم الموافقة علي طلبكم رقم '.$orderObj->order_no.'\r\n وتم انشاء العضوية بنجاح. عضوية رقم : '.$menuObj->code.'\r\n ورقم الشحنة هو :'.$input['deliver_no'];
        JawalyHelper::sendSMS($orderObj->phone,$message);
        $emailData = [
            'firstName' => $orderObj->name,
            'subject' => 'عضوية '.Variable::getVar('العنوان عربي'),
            'content' => str_replace('\r\n', '<br>', $message),
            'to' => $orderObj->email,
        ];
        MailHelper::prepareEmail($emailData);
        $orderObj->status = 6;
        $orderObj->updated_at = DATE_TIME;
        $orderObj->updated_by = USER_ID;
        $orderObj->save();
        return \TraitsFunc::SuccessResponse('تم انشاء العضوية بنجاح');
    }

    public function fastEdit() {
        $input = \Request::all();
        foreach ($input['data'] as $item) {
            $col = $item[1];
            $menuObj = UserCard::find($item[0]);
            $menuObj->$col = $item[2];
            $menuObj->updated_at = DATE_TIME;
            $menuObj->updated_by = USER_ID;
            $menuObj->save();

            if($col == 'status'){
                if($item[2] == 0){
                    Order::NotDeleted()->where('order_id',$menuObj->order_id)->update(['status',3]);
                }
            }
        }

        WebActions::newType(4,'UserCard');
        return \TraitsFunc::SuccessResponse('تم التعديل بنجاح');
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

        $addCount = WebActions::getByDate($date,$start,$end,1,'UserCard')['count'];
        $editCount = WebActions::getByDate($date,$start,$end,2,'UserCard')['count'];
        $deleteCount = WebActions::getByDate($date,$start,$end,3,'UserCard')['count'];
        $fastEditCount = WebActions::getByDate($date,$start,$end,4,'UserCard')['count'];

        $data['chartData1'] = $this->getChartData($start,$end,1,'UserCard');
        $data['chartData2'] = $this->getChartData($start,$end,2,'UserCard');
        $data['chartData3'] = $this->getChartData($start,$end,4,'UserCard');
        $data['chartData4'] = $this->getChartData($start,$end,3,'UserCard');
        $data['counts'] = [$addCount , $editCount , $deleteCount , $fastEditCount];
        $data['title'] = 'بطاقات الاعضاء';
        $data['miniTitle'] = 'بطاقات الاعضاء';
        $data['url'] = 'userCards';

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
