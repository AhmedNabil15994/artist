<?php namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Field;
use App\Models\City;
use App\Models\Membership;
use App\Models\Slider;
use App\Models\Regulation;
use App\Models\Feature;
use App\Models\UserCard;
use App\Models\User;
use App\Models\Variable;
use App\Models\Order;
use App\Models\Category;
use App\Models\OrderDetails;
use App\Models\WebActions;
use App\Models\ContactUs;
use App\Models\Event;
use App\Models\Director;
use App\Models\Coupon;
use PDF;

class HomeControllers extends Controller {

    use \TraitsFunc;

    protected function validateObject($input){
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:10',//|regex:/(01)[0-9]{9}/',
            'message' => 'required',
            'address' => 'required',
        ];

        $message = [
            'name.required' => "يرجي ادخال الاسم بالكامل",
            'email.required' => "يرجي ادخال البريد الالكتروني",
            'email.email' => "يرجي ادخال بريد الكتروني متاح",
            'message.required' => "يرجي ادخال تفاصيل الرسالة",
            'address.required' => "يرجي ادخال عنوان الرسالة",
            'phone.required' => "يرجي ادخال رقم الجوال",
            'phone.min' => "رقم الجوال يجب ان يكون 10 خانات",
        ];

        $validate = \Validator::make($input, $rules, $message);

