<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;
use App\Http\Requests\PostRequest;
use DateTime;

class RecordsController extends Controller
{
    public function list() {
        // $posts = \App\Post::all();
        // $posts = Post::all();
        // $records = Record::orderBy('created_at', 'desc')->get()->toArray();
        $records = Record::all();
        // dd($records);
        // $records->targetDate = $records->targetDate->format("Y-m-d");
        // dd($records);
        // dd($records);
        // $posts = [];
        // dd($posts->toArray()); // dump die
        // return view('posts.index', ['posts' => $posts]);
        return view('savemoney.list')->with('records', $records);
      }

      public function create() {
        return view('savemoney.input');
      }

      public function store(Request $request) {

        $record = new Record();
        
        $originalImg = $request->inputFile;
        // dd($originalImg);
        $filePath = $originalImg->store('public');
        $record->imgpath = str_replace('public/', '', $filePath);
        // $record->imgpath = $filePath;
        // dd($record->imgpath);
        
        $record->money = $request->inputMoney;
        $rcvdate = DateTime::createFromFormat('m/d/Y',$request->inputDate);
        $record->targetDate = $rcvdate->format("Y-m-d");
        $record->result='○';
        $record->save();
        return redirect('/verification');
      }

      public function edit(Record $record) {
        $selectRecord = Record::find($record->id);
        $rcvdate = DateTime::createFromFormat('Y-m-d', $selectRecord->targetDate)->format('m/d/Y');
        $selectRecord->targetDate = $rcvdate;
        return view('savemoney.edit')->with('selectRecord', $selectRecord);
      }

      public function update(Request $request,Record $record) {
        $record->money = $request->inputMoney;
        $rcvdate = DateTime::createFromFormat('m/d/Y',$request->inputDate);
        $record->targetDate = $rcvdate->format("Y-m-d");
        $record->result='○';
        $record->save();
        return redirect('/verification');
      }

      public function destroy(Request $request,Record $record) {
        $record->delete();
        return redirect('/verification');
      }

}
