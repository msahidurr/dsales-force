<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Lead\CreateLead;
use DB;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		// $this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		return redirect('/dashboard');
	}

	public function dashboard() {
		$company_id = '';
		if (session()->get('user_id') == 1 && session()->get('user_type') == "super_admin") {
			$user_role_id = 1;
		} else {
			$user_role_id = session()->get('user_role_id');
		}
		$company_id = session()->get('company_id');

		$menus_array = array();
		if (isset($user_role_id)) {
			$menus = DB::select('call get_user_menu_by_role("' . $user_role_id . '","' . $company_id . '")');

			$i = 0;
			foreach ($menus as $key => $value) {

				$child_menu = DB::select('call get_child_menu_list("' . $value->menu_id . '","' . $user_role_id . '","' . $company_id . '")');
				$lower = strtolower($value->name);
				$final_key = str_replace(' ', '_', $lower);
				$menu_trans = trans("others.mxp_menu_" . "$final_key");
				if (!empty($child_menu)) {

					$menus_array[$i]['name'] = $menu_trans;
					$menus_array[$i]['route_name'] = $value->route_name;
					$menus_array[$i]['order_id'] = $value->order_id;
					$menus_array[$i]['menu_id'] = $value->menu_id;
					$j = 0;
					foreach ($child_menu as $cm) {
						$lower_sub = strtolower($cm->name);
						$final_key_sub = str_replace(' ', '_', $lower_sub);
						$menu_trans_sub = trans("others.mxp_menu_" . "$final_key_sub");
						$menus_array[$i]['subMenu'][$j]['name'] = $menu_trans_sub;
						$menus_array[$i]['subMenu'][$j]['route_name'] = $cm->route_name;
						$menus_array[$i]['subMenu'][$j]['order_id'] = $cm->order_id;
						$menus_array[$i]['subMenu'][$j]['menu_id'] = $cm->menu_id;

						$j++;
					}
				} /*else{
	                    $menus_array[$i]['name'] = $value->name;
	                    $menus_array[$i]['route_name'] = $value->route_name;
	                    $menus_array[$i]['order_id'] = $value->order_id;
	                    $menus_array[$i]['menu_id'] = $value->menu_id;
*/
				$i++;
			}

		}

		// $finalMenu[0][] = "";
		// $idStore[] = "";
		// $parentIdTmp = "";
		// if(session()->get('user_type') == "super_admin"){
		//     $menuDBList = DB::select('SELECT menu_id, name, route_name, parent_id, order_id from mxp_menu where route_name LIKE "%view" ORDER BY parent_id');

		//     $i=0;
		//     foreach ($menuDBList as $menu) {
		//         if ($parentIdTmp != $menu->parent_id) {
		//             $i=0;
		//         }
		//         $finalMenu[$menu->parent_id][$i] = $menu->name;
		//         $idStore[$menu->name] = $menu->menu_id;

		//         $parentIdTmp = $menu->parent_id;
		//         $i++;
		//     }
		// }
		// for ($i = 0; $i < count($finalMenu) ; $i++) {
		//     if(isset($finalMenu[0][$i])){
		//         echo "=>".$finalMenu[0][$i]."<br>";
		//         $tmp1 = $finalMenu[0][$i];
		//         if(isset($finalMenu[   $idStore[ $tmp1  ] ][ 0 ])){

		//             for ($j = 0; $j < count(  $finalMenu[   $idStore[ $tmp1 ]   ]  ) ; $j++) {

		//                 echo "========".$finalMenu[   $idStore[ $finalMenu[0][$i]]   ][$j]."<br>";
		//                 $tmp2 = $finalMenu[   $idStore[ $finalMenu[0][$i]]   ][$j];

		//                 if(isset($finalMenu[   $idStore[ $tmp2  ] ][ 0 ])){

		//                     for ($k = 0; $k < count($finalMenu[   $idStore[ $tmp2  ] ]); $k++) {
		//                         echo "----------------------".$finalMenu[   $idStore[ $tmp2  ] ][$k]."<br>";
		//                     }
		//                 }

		//             }
		//         }else {
		//         }
		//     }
		// }
		// die();

		// echo "<pre>";
		// print_r($menus_array);
		// die();

		session()->put('UserMenus', $menus_array);

		$totalLeadValue = CreateLead::count();
		$highly_interested = $this->highlyInterested();
		$unassigned = $this->unassigned();
		$converted = $this->converted();
		$conversion_ratio = $this->conversionRatio();
		$might_invest = $this->mightInvest();
		$interested = $this->interested();
		return view('dashboard',
			compact(
				"totalLeadValue", 'highly_interested', 'unassigned', 'converted', 'conversion_ratio', 'might_invest', 'interested'));
	}

	protected function highlyInterested() {
		$value = CreateLead::where('interest_label', 'highly_interested')->count();

		return $value;
	}
	protected function unassigned() {
		$value = CreateLead::where('interest_label', 'unassigned')->count();
		return $value;
	}
	protected function converted() {
		$value = CreateLead::where('interest_label', 'converted')->count();

		return $value;
	}
	protected function conversionRatio() {
		$value = CreateLead::where('interest_label', 'conversion_ratio')->count();

		return $value;
	}
	protected function mightInvest() {
		$value = CreateLead::where('interest_label', 'might_invest')->count();

		return $value;
	}
	protected function interested() {
		$value = CreateLead::where('interest_label', 'interested')->count();

		return $value;
	}
}
