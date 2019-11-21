<?php

namespace App\Http\Controllers\junyidasu;

use Illuminate\Http\Request;
use App\Shop;
use App\Http\Controllers\Controller;

class ApiShopController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $shops = Shop::orderBy('created_at')->get();
        return response()->json($shops);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $prefs = [];
      
        return view('shops.create', compact('prefs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Shop $shop)
    {
        //
        $shop->name = $request->input('name');
        $shop->introduction = $request->input('title');
        $shop->comment = $request->input('comment');
        $shop->city = $request->ip();

        $shop->save();
        
        $ret = array();
        $ret['ret']=200;
        return response()->json($ret);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $shop = Shop::findOrFail($id);
        return view('shops.show', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $prefs = [];
        $shop = Shop::findOrFail($id);
        return view('shops.edit', compact('shop', 'prefs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $id = $request->input('id');
        $shop = Shop::findOrFail($id);
        $shop->pref_id = 1;
        
        $shop->save();

        $ret = array();
        $ret['ret']=200;
        return response()->json($ret);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $shop = Shop::findOrFail($id);
        $shop->delete();
        return redirect()->route('shops.index');
    }

    public function iostest()
    {
        
        
        return view('iostest');
    }

    public function junyidasu(Request $request)
    {
        $option3 = [3=>3,4=>4,5=>5];
        $option15 = [0=>0,1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10,11=>11,12=>12,13=>13,14=>14,15=>15];

        $ckall = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];

        //
        $id = $request->input('id','1');
        $next = $request->input('next','1');
        $flush = $request->input('flush','0');
        $curhole = $request->input('curhole',0);
        $checknow = $request->input('checknow',0);

        if($checknow){
            $next = 8;
        }

        //dd($request->except('_token'));
        $sid = "s" . $id;

        //session([$sid => $request->except('_token')]);

        foreach ($request->except('_token') as $key => $value){
            //echo " /{$key} ==> {$value}/ ";
            session([$key => $value]);
        }

        if($flush){
            session()->flush();
            $next = 1;
        }

        
        

        if($next == 7){
            
            if($request->input('backbtn') == 'back'){
                if($curhole > 1){
                    $curhole = $curhole - 1;
                }else{
                    $next = 6;
                    $curhole = 0;
                }
            }else{
                $curhole = $curhole + 1;
            }
        }
        if($curhole <= 0) $curhole = 1;
        echo "<!-- session";
        //var_dump(session()->all());
        echo "-->";

        //var_dump($request->input('nextbtn'));
        
        if($request->input('nextbtn') == 'next'){
            
        }
        if($request->input('backbtn') == 'back'){
            if($id != '7'){
                $next = $id - 1;
            } 
            if($next < 1) $next = 1;
            
        }
        echo "<!-- id";
        var_dump($id);
        echo "-->";

        if($curhole > 18 && $request->input('nextbtn') == 'next'){
         
            $next = 8;
        }

        //---------------------------------------------

        $rsum = session('name_4')? 0: 9999;
        $rsum1 = session('name1_4')? 0: 9999;
        $rsum2 = session('name2_5')? 0: 9999;
        $rsum3 = session('name3_5')? 0: 9999;

        $arr_par = [session('par1_2'),session('par2_2'),session('par3_2'),session('par4_2'),session('par5_2'),session('par6_2'),session('par7_2'),session('par8_2'),session('par9_2'),
                    session('par10_3'),session('par11_3'),session('par12_3'),session('par13_3'),session('par14_3'),session('par15_3'),session('par16_3'),session('par17_3'),session('par18_3')];

        $handi = session('handi_4')? session('handi_4'): 0;
        $handi1 = session('handi1_4')? session('handi1_4'): 0;
        $handi2 = session('handi2_5')? session('handi2_5'): 0;
        $handi3 = session('handi3_5')? session('handi3_5'): 0;

        $arr_starndard_par = [];
        $arr_starndard_par1 = [];
        $arr_starndard_par2 = [];
        $arr_starndard_par3 = [];

        for($i=0;$i < 18;$i++){
            $arr_starndard_par[] = $arr_par[$i];
            $arr_starndard_par1[] = $arr_par[$i];
            $arr_starndard_par2[] = $arr_par[$i];
            $arr_starndard_par3[] = $arr_par[$i];
        }

        for($i=0;$i < $handi;$i++){
            $idx = $i % 18;
            $arr_starndard_par[$idx] += 1;
        }  
        
        for($i=0;$i < $handi1;$i++){
            $idx = $i % 18;
            $arr_starndard_par1[$idx]  += 1;
        }  

        for($i=0;$i < $handi2;$i++){
            $idx = $i % 18;
            $arr_starndard_par2[$idx]  += 1;
        }   

        for($i=0;$i < $handi3;$i++){
            $idx = $i % 18;
            $arr_starndard_par3[$idx]  += 1;
        }  

        echo "<!--- arr starnd;";
        var_dump($arr_starndard_par);
        var_dump($arr_starndard_par1);
        var_dump($arr_starndard_par2);
        var_dump($arr_starndard_par3);
        echo "-->";


        $cnt = 0;
        $cnt1 = 0;
        $cnt2 = 0;
        $cnt3 = 0;
        $arr=[0=>0,0=>0,0=>0,0=>0];
        $sort=[0,0,0,0];

        for($i=1;$i <= 18;$i++){
            if(session('result_' . $i) > 0){
                $rsum += (session('result_' . $i) - $arr_starndard_par[$i-1]);
                $cnt++;
            }
            if(session('result1_' . $i) > 0){
                $rsum1 += (session('result1_' . $i) - $arr_starndard_par1[$i-1]);
                $cnt1++;
            }
            if(session('result2_' . $i) > 0){
                $rsum2 += (session('result2_' . $i) - $arr_starndard_par2[$i-1]);
                $cnt2++;
            }
            if(session('result3_' . $i) > 0){
                $rsum3 += (session('result3_' . $i) - $arr_starndard_par3[$i-1]);
                $cnt3++;
            }
        }
        $cnt = $cnt?$cnt:1;
        $cnt1 = $cnt1?$cnt1:1;
        $cnt2 = $cnt2?$cnt2:1;
        $cnt3 = $cnt3?$cnt3:1;

        $name = session('name_4')? session('name_4'): 'AAABBB1';
        $name1 = session('name1_4')? session('name1_4'): 'AAABBB2';
        $name2 = session('name2_5')? session('name2_5'): 'AAABBB3';
        $name3 = session('name3_5')? session('name3_5'): 'AAABBB4';

        $arr = [$name => [$rsum,$handi],$name1 => [$rsum1,$handi1],$name2 => [$rsum2,$handi2],$name3 => [$rsum3,$handi3]];
        $sort = [$rsum,$rsum1,$rsum2,$rsum3];
        $handis = [$handi,$handi1,$handi2,$handi3];

  
        if(count($arr) == count($sort)){
            array_multisort($sort,SORT_ASC,$arr);
        }else{

            echo "エラーが発生しました。";
            echo "<!-- err ";
            var_dump($arr);
            var_dump($sort);

            echo "-->";
        }
        

        $i = 1;
        foreach($arr as $key=>$value){
            if(\Str::startsWith($key,'AAABBB')){
                session(["rname_{$i}" => '']);
                session(["rsum_{$i}" => '']);
                session(["rhandi_{$i}" =>'']);
            }else{
                session(["rname_{$i}" => $key]);
                session(["rsum_{$i}" => $value[0]]);
                session(["rhandi_{$i}" => $value[1]]);
            }
            
            $i++;
        }
        //----------------------------------------------------
        for($i=1;$i<=18;$i++){
            if(session("result_{$i}") || session("result1_{$i}") || session("result2_{$i}") || session("result3_{$i}")){
                $ckall[$i] = 1;
            }
        }
        //--------------------------------------------------------------


        return view('junyidasu.junyidasu' . $next,compact('curhole','option3','option15','ckall'));
    }

    



}
