<?php

namespace App\Http\Controllers;

use App\Buyitems;
use App\Category;
use App\Incomeitem;
use App\Item;
use App\Saleitem;
use App\Shopitem;
use App\Vouncher;
use App\Vouncheritem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function getCategory(){
        $cat=Category::get();
        return view('category.category')->with(['category'=>$cat]);
    }

    public function postCategory(Request $request)
    {
        $this->validate($request,[
            'image'=>'required',
            'name'=>'required',
            'symbol'=>'required'
        ]);

        $image=$request->file('image');
        $name=$request['name'];
        $symbol=$request['symbol'];
        $img_name=date('d-m-y-h-i-s').'.'.$image->getClientOriginalExtension();

        $cat=new Category();
        $cat->image=$img_name;
        $cat->name=$name;
        $cat->symbol=$symbol;
        $cat->save();

        Storage::disk('cat_img')->put($img_name,File::get($image));
        return redirect()->back()->with('info','Category had been saved.');
        //dd($image->getClientOriginalName()."-------".$name);
    }

    public function getCategoryEdit($id)
    {
        $category=Category::whereId($id)->first();
        return view('category.catEdit')->with(['category'=>$category]);
    }
    public function postCategoryEdit(Request $request)
    {
        $id=$request['id'];
        $image=$request->file('image');
        $name=$request['name'];
        $symbol=$request['symbol'];

        $cat=Category::whereId($id)->first();
        $cat->name=$name;
        $cat->symbol=$symbol;
        if ($image!=null)
        {
            Storage::disk('cat_img')->delete(Category::whereId($id)->first()->image);
            $img_name=date('d-m-y-h-i-s').'.'.$image->getClientOriginalExtension();
            $cat->image=$img_name;
            Storage::disk('cat_img')->put($img_name,File::get($image));
        }
        $cat->update();

        return redirect()->route('category')->with(['info',"The Item ".$cat->name." is updated"]);
    }

/////////////////For item add in admin//////////////////////////////
    public function getAddItem(){
        $cat=Category::get();
        return view('items.addItem')->with(['category'=>$cat]);
    }

    public function postAddItem(Request $request)
    {
        $this->validate($request,[
            'image'=>'required',
            'name'=>'required',
            'buy_price'=>'required',
            'sale_price'=>'required',
            'category'=>'required'
        ]);

        $image=$request->file('image');
        $name=$request['name'];
        $buy_price=$request['buy_price'];
        $sale_price=$request['sale_price'];
        $category=$request['category'];
        $img_name=date('d-m-y-h-i-s').".".$image->getClientOriginalExtension();
        $cat=Category::whereId($category)->first();
        $serial=$cat->symbol.'-'.mt_rand(00000, 99999);

        $item=new Item();
        $item->serial=$serial;
        $item->name=$name;
        $item->image=$img_name;
        $item->category_id=$category;
        $item->buy_price=$buy_price;
        $item->sale_price=$sale_price;
        $item->qty=0;
        $item->save();

        Storage::disk('images')->put($img_name,File::get($image));

        return redirect()->back()->with('info','Item has been saved.');

        //dd($category);
    }

    public function getItemsAll()
    {
        $items=Item::get();
        $category=Category::get();
        return view('items.item')->with(['items'=>$items,'category'=>$category]);
    }
    public function getItemsEdit($id){
        $item=Item::whereId($id)->first();
        $category=Category::get();
        return view('items.itemEdit')->with(['item'=>$item,'category'=>$category]);

    }
    public function postItemsAllEdit(Request $request)
    {
        $this->validate($request,[
            'id'=>'required',
            'name'=>'required',
            'category'=>'required',
            'sale_price'=>'required',
            'buy_price'=>'required'
        ]);
        $id=$request['id'];
        $name=$request['name'];
        $category=$request['category'];
        $sale_price=$request['sale_price'];
        $buy_price=$request['buy_price'];

      //  dd($category."/".$name."/".$id."/".$sale_price."/".$buy_price);
        $item=Item::whereId($id)->first();
        $item->name=$name;
        $item->category_id=$category;
        $item->sale_price=$sale_price;
        $item->buy_price=$buy_price;
        $item->update();

        return redirect()->route('items')->with('info',"Item ".$name." is updated");

    }
    public function getBarcode()
    {
        $items=Item::get();
        return view('items.barcode')->with(['items'=>$items]);
    }
    public function postBarcodePrint(Request $request)
    {
        $this->validate($request,[
            'qty'=>'required'
        ]);

        $id=$request['id'];
        $qty=$request['qty'];
        $item=Item::whereId($id)->first();
        return view('items.print')->with(['item'=>$item,'qty'=>$qty]);

    }
