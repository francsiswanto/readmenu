<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class TestController extends Controller {

	public function getMenu() {
		$data = DB::select(DB::raw('select id, menu_id, menu_upline, title, action, level from menu order by menu_id'));

		$arMenu = [];
		$lastUpl = [];
		$lastUpl1 = [];
		$lastUpl2 = [];
		$lastUpl3 = [];
		$lastUpl4 = [];
		$lastUpl5 = [];

		$ii = 0;
		foreach ($data as $key => $value) {
			$ii++;

			$value += ["child" => []];

			if (is_null($value["menu_upline"])) {
				//Level 1
				$arMenu[$value["menu_id"]] = $value;
				$lastUpl1 = &$arMenu[$value["menu_id"]];
			} else {
				if ($value["level"] == 2) {
					$lastUpl1["child"][$value["menu_id"]] = $value;
					$lastUpl2 = &$lastUpl1["child"][$value["menu_id"]];
				}
				if ($value["level"] == 3) {
					$lastUpl2["child"][$value["menu_id"]] = $value;
					$lastUpl3 = &$lastUpl2["child"][$value["menu_id"]];
				}
				if ($value["level"] == 4) {
					$lastUpl3["child"][$value["menu_id"]] = $value;
					$lastUpl4 = &$lastUpl3["child"][$value["menu_id"]];
				}
				if ($value["level"] == 5) {
					$lastUpl4["child"][$value["menu_id"]] = $value;
					$lastUpl5 = &$lastUpl4["child"][$value["menu_id"]];
				}

			}
		}

		return response()->json($arMenu);

	}

}
