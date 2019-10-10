<?php

$contentImage = json_decode($model['attachment'], true);
$contentText  = json_decode($model['attribute'], true);
echo $raw_html = '<!DOCTYPE html>
<html>
<head>
    <title>SITAC SURVEY</title>
    <style type="text/css">
        .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;margin:0px auto;}
        .tg td{font-family:Arial, sans-serif;font-size:14px;padding:20px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
        .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:20px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
        .tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
        .tg .tg-btxf{background-color:#f9f9f9;border-color:inherit;text-align:left;vertical-align:top}
        @media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;margin: auto 0px;}}</style>
</head>
<body>
<h2 style="text-align: center">TECHNICAL SITE SURVEY REPORT ( TSSR )</h2>
<p><h4>SITE ID   : '.$contentText['site_id'].'</h4></p>
<p><h4>SITE NAME : '.$contentText['site_name'].'</h4></p>
<p><h4>REGION    : '.$contentText['region'].'</h4></p>
<p><h4>SITE TYPE : '.$contentText['site_type'].'</h4></p>
<p><h5>We Hereby guarantee that approval proccess for ESSR can be conducted, for there shall be no significant difficulties in applying for the IMB For this site</h5>
</p>
<table border="1" style="width: 100%" class="tg">
    <tr>
        <th></th>
        <th><span style="font-weight:700">Title</span></th>
        <th><span style="font-weight:700">Name</span></th>
        <th><span style="font-weight:700">Signature</span></th>
        <th><span style="font-weight:bold">Date</span></th>
    </tr>
    <tr>
        <td rowspan="2" style="text-align: center"><span style="font-weight:bold">Prepared By</span><br><span style="font-weight:bold">(By Contractor)</span></td>
        <td>Contractor</td>
        <td>'.$contentText['contractor'].'</td>
        <td></td>
        <td style="text-align: center">'.date('d-M-Y', strtotime($model['created_at'])).'</td>
    </tr>
    <tr>
        <td>Project Manager</td>
        <td>'.$contentText['project_manger'].'</td>
        <td></td>
       <td style="text-align: center">'.date('d-M-Y', strtotime($model['created_at'])).'</td>
    </tr>
    <tr>
        <td style="text-align: center;"><span style="font-weight:bold">Checked By</span><br><span style="font-weight:bold">(IBS Regional)</span></td>
        <td>SITAC HO<br>(Initial by Sitac &amp; CME Reg)</td>
        <td>'.$contentText['sitac_ho'].'</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td rowspan="2" style="text-align: center"><span style="font-weight:bold">Approved By</span><br><span style="font-weight:bold">(Operator)</span></td>
        <td>RF</td>
        <td>'.$contentText['rf'].'</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>TX</td>
        <td>'.$contentText['tx'].'</td>
        <td></td>
        <td></td>
    </tr>
</table>

<br/>

<div class="tg-wrap">
    <table border="1" style="width: 100%" class="tg">
        <tr>
            <th colspan="3"><span style="font-weight:bold">SITE IDENTIFICATION</span></th>
        </tr>
        <tr>
            <td rowspan="5" style="text-align: center"><span style="font-weight:bold">Operator Request</span></td>
            <td><span style="font-weight:normal;font-style:normal">Site ID</span></td>
            <td>'.$contentText['site_id'].'<br></td>
        </tr>
        <tr>
            <td>Site Name<br></td>
            <td>'.$contentText['site_name'].'<br></td>
        </tr>
        <tr>
            <td>Nominal (Long / Lat)<br></td>
            <td>'.$contentText['nominal_long'].'° / '.$contentText['nominal_lat'].'°</td>
        </tr>
        <tr>
            <td>Search Radius<br></td>
            <td>'.$contentText['search_radius'].'<br></td>
        </tr>
        <tr>
            <td>Antena Height<br></td>
            <td>'.$contentText['antena_height'].' m<br></td>
        </tr>
    </table>
  </div>
<br/>

