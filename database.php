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
		$res=mysqli_query($con,"select o.*,u.*,s.*,r.* from restaurant_tbl as r,order_tbl as o,user_tbl as u,subcui_tbl as s where s.subcui_id=o.fk_subcui_id and u.user_email=o.fk_user_email and o.fk_rest_id=r.rest_id and r.rest_id='$id'");
		return $res;
		database::disconnect();
	}
	public function getallordersbyrestid1($id,$page)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select o.*,u.*,s.*,r.* from restaurant_tbl as r,order_tbl as o,user_tbl as u,subcui_tbl as s where s.subcui_id=o.fk_subcui_id and u.user_email=o.fk_user_email and o.fk_rest_id=r.rest_id and r.rest_id='$id' LIMIT {$page}, 6");
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
		$res=mysqli_query($con,"select o.*,u.*,s.*,r.* from restaurant_tbl as r,order_tbl as o,user_tbl as u,subcui_tbl as s where s.subcui_id=o.fk_subcui_id and u.user_email=o.fk_user_email and o.fk_rest_id=r.rest_id and o.flag=0 and r.rest_id='$id' ");
		return $res;
		database::disconnect();
	}
	public function getallordersbyflag1($id,$page,$noi)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select o.*,u.*,s.*,r.* from restaurant_tbl as r,order_tbl as o,user_tbl as u,subcui_tbl as s where s.subcui_id=o.fk_subcui_id and u.user_email=o.fk_user_email and o.fk_rest_id=r.rest_id and o.flag=0 and r.rest_id='$id' order by date_of_order desc LIMIT {$page},{$noi} ");
		return $res;
		database::disconnect();
	}

		public function getallapprovedordersbyflag($id)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select o.*,u.*,s.*,r.* from restaurant_tbl as r,order_tbl as o,user_tbl as u,subcui_tbl as s where s.subcui_id=o.fk_subcui_id and u.user_email=o.fk_user_email and o.fk_rest_id=r.rest_id and o.flag=1 and r.rest_id='$id' ");
		return $res;
		database::disconnect();
	}
		public function getallapprovedordersbyflag1($id,$page,$noi)
		{
		$con=database::connect();
		$res=mysqli_query($con,"select o.*,u.*,s.*,r.* from restaurant_tbl as r,order_tbl as o,user_tbl as u,subcui_tbl as s where s.subcui_id=o.fk_subcui_id and u.user_email=o.fk_user_email and o.fk_rest_id=r.rest_id and o.flag=1 and r.rest_id='$id' order by date_of_order desc LIMIT {$page},{$noi}");
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
		$res=mysqli_query($con,"select o.*,u.*,s.*,r.* from restaurant_tbl as r,order_tbl as o,user_tbl as u,subcui_tbl as s where s.subcui_id=o.fk_subcui_id and u.user_email=o.fk_user_email and o.fk_rest_id=r.rest_id and o.flag=2 and r.rest_id='$restid' ");
		return $res;
		database::disconnect();
	}
	public function getAllOrderByDisApproved1($restid,$page,$noi)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select o.*,u.*,s.*,r.* from restaurant_tbl as r,order_tbl as o,user_tbl as u,subcui_tbl as s where s.subcui_id=o.fk_subcui_id and u.user_email=o.fk_user_email and o.fk_rest_id=r.rest_id and o.flag=2 and r.rest_id='$restid' order by date_of_order desc LIMIT {$page},{$noi}");
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
	public function bookdel($table_id)
	{
			$con=database::connect();
			$res=mysqli_query($con,"delete from booktable_tbl where table_id='$table_id'");
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
	public function getAllOffers1($restid,$page,$noi)
	{
			$con=database::connect();
			$res=mysqli_query($con,"select * from discount_tbl where fk_rest_id='$restid' LIMIT {$page},{$noi}");
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
	public function getallmenuphotos1($restid,$page,$noi)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select * from menuphoto_tbl where fk_rest_id='$restid' LIMIT {$page},{$noi}");
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
	public function getallotherphotos1($restid,$page,$noi)
	{
			$con=database::connect();
			$res=mysqli_query($con,"select * from otherphoto_tbl where fk_rest_id='$restid' LIMIT {$page},{$noi}");
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
	public function getallReviews1($restid,$page,$noi)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select review.*,u.*,r.* from restaurant_tbl as r,review_tbl as review,user_tbl as u where u.user_email=review.fk_user_email and review.fk_rest_id=r.rest_id and r.rest_id='$restid' order by review_date desc  LIMIT  {$page},{$noi}");
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
	public function getallbooktablesbyrestid1($id,$page,$noi)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select b.*,u.*,r.* from restaurant_tbl as r,booktable_tbl as b,user_tbl as u where u.user_email=b.fk_user_email and b.fk_rest_id=r.rest_id and r.rest_id='$id' order by date desc LIMIT {$page},{$noi}");
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
	public function getallbooktablesbyflag1($id,$page,$noi)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select b.*,u.*,r.* from restaurant_tbl as r,booktable_tbl as b,user_tbl as u where u.user_email=b.fk_user_email and b.fk_rest_id=r.rest_id and b.flag=0  and r.rest_id='$id' order by  time LIMIT {$page},{$noi} ");
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
	
	public function addsubcui($subcui_id,$cat,$key,$value,$restid)
	{
			$con=database::connect();
			$res=mysqli_query($con,"insert into subcui_tbl values('$subcui_id','$cat','$key','$value','$restid')");
			return $res;
			database::disconnect();
	}
	
	public function getAllSubcui($restid)
	{
			$con=database::connect();
			$res=mysqli_query($con,"select * from subcui_tbl where fk_rest_id='$restid'");
			return $res;
			database::disconnect();
	}
	
	
	public function getAllSubcui1($restid,$page)
	{
			$con=database::connect();
			$res=mysqli_query($con,"select * from subcui_tbl where fk_rest_id='$restid' LIMIT {$page}, 10");
			return $res;
			database::disconnect();
	}
	
	public function getmenuitemDetail($item_id)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select * from subcui_tbl where subcui_id='$item_id'");
		return $res;
		database::disconnect();

	}
	
	public function MenuitemEdit($item_id,$item_name,$item_price)
	{
		$con=database::connect();
		$res=mysqli_query($con,"update subcui_tbl set subcui_name='$item_name',subcui_price='$item_price' where subcui_id='$item_id' ");
		return $res;			
		database::disconnect();
	}
	
	public function menuitemDel($item_id)
	{
		$con=database::connect();
		$res=mysqli_query($con,"delete from subcui_tbl where subcui_id='$item_id'");
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
	
	public function getallsubcusines($restid)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select * from cusine_tbl where fk_rest_id='$restid'");
		return $res;
		database::disconnect();

	}
	
	public function getDOB()
	{
		$con=database::connect();
		$res=mysqli_query($con,"select * from user_tbl");
		return $res;
		database::disconnect();

	}
	public function getrestnamebyrestid($restid)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select * from restaurant_tbl where rest_id='$restid'");
		return $res;
		database::disconnect();

	}
	public function searchmenuitem($restid,$term)
	{
			$con=database::connect();
			$res=mysqli_query($con,"select * from subcui_tbl where fk_rest_id='$restid' and  subcui_name LIKE '%".$term."%'");
			return $res;
			database::disconnect();
	}
	public function getAllfamousfood($restid)
	{
			$con=database::connect();
			$res=mysqli_query($con,"select f.*,r.*,s.* from famous_tbl as f,restaurant_tbl as r,subcui_tbl as s where f.fk_rest_id=r.rest_id and f.fk_subcui_id=s.subcui_id and f.fk_rest_id='$restid'");
			return $res;
			database::disconnect();
	}
	public function famousdel($famous_id)
	{
			$con=database::connect();
			$res=mysqli_query($con,"delete from famous_tbl where famous_id='$famous_id'");
			return $res;
			database::disconnect();
	}
	public function getallsubcuisine($restid)
	{
			$con=database::connect();
			$res=mysqli_query($con,"select * from subcui_tbl where fk_rest_id='$restid'");
			return $res;
			database::disconnect();
	}
	
	public function getallapprovedbooktablesflag($id)
	{
			$con=database::connect();
			$res=mysqli_query($con,"select b.*,u.*,r.* from restaurant_tbl as r,booktable_tbl as b,user_tbl as u where u.user_email=b.fk_user_email and b.fk_rest_id=r.rest_id and r.rest_id='$id' and b.flag='1'");
			return $res;
			database::disconnect();
	}
	public function getallapprovedbooktablesflag1($id,$page1,$noi)
	{
			$con=database::connect();
			$res=mysqli_query($con,"select b.*,u.*,r.* from restaurant_tbl as r,booktable_tbl as b,user_tbl as u where u.user_email=b.fk_user_email and b.fk_rest_id=r.rest_id and r.rest_id='$id' and b.flag='1' order by date desc LIMIT {$page1},{$noi}");
			return $res;
			database::disconnect();
	}
	
	public function addfamousfood($famous_id,$restid,$uid)
	{
		$con=database::connect();
			$res=mysqli_query($con,"insert into famous_tbl values('$famous_id','$restid','$uid')");
			return $res;
			database::disconnect();
	}
	public function getmenuphotodetail($menuid)
	{
			$con=database::connect();
			$res=mysqli_query($con,"select * from menuphoto_tbl where menu_id='$menuid'");
			return $res;
			database::disconnect();
	}
	
	public function getotherphotodetail($other_id)
	{
			$con=database::connect();
			$res=mysqli_query($con,"select * from otherphoto_tbl where other_id='$other_id'");
			return $res;
			database::disconnect();
	}
	public function addcui($cui_id,$restid,$cui_name)
	{
			$con=database::connect();
			$res=mysqli_query($con,"insert into cusine_tbl values('$cui_id','$restid','$cui_name')");
			return $res;
			database::disconnect();
	}
	public function getcuiIdbyname($restid,$cui_name)
	{
			$con=database::connect();
			$res=mysqli_query($con,"select * from cusine_tbl where cui_name='$cui_name' and fk_rest_id='$restid'");
			return $res;
			database::disconnect();
	}
	
	public function checkpassword($email,$oldpassword)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select * from restowner_tbl where owner_email='$email' and password='$oldpassword'");
		return $res;
		database::disconnect();
	}
	
	public function changepassword($email,$newpassword)
	{
		$con=database::connect();
		$res=mysqli_query($con,"update restowner_tbl set password='$newpassword' where owner_email='$email'");
		return $res;
		database::disconnect();
	}
	
		public function checkcuisine($restid,$cui_name)
	{
		$con=database::connect();
		$res=mysqli_query($con,"select * from cusine_tbl where fk_rest_id='$restid' and cui_name='$cui_name'");
		return $res;
		database::disconnect();
	}
}

?>