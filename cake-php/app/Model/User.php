<?php
	class User extends AppModel{
		public function beforeSave($options=array()){
			// hash our password
			if (isset($this->data[$this->alias]['password'])) {
				 $this->data[$this->alias]['password'] = Security::rijndael($this->data[$this->alias]['password'], Configure::read('Security.salt'), 'encrypt');
 			}
			// fallback to our parent
			return parent::beforeSave($options);
		}
		public function afterFind($results, $primary = false) {
		 
		 // Decrypt private user data e.g. email and phone numbers
		 foreach ($results as $key => $value){ 
			 if(!empty($value[$this->alias]['password'])){
			 	$results[$key][$this->alias]['password'] = Security::rijndael($value[$this->alias]['password'], Configure::read('Security.salt'),'decrypt');
			 }
		 }
		 
		 return $results;
		 
		}
	}
?>