<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Osiset\BasicShopifyAPI\BasicShopifyAPI;

class HelperController extends Controller
{

   private $shop;

   public function getShop($domain){
       return User::where('name',$domain)->first();
   }


   public function place_order(Request $request){
       $cart = \GuzzleHttp\json_decode($request->input('cart_decoded'));
       $shop = $this->getShop('eyewear-boutique-ltd.myshopify.com');
       $data = [
           'draft_order' => [
               'line_items' => [

               ],
           ]
       ];
      $items = $cart->items;
      foreach ($items as $item){
          $properties = [];
          $secondary_name = "";
          $secondary_price = 0;
          foreach ($item->properties as $index => $value){
              array_push($properties,[
                      'name' => $index,
                      "value" =>$value
              ]);
              if($index == 'lens-option'){
                  if($value != null){
                      $secondary_name = $value;
                  }
              }
              if($index == 'lens_price'){
                  if($value != null){
                      $secondary_price = $secondary_price + (double)$value;
                  }
              }
              if($index == 'coating'){
                  if($value != null){
                      $secondary_name = $secondary_name.' / '.$value;
                  }
              }
              if($index == 'coating_price'){
                  if($value != null){
                      $secondary_price = $secondary_price + (double)$value;
                  }
              }
          }
          array_push($data['draft_order']['line_items'],[
             'variant_id' =>  $item->variant_id,
              'quantity' =>$item->quantity,
              'properties' => $properties
          ]);
          if($secondary_name != null && $secondary_price > 0){
              array_push($data['draft_order']['line_items'],[
                  "custom" => 'true',
                  "title" => $item->product_title.' - '.$secondary_name,
                  "price" => $secondary_price,
                  "quantity" => 1,
                  "taxable" => false,
                  "requires_shipping" => false
              ]);
          }
      }
       $draft =  $shop->api()->rest('POST', '/admin/api/2019-04/draft_orders.json',$data);
      if(!$draft['errors']){
          return response()->json([
              'url' =>$draft['body']['draft_order']['invoice_url'],
          ]);
      }
   }

}
