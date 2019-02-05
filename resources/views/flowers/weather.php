

<?Php
    $opts = array(
        'http'=>array(
            'method'=>"GET",
            // 'lat'=>"53.25209",
            // 'lon'=>"34.37167",
            // 'lang'=>"ru_RU",
            'header'=>"X-Yandex-API-Key: cfe5b344-eec5-4ff6-94b7-b320b7af8bea",
        )
    );
    
    $context = stream_context_create($opts);
    $data = file_get_contents('https://api.weather.yandex.ru/v1/forecast?lat=53.25209&lon=34.37167&lang=>ru_RU',false,$context);
    //   echo $data;
    
    // если получили данные
    if($data){
        
        // декодируем полученные данные
        $dataJson = json_decode($data);
        // получаем только нужные данные
        $arrayList = $dataJson->fact;
        // выводим данные
        $pathIco='https://yastatic.net/weather/i/icons/blueye/color/svg/'.$arrayList->icon.'.svg';
        
        echo "Брянск "."<img width='50px' src=".$pathIco .">" . $arrayList->temp ."°C ,ощущается  как " . $arrayList->feels_like  ."°C<br/>";
        
    }
    // else{
    //     echo "Сервер не доступен!";
    // }

