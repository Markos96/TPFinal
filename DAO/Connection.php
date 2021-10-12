<?php namespace DAO;

	use Models\Enterprise as Enterprise;
	use DAO\IEnterprise as IEnterprise;

	class Connection{

			//public static $fileName = dirname(__DIR__)."/Data/enterprise.json";

			public static function getDataApi($url){

				$curl = curl_init();

				curl_setopt($curl,CURLOPT_URL,'https://utn-students-api.herokuapp.com/api/'.$url);
				curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
				curl_setopt($curl,CURLOPT_HTTPHEADER,array('x-api-key: 4f3bceed-50ba-4461-a910-518598664c08'));

				$data = curl_exec($curl);

				curl_close($curl);

				return json_decode($data,true);

			}


			public static function getDataJson(){
				
				$enterpriseList = array();



				if(file_exists(fileName))
				{

					$jsonContent = file_get_contents(fileName);

					$arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

					foreach($arrayToDecode as $newArray)
                {
                    $enterprise = new Enterprise();
                    $enterprise->setId($newArray["id"]);
                    $enterprise->setFirstName($newArray["firstName"]);
                    $enterprise->setDescription($newArray["description"]);
                    $enterprise->setIsActive($newArray["isActive"]);

                    array_push($enterpriseList, $enterprise);
                }					

				}

				return $enterpriseList;


			}


	}