<div class="tg-wrap">
       <table border="1" style="width: 100%" class="tg">
        <tr>
            <th rowspan="20"><span style="font-weight:bold">Propose Candidate</span></th>
            <th colspan="2"><span style="font-weight:700">Candidate Information</span></th>
        </tr>
        <tr>
            <td>Candidate<br></td>
            <td><span style="font-weight:bold">'.$contentText['candidate'].'</span></td>
        </tr>
        <tr>
            <td>Coordinate (Long / Lat)<br></td>
            <td>'.$contentText['candidate_long'].'° / '.$contentText['candidate_lat'].'°<br></td>
        </tr>
        <tr>
            <td>Distance From NOM<br></td>
            <td>'.$contentText['distance_from_nom'].' m<br></td>
        </tr>
        <tr>
            <td>Azimuth<br></td>
            <td>'.$contentText['azimuth'].' Degree<br></td>
        </tr>
        <tr>
            <td>Site Address</td>
            <td>'.$contentText['site_address'].'</td>
        </tr>
        <tr>
            <td>City / Province</td>
            <td>Kabupaten Bogor</td>
        </tr>
        <tr>
            <td>Site Location</td>
            <td>'.$contentText['site_location'].'</td>
        </tr>
        <tr>
            <td>Tower Type</td>
            <td>'.$contentText['tower_type'].'</td>
        </tr>
        <tr>
            <td>Building Height (m)</td>
            <td>'.$contentText['building_height'].' m</td>
        </tr>
        <tr>
            <td>Building Height (m)</td>
            <td>'.$contentText['floor_no'].' fl</td>
        </tr>
        <tr>
            <td>Pole / Tower Height (m)</td>
            <td>'.$contentText['tower_height'].' m</td>
        </tr>
        <tr>
            <td>Space Dimension</td>
            <td>'.$contentText['space_dimension'].' m</td>
        </tr>
        <tr>
            <td>Access Road</td>
            <td>'.$contentText['access_road'].'</td>
        </tr>
        <tr>
            <td>24/7 Access</td>
            <td>'.$contentText['access'].'</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center"><span style="font-weight:bold">Owner Information</span></td>
        </tr>
        <tr>
            <td>Name (Institution)</td>
            <td>'.$contentText['owner'].'</td>
        </tr>
        <tr>
            <td>Address (Owner)</td>
            <td>'.$contentText['address_owner'].'</td>
        </tr>
        <tr>
            <td>PIC (if institution)</td>
            <td>'.$contentText['pic_owner'].'</td>
        </tr>
        <tr>
            <td>Phone Number / HP</td>
            <td>'.$contentText['phone_owner'].'</td>
        </tr>
    </table>
  </div>
<br/>
<div class="tg-wrap">
    <table border="1" style="width: 100%" class="tg">
        <tr>
            <th><span style="font-weight:bold">SITE LOCATION / MAP</span><br></th>
        </tr>
        <tr>
            <td style="text-align: center"><img src="'.base_url('uploads/attachment/survey/'.$contentImage['site_location_map'].'').'" width="500" height="400" alt=""/></td>
        </tr>
    </table>
  </div>
<br/>
<div class="tg-wrap">
    <table border="1" style="width: 100%" class="tg">
        <tr>
            <th><span style="font-weight:bold">SITE LAYOUT</span><br></th>
        </tr>
        <tr>
            <td style="text-align: center"><img src="'.base_url('uploads/attachment/survey/'.$contentImage['site_layout'].'').'" width="500" height="400" alt=""/></td>
        </tr>
    </table>
</div>
<br/>
<div class="tg-wrap">
    <table border="1" style="width: 100%" class="tg">
        <tr>
            <th><span style="font-weight:bold">Site Countour</span><br></th>
        </tr>
        <tr>
            <td style="text-align: center"><img src="'.base_url('uploads/attachment/survey/'.$contentImage['site_contour'].'').'"  width="500" height="400" alt=""/></td>
        </tr>
    </table>
