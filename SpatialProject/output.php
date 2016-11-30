<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>
			Events Distribution
		</title>
		<link rel="stylesheet" href="lib/leaflet/leaflet.css" />
		<script src="lib/leaflet/leaflet.js"></script>
		<script src="data/countries.geojson"></script>
		<style type="text/css">
			#map { height : 400px; }
		</style>
	</head>
	<body>
		<h1>Hi</h1>
		<div id="map"></div>
<?php
$servername = "localhost";
$username = "root";
$password = "iiit123";
$dbname = "spatialproject";
$date4=$_POST['date3'];
$time4=$_POST['time3'];
$time5=$_POST['time43'];
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
	echo "No";
}
else
{
	if($date4==null)
	{
		$sql = "select * from spatialtable";
	}
	else if($date4!=null&$time4!=null&$time5!=null)
	{
		$sql = "select * from spatialtable WHERE Event_Date = '$date4' AND ((Event_Time_End > '$time4' AND Event_Time_End < '$time5') OR (Event_Time_Start > '$time4' AND Event_Time_Start < '$time5') OR (Event_Time_Start < '$time4' AND Event_Time_End > '$time5')) ";
	}
	else
	{
		$sql = "select * from spatialtable WHERE Event_Date = '$date4'";
	}
$result = mysqli_query($conn, $sql);
if ($result) 
{
    $idarr = array();
	while ($row = mysqli_fetch_assoc($result))
	{
        $idarr[] = $row;
	}
    
}
 else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);

}
}
mysqli_close($conn);
?>

<script >
			
			var grayscale =	 L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: ' &copy;',
    maxZoom: 50,
    id: 'sunand.21mgcko3',
    accessToken: 'pk.eyJ1Ijoic3VuYW5kIiwiYSI6ImNpdjZqbDRkOTAwMHcyb3BpdXEzYnR4aXUifQ.s2KZyoGvO2AFEcrmAdCRUw'
}),
		streets = L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: ' &copy;',
    maxZoom: 50,
    id: 'sunand.21mgcko3',
    accessToken: 'pk.eyJ1Ijoic3VuYW5kIiwiYSI6ImNpdjZqbDRkOTAwMHcyb3BpdXEzYnR4aXUifQ.s2KZyoGvO2AFEcrmAdCRUw'
});
var vindhya = L.polygon([
    [17.44507, 78.35014],[17.44514, 78.35021],[17.44522, 78.35011],[17.44551, 78.35037],
    [17.44539, 78.35049],[17.44554, 78.35066],[17.44652, 78.34949],[17.44638, 78.34935],[17.44627, 78.34948],[17.44601, 78.34924],[17.44607, 78.34915],[17.44596, 78.34904]
]);
var obh = L.polygon([
    [17.44552, 78.34601],[17.44551, 78.34598],[17.4455, 78.34597],[17.44549, 78.34593],[17.4455, 78.34593],[17.44553, 78.3459],[17.44553, 78.34588],[17.44556, 78.34585],[17.44558, 78.34586],[17.4456, 78.34584],[17.44544, 78.34549],[17.44505, 78.34533],[17.44504, 78.34541],[17.445, 78.34541],[17.44498, 78.34545],[17.44494, 78.34545],[17.44491, 78.34543],[17.44493, 78.34586],[17.44488, 78.34591],[17.44448, 78.34595],[17.4445, 78.34601],[17.44446, 78.34607],[17.4444, 78.34611],[17.44457, 78.34647],[17.44495, 78.34661],[17.44495, 78.34654],[17.445, 78.34652],[17.44502, 78.34649],[17.44509, 78.3465],[17.44508, 78.34611],[17.44513, 78.34603]
	
]);

	var nilgiri = L.polygon([
	[17.44715, 78.34914],[17.447, 78.349],[17.44698, 78.34902],[17.44695, 78.349],[17.44696, 78.34897],[17.44685, 78.34885],[17.44688, 78.34881],[17.44687, 78.34879],[17.44727, 78.34832],[17.44729, 78.34835],[17.44734, 78.3483],[17.44763, 78.34857],[17.44759, 78.34862],[17.44761, 78.34864],[17.44747, 78.3488],[17.44743, 78.34876],[17.44742, 78.34877],[17.44744, 78.34879],[17.44733, 78.34892],[17.44731, 78.34891],[17.44729, 78.34892],[17.44734, 78.34896],[17.44721, 78.34911]

	]);
var thub = L.polygon([
	[17.4455, 78.34879],[17.44578, 78.34905],[17.44595, 78.34884],[17.44567, 78.34859]
	]);

