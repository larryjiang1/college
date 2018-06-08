<?php

class review extends worker {
    function __construct($options) {
        parent::__construct($options, [50010302]);
    }

    function run() {
        $data = array(
            'code'   => '50010301',
            'tempId' => 'temp_' . F::getGID()
        );

        $options = $this->options;
        if (!isset($options['id']) || empty($options['id'])) {
            die($this->show(message::getJsonMsgStruct('1002', '参数错误')));
        }

        $db = new MySql();
        $field = 'cl_id,cl_name as className,cl_enrollStartTime as enrollStartTime,cl_enrollEndTime as enrollEndTime,cl_logo,cl_description as description,cl_cost,cl_status,cl_hostel,cl_catering,cl_startTime,cl_endTime,cl_allowableNumber,cl_condition,br.br_name as branchName,username as headMaster,cl_hostelMemo as hostelMemo,cl_cateringMemo as cateringMemo,cl_enrollCondition';
        $sql = "SELECT {$field} FROM tang_class cl 
                LEFT JOIN tang_branch br ON cl.tangCollege=br.br_id 
                LEFT JOIN tang_ucenter_member on id=cl_headmasterId 
                WHERE cl_id='" . intval($options['id']) . "'";

        $info = $db->getRow($sql);

        if (empty($info)) {
            die($this->show(message::getJsonMsgStruct('1002', '获取信息失败')));
        }

        $levelCondition = F::getAttrs(9);
        $isNot          = array('否','是');

        //报名条件
        $enrollCondition        = unserialize($info['cl_enrollCondition']);
        $info['levelCondition'] = $levelCondition[$enrollCondition['levelCondition']];
        $info['isAuthed']       = $isNot[$enrollCondition['isAuthed']];
        $info['enrollEver']     = $isNot[$enrollCondition['enrollEver']];
        $info['isBlack']        = $isNot[$enrollCondition['isBlack']];

        if ($info['cl_condition']) {
            $studyDirection = $db->getAll("SELECT stc_name FROM tang_study_condition WHERE stc_id IN({$info['cl_condition']})");
            $info['condition'] = join(' | ',array_column($studyDirection,'stc_name'));
        }
        $info['description'] = F::TextToHtml($info['description']);
        $info['catering'] = $info['cl_catering'] == 0 ? '不包三餐' : '包三餐';
        $info['hostel']   = $info['cl_hostel'] == 0 ? '不包住' : '包住';
        
        $info['cl_logo'] = !empty($info['cl_logo']) ? TFS_APIURL.'/'.$info['cl_logo'] : _TEMP_PUBLIC_."/images/none.png";
        
        $data = array_merge($data, $info);
        
        $this->setReplaceData($data);
        $this->setTempAndData();
        $this->show();
    }
}
