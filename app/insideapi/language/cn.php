<?php

$msg = array(
    '0001' => '登录系统成功！',
    '0002' => '请检查密码是否正确',
    '0003' => '此用户账号已经被禁止登录，请联系管理员。',
    '0004' => '您还没有登录，请先登录。',
    '0005' => '您没有操作记录的权限，也可能是目前状态下，此记录不可操作。',
    '0006' => '您的身份不对，无法进入此系统。',
    '0007' => '需要提交令牌校验，请不要重复提交，刷新后再试。',
    '1001' => '已登录',


    /* adadsa */
    '1001' => '操作成功!',//广义上的返回成功,获取数据,执行操作等等
    '1002' => '操作失败!',//广义上的返回失败,获取数据,执行操作等等
    '1003' => '参数错误',
    '1004' => '签名错误',
    '1005' => '同一订单不能重复提交',
    '1006' => '邮箱已存在',
    '1007' => '手机号已存在',
    '1008' => 'IP地址格式不正确',

    /* 用户注册部分 */
    '2000' => '注册成功',
    '2001' => '验证码错误',
    '2002' => '用户名已被占用',
    '2003' => '密码格式错误',
    '2004' => '手机已被占用',
    '2005' => '推荐人错误',
    '2006' => '身份证已被占用',
    '2007' => '公司名称已被占用',
    '2008' => '营业执照已被占用',
    '2009' => '手机验证码错误',
    '2010' => '请输入性别',
    '2099' => '注册失败',
    '2199' => '登录失败',
    /* 用户注册部分end */


    /* 用户登录部分 */
    '2100' => '登录成功',
    '2113' => '权限被篡改，联系管理员',
    '2101' => '您的帐号是员工帐号，请到员工登录中心登录。',
    '2110' => '员工账号格式不对。',
    '2105' => '密码错误。',
    '2112' => '限制IP登录，请联系网管。',
    '2199' => '账号或密码错误',
    '2102' => '账号不存在。',
    '2103' => '此账号停止使用，请联系管理员',
    /* 用户登录部分end */

    /* 设备绑定部分 */
    '3001' => '设备已绑定',
    '3002' => '商家等级不够',
    '3003' => '手机号码或密码错误',
    '3004' => '绑定成功',
    '3005' => '绑定失败',
    /* 设备绑定部分end */

    /* 设备解绑部分 */
    '4001' => '商家不存在',
    '4002' => '解绑成功',
    '4003' => '解绑失败',
    '4004' => '设备未绑定',
    /* 设备解绑部分end */

    /* 预付款消费部分 */
    '5001' => '不能分发给自己',
    '5002' => '预付款支付成功',
    '5003' => '预付款支付失败',
    '5004' => '账户金额不足',
    '5005' => '商户数据检索失败',
    /* 预付款消费部分end */

    /* 红积分消费部分 */
    '6001' => '不能和自己交易',
    '6002' => '账号错误',
    '6003' => '商家数据检索失败',
    '6004' => '商家未与终端绑定',
    '6005' => '账户红积分不足',
    '6006' => '红积分支付成功',
    '6007' => '红积分支付失败',
    /* 红积分消费部分end */

    /* 其它付款方式部分 */
    '7001' => '订单创建成功',
    '7002' => '订单创建失败',
    '7003' => '数据检索失败',
    /* 其它付款方式部分end */

    /* 旺POS返回码 */
    '0000'	=>	'操作成功',
    '8000'	=>	'请求的操作不存在',

    '8001'	=>	'有参数值为空',
    '8002'	=>	'手机号码格式不正确',
    '8003'	=>	'时间格式不正确',
    '8004'	=>	'货币金额格式不正确',
    '8005'	=>	'红积分消费，金额必须大于0.1',

    '8097'	=>	'缺少加密摘要',
    '8098'	=>	'加密摘要不正确',
    '8099'	=>	'请求超时',

    '8100'	=>	'商户用户密码错误',
    '8101'	=>	'账户被冻结或停止使用，不能登录',
    '8102'	=>	'商户等级小于3级，不能绑定设备',
    '8103'	=>	'设备已绑定，不能再次绑定',
    '8104'	=>	'绑定失败',
    '8203'	=>	'设备未绑定，不能解绑',
    '8204'	=>	'解绑失败',
    '8303'	=>	'设备未绑定，不能查询',
    '8304'	=>	'查询失败',
    '8400'	=>	'消费者与商家为同一个账号',
    '8401'	=>	'订单已存在，不能重复支付',
    '8402'	=>	'商户账号不存在',
    '8403'	=>	'商户账号为非正常状态',
    '8404'	=>	'商户账户被冻结或注销',
    '8405'	=>	'设备与商户未绑定',
    '8406'	=>	'消费者账号或密码错误',
    '8407'	=>	'消费者账号为非正常状态',
    '8408'	=>	'消费者账户被冻结或注销',
    '8409'	=>	'消费者余额不足以支付当前订单',
    '8410'	=>	'操作失败',

    /* 开放平台相关 */
    'API'   =>  array(
        'SUCCESS'                   =>  '操作成功',

        'INVALIDE_REQUEST_METHOD'   =>  '请求方式必须是POST',

        //检查SQL注入
        'NO_PARAMETER'              =>  '没有传参数',
        'UNSECURED_CHAR'            =>  '参数中含有不安全的字符',
        'UNSECURED_WORD'            =>  '参数中含有不安全的单词',

        //检查访问的接口
        'NO_API_DATA'               =>  '没有获取到接口数据',
        'API_NOT_EXISTS'            =>  '请求的接口不存在',
        'API_DISABLED'              =>  '请求的接口不可用',

        //检查合作伙伴
        'PARTNER_NOT_EXISTS'        =>  '开发者不存在',
        'PARTNER_DISABLED'          =>  '开发者账号不可用',
        'APP_NOT_FOUND'             =>  '没有找到应用',
        'APP_DISABLED'              =>  '应用不可用',

        //检查接口权限
        'NO_PRIVILEGE'              =>  '没有访问当前接口的权限',
        'ACCESS_FORBIDDEN'          =>  '接口的访问权限被冻结或注销',

        //检查用户授权
        'APP_NOT_AUTHED'            =>  '应用没有获得用户授权',
        'API_NOT_AUTHED'            =>  '接口没有获得用户授权',
        'USER_AUTH_EXPIRED'         =>  '用户授权已过期',

        //检查加密签名
        'WRONG_SIGNATURE'           =>  '加密摘要错误',
        'REQUEST_TIMEOUT'           =>  '请求超时',

        //检查全部参数
        'EMPTY_PARAMETER'           =>  '参数不能为空',
        'INVALIDE_PARAMETER_LENGTH' =>  '参数长度不合法',
        'INVALIDE_PARAMETER_TYPE_NUMBER'    =>  '参数值必须是number类型',
        'INVALIDE_PARAMETER_TYPE_INT'       =>  '参数值必须是int类型',
        'INVALIDE_PARAMETER_TYPE_FLOAT'     =>  '参数值必须是float类型',
        'INVALIDE_PARAMETER_TYPE_BOOLEAN'   =>  '参数值必须是boolean类型',
        'NEGATIVE_PARAMETER'        =>  '参数不能为负数',
        'NONPOSITIVE_PARAMETER'     =>  '参数必须为正数',
        'INVALIDE_PARAMETER_FORMAT' =>  '参数的格式错误',

        //获取数据结果
        'EMPTY_RESULT'              =>  '没有查询到数据'
    ),

    /* 相关账户字词替换 */
    'accountType1' => '预存款账户',
    'accountType2' => '交易账户',
    'accountType3' => '创业',
    'accountType4' => '服务费',
    'accountType5' => '白积分账户',
    'accountType6' => '红积分账户',
    'accountType7' => '预存款账户'
);