var himalaya = L.polygon([
		[17.44571, 78.34905],[17.44559, 78.34894],[17.44554, 78.34899],[17.44544, 78.3489],[17.44538, 78.34897],[17.44536, 78.34895],[17.44529, 78.34902],[17.44542, 78.34913],[17.44541, 78.34915],[17.44534, 78.34909],[17.44529, 78.34916],[17.44535, 78.34921],[17.44534, 78.34922],[17.44522, 78.34911],[17.44516, 78.34918],[17.44537, 78.34938],[17.44543, 78.34931],[17.44546, 78.34934],[17.44552, 78.34927],[17.4455, 78.34924],[17.44551, 78.34922],[17.44558, 78.34928],[17.4457, 78.34914],[17.44567, 78.3491]

	]);

var fg = L.polygon([
		[17.44563, 78.34634],[17.44625, 78.3469],[17.44659, 78.34648],[17.44598, 78.34592]

	]);

var footballground = L.polygon([
	[17.44632, 78.34862],[17.44667, 78.34893],[17.44729, 78.34822],[17.44695, 78.3479]
	]);

var basketball = L.polygon([
		[17.44752, 78.34817],[17.44764, 78.34828],[17.44783, 78.34806],[17.44772, 78.34794]

	]);
var kohliblock = L.polygon([
		[17.44532, 78.34961],[17.44517, 78.3498],[17.44514, 78.34977],[17.44508, 78.34984],[17.44498, 78.34976],[17.44502, 78.3497],[17.445, 78.34969],[17.44496, 78.34974],[17.44483, 78.34962],[17.44489, 78.34955],[17.44487, 78.34953],[17.44507, 78.34927],[17.44517, 78.34935],[17.44513, 78.3494],[17.44516, 78.34943],[17.44521, 78.34937],[17.44524, 78.34939],[17.44519, 78.34946],[17.44522, 78.34948],[17.44526, 78.34943],[17.44534, 78.34952],[17.44529, 78.34959]
	]);
var vindhyaA = L.polygon([
    [17.44507, 78.35014],[17.44514, 78.35021],[17.44522, 78.35011],[17.44551, 78.35037],
    [17.44539, 78.35049],[17.44554, 78.35066],[17.44652, 78.34949],[17.44638, 78.34935],[17.44627, 78.34948],[17.44601, 78.34924],[17.44607, 78.34915],[17.44596, 78.34904]
]);
var obhA = L.polygon([
    [17.44552, 78.34601],[17.44551, 78.34598],[17.4455, 78.34597],[17.44549, 78.34593],[17.4455, 78.34593],[17.44553, 78.3459],[17.44553, 78.34588],[17.44556, 78.34585],[17.44558, 78.34586],[17.4456, 78.34584],[17.44544, 78.34549],[17.44505, 78.34533],[17.44504, 78.34541],[17.445, 78.34541],[17.44498, 78.34545],[17.44494, 78.34545],[17.44491, 78.34543],[17.44493, 78.34586],[17.44488, 78.34591],[17.44448, 78.34595],[17.4445, 78.34601],[17.44446, 78.34607],[17.4444, 78.34611],[17.44457, 78.34647],[17.44495, 78.34661],[17.44495, 78.34654],[17.445, 78.34652],[17.44502, 78.34649],[17.44509, 78.3465],[17.44508, 78.34611],[17.44513, 78.34603]
	
]);

	var nilgiriA = L.polygon([
	[17.44715, 78.34914],[17.447, 78.349],[17.44698, 78.34902],[17.44695, 78.349],[17.44696, 78.34897],[17.44685, 78.34885],[17.44688, 78.34881],[17.44687, 78.34879],[17.44727, 78.34832],[17.44729, 78.34835],[17.44734, 78.3483],[17.44763, 78.34857],[17.44759, 78.34862],[17.44761, 78.34864],[17.44747, 78.3488],[17.44743, 78.34876],[17.44742, 78.34877],[17.44744, 78.34879],[17.44733, 78.34892],[17.44731, 78.34891],[17.44729, 78.34892],[17.44734, 78.34896],[17.44721, 78.34911]

	]);
var thubA = L.polygon([
	[17.4455, 78.34879],[17.44578, 78.34905],[17.44595, 78.34884],[17.44567, 78.34859]
	]);

var himalayaA = L.polygon([
		[17.44571, 78.34905],[17.44559, 78.34894],[17.44554, 78.34899],[17.44544, 78.3489],[17.44538, 78.34897],[17.44536, 78.34895],[17.44529, 78.34902],[17.44542, 78.34913],[17.44541, 78.34915],[17.44534, 78.34909],[17.44529, 78.34916],[17.44535, 78.34921],[17.44534, 78.34922],[17.44522, 78.34911],[17.44516, 78.34918],[17.44537, 78.34938],[17.44543, 78.34931],[17.44546, 78.34934],[17.44552, 78.34927],[17.4455, 78.34924],[17.44551, 78.34922],[17.44558, 78.34928],[17.4457, 78.34914],[17.44567, 78.3491]

	]);

