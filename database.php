<?php
class database
{
	private static $host='localhost';
	private static $uname='root';
	private static $pwd='';
	private static $con=NULL;
	
	public static function connect()
	{
		self::$con=mysqli_connect(self::$host,self::$uname,self::$pwd,"lazeezo");
		
		return self::$con;
	}
	
	public function getallordersbyrestid($id)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select o.*,u.*,m.*,r.* from restaurant_tbl as r,order_tbl as o,user_tbl as u,menuitem_tbl as m where m.item_id=o.fk_item_id and u.user_email=o.fk_user_email and o.fk_rest_id=r.rest_id and r.rest_id='$id'");
		return $res;
		database::disconnect();
	}
	
	
	public function getresrownerdetailbyid($id)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select * from restowner_tbl where owner_email='$id'");
		return $res;
		database::disconnect();
	}
	
	
	public function getallordersbyflag($id)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select o.*,u.*,m.*,r.* from restaurant_tbl as r,order_tbl as o,user_tbl as u,menuitem_tbl as m where m.item_id=o.fk_item_id and u.user_email=o.fk_user_email and o.fk_rest_id=r.rest_id and o.flag=0 and r.rest_id='$id' ");
		return $res;
		database::disconnect();
	}

		public function getallapprovedordersbyflag($id)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select o.*,u.*,m.*,r.* from restaurant_tbl as r,order_tbl as o,user_tbl as u,menuitem_tbl as m where m.item_id=o.fk_item_id and u.user_email=o.fk_user_email and o.fk_rest_id=r.rest_id and o.flag=1 and r.rest_id='$id' ");
		return $res;
		database::disconnect();
	}


	public function orderApprove($order_id)
	{		$con=database::connect();
			$res=mysqli_query($con,"update order_tbl set flag='1' where order_id='$order_id'");
			return $res;
			database::disconnect();
	}
	
	public function orderDisApprove($order_id)
	{
			
			$con=database::connect();
			$res=mysqli_query($con,"update order_tbl set flag='2' where order_id='$order_id'");
			return $res;
			database::disconnect();
	
	}	
	
	public function getAllOrderByDisApproved($restid)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select o.*,u.*,m.*,r.* from restaurant_tbl as r,order_tbl as o,user_tbl as u,menuitem_tbl as m where m.item_id=o.fk_item_id and u.user_email=o.fk_user_email and o.fk_rest_id=r.rest_id and o.flag=2 and r.rest_id='$restid' ");
		return $res;
		database::disconnect();
	}
	
	
	public function orderdel($order_id)
	{
		$con=database::connect();
			$res=mysqli_query($con,"delete from order_tbl where order_id='$order_id'");
			return $res;
			database::disconnect();
	}
	
	
	public function addOffer($discount_id,$fk_rest_id,$discount_desc,$restid)
	{
		$con=database::connect();
			$res=mysqli_query($con,"insert into discount_tbl values('$discount_id','$fk_rest_id','$discount_desc')");
			return $res;
			database::disconnect();
		
		
	}
	
	
	
	public function getAllOffers($restid)
	{
			$con=database::connect();
			$res=mysqli_query($con,"select * from discount_tbl where fk_rest_id='$restid'");
			return $res;
			database::disconnect();
		
	}
	
	public function offerDel($discount_id)
	{
		$con=database::connect();
			$res=mysqli_query($con,"delete from discount_tbl where discount_id='$discount_id'");
			return $res;
			database::disconnect();
	}
	
	public function offerEdit1($discount_id)
	{
	
			$con=database::connect();
			$res=mysqli_query($con,"select * from discount_tbl where discount_id='$discount_id'");
			return $res;
			database::disconnect();
	}
	public function OfferEdit($discount_id,$restid,$discount_desc)
	{
		$con=database::connect();
		$res=mysqli_query($con,"update discount_tbl set fk_rest_id='$restid',discount_desc='$discount_desc' where discount_id='$discount_id' ");
		return $res;			
		database::disconnect();
	
	}
	public function getallmenuphotos($restid)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select * from menuphoto_tbl where fk_rest_id='$restid'");
		return $res;
		database::disconnect();
	}
	
	public function menuphotoDel($menuid)
	{
		$con=database::connect();
		$res=mysqli_query($con,"delete from menuphoto_tbl where menu_id='$menuid'");
		return $res;
		database::disconnect();
	}
	
	public function addMenuphoto($menu_id,$menupic_path,$restid)
	{
		$con=database::connect();
			$res=mysqli_query($con,"insert into menuphoto_tbl values('$menu_id','$menupic_path','$restid')");
			return $res;
			database::disconnect();
	}
	
	public function getallotherphotos($restid)
	{
		$con=database::connect();
			$res=mysqli_query($con,"select * from otherphoto_tbl where fk_rest_id='$restid'");
			return $res;
			database::disconnect();
	}
	
	public function otherphotoDel($other_id)
	{
		$con=database::connect();
		$res=mysqli_query($con,"delete from otherphoto_tbl where other_id='$other_id'");
		return $res;
		database::disconnect();
	}
	
	public function addOtherphoto($other_id,$otherpic_path,$restid)
	{
		$con=database::connect();
			$res=mysqli_query($con,"insert into otherphoto_tbl values('$other_id','$otherpic_path','$restid')");
			return $res;
			database::disconnect();
	}
	
	public function getallReviews($restid)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select review.*,u.*,r.* from restaurant_tbl as r,review_tbl as review,user_tbl as u where u.user_email=review.fk_user_email and review.fk_rest_id=r.rest_id and r.rest_id='$restid'");
		return $res;
		database::disconnect();
		
	}
	
	public function reviewDel($review_id)
	{
		$con=database::connect();
		$res=mysqli_query($con,"delete from review_tbl where review_id='$review_id'");
		return $res;
		database::disconnect();

	}

	public function getrestDetail($restid)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select * from restaurant_tbl where rest_id='$restid'");
		return $res;
		database::disconnect();

	}	
	
	
	
	/*
	public function getAllUsersAndCity()
	{		$con=database::connect();
			$res=mysql_query("select c.*,u.* from user_tbl as u,city_tbl as c where u.fk_city_id=c.pk_city_id",$con);
			return $res;
			database::disconnect();
	}
	
	*/
	

}

?>