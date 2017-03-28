<?php

namespace App\Http\Controllers;

use App\PhoneBook as PB;
use App\PhoneBook;
use Illuminate\Http\Request;

class PhoneBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = !empty(session('message')) ? session('message') : [];
        $phones = PB::get();
        $params['phoneBook'] = $phones;
        return view('phone-book', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phone = PB::get()->where('phone', $request->phone)->toArray();
        if ($phone) {
            return redirect('phone-book')->with('message', ['err' => 'Такой телефон уже существует']);
        } else {
            $phone = new PhoneBook;
            $phone->phone = $request->phone;
            $phone->name = $request->name;
            $phone->save();
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PhoneBook $phoneBook
     * @return \Illuminate\Http\Response
     */
    public function show(PhoneBook $phoneBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PhoneBook $phoneBook
     * @return \Illuminate\Http\Response
     */
    public function edit(PhoneBook $phoneBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\PhoneBook $phoneBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhoneBook $phoneBook)
    {
        $phoneBook->name = $request->name;
        $phoneBook->phone = $request->phone;
        $phoneBook->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PhoneBook $phoneBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhoneBook $phoneBook)
    {
        $phoneBook->delete();
        return redirect()->back();
    }
}
