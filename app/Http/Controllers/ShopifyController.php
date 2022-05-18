<?php

namespace App\Http\Controllers;

 use Illuminate\Http\Request as PostRequest;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ShopifyController extends Controller
{
    public function index(){
        return view('shopify');
    }

    public function addPage(){
        return view('add-page');
    }


    public function savePage(PostRequest $request){
        $bodyRequest =  $request->all();

        $client = new \GuzzleHttp\Client(['verify'=>false,]);

        $request = new Request('GET','https://fxr-racing-ca-dev.myshopify.com/admin/api/2022-04/pages.json',
        ['Content-Type'=>'application/json',
        'X-Shopify-Access-Token'=>env('SHOPIFY_TOKEN')]
        );
                  
         $response = $client->send($request);

         $data = json_decode($response->getBody(),true);

       
         $bodyRequest['body_html'] = view('body_html').'<style>'.file_get_contents(public_path('shopify.css')).'</style>';

         $pageExists  = false;
         foreach($data['pages'] as $page){
            if ($page['title'] == $bodyRequest['title']){
                $pageExists = true;

                $response =  $client->request('PUT',"https://fxr-racing-ca-dev.myshopify.com/admin/api/2022-04/pages/".$page['id'].".json",
                ['headers'=> ['Content-Type'=> 'application/json',
                               'X-Shopify-Access-Token'=> env('SHOPIFY_TOKEN')],
                 'json'=> ["page"=>["id"=> $page['id'], 
                                    "title"=>$bodyRequest['title'],
                                    "body_html"=>$bodyRequest['body_html']
                                          ]
                                 ]
                ]
              );

                
                Session::flash('message', "Page already exists. So updated with provided content.");
                return Redirect::back();
                break;
            }
         }
         if(!$pageExists){
          $response =  $client->request('POST','https://fxr-racing-ca-dev.myshopify.com/admin/api/2022-04/pages.json',
                           ['headers'=> ['Content-Type'=> 'application/json',
                                          'X-Shopify-Access-Token'=> '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'],
                            'json'=> ["page"=>["title"=>$bodyRequest['title'],
                                                       "body_html"=>$bodyRequest['body_html']
                                                     ]
                                            ]
                           ]
                         );

            $data = json_decode($response->getBody(),true);

            if($response->getStatusCode() == 201){
               
                Session::flash('message', "Page has been created");
                return Redirect::back();

            }
            
         }

         
        

                  
    }

    
}