</div>
<br/>
<div class="tg-wrap">
    <table border="1" style="width: 100%" class="tg">
        <tr>
            <th colspan="2">Site Photographs - Panoramic Photographs<br></th>
        </tr>
        <tr>
            <td style="text-align: center">Panoramic 0<br></td>
            <td style="text-align: center">Panoramic 30<br></td>
        </tr>
        <tr>
            <td style="text-align: center">Panoramic 60<br></td>
            <td style="text-align: center">Panoramic 90<br></td>
        </tr>
        <tr>
            <td style="text-align: center">Panoramic 120<br></td>
            <td style="text-align: center">Panoramic 150<br></td>
        </tr>
    </table>
</div>
<br/>
<div class="tg-wrap">
    <table border="1" style="width: 100%" class="tg">
        <tr>
            <th colspan="2">Site Photographs - Panoramic Photographs<br></th>
        </tr>
        <tr>
            <td style="text-align: center">Panoramic 180<br></td>
            <td style="text-align: center">Panoramic 210<br></td>
        </tr>
        <tr>
            <td style="text-align: center">Panoramic  240<br></td>
            <td style="text-align: center">Panoramic  270<br></td>
        </tr>
        <tr>
            <td style="text-align: center">Panoramic 300<br></td>
            <td style="text-align: center">Panoramic 330<br></td>
        </tr>
    </table>
</div>
<br/>
<div class="tg-wrap">
    <table border="1" style="width: 100%" class="tg">
        <tr>
            <th colspan="2">Site Photographs - View Of Site<br></th>
        </tr>
        <tr>
            <td style="text-align: center">Front View Of Building / Land (Front View)<br></td>
            <td style="text-align: center">Front View Of Building / Land (Back View)<br></td>
        </tr>
        <tr>
            <td style="text-align: center">Left View of Building<br></td>
            <td style="text-align: center">Right View of Building<br></td>
        </tr>
        <tr>
            <td style="text-align: center">Main Access road / Stairway 1<br></td>
            <td style="text-align: center">Main Access road / Stairway 2<br></td>
        </tr>
    </table>
</div>
<br/>
<div class="tg-wrap">
    <table border="1" style="width: 100%" class="tg">
        <tr>
            <th colspan="2">Site Photographs - View Of Site<br></th>
        </tr>
        <tr>
            <td style="text-align: center">Main Access road / Stairway 3<br></td>
            <td style="text-align: center">Main Access road / Stairway 4<br></td>
        </tr>
        <tr>
            <td style="text-align: center">Main Access road / Stairway 1<br></td>
            <td style="text-align: center">Main Access road / Stairway 1<br></td>
        </tr>
        <tr>
            <td style="text-align: center">Existing Nearest PLN Pole (20m)<br></td>
            <td style="text-align: center">Existing Nearest Trafo PLN (570m)<br></td>
        </tr>
    </table>
</div>
<br/>
<div class="tg-wrap">
    <table border="1" style="width: 100%" class="tg">
        <tr>
            <th colspan="2">Site Photographs - Potential Market<br></th>
        </tr>
        <tr>
            <td style="text-align: center">Islamic Centre 140m/98˚ from Candidate<br></td>
            <td style="text-align: center">Gardenia Residential 400m/150˚ from Candidate<br></td>
        </tr>
        <tr>
            <td style="text-align: center">Perumahan Puri Lestari 300m/240˚ from Candidate<br></td>
            <td style="text-align: center">Areal Pertokoan 300m / 6˚ from Candidate<br></td>
        </tr>
        <tr>
            <td style="text-align: center">SPBU Bojong Gede 700m/ 176˚ from Candidate<br></td>
            <td style="text-align: center">Pemukiman Penduduk 300m/ 90˚ from Candidate<br></td>
        </tr>
    </table>
</div>
<br/>
<div class="tg-wrap">
    <table border="1" style="width: 100%" class="tg">
        <tr>
            <th colspan="2">Site Photographs - Existing Tower<br></th>
        </tr>
        <tr>
            <td style="text-align: center">Existing Tower Telkomsel : 106.804200°; -6.468360° / Distance 180 meter 55˚ from Candidate<br></td>
        </tr>
        <tr>
            <td style="text-align: center">Existing Tower Telkomsel : 106.799740°; -6.461110° / Distance 1090 meter 332˚ from Candidate<br></td>
        </tr>
    </table>
</div>
</body>
</html>';
?>
