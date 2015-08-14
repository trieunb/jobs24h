<?php
	/**
	* 
	*/
	class ThongkeTrainingController extends Controller
	{
		
		function __construct()
		{
			# code...
		}


		function getStatisticCource()
		{
			$total=Training::get()->count();
			var_dump($total);
			die();
		}

		function getStatisticDoc()
		{
			$total=TrainingDocument::get()->count();
			var_dump($total);
			$total_dowload=TrainingDocument::sum('download');
			var_dump($total_dowload);
			die();
		}
	}
 ?>