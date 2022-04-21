<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cap nhat khach hang</title>
</head>
<body>
<table>
        <thead>
            <tr>
                <th>Ma khach hang</th>
                <th>Ten khach hang</th>
                <th>Dia chi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>123</td>
                <td>Nguyen Van A</td>
                <td>Ha Noi</td>
            </tr>
            <tr>
                <td>456</td>
                <td>Nguyen Van B</td>
                <td>Da Nang</td>
            </tr>
            <tr>
                <td>789</td>
                <td>Nguyen Van C</td>
                <td>Hai Phong</td>
            </tr>
        </tbody>
    </table>
    <form action="./Capnhat_Khachhang.php" method="post">
        <div>
            <label for="Makhach">Ma khach hang</label>
            <input type="text" name="Makhach" id="Makhach">
        </div>
        <div>
            <label for="Hotem">Ten khach hang</label>
            <input type="text" name="Hotem" id="Hotem">
        </div>
        <div>
            <label for="Diachi">Dia chi</label>
            <input type="text" name="Diachi" id="Diachi">
        </div>
        <button type="submit" name="Add">Them</button>
        <button type="submit" name="Update">Sua</button>
        <button type="submit" name="Delete">Xoa</button>
        <button type="submit" name="Xem">Xem thong tin</button>
    </form>
    <?php require './Khachhang.php'; 
        $xml = new SimpleXMLElement('./Khachang.xml', 0, true);
        if(isset($_POST['Add'])) {
            $makhach = $_POST['Makhach'];
            $hoten = $_POST['Hotem'];
            $diachi = $_POST['Diachi'];
            $khachhang = new Khachhang($makhach, $hoten, $diachi);
            $khachhang -> Add($xml);
        }
        if(isset($_POST['Update'])) {
            $makhach = $_POST['Makhach'];
            $hoten = $_POST['Hotem'];
            $diachi = $_POST['Diachi'];
            $khachhang = new Khachhang($makhach, $hoten, $diachi);
            $khachhang -> Update($xml);
        }
        if(isset($_POST['Delete'])) {
            $makhach = $_POST['Makhach'];
            $khachhang = new Khachhang($makhach, $hoten, $diachi);
            $khachhang -> Delete($xml);
        }
        if(isset($_POST['Xem'])) {
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Ma khach hang</th>";
            echo "<th>Ten khach hang</th>";
            echo "<th>Dia chi</th>";
            foreach($xml as $khachhang) {
                echo "<tr>";
                echo "<td>".$khachhang->Makh."</td>";
                echo "<td>".$khachhang->Tenkh."</td>";
                echo "<td>".$khachhang->Diachi."</td>";
                echo "</tr>";
            }
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
        }
    ?>
</body>
</html>