var fgA = L.polygon([
		[17.44563, 78.34634],[17.44625, 78.3469],[17.44659, 78.34648],[17.44598, 78.34592]

	]);

var footballgroundA = L.polygon([
	[17.44632, 78.34862],[17.44667, 78.34893],[17.44729, 78.34822],[17.44695, 78.3479]
	]);

var basketballA = L.polygon([
		[17.44752, 78.34817],[17.44764, 78.34828],[17.44783, 78.34806],[17.44772, 78.34794]

	]);
var kohliblockA = L.polygon([
		[17.44532, 78.34961],[17.44517, 78.3498],[17.44514, 78.34977],[17.44508, 78.34984],[17.44498, 78.34976],[17.44502, 78.3497],[17.445, 78.34969],[17.44496, 78.34974],[17.44483, 78.34962],[17.44489, 78.34955],[17.44487, 78.34953],[17.44507, 78.34927],[17.44517, 78.34935],[17.44513, 78.3494],[17.44516, 78.34943],[17.44521, 78.34937],[17.44524, 78.34939],[17.44519, 78.34946],[17.44522, 78.34948],[17.44526, 78.34943],[17.44534, 78.34952],[17.44529, 78.34959]
	]);
var vindhyaS = L.polygon([
    [17.44507, 78.35014],[17.44514, 78.35021],[17.44522, 78.35011],[17.44551, 78.35037],
    [17.44539, 78.35049],[17.44554, 78.35066],[17.44652, 78.34949],[17.44638, 78.34935],[17.44627, 78.34948],[17.44601, 78.34924],[17.44607, 78.34915],[17.44596, 78.34904]
]);
var obhS = L.polygon([
    [17.44552, 78.34601],[17.44551, 78.34598],[17.4455, 78.34597],[17.44549, 78.34593],[17.4455, 78.34593],[17.44553, 78.3459],[17.44553, 78.34588],[17.44556, 78.34585],[17.44558, 78.34586],[17.4456, 78.34584],[17.44544, 78.34549],[17.44505, 78.34533],[17.44504, 78.34541],[17.445, 78.34541],[17.44498, 78.34545],[17.44494, 78.34545],[17.44491, 78.34543],[17.44493, 78.34586],[17.44488, 78.34591],[17.44448, 78.34595],[17.4445, 78.34601],[17.44446, 78.34607],[17.4444, 78.34611],[17.44457, 78.34647],[17.44495, 78.34661],[17.44495, 78.34654],[17.445, 78.34652],[17.44502, 78.34649],[17.44509, 78.3465],[17.44508, 78.34611],[17.44513, 78.34603]
	
]);

	var nilgiriS = L.polygon([
	[17.44715, 78.34914],[17.447, 78.349],[17.44698, 78.34902],[17.44695, 78.349],[17.44696, 78.34897],[17.44685, 78.34885],[17.44688, 78.34881],[17.44687, 78.34879],[17.44727, 78.34832],[17.44729, 78.34835],[17.44734, 78.3483],[17.44763, 78.34857],[17.44759, 78.34862],[17.44761, 78.34864],[17.44747, 78.3488],[17.44743, 78.34876],[17.44742, 78.34877],[17.44744, 78.34879],[17.44733, 78.34892],[17.44731, 78.34891],[17.44729, 78.34892],[17.44734, 78.34896],[17.44721, 78.34911]

	]);
var thubS = L.polygon([
	[17.4455, 78.34879],[17.44578, 78.34905],[17.44595, 78.34884],[17.44567, 78.34859]
	]);

var himalayaS = L.polygon([
		[17.44571, 78.34905],[17.44559, 78.34894],[17.44554, 78.34899],[17.44544, 78.3489],[17.44538, 78.34897],[17.44536, 78.34895],[17.44529, 78.34902],[17.44542, 78.34913],[17.44541, 78.34915],[17.44534, 78.34909],[17.44529, 78.34916],[17.44535, 78.34921],[17.44534, 78.34922],[17.44522, 78.34911],[17.44516, 78.34918],[17.44537, 78.34938],[17.44543, 78.34931],[17.44546, 78.34934],[17.44552, 78.34927],[17.4455, 78.34924],[17.44551, 78.34922],[17.44558, 78.34928],[17.4457, 78.34914],[17.44567, 78.3491]

	]);