        return $validate;
    }

    protected function validateOrder($input){
        $rules = [
            'name' => 'required',
            'name_en' => 'required',
            'phone' => 'required|min:10',//|regex:/(01)[0-9]{9}/',
            'email' => 'required',
            'gender' => 'required',
            'field_id' => 'required',
            'city_id' => 'required',
            'membership_id' => 'required',
        ];

        $message = [
            'name.required' => "يرجي ادخال الاسم عربي بالكامل",
            'name_en.required' => "يرجي ادخال الاسم انجليزي بالكامل",
            'phone.required' => "يرجي ادخال رقم الجوال",
            'phone.min' => "رقم الجوال يجب ان يكون 10 خانات",
            'email.required' => "يرجي ادخال البريد الالكتروني",
            'gender.required' => "يرجي اختيار الجنس",
            'field_id.required' => "يرجي اختيار المجال الفني",
            'city_id.required' => "يرجي اختيار المدينة",
            'membership_id.required' => "يرجي اختيار العضوية",
        ];

        $validate = \Validator::make($input, $rules, $message);

        return $validate;
    }

    protected function validateOrderStep2($input){
        $rules = [
            'identity_no' => 'required',
            'identity_end_date' => 'required',//|regex:/(01)[0-9]{9}/',
            'image' => 'required',
            'identity_image' => 'required',
        ];

        $message = [
            'identity_no.required' => "يرجي ادخال رقم الهوية",
            'identity_end_date.required' => "يرجي ادخال تاريخ الميلاد",
            'image.required' => "يرجي ارفاق الصورة الشخصية",
            'identity_image.required' => "يرجي ارفاق صورة الهوية",
        ];

        $validate = \Validator::make($input, $rules, $message);

        return $validate;
    }

    public function index(){   
        $data['memberships'] = Membership::dataList(1)['data'];
        $data['pages'] = Page::dataList(1,[1])['data'];
        $data['aboutUs'] = Page::dataList(1,[1,4,5,6])['data']; 
        $data['events'] = Event::dataList(1,null,1,1)['data'];
        $data['initiatives'] = Event::dataList(1,null,2,1)['data'];
        $data['categories'] = Category::dataList(1)['data'];
        $data['sliders'] = Slider::dataList(1,[1,11])['data'];
        $data['founders'] = Director::dataList(1,null,2,1)['data'];
        $data['fields'] = Field::dataList(1)['data'];
        $data['cities'] = City::dataList(1)['data'];
        $data['counters'] = Page::dataList(1,[7,8,9])['data'];
        $data['countersImage'] = Page::dataList(1,[16])['data'][0];
        $data['partners'] = Slider::generateObj(Slider::NotDeleted()->where('title','الشركاء والداعمين'))['data'];
        $data['lat'] = Variable::getVar('latitude:');
        $data['lng'] = Variable::getVar('longitude:');
        return view('Home.Views.index')->with('data',(object) $data);
    }

    public function aboutUs(){   
        $data = Page::dataList(1,[1,4,5,6]);
        $data['mainPhoto'] = Page::dataList(1,[10])['data'];
        return view('Home.Views.aboutUs')->with('data',(object) $data);
    }

    public function events(){
        $data['events'] = Event::dataList(1,null,1)['data'];
        $data['initiatives'] = Event::dataList(1,null,2)['data'];
        $data['mainPhoto'] = Page::dataList(1,[13])['data'];
        return view('Home.Views.events')->with('data',(object) $data);
    }

    public function founders(){   
        $data['data'] = Director::dataList(1,null,1)['data'];
        $data['mainPhoto'] = Page::dataList(1,[12])['data'];
        return view('Home.Views.founders')->with('data',(object) $data);
    }

    public function directors(){   
        $data['data'] = Director::dataList(1,null,2)['data'];
        $data['mainPhoto'] = Page::dataList(1,[11])['data'];
        return view('Home.Views.directors')->with('data',(object) $data);
    }

    public function regulations(){   
        $data['data'] = Regulation::dataList(1)['data'];
        $data['mainPhoto'] = Page::dataList(1,[14])['data'];
        return view('Home.Views.regulations')->with('data',(object) $data);
    }

    public function postContactUs() {
        $input = \Request::all();

        $validate = $this->validateObject($input);
        if($validate->fails()){
            \Session::flash('error', $validate->messages()->first());
            return redirect()->back()->withInput();
        }
        $ip_address = \Request::ip();

        $faqObj = ContactUs::NotDeleted()->where('ip_address',$ip_address)->where('reply',null)->whereDate('created_at',date('Y-m-d'))->first();
        if($faqObj != null){
            \Session::flash('error', 'لقد تم ارسال الرسالة مسبقا');
            return redirect()->back()->withInput();
        }

        $menuObj = new ContactUs;
        $menuObj->name = $input['name'];
        $menuObj->email = $input['email'];
        $menuObj->phone = $input['phone'];
        $menuObj->address = $input['address'];
        $menuObj->message = $input['message'];
        $menuObj->ip_address = $ip_address;
        $menuObj->reply = null;
        $menuObj->status = 1;
        $menuObj->created_at = DATE_TIME;
        $menuObj->save();

        WebActions::newType(2,'ContactUs',1);
        \Session::flash('success', 'تنبيه! تم الارسال بنجاح');
        return redirect()->back();
    }

    public function registeration(){
        $data['memberships'] = Membership::dataList(1)['data'];
        $data['fields'] = Field::dataList(1)['data'];
        $data['cities'] = City::dataList(1)['data'];
        $data['mainPhoto'] = Page::dataList(1,[15])['data'];
        return view('Home.Views.registeration')->with('data',(object) $data);
    }

    public function postOrder() {
        $input = \Request::all();
        // $input['membership_id'] = 1;
        // $coupon = $input['coupon'];
        // $availableCoupons = Coupon::availableCoupons();
        // $availableCoupons = reset($availableCoupons);
        // // dd($availableCoupons);
        
        // if(!empty($coupon)){
        //     if(count($availableCoupons) > 0 && !in_array($coupon, $availableCoupons)){
        //         \Session::flash('error', 'هذا الكود ('.$coupon.') غير متاح حاليا');
        //         return redirect()->back()->withInput();
        //     }
        // }

        $validate = $this->validateOrder($input);
        if($validate->fails()){
            Session::flash('error', $validate->messages()->first());
            return redirect()->back()->withInput();
        }

        $namesArr = explode(' ', $input['name']);
        if(count($namesArr) < 2){
            Session::flash('error','يجب ادخال الاسم عربي ثنائي');
            return redirect()->back()->withInput();
        }

        $namesEn = explode(' ', $input['name_en']);
        if(count($namesEn) < 2){
            Session::flash('error','يجب ادخال الاسم انجليزي ثنائي');
            return redirect()->back()->withInput();
        }

        $fieldObj = Field::getOne($input['field_id']);
        if(!$fieldObj){
            Session::flash('error', 'هذا المجال الفني غير موجود');
            return redirect()->back()->withInput();
        }

        $cityObj = City::getOne($input['city_id']);
        if(!$cityObj){
            Session::flash('error', 'هذه المدينة غير موجودة');
            return redirect()->back()->withInput();
        }

        $membershipObj = Membership::getOne($input['membership_id']);
        if(!$membershipObj){
            Session::flash('error', 'هذه العضوية غير موجودة');
            return redirect()->back()->withInput();
        }
        

        $menuObj = new Order;
        $menuObj->order_no = Order::newOrderNo();
        $menuObj->name = $input['name'];
        $menuObj->name_en = $input['name_en'];
        $menuObj->phone = $input['phone'];
        $menuObj->email = $input['email'];
        $menuObj->card_name = null;
        $menuObj->brief = $input['brief'];
        $menuObj->gender = $input['gender'];
        $menuObj->field_id = $input['field_id'];
        $menuObj->city_id = $input['city_id'];
        $menuObj->membership_id = $input['membership_id'];
        $menuObj->coupon = (isset($coupon) && !empty($coupon)) ? $coupon : null;
        $menuObj->sort = Order::newSortIndex();
        $menuObj->status = 1;
        $menuObj->created_at = DATE_TIME;
        $menuObj->save();

        $detailsObj = new OrderDetails;
        $detailsObj->order_id = $menuObj->id;
        $detailsObj->facebook = $input['facebook'];
        $detailsObj->twitter = $input['twitter'];
        $detailsObj->snapchat = $input['snapchat'];
        $detailsObj->youtube = $input['youtube'];
        $detailsObj->instagram = $input['instagram'];
        $detailsObj->save();

        WebActions::newType(2,'Order',1);
        Session::put('order_no',$menuObj->order_no);
        Session::flash('success', 'تنبيه! تم ارسال الطلب بنجاح وستصلك رسالة لاستكمال بياناتك!');
        return redirect()->to('/done');
    }

    public function done(){
        $dataObj['order_no'] = Session::get('order_no');
        return view('Home.Views.done')->with('data',(object) $dataObj);
    }



    public function complete($id){
        $key = base64_decode($id);
        $id = str_replace('order-', '', $key);
        $id = (int) $id;
        $orderObj = Order::getOne($id);
        if($orderObj == null){
            Session::flash('error', 'هذا الطلب غير موجود');
            return redirect()->to('/');
        }

        if($orderObj->status == 1){
            Session::flash('error', 'هذا الطلب قيد الملاحظة');
            return redirect()->to('/');
        }
        $data['order'] = $orderObj; 
        $data['data'] = OrderDetails::getData($orderObj->Details);
        return view('Home.Views.complete')->with('data',(object) $data);
    }

    public function postComplete($id,Request $request){
        $key = base64_decode($id);
        $id = str_replace('order-', '', $key);
        $id = (int) $id;
        $orderObj = Order::getOne($id);
        if($orderObj == null){
            Session::flash('error', 'هذا الطلب غير موجود');
            return redirect()->to('/');
        }

        if($orderObj->status == 1){
            Session::flash('error', 'هذا الطلب قيد الملاحظة');
            return redirect()->to('/');
        }
        $orderDetailsObj = OrderDetails::NotDeleted()->where('order_id',$id)->first();
        $input = \Request::all();
        if(!isset($input['image']) && $orderDetailsObj->image != null){
            $input['image'] = $orderDetailsObj->image;
        }

        if(!isset($input['identity_image']) && $orderDetailsObj->identity_image != null){
            $input['identity_image'] = $orderDetailsObj->identity_image;
        }

        $validate = $this->validateOrderStep2($input);
        if($validate->fails()){
            Session::flash('error', $validate->messages()->first());
            return redirect()->back()->withInput();
        }
        

        $orderDetailsObj->identity_no = $input['identity_no'];
        $orderDetailsObj->identity_end_date = date('Y-m-d H:i:s',strtotime($input['identity_end_date']));
        $orderDetailsObj->save();
        if ($request->hasFile('image')) {
            $files = $request->file('image');
            $fileName = \ImagesHelper::UploadImage('orders', $files, $id);
            if($fileName == false){
                return false;
            }
            $orderDetailsObj->image = $fileName;
            $orderDetailsObj->save();
        }

        if ($request->hasFile('identity_image')) {
            $files = $request->file('identity_image');
            $fileName = \ImagesHelper::UploadImage('orders', $files, $id);
            if($fileName == false){
                return false;
            }
            $orderDetailsObj->identity_image = $fileName;
            $orderDetailsObj->save();
        }
        $orderObj->status = 4;
        $orderObj->save();
        return redirect()->to('/payment/'.base64_encode('order-'.$id));
    }

    public function payment($id){
        $key = base64_decode($id);
        $id = str_replace('order-', '', $key);
        $id = (int) $id;
        Session::put('newOrderId',$id);
        Session::forget('errorMSG');
        $orderObj = Order::getOne($id);
        if($orderObj == null){
            Session::flash('error', 'هذا الطلب غير موجود');
            return redirect()->to('/');
        }

        if($orderObj->status != 4){
            Session::flash('error', 'هذا الطلب قيد الملاحظة');
            return redirect()->to('/');
        }
        $data = $orderObj;
        return view('Home.Views.payment')->with('data',(object) $data);
    }

    public function paymentGateway($type){
        if(!Session::has('newOrderId') || Session::get('newOrderId') == 0 || !in_array($type, ['VISA','MASTER','MADA'])){
            return redirect('404');
        }
        $id = Session::get('newOrderId');
        $orderObj = Order::getOne($id);
        if($orderObj == null){
            Session::flash('error', 'هذا الطلب غير موجود');
            return redirect()->to('/');
        }

        if($orderObj->status != 4){
            Session::flash('error', 'هذا الطلب قيد الملاحظة');
            return redirect()->to('/');
        }
        if($type == 'MADA'){
            $brands = 'MADA';
        }else{
            $brands = 'VISA MASTER';
        }

        Session::put('paymentType',$type);

        $data['price'] = $orderObj->Membership->price.'.00';
        $data['id'] = $orderObj->id;
        $data['email'] = $orderObj->email;
        $responseObj = \PaymentHelper::getPaymentInfo($data,$type);
        $dataObj['response'] = $responseObj;
        $dataObj['redirectURL'] = \URL::to('/checkPayment');
        $dataObj['formBrands'] = $brands;
        return view('Home.Views.paymentGateway')->with('data',(object) $dataObj);
    }


    public function checkPayment(Request $request){
        $data = \Request::all();
        $responseObj = \PaymentHelper::checkPaymentStatus($data['id'],Session::get('paymentType'));

        if(strpos($responseObj->result->description,'Transaction succeeded') !== false || strpos($responseObj->result->description,'successfully') !== false || (isset($responseObj->resultDetails) && strpos($responseObj->resultDetails->ExtendedDescription,'Transaction Approved.') !== false || strpos(@$responseObj->resultDetails->{'response.acquirerMessage'},'Approved') !== false)){
           
            $id = Session::get('newOrderId');
            $orderObj = Order::getOne($id);
            $orderObj->status = 5;
            $orderObj->save();
           
            Session::forget('paymentType');
            return redirect('/paymentSuccess');
        }
        Session::put('errorMSG',@$responseObj->resultDetails->{'response.acquirerMessage'});
        Session::flash('error',@$responseObj->resultDetails->{'response.acquirerMessage'});
        return redirect('/paymentFailed');
    }

    public function paymentFailed(){
        $dataObj['id'] = base64_encode('order-'.Session::get('newOrderId'));
        return view('Home.Views.paymentFailed')->with('data',(object) $dataObj);
    }

    public function paymentSuccess(){
        if(!Session::has('newOrderId') || Session::get('newOrderId') == 0){
            return redirect('404');
        }
        $id = Session::get('newOrderId');
        $orderObj = Order::getOne($id);
        if($orderObj == null){
            Session::flash('error', 'هذا الطلب غير موجود');
            return redirect()->to('/');
        }

        if($orderObj->status != 5){
            Session::flash('error', 'هذا الطلب قيد الملاحظة');
            return redirect()->to('/');
        }

        $orderObj = Order::getOne($id);
        $orderObj->status = 5;
        $orderObj->save();

        $start_date = now()->format('Y-m-d');
        $end_date = date("Y-m-d", strtotime(now()->format('Y-m-d'). " + 1 year"));
        $menuObj = UserCard::NotDeleted()->where('order_id',$id)->first();
        if(!$menuObj){
            $menuObj = new UserCard;
            $menuObj->code = UserCard::getNewCode();
        }
        $menuObj->order_id = $orderObj->id;
        $menuObj->membership_id = $orderObj->membership_id;
        $menuObj->deliver_no = null;
        $menuObj->start_date = $start_date;
        $menuObj->end_date = $end_date;
        $menuObj->status = 2;
        $menuObj->sort = UserCard::newSortIndex();
        $menuObj->created_at = DATE_TIME;
        $menuObj->created_by = 1;
        $menuObj->save();
        
        $dataObj['id'] = base64_encode('order-'.Session::get('newOrderId'));
        $dataObj['price'] = $orderObj->Membership->price.'.00';
        $dataObj['membership'] = $menuObj;
        $dataObj['image'] = OrderDetails::getData(OrderDetails::where('order_id',$orderObj->id)->first())->image;
        Session::forget('newOrderId');
        return view('Home.Views.paymentSuccess')->with('data',(object) $dataObj);
    }

    public function printCard($id) {
        $key = base64_decode($id);
        $id = str_replace('order-', '', $key);
        $id = (int) $id;
        $menuObj = UserCard::where('order_id',$id)->first();
        if(!$menuObj){
            return redirect(404);
        }
        $data['data'] = UserCard::getData($menuObj);
        $data['data']->order = Order::getData($menuObj->Order);

        $pdf = PDF::loadView('Home.Views.print', $data)
                ->setPaper('a4', 'landscape')
                ->setOption('margin-bottom', '0mm')
                ->setOption('margin-top', '0mm')
                ->setOption('margin-right', '0mm')
                ->setOption('margin-left', '0mm');

        return $pdf->download('MemberShip.pdf');
    }

    public function memberships(){   
        $data = Membership::dataList(1);
        $data['features'] = Feature::dataList(1)['data'];
        return view('Home.Views.memberships')->with('data',(object) $data);
    }
}
