<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;
use Session;

class CustomersController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(){
		$data = array(
			'js'=>array(
				'assets/js/jquery.dataTables.js',
				'assets/js/dataTables.bootstrap4.js',
				'assets/js/custom/customerDatatable.js'
			),
		);
		return view('customers.list')->with('additionalResources', $data);
	}

	public function ajaxRequest(Request $request){

		if(request()->ajax()){
            // $page='';
			$draw = $request->input('draw');
			$orderColumnNumber = $request->input('order')[0]['column'];
			$orderType = $request->input('order')[0]['dir'];
			$start = $request->input('start');
			$length = $request->input('length');
			$orderColumnName = $request->input('columns')[$orderColumnNumber]['data'];

			$searchTerm = $request->input('search')['value']; 
			if($searchTerm == ''){
				$customers = Customers::where('is_deleted',0)->orderBy($orderColumnName,$orderType)->get();
			}
			else{
				$customers = Customers::where('is_deleted',0)->where(function($q) use ($searchTerm){
					$q->where('name', 'like', '%'.$searchTerm.'%')
					->orWhere('email', 'like', '%'.$searchTerm.'%')
					->orWhere('address', 'like', '%'.$searchTerm.'%');
				})
				->orderBy($orderColumnName,$orderType)->get();
			}

			$totalRecords = count($customers);
			$recordsFiltered = count($customers);

			$data =array();
			foreach ($customers as $customer) {
				$customer['actions']= "<button class='btn edit cust-edit-btn' data-cid='".$customer['id']."'><i class='fa fa-edit'></i></button> 
				<button class='btn delete cust-delete-btn' data-cid='".$customer['id']."'><i class='fa fa-trash'></i></button>";
				$data[] = $customer;

			}

			$response=array(
				"draw"=>intval($draw),
				"recordsTotal" => $totalRecords,
				"recordsFiltered" => $recordsFiltered,
				"data"=>$data
			);
			return json_encode($response);
		}
		else{
			return response()->json(['code' =>'0','msg'=>'Call not made by ajax']);
		}
	}

	public function create(Request $request){
		$data = array(
			'js'=>array(
				'assets/js/jquery.dataTables.js',
				'assets/js/dataTables.bootstrap4.js',
				'assets/js/custom/customerDatatable.js'
			),
		);
		return view('customers.create')->with('additionalResources', $data);
	}

	public function store(){
		$validatedAttributes = $this->validateCustomer();
		$validatedAttributes = array_merge($validatedAttributes, 
			array("gender"=>request('gender'),"hobbies"=>is_array(request('hobbies'))? implode(',',request('hobbies')):null));
		try {
			Customers::create($validatedAttributes);
			Session::flash('success', 'Record added successfully.');
		} catch (Exception $e) {
			Session::flash('error', 'Something went wrong. Please try again');
		}
		return redirect('customer');
	}

	public function edit(Customers $customer){
		$data = array(
			'js'=>array(
				'assets/js/jquery.dataTables.js',
				'assets/js/dataTables.bootstrap4.js',
				'assets/js/custom/customerDatatable.js'
			),
			'cutomerDetail' =>$customer,
		);
		return view('customers.edit')->with('additionalResources', $data);
	}

	public function update(Customers $customer){

		$validatedAttributes =  $this->validateCustomer();
		$validatedAttributes = array_merge($validatedAttributes, 
			array("gender"=>request('gender'),"hobbies"=>is_array(request('hobbies'))? implode(',',request('hobbies')):null));
		try {
			$customer->update($validatedAttributes);
			Session::flash('success', 'Record updated successfully.');
		} catch (Exception $e) {
			Session::flash('error', 'Something went wrong. Please try again');
		}
		return redirect('customer');
	}

	public function destroy(Customers $customer){
		try {
			$customer->delete();
			return response()->json(['code' =>'1','msg'=>'Deleted successfully']);
		} catch (Exception $e) {
			return response()->json(['code' =>'0','msg'=>'Something went wrong.. Please try again.']);
		}
	}

	public function validateCustomer(){
		return  request()->validate([
			'name'=>'required',
			'email' => 'required',
			'address' => 'required',
		]);
	}

}
