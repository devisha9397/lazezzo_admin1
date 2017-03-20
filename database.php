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
		$res=mysqli_query($con,"select review.*,u.*,r.* from restaurant_tbl as r,review_tbl as review,user_tbl as u where u.user_email=review.fk_user_email and review.fk_rest_id=r.rest_id and r.rest_id='$restid' order by review_date");
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
		$res=mysqli_query($con,"select r.*,c.*,o.* from restaurant_tbl as r,category_tbl as c,restowner_tbl as o where r.fk_cat_id=c.cat_id and o.fk_rest_id=r.rest_id  and  r.rest_id='$restid'");
		return $res;
		database::disconnect();

	}	
	
	public function getOrderCount($flag,$restid)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select count(order_id)'cnt'from order_tbl where flag='$flag' and fk_rest_id='$restid'");
		return $res;
		database::disconnect();

	}
	
	public function getallbooktablesbyrestid($id)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select b.*,u.*,r.* from restaurant_tbl as r,booktable_tbl as b,user_tbl as u where u.user_email=b.fk_user_email and b.fk_rest_id=r.rest_id and r.rest_id='$id'");
		return $res;
		database::disconnect();
	}

	public function getallbooktablesbyflag($id)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select b.*,u.*,r.* from restaurant_tbl as r,booktable_tbl as b,user_tbl as u where u.user_email=b.fk_user_email and b.fk_rest_id=r.rest_id and b.flag=0  and r.rest_id='$id' ");
		return $res;
		database::disconnect();
	}
	
	public function booktableApprove($table_id)
	{		$con=database::connect();
			$res=mysqli_query($con,"update booktable_tbl set flag='1' where table_id='$table_id'");
			return $res;
			database::disconnect();
	}
	public function booktableDisApprove($table_id)
	{
			
			$con=database::connect();
			$res=mysqli_query($con,"update booktable_tbl set flag='2' where table_id='$table_id'");
			return $res;
			database::disconnect();
	
	}
	
	public function getBooktableCount($flag,$restid)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select count(table_id)'cnt'from booktable_tbl where flag='$flag' and fk_rest_id='$restid'");
		return $res;
		database::disconnect();

	}
	
	public function getfavCount($flag,$restid)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select count(fav_id)'cnt'from fav_tbl where flag='$flag' and fk_rest_id='$restid'");
		return $res;
		database::disconnect();

	}
	
	public function getrestownerDetail($owner_email)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select * from restowner_tbl where owner_email='$owner_email'");
		return $res;
		database::disconnect();

	}	
	public function restowneredit($email,$rest_owner_name,$owner_mob_no,$owner_image)
	{
		$con=database::connect();
		$res=mysqli_query($con,"update restowner_tbl set owner_email='$email',rest_owner_name='$rest_owner_name',owner_mob_no='$owner_mob_no',owner_image='$owner_image' where owner_email='$email'");
		return $res;
		database::disconnect();

	}
	
	public function getallcategories()
	{
		$con=database::connect();
		$res=mysqli_query($con,"select * from category_tbl");
		return $res;
		database::disconnect();

	}
	
	public function restdetailEdit($restid,$cuisine,$rest_name,$area,$rest_add,$pincode,$rest_number,$rest_email,$opening_status,$rest_image1,$cost,$highlights)
	{
		$con=database::connect();
		$res=mysqli_query($con,"update restaurant_tbl set fk_cat_id='$cuisine',rest_name='$rest_name',area='$area',rest_add='$rest_add',pincode='$pincode',rest_number='$rest_number',rest_email='$rest_email',opening_status='$opening_status',rest_image='$rest_image1',cost='$cost',highlights='$highlights' where rest_id='$restid'");
		return $res;
		database::disconnect();
	}
	
	public function addmenuItem($item_id,$fk_rest_id,$item_name,$item_price)
	{
			$con=database::connect();
			$res=mysqli_query($con,"insert into menuitem_tbl values('$item_id','$fk_rest_id','$item_name','$item_price')");
			return $res;
			database::disconnect();
	}
	
	public function getAllMenuitem($restid)
	{
			$con=database::connect();
			$res=mysqli_query($con,"select * from menuitem_tbl where fk_rest_id='$restid'");
			return $res;
			database::disconnect();
	}
	
	public function getmenuitemDetail($item_id)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select * from menuitem_tbl where item_id='$item_id'");
		return $res;
		database::disconnect();

	}
	
	public function MenuitemEdit($item_id,$restid,$item_name,$item_price)
	{
		$con=database::connect();
		$res=mysqli_query($con,"update menuitem_tbl set fk_rest_id='$restid',item_name='$item_name',item_price='$item_price' where item_id='$item_id' ");
		return $res;			
		database::disconnect();
	}
	
	public function menuitemDel($item_id)
	{
		$con=database::connect();
		$res=mysqli_query($con,"delete from menuitem_tbl where item_id='$item_id'");
		return $res;
		database::disconnect();
	}
	
	public function getfkuseremailbyOrderid($order_id)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select o.*,r.* from order_tbl as o,restaurant_tbl as r where  o.fk_rest_id=r.rest_id  and order_id='$order_id'");
		return $res;
		database::disconnect();

	}
	
	public function getfkuseremailbyBooktableid($table_id)
	{
		
		$con=database::connect();
		$res=mysqli_query($con,"select b.*,r.* from booktable_tbl as b,restaurant_tbl as r where  b.fk_rest_id=r.rest_id  and table_id='$table_id'");
		return $res;
		database::disconnect();

	}
	
}

?>