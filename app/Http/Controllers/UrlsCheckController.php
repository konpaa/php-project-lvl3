<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DiDom\Document;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\ConnectionException;

class UrlsCheckController extends Controller
{
    public function store(int $id): object
    {
        $url = DB::table('urls')->find($id);
        abort_unless($url, 404);
        try {
            $response = Http::get($url->name);
            $document = new Document($response->body());
            $h1 = optional($document->first('h1'))->text();
            $keywords = optional($document->first('meta[name=keywords]'))->getAttribute('content');
            $description = optional($document->first('meta[name=description]'))->getAttribute('content');
            DB::table('url_checks')->insert([
                'url_id' => $id,
                'status_code' => $response->status(),
                'h1' => $h1,
                'keywords' => $keywords,
                'description' => $description,
                'created_at' => $url->created_at,
                'updated_at' => Carbon::now()
            ]);
            DB::table('urls')->where('id', $id)->update(
                ['updated_at' => Carbon::now()]
            );
            flash('Сайт проанализирован!')->warning();
            return redirect()->route('urls.show', $id);
        } catch (RequestException | ConnectionException $e) {
            flash("Error: {$e->getMessage()}")->error();
        }
        return redirect()->route('urls.show', $id);
    }
}
