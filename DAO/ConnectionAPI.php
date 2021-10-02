<?php namespace DAO;

	use Models\Enterprise as Enterprise;
	use DAO\IEnterprise as IEnterprise;

	class ConnectionAPI{


			public static function getDataApi($url){

				$curl = curl_init();

				curl_setopt($curl,CURLOPT_URL,'https://utn-students-api.herokuapp.com/api/',$url);
				curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
				curl_setopt($curl,HTTPHEADER,array('x-api-key: 4f3bceed-50ba-4461-a910-518598664c08'));

				$data = curl_exec($curl);

				curl_close($curl);

				return json_decode($data,true);

			}


			public static function getDataJson(){
				
				$this->enterpriseList = array();

				if(file_exists($this->fileName))
				{

					$jsonContent = file_get_contents($this->fileName);

					$arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

					foreach($arrayToDecode as $newArray)
                {
                    $enterprise = new Enterprise();
                    $enterprise->setRecordId($newArray["id"]);
                    $enterprise->setFirstName($newArray["firstName"]);
                    $enterprise->setLastName($newArray["description"]);

                    array_push($this->enterpriseList, $enterprise);
                }					

				}




			}


	}



?>