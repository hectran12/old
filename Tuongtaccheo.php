<?php 
/***
    Code by Trần Trọng Hòa
    Ziết để share:))))))))
    chúc bạn may mắn khi đọc dòng này
    :)))
***/
date_default_timezone_set("Asia/Ho_Chi_Minh");
error_reporting(10000000);
class text  
{
  public function hoi ($text)
  {
    return "\033[1;92m$text:\033[1;95m ";
  }
  public function text ($text) 
  {
    return "\033[1;92m$text";
  }
  public function thanh ($mau)
  {
    $a="";
    for ($v=1;$v<=$mau;$v++)
    {
      $a .= "\033[1;37m- ";
    }
    return $a;
  }
  public function loi ($text)
  {
    return "\033[0;37m$text";
  }
  public function logo ()
  {
    return $this->loi("
            \033[1;95mTool By Trần Trọng Hòa ! @
            \033[0;37m██╗  ██╗███████╗██╗  ██╗
            ██║  ██║██╔════╝╚██╗██╔╝
            ███████║█████╗   ╚███╔╝ 
            ██╔══██║██╔══╝   ██╔██╗ 
            ██║  ██║███████╗██╔╝ ██╗
            ╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝
            \033[1;95mBản Tool Miễn Phí Không Sell\n 
"
    );
  }
}
class setAcc 
{
  public function setSoAcc($soacc)
  {
    if(is_numeric($soacc))
    {
    $this->soacc = $soacc;
    } else {
      return "false";
    }
   
  }
  public function getacc ()
  {
    return $this->soacc;
  }
}
class themacc extends text {
  public function them_gia_tri ($stt)
  { 
    print $this->logo();
    $this->stt = $stt;
    print $this->hoi("Nhập cookie TTC");
    $this->setcooki = $cookie = trim(fgets(STDIN));
    if($this->setcooki)
    {
    if (is_numeric($this->setcooki)) 
    {
      die($this->loi("Cookie không hoàn toàn là số được!"));
    } 
    } else {
      die($this->loi("Cookie không được để trống!"));
    }
    print $this->hoi("Nhập cookie FB");
    $this->setcookifb = $cookie_fb = trim(fgets(STDIN));
    if ($this->setcookifb)
    {
    if (is_numeric($this->setcookifb)) 
    {
      die($this->loi("Cookie fb không thể hoàn toàn là số được!"));
    } 
    } else {
      die($this->loi("Cookie không được để trống!"));
    }
    print $this->text($this->thanh(25)."\033[1;92m
[1] Job like
[2] Job follow
[3] Job comment
[4] React cmt 
[5] Join group 
[6] Share 
[7] Đánh giá page ( Bảo Trì )
[8] Like page
[9] React bài viết\n".$this->thanh(25)."\n");
    print $this->hoi("Nhập số (1+2+3)");
    $this->job = explode('+' , $job = trim(fgets(STDIN)));
    //print_r(count($this->job)); die();
    $job_arr = array();
    foreach ($this->job as $l) 
    {
      if(!is_numeric($l))
      {
        
        die($this->loi("Phải là số!"));
        
      } else 
      
      if ($l >= 10 or $l == 7)
      {
        
        die($this->loi("Số nhiệm vụ phái nhỏ hơn 9, hoạc nhiệm vụ đang bảo trì!"));
        
      } else 
      if ($l == 1)
      {
        $type = "LIKE";
      } elseif ($l == 2)
      {
        $type = "FOLLOW";
      } elseif ($l == 3)
      {
        $type = "COMMENT";
      } elseif ($l == 4)
      {
        $type = 'Cảm Xúc Bình Luận';
      } elseif ($l == 5)
      {
        $type = "Tham Gia Nhóm";
      } elseif ($l == 6)
      {
        $type = 'SHARE';
      } elseif ($l == 7)
      {
        $type = 'Đánh Giá Page';
      } elseif ($l == 8)
      {
        $type = "Thích Page";
      } elseif ($l == 9)
      {
        $type = "Thả Cảm Xúc Post";
      }
      print $this->hoi("Bạn muốn chạy bao nhiêu job $type");
      $job_sll = trim(fgets(STDIN));
    //  $job_arr = array();
      if(is_numeric($job_sll))
      {
        for($v=1;$v<=$job_sll;$v++)
        {
          $job_arr[] = $l;
        }
        print $this->text("Đã set thành công $job_sll job\n");
      } else {
      $job_arr[] = $l;
      print $this->text("Đã set 1 vì bạn nhập toàn cái gì ó :<\n");
    //  print_r($this->job); die();
      }
    }
    $this->job = $job_arr;
    
  }
  //public $acc = array();
  public function themacc ()
  { 
    
    $h_acc = array ("stt"=>$this->stt,"cookie"=>$this->setcooki,"fb"=>$this->setcookifb,"job"=>$this->job);
    return $h_acc;
  }
 
}
class get_nv 
{
  public function setVar ($url, $cookie)
  {
    $this->url = $url;
    $this->ttc = $cookie;
  }
  public function laynv ($type)
  {
    $job_other = get_job ($this->url, $this->ttc);
    $json      = json_decode($job_other,TRUE);
    if(count($json) < 1)
    {
      return "false";
    } else 
    if ($type == "all")
    {
      return $json;
    } else 
    return $json[$type];
  }
  public function setRep ($char)
  {
    return str_replace("www","mbasic",$char);
  }
}
class account 
{
  public function setHistory ($list)
  {
    $this->list_history = $list;
  }
  public function getHistory ()
  {
    return $this->list_history;
  }
}

$new_text = new text;
system('clear');
print $new_text->logo();
print $new_text->thanh(25)."\n";
print $new_text->text("Tool By Trần Trọng Hòa\nLoại tool: TTC\nFB:\033[0;37m https://www.facebook.com/thehex101\n");
print $new_text->thanh(25)."\n";
print $new_text->hoi("Nhập số acc ");
$acc["so_acc"] = trim(fgets(STDIN));
$new_set_acc = new setAcc;
$res = $new_set_acc->setSoAcc($acc["so_acc"]);
if ($res == "false")
{
  print $new_text->loi("Không phải số hoạc không có giá trị!");
  die;
} else 
system('clear');
print $new_text->thanh(25)."\n";
print $new_text->text("Số acc bạn muốn setup là \033[0;37m".$new_set_acc->getacc()."\n"); 
sleep(1);
system('clear');
$new_themacc = new themacc;
$mang_acc = array();
for ($v=1;$v<=$new_set_acc->getacc();$v++)
{
print $new_text->text("[Khu vực] Đang setup acc số $v \n");
$new_themacc->them_gia_tri($v);
array_push($mang_acc,$new_themacc->themacc());
system('clear');
}

$acc_live = array();
foreach ($mang_acc as $list_check)
{
  system('clear');
  print $new_text->thanh(25)."\n";
  //system('clear');
  print $new_text->text("[Khu vực] Đang kiểm tra acc số ".$list_check["stt"]."!\n");
  print $new_text->logo();
  print $new_text->text("\r[\033[0;31m...\033[1;92m] Đang check cookie!\r");
  $acc_check = check_cookie_ttc ($list_check["cookie"]);
  if(!strpos($acc_check , "Chưa đăng nhập") == true)
  {
   // check cookie, name
  $name      = explode('</i>', explode("<h2 class='text-center'>Chào mừng <i>" , $acc_check)[1])[0];
  $sodu      = explode('</strong>', explode('<li><a>Số dư: <strong style="color: red;" id="soduchinh">' , $acc_check)[1])[0];
  //print $sodu;
  print $new_text->text("\033[1;92m[\033[0;31m✔\033[1;92m] Cookie live:\033[1;95m $name\033[1;92m | Số dư:\033[1;95m $sodu\n");
  
  print $new_text->text("\r\033[1;92m[\033[0;31m...\033[1;92m] Đang kiểm tra cookie Facebook\r");
  $check_cookiefb = check_cookie_fb ($list_check["fb"]);
  if ($check_cookiefb)
  {
  if(!strpos($check_cookiefb , "Không tìm thấy trang") == true)
  {
    $exp    = explode(',270],["ErrorDebugHooks",[],', explode(');</script>', explode(',["CurrentUserInitialData",[],' , $check_cookiefb)[1])[0])[0];
    $json   = json_decode($exp, TRUE);
    $idfb   = $json["ACCOUNT_ID"];
    $name   = $json["NAME"];
    print $new_text->text("\033[1;92m[\033[0;31m✔\033[1;92m] IDFB:\033[1;95m $idfb\033[1;92m |\033[1;92m NAMEFB:\033[1;95m $name\n");
    print $new_text->text("\r\033[1;92m[\033[0;31m...\033[1;92m] Đang kiểm tra cấu hình acc\r");
    $check_cau_hinh = dat_cau_hinh ($list_check["cookie"] , $idfb);
  //  print $check_cau_hinh;die();
 //   $check_cau_hinh = 1;
    if ($check_cau_hinh == 1)
    {
      print $new_text->text("\033[1;92m[\033[0;31m✔\033[1;92m] Cấu hình thành công [$idfb] [$name]\n");
      print $new_text->text("\r\033[1;92m[\033[0;31m...\033[1;92m] Đang kiểm tra toàn vẹn tính năng!\r");
     sleep(1);
     print $new_text->hoi("Tính năng này có thể sẽ lỗi!, skip nếu bạn chắc acc sống! (y = skip , n = check)");
     $hoi = trim(fgets(STDIN));
     if ($hoi == "y")
     {
     $check_tn = follow ("https://www.facebook.com/profile.php?id=100072920217854", $list_check["fb"]);
    //  print $check_tn;
  //  $check_tn ="live";
     } else {
       $check_tn = "live";
     }
    if ($check_tn == "live")
    {
      print $new_text->text("\033[1;92m[\033[0;31m✔\033[1;92m] Đã thử theo dõi hoạc unfollow chức năng hoạt động tốt.\n"); 
      array_push($acc_live, $list_check);
    } else 
    print $new_text->loi("Đã block tính năng hoạc đã die , vui lòng đổi nick!");
    sleep(1);
    } else 
    print $new_text->loi("Cấu hình không tồn tại!");
    sleep(1);
    /**
    $open    = fopen("xemhtml.html","w+");
    fwrite($open, $exp);
    **/
  } else {
    print $new_text->loi("Cookie Facebook đã die!");
    sleep(1);
  }
  } else 
  print $new_text->loi("Không tìm thấy, đã xảy ra lỗi ngoài ý muốn!");
  sleep(1);
  } else {
    print $new_text->loi("Cookie đã die, không tồn tại!");
    sleep(1);
  }
    
  
}
system('clear');
if (count($acc_live) < 1)
{
  die($new_text->loi("Không có acc nào để bắt đầu chạy!"));
}
print $new_text->text("\rĐang xử lý đồng bộ hóa...\r");
$job_list_account = array();
foreach ($acc_live as $list) 
{
 // print_r($list);
  $cookie_ttc = $list["cookie"];
  $cookie_fb  = $list["fb"];
  $job        = $list["job"];
  $stt        = $list["stt"];
  eval('$list_job'.$stt.' = array();');
  foreach ($job as $l)
  {
    if ($l == 1)
    {
      eval('$list_job'.$stt.'[] = "https://tuongtaccheo.com/kiemtien/getpost.php";');
    } elseif ($l == 2)
    {
      eval('$list_job'.$stt.'[] = "https://tuongtaccheo.com/kiemtien/subcheo/getpost.php";');
    } elseif ($l == 3)
    {
      eval('$list_job'.$stt.'[] = "https://tuongtaccheo.com/kiemtien/cmtcheo/getpost.php";');
    } elseif ($l == 4)
    {
      eval('$list_job'.$stt.'[] = "https://tuongtaccheo.com/kiemtien/camxuccheobinhluan/getpost.php";');
    } elseif ($l == 5)
    {
      eval('$list_job'.$stt.'[] = "https://tuongtaccheo.com/kiemtien/thamgianhomcheo/getpost.php";');
    } elseif ($l == 6)
    {
      eval('$list_job'.$stt.'[] = "https://tuongtaccheo.com/kiemtien/sharecheo/getpost.php";');
    } elseif ($l == 7)
    {
      eval('$list_job'.$stt.'[] = "https://tuongtaccheo.com/kiemtien/danhgiapage/getpost.php";');
    } elseif ($l == 8)
    {
      eval('$list_job'.$stt.'[] = "https://tuongtaccheo.com/kiemtien/likepagecheo/getpost.php";');
    } elseif ($l == 9)
    {
      eval('$list_job'.$stt.'[] = "https://tuongtaccheo.com/kiemtien/camxuccheo/getpost.php";');
    }
  }
  eval('$dongbo = $list_job'.$stt.';');
  array_push ($job_list_account, array("cookie_ttc"=>$cookie_ttc,"cookie_fb"=>$cookie_fb,"job"=>$dongbo,"stt"=>$stt));
}
// Op setting
print $new_text->hoi("Delay mỗi job");
$delay = trim(fgets(STDIN));

//else { $on_ai = "off"; }
system('clear');
print $new_text->logo();
$nv_class = new get_nv;
$account = new account;
//$stt = 0;
$account->setHistory($job_list_account);
while(true)
{
  
  $job_list_account = $account->getHistory();
 // print_r($job_list_account);
  foreach ($job_list_account as $list)
  {
  //  print $new_text->text("Hoàn thành\033[1;95m$success/".count($job)."!\n");
    $success = 0;
 //   print_r($list);
    $ck_ttc = $list["cookie_ttc"];

    
    $ck_fb  = $list["cookie_fb"];
    $job    = $list["job"];
    $stt    = $list["stt"];
    // Lấy thông tin 
    $acc_check = check_cookie_ttc ($ck_ttc);
    if(!strpos($acc_check,"Chưa đăng nhập") == true)
    {
     $name      = explode('</i>', explode("<h2 class='text-center'>Chào mừng <i>" , $acc_check)[1])[0];
     $sodu      = explode('</strong>', explode('<li><a>Số dư: <strong style="color: red;" id="soduchinh">' , $acc_check)[1])[0];
     $check_cookiefb = check_cookie_fb ($ck_fb);
     if(!strpos($check_cookiefb , "Không tìm thấy trang") == true)
    {
        $exp    = explode(',270],["ErrorDebugHooks",[],', explode(');</script>', explode(',["CurrentUserInitialData",[],' , $check_cookiefb)[1])[0])[0];
        $json   = json_decode($exp, TRUE);
        $idfb   = $json["ACCOUNT_ID"];
        $namef  = $json["NAME"];
        dat_cau_hinh($ck_ttc,$idfb);
        print $new_text->thanh(25)."\n";
        print $new_text->text("Đang chạy acc số $stt kết thúc sau ".count($job)." job khác/giống !\n");
        print $new_text->text("TTC: $name \033[0;37m|\033[1;92m SD: $sodu\033[0;37m |\033[1;92m FB: $namef\n");
        print $new_text->thanh(25)."\n";
        foreach ($job as $nv)
        {
          if($nv == "https://tuongtaccheo.com/kiemtien/getpost.php")
          {
            $nv_class->setVar ($nv, $ck_ttc);
            $job     = $nv_class->laynv(0);
            if ($job != "false")
            {
          //  print_r($job."\n");
            $link    = $nv_class->setRep($job["link"]);
            if($link  ==  true)
            {
           // print $link."\n";
            $id      = $job["idpost"];
            $action  = like ($link, $ck_fb);
            $claim   = claim_v1 ($nv,$id,$ck_ttc);
            $json    = json_decode($claim,TRUE);
          //  print_r($json);
           // print_r($json);
            if($json["mess"])
            {
              $s++;
              $success++;
              print $new_text->text("[\033[1;95m$s\033[1;92m] [\033[0;37m".date("h:i:s")."\033[1;92m]\033[1;95m LIKE\033[0;37m $id\033[1;92m |\033[1;92m +300\n");
            bar_delay($delay);
            } else 
            //  print $action;
              print $new_text->loi("\r".$json["error"]."\r");
            } else 
            print $new_text->loi("\rHết job like!\r");
            } else
            print $new_text->loi("\rHết job like!\r");
           // print $link."\n";
            
            
          } elseif ($nv == "https://tuongtaccheo.com/kiemtien/subcheo/getpost.php")
          {
            $nv_class->setVar ($nv, $ck_ttc);
            $job     = $nv_class->laynv(0);
            if ($job != "false")
            {
          //  print_r($job."\n");
            $link    = $nv_class->setRep($job["link"]);
            if($link  ==  true)
            {
        //    print $link."\n";
            $id      = $job["idpost"];
            $action  = follow ($link, $ck_fb);
            $claim   = claim_v1 ($nv,$id,$ck_ttc);
            $json    = json_decode($claim,TRUE);
          //  print_r($json);
          //  print_r($json);
            if($json["mess"])
            {
              $s++;
              $success++;
              print $new_text->text("[\033[1;95m$s\033[1;92m] [\033[0;37m".date("h:i:s")."\033[1;92m]\033[1;95m FOLLOW\033[0;37m $id\033[1;92m |\033[1;92m +600\n");
            bar_delay($delay);
            } else 
            //  print $action;
              print $new_text->loi("\r".$json["error"]."\r");
            } else 
            print $new_text->loi("\rHết job theo dõi!\r");
            } else 
            print $new_text->loi("\rHết job theo dõi!\r");
            
          } elseif ($nv == "https://tuongtaccheo.com/kiemtien/camxuccheo/getpost.php")
          {
            $nv_class->setVar ($nv, $ck_ttc);
            $job     = $nv_class->laynv(0);
            //print_r($job);
            if ($job != "false")
            {
          //  print_r($job."\n");
            $link    = $nv_class->setRep($job["link"]);
            if($link  ==  true)
            {
       //     print $link."\n";
            $id      = $job["idpost"];
            $type    = $job["loaicx"];
            $action  = react_cmt_post ("https://mbasic.facebook.com/reactions/picker/?ft_id=$id", $ck_fb, $type);
           $claim   = claim_v2 ($nv,$id, $type ,$ck_ttc);
           $json    = json_decode($claim,TRUE);
          //  print_r($json);
          //  print_r($json);
            if($json["mess"])
            {
              $s++;
              $success++;
              print $new_text->text("[\033[1;95m$s\033[1;92m] [\033[0;37m".date("h:i:s")."\033[1;92m]\033[1;95m REACT POST\033[0;37m $id\033[1;92m |\033[1;92m +400\n");
            bar_delay($delay);
              
            } else 
            //  print $action;
              print $new_text->loi("\r".$json["error"]."\r");
            } else 
            print $new_text->loi("\rHết job React post!\r");
            } else 
            print $new_text->loi("\rHết job React post!\r");
            
          } elseif ($nv == "https://tuongtaccheo.com/kiemtien/camxuccheobinhluan/getpost.php")
          {
            $nv_class->setVar ($nv, $ck_ttc);
            $job     = $nv_class->laynv(0);
         //   print_r($job);
            if ($job != "false")
            {
          //  print_r($job."\n");
            $link    = $nv_class->setRep($job["link"]);
            if($link  ==  true)
            {
       //     print $link."\n";
            $id      = $job["idpost"];
            $type    = $job["loaicx"];
            $action  = react_cmt_post ("https://mbasic.facebook.com/reactions/picker/?ft_id=$id", $ck_fb, $type);
           $claim   = claim_v2 ($nv,$id, $type ,$ck_ttc);
           $json    = json_decode($claim,TRUE);
          //  print_r($json);
          //  print_r($json);
            if($json["mess"])
            {
              $s++;
              $success++;
              print $new_text->text("[\033[1;95m$s\033[1;92m] [\033[0;37m".date("h:i:s")."\033[1;92m]\033[1;95m REACT CMT\033[0;37m $id\033[1;92m |\033[1;92m +400\n");
            bar_delay($delay);
            } else 
            //  print $action;
              print $new_text->loi("\r".$json["error"]."\r");
            } else 
            print $new_text->loi("\rHết job React cmt!\r");
            } else 
            print $new_text->loi("\rHết job React cmt!\r");
            
          } elseif ($nv == "https://tuongtaccheo.com/kiemtien/thamgianhomcheo/getpost.php")
          {
            $nv_class->setVar ($nv, $ck_ttc);
            $job     = $nv_class->laynv(0);
            if ($job != "false")
            {
          //  print_r($job."\n");
            $link    = $nv_class->setRep($job["link"]);
           // print $link."\n";
            if($link  ==  true)
            {
           // print $link."\n";
            $id      = $job["idpost"];
            $action  = join_group ($link, $ck_fb);
            $claim   = claim_v1 ($nv,$id,$ck_ttc);
            $json    = json_decode($claim,TRUE);
          //  print_r($json);
           // print_r($json);
            if($json["mess"])
            {
              $s++;
              $success++;
              print $new_text->text("[\033[1;95m$s\033[1;92m] [\033[0;37m".date("h:i:s")."\033[1;92m]\033[1;95m JOIN GROUP\033[0;37m $id\033[1;92m |\033[1;92m +1200\n");
            bar_delay($delay);
            } else 
            //  print $action;
              print $new_text->loi("\r".$json["error"]."\r");
            } else 
            print $new_text->loi("\rHết job join!\r");
            } else
            print $new_text->loi("\rHết job join!\r");
           // print $link."\n";
          } elseif ($nv == "https://tuongtaccheo.com/kiemtien/sharecheo/getpost.php")
          {
            $nv_class->setVar ($nv, $ck_ttc);
            $job     = $nv_class->laynv(0);
            if ($job != "false")
            {
          //  print_r($job."\n");
            $link    = $nv_class->setRep($job["link"]);
            if($link  ==  true)
            {
           // print $link."\n";
            $id      = $job["idpost"];
            $action  = share_post ($link, $ck_fb);
            $claim   = claim_v1 ($nv,$id,$ck_ttc);
            $json    = json_decode($claim,TRUE);
          //  print_r($json);
           // print_r($json);
            if($json["mess"])
            {
              $s++;
              $success++;
              print $new_text->text("[\033[1;95m$s\033[1;92m] [\033[0;37m".date("h:i:s")."\033[1;92m]\033[1;95m SHARE\033[0;37m $id\033[1;92m |\033[1;92m +600\n");
            bar_delay($delay);
            } else 
            //  print $action;
              print $new_text->loi("\r".$json["error"]."\r");
            } else 
            print $new_text->loi("\rHết job share!\r");
            } else
            print $new_text->loi("\rHết job share!\r");
           // print $link."\n";
            
          } elseif ($nv == "https://tuongtaccheo.com/kiemtien/likepagecheo/getpost.php")
          {
            $nv_class->setVar ($nv, $ck_ttc);
            $job     = $nv_class->laynv(0);
            if ($job != "false")
            {
          //  print_r($job."\n");
            $link    = $nv_class->setRep($job["link"]);
            if($link  ==  true)
            {
           // print $link."\n";
            $id      = $job["idpost"];
            $action  = like_page ($link, $ck_fb);
            $claim   = claim_v1 ($nv,$id,$ck_ttc);
            $json    = json_decode($claim,TRUE);
          //  print_r($json);
           // print_r($json);
            if($json["mess"])
            {
              $s++;
              $success++;
              print $new_text->text("[\033[1;95m$s\033[1;92m] [\033[0;37m".date("h:i:s")."\033[1;92m]\033[1;95m PAGE\033[0;37m $id\033[1;92m |\033[1;92m +700\n");
            bar_delay($delay);
            } else 
            //  print $action;
              print $new_text->loi("\r".$json["error"]."\r");
            } else 
            print $new_text->loi("\rHết job PAGE!\r");
            } else
            print $new_text->loi("\rHết job PAGE!\r");
            
          } elseif ($nv == 'https://tuongtaccheo.com/kiemtien/cmtcheo/getpost.php')
          {
          //  print $nv."\n";
            $nv_class->setVar ($nv, $ck_ttc);
            $job     = $nv_class->laynv(0);
            //print_r($job);
            if ($job != "false")
            {
           // print_r($job."\n");
            $link    = $nv_class->setRep($job["link"]);
            $nd      = json_decode($job["nd"], TRUE)[0];
         //   print_r($nd);
            if($link  ==  true)
            {
           // print $link."\n";
            $id      = $job["idpost"];
         //   $nd      = $job["nd"];
            $action  = cmt_post ($link, $ck_fb, $nd);
            $claim   = claim_v1 ($nv,$id,$ck_ttc);
            $json    = json_decode($claim,TRUE);
          //  print_r($json);
           // print_r($json);
            if($json["mess"])
            {
              $s++;
              $success++;
              print $new_text->text("[\033[1;95m$s\033[1;92m] [\033[0;37m".date("h:i:s")."\033[1;92m]\033[1;95m CMT\033[0;37m $id\033[1;92m |\033[1;92m +700\n");
            bar_delay($delay);
            } else 
            //  print $action;
              print $new_text->loi("\r".$json["error"]."\r");
            } else 
            print $new_text->loi("\rHết job CMT!\r");
            
            } else
            print $new_text->loi("\rHết job CMT!\r");
            
          }
          if(isset($action))
          {
          if(strpos($action,"Bạn tạm thời bị hạn chế thực hiện một số hành động trên Facebook") == true || strpos($action,"Xin lỗi, tính năng này không khả dụng ngay bây giờ") == true)
          {
            print $new_text->loi("Acc số $stt đã bị block tính năng hoạc một tính năng nào đó đã không hoạt động, sẽ loại khỏi danh sách và bắt đầu lại...\n");
            array_splice($job_list_account, $stt - 1, 1);
            $account->setHistory($job_list_account);
         //  print_r($job_list_account);
         //  print_r($job_list_account);
           break;
          } 
         // sleep(0.5);
                      
         //  print_r($job_list_account);
          }
    }
    
    } else {
    print $new_text->loi("\rCookie FB thứ $stt đã die, tiến hành loại bỏ!\r");
    array_splice($job_list_account, $stt - 1, 1);
    $account->setHistory($job_list_account);
    }
    } else {
    print $new_text->loi("\rCookie TTC thứ $stt đã die, tiến hành loại bỏ!\r");
    array_splice($job_list_account, $stt - 1, 1);
    $account->setHistory($job_list_account);

    }
  }

  
}
function rate_page ($colam, $coan)
{
  // có cái nịt
}
function get_job ($link , $cookie)
{
  $curl_getjob = curl_init ();
  curl_setopt ($curl_getjob, CURLOPT_URL, $link);
  curl_setopt ($curl_getjob, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:85.0) Gecko/20100101 Firefox/85.0");
  curl_setopt ($curl_getjob, CURLOPT_COOKIE, $cookie);
  curl_setopt ($curl_getjob, CURLOPT_HTTPHEADER, array(
    "Host:tuongtaccheo.com",
    "x-requested-with:XMLHttpRequest",
    "referer:".$link,
    "accept-language:vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5"
    ));
  curl_setopt ($curl_getjob, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt ($curl_getjob, CURLOPT_TIMEOUT, 1000000000000000);
  $job_acc = curl_exec($curl_getjob);
  curl_close ($curl_getjob);
  
  return $job_acc;
}
function share_post ($link, $cookie)
{
$head  = array(
        "Host:mbasic.facebook.com",
        'sec-ch-ua:"Google Chrome";v="87", " Not;A Brand";v="99", "Chromium";v="87"',
        "sec-ch-ua-mobile:?1",
        "cache-control:max-age=0",
        "upgrade-insecure-requests:1",
        "dnt:1",
        "save-data:on",
        "accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "sec-fetch-site:same-origin",
        "sec-fetch-mode:navigate",
        "sec-fetch-user:?1",
        "sec-fetch-dest:document",
        "referer:https://mbasic.facebook.com/",
        "accept-language:vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5",
);
//$link  = "https://mbasic.facebook.com/814432512582541";

$curl_share = curl_init("CURL SHARE");
curl_setopt ($curl_share, CURLOPT_URL, $link);
curl_setopt ($curl_share, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:85.0) Gecko/20100101 Firefox/85.0");
curl_setopt ($curl_share, CURLOPT_COOKIE, $cookie);
curl_setopt ($curl_share, CURLOPT_HTTPHEADER, $head);
curl_setopt ($curl_share, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($curl_share, CURLOPT_FOLLOWLOCATION, TRUE);
$access_share = curl_exec($curl_share);
curl_close($curl_share);
//print $access_share;
$ex_share     = explode('"', explode('?c_src=share', $access_share)[1])[0];
$link         = "https://mbasic.facebook.com/composer/mbasic/?c_src=share". htmlspecialchars_decode($ex_share);
$curl_share = curl_init("CURL SHARE");
curl_setopt ($curl_share, CURLOPT_URL, $link);
curl_setopt ($curl_share, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:85.0) Gecko/20100101 Firefox/85.0");
curl_setopt ($curl_share, CURLOPT_COOKIE, $cookie);
curl_setopt ($curl_share, CURLOPT_HTTPHEADER, $head);
curl_setopt ($curl_share, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($curl_share, CURLOPT_FOLLOWLOCATION, TRUE);
$access_share = curl_exec($curl_share);
curl_close($curl_share);
//print $access_share;
$ex_char      = explode('form method="post" action="', $access_share)[1];
$link_submit = "https://mbasic.facebook.com". explode('"', htmlspecialchars_decode($ex_char))[0];
$e_hidden   = explode('<input type="hidden" name="', $ex_char);
$fb_dtsg    = explode('"', $e_hidden[1])[2];
$jazoest    = explode('"', $e_hidden[2])[2];
$target     = explode('"', $e_hidden[4])[2];
$csid       = explode('"', $e_hidden[5])[2];
$c_src      = explode('"', $e_hidden[6])[2];
$referrer   = explode('"', $e_hidden[7])[2];
$ctype      = explode('"', $e_hidden[8])[2];
$cver       = explode('"', $e_hidden[9])[2];
$waterfall_source  = explode('"', $e_hidden[12])[2];
$privacyx            = explode('"', $e_hidden[13])[2];
$appid               = explode('"', $e_hidden[14])[2];
$sid                 = explode('"', $e_hidden[15])[2];
$shared_from_post_id = explode('"', $e_hidden[18])[2];
$m                   = explode('"', $e_hidden[17])[2];
$data       = array(
  "fb_dtsg" => $fb_dtsg,
  "jazoest" => $jazoest,
  "target"  => $target,
  "csid"    => $csid,
  "c_src"   => $c_src,
  "referrer"            => $referrer,
  "ctype"   => $ctype,
  "cver"    => $cver,
  "waterfall_source"    => $waterfall_source,
  "privacyx"            => $privacyx,
  "appid"   => $appid,
  "sid"     => $sid,
  "linkUrl" => "",
  "users_with"          => "",
  "album_id"=> "",
  "m"       => $m,
  "xc_message"          => "",
  "shared_from_post_id" => $shared_from_post_id,
  "view_post"           => "Chia sẻ"
  );
//print_r($data);
$curl_share = curl_init("CURL SHARE");
curl_setopt ($curl_share, CURLOPT_URL, $link_submit);
curl_setopt ($curl_share, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:85.0) Gecko/20100101 Firefox/85.0");
curl_setopt ($curl_share, CURLOPT_COOKIE, $cookie);
curl_setopt ($curl_share, CURLOPT_HTTPHEADER, $head);
curl_setopt ($curl_share, CURLOPT_POSTFIELDS, $data);
curl_setopt ($curl_share, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($curl_share, CURLOPT_FOLLOWLOCATION, TRUE);
$access_share = curl_exec($curl_share);
curl_close($curl_share);
return $access_share;
}
function like ($link, $cookie)
{
$curl_like = curl_init ();
curl_setopt ($curl_like, CURLOPT_URL, $link);
curl_setopt ($curl_like, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:85.0) Gecko/20100101 Firefox/85.0");
curl_setopt ($curl_like, CURLOPT_HTTPHEADER, array(
        "Host:mbasic.facebook.com",
        'sec-ch-ua:"Google Chrome";v="87", " Not;A Brand";v="99", "Chromium";v="87"',
        "sec-ch-ua-mobile:?1",
        "cache-control:max-age=0",
        "upgrade-insecure-requests:1",
        "dnt:1",
        "save-data:on",
        "accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "sec-fetch-site:same-origin",
        "sec-fetch-mode:navigate",
        "sec-fetch-user:?1",
        "sec-fetch-dest:document",
        "referer:https://mbasic.facebook.com/",
        "accept-language:vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5",
));
curl_setopt ($curl_like, CURLOPT_COOKIE, $cookie);
curl_setopt ($curl_like, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($curl_like, CURLOPT_FOLLOWLOCATION, TRUE);
$access_like = curl_exec ($curl_like);
curl_close($curl_like);
//print $access_like;
//fwrite(fopen("xemhtml.html","w+"),$access_like);
$ex_p        = explode('/a/like.php?', $access_like)[1];
$link        = "https://mbasic.facebook.com/a/like.php?". htmlspecialchars_decode(explode('"', $ex_p)[0]);
$curl_like = curl_init ();
curl_setopt ($curl_like, CURLOPT_URL, $link);
curl_setopt ($curl_like, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:85.0) Gecko/20100101 Firefox/85.0");
curl_setopt ($curl_like, CURLOPT_HTTPHEADER, array(
        "Host:mbasic.facebook.com",
        'sec-ch-ua:"Google Chrome";v="87", " Not;A Brand";v="99", "Chromium";v="87"',
        "sec-ch-ua-mobile:?1",
        "cache-control:max-age=0",
        "upgrade-insecure-requests:1",
        "dnt:1",
        "save-data:on",
        "accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "sec-fetch-site:same-origin",
        "sec-fetch-mode:navigate",
        "sec-fetch-user:?1",
        "sec-fetch-dest:document",
        "referer:https://mbasic.facebook.com/",
        "accept-language:vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5",
));
curl_setopt ($curl_like, CURLOPT_COOKIE, $cookie);
curl_setopt ($curl_like, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($curl_like, CURLOPT_FOLLOWLOCATION, TRUE);
$access_like = curl_exec ($curl_like);
curl_close($curl_like);
return $access_like;
}
function cmt_post ($link , $cookie, $msg)
{
$head  = array(
        "Host:mbasic.facebook.com",
        'sec-ch-ua:"Google Chrome";v="87", " Not;A Brand";v="99", "Chromium";v="87"',
        "sec-ch-ua-mobile:?1",
        "cache-control:max-age=0",
        "upgrade-insecure-requests:1",
        "dnt:1",
        "save-data:on",
        "accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "sec-fetch-site:same-origin",
        "sec-fetch-mode:navigate",
        "sec-fetch-user:?1",
        "sec-fetch-dest:document",
        "referer:https://mbasic.facebook.com/",
        "accept-language:vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5",
);
$curl_cmt = curl_init();
curl_setopt ($curl_cmt, CURLOPT_URL, $link);
curl_setopt ($curl_cmt, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:85.0) Gecko/20100101 Firefox/85.0");
curl_setopt ($curl_cmt, CURLOPT_HTTPHEADER, $head);
curl_setopt ($curl_cmt, CURLOPT_COOKIE, $cookie);
curl_setopt ($curl_cmt, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt ($curl_cmt, CURLOPT_RETURNTRANSFER, 1);
$cmt_access = curl_exec($curl_cmt); 
curl_close($curl_cmt);
//print $cmt_access;
$link_cmt_step_1 = explode('<a href="/mbasic/comment/advanced/', $cmt_access)[1];
$cmt_link        = explode('"', $link_cmt_step_1)[0];
$cmt             = "https://mbasic.facebook.com/mbasic/comment/advanced/". htmlspecialchars_decode($cmt_link);
$curl_cmt_2 = curl_init();
curl_setopt ($curl_cmt_2, CURLOPT_URL, $cmt);
curl_setopt ($curl_cmt_2, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:85.0) Gecko/20100101 Firefox/85.0");
curl_setopt ($curl_cmt_2, CURLOPT_HTTPHEADER, $head);
curl_setopt ($curl_cmt_2, CURLOPT_COOKIE, $cookie);
curl_setopt ($curl_cmt_2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($curl_cmt_2, CURLOPT_FOLLOWLOCATION, TRUE);
$access_cmt_2 = curl_exec($curl_cmt_2);
curl_close ($curl_cmt_2);
//print $access_cmt_2;
$e_link       = explode('<form method="post" action="', $access_cmt_2)[1];

//print_r($e_link);
$link         = explode('"', htmlspecialchars_decode($e_link))[0];
//print "Link: ".$link."\n";
$g_exp        = explode('<input type="hidden" name="', $e_link);
$fb_dtsg      = explode('"',explode('value="', $g_exp[1])[1])[0];
$jazoest      = explode('"',explode('value="', $g_exp[2])[1])[0];
//print "fb_dtsg: $fb_dtsg\njazoest: $jazoest\n";
//print $jazoest;
//$images       = file_get_contents("4443285.jpg");
$head  = array(
        "Host:mbasic.facebook.com",
        'sec-ch-ua:"Google Chrome";v="87", " Not;A Brand";v="99", "Chromium";v="87"',
        "content-type:multipart/form-data; boundary=----WebKitFormBoundary2Vah0OE4QyAoRcYW",
        "sec-ch-ua-mobile:?1",
        "cache-control:max-age=0",
        "upgrade-insecure-requests:1",
        "dnt:1",
        "save-data:on",
        "accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "sec-fetch-site:same-origin",
        "sec-fetch-mode:navigate",
        "sec-fetch-user:?1",
        "sec-fetch-dest:document",
        "referer:https://mbasic.facebook.com/",
        "accept-language:vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5",
);
$data         = '------WebKitFormBoundary2Vah0OE4QyAoRcYW
Content-Disposition: form-data; name="fb_dtsg"

'.$fb_dtsg.'
------WebKitFormBoundary2Vah0OE4QyAoRcYW
Content-Disposition: form-data; name="jazoest"

'.$jazoest.'
------WebKitFormBoundary2Vah0OE4QyAoRcYW
Content-Disposition: form-data; name="comment_text"

'.$msg.'
';
//print $data;
$curl_send    = curl_init();
curl_setopt ($curl_send, CURLOPT_URL, $link);
curl_setopt ($curl_send, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:85.0) Gecko/20100101 Firefox/85.0");
curl_setopt ($curl_send, CURLOPT_HTTPHEADER, $head);
curl_setopt ($curl_send, CURLOPT_COOKIE, $cookie);
curl_setopt ($curl_send, CURLOPT_POSTFIELDS, $data);
curl_setopt ($curl_send, CURLOPT_SSL_VERIFYPEER, TRUE);
curl_setopt ($curl_send, CURLOPT_TIMEOUT, 1000);
curl_setopt ($curl_send, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($curl_send, CURLOPT_FOLLOWLOCATION, TRUE);
$access_send = curl_exec($curl_send);
curl_close($curl_send);
return $access_send;
}
function join_group ($link, $cookie)
{
$head  = array(
        "Host:mbasic.facebook.com",
        'sec-ch-ua:"Google Chrome";v="87", " Not;A Brand";v="99", "Chromium";v="87"',
        "sec-ch-ua-mobile:?1",
        "cache-control:max-age=0",
        "upgrade-insecure-requests:1",
        "dnt:1",
        "save-data:on",
        "accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "sec-fetch-site:same-origin",
        "sec-fetch-mode:navigate",
        "sec-fetch-user:?1",
        "sec-fetch-dest:document",
        "referer:https://mbasic.facebook.com/",
        "accept-language:vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5",
);

$curl_join = curl_init("CURL JOIN GROUP");
curl_setopt ($curl_join, CURLOPT_URL, $link);
curl_setopt ($curl_join, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 8.0.0; LDN-LX2 Build/HUAWEILDN-LX2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/92.0.4515.159 Mobile Safari/537.36");
curl_setopt ($curl_join, CURLOPT_HTTPHEADER, $head);
curl_setopt ($curl_join, CURLOPT_COOKIE, $cookie);
curl_setopt ($curl_join, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($curl_join, CURLOPT_TIMEOUT, 10000);
curl_setopt ($curl_join, CURLOPT_FOLLOWLOCATION, TRUE);
$access_group = curl_exec($curl_join);
curl_close($curl_join);
//print $access_group;
//fwrite(fopen("xemhtml.html","w+"), $access_group); 
$ex_link      = explode('<form method="post" action="/a/group/join/?group_id', $access_group)[1];
$link_join    = "https://mbasic.facebook.com/a/group/join/?group_id".htmlspecialchars_decode(explode('"', $ex_link)[0]);
$e_hidden     = explode('<input type="hidden" name="', $ex_link);
$fb_dtsg      = explode('"', $e_hidden[1])[2];
$jazoest      = explode('"', $e_hidden[4])[2];
$target       = explode('"', $e_hidden[5])[2];
$c_src        = explode('"', $e_hidden[6])[2];
$cwevent      = explode('"', $e_hidden[7])[2];
$referrer     = explode('"', $e_hidden[8])[2];
$ctype        = explode('"', $e_hidden[9])[2];
$cver         = explode('"', $e_hidden[10])[2];
$data_array   = array(
  "fb_dtsg" => $fb_dtsg,
  "jazoest" => $jazoest,
  "target"  => $target,
  "c_src"   => $c_src,
  "cwevent" => $cwevent,
  "referrer" => $referrer,
  "ctype"   => $ctype,
  "cver"    => $cver
  );
$curl_join = curl_init("CURL JOIN GROUP");
curl_setopt ($curl_join, CURLOPT_URL, $link_join);
curl_setopt ($curl_join, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 8.0.0; LDN-LX2 Build/HUAWEILDN-LX2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/92.0.4515.159 Mobile Safari/537.36");
curl_setopt ($curl_join, CURLOPT_HTTPHEADER, $head);
curl_setopt ($curl_join, CURLOPT_COOKIE, $cookie);
curl_setopt ($curl_join, CURLOPT_POSTFIELDS, $data_array);
curl_setopt ($curl_join, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($curl_join, CURLOPT_TIMEOUT, 10000);
curl_setopt ($curl_join, CURLOPT_FOLLOWLOCATION, TRUE);
$access_group = curl_exec($curl_join);
curl_close($curl_join);
return $access_group;
}
function like_page ($link , $cookie)
{
$head  = array(
        "Host:mbasic.facebook.com",
        'sec-ch-ua:"Google Chrome";v="87", " Not;A Brand";v="99", "Chromium";v="87"',
        "sec-ch-ua-mobile:?1",
        "cache-control:max-age=0",
        "upgrade-insecure-requests:1",
        "dnt:1",
        "save-data:on",
        "accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "sec-fetch-site:same-origin",
        "sec-fetch-mode:navigate",
        "sec-fetch-user:?1",
        "sec-fetch-dest:document",
        "referer:https://mbasic.facebook.com/",
        "accept-language:vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5",
);
//$link  = "https://mbasic.facebook.com/249767202174978"; 
$curl_page  = curl_init ("CURL LIKE PAGE");
curl_setopt ($curl_page, CURLOPT_URL, $link);
curl_setopt ($curl_page, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:85.0) Gecko/20100101 Firefox/85.0");
curl_setopt ($curl_page, CURLOPT_HTTPHEADER, $head);
curl_setopt ($curl_page, CURLOPT_COOKIE, $cookie);
curl_setopt ($curl_page, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($curl_page, CURLOPT_FOLLOWLOCATION, TRUE);
$page_access = curl_exec($curl_page);
curl_close($curl_page);
//print $page_access;
$exp        = explode('<a href="/a/profile.php?', $page_access)[1];
$link_like  = "https://mbasic.facebook.com/a/profile.php?".htmlspecialchars_decode(explode('"', $exp)[0]);

$curl_page  = curl_init ("CURL LIKE PAGE");
curl_setopt ($curl_page, CURLOPT_URL, $link_like);
curl_setopt ($curl_page, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:85.0) Gecko/20100101 Firefox/85.0");
curl_setopt ($curl_page, CURLOPT_HTTPHEADER, $head);
curl_setopt ($curl_page, CURLOPT_COOKIE, $cookie);
curl_setopt ($curl_page, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($curl_page, CURLOPT_FOLLOWLOCATION, TRUE);
$page_access = curl_exec($curl_page);
curl_close($curl_page);
return $page_access;
}


function multiexplode ($delimiters,$string) {

    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}
function react_cmt_post ($link, $cookie , $type)
{
$head  = array(
        "Host:mbasic.facebook.com",
        'sec-ch-ua:"Google Chrome";v="87", " Not;A Brand";v="99", "Chromium";v="87"',
        "sec-ch-ua-mobile:?1",
        "cache-control:max-age=0",
        "upgrade-insecure-requests:1",
        "dnt:1",
        "save-data:on",
        "accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "sec-fetch-site:same-origin",
        "sec-fetch-mode:navigate",
        "sec-fetch-user:?1",
        "sec-fetch-dest:document",
        "referer:https://mbasic.facebook.com/",
        "accept-language:vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5",
);
$curl_cmt = curl_init();
curl_setopt ($curl_cmt, CURLOPT_URL, $link);
curl_setopt ($curl_cmt, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:85.0) Gecko/20100101 Firefox/85.0");
curl_setopt ($curl_cmt, CURLOPT_HTTPHEADER, $head);
curl_setopt ($curl_cmt, CURLOPT_COOKIE, $cookie);
curl_setopt ($curl_cmt, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt ($curl_cmt, CURLOPT_RETURNTRANSFER, 1);
$cmt_access = curl_exec($curl_cmt);
curl_close($curl_cmt);
//print $cmt_access$find       = explode('Trương Tấn Tài', $cmt_access)[1];
$ep_button   = explode('<td class="s"><a href="/ufi/reaction/?', $cmt_access);
  //if($type == "")
  /**$open = fopen("react_cx.html" , "w+");
  fwrite($open, $access_curl);**/
  if($type == "LIKE")
  {
    $button_react = $ep_button[1];
  } elseif($type == "LOVE")
  {
    $button_react = $ep_button[2];
  } elseif($type == "CARE")
  {
    $button_react = $ep_button[3];
  } elseif($type == "HAHA")
  {
    $button_react = $ep_button[4];
  } elseif($type == "WOW")
  {
    $button_react = $ep_button[5];
  } elseif($type == "SAD")
  {
    $button_react = $ep_button[6];
  } elseif($type == "ANGRY")
  {
    $button_react = $ex_react[7];
  }
  $ex_react       = explode('"', $button_react)[0];
  $link = "https://mbasic.facebook.com/ufi/reaction/?" . htmlspecialchars_decode($ex_react);
$curl_react = curl_init ();
  curl_setopt ($curl_react, CURLOPT_URL, $link);
  curl_setopt ($curl_react, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:85.0) Gecko/20100101 Firefox/85.0");
  curl_setopt ($curl_react, CURLOPT_COOKIE, $cookie);
  curl_setopt ($curl_react, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt ($curl_react, CURLOPT_HTTPHEADER, array(
   "Host: mbasic.facebook.com",
   "cache-control: max-age=0",
   "upgrade-insecure-requests: 1",
   "content-type: application/x-www-form-urlencoded",
   "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8",
   "accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5"
    ));
  curl_setopt ($curl_react, CURLOPT_TIMEOUT, 30000000);
  curl_setopt ($curl_react, CURLOPT_FOLLOWLOCATION, TRUE);
  $access_curl = curl_exec($curl_react);
  curl_close($curl_react);
  return $access_curl;
}
function follow ($link , $cookie)
{
  $curl_elizhex = curl_init ();
  curl_setopt ($curl_elizhex, CURLOPT_URL, $link);
  curl_setopt ($curl_elizhex, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:85.0) Gecko/20100101 Firefox/85.0");
  curl_setopt ($curl_elizhex, CURLOPT_COOKIE, $cookie);
  //curl_setopt ($curl_elizhex, )
  curl_setopt ($curl_elizhex, CURLOPT_HTTPHEADER, array(
    "Host:mbasic.facebook.com",
    "upgrade-insecure-requests:1",
    "x-requested-with:mark.via.gr",
    "sec-fetch-dest:document",
   // "accept-encoding:gzip, deflate",
    ));
    
  curl_setopt ($curl_elizhex, CURLOPT_TIMEOUT, 20100101);
  curl_setopt ($curl_elizhex, CURLOPT_RETURNTRANSFER, 1);
  $curl_access = curl_exec($curl_elizhex);
  curl_close($curl_elizhex);
  if (strpos($curl_access, '<a href="/a/subscribe.php') == true)
  {
  $exp_url_follow = explode('<a href="/a/subscribe.php?' , $curl_access)[1];
  $exp_2         = htmlspecialchars_decode(explode('"' , $exp_url_follow)[0]);
  $link = "https://mbasic.facebook.com/a/subscribe.php?".$exp_2;
  $curl_follow = curl_init ();
  curl_setopt ($curl_follow, CURLOPT_URL, $link);
  curl_setopt ($curl_follow, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:85.0) Gecko/20100101 Firefox/85.0");
  curl_setopt ($curl_follow, CURLOPT_COOKIE, $cookie);
  curl_setopt ($curl_follow, CURLOPT_HTTPHEADER, array(
    "Host:mbasic.facebook.com",
    "upgrade-insecure-requests:1",
    "x-requested-with:mark.via.gr",
    "sec-fetch-dest:document",
    ));
  curl_setopt ($curl_follow, CURLOPT_TIMEOUT, 20100101);
  curl_setopt ($curl_follow, CURLOPT_RETURNTRANSFER, 1);
  $results_follow = curl_exec($curl_follow);
  curl_close($curl_follow);
  if ($results_follow == false)
  {
    return "live";
  } else 
  return $results_follow;
  } else {
    $link_more = "https://mbasic.facebook.com/mbasic/more/". explode('"', explode('<a href="/mbasic/more/' , $curl_access)[1])[0];
    $curl_un = unfollow ($link_more , $cookie);
    if ($curl_un == false)
    {
      return "live";
    } else 
    return $curl_un;
  }
}
function unfollow ($link , $cookie)
{
  $curl_unfollow = curl_init ();
  curl_setopt ($curl_unfollow, CURLOPT_URL, $link);
  curl_setopt ($curl_unfollow, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:85.0) Gecko/20100101 Firefox/85.0");
  curl_setopt ($curl_unfollow, CURLOPT_HTTPHEADER, array(
    "Host:mbasic.facebook.com",
    "upgrade-insecure-requests:1",
    "x-requested-with:mark.via.gr",
    "sec-fetch-dest:document",
    ));
  curl_setopt ($curl_unfollow, CURLOPT_COOKIE, $cookie);
  curl_setopt ($curl_unfollow, CURLOPT_RETURNTRANSFER, 1);
  $curl_follow_access = curl_exec($curl_unfollow);
  curl_close ($curl_unfollow);
 //return $curl_follow_access;
 $exp_link_un         = explode('<a href="/a/subscriptions/' , $curl_follow_access)[1];
 $link_un             = htmlspecialchars_decode("https://mbasic.facebook.com/a/subscriptions/" . explode('"' , $exp_link_un)[0]);
 $curl_un = curl_init ();
 curl_setopt ($curl_un, CURLOPT_URL, $link_un);
 curl_setopt ($curl_un, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:85.0) Gecko/20100101 Firefox/85.0");
 curl_setopt ($curl_un, CURLOPT_COOKIE, $cookie);
 curl_setopt ($curl_un, CURLOPT_HTTPHEADER, array(
    "Host:mbasic.facebook.com",
    "upgrade-insecure-requests:1",
    "x-requested-with:mark.via.gr",
    "sec-fetch-dest:document",
   ));
 curl_setopt ($curl_un, CURLOPT_RETURNTRANSFER, 1);
 $curl_un_access = curl_exec($curl_un);
 curl_close ($curl_un);
 return $curl_un_access;
 
}
function dat_cau_hinh ($cookie , $id)
{
 $curl_elizhex = curl_init ();
 curl_setopt ($curl_elizhex, CURLOPT_URL, "https://tuongtaccheo.com/cauhinh/datnick.php");
 curl_setopt ($curl_elizhex, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:85.0) Gecko/20100101 Firefox/85.0");
 curl_setopt ($curl_elizhex, CURLOPT_COOKIE, $cookie);
 curl_setopt ($curl_elizhex, CURLOPT_POSTFIELDS, array(
   "iddat[]" => $id,
   "loai" => "fb"
   ));
 curl_setopt($curl_elizhex, CURLOPT_RETURNTRANSFER, 1);
 $curl_access = curl_exec($curl_elizhex);
 curl_close($curl_elizhex);
 return $curl_access;
}
function check_cookie_fb  ($cookie) 
{
  $curl_elizhex = curl_init ();
  curl_setopt ($curl_elizhex, CURLOPT_URL, "https://m.facebook.com/profile.php");
  curl_setopt ($curl_elizhex, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:85.0) Gecko/20100101 Firefox/85.0");
  curl_setopt ($curl_elizhex, CURLOPT_COOKIE, $cookie);
  curl_setopt ($curl_elizhex, CURLOPT_HTTPHEADER, array(
    "Host:m.facebook.com",
    "content-length:0",
    "content-type:text/plain;charset=UTF-8",
    "origin:https://m.facebook.com",
    "referer:https://m.facebook.com/"
    ));
  curl_setopt ($curl_elizhex, CURLOPT_RETURNTRANSFER, 1);
  $curl_access = curl_exec($curl_elizhex);
  curl_close($curl_elizhex);
  return $curl_access;
}
function check_cookie_ttc ($cookie)
{
  // Curl check cút ki
  $curl_elizhex = curl_init ();
  curl_setopt ($curl_elizhex, CURLOPT_URL, "https://tuongtaccheo.com/home.php");
  curl_setopt ($curl_elizhex, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:85.0) Gecko/20100101 Firefox/85.0");
  curl_setopt ($curl_elizhex, CURLOPT_HTTPHEADER, array(
    "Host:tuongtaccheo.com",
    "x-requested-with:XMLHttpRequest",
    "referer:".$link,
    "accept-language:vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5"
    ));
  curl_setopt ($curl_elizhex, CURLOPT_COOKIE, $cookie);
  curl_setopt ($curl_elizhex, CURLOPT_RETURNTRANSFER, 1);
  $curl_access = curl_exec($curl_elizhex);
  curl_close($curl_elizhex);
  return $curl_access;
}
function claim_v1 ($url, $id, $cookie)
{
  $link         = str_replace("getpost","nhantien",$url);
  //print $link."\n";
  $curl_claimv1 = curl_init("Nhận Tiền V1");
  curl_setopt ($curl_claimv1, CURLOPT_URL, $link);
  curl_setopt ($curl_claimv1, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:85.0) Gecko/20100101 Firefox/85.0');
  curl_setopt ($curl_claimv1, CURLOPT_COOKIE, $cookie);
  curl_setopt ($curl_claimv1, CURLOPT_POSTFIELDS, array(
    "id" => $id
    ));
  curl_setopt ($curl_claimv1, CURLOPT_HTTPHEADER, array(
    "Host:tuongtaccheo.com",
    "x-requested-with:XMLHttpRequest",
    "referer:".$link,
    "accept-language:vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5"
    ));
  curl_setopt ($curl_claimv1, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt ($curl_claimv1, CURLOPT_FOLLOWLOCATION, TRUE);
  $access_claimv1 = curl_exec($curl_claimv1);
  curl_close ($curl_claimv1);
//  return $link;
  return $access_claimv1;
}
function claim_v2 ($url, $id, $type, $cookie)
{
  $link         = str_replace("getpost","nhantien",$url);
  //print $link."\n";
  $curl_claimv1 = curl_init("Nhận Tiền V1");
  curl_setopt ($curl_claimv1, CURLOPT_URL, $link);
  curl_setopt ($curl_claimv1, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:85.0) Gecko/20100101 Firefox/85.0');
  curl_setopt ($curl_claimv1, CURLOPT_COOKIE, $cookie);
  curl_setopt ($curl_claimv1, CURLOPT_POSTFIELDS, array(
    "id" => $id,
    "loaicx" => $type
    ));
  curl_setopt ($curl_claimv1, CURLOPT_HTTPHEADER, array(
    "Host:tuongtaccheo.com",
    "x-requested-with:XMLHttpRequest",
    "referer:".$link,
    "accept-language:vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5"
    ));
  curl_setopt ($curl_claimv1, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt ($curl_claimv1, CURLOPT_FOLLOWLOCATION, TRUE);
  $access_claimv1 = curl_exec($curl_claimv1);
  curl_close ($curl_claimv1);
//  return $link;
  return $access_claimv1;
}
function bar_delay ($delay_time)
{
  for($time=$delay_time;$time > 0;$time--)
  {
    print("\r\033[1;92m Đợi chút nha,\033[1;95m $time\033[1;92m giây!...     \r");
    sleep(1);
  }
}
?>
