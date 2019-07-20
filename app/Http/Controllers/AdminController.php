<?php

namespace App\Http\Controllers;

use App\Incomeitem;
use App\Shop;
use App\Shopitem;
use App\Vouncher;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function getWelcome()
    {
        return view('welcome');
    }

    public function getDailySale()
    {
        $voc=Vouncher::whereDate('created_at', Carbon::today())->orderBy('id','desc')->get();
        $shop=Shop::get();
        return view('report.home')->with(['voc'=>$voc,'shops'=>$shop]);
    }
    public function getDailySaleOne($shop_id)
    {
        $total=0;
        $buyAmount=0;
        $shop=Shop::where('id',$shop_id)->first();
        $voc=Vouncher::whereDate('created_at', Carbon::today())->where('shop_id',$shop_id)->orderBy('id','desc')->get();
        foreach ($voc as $v)
        {
            $total+=$v->amount;
            $buyAmount+=$v->buy_amount;
        }
        $profit=$total-$buyAmount;
        return view('report.dailySaleOne')->with(['voc'=>$voc,'shop'=>$shop,'total'=>$total,'profit'=>$profit]);
    }
    public function getDailySaleAll()
    {
        $total=0;
        $buyAmount=0;
        $voc=Vouncher::whereDate('created_at', Carbon::today())->orderBy('id','desc')->get();
        foreach ($voc as $v)
        {
            $total+=$v->amount;
            $buyAmount+=$v->buy_amount;
        }
        $profit=$total-$buyAmount;
        return view('report.dailySale')->with(['voc'=>$voc,'total'=>$total,'profit'=>$profit]);
    }
    public function getDailyItem()
    {
        $shop=Shop::get();
        return view('report.homePP')->with(['shops'=>$shop]);
    }
    public function getDailyAllItem()
    {
        $item=Incomeitem::whereDate('created_at', Carbon::today())->get();
        return view('report.itemAll')->with(['items'=>$item]);
    }
    public function getDailyAllItemOne($shop_id)
    {
        $shop=Shop::whereId($shop_id)->first();
        $item=Incomeitem::whereDate('created_at', Carbon::today())->where('shop_id',$shop_id)->get();
        return view('report.item')->with(['items'=>$item,'shop'=>$shop]);
    }

    public function getDailyOneItem()
    {
        return "";
    }

    public function getDashboardHome()
    {
        return view('staff.home');
    }
/////////////////////////////////////////////////
    public function getAllProduct()
    {
        $item=Shopitem::get();
        return view('product.products')->with(['items'=>$item]);
    }

    public function getProductHome()
    {
        $shop=Shop::get();
       // $item=Shopitem::get();
        return view('product.home')->with(['shops'=>$shop]);
    }

    public function getOneProduct($shop_id)
    {
        $shop=Shop::where('id',$shop_id)->first();
        $item=Shopitem::where('shop_id',$shop_id)->get();
        return view('product.singleProduct')->with(['items'=>$item,'shop'=>$shop]);
    }

    ///////////////////////////////////////
    public function getAllShop()
    {
        $shop=Shop::get();
        return view('shop.shop')->with(['shops'=>$shop]);
    }
    public function postShopAdd(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'city'=>'required',
            'address'=>'required'
        ]);

        $name=$request['name'];
        $phone=$request['phone'];
        $city=$request['city'];
        $address=$request['address'];

        $shop=new Shop();
        $shop->name=$name;
        $shop->phone=$phone;
        $shop->city=$city;
        $shop->location=$address;
        $shop->save();

        return redirect()->back()->with('info',"Shop is added in ".$city.".");
    }

    public function getIncomeHome()
    {
        $shop=Shop::get();
        return view('Income.home')->with(['shops'=>$shop]);
    }
    public function getIncomeAll()
    {
        $days=null;
        $count=0;
        $voc=Vouncher::orderBy('id','desc')->get();
        $day=Vouncher::get();
        $start=$day[0]->created_at->format('Y-m-d');
        $days[$count]=$day[0]->created_at->format('Y-m-d');
        foreach ($day as $d)
        {
            if($start!=$d->created_at->format('Y-m-d'))
            {
                $count++;
                $days[$count]=$d->created_at->format('Y-m-d');
                $start=$d->created_at->format('Y-m-d');
            }
        }
        //dd($days);
        return view('Income.allIncome')->with(['voc'=>$voc,'day'=>$days]);
    }
    public function getIncomeOne($shop_id)
    {
        $days=null;
        $count=0;
        $shop=Shop::whereId($shop_id)->first();
        $voc=Vouncher::where('shop_id',$shop_id)->orderBy('id','desc')->get();
        $day=Vouncher::where('shop_id',$shop_id)->get();
        $start=$day[0]->created_at->format('Y-m-d');
        $days[$count]=$day[0]->created_at->format('Y-m-d');
        foreach ($day as $d)
        {
            if($start!=$d->created_at->format('Y-m-d'))
            {
               // $aa=['day'=>null,'status'=>null];
                $count++;
                $days[$count]=$d->created_at->format('Y-m-d');
                $start=$d->created_at->format('Y-m-d');
            }
        }
        return view('Income.income')->with(['voc'=>$voc,'day'=>$days,'shop'=>$shop]);
    }
    public function postDashboardReportAll(Request $request)
    {
        $res=null;
        $count=0;
        $sym=['item'=>null,'shop'=>null];
        if($request['day']=='all')
        {
            $item = Vouncher::get();
        }else
        {
            $item = Vouncher::whereDate('created_at',$request['day'])->get();
        }
        foreach ($item as $i)
        {
            $sym['item']=$i;
            $sym['shop']=$i->shop;
            $res[$count]=$sym;
            $count++;
        }
        return response()->json($res);
    }
    public function getAPIIncomeOne($shop_id,Request $request)
    {
        $res=null;
        $count=0;
        $sym=['item'=>null,'shop'=>null];
        if($request['day']=='all')
        {
            $item = Vouncher::where('shop_id',$shop_id)->get();
        }else
        {
            $item = Vouncher::whereDate('created_at',$request['day'])->where('shop_id',$shop_id)->get();
        }
        foreach ($item as $i)
        {
            $sym['item']=$i;
            $sym['shop']=$i->shop;
            $res[$count]=$sym;
            $count++;
        }
        return response()->json($res);
    }















    ///////////////////////////////////////////
    public function getCatImage($img_name)
    {
        $image=Storage::disk('cat_img')->get($img_name);
        return response($image,'200');
    }

    public function getItemImage($img_name)
    {
        $image=Storage::disk('images')->get($img_name);
        return response($image,'200');
    }

    public function getAPICatImage(Request $request)
    {
        $str=realpath("images.png");
        return response()->json($str);
    }
}
