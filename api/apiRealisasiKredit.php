<?php
// error_reporting(0);
// include "../inc/inc-db2.php";

/*  $tgl1=$_POST['tgl'];
$tgl2=$_POST['tgl2'];
$prod=$_POST['prod'];
$cab=$_POST['cab'];
$ao=$_POST['ao'];
 

$tgl1=$_GET['tgl'];
$tgl2=$_GET['tgl2'];
$prod=$_GET['prod'];
$cab=$_GET['cab'];
$ao=$_GET['ao'];


$columns = array('','MDLCDAT','MDLBRCO','MDLPROD','MDLCUCO','MDLDLRF','MDLNAME','MDLAMNT','MDLSTAT','MDLAOCO');
$query="  SELECT 
         MDLPROD,MDLDLRF,MDLCUCO,MDLNAME,MDLBRCO,MDLAMNT,MDLSDAT,MDLMDAT,MDLDTIN,MDLCDAT,MDLAOCO,MDLSTAT,MDLDESC,MDLOAMT,MDLUSIN,MDLBRKR,CS1ADR1,CS1CUCO,MD4RATE,MD4CD06,TBLDESC1,WCONAME,CS3IDNO,CS3DOBT,TMPTLAHIR,MD4NPRP,CS3SEXC,MD4DSP3,CS1TLP1
         FROM MDLPF x 
         LEFT JOIN CS1PF y ON x.MDLCUCO=y.CS1CUCO
         LEFT JOIN MD4PF z ON x.MDLDLRF=z.MD4DLRF
         LEFT JOIN WCOPF a ON x.MDLBRKR=a.WCOCOCO
         LEFT JOIN {(SELECT TBLITEM, MAX(TBLDESC) AS TBLDESC1 FROM TBLPF WHERE TBLTBCO='LN03' GROUP BY TBLITEM) b} ON z.MD4CD06=b.TBLITEM
         LEFT JOIN CS3PF c ON x.MDLCUCO=c.CS3CUCO
         LEFT JOIN {(SELECT TBLITEM, MAX(TBLDESC) AS TMPTLAHIR FROM TBLPF WHERE TBLTBCO='CITY' GROUP BY TBLITEM) d} ON c.CS3POBT=d.TBLITEM         
         WHERE MDLSDAT >= '$tgl1' AND MDLSDAT <= '$tgl2'
         AND MDLPROD LIKE '$prod' AND MDLBRCO IN ($cab) AND MDLAOCO LIKE '$ao' AND MDLAPPL = 'LN' AND CS1ARCO = '01'
  ";

$hitung=" SELECT 
         COUNT(MDLDLRF) AS JUMLAH
         FROM MDLPF x 
         LEFT JOIN CS1PF y ON x.MDLCUCO=y.CS1CUCO
         LEFT JOIN MD4PF z ON x.MDLDLRF=z.MD4DLRF
         LEFT JOIN CS3PF c ON x.MDLCUCO=c.CS3CUCO
         WHERE MDLSDAT >= '$tgl1' AND MDLSDAT <= '$tgl2'
         AND MDLPROD LIKE '$prod' AND MDLBRCO IN ($cab) AND MDLAOCO LIKE '$ao' AND MDLAPPL = 'LN' AND CS1ARCO = '01'
  ";

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY MDLSDAT';
}

$query1= '';

if($_POST["is_date_search"] == "yes")
{
 $rs=odbc_prepare($conndb2, $query);	
 $sum=odbc_prepare($conndb2, $hitung); 
}

$sql = odbc_execute($rs);
$sql1 = odbc_execute($sum);

$data = array();
$no=1;

while (odbc_fetch_array($rs))
{
 $sub_array = array();
 $sub_array[] = $no++;
 $sub_array[] = substr(odbc_result($rs,"MDLSDAT"),6,2).'/'.substr(odbc_result($rs,"MDLSDAT"),4,2).'/'.substr(odbc_result($rs,"MDLSDAT"),0,4);
 $sub_array[] = strtoupper((odbc_result($rs,"MDLPROD")));
 $sub_array[] = odbc_result($rs,"MDLBRCO");
 $sub_array[] = odbc_result($rs,"MDLDLRF");
 $sub_array[] = odbc_result($rs,"MDLDESC");
 $sub_array[] = odbc_result($rs,"MDLCUCO");
 $sub_array[] = "'".odbc_result($rs,"CS3IDNO");
 $sub_array[] = odbc_result($rs,"MDLNAME");
 $sub_array[] = odbc_result($rs,"CS3SEXC");
 $sub_array[] = substr(odbc_result($rs,"TMPTLAHIR"),0,46);
 $sub_array[] = substr(odbc_result($rs,"CS3DOBT"),6,2).'/'.substr(odbc_result($rs,"CS3DOBT"),4,2).'/'.substr(odbc_result($rs,"CS3DOBT"),0,4);
 $sub_array[] = strtoupper(odbc_result($rs,"CS1ADR1"));
 $sub_array[] = odbc_result($rs,"CS1TLP1");
 $sub_array[] = substr(odbc_result($rs,"MDLMDAT"),6,2).'/'.substr(odbc_result($rs,"MDLMDAT"),4,2).'/'.substr(odbc_result($rs,"MDLMDAT"),0,4);
 $sub_array[] = number_format((odbc_result($rs,"MDLOAMT")),0,".",",");
 $sub_array[] = number_format((odbc_result($rs,"MDAAMNT")),0,".",",");
 $sub_array[] = odbc_result($rs,"MDLBRKR");
 $sub_array[] = odbc_result($rs,"WCONAME");
 $sub_array[] = odbc_result($rs,"MD4NPRP");
 $sub_array[] = number_format((odbc_result($rs,"MD4RATE")),2,".",",");
 $sub_array[] = odbc_result($rs,"MD4CD06").' - '.odbc_result($rs,"TBLDESC1");
 $sub_array[] = odbc_result($rs,"MD4DSP3");
 $sub_array[] = odbc_result($rs,"MDLAOCO");
 $sub_array[] = odbc_result($rs,"MDLSTAT");
 $sub_array[] = odbc_result($rs,"MDLUSIN");
 $data[] = $sub_array;
}
$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  odbc_result($sum,"JUMLAH"),
 "recordsFiltered" => odbc_result($sum,"JUMLAH"),
 "data"    => $data
); */


