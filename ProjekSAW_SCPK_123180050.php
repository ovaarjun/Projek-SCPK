
<!DOCTYPE html>
<html>
<head>
	<title>Projek</title>
</head>
<body>
	<center><table border="2">
<tr>
	<td rowspan="2"><CENTER><h5>Alternatif</h5></CENTER></td>
	<td colspan="4"><center><h5>Kriteria</h5></center></td>
</tr>
<tr>
	<td><center><h5>Biaya(C1)</h5></center></td>
	<td><center><h5>Lokasi(C2)</h5></center></td>
	<td><center><h5>Fasilitas(C3)</h5></center></td>
	<td><center><h5>Pengajar(C4)</h5></center></td>
</tr>
<tr>
	<td>Codingku(A1)</td>
	<td>Rp.1.500.000 - Rp.2.500.000</td>
	<td><=5Km</td>
	<td>Cukup Lengkap</td>
	<td>Lulusan S1</td>
</tr>
<tr>
	<td>JavaClub(A2)</td>
	<td>Rp.2.500.000 - Rp.3.500.000</td>
	<td>>=15Km</td>
	<td>Sangat Lengkap</td>
	<td>Lulusan S2</td>
</tr>
<tr>
	<td>Algoqu(A3)</td>
	<td><=Rp.1.500.000</td>
	<td>10Km - 15Km</td>
	<td>Cukup Lengkap</td>
	<td>Lulusan D1/D2/D3</td>
</tr>
<center>
<tr>

	<td colspan ="5"><center><?php
echo '
<form action="" method="POST">
<button class="btn btn-primary" name="Rekomendasi">Rekomendasi</button>
</form>';
if(isset($_POST['Rekomendasi']))
{ 
$alternatif=array();
$kriteria =array();
$r = array();

$kriteria[]= 'C1';
$kriteria[]= 'C2';
$kriteria[]= 'C3';
$kriteria[]= 'C4';
					// 0   1 2 3 4
$alternatif[] = array('A1',3,2,3,4);
$alternatif[] = array('A2',4,5,5,5);
$alternatif[] = array('A3',2,4,3,3);



$index_alternatif = 0;
foreach ($alternatif as $alt) 
{
	$index_kriteria = 1;
	foreach ($kriteria as $kri) 
	{
		if ($kri=='C1'|| $kri=='C2') 
		{
			$r[$index_alternatif][$index_kriteria]=round(min(array_column($alternatif, $index_kriteria)) / $alternatif[$index_alternatif][$index_kriteria],2);
		}
		elseif ($kri=='C3'|| $kri=='C4') 
		{
			$r[$index_alternatif][$index_kriteria]=round($alternatif[$index_alternatif][$index_kriteria] / max(array_column($alternatif, $index_kriteria)),2);
		}
		
		$index_kriteria++;
	}	
	$index_alternatif++;
}

$w= array(0.4,0.3,0.2,0.1);

$index_alternatif = 0;
foreach ($alternatif as $alt) 
{
	$index_w= 0;
	$index_r = 1;
	$v=0;
	foreach ($kriteria as $kri) 
	{
		$v += $w[$index_w] * $r[$index_alternatif][$index_r];
		
		$index_r++;
		$index_w++;
	}
	$nilai_v[$index_alternatif]['alternatif']=$alt[0];
	$nilai_v[$index_alternatif]['nilai']=$v;
	$index_alternatif++;
}

usort($nilai_v,function($a,$b){
	return $a['nilai']<=>$b['nilai']; 
});
array_reverse($nilai_v);

echo '<h2>Urutan Rekomendasi Bimbel Coding</h2>
		<h4>(nilai semakin besar semakin baik)</h4>';
$rank =1;
foreach (array_reverse($nilai_v) as $v) 
{
	echo 'Urutan ' . $rank . ' ' . $v['alternatif'] . ' dengan nilai = ' . $v['nilai'] . '<br>';
	$rank++;
}}
?></center>

</td>
</tr>
</center>
</table>
</center>
</body>
<center><tbody>
		<table border="2">
		<tr>
	<td colspan="4"> <center>Nilai</center></td>
</tr>
<tr>
	<td><center>Cost(C1)</center></td>
	<td><center>Cost(C2)</center></td>
	<td><center>Benefit(C3)</center></td>
	<td><center>Benefit(C4)</center></td>
</tr>
<tr>
	<td><=Rp. 1.500.000 = 2</td>
	<td><=5Km = 2</td>
	<td>Tidak Lengkap = 1</td>
	<td>Lulusan D1/D2/D3 = 3</td>
</tr>
<tr>
	<td>Rp. 1.500.000-Rp. 2.500.000 = 3</td>
	<td>5Km-10Km = 3</td>
	<td>Cukup Lengkap = 3</td>
	<td>Lulusan S1 = 4</td>
</tr>
<tr>
	<td><=Rp. 2.500.000-Rp. 3.500.000 = 4</td>
	<td>10Km-15Km = 4</td>
	<td>Sangat Lengkap = 5</td>
	<td>Lulusan S2 = 5</td>
</tr>
<tr>
	<td>>=Rp. 3.000.000 = 5</td>
	<td>>=15Km = 5</td>
</tr>

	</table>
<table border="2">
	<tr>
		<td colspan="4"><center>Pemberian Bobot Kriteria</center></td>
	</tr>
	<tr>
		<td><center>C1</center></td>
		<td><center>C2</center></td>
		<td><center>C3</center></td>
		<td><center>C4</center></td>
	</tr>
	<tr>
	<td><center>40 = 0,4</center></td>
	<td><center>30 = 0,3</center></td>
	<td><center>20 = 0,2</center></td>
	<td><center>10 = 0,1</center></td>
	</tr>

</table>	

</tbody></center>
</html>


