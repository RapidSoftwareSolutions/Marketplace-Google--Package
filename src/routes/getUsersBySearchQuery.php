<?php

$app->post('/api/GooglePlus/getUsersBySearchQuery', function ($request, $response) {


    $option = array(
        "accessToken" => "access_token",
        "searchQuery" => "query",
        "language" => "language",
        "prettyPrint" => "prettyPrint",
        "maxResults" => "maxResults",
        "pageToken" => "pageToken"
    );


    $languageArr = [
        "Afrikaans" => "af",
        "Amharic" => "am",
        "Arabic" => "ar",
        "Basque" => "eu",
        "Bengali" => "bn",
        "Bulgarian" => "bg",
        "Catalan" => "ca",
        "Chinese (Hong Kong)" => "zh-HK",
        "Chinese (Simplified)" => "zh-CN",
        "Chinese (Traditional)" => "Chinese (Traditional)",
        "Croatian" => "hr",
        "Czech" => "cs",
        "Danish" => "da",
        "Dutch" => "nl",
        "English (UK)" => "en-GB",
        "English (US)" => "	en-US",
        "Estonian" => "et",
        "Filipino" => "fil",
        "Finnish" => "fi",
        "French" => "fr",
        "French (Canadian)" => "fr-CA",
        "Galician" => "","gl",
        "German" => "de",
        "Greek" => "el",
        "Gujarati" => "gu",
        "Hebrew" => "iw",
        "Hindi" => "hi" ,
        "Hungarian" => "hu",
        "Icelandic" => "is",
        "Indonesian" => "id",
        "Italian" => "it",
        "Japanese" => "ja",
        "Kannada" => "kn",
        "Korean" => "ko",
        "Latvian" => "lv",
        "Lithuanian" => "lt",
        "Malay" => "ms",
        "Malayalam" => "ml",
        "Marathi" => "mr",
        "Persian" => "fa",
        "Polish" => "pl",
        "Portuguese (Brazil)" => "pt-BR",
        "Portuguese (Portugal)" => "pt-PT",
        "Romanian" => "ro",
        "Russian" => "ru",
        "Serbian" => "sr",
        "Slovak" => "sk",
        "Slovenian" => "sl",
        "Spanish" => "es",
        "Spanish (Latin America)" => "es-419",
        "Swahili" => "sw",
        "Swedish" => "sv" ,
        "Tamil" => "ta",
        "Telugu" => "te",
        "Thai" => "th",
        "Turkish" => "tr",
        "Ukrainian" => "uk",
        "Urdu" => "ur",
        "Vietnamese" => "vi",
        "Zulu" => "zu" ];

    //alias => Sign for transfer
    $arrayType = array();


    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['searchQuery','accessToken']);
    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $postData = $validateRes;
    }


    $url = "https://www.googleapis.com/plus/v1/people/";

    //Change alias and formatted array
    foreach($option as $alias => $value)
    {

        if(!empty($postData['args'][$alias]))
        {

            if(isset($arrayType[$alias]))
            {
                $postData['args'][$alias] = implode($arrayType[$alias],$postData['args'][$alias]);
            }

            $queryParam[$value] = $postData['args'][$alias];
        }
    }




    $client = $this->httpClient;

    if(!empty($queryParam['language']))
    {
        $queryParam['language'] = $languageArr[$queryParam['language']];
    }



    if(!empty($queryParam['prettyPrint']) && $queryParam['prettyPrint'] == 'false')
    {
        $queryParam['prettyPrint'] = false;
    } else {
        $queryParam['prettyPrint'] = true;
    }

    try {

        $resp =  $client->request('GET', $url ,['query' => $queryParam ] );



        if(in_array($resp->getStatusCode(), ['200', '201', '202', '203', '204'])) {

            $dataBody = $resp->getBody()->getContents();

            $result['callback'] = 'success';
            $result['contextWrites']['to'] = array('result' => json_decode($dataBody) );




        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = $resp->getBody()->getContents();
        }
    } catch (\GuzzleHttp\Exception\ClientException $exception) {
        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;
    } catch (GuzzleHttp\Exception\ServerException $exception) {
        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;
    } catch (GuzzleHttp\Exception\ConnectException $exception) {
        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';
    }
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);


});