var fgS = L.polygon([
		[17.44563, 78.34634],[17.44625, 78.3469],[17.44659, 78.34648],[17.44598, 78.34592]

	]);

var footballgroundS = L.polygon([
	[17.44632, 78.34862],[17.44667, 78.34893],[17.44729, 78.34822],[17.44695, 78.3479]
	]);

var basketballS = L.polygon([
		[17.44752, 78.34817],[17.44764, 78.34828],[17.44783, 78.34806],[17.44772, 78.34794]

	]);
var kohliblockS = L.polygon([
		[17.44532, 78.34961],[17.44517, 78.3498],[17.44514, 78.34977],[17.44508, 78.34984],[17.44498, 78.34976],[17.44502, 78.3497],[17.445, 78.34969],[17.44496, 78.34974],[17.44483, 78.34962],[17.44489, 78.34955],[17.44487, 78.34953],[17.44507, 78.34927],[17.44517, 78.34935],[17.44513, 78.3494],[17.44516, 78.34943],[17.44521, 78.34937],[17.44524, 78.34939],[17.44519, 78.34946],[17.44522, 78.34948],[17.44526, 78.34943],[17.44534, 78.34952],[17.44529, 78.34959]
	]);
var vindhyaE = L.polygon([
    [17.44507, 78.35014],[17.44514, 78.35021],[17.44522, 78.35011],[17.44551, 78.35037],
    [17.44539, 78.35049],[17.44554, 78.35066],[17.44652, 78.34949],[17.44638, 78.34935],[17.44627, 78.34948],[17.44601, 78.34924],[17.44607, 78.34915],[17.44596, 78.34904]
]);
var obhE = L.polygon([
    [17.44552, 78.34601],[17.44551, 78.34598],[17.4455, 78.34597],[17.44549, 78.34593],[17.4455, 78.34593],[17.44553, 78.3459],[17.44553, 78.34588],[17.44556, 78.34585],[17.44558, 78.34586],[17.4456, 78.34584],[17.44544, 78.34549],[17.44505, 78.34533],[17.44504, 78.34541],[17.445, 78.34541],[17.44498, 78.34545],[17.44494, 78.34545],[17.44491, 78.34543],[17.44493, 78.34586],[17.44488, 78.34591],[17.44448, 78.34595],[17.4445, 78.34601],[17.44446, 78.34607],[17.4444, 78.34611],[17.44457, 78.34647],[17.44495, 78.34661],[17.44495, 78.34654],[17.445, 78.34652],[17.44502, 78.34649],[17.44509, 78.3465],[17.44508, 78.34611],[17.44513, 78.34603]
	
]);

	var nilgiriE = L.polygon([
	[17.44715, 78.34914],[17.447, 78.349],[17.44698, 78.34902],[17.44695, 78.349],[17.44696, 78.34897],[17.44685, 78.34885],[17.44688, 78.34881],[17.44687, 78.34879],[17.44727, 78.34832],[17.44729, 78.34835],[17.44734, 78.3483],[17.44763, 78.34857],[17.44759, 78.34862],[17.44761, 78.34864],[17.44747, 78.3488],[17.44743, 78.34876],[17.44742, 78.34877],[17.44744, 78.34879],[17.44733, 78.34892],[17.44731, 78.34891],[17.44729, 78.34892],[17.44734, 78.34896],[17.44721, 78.34911]

	]);
var thubE = L.polygon([
	[17.4455, 78.34879],[17.44578, 78.34905],[17.44595, 78.34884],[17.44567, 78.34859]
	]);

var himalayaE = L.polygon([
		[17.44571, 78.34905],[17.44559, 78.34894],[17.44554, 78.34899],[17.44544, 78.3489],[17.44538, 78.34897],[17.44536, 78.34895],[17.44529, 78.34902],[17.44542, 78.34913],[17.44541, 78.34915],[17.44534, 78.34909],[17.44529, 78.34916],[17.44535, 78.34921],[17.44534, 78.34922],[17.44522, 78.34911],[17.44516, 78.34918],[17.44537, 78.34938],[17.44543, 78.34931],[17.44546, 78.34934],[17.44552, 78.34927],[17.4455, 78.34924],[17.44551, 78.34922],[17.44558, 78.34928],[17.4457, 78.34914],[17.44567, 78.3491]

	]);

var fgE = L.polygon([
		[17.44563, 78.34634],[17.44625, 78.3469],[17.44659, 78.34648],[17.44598, 78.34592]

	]);

var footballgroundE = L.polygon([
	[17.44632, 78.34862],[17.44667, 78.34893],[17.44729, 78.34822],[17.44695, 78.3479]
	]);

