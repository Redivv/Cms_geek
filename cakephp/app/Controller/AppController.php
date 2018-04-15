<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

  public $uses = array(
		'Settings',
    'Photos'
	);

  public function beforeFilter(){
    $app['Settings']=$this->get_settings();
    $this->set('app',$app);
  }
  public function get_settings(){
    $tmp=$this->Settings->find('all');
    foreach($tmp as $k=>$v){
      $return[$v['Settings']['id']]=$v['Settings']['value'];
    }
    return $return;
  }
  public function get_photo($id=0){
    $return='';
    if($id>0){
      $tmp=$this->Photos->find('first',array(
        'conditions'=>array(
          'Photos.id'=>$id
        )
      ));
      if($tmp){
        //var_dump($tmp['Photos']); die();
        $return='/upload/'.$tmp['Photos']['hash'].'.'.$tmp['Photos']['ext'];
      }
    }
    return $return;
  }
}