header('Content-Type: application/json');

// Jumlah total data dummy
$totalData = 100;

// Urutan kolom sesuai <th>
$columns = [
    'no', 'tgl_realisasi', 'jenis_produk', 'cabang', 'no_rekening', 'no_pk', 'cif',
    'nik', 'nama_lengkap', 'jenis_kelamin', 'tempat_lahir', 'tgl_lahir', 'alamat',
    'no_telpon', 'tgl_jatuh_tempo', 'plafond', 'provisi_adm', 'kode_instansi',
    'instansi', 'jangka_waktu', 'rate', 'status_realisasi', 'no_rek_lama',
    'kode_ao', 'status', 'usin'
];

// Ambil parameter datatables & filter tambahan
$start    = $_POST['start'] ?? 0;
$length   = $_POST['length'] ?? 10;
$draw     = $_POST['draw'] ?? 1;
$search   = $_POST['search']['value'] ?? '';
$orderCol = $_POST['order'][0]['column'] ?? 0;
$orderDir = $_POST['order'][0]['dir'] ?? 'asc';

$cabang   = $_POST['cabang'] ?? '';
$produk   = $_POST['produk'] ?? '';
$tgl_awal = $_POST['tgl_awal'] ?? '';
$tgl_akhir = $_POST['tgl_akhir'] ?? '';
$ao       = $_POST['ao'] ?? '';

echo $cabang;
// Buat semua data dummy
$allData = [];
for ($i = 0; $i < $totalData; $i++) {
    $tglRealisasi = date('Y-m-d', strtotime("-$i days"));
    $allData[] = [
        $i + 1,
        $tglRealisasi,
        'Kredit Multiguna',
        'Cabang ' . rand(1, 5),
        '1234567890' . $i,
        'PK' . rand(1000, 9999),
        'CIF' . rand(10000, 99999),
        '31740' . rand(100000000, 999999999),
        'Nasabah ' . $i,
        (rand(0, 1) ? 'Laki-laki' : 'Perempuan'),
        'Yogyakarta',
        date('Y-m-d', strtotime("-" . rand(7000, 20000) . " days")),
        'Jl. Contoh Alamat No. ' . $i,
        '0812' . rand(10000000, 99999999),
        date('Y-m-d', strtotime("+$i days")),
        rand(10000000, 100000000),
        rand(100000, 1000000),
        'INST' . rand(1, 10),
        'Instansi ' . rand(1, 5),
        rand(6, 60) . ' bulan',
        rand(5, 15) . '%',
        (rand(0, 1) ? 'Aktif' : 'Non-Aktif'),
        '9876543210' . rand(0, 9),
        'AO' . rand(1, 20),
        (rand(0, 1) ? 'Lunas' : 'Berjalan'),
        strtoupper(substr(md5($i), 0, 8))
    ];
}

// Filter data
$filteredData = array_filter($allData, function ($row) use ($search, $cabang, $produk, $tgl_awal, $tgl_akhir, $ao) {
    $tglRealisasi = $row[1];
    $jenisProduk  = $row[2];
    $cabangData   = $row[3];
    $kodeAo       = $row[23];

    if ($cabang && stripos($cabangData, $cabang) === false) return false;
    if ($produk && stripos($jenisProduk, $produk) === false) return false;
    if ($ao && stripos($kodeAo, $ao) === false) return false;
    if ($tgl_awal && $tglRealisasi < $tgl_awal) return false;
    if ($tgl_akhir && $tglRealisasi > $tgl_akhir) return false;

    if ($search) {
        foreach ($row as $item) {
            if (stripos($item, $search) !== false) return true;
        }
        return false;
    }

    return true;
});

$recordsFiltered = count($filteredData);

// Sorting
usort($filteredData, function ($a, $b) use ($orderCol, $orderDir) {
    $valA = $a[$orderCol];
    $valB = $b[$orderCol];
    return $orderDir === 'asc' ? strnatcasecmp($valA, $valB) : strnatcasecmp($valB, $valA);
});

// Ambil data sesuai paging
$data = array_slice($filteredData, $start, $length);

// Return JSON
echo json_encode([
    "draw" => intval($draw),
    "recordsTotal" => $totalData,
    "recordsFiltered" => $recordsFiltered,
    "data" => array_values($data)
]);

?>
