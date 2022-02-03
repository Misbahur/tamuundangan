<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>{{ $data }}</h1>

<table id="customers">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Hadir</th>
  </tr>
  @foreach ($tamu as $key=>$item)
    <tr>
    <td>{{ ++$key }}</td>
    <td>{{ $item->nama }}</td>
    @if ($item->hadir == 1)
        <td>{{ 'Hadir' }}</td>
    @else
        <td>{{ 'Tidak Hadir' }}</td>
    @endif
  </tr>
  @endforeach
</table>

</body>
</html>