////////////////////For Sale//////////////////////////////////
    public function getSale()
    {
        $items=Item::get();
        return view('staff.sale')->with(['items'=>$items]);
    }
    public function postSale(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            //'qty'=>'required'
        ]);

        $symbol=$request['name'];
        $qty=1;

        $id=Item::whereSerial($symbol)->first()->id;
        $post=Item::whereId($id)->first();
        $oldCart=Session::has('sale')?Session::get('sale'):null;
        $cart=new Vouncheritem($oldCart);
        $cart->addItem($id,$post,$qty);
        Session::put('sale',$cart);

        return response()->json(['items'=>Session::get('sale')->items]);
    }
    ///////////////////////////////For manager Report////////////
    public function getDashboardReport()
    {
        $shop_id=Auth::User()->shop_id;
        $voc=Vouncher::where('shop_id',$shop_id)->orderBy('id','desc')->whereDate('created_at',Carbon::today())->get();
        return view('staff.report')->with(['voc'=>$voc]);
    }
    public function getDashboardReportAll()
    {$days=null;
    $count=0;
        $shop_id=Auth::User()->shop_id;
        $voc=Vouncher::where('shop_id',$shop_id)->orderBy('id','desc')->get();
        $day=Vouncher::where('shop_id',$shop_id)->get();
        //dd($day[0]->created_at->format('Y-m-d'));
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
        return view('manager.report')->with(['voc'=>$voc,'day'=>$days]);
    }
    public function postDashboardReportAll(Request $request)
    {
        if($request['day']=='all')
        {
            $item = Vouncher::where('shop_id',Auth::user()->shop_id)->get();
        }else
        {
            $item = Vouncher::whereDate('created_at',$request['day'])->where('shop_id',Auth::user()->shop_id)->get();
        }
        return response()->json($item);
    }
    public function getAPIReport($id)
    {
        $items=null;
        $count=0;
        $ii=['item'=>null,'category'=>null,'voc'=>null];
        $item=Saleitem::where('vouncher_id',$id)->get();
        foreach ($item as $i)
        {
            $ii['item']=$i->item;
            $ii['category']=$i->item->category;
            $ii['voc']=$i;
            $items[$count++]=$ii;
        }
        return response()->json(['items'=>$items]);
    }
    ///////////////////////////////////////////////////////////////////
    public function getShopItemsAll()
    {
        $shop_id=Auth::User()->shop_id;
        $item=Shopitem::where('shop_id',$shop_id)->get();
        return view('manager.items')->with(['items'=>$item]);
    }
///////////////////////////For Checkout///////////////////////////
    public function getCheckout()
    {
        $items=Session::get('sale')->items;
        $totalQty=Session::get('sale')->quantity;
        $total=Session::get('sale')->total;
        $buyTotal=Session::get('sale')->buyTotal;
        $shopId=Auth::user()->shop_id;
//        if() {
            //dd($totalQty.'='.$total);
            $voc = new Vouncher();
            $voc->no = mt_rand(00000, 99999);
            $voc->amount = $total;
            $voc->buy_amount = $buyTotal;
            $voc->qty = $totalQty;
            $voc->shop_id = $shopId;
            $voc->user_id = Auth::user()->id;
            $voc->save();
            foreach ($items as $item) {
                $itemAll = Item::whereId($item['item']['id'])->first();
                $itemAll->qty = $itemAll->qty - $item['qty'];
                $itemAll->update();

                $shopItem = Shopitem::where('item_id', $item['item']['id'])->where('shop_id', $shopId)->first();
                $shopItem->qty = $shopItem->qty - $item['qty'];
                $shopItem->update();

                $i = new Saleitem();
                $i->vouncher_id = $voc->id;
                $i->item_id = $item['item']['id'];
                $i->qty = $item['qty'];
                $i->amount = $item['amount'];
                $i->buy_amount = $item['buy_amount'];
                $i->save();
            }

            Session::forget('sale');
            return view('staff.caculate')->with(['total' => ($total*0.05)+$total, 'voc_no' => $voc->id]);
//        }else
//            return redirect()->back()->with(['err',"This item has not exit in this shop"]);
    }
    public function getCheckoutCancel()
    {
        Session::forget('sale');
        return redirect()->back();
    }
    public function getVouncher($voc_id)
    {
        $voc=Vouncher::whereId($voc_id)->first();
        $item=Saleitem::where('vouncher_id',$voc_id)->get();
        return view('staff.voc')->with(['items'=>$item,'voc'=>$voc]);
    }

//////////////////////For Item Add in Staff///////////////////////////////////////

    public function getAddationItem()
    {
        return view('staff.itemsAdd');
    }
    public function postAddationItem(Request $request)
    {
        $this->validate($request,[
            'id'=>'required',
            'qty'=>'required'
        ]);

        $id=$request['id'];
        $qty=$request['qty'];

        $item=Item::whereId($id)->first();
        $item->qty=$item->qty+$qty;
        $item->update();
        $income=new Incomeitem();
        $income->item_id=$id;
        $income->qty=$qty;
        $income->shop_id=Auth::user()->shop_id;
        $income->user_id=Auth::user()->id;
        $income->save();

        $shopitem=Shopitem::where('item_id',$id)->where('shop_id',Auth::user()->shop_id)->first();
        if($shopitem)
        {
            $shopitem->qty=$shopitem->qty+$qty;
            $shopitem->update();
        }else
        {
            $shopItem=new Shopitem();
            $shopItem->item_id=$id;
            $shopItem->qty=$qty;
            $shopItem->shop_id=Auth::user()->shop_id;
            $shopItem->save();
        }


         $post=Item::whereId($id)->first();
        $oldCart=Session::has('item')?Session::get('item'):null;
        $cart=new Buyitems($oldCart);
        $cart->addItem($id,$post,$qty);
        Session::put('item',$cart);

         return response()->json(['message'=>"OK"]);

    }
    //////////////////////////For Api////////////////////////
    public function getApiItem()
    {
        $serial=null;
        $count=0;
        $item=Shopitem::where('shop_id',Auth::user()->shop_id)->get();
        foreach ($item as $i)
        {
            $serial[$count]=$i->item->serial;
            $count++;
        }
        //$item=Item::get();
        return response()->json($serial);
    }
    public function getApiItemAdd()
    {
        $item=Item::get();

        return response()->json($item);
    }
    public function getTableItem()
    {
        $oldCart=Session::has('item')?Session::get('item'):null;
        if ($oldCart)
        {
            return response()->json(['items'=>Session::get('item')->items]);
        }else
            return response()->json(['items'=>null]);

    }
}