var basketballE = L.polygon([
		[17.44752, 78.34817],[17.44764, 78.34828],[17.44783, 78.34806],[17.44772, 78.34794]

	]);
var kohliblockE = L.polygon([
		[17.44532, 78.34961],[17.44517, 78.3498],[17.44514, 78.34977],[17.44508, 78.34984],[17.44498, 78.34976],[17.44502, 78.3497],[17.445, 78.34969],[17.44496, 78.34974],[17.44483, 78.34962],[17.44489, 78.34955],[17.44487, 78.34953],[17.44507, 78.34927],[17.44517, 78.34935],[17.44513, 78.3494],[17.44516, 78.34943],[17.44521, 78.34937],[17.44524, 78.34939],[17.44519, 78.34946],[17.44522, 78.34948],[17.44526, 78.34943],[17.44534, 78.34952],[17.44529, 78.34959]
	]);
var polygonsloop = [vindhya,obh, nilgiri,thub,himalaya,fg,footballground,basketball,kohliblock];
var polygonsloopname = ["vindhya","obh", "nilgiri","thub","himalaya","fg","footballground","basketball","kohliblock"];
var markerpoints = [];
var markerpointsx = [1.2,1.2,1.2,1.2,1.2,1.2,1.2,1.2,1.2];
var markerpointsy = [1.2,1.2,1.2,1.2,1.2,1.2,1.2,1.2,1.2];
var numofevents ={vindhya:0 , obh:0 , nilgiri:0 , thub:0 , himalaya:0 , fg:0 , footballground:0 , basketball: 0 ,kohliblock:0};
var numofeventsA ={vindhya:0 , obh:0 , nilgiri:0 , thub:0 , himalaya:0 , fg:0 , footballground:0 , basketball: 0 ,kohliblock:0};
var numofeventsS ={vindhya:0,obh:0,nilgiri:0,thub:0,himalaya:0,fg:0,footballground:0,basketball:0,kohliblock:0};
var numofeventsE ={vindhya:0,obh:0,nilgiri:0,thub:0,himalaya:0,fg:0,footballground:0,basketball:0,kohliblock:0};
var opesityA = {vindhya:0 , obh:0 , nilgiri:0 , thub:0 , himalaya:0 , fg:0 , footballground:0 , basketball: 0 ,kohliblock:0};
var opesityS = {vindhya:0 , obh:0 , nilgiri:0 , thub:0 , himalaya:0 , fg:0 , footballground:0 , basketball: 0 ,kohliblock:0};
var opesityE = {vindhya:0 , obh:0 , nilgiri:0 , thub:0 , himalaya:0 , fg:0 , footballground:0 , basketball: 0 ,kohliblock:0};
var opesity = {vindhya:0 , obh:0 , nilgiri:0 , thub:0 , himalaya:0 , fg:0 , footballground:0 , basketball: 0 ,kohliblock:0};
var popup1 = L.popup();
var popup2 = L.popup();
var popup3 = L.popup();
var lat,long,x,eventcount=0;
var filter = <?php echo json_encode($idarr); ?>;
var markerv = [];
var markervA = [];
var markervS = [];
var markervE = [];
var markervAcount=0,markervScount=0,markervEcount=0;
for(j in filter) 
{
	document.write(filter[j]['Event_Name'] + ":" +filter[j]['Event_Location']+"<br/>");
	if(filter[j]['Event_Type']=="Academic")
	{
		if(filter[j]['Event_ADD_Location']==null)
		{
		numofeventsA[filter[j]['Event_Location']]+=1;
		markervA[markervAcount]=L.marker([filter[j]['Event_Lat'],filter[j]['Event_lng']]);
		markervA[markervAcount].bindPopup("Event Name: "+ filter[j]['Event_Name'].toString()+ "<br/> Event Location: "+filter[j]['Event_Location'].toString()+"<br/> Event Date: "+filter[j]['Event_Date'].toString()+"<br/> Event Start Time: "+ filter[j]['Event_Time_Start'].toString()+ "<br/> Event End Time:"+ filter[j]['Event_Time_End'].toString());
		markervAcount++;
	}
	else
	{
		numofeventsA[filter[j]['Event_Location']]+=1;
		markervA[markervAcount]=L.marker([filter[j]['Event_Lat'],filter[j]['Event_lng']]);
		markervA[markervAcount].bindPopup("Event Name: "+ filter[j]['Event_Name'].toString()+ "<br/> Event Location: "+" "+ filter[j]['Event_Location'].toString() +","+filter[j]['Event_ADD_Location'].toString() + "<br/> Event Date: "+filter[j]['Event_Date'].toString()+"<br/> Event Start Time: "+ filter[j]['Event_Time_Start'].toString()+ "<br/> Event End Time:"+ filter[j]['Event_Time_End'].toString());
		markervAcount++;
	}
	}
	else if(filter[j]['Event_Type']=="Sports")
	{
		if(filter[j]['Event_ADD_Location']==null){
		numofeventsS[filter[j]['Event_Location']]+=1;
		markervS[markervScount]=L.marker([filter[j]['Event_Lat'],filter[j]['Event_lng']]);
		markervS[markervScount].bindPopup("Event Name: "+ filter[j]['Event_Name'].toString()+ "<br/> Event Location: "+filter[j]['Event_Location'].toString()+"<br/> Event Date: "+filter[j]['Event_Date'].toString()+"<br/> Event Start Time: "+ filter[j]['Event_Time_Start'].toString()+"<br/> Event End Time:"+ filter[j]['Event_Time_End'].toString());
		markervScount++;
	}
	else
	{
		numofeventsS[filter[j]['Event_Location']]+=1;
		markervS[markervScount]=L.marker([filter[j]['Event_Lat'],filter[j]['Event_lng']]);
		markervS[markervScount].bindPopup("Event Name: "+ filter[j]['Event_Name'].toString()+ "<br/> Event Location:"+" "+ filter[j]['Event_Location'].toString() +","+filter[j]['Event_ADD_Location'].toString()+"<br/> Event Date: "+filter[j]['Event_Date'].toString()+"<br/> Event Start Time: "+ filter[j]['Event_Time_Start'].toString()+"<br/> Event End Time:"+ filter[j]['Event_Time_End'].toString());
		markervScount++;
	}
	}
	else if(filter[j]['Event_Type']=="cultural")
	{
		if(filter[j]['Event_ADD_Location']==null){
		numofeventsE[filter[j]['Event_Location']]+=1;
		markervE[markervEcount]=L.marker([filter[j]['Event_Lat'],filter[j]['Event_lng']]);
		markervE[markervEcount].bindPopup("Event Name: "+ filter[j]['Event_Name'].toString()+ "<br/> Event Location: "+filter[j]['Event_Location'].toString()+"<br/> Event Date: "+filter[j]['Event_Date'].toString()+"<br/> Event Start Time: "+ filter[j]['Event_Time_Start'].toString()+"<br/> Event End Time:"+ filter[j]['Event_Time_End'].toString());
		markervEcount++;
	}
	else{
		numofeventsE[filter[j]['Event_Location']]+=1;
		markervE[markervEcount]=L.marker([filter[j]['Event_Lat'],filter[j]['Event_lng']]);
		markervE[markervEcount].bindPopup("Event Name: "+ filter[j]['Event_Name'].toString()+ "<br/> Event Location: "+" "+ filter[j]['Event_Location'].toString() +","+filter[j]['Event_ADD_Location'].toString()+ "<br/> Event Date: "+filter[j]['Event_Date'].toString()+"<br/> Event Start Time: "+ filter[j]['Event_Time_Start'].toString()+"<br/> Event End Time:"+ filter[j]['Event_Time_End'].toString());
		markervEcount++;
	}
	}
	if(filter[j]['Event_ADD_Location']==null){
	numofevents[filter[j]['Event_Location']]++;
	eventcount++;
	markerv[j]=L.marker([filter[j]['Event_Lat'],filter[j]['Event_lng']]);
	markerv[j].bindPopup("Event Name: "+ filter[j]['Event_Name'].toString()+"<br/> Event Location: "+filter[j]['Event_Location'].toString()+ "<br/> Event Date: "+filter[j]['Event_Date'].toString()+"<br/> Event Start Time: "+ filter[j]['Event_Time_Start'].toString()+"<br/> Event End Time:"+ filter[j]['Event_Time_End'].toString());
}
else
{
	numofevents[filter[j]['Event_Location']]++;
	eventcount++;
	markerv[j]=L.marker([filter[j]['Event_Lat'],filter[j]['Event_lng']]);
	markerv[j].bindPopup("Event Name: "+ filter[j]['Event_Name'].toString()+ "<br/> Event Location: "+" "+ filter[j]['Event_Location'].toString() +","+filter[j]['Event_ADD_Location'].toString()+ "<br/> Event Date: "+filter[j]['Event_Date'].toString()+"<br/> Event Start Time: "+ filter[j]['Event_Time_Start'].toString()+"<br/> Event End Time:"+ filter[j]['Event_Time_End'].toString());
}
}
var xoa=0,xos=0,xoe=0,xo=0;
for(var i=0;i<polygonsloop.length;i++)
{
	if(markervAcount!=0)
	{
	opesityA[polygonsloopname[i]]=(numofeventsA[polygonsloopname[i]])/(markervAcount);
	}
	if(markervScount!=0)
	{
	opesityS[polygonsloopname[i]]=(numofeventsS[polygonsloopname[i]])/(markervScount);
	}
	if(markervEcount!=0)
	{
	opesityE[polygonsloopname[i]]=(numofeventsE[polygonsloopname[i]])/(markervEcount);
	}
	if(eventcount!=0)
	{
	opesity[polygonsloopname[i]]=(numofevents[polygonsloopname[i]])/(eventcount);
}
}
vindhya.setStyle({fillColor: '#000000',fillOpacity: Number(opesity["vindhya"])});
obh.setStyle({fillColor: '#000000',fillOpacity: Number(opesity["obh"])});
nilgiri.setStyle({fillColor: '#000000',fillOpacity: opesity["nilgiri"]});
thub.setStyle({fillColor: '#000000',fillOpacity: opesity["thub"]});
himalaya.setStyle({fillColor: '#000000',fillOpacity: opesity["himalaya"]});
fg.setStyle({fillColor: '#000000',fillOpacity: opesity["fg"]});
footballground.setStyle({fillColor: '#000000',fillOpacity: opesity["footballground"]});
basketball.setStyle({fillColor: '#000000',fillOpacity: opesity["basketball"]});
kohliblock.setStyle({fillColor: '#000000',fillOpacity: opesity["kohliblock"]});


