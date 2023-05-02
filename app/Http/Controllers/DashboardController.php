<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Creator;
use App\Models\Keyword;
use App\Models\Language;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request){        
        
        
        return view('/dashboard');
       
    }

    public function retrieve(Request $request){
        $json = file_get_contents('php://input');
        $data = json_decode($json);
        $q = $data->q;
        $qInTitle = $data->{'qInTitle'};
        $country = $data->{'country'};
        $category = $data->category;
        $language = $data->language;
        $domain = $data->domain;

        // create a map of keys and values for validation
        $arr = array(
            'q' => $q,
            'qInTitle' => $qInTitle,
            'country' => $country,
            'category' => $category,
            'language' => $language,
            'domain' => $domain
        );

        // fixed API key from Newsdata.io API provider. This field should come from the user if the application is scaled up
        $apiKey = "pub_19907fa17383b4f8fc3affc20b1e91390713b";
        // prepare the url for sending data
        $url = "https://newsdata.io/api/1/news?apikey=" . $apiKey;

        // loop over the map to validate each keys and values
        foreach ($arr as $key => $value) {
            if (!empty($value)) {
            $url .= "&" . $key . "=" . urlencode($value);
            }
        }

        // retrieve the response from the external API
        $response = file_get_contents($url);

        $return_data = json_encode($response);

        $posts = json_decode($response);
        foreach ($posts->results as $post) {
            // dd($post);
            $newPost = new Post();

            if (!empty($post->title)){
                $newPost->title = $post->title;
            }
    
            if (!empty($post->description)){
                $newPost->content = $post->description;
            }else{
                $newPost->content = "";
            }

            if (!empty($post->source_id)){
                $newPost->source = $post->source_id;
            }

            if (!empty($post->image_url)){
                $newPost->imageurl = $post->image_url;
            }

            if (!empty($post->link)){
                $newPost->link = $post->link;
            }

            if (!empty($post->pubDate)){
                $newPost->pubdate = $post->pubDate;
            }
            
            // set the foreign key for the user who created the post
            $newPost->user_id = auth()->user()->id;
            if(!empty($post->language)){
                $newPost->language = $post->language;  
            }
            $newPost->save();

            if (!empty($post->creator)) {
                foreach($post->creator as $creator){
                    $newCreator = new Creator();
                    $newCreator->name = $creator;
                    $newCreator->post_id = $newPost->id;
                    $newCreator->save();
                }
            }

            if (!empty($post->category)) {
                foreach($post->category as $cat){
                    $newTag = new Tag();
                    $newTag->name = $cat;
                    $newTag->post_id = $newPost->id;
                    $newTag->save();
                }
            }

            if (!empty($post->country)) {
                foreach($post->country as $country){
                    $newCountry = new Country();
                    $newCountry->name = $country;
                    $newCountry->post_id = $newPost->id;
                    $newCountry->save();
                }
            }

            if (!empty($post->keywords)) {
                foreach($post->keywords as $keyword){
                    $newKeyword = new Keyword();
                    $newKeyword->name = $keyword;
                    $newKeyword->post_id = $newPost->id;
                    $newKeyword->save();
                }
            }
        }

        return response($return_data);
    }
}
