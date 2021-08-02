<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model{

    use \TraitsFunc;

    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function Field(){
        return $this->hasOne('App\Models\Field','id','field_id');
    }

    public function City(){
        return $this->hasOne('App\Models\City','id','city_id');
    }

    public function Details(){
        return $this->hasOne('App\Models\OrderDetails','order_id','id');
    }

    public function Membership(){
        return $this->hasOne('App\Models\Membership','id','membership_id');
    }

    static function getOne($id) {
        return self::NotDeleted()
            ->find($id);
    }

    static function dataList($status=null) {        
        $input = \Request::all();
        $source = self::NotDeleted()->where(function ($query) use ($input) {
                if (isset($input['name']) && !empty($input['name'])) {
                    $query->where('name', 'LIKE', '%' . $input['name'] . '%');
                }
                if (isset($input['id']) && !empty($input['id'])) {
                    $query->where('id', $input['id']);
                }
                if (isset($input['status']) && !empty($input['status'])) {
                    $query->where('status', $input['status']);
                }
                if (isset($input['created_at']) && !empty($input['created_at'])) {
                    $query->where('created_at','>=', $input['created_at'].' 00:00:00')->where('created_at','<=',$input['created_at']. ' 23:59:59');
                }
            });
        if($status != null){
            $source->where('status',$status);
        }
        $source->orderBy('id','DESC');
        return self::getObj($source);
    }

    static function getObj($source) {
        $sourceArr = $source->get();

        $list = [];
        foreach ($sourceArr as $key => $value) {
            $list[$key] = new \stdClass();
            $list[$key] = self::getData($value);
        }

        $data['data'] = $list;
        return $data;
    }

    static function getOneByPhone($phone)
    {
        $dataObj = self::NotDeleted()
            ->where('phone', $phone)->first();
        return $dataObj;
    }

    static function getOneByEmail($email)
    {
        $dataObj = self::NotDeleted()
            ->where('email', $email)->first();
        return $dataObj;
    }

    static function getData($source) {
        $dataObj = new \stdClass();
        $dataObj->id = $source->id;
        $dataObj->order_no = $source->order_no;
        $dataObj->name = $source->name;
        $dataObj->name_en = $source->name_en;
        $dataObj->coupon = $source->coupon;
        $dataObj->brief = $source->brief;
        $dataObj->gender = $source->gender;
        $dataObj->phone = $source->phone;
        $dataObj->email = $source->email;
        $dataObj->card_name = $source->card_name;
        $dataObj->field_id = $source->field_id;
        $dataObj->fieldObj = Field::getOne($source->field_id);
        $dataObj->fieldText = $dataObj->fieldObj->title;
        $dataObj->fieldTextEn = $dataObj->fieldObj->title_en;
        $dataObj->city_id = $source->city_id;
        $dataObj->cityObj = City::getOne($source->City);
        $dataObj->membership_id = $source->membership_id;
        $dataObj->membershipObj = Membership::getOne($source->Membership);
        $dataObj->status = $source->status;
        $dataObj->statusText = self::getStatus($source->status);
        $dataObj->sort = $source->sort;
        $dataObj->created_at = \Helper::formatDate($source->created_at,'Y-m-d H:i:s');

        return $dataObj;
    }

    static function getStatus($status){
        $text = '';
        if($status == 1){
            $text = 'طلب جديد';
        }elseif($status == 2){
            $text = 'تم الموافقة';
        }elseif($status == 3){
            $text = 'تم الرفض';
        }elseif($status == 4){
            $text = 'جاري الدفع';
        }elseif($status == 5){
            $text = 'تم الدفع';
        }elseif($status == 6){
            $text = 'تم انشاء العضوية';
        }
        return $text;
    }

    static function newSortIndex(){
        return self::count() + 1;
    }

    static function newOrderNo(){
        $code = rand(1000,10000);
        $dataObj = self::where('order_no',$code)->first();
        if (!$dataObj) {        
            return $code;
        }
    }

}
