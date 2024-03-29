<?php

/**
 * 任务处理基类
 * @version 1.1
 * @create 20160120
 */
class job {

    static public function startWorks() {
        queues::start('job.system');
    }

    static public function getJobList() {
        $db = new MySql();
        return $db->getAll('select * from t_job');
    }

    static public function exec($f, $p) {
        return call_user_func_array("job::$f", $p);
    }
	
	/* 将一个job从休眠状态中唤醒 */
	//static public function 

    //每天白积分返还
    static public function runW2R() {
        $now = F::mytime();
        $date = date('Y-m-d', strtotime(F::mytime('Y-m-d')) - 86400);
        if (score::getTodayStatistics($date)) {
            job::log($date . "返还汇总表生成任务执行成功");
        } else {
            job::log($date . "返还汇总表生成任务执行失败");
            job::log(score::$error);
            self::send($date . "白积分转红积分计算失败", $date . "白积分转红积分计算失败，由于汇总表生成失败。");
            return false;
        }

        $db = new MySql();
		$dbErp = new MySql(DB_ERP);//erp数据库
        $UnionScore = $dbErp->getField("select ss_wrUnionScore from t_statistics_system where ss_date = '$date'");
        if (!$UnionScore) {
            job::log($date . "返还单元积分失败");
            self::send($date . "返还单元积分失败", $date . "返还单元积分失败，由于未正常获取单元返还积分数。");
            return false;
        }
        if (score::jobW2R(10, $UnionScore)) {
            job::log($date . "每日白积分转红积分生成任务执行成功");
            self::send($date . "白积分转红积分任务成功", $now . "开始执行白积分转红积分定时任务，" .F::mytime(). "执行成功！");
        } else {
            job::log($date . "每日白积分转红积分生成任务执行失败");
            job::log(score::$error);
            self::send($date . "白积分转红积分任务失败", $now . "开始执行白积分转红积分定时任务，" .F::mytime(). "执行失败！");
        }
    }

    //每天冻结白积分到白积分
    static public function runL2W() {
        score::jobL2W();
    }
	
	/* 每天计算用户收益 */
	static public function runIncome(){
		$now = F::mytime();
        $date = date('Y-m-d', strtotime(F::mytime('Y-m-d')) - 86400);
		$db = new MySql();
		$income = new income($db);		
		if($income->tempScore()){
			job::log($date . "生成积分收益临时表成功");
			if($income->updateScore()){
				job::log($date . "积分收益计算成功");
			}
			else{
				job::log($date . "积分收益计算失败");
				exit;				
			}			
		}
		else{
			job::log($date . "生成积分收益临时表失败");
			exit;
		}	
		if($income->tempCash()){
			job::log($date . "生成现金收益临时表成功");
			if($income->updateCash()){
				job::log($date . "现金收益计算成功");
			}
			else{
				job::log($date . "现金收益计算失败");
				exit;				
			}			
		}
		else{
			job::log($date . "生成现金收益临时表失败");
			exit;
		}
	}

    static public function test($a, $b, $c) {
        $s = $a .' - '. $b .' - '. $c;
        echo $s . "\n";
        return true;
//        $db = new MySql();
//        return ($db->exec("insert into lista value('$s')") == 1);
    }
	
	/* 计算消费赠送,提成/特别奖励,代理奖励 */
	static public function taskAward($orderID){		
		$db = new MySql();
		if(awardNew::order($orderID, $db)){
			//echo $orderID . "提成奖励计算成功!\n";
			return 1;
		}else{
			//self::log($orderID . " - ".awardNew::$error." - 提成奖励计算失败!");
			switch(awardNew::$error){
				case -1:
				case -2:
				case -3:
					return -1;
					break;
				default:
					return -2;
					break;
			}			
		}
	}
	
	/* 计算升级推荐奖励 */
	static public function taskUpAward($orderID){		
		$db = new MySql();
		if(upAwardNew::order($orderID, $db)){
			put::award($orderID);	
			echo $orderID . "升级奖励计算成功!\n";
			return 1;
		}else{
			//self::log($orderID . " - ".upAwardNew::$error." - 升级推荐奖励计算失败!");
			switch(upAwardNew::$error){
				case -1:
				case -2:
				case -3:
					return -1;
					break;
				default:
					return -2;
					break;
			}			
		}
	}

	//第一个参数作为标志用途，显示队列的时候一看就知道是发什么邮件
	static function taskSendmail($flag,$email,$nick,$code, $tempId, $data){
		$letter = new letter();
		$rs = $letter->send($email,$nick,$code, $tempId, $data);
		if(!$rs){
			$errNum = $letter->getErrNum();
			if($errNum == -3){		//发送邮件失败
				return -2;
			}else{
				return -1;
			}
		}else{
			return 1;
		}
	}

    static function log($m) {
        echo F::mytime() . '  ' . $m . "\n";
    }

    static function send($title, $msg) {
		$sms = new sms();
		$sms->SendValidateSMS('13570934248');
/*         $sitemsg = new sitemsg();
        $data = array(
            'sender' => 'ylh00000', //虚拟一个发件人
            'targets' => ['3-acf99f5da164c745334d8a09672174eb'], //4-员工编号;3-u_id
            'title' => $title,
            'type' => 1, //消息类型 1-通知消息
            'content' => $msg, //
        );
        $sitemsg->save($data); */
    }

}
