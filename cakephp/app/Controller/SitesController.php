<?php

App::uses('AppController', 'Controller');

class SitesController extends AppController {

	public $uses = array(
		'News',
		'Contacts'
	);

	public function beforeFilter()			// wykonuje się zawsze bez względu na stronę Sites na którą wejdziemy
	{
		parent::beforeFilter();  //   uznaje beforeFilter w AppController jako rodzica
		$dupa='jeżyk';

		$this->set('common',$dupa);
	}

	public function index() {
		$element=$tmp_element=array();
		$element['helper']['menu']='index';

		$this->set('element',$element);						// wysyła do widoku element pod nazwą 'element' z zawartością $element
	}

	public function about(){
		$element=$tmp_element=array();
		$element['helper']['menu']='about';

		$this->set('element',$element);
	}

	public function news(){
		$element=$tmp_element=array();
		$element['helper']['menu']="news";

		// START pobieranie newsów
		$tmp_element['News']=$this->News->find(				// poszukaj w modelu news wspisów - (ile, jakie restrykcje) i zapisz do tmp Właściwie zapytanie SQL
				'all',			// wszystkie
				array(			// warunki (odpowiednik WHERE)
					'conditions'=>array(				// warunki MUSI BYĆ CONDITIONS
					'News.active'=>1,			// newsy o active = 1
					'News.hidden'=>0
				),
				'fields'=>array(					// jakie pola ma pobrać MUSI BYĆ FIELDS
					'News.id',
					'News.title',
					'News.Photo_id'
				),
				'order'=>array(			// order by
					'News.id'=>'desc'
				)
			)
		);
		$element['News']=array();					// tworzy pustą tablicę News jeżeli nie ma żadnych w bazie
		foreach ($tmp_element['News'] as $key => $value) {				// pętla foreach do zapisywania newsów
			$pom=array(
				'id'=>$value['News']['id'],
				'title'=>$value['News']['title']
			);
			if(!trim($pom['title'])){			// jeżeli nie ma tytułu to uzupełnia go brakiem
				$pom['title']='<b>BRAK TYTUŁU</b>';
			}
			$element['News'][]=$pom;					// zapisuje newsy w zmiennej element
		}
		// END pobieranie newsów

		$this->set('element',$element);
	}

	public function news_view($id=0){				// parametr w funkcji to wartości po slashu w adresie
		$element=$tmp_element=array();
		$element['helper']['menu']='news';

		$tmp_element['News']=$this->News->find('first',array(			// warunki (odpowiednik WHERE)
					'conditions'=>array(				// warunki MUSI BYĆ CONDITIONS
						'News.id'=>$id,
						'News.active'=>1,			// newsy o active = 1
						'News.hidden'=>0
					)
				));
				if($tmp_element['News']){
					//znalazło newsa
					$element['News']=array(
						'title'=>$tmp_element['News']['News']['title'],
						'description'=>$tmp_element['News']['News']['description'],
						'Photo'=>$this->get_photo($tmp_element['News']['News']['photo_id'])
					);
				}else {
					// ni ma
					$this->Session->setFlash('Nie znaleziono');			// ustawia jednorazową wiadomośc
					$this->redirect(array('action' => 'news'));			// przekierowuje na news
				}

		$this->set('element',$element);
	}
	public function contact(){
		$element=$tmp_element=array();
		$element['helper']['menu']='contact';

		if($this->request->is('post')){				// to samo co ifisset $_POST
			$data=$this->data;

			$this->Contacts->save($data['Dupa']);				// zapisuje dane do tabeli Contacts PO INDEKSACH W TABELI DATA (save rozpoznaje czy UPDATE czy INSERT)
			$this->Session->setFlash('Dziękuje za wysłanie wiadomości');			// ustawia jednorazową wiadomość
			$this->redirect(array('action' => 'contact'));				// przekierowuje stronę (funkcje/action) na contact
		}
		$this->set('element',$element);
	}
}
