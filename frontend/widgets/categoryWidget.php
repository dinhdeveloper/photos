<?php 

	namespace app\widgets;

	use yii\base\Widget;
	use Yii\helpers\Html;

	class categoryWidget extends Widget{

		public $message;

		public function init(){
			parent::init();
		}

		public function run(){			
			return $this->render('categoryWidget');
		}
	}

 ?>