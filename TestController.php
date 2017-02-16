<?php

namespace App\Http\Controllers;

//use Illuminate\Support\Facades\DB;
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

		return response()->json($arMenu, 200);

	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int                      $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}

}
