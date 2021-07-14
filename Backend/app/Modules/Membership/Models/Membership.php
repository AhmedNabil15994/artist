<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model{

    use \TraitsFunc;

    protected $table = 'memberships';
    protected $primaryKey = 'id';
    public $timestamps = false;

    static function getOne($id){
        return self::NotDeleted()
            ->where('id', $id)
            ->first();
    }

    static function dataList($status=null,$ids=null) {
        $input = \Request::all();

        $source = self::NotDeleted();

        if (isset($input['title']) && !empty($input['title'])) {
            $source->where('title', 'LIKE', '%' . $input['title'] . '%');
        } 
        if (isset($input['id']) && !empty($input['id'])) {
            $source->where('id',  $input['id']);
        } 
        if(isset($input['price']) && !empty($input['price'])){
            if (strpos($input['price'], '||') !== false) {
                $arr = explode('||', $input['price']);
                $min = (int) $arr[0];
                $max = (int) $arr[1];
                $source->where('price','>=',$min)->where('price','<=',$max);
            }else{
                $source->where('price',$input['price']);
            }
        }
        if(isset($input['year_price']) && !empty($input['year_price'])){
            if (strpos($input['year_price'], '||') !== false) {
                $arr = explode('||', $input['year_price']);
                $min = (int) $arr[0];
                $max = (int) $arr[1];
                $source->where('year_price','>=',$min)->where('year_price','<=',$max);
            }else{
                $source->where('year_price',$input['year_price']);
            }
        }
        if($status != null){
            $source->where('status',$status);
        }
        if($ids != null){
            $source->whereIn('id',$ids);
        }    

        $source->orderBy('sort','ASC');

        return self::generateObj($source);
    }

    static function generateObj($source){
        $sourceArr = $source->get();

        $list = [];
        foreach($sourceArr as $key => $value) {
            $list[$key] = new \stdClass();
            $list[$key] = self::getData($value);
        }

        // $data['pagination'] = \Helper::GeneratePagination($sourceArr);
        $data['data'] = $list;

        return $data;
    }

    static function getData($source) {
        $idForSearch = 's:'.strlen($source->id).':"'.$source->id.'";';

        $features = Feature::NotDeleted()->where('status',1)->where('memberships','LIKE','%'.$idForSearch.'%');
        $conditions = Condition::NotDeleted()->where('status',1)->where('memberships','LIKE','%'.$idForSearch.'%');

        $data = new  \stdClass();
        $data->id = $source->id;
        $data->title = $source->title;
        $data->price = $source->price;
        $data->discount_price = $source->discount_price ? $source->discount_price : '';
        $data->features = $features->pluck('id');
        $data->features = reset($data->features);
        $data->conditions = $conditions->pluck('id');
        $data->conditions = reset($data->conditions);
        $data->featruesText = $features->pluck('title');
        $data->featruesText = reset($data->featruesText);
        $data->conditionsText = $conditions->pluck('title');
        $data->conditionsText = reset($data->conditionsText);
        $data->sort = $source->sort;
        $data->status = $source->status;
        $data->statusText = $source->status == 0 ? 'مسودة' : 'مفعلة';
        $data->created_at = \Helper::formatDateForDisplay($source->created_at,true);
        return $data;
    }
    
    static function newSortIndex(){
        return self::count() + 1;
    }

}