vindhyaE.setStyle({fillColor: '#000000',fillOpacity: Number(opesityE["vindhya"])});
obhE.setStyle({fillColor: '#000000',fillOpacity: Number(opesityE["obh"])});
nilgiriE.setStyle({fillColor: '#000000',fillOpacity: opesityE["nilgiri"]});
thubE.setStyle({fillColor: '#000000',fillOpacity: opesityE["thub"]});
himalayaE.setStyle({fillColor: '#000000',fillOpacity: opesityE["himalaya"]});
fgE.setStyle({fillColor: '#000000',fillOpacity: opesityE["fg"]});
footballgroundE.setStyle({fillColor: '#000000',fillOpacity: opesityE["footballground"]});
basketballE.setStyle({fillColor: '#000000',fillOpacity: opesityE["basketball"]});
kohliblockE.setStyle({fillColor: '#000000',fillOpacity: opesityE["kohliblock"]});


vindhyaS.setStyle({fillColor: '#000000',fillOpacity: Number(opesityS["vindhya"])});
obhS.setStyle({fillColor: '#000000',fillOpacity: Number(opesityS["obh"])});
nilgiriS.setStyle({fillColor: '#000000',fillOpacity: opesityS["nilgiri"]});
thubS.setStyle({fillColor: '#000000',fillOpacity: opesityS["thub"]});
himalayaS.setStyle({fillColor: '#000000',fillOpacity: opesityS["himalaya"]});
fgS.setStyle({fillColor: '#000000',fillOpacity: opesityS["fg"]});
footballgroundS.setStyle({fillColor: '#000000',fillOpacity: opesityS["footballground"]});
basketballS.setStyle({fillColor: '#000000',fillOpacity: opesityS["basketball"]});
kohliblockS.setStyle({fillColor: '#000000',fillOpacity: opesityS["kohliblock"]});


