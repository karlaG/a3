<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignController extends Controller
{
    public function home() {
      return view('home')->with([
        'gender' => null,
        'month' => null,
        'day' => null,
        'sign' => null,
        'summary' => null
      ]);
    }

    public function getSign(Request $request) {
      $this->validate($request, [
        'gender' => 'required',
        'month' => 'required|digits_between:1,12',
        'day' => 'required|digits_between:1,31'
      ]);

      $gender = $request->input('gender', null);
      $month = $request->input('month', null);
      $day = $request->input('day', null);

      if($gender !=null && $month != null && $day != null) {
        $birthDate = $month.'.'.$day;
        $signsRawData = file_get_contents(database_path().'/signs.json');
        $signs = json_decode($signsRawData, true);

        if ($birthDate >= 1.20 && $birthDate <= 2.18) {
          $sign = 'Aquarius';
        } elseif ($birthDate >= 2.19 && $birthDate <= 3.20) {
          $sign = 'Pisces';
        } elseif ($birthDate >= 3.21 && $birthDate <= 4.19) {
          $sign = 'Aries';
        } elseif ($birthDate >= 4.20 && $birthDate <= 5.20) {
          $sign = 'Taurus';
        } elseif ($birthDate >= 5.21 && $birthDate <= 6.20) {
          $sign = 'Gemini';
        } elseif ($birthDate >= 6.21 && $birthDate <= 7.22) {
          $sign = 'Cancer';
        } elseif ($birthDate >= 7.23 && $birthDate <= 8.22) {
          $sign = 'Leo';
        } elseif ($birthDate >= 8.23 && $birthDate <= 9.22) {
          $sign = 'Virgo';
        } elseif ($birthDate >= 9.23 && $birthDate <= 10.22) {
          $sign = 'Libra';
        } elseif ($birthDate >= 10.23 && $birthDate <= 11.21) {
          $sign = 'Scorpio';
        } elseif ($birthDate >= 11.22 && $birthDate <= 12.21) {
          $sign = 'Sagittarius';
        } else {
          $sign = 'Capricorn';
        }

        return view('home')->with([
          'gender' => $gender,
          'month' => $month,
          'day' => $day,
          'sign' => $sign,
          'summary' => $signs[$sign]['summary']
        ]);
    }
  }
}
