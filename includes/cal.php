<?php
// khai báo các biến toàn cầu
$heso_a = "";
$heso_b = "";
$heso_c = "";
$x = "";
$y = "";
// đọc các hệ số từ FORM
if (isset ( $_POST ['heso_a'] )) {
    $heso_a = $_POST ['heso_a'];
}
if (isset ( $_POST ['heso_b'] )) {
    $heso_b = $_POST ['heso_b'];
}
if (isset ( $_POST ['heso_c'] )) {
    $heso_c = $_POST ['heso_c'];
}
if (isset ($_POST ['x'])){
    $x = $_POST ['x'];
}
if (isset ($_POST ['y'])){
    $y = $_POST ['y'];
}
function giaiPTB2($a, $b, $c) {
    // kiểm tra biến đầu vào
    if ($a == "")
        $a = 0;
    if ($b == "")
        $b = 0;
    if ($c == "")
        $c = 0;
    // in phương trình ra màn hình
    echo "Phương trình: " . $a . "x^2 + " . $b . "x + " . $c . " = 0";
    echo "<br>";
    // kiểm tra các hệ số
    if ($a == 0) {
        if ($b == 0) {
            echo ("Phương trình vô nghiệm!");
        } else {
            echo ("Phương trình có một nghiệm: " . "x = " . (- $c / $b));
        }
        return;
    }
    // tính delta
    $delta = $b * $b - 4 * $a * $c;
    $x1 = "";
    $x2 = "";
    // tính nghiệm
    if ($delta > 0) {
        $x1 = (- $b + sqrt ( $delta )) / (2 * $a);
        $x2 = (- $b - sqrt ( $delta )) / (2 * $a);
        echo ("Phương trình có 2 nghiệm là: " . "x1 = " . $x1 . " và x2 = " . $x2);
    } else if ($delta == 0) {
        $x1 = (- $b / (2 * $a));
        echo ("Phương trình có nghiệm kép: x1 = x2 = " . $x1);
    } else {
        echo ("Phương trình vô nghiệm!");
    }
}
function calculator($x , $y){
    $cal = "+" ;
    switch ($cal){
        case "+":echo $x + $y;
        break;
        case "-":echo $x - $y;
        break;
        case "*":echo $x * $y;
        break;
        case "/":
            if ($y == 0){
            echo " không thể chia";
            }
            else{
            echo $x / $y;
        }
        break;
        case "sqr": echo $x*$x;
        break;
        default:
        echo "nhập sai cú pháp ";
    }
}
?>
<form action="#" method="post">
<h4 class="bg-secondary text-white p-2 my-0 mx-n3">Chương trình máy tính đơn giản </h4>
  <div class="form-group">
 <table>
  <tr>
   <td>Hệ số bậc 2, a</td>
   <td><input type="number" name="heso_a" value="<?=$heso_a?>" /></td>
  </tr>
  <tr>
   <td>Hệ số bậc 1, b</td>
   <td><input type="number" name="heso_b" value="<?=$heso_b?>" /></td>
  </tr>
  <tr>
   <td>Hệ số tự do, c</td>
   <td><input type="number" name="heso_c" value="<?=$heso_c?>" /></td>
  </tr>
  <tr>
   <td></td>
   <td><input type="submit" value="Kết quả"></td>  
  </tr>
 </table>
</form>
<br>
<?php
// gọi hàm giải phương trình bậc 2
// Sử dụng từ kháo $GLOBALS để đọc các biến toàn cầu và truyền vào hàm
if (is_numeric ( $GLOBALS ['heso_a'] ) && is_numeric ( $GLOBALS ['heso_b'] ) 
        && is_numeric ( $GLOBALS ['heso_c'] )) {
    giaiPTB2 ( $GLOBALS ['heso_a'], $GLOBALS ['heso_b'], $GLOBALS ['heso_c'] );
} else {
    echo ("Giá trị input không hợp lệ!");
}
?>