vindhyaA.setStyle({fillColor: '#000000',fillOpacity: Number(opesityA["vindhya"])});
obhA.setStyle({fillColor: '#000000',fillOpacity: Number(opesityA["obh"])});
nilgiriA.setStyle({fillColor: '#000000',fillOpacity: opesityA["nilgiri"]});
thubA.setStyle({fillColor: '#000000',fillOpacity: opesityA["thub"]});
himalayaA.setStyle({fillColor: '#000000',fillOpacity: opesityA["himalaya"]});
fgA.setStyle({fillColor: '#000000',fillOpacity: opesityA["fg"]});
footballgroundA.setStyle({fillColor: '#000000',fillOpacity: opesityA["footballground"]});
basketballA.setStyle({fillColor: '#000000',fillOpacity: opesityA["basketball"]});
kohliblockA.setStyle({fillColor: '#000000',fillOpacity: opesityA["kohliblock"]});
for(var i=0;i<polygonsloop.length;i++)
{
		markerpointsx[i]=polygonsloop[i].getBounds().getCenter().lat;
		markerpointsy[i]=polygonsloop[i].getBounds().getCenter().lng;
		var point = [markerpointsx[i],markerpointsy[i]];
		markerpoints[i]=L.marker(point);
	
}
markerpoints[0].bindPopup(
				'<b>vindhya</b><div><img style="width:100%" src="images/vindhya.jpg" alt="image" /></div>',
				{minWidth : 256}
			);
