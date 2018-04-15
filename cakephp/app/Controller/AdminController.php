<?php

App::uses('AppController', 'Controller');

class AdminController extends AppController {

	public $uses = array(
		'News',					// tabela
		'Settings',
		'Contacts'
	);

	public function beforeFilter(){			// wykonuje się zawsze bez względu na stronę Sites na którą wejdziemy
		parent::beforeFilter();			// oznacza beforeFilter w AppController jako rodzica
		$dupa='kurka';
		$this->layout='cms';
		$this->set('common',$dupa);
	}

	public function index() {
		$this->layout='login';						// zmienia domyślny layout na login
	}

	public function dashboard(){
		$element=$tmp_element=array();

		// START dodawanie/edycja value
		if($this->request->is('post')){				// to samo co ifisset $_POST
			$data=$this->data;
			foreach ($data['Settings'] as $k => $v) {		// inna forma zapisu do tabeli
				$this->Settings->read(null,$k);			// sczytuje wybraną pozycje w tabeli ($key czyli np. value)
				$this->Settings->set('value',$v['value']);
				$this->Settings->save();
			}
			$this->Session->setFlash('Zapisano');
			$this->redirect(array('action'=>'dashboard'));
			//$this->Settings->save($data['Settings']);				// zapisuje dane za pomocą modelu do tabeli Settings PO INDEKSACH W TABLICY DATA (save rozpoznaje czy UPDATE czy INSERT)
		}
		// END dodawanie value
		$this->set('element',$element);

	}

	private function dupcia($data=''){					// funkcja do zatrzymania programu i wypisania danych
		echo '<pre>';
		var_dump($data);
		echo '</pre>';
		die();

	}

	public function news(){
		$element=$tmp_element=array();
		$tmp_element['News']=$this->News->find(				// poszukaj w modelu news wspisów - (ile, jakie restrykcje) i zapisz do tmp Właściwie zapytanie SQL
				'all',			// wszystkie
				array(			// warunki (odpowiednik WHERE)
					'conditions'=>array(				// warunki MUSI BYĆ CONDITIONS
					'News.active'=>1			// newsy o active = 1
				),
				'fields'=>array(					// jakie pola ma pobrać MUSI BYĆ FIELDS
					'News.id',
					'News.title',
					'News.created',
					'News.hidden'
				)
			)
		);
		$element['News']=array();					// tworzy pustą tablicę News jeżeli nie ma żadnych w bazie
		foreach ($tmp_element['News'] as $key => $value) {				// pętla foreach do zapisywania newsów
			$pom=array(
				'id'=>$value['News']['id'],
				'title'=>$value['News']['title'],
				'created'=>$value['News']['created'],
				'hidden'=>$value['News']['hidden'],
			);
			if(!trim($pom['title'])){			// jeżeli nie ma tytułu to uzupełnia go brakiem
				$pom['title']='<b>BRAK TYTUŁU</b>';
			}
			$element['News'][]=$pom;					// zapisuje newsy w zmiennej element
		}

		$this->set('element',$element);
	}
	public function upload_photo($tmp_arr){
		//$this->dupcia($tmp_arr);
		$tmp_file=$tmp_arr['tmp_name'];
		$return=null;
		$upload_valid_ext=array('image/jpeg','image/bmp');					// dopuszczalne rozszerzenia wysyłanego pliku
		if(in_array($tmp_arr['type'],$upload_valid_ext))				// Sprawdzam czy mam fote
			if(is_uploaded_file($tmp_file)){				// Sprawdzam czy tymczasowa fota istnieje
				$explode_arr=explode('.',$tmp_arr['name']);

				$ext=count($explode_arr)-1;
				$ext=$explode_arr[$ext];
				$ext=strtolower($ext);
				$hash=time().rand(1,999999);
				$file=$hash.'.'.$ext;

				$path=WWW_ROOT.'upload/'.$file;											// stała z cake pokazująca główny nadkatalog Cake-a

				move_uploaded_file($tmp_file,$path);						// przenosi wysłany plik do wybranego folderu

				$photo=array(
					'id'		=>	0,
					'hash'	=>	$hash,
					'ext'		=>	$ext,
					'org'		=>	$tmp_arr['name'],
					'size'	=>	$tmp_arr['size']
				);
				$this->Photos->save($photo);
				$return=$this->Photos->id;
			}
		return $return;
	}

	public function news_edit($id=0){					// parametry są przekazywane po slashu
		$element=$tmp_element=array();

		// START dodawanie/edycja newsów
		if($this->request->is('post')){				// to samo co ifisset $_POST
			$data=$this->data;
			$ret=$this->upload_photo($data['News']['Photo']);
			if($ret){$data['News']['photo_id']=$ret;}
			$this->News->save($data['News']);				// zapisuje dane do tabeli News PO INDEKSACH W TABELI DATA (save rozpoznaje czy UPDATE czy INSERT)

			$this->Session->setFlash('Dane zapisane');			// ustawia jednorazową wiadomość
			$this->redirect(array('action' => 'news'));				// przekierowuje stronę (funkcje/action) na news
		}
		// END dodawanie newsów
		$element['News']=array(				// każdy element news to taka tablica
			'id'=>$id,
			'title'=>'',
			'description'=>'',
			'Photo'=>''
		);
		// START wpisanie treści newsa
		if($id>0){
			$tmp_element['News']=$this->News->find('first',array(
				'conditions'=>array(
					'News.id'=>$id,
					'News.active'=>1
				)
			));
			if(!$tmp_element['News']){
				$this->Session->setFlash('Nie znaleziono');
				$this->redirect(array('action'=>'news'));
			}else{
				$element['News']['title']=$tmp_element['News']['News']['title'];
				$element['News']['description']=$tmp_element['News']['News']['description'];
				$element['News']['Photo']=$this->get_photo($tmp_element['News']['News']['photo_id']);
			}
		}
		// END wpisanie treści newsa
		$this->set('element',$element);
	}

	public function contacts(){
		$element=$tmp_element=array();

		$tmp_element=$this->Contacts->find('all',array(
			'conditions'=>array(
				'Contacts.active'=>1
			),
			'order'=>array(
				'Contacts.id'=>'desc'
			)
		));
		$element['Contacts']=array();
		foreach ($tmp_element as $k => $v) {
			$pom=array(
				'id'			=>	$v['Contacts']['id'],
				'name' 		=>	$v['Contacts']['name'],
				'email' 	=> 	$v['Contacts']['mail'],
				'message' => 	$v['Contacts']['message']
			);
			if (!trim($pom['name'])) {
				$pom['name']='<b>Gal Anonim</b>';
			}
			$element['Contacts'][]=$pom;
		}
		$this->set('element',$element);
	}

	public function delete_contact($id=0){
		$this->autoRender=false;
		$this->Contacts->read(null,$id);
		$this->Contacts->set('active',0);
		$this->Contacts->save();

		$this->Session->setFlash('Usunięto');
		$this->redirect(array('action'=>'contacts'));
	}












}
