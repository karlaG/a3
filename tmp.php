require('Form.php');
require('Tools.php');

$signsJson = file_get_contents('signs.json');
$signs = json_decode($signsJson, true);

$form = new DWA\Form($_GET);

if ($form->isSubmitted()) {
  $gender = $form->get('gender', $default = 'female');
  $month = $form->get('month', $default = '1');
  $day = $form->get('day', $default = '1');

  $errors = $form->validate(
    [
      'gender' => 'required',
      'month' => 'required',
      'day' => 'required|numeric|min:1|max:31',
  ]);

  $birthDate = $month.'.'.$day;

  if ($birthDate >= 1.20 && $birthDate <= 2.18) {
    $sign = "Aquarius";
  } elseif ($birthDate >= 2.19 && $birthDate <= 3.20) {
    $sign = "Pisces";
  } elseif ($birthDate >= 3.21 && $birthDate <= 4.19) {
    $sign = "Aries";
  } elseif ($birthDate >= 4.20 && $birthDate <= 5.20) {
    $sign = "Taurus";
  } elseif ($birthDate >= 5.21 && $birthDate <= 6.20) {
    $sign = "Gemini";
  } elseif ($birthDate >= 6.21 && $birthDate <= 7.22) {
    $sign = "Cancer";
  } elseif ($birthDate >= 7.23 && $birthDate <= 8.22) {
    $sign = "Leo";
  } elseif ($birthDate >= 8.23 && $birthDate <= 9.22) {
    $sign = "Virgo";
  } elseif ($birthDate >= 9.23 && $birthDate <= 10.22) {
    $sign = "Libra";
  } elseif ($birthDate >= 10.23 && $birthDate <= 11.21) {
    $sign = "Scorpio";
  } elseif ($birthDate >= 11.22 && $birthDate <= 12.21) {
    $sign = "Sagittarius";
  } else {
    $sign = "Capricorn";
  }

  $summary = $signs[$sign]["summary"];
}