markerpoints[1].bindPopup(
				'<b>OBH</b><div><img style="width:100%" src="images/palash.jpg" alt="image" /></div>',
				{minWidth : 256}
			);
markerpoints[2].bindPopup(
				'<b>nilgiri</b><div><img style="width:100%" src="images/nilgiri.jpg" alt="image" /></div>',
				{minWidth : 256}
			);
markerpoints[3].bindPopup(
				'<b>T-hub</b><div><img style="width:100%" src="images/thub.jpg" alt="image" /></div>',
				{minWidth : 256}
			);
markerpoints[4].bindPopup(
				'<b>Himalaya</b><div><img style="width:100%" src="images/himalaya.jpg" alt="image" /></div>',
				{minWidth : 256}
			);
markerpoints[5].bindPopup(
				'<b>Felicity Ground</b><div><img style="width:100%" src="images/fg.jpg" alt="image" /></div>',
				{minWidth : 256}
			);
markerpoints[6].bindPopup(
				'<b>Football Ground</b><div><img style="width:100%" src="images/football.jpg" alt="image" /></div>',
				{minWidth : 256}
			);
markerpoints[7].bindPopup(
				'<b>Basket Ball court</b><div><img style="width:100%" src="images/basketball.jpg" alt="image" /></div>',
				{minWidth : 256}
			);
markerpoints[8].bindPopup(
				'<b>Kolhi block</b><div><img style="width:100%" src="images/kohli.jpg" alt="image" /></div>',
				{minWidth : 256}
			);


var photose=L.layerGroup(markerpoints);
var markere = L.layerGroup([vindhya,obh,nilgiri,thub,himalaya,fg,footballground,basketball,kohliblock]);
var Sportse = L.layerGroup([vindhyaS,obhS,nilgiriS,thubS,himalayaS,fgS,footballgroundS,basketballS,kohliblockS]);
var Academice = L.layerGroup([vindhyaA,obhA,nilgiriA,thubA,himalayaA,fgA,footballgroundA,basketballA,kohliblockA]);
var Elsee = L.layerGroup([vindhyaE,obhE,nilgiriE,thubE,himalayaE,fgE,footballgroundE,basketballE,kohliblockE]);
for(var i=0;i<eventcount;i++)
{
markerv[i].addTo(markere);
}
for(var i=0;i<markervAcount;i++)
{
	markervA[i].addTo(Academice);
}
for(var i=0;i<markervEcount;i++)
{
	markervE[i].addTo(Elsee);
}
for(var i=0;i<markervScount;i++)
{
	markervS[i].addTo(Sportse);
}

var map = L.map('map', {
    center: [17.445, 78.346],
    zoom: 16,
    layers: [grayscale, markere]
});
		var baseMaps = {
    "Grayscale": grayscale,
    "Streets": streets
};

var overlayMaps = 
{
    "Sports": Sportse,
    "Academics":Academice,
    "Cultural":Elsee,
    "Photos":photose,
    "markers":markere
};

L.control.layers(baseMaps, overlayMaps).addTo(map);

map.on('overlayadd', function(eo) {
  if (eo.name === 'Sports') {
    setTimeout(function() {
      map.removeLayer(Academice)
      map.removeLayer(Elsee)
      map.removeLayer(photose)
      map.removeLayer(markere)
    }, 10);
  } else if (eo.name === 'Academics') {
    setTimeout(function() {
      map.removeLayer(Sportse)
      map.removeLayer(Elsee)
      map.removeLayer(photose)
      map.removeLayer(markere)
    }, 10);
  }
  else if (eo.name === 'Cultural')
  	{
    setTimeout(function() {
      map.removeLayer(Academice)
      map.removeLayer(Sportse)
      map.removeLayer(photose)
      map.removeLayer(markere)
    }, 10);
  }
  else if (eo.name === 'Photos')
  {
  	setTimeout(function() {
      map.removeLayer(Academice)
      map.removeLayer(Elsee)
      map.removeLayer(Sportse)
      map.removeLayer(markere)
    }, 10);
  }
  else
  {
  	setTimeout(function() {
      map.removeLayer(Academice)
      map.removeLayer(Elsee)
      map.removeLayer(Sportse)
      map.removeLayer(photose)
    }, 10);
  }
});
//document.write(5 + 6);
</script>
<br/>
<button onclick="function1()">Select markers to Route</button>
<button onclick="function2()">login to add events</button>
<script type="text/javascript">
	function function1(){
		window.location = "http://localhost/SpatialProject/routemarkers.html";
	}
	function function2(){
		window.location = "http://localhost/SpatialProject/login.html";
	}
</script>
</body>
</html>