<?php
/**
 * @api                    {post} /Course/lists 所有课程
 * @apiDescription         所有课程列表
 * @apiName                lists
 * @apiGroup               Course
 * @apiPermission          aupl
 *
 * @apiParam {int}        appId      设备类型
 @apiParam {string}     deviceID   设备id
 @apiParam {string}     signValue  签名串
 *
 *
 * @apiSuccessExample      Success-Response:
 *{
	code: 1001,
	msg: "操作成功",
	data: [
		{
			id: "65",
			courseName: "联盟商家展业培训",
			logo: "https://image.dttx.com/v1/tfs/T1qcDTBCbT1RCvBVdK.png"
		}
	]
  }
 *
 */
class lists extends baseApi{
    
    function __construct($options) {
        parent::__construct($options);
    }
	
    function run() {
        $sql = 'select co_id as id,co_name as courseName from tang_course where co_state=1 order by co_id desc';
        $courseList = $this->db->getAll($sql);
        !$courseList && $this->apiReturn(1002, '暂无课程');
        
        $courseLogo = array(
            'https://image.dttx.com/v1/tfs/T1GcYTBXWT1RCvBVdK.png',
            'https://image.dttx.com/v1/tfs/T1qUDTB5CT1RCvBVdK.png',
            'https://image.dttx.com/v1/tfs/T1tkETBKxT1RCvBVdK.png',
            'https://image.dttx.com/v1/tfs/T1YcYTBXWT1RCvBVdK.png',
            'https://image.dttx.com/v1/tfs/T1qmDTB5JT1RCvBVdK.png',
            'https://image.dttx.com/v1/tfs/T12kZTB7bT1RCvBVdK.png',
            'https://image.dttx.com/v1/tfs/T1BmYTBXLT1RCvBVdK.png',
            'https://image.dttx.com/v1/tfs/T1qcDTBCbT1RCvBVdK.png',
            'https://image.dttx.com/v1/tfs/T1D5ZTB7WT1RCvBVdK.png',
            'https://image.dttx.com/v1/tfs/T1rUYTBXLT1RCvBVdK.png',
            'https://image.dttx.com/v1/tfs/T1l6DTBC_T1RCvBVdK.png',
            'https://image.dttx.com/v1/tfs/T1b.ZTB7WT1RCvBVdK.png',
            'https://image.dttx.com/v1/tfs/T1rmYTBXLT1RCvBVdK.png'
        );
        
        foreach ($courseList as &$val) {
            $key = rand(0, 12);
            $val['logo'] = $courseLogo[$key];
        }
        
        $this->apiReturn(1001, '', $courseList);
    }
}
