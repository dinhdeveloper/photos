<?php 

	namespace app\widgets;

	use yii\base\Widget;
	use Yii\helpers\Html;

	class headerdetailWidget extends Widget{

		public $message;

		public function init(){
			parent::init();
		}

		public function run(){			
			return $this->render('headerdetailWidget');
		}
	}

?>