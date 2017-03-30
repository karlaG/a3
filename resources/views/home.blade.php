@extends('layouts.master')

@section('content')
  <form method="GET" action="/submit">
    <p>I am</p>
    <input type="radio" name="gender" value="female" {{ ($gender=='female') ? 'CHECKED': '' }} required> Female <br>
    <input type="radio" name="gender" value="male" {{ ($gender=='male') ? 'CHECKED': '' }} required> Male <br>

    <p>and my birthdate is</p>

    <label for="month">Month</label>
    <select name="month" required>
      <option value="">...</option>
      <option value="1" {{ ($month=='1') ? 'SELECTED': '' }}>Jan</option>
      <option value="2" {{ ($month=='2') ? 'SELECTED': '' }}>Feb</option>
      <option value="3" {{ ($month=='3') ? 'SELECTED': '' }}>Mar</option>
      <option value="4" {{ ($month=='4') ? 'SELECTED': '' }}>Apr</option>
      <option value="5" {{ ($month=='5') ? 'SELECTED': '' }}>May</option>
      <option value="6" {{ ($month=='6') ? 'SELECTED': '' }}>Jun</option>
      <option value="7" {{ ($month=='7') ? 'SELECTED': '' }}>Jul</option>
      <option value="8" {{ ($month=='8') ? 'SELECTED': '' }}>Aug</option>
      <option value="9" {{ ($month=='9') ? 'SELECTED': '' }}>Sep</option>
      <option value="10" {{ ($month=='10') ? 'SELECTED': '' }}>Oct</option>
      <option value="11" {{ ($month=='11') ? 'SELECTED': '' }}>Nov</option>
      <option value="12" {{ ($month=='12') ? 'SELECTED': '' }}>Dec</option>
    </select>

    <label for="day">Day</label>
      <input type="number" name="day" min="1" max="31" value="{{ $day or ''}}" required>
    <br>
    <input type="submit" value="submit">
    <br>
    <p>* denotes a required field.</p>
  </form>

  @if (count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
    </ul>
  @endif

  @if ($gender == 'female')
    <img src="female-gender-sign.jpg" alt="female gender sign">
  @elseif ($gender == 'male' )
    <img src="male-gender-sign.jpg" alt="male gender sign">
  @endif

  {{ $sign }}
  {{ $summary }}

@endsection
