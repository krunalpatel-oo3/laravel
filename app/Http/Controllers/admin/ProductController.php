<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin_model\Product;
use Datatables;

class ProductController extends Controller
{
	/**
	*@uses: display products list
	*/
    public function index(Request $request)
    {
    	if ($request->ajax()) {
    		$data = Product::latest()->get();
			return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   	
                           $btn = '<a href="javascript:viewProduct(0)" class="btn btn-info text-info-600 btn-rounded btn-icon btn-flat position-left" title= "View Product"><i class="icon-eye"></i></a>';
                           $btn .= '<a href="javascript:editProduct(0)" class="btn btn-success text-success-600 btn-rounded btn-icon btn-flat position-left" title= "View Product"><i class="icon-pencil"></i></a>';
                           $btn .= '<a href="javascript:deleteProduct('.$row->id.')" class="btn btn-danger text-danger-600 btn-rounded btn-icon btn-flat position-left" title= "View Product"><i class="icon-trash"></i></a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    		
    	}
    	return view('admin.product.index');
    }

    /**
	*@uses: remove product details
	*/
	public function delete(Request $request){
		if($request->id){
			$product = Product::where('id',$request->id)->delete();
			if($product){
				$msg = array('status' => true);
				return response()->json($msg);
			}else{
				$msg = array('status' => false, 'message' => 'Product is not deleted.');
				return response()->json($msg);
			}
		}else{
			$msg = array('status' => false, 'message' => 'Product is not deleted.');
			return response()->json($msg);
		}
		dd($request->id);

	}
}
