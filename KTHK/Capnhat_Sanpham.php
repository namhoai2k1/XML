<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cap nhat San Pham</title>
</head>
<body>
<table>
        <thead>
            <tr>
                <th>Ma san pham</th>
                <th>Ten san pham</th>
                <th>Don gia</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>123</td>
                <td>Banh</td>
                <td>10000</td>
            </tr>
            <tr>
                <td>456</td>
                <td>Keo</td>
                <td>200000</td>
            </tr>
            <tr>
                <td>789</td>
                <td>Bim Bim</td>
                <td>300000</td>
            </tr>
        </tbody>
    </table>
    <form action="./Capnhat_Sanpham.php" method="post">
        <div>
            <label for="MaSanpham">Ma san pham</label>
            <input type="text" name="MaSanpham" id="MaSanpham">
        </div>
        <div>
            <label for="TenSanpham">Ten san pham</label>
            <input type="text" name="TenSanpham" id="TenSanpham">
        </div>
        <div>
            <label for="Dongia">Don gia</label>
            <input type="text" name="Dongia" id="Dongia">
        </div>
        <button type="submit" name="Add">Them</button>
        <button type="submit" name="Update">Sua</button>
        <button type="submit" name="Delete">Xoa</button>
        <button type="submit" name="Xem">Xem thong tin</button>
    </form>
    <?php require './Sanpham.php'; 
        $xml = new SimpleXMLElement('./Sanpham.xml', 0, true);
        if(isset($_POST['Add'])) {
            $MaSanpham = $_POST['MaSanpham'];
            $TenSanpham = $_POST['TenSanpham'];
            $Dongia = $_POST['Dongia'];
            $Sanpham = new Sanpham($MaSanpham, $TenSanpham, $Dongia);
            $Sanpham -> Add($xml);
        }
        if(isset($_POST['Update'])) {
            $MaSanpham = $_POST['MaSanpham'];
            $TenSanpham = $_POST['TenSanpham'];
            $Dongia = $_POST['Dongia'];
            $Sanpham = new Sanpham($MaSanpham, $TenSanpham, $Dongia);
            $Sanpham -> Update($xml);
        }
        if(isset($_POST['Delete'])) {
            $MaSanpham = $_POST['MaSanpham'];
            $Sanpham = new Sanpham($MaSanpham, $TenSanpham, $Dongia);
            $Sanpham -> Delete($xml);
        }
        if(isset($_POST['Xem'])) {
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Ma San Pham</th>";
            echo "<th>Ten San Pham</th>";
            echo "<th>Dia chi</th>";
            foreach($xml as $Sanpham) {
                echo "<tr>";
                echo "<td>".$Sanpham->Masp."</td>";
                echo "<td>".$Sanpham->Tensp."</td>";
                echo "<td>".$Sanpham->Dongia."</td>";
                echo "</tr>";
            }
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
        }
    ?>
</body>
</html>