<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Manufacturer;
use App\Product;

Route::get( '/', function () {
	$products = Product::all();
	$productsUnder200 = Product::query()->where( 'price', '<', 200)->get();
	$productsBetween = Product::query()->whereBetween( 'price', [200, 400])->get();
	$productsCents = Product::all()->map( function ($item){
		$price = number_format($item->price * 100, 0, ".", "" );
		$item->price = $price;
		return $item;
	});
	
	$productsAveragePrice = $products->avg('price');
	
	$manufacturerID = 5;
	
	$productsAveragePriceForManufacturer = Product::query()->where( 'manufacturer_id', '=', 5)
		->avg('price');
	$productsAveragePriceForManufacturer =  number_format($productsAveragePriceForManufacturer, 2 );
	
	$manufacturer = Manufacturer::find($manufacturerID);
	
	$moreThan180 = Product::query()->where( 'price', '>=', 180)->get();
//	var_dump( $moreThan180);
	$moreThan180SortedByPrice = $moreThan180->sortByDesc( 'price');
	$moreThan180SortedByName = $moreThan180->sortBy( 'name');
	
	return view( 'welcome' )
		->with(compact('products'))
		->with(compact('productsUnder200'))
		->with(compact('productsBetween'))
		->with(compact('productsCents'))
		->with(compact('productsAveragePrice'))
		->with(compact('productsAveragePriceForManufacturer'))
		->with(compact('manufacturer'))
		->with(compact('moreThan180'))
		->with(compact('moreThan180SortedByPrice'))
		->with(compact('moreThan180SortedByName'));
} );
