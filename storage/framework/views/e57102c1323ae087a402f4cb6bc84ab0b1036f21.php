<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

.row {
  margin-left:-5px;
  margin-right:-5px;
}
  
.column {
  float: left;
  width: 50%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
</head>
<body>

<h2>Tables Side by Side</h2>
<p>Cara membuat tabel berdampingan dengan CSS:</p>

<div class="row">
  <div class="column">
    <table>
      <tr>
        <th>Nama</th>
        <th>Usia</th>
      </tr>
      <tr>
        <td>Belly</td>
        <td>56</td>
      </tr>
      <tr>
        <td>Eva</td>
        <td>15</td>
      </tr>
      <tr>
        <td>Diena</td>
        <td>40</td>
      </tr>
    </table>
  </div>
  <div class="column">
    <table>
      <tr>
        <th>Nama Depan</th>
        <th>Nama Belakang</th>
      </tr>
      <tr>
        <td>Sapri</td>
        <td>Smith</td>
      </tr>
      <tr>
        <td>Tony</td>
        <td>Stark</td>
      </tr>
      <tr>
        <td>Paul</td>
        <td>Pogba</td>
      </tr>
    </table>
  </div>
</div>

</body>
</html><?php /**PATH E:\stok_udwangiagung_fix\resources\views/tes.blade.php ENDPATH**/ ?>