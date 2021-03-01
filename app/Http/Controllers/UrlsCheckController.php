<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DiDom\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class UrlsCheckController extends Controller
{
    public function store($id)
    {
        $domain = DB::table('domains')->find($id);
        try {
            $data = Http::get($domain->name);
            $body = $data->body();
            $status = $data->status();
            $document = new Document($body);
            $h1 = $document->has('h1') ? $document->first('h1')->text() : null;
            $keywordsElement = $document->first('meta[name=keywords]');
            $descriptionElement = $document->first('meta[name=description]');
            $keywords = optional($keywordsElement)->getAttribute('content');
            $description = optional($descriptionElement)->getAttribute('content');
            DB::table('domains_checks')->insert(
                [
                    'domain_id' => $id,
                    'status_code' => $status,
                    'h1' => $h1,
                    'keywords' => $keywords,
                    'description' => $description,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ]
            );
        } catch (HttpException $err) {
            flash($err->getMessage())->error();
        } catch (Throwable $e) {
            DB::table('domains_checks')->insert(
                [
                    'domain_id' => $id,
                    'status_code' => '404',
                    'h1' => null,
                    'keywords' => null,
                    'description' => null,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ]
            );
            flash('Site broked')->warning();
            return redirect()->route('domains.show', ['id'=>$id]);
//            abort(404);
        }
        flash('Site has been cheked')->success();
        return redirect()->route('domains.show', ['id' => $id]);
    }
}
