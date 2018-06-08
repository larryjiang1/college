<?php
/*=============================================================================
#     FileName: editTeam.php
#         Desc: 发布报名记录
#       Author: Wuyuanhang
#        Email: QQ:554119220
#   LastChange: 2016-11-01 13:59:21
#      History:
#      Paramer:
=============================================================================*/
class editTeam extends worker {
    function __construct($options) {
        parent::__construct($options, [500105]);
    }

    function run() {
        $options    = $this->options;
        $db         = new MySql();
        $data['id'] = $options['id'];

        $sql = "SELECT tse.tse_team team,cl.cl_name className,um.trueName,um.username FROM
            tang_student_enroll tse LEFT JOIN tang_class cl ON cl.cl_id=tse.tse_classId
            LEFT JOIN tang_ucenter_member um ON um.id=tse.tse_userId
            WHERE tse_id='{$data['id']}'";

        $info = $db->getRow($sql);

        if (!empty($info)) {
            $data = array_merge($data,$info);
        }

        $this->setReplaceData($data);
        $this->setTempAndData();
        $this->show();
    